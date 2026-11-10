<?php
/* GA-PMTG-2026-11-09 - post the daily Quran Picture Message to the Telegram channels.
   Reuses the bot token saved in Settings > Verse to Telegram when available.
   Loaded from inc-seo-fixes.php inside try/catch. */
if (!defined('ABSPATH')) { exit; }

function ga_pmtg_opts() { $o = get_option('ga_pmtg', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
    add_options_page('Picture Message to Telegram', 'Picture Msg to Telegram', 'manage_options', 'ga-pmtg', 'ga_pmtg_page');
});

add_action('init', function () {
    if (!wp_next_scheduled('ga_pmtg_daily')) {
        wp_schedule_event(strtotime('tomorrow 00:35:00 UTC'), 'daily', 'ga_pmtg_daily');
    }
});
add_action('ga_pmtg_daily', function () { ga_pmtg_run(false); });

function ga_pmtg_token() {
    $o = ga_pmtg_opts();
    if (!empty($o['token'])) { return $o['token']; }
    $v = function_exists('ga_vtg_opts') ? ga_vtg_opts() : get_option('ga_vtg', array());
    return (is_array($v) && !empty($v['token'])) ? $v['token'] : '';
}

function ga_pmtg_label($lang) {
    return $lang === 'ta' ? 'Kadavulmattum.org' : ($lang === 'hi' ? 'Ekkhuda.org' : 'GodAlone.in');
}

function ga_pmtg_pm_lang($lang) {
    $map = array('en' => 'e', 'ta' => 't', 'hi' => 'h');
    return isset($map[$lang]) ? $map[$lang] : $lang;
}

function ga_pmtg_caption($stem, $lang) {
    if (!preg_match('/^(\d{1,3})\.(\d{1,3})/', $stem, $m)) { return ''; }
    $T = function_exists('ga_votd_t') ? ga_votd_t($lang) : array('q' => 'Quran', 'title' => 'Verse of the day');
    $ref = $T['q'] . ' ' . $m[1] . ':' . $m[2];
    $url = 'https://godalone.in/picture-messages/#' . $stem;
    return "\xE2\x9C\xA6 " . ga_pmtg_label($lang) . " \xE2\x80\x94 Quran Picture Message" . "\n\n" . $ref . "\n" . $url;
}

function ga_pmtg_send_photo($token, $chat, $photo_url, $caption) {
    $r = wp_remote_post('https://api.telegram.org/bot' . $token . '/sendPhoto', array(
        'timeout' => 30,
        'body' => array('chat_id' => $chat, 'photo' => $photo_url, 'caption' => $caption),
    ));
    if (is_wp_error($r)) { return array(false, str_replace($token, '***', $r->get_error_message())); }
    $j = json_decode(wp_remote_retrieve_body($r), true);
    if (is_array($j) && !empty($j['ok'])) { return array(true, 'sent'); }
    return array(false, (is_array($j) && isset($j['description'])) ? $j['description'] : ('HTTP ' . wp_remote_retrieve_response_code($r)));
}

function ga_pmtg_run($force) {
    $o = ga_pmtg_opts();
    $token = ga_pmtg_token();
    if ($token === '') { return array('No bot token is saved yet (set one here, or in Settings > Verse to Telegram).'); }
    if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
    $today = gmdate('Y-m-d');
    if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
    if (!function_exists('ga_pm_daily') || !function_exists('ga_pm_find')) { return array('Picture message data is unavailable.'); }
    $v = function_exists('ga_vtg_opts') ? ga_vtg_opts() : get_option('ga_vtg', array());
    $res = array();
    $any = false;
    foreach (array('en', 'ta', 'hi') as $lang) {
        $own = isset($o['chat_' . $lang]) ? trim((string) $o['chat_' . $lang]) : '';
        $chat = $own !== '' ? $own : (isset($v['chat_' . $lang]) ? trim((string) $v['chat_' . $lang]) : '');
        if ($chat === '') { continue; }
        $stem = ga_pm_daily(ga_pmtg_pm_lang($lang));
        if ($stem === '' || !ga_pm_find($stem)) { $res[] = strtoupper($lang) . ' ' . $chat . ': FAILED - no picture available for this language yet.'; continue; }
        $photo_url = home_url('/picture-messages/img/?f=' . rawurlencode($stem) . '&s=full');
        $caption = ga_pmtg_caption($stem, $lang);
        $r = ga_pmtg_send_photo($token, $chat, $photo_url, $caption);
        if ($r[0]) { $any = true; }
        $res[] = strtoupper($lang) . ' ' . $chat . ' (' . $stem . '): ' . ($r[0] ? 'sent' : 'FAILED - ' . $r[1]);
    }
    if (!$res) { $res[] = 'No channel is set.'; }
    if ($any) { $o['last_day'] = $today; }
    $o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
    update_option('ga_pmtg', $o, false);
    return $res;
}

function ga_pmtg_page() {
    if (!current_user_can('manage_options')) { return; }
    $o = ga_pmtg_opts();
    $notice = '';
    if (isset($_POST['ga_pmtg_action']) && check_admin_referer('ga_pmtg')) {
        $act = sanitize_key(wp_unslash($_POST['ga_pmtg_action']));
        if ($act === 'save') {
            $tok = isset($_POST['token']) ? trim((string) wp_unslash($_POST['token'])) : '';
            if ($tok !== '') {
                if (preg_match('/^[0-9]{6,12}:[A-Za-z0-9_-]{30,60}$/', $tok)) { $o['token'] = $tok; }
                else { $notice = 'That does not look like a Telegram bot token, so the token was not changed. '; }
            }
            $o['on'] = isset($_POST['on']) ? 1 : 0;
            foreach (array('en', 'ta', 'hi') as $l) {
                $c = isset($_POST['chat_' . $l]) ? trim((string) wp_unslash($_POST['chat_' . $l])) : '';
                $o['chat_' . $l] = preg_match('/^@[A-Za-z0-9_]{4,64}$/', $c) ? $c : '';
            }
            update_option('ga_pmtg', $o, false);
            $notice .= 'Saved.';
        } elseif ($act === 'remove') {
            unset($o['token']);
            $o['on'] = 0;
            update_option('ga_pmtg', $o, false);
            $notice = 'Token removed and auto-posting switched off.';
        } elseif ($act === 'post') {
            $notice = implode(' | ', ga_pmtg_run(true));
            $o = ga_pmtg_opts();
        }
    }
    $shared = function_exists('ga_vtg_opts') ? ga_vtg_opts() : get_option('ga_vtg', array());
    $has_own = !empty($o['token']);
    $has_shared = !$has_own && !empty($shared['token']);
    $en = (isset($o['chat_en']) && $o['chat_en'] !== '') ? $o['chat_en'] : (isset($shared['chat_en']) ? $shared['chat_en'] : '@GodAlone_in');
    $ta = (isset($o['chat_ta']) && $o['chat_ta'] !== '') ? $o['chat_ta'] : (isset($shared['chat_ta']) ? $shared['chat_ta'] : '@kadavulmattum_org');
    $hi = (isset($o['chat_hi']) && $o['chat_hi'] !== '') ? $o['chat_hi'] : (isset($shared['chat_hi']) ? $shared['chat_hi'] : '');
    echo '<div class="wrap"><h1>Quran Picture Message to Telegram</h1>';
    if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
    echo '<p>Posts today\'s Quran Picture Message (same picture as the website) to your channels every morning, a few minutes after the verse-of-the-day text (about 6:05 AM IST).</p>';
    if ($has_shared) { echo '<p><strong>A bot token is already saved</strong> from Settings &gt; Verse to Telegram, and will be reused here automatically. You only need to paste a token below if you want this feature to use a different bot.</p>'; }
    echo '<form method="post" autocomplete="off">';
    wp_nonce_field('ga_pmtg');
    echo '<table class="form-table" role="presentation">';
    echo '<tr><th scope="row"><label for="pmtgt">Bot token</label></th><td><input id="pmtgt" type="password" name="token" class="regular-text" autocomplete="new-password" placeholder="' . ($has_own ? 'Saved (ends ...' . esc_attr(substr($o['token'], -4)) . ') - leave blank to keep' : ($has_shared ? 'Using the Verse-to-Telegram token - leave blank unless you want a different bot' : 'Paste the token from @BotFather')) . '"></td></tr>';
    echo '<tr><th scope="row"><label for="pmtge">English channel</label></th><td><input id="pmtge" type="text" name="chat_en" value="' . esc_attr($en) . '" class="regular-text"> <span class="description">e.g. @GodAlone_in</span></td></tr>';
    echo '<tr><th scope="row"><label for="pmtgta">Tamil channel</label></th><td><input id="pmtgta" type="text" name="chat_ta" value="' . esc_attr($ta) . '" class="regular-text"> <span class="description">e.g. @kadavulmattum_org (leave empty to skip)</span></td></tr>';
    echo '<tr><th scope="row"><label for="pmtghi">Hindi channel</label></th><td><input id="pmtghi" type="text" name="chat_hi" value="' . esc_attr($hi) . '" class="regular-text"> <span class="description">e.g. @ekkhuda_org - Hindi pictures exist only for Surah 3 so far (leave empty to skip)</span></td></tr>';
    echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
    echo '</table>';
    echo '<p class="submit"><button type="submit" name="ga_pmtg_action" value="save" class="button button-primary">Save</button> ';
    if ($has_own || $has_shared) {
        echo '<button type="submit" name="ga_pmtg_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s picture message to the channels now?\');">Post today\'s picture now (test)</button> ';
    }
    if ($has_own) {
        echo '<button type="submit" name="ga_pmtg_action" value="remove" class="button" onclick="return confirm(\'Remove the saved bot token for this feature?\');">Remove token</button>';
    }
    echo '</p></form>';
    if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
    echo '</div>';
}
