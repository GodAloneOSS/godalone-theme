<?php
/* GA-PMFB-2026-11-10 - post the daily Quran Picture Message to Facebook Pages.
   Reuses the Page ID + Page Access Token saved in Settings > Verse to Facebook.
   Loaded from inc-seo-fixes.php inside try/catch. */
if (!defined('ABSPATH')) { exit; }

function ga_pmfb_opts() { $o = get_option('ga_pmfb', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
	add_options_page('Picture Message to Facebook', 'Picture Msg to Facebook', 'manage_options', 'ga-pmfb', 'ga_pmfb_page');
});

add_action('init', function () {
	if (!wp_next_scheduled('ga_pmfb_daily')) {
		wp_schedule_event(strtotime('tomorrow 00:45:00 UTC'), 'daily', 'ga_pmfb_daily');
	}
});
add_action('ga_pmfb_daily', function () { ga_pmfb_run(false); });

function ga_pmfb_label($lang) {
	return $lang === 'ta' ? 'Kadavulmattum.org' : ($lang === 'hi' ? 'Ekkhuda.org' : 'GodAlone.in');
}

function ga_pmfb_pm_lang($lang) {
	$map = array('en' => 'e', 'ta' => 't', 'hi' => 'h');
	return isset($map[$lang]) ? $map[$lang] : $lang;
}

function ga_pmfb_caption($stem, $lang) {
	if (!preg_match('/^(\d{1,3})\.(\d{1,3})/', $stem, $m)) { return ''; }
	$T = function_exists('ga_votd_t') ? ga_votd_t($lang) : array('q' => 'Quran', 'title' => 'Verse of the day');
	$ref = $T['q'] . ' ' . $m[1] . ':' . $m[2];
	$url = 'https://godalone.in/picture-messages/#' . $stem;
	return "\xE2\x9C\xA6 " . ga_pmfb_label($lang) . " \xE2\x80\x94 Quran Picture Message" . "\n\n" . $ref . "\n" . $url;
}

function ga_pmfb_send_photo($page_id, $token, $photo_url, $caption) {
	$r = wp_remote_post('https://graph.facebook.com/v21.0/' . rawurlencode($page_id) . '/photos', array(
		'timeout' => 30,
		'body'    => array('url' => $photo_url, 'caption' => $caption, 'access_token' => $token),
	));
	if (is_wp_error($r)) { return array(false, str_replace($token, '***', $r->get_error_message())); }
	$j = json_decode(wp_remote_retrieve_body($r), true);
	if (is_array($j) && !empty($j['id'])) { return array(true, 'posted'); }
	$msg = (is_array($j) && isset($j['error']['message'])) ? $j['error']['message'] : ('HTTP ' . wp_remote_retrieve_response_code($r));
	return array(false, str_replace($token, '***', $msg));
}

function ga_pmfb_run($force) {
	$o = ga_pmfb_opts();
	$v = function_exists('ga_vfb_opts') ? ga_vfb_opts() : get_option('ga_vfb', array());
	if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
	$today = gmdate('Y-m-d');
	if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
	if (!function_exists('ga_pm_daily') || !function_exists('ga_pm_find')) { return array('Picture message data is unavailable.'); }
	$res = array();
	$any = false;
	foreach (array('en', 'ta', 'hi') as $lang) {
		$page  = isset($v['page_' . $lang]) ? trim((string) $v['page_' . $lang]) : '';
		$token = isset($v['token_' . $lang]) ? trim((string) $v['token_' . $lang]) : '';
		if ($page === '' || $token === '') { continue; }
		$stem = ga_pm_daily(ga_pmfb_pm_lang($lang));
		if ($stem === '' || !ga_pm_find($stem)) { $res[] = strtoupper($lang) . ' page ' . $page . ': FAILED - no picture available for this language yet.'; continue; }
		$photo_url = home_url('/picture-messages/img/?f=' . rawurlencode($stem) . '&s=full');
		$caption   = ga_pmfb_caption($stem, $lang);
		$r = ga_pmfb_send_photo($page, $token, $photo_url, $caption);
		if ($r[0]) { $any = true; }
		$res[] = strtoupper($lang) . ' page ' . $page . ' (' . $stem . '): ' . ($r[0] ? 'posted' : 'FAILED - ' . $r[1]);
	}
	if (!$res) { $res[] = 'No Facebook Page is set (set it in Settings > Verse to Facebook).'; }
	if ($any) { $o['last_day'] = $today; }
	$o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
	update_option('ga_pmfb', $o, false);
	return $res;
}

function ga_pmfb_page() {
	if (!current_user_can('manage_options')) { return; }
	$o = ga_pmfb_opts();
	$notice = '';
	if (isset($_POST['ga_pmfb_action']) && check_admin_referer('ga_pmfb')) {
		$act = sanitize_key(wp_unslash($_POST['ga_pmfb_action']));
		if ($act === 'save') {
			$o['on'] = isset($_POST['on']) ? 1 : 0;
			update_option('ga_pmfb', $o, false);
			$notice = 'Saved.';
		} elseif ($act === 'post') {
			$notice = implode(' | ', ga_pmfb_run(true));
			$o = ga_pmfb_opts();
		}
	}
	$v = function_exists('ga_vfb_opts') ? ga_vfb_opts() : get_option('ga_vfb', array());
	$has_any = !empty($v['token_en']) || !empty($v['token_ta']) || !empty($v['token_hi']);
	echo '<div class="wrap"><h1>Quran Picture Message to Facebook</h1>';
	if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
	echo '<p>Posts today&#8217;s Quran Picture Message (same picture as the website) to each site&#8217;s Facebook Page every morning, a few minutes after the verse-of-the-day post (about 6:15 AM IST).</p>';
	if ($has_any) {
		echo '<p><strong>Facebook Page IDs and tokens are already saved</strong> from Settings &gt; Verse to Facebook, and are reused here automatically.</p>';
	} else {
		echo '<p>Please set up the Page ID and Page Access Token for each site first in <a href="' . esc_url(admin_url('options-general.php?page=ga-vfb')) . '">Settings &gt; Verse to Facebook</a>.</p>';
	}
	echo '<form method="post" autocomplete="off">';
	wp_nonce_field('ga_pmfb');
	echo '<table class="form-table" role="presentation">';
	echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
	echo '</table>';
	echo '<p class="submit"><button type="submit" name="ga_pmfb_action" value="save" class="button button-primary">Save</button> ';
	if ($has_any) {
		echo '<button type="submit" name="ga_pmfb_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s picture message to Facebook now?\');">Post today\'s picture now (test)</button>';
	}
	echo '</p></form>';
	if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
	echo '</div>';
}
