<?php
/* GA-VFB-2026-11-10 - post the verse of the day to Facebook Pages. Needs a Page ID + Page Access Token
   per language, saved in Settings > Verse to Facebook.
   Loaded from inc-seo-fixes.php inside try/catch. */
if (!defined('ABSPATH')) { exit; }

function ga_vfb_opts() { $o = get_option('ga_vfb', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
	add_options_page('Verse of the day to Facebook', 'Verse to Facebook', 'manage_options', 'ga-vfb', 'ga_vfb_page');
});

add_action('init', function () {
	if (!wp_next_scheduled('ga_vfb_daily')) {
		wp_schedule_event(strtotime('tomorrow 00:40:00 UTC'), 'daily', 'ga_vfb_daily');
	}
});
add_action('ga_vfb_daily', function () { ga_vfb_run(false); });

function ga_vfb_text($v, $lang) {
	if (!function_exists('ga_votd_t')) { return ''; }
	$T = ga_votd_t($lang);
	$tr = !empty($v[$lang]) ? $v[$lang] : $v['en'];
	if (empty($v[$lang]) && !empty($T['note'])) { $tr .= "\n\n" . $T['note']; }
	$ref = $T['q'] . ' ' . $v['s'] . ':' . $v['a'];
	$url = 'https://godalone.in/quran/#/' . $v['s'] . '/' . $v['a'];
	return "\xE2\x9C\xA6 " . ($lang === 'ta' ? 'Kadavulmattum.org' : ($lang === 'hi' ? 'Ekkhuda.org' : 'GodAlone.in')) . ' ' . $T['title'] . "\n\n" . $v['ar'] . "\n\n" . $tr . "\n\n" . $ref . "\n" . $T['read'] . ': ' . $url;
}

function ga_vfb_send($page_id, $token, $text) {
	$r = wp_remote_post('https://graph.facebook.com/v21.0/' . rawurlencode($page_id) . '/feed', array(
		'timeout' => 20,
		'body'    => array('message' => $text, 'access_token' => $token),
	));
	if (is_wp_error($r)) { return array(false, str_replace($token, '***', $r->get_error_message())); }
	$j = json_decode(wp_remote_retrieve_body($r), true);
	if (is_array($j) && !empty($j['id'])) { return array(true, 'posted'); }
	$msg = (is_array($j) && isset($j['error']['message'])) ? $j['error']['message'] : ('HTTP ' . wp_remote_retrieve_response_code($r));
	return array(false, str_replace($token, '***', $msg));
}

function ga_vfb_run($force) {
	$o = ga_vfb_opts();
	if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
	$today = gmdate('Y-m-d');
	if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
	if (!function_exists('ga_votd_verse_for')) { return array('Verse data is unavailable.'); }
	$v = ga_votd_verse_for(time());
	if (!$v) { return array('Verse data is unavailable.'); }
	$res = array();
	$any = false;
	foreach (array('en', 'ta', 'hi') as $lang) {
		$page  = isset($o['page_' . $lang]) ? trim((string) $o['page_' . $lang]) : '';
		$token = isset($o['token_' . $lang]) ? trim((string) $o['token_' . $lang]) : '';
		if ($page === '' || $token === '') { continue; }
		$r = ga_vfb_send($page, $token, ga_vfb_text($v, $lang));
		if ($r[0]) { $any = true; }
		$res[] = strtoupper($lang) . ' page ' . $page . ': ' . ($r[0] ? 'posted' : 'FAILED - ' . $r[1]);
	}
	if (!$res) { $res[] = 'No Facebook Page is set.'; }
	if ($any) { $o['last_day'] = $today; }
	$o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
	update_option('ga_vfb', $o, false);
	return $res;
}

function ga_vfb_page() {
	if (!current_user_can('manage_options')) { return; }
	$o = ga_vfb_opts();
	$notice = '';
	if (isset($_POST['ga_vfb_action']) && check_admin_referer('ga_vfb')) {
		$act = sanitize_key(wp_unslash($_POST['ga_vfb_action']));
		if ($act === 'save') {
			foreach (array('en', 'ta', 'hi') as $l) {
				$pg = isset($_POST['page_' . $l]) ? trim((string) wp_unslash($_POST['page_' . $l])) : '';
				$o['page_' . $l] = preg_match('/^[0-9]{5,25}$/', $pg) ? $pg : '';
				$tok = isset($_POST['token_' . $l]) ? trim((string) wp_unslash($_POST['token_' . $l])) : '';
				if ($tok !== '') {
					if (strlen($tok) >= 40) { $o['token_' . $l] = $tok; }
					else { $notice .= 'The ' . strtoupper($l) . ' token did not look right, so it was not changed. '; }
				}
			}
			$o['on'] = isset($_POST['on']) ? 1 : 0;
			update_option('ga_vfb', $o, false);
			$notice .= 'Saved.';
		} elseif ($act === 'remove') {
			foreach (array('en', 'ta', 'hi') as $l) { unset($o['token_' . $l]); }
			$o['on'] = 0;
			update_option('ga_vfb', $o, false);
			$notice = 'Tokens removed and auto-posting switched off.';
		} elseif ($act === 'post') {
			$notice = implode(' | ', ga_vfb_run(true));
			$o = ga_vfb_opts();
		}
	}
	$has_any = !empty($o['token_en']) || !empty($o['token_ta']) || !empty($o['token_hi']);
	echo '<div class="wrap"><h1>Verse of the day to Facebook</h1>';
	if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
	echo '<p>Posts the same verse as the website card to each site&#8217;s Facebook Page every morning (about 6:10 AM IST). For each Page you need its numeric Page ID and a Page Access Token: open Facebook\'s Graph API Explorer (developers.facebook.com/tools/explorer), choose the app and the Page, select the <code>pages_manage_posts</code> and <code>pages_read_engagement</code> permissions, generate a token, then use the Access Token Debugger to extend it to a long-lived (never-expiring Page) token.</p>';
	echo '<form method="post" autocomplete="off">';
	wp_nonce_field('ga_vfb');
	echo '<table class="form-table" role="presentation">';
	foreach (array('en' => 'English (GodAlone.in)', 'ta' => 'Tamil (Kadavulmattum.org)', 'hi' => 'Hindi (Ekkhuda.org)') as $l => $label) {
		$pg  = isset($o['page_' . $l]) ? $o['page_' . $l] : '';
		$has = !empty($o['token_' . $l]);
		echo '<tr><th scope="row" colspan="2"><strong>' . esc_html($label) . '</strong></th></tr>';
		echo '<tr><th scope="row"><label for="vfbp' . $l . '">Page ID</label></th><td><input id="vfbp' . $l . '" type="text" name="page_' . $l . '" value="' . esc_attr($pg) . '" class="regular-text"></td></tr>';
		echo '<tr><th scope="row"><label for="vfbt' . $l . '">Page Access Token</label></th><td><input id="vfbt' . $l . '" type="password" name="token_' . $l . '" class="regular-text" autocomplete="new-password" placeholder="' . ($has ? 'Saved (ends ...' . esc_attr(substr($o['token_' . $l], -4)) . ') - leave blank to keep' : 'Paste the Page Access Token') . '"></td></tr>';
	}
	echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
	echo '</table>';
	echo '<p class="submit"><button type="submit" name="ga_vfb_action" value="save" class="button button-primary">Save</button> ';
	if ($has_any) {
		echo '<button type="submit" name="ga_vfb_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s verse to Facebook now?\');">Post today\'s verse now (test)</button> ';
		echo '<button type="submit" name="ga_vfb_action" value="remove" class="button" onclick="return confirm(\'Remove all saved Facebook tokens?\');">Remove tokens</button>';
	}
	echo '</p></form>';
	if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
	echo '</div>';
}
