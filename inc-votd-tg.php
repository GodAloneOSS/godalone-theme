<?php
/* GA-VTG-2026-11-04 - post the verse of the day to the Telegram channels. Needs a bot token saved in Settings > Verse to Telegram.
   Loaded from inc-seo-fixes.php inside try/catch. */
if (!defined('ABSPATH')) { exit; }

function ga_vtg_opts() { $o = get_option('ga_vtg', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
	add_options_page('Verse of the day to Telegram', 'Verse to Telegram', 'manage_options', 'ga-vtg', 'ga_vtg_page');
});

add_action('init', function () {
	if (!wp_next_scheduled('ga_vtg_daily')) {
		wp_schedule_event(strtotime('tomorrow 00:30:00 UTC'), 'daily', 'ga_vtg_daily');
	}
});
add_action('ga_vtg_daily', function () { ga_vtg_run(false); });

function ga_vtg_text($v, $lang) {
	if (!function_exists('ga_votd_t')) { return ''; }
	$T = ga_votd_t($lang);
	$tr = !empty($v[$lang]) ? $v[$lang] : $v['en'];
	if (empty($v[$lang]) && !empty($T['note'])) { $tr .= "\n\n" . $T['note']; }
	$ref = $T['q'] . ' ' . $v['s'] . ':' . $v['a'];
	$url = 'https://godalone.in/quran/#/' . $v['s'] . '/' . $v['a'];
	return '✦ ' . ($lang === 'ta' ? 'Kadavulmattum.org' : ($lang === 'hi' ? 'Ekkhuda.org' : 'GodAlone.in')) . ' ' . $T['title'] . "\n\n" . $v['ar'] . "\n\n" . $tr . "\n\n— " . $ref . "\n" . $T['read'] . ': ' . $url;
}

function ga_vtg_send($token, $chat, $text) {
	$r = wp_remote_post('https://api.telegram.org/bot' . $token . '/sendMessage', array('timeout' => 20, 'body' => array('chat_id' => $chat, 'text' => $text)));
	if (is_wp_error($r)) { return array(false, str_replace($token, '***', $r->get_error_message())); }
	$j = json_decode(wp_remote_retrieve_body($r), true);
	if (is_array($j) && !empty($j['ok'])) { return array(true, 'sent'); }
	return array(false, (is_array($j) && isset($j['description'])) ? $j['description'] : ('HTTP ' . wp_remote_retrieve_response_code($r)));
}

function ga_vtg_run($force) {
	$o = ga_vtg_opts();
	if (empty($o['token'])) { return array('No bot token is saved yet.'); }
	if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
	$today = gmdate('Y-m-d');
	if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
	if (!function_exists('ga_votd_verse_for')) { return array('Verse data is unavailable.'); }
	$v = ga_votd_verse_for(time());
	if (!$v) { return array('Verse data is unavailable.'); }
	$res = array();
	$any = false;
	foreach (array('en', 'ta', 'hi') as $lang) {
		$chat = isset($o['chat_' . $lang]) ? trim((string) $o['chat_' . $lang]) : '';
		if ($chat === '') { continue; }
		$r = ga_vtg_send($o['token'], $chat, ga_vtg_text($v, $lang));
		if ($r[0]) { $any = true; }
		$res[] = strtoupper($lang) . ' ' . $chat . ': ' . ($r[0] ? 'sent' : 'FAILED - ' . $r[1]);
	}
	if (!$res) { $res[] = 'No channel is set.'; }
	if ($any) { $o['last_day'] = $today; }
	$o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
	update_option('ga_vtg', $o, false);
	return $res;
}

function ga_vtg_page() {
	if (!current_user_can('manage_options')) { return; }
	$o = ga_vtg_opts();
	$notice = '';
	if (isset($_POST['ga_vtg_action']) && check_admin_referer('ga_vtg')) {
		$act = sanitize_key(wp_unslash($_POST['ga_vtg_action']));
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
			update_option('ga_vtg', $o, false);
			$notice .= 'Saved.';
		} elseif ($act === 'remove') {
			unset($o['token']);
			$o['on'] = 0;
			update_option('ga_vtg', $o, false);
			$notice = 'Token removed and auto-posting switched off.';
		} elseif ($act === 'post') {
			$notice = implode(' | ', ga_vtg_run(true));
			$o = ga_vtg_opts();
		}
	}
	$has = !empty($o['token']);
	$en = isset($o['chat_en']) ? $o['chat_en'] : '@GodAlone_in';
	$ta = isset($o['chat_ta']) ? $o['chat_ta'] : '@kadavulmattum_org';
	$hi = isset($o['chat_hi']) ? $o['chat_hi'] : '';
	echo '<div class="wrap"><h1>Verse of the day to Telegram</h1>';
	if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
	echo '<p>Posts the same verse as the website card to your channels every morning (about 6:00 AM IST). The bot must be an admin of each channel with permission to post messages.</p>';
	echo '<form method="post" autocomplete="off">';
	wp_nonce_field('ga_vtg');
	echo '<table class="form-table" role="presentation">';
	echo '<tr><th scope="row"><label for="vtgt">Bot token</label></th><td><input id="vtgt" type="password" name="token" class="regular-text" autocomplete="new-password" placeholder="' . ($has ? 'Saved (ends ...' . esc_attr(substr($o['token'], -4)) . ') - leave blank to keep' : 'Paste the token from @BotFather') . '"></td></tr>';
	echo '<tr><th scope="row"><label for="vtge">English channel</label></th><td><input id="vtge" type="text" name="chat_en" value="' . esc_attr($en) . '" class="regular-text"> <span class="description">e.g. @GodAlone_in</span></td></tr>';
	echo '<tr><th scope="row"><label for="vtgta">Tamil channel</label></th><td><input id="vtgta" type="text" name="chat_ta" value="' . esc_attr($ta) . '" class="regular-text"> <span class="description">e.g. @kadavulmattum_org (leave empty to skip)</span></td></tr>';
	echo '<tr><th scope="row"><label for="vtghi">Hindi channel</label></th><td><input id="vtghi" type="text" name="chat_hi" value="' . esc_attr($hi) . '" class="regular-text"> <span class="description">e.g. @ekkhuda_org (leave empty to skip)</span></td></tr>';
	echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
	echo '</table>';
	echo '<p class="submit"><button type="submit" name="ga_vtg_action" value="save" class="button button-primary">Save</button> ';
	if ($has) {
		echo '<button type="submit" name="ga_vtg_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s verse to the channels now?\');">Post today\'s verse now (test)</button> ';
		echo '<button type="submit" name="ga_vtg_action" value="remove" class="button" onclick="return confirm(\'Remove the saved bot token?\');">Remove token</button>';
	}
	echo '</p></form>';
	if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
	echo '</div>';
}
