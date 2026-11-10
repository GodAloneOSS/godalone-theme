<?php
/* GA-VOTD-2026-11-04 - daily verse e-mail with double opt-in. Loaded from inc-seo-fixes.php inside try/catch. */
if (!defined('ABSPATH')) { exit; }

function ga_votd_table() { global $wpdb; return $wpdb->prefix . 'ga_votd_subs'; }

function ga_votd_site($lang) {
	$m = array('en' => 'https://godalone.in/', 'ta' => 'https://kadavulmattum.org/', 'hi' => 'https://ekkhuda.org/');
	return isset($m[$lang]) ? $m[$lang] : $m['en'];
}

function ga_votd_t($lang) {
	$T = array(
	'en' => array('title' => 'Verse of the day', 'wtitle' => 'Verse of the week', 'q' => 'Quran', 'read' => 'Read in context', 'note' => '',
		'cs' => 'Please confirm your weekly verse', 'cb' => 'Peace be with you. Tap the button below to receive one verse from the Quran every Friday morning. If you did not ask for this, simply ignore this email.', 'cbtn' => 'Yes, send me the weekly verse',
		'foot' => 'You receive this because you subscribed on {site}.', 'unsub' => 'Unsubscribe', 'home' => 'Back to the website',
		'ph' => 'Please confirm', 'pp' => 'Tap the button to start your weekly verse.', 'pbtn' => 'Confirm subscription',
		'dh' => 'You are subscribed', 'dp' => 'Insha Allah, your verse will arrive every Friday morning.',
		'uh' => 'Unsubscribe', 'up' => 'Stop receiving the weekly verse?', 'ubtn' => 'Unsubscribe',
		'gh' => 'Unsubscribed', 'gp' => 'You will no longer receive the weekly verse. Peace be with you.',
		'eh' => 'Link not valid', 'ep' => 'This link has expired or was already used.'),
	'ta' => array('title' => 'இன்றைய வசனம்', 'wtitle' => 'இந்த வார வசனம்', 'q' => 'குர்ஆன்', 'read' => 'சூழலுடன் வாசிக்க', 'note' => '',
		'cs' => 'வாராந்திர வசனத்தை உறுதிப்படுத்துங்கள்', 'cb' => 'அஸ்ஸலாமு அலைக்கும். ஒவ்வொரு வெள்ளிக்கிழமை காலையும் குர்ஆனிலிருந்து ஒரு வசனத்தைப் பெற கீழுள்ள பொத்தானை அழுத்துங்கள். நீங்கள் இதைக் கோரவில்லை என்றால், இந்த மின்னஞ்சலைப் புறக்கணிக்கவும்.', 'cbtn' => 'ஆம், வாராந்திர வசனத்தை அனுப்புங்கள்',
		'foot' => 'நீங்கள் {site} தளத்தில் சந்தா செலுத்தியதால் இதைப் பெறுகிறீர்கள்.', 'unsub' => 'சந்தாவிலிருந்து விலக', 'home' => 'இணையதளத்திற்குத் திரும்ப',
		'ph' => 'உறுதிப்படுத்துங்கள்', 'pp' => 'வாராந்திர வசனத்தைத் தொடங்க பொத்தானை அழுத்துங்கள்.', 'pbtn' => 'சந்தாவை உறுதிப்படுத்து',
		'dh' => 'சந்தா செய்யப்பட்டது', 'dp' => 'இன்ஷா அல்லாஹ், ஒவ்வொரு வெள்ளிக்கிழமை காலையும் உங்கள் வசனம் வரும்.',
		'uh' => 'சந்தாவிலிருந்து விலகல்', 'up' => 'வாராந்திர வசனம் பெறுவதை நிறுத்தவா?', 'ubtn' => 'விலகு',
		'gh' => 'விலகிவிட்டீர்கள்', 'gp' => 'இனி வாராந்திர வசனம் அனுப்பப்படாது. இறைவனின் சாந்தி உங்கள் மீது உண்டாகட்டும்.',
		'eh' => 'இணைப்பு செல்லாது', 'ep' => 'இந்த இணைப்பு காலாவதியாகிவிட்டது அல்லது ஏற்கெனவே பயன்படுத்தப்பட்டது.'),
	'hi' => array('title' => 'आज की आयत', 'wtitle' => 'इस हफ़्ते की आयत', 'q' => 'क़ुरआन', 'read' => 'संदर्भ सहित पढ़ें', 'note' => 'अनुवाद: अंग्रेज़ी (इस आयत का हिंदी अनुवाद अभी उपलब्ध नहीं है)',
		'cs' => 'साप्ताहिक आयत की पुष्टि कीजिए', 'cb' => 'अस्सलामु अलैकुम। हर जुमे की सुबह क़ुरआन की एक आयत पाने के लिए नीचे दिया बटन दबाइए। अगर आपने यह नहीं माँगा था, तो इस ईमेल को नज़रअंदाज़ कर दीजिए।', 'cbtn' => 'हाँ, साप्ताहिक आयत भेजिए',
		'foot' => 'आपको यह ईमेल इसलिए मिल रहा है क्योंकि आपने {site} पर सदस्यता ली थी।', 'unsub' => 'सदस्यता रद्द करें', 'home' => 'वेबसाइट पर लौटें',
		'ph' => 'पुष्टि कीजिए', 'pp' => 'साप्ताहिक आयत शुरू करने के लिए बटन दबाइए।', 'pbtn' => 'सदस्यता की पुष्टि करें',
		'dh' => 'सदस्यता हो गई', 'dp' => 'इन्शा अल्लाह, हर जुमे की सुबह आपकी आयत आएगी।',
		'uh' => 'सदस्यता रद्द करें', 'up' => 'क्या साप्ताहिक आयत मिलना बंद करना है?', 'ubtn' => 'रद्द करें',
		'gh' => 'सदस्यता रद्द हो गई', 'gp' => 'अब आपको साप्ताहिक आयत नहीं भेजी जाएगी। आप पर सलामती हो।',
		'eh' => 'लिंक मान्य नहीं', 'ep' => 'यह लिंक पुराना हो चुका है या पहले इस्तेमाल हो चुका है।'),
	);
	return isset($T[$lang]) ? $T[$lang] : $T['en'];
}

/* ---------- table + schedule ---------- */
add_action('init', function () {
	if (get_option('ga_votd_db') !== '1') {
		global $wpdb;
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		$t = ga_votd_table();
		$c = $wpdb->get_charset_collate();
		dbDelta("CREATE TABLE $t (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			email varchar(190) NOT NULL,
			lang varchar(2) NOT NULL DEFAULT 'en',
			token varchar(40) NOT NULL,
			confirmed tinyint(1) NOT NULL DEFAULT 0,
			created datetime NOT NULL,
			confirmed_at datetime NULL,
			src varchar(60) NOT NULL DEFAULT '',
			PRIMARY KEY  (id),
			UNIQUE KEY email (email),
			KEY token (token)
		) $c;");
		update_option('ga_votd_db', '1', false);
	}
	if (wp_next_scheduled('ga_votd_daily')) { wp_clear_scheduled_hook('ga_votd_daily'); }
	if (!wp_next_scheduled('ga_votd_weekly')) {
		wp_schedule_event(strtotime('next friday 00:30:00 UTC'), 'weekly', 'ga_votd_weekly');
	}
});

/* ---------- mail helpers ---------- */
function ga_votd_link($act, $token) { return home_url('/') . '?ga_votd=' . $act . '&t=' . $token; }

function ga_votd_headers($unsub = '') {
	$h = array('Content-Type: text/html; charset=UTF-8', 'From: GodAlone.in <no-reply@godalone.in>');
	if ($unsub) { $h[] = 'List-Unsubscribe: <' . $unsub . '>'; $h[] = 'List-Unsubscribe-Post: List-Unsubscribe=One-Click'; }
	return $h;
}

function ga_votd_shell($lang, $inner, $unsub) {
	$T = ga_votd_t($lang);
	$font = "-apple-system,'Segoe UI',Roboto,'Noto Sans Tamil','Noto Sans Devanagari',Arial,sans-serif";
	$h = '<!doctype html><html><body style="margin:0;background:#0A1024;padding:24px 12px;font-family:' . $font . '">';
	$h .= '<div style="max-width:560px;margin:0 auto;background:#111B38;border:1px solid #3b3a2f;border-radius:20px;padding:28px 24px;color:#F7F2E6">' . $inner . '</div>';
	$h .= '<p style="max-width:560px;margin:14px auto 0;text-align:center;font-size:12.5px;line-height:1.6;color:#9AA6C8">' . esc_html(str_replace('{site}', (string) parse_url(ga_votd_site($lang), PHP_URL_HOST), $T['foot']));
	if ($unsub) { $h .= ' · <a href="' . esc_url($unsub) . '" style="color:#F7D97E">' . esc_html($T['unsub']) . '</a>'; }
	return $h . '</p></body></html>';
}

function ga_votd_btn($url, $label) {
	return '<p style="text-align:center;margin:22px 0 4px"><a href="' . esc_url($url) . '" style="display:inline-block;padding:13px 24px;border-radius:99px;background:#E5B94E;color:#1b1405;font-weight:700;text-decoration:none">' . esc_html($label) . '</a></p>';
}

function ga_votd_send_confirm($email, $lang, $token) {
	$T = ga_votd_t($lang);
	$inner = '<div style="font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:#F7D97E;font-weight:700;text-align:center">✦ ' . esc_html($T['wtitle']) . '</div>';
	$inner .= '<p style="font-size:16px;line-height:1.7;text-align:center;margin:18px 0 0;color:#F7F2E6">' . esc_html($T['cb']) . '</p>';
	$inner .= ga_votd_btn(ga_votd_link('confirm', $token), $T['cbtn']);
	return wp_mail($email, $T['cs'], ga_votd_shell($lang, $inner, ''), ga_votd_headers());
}

function ga_votd_verse_for($ts) {
	$f = ABSPATH . 'quran/votd.json';
	if (!is_readable($f)) { return null; }
	$d = json_decode((string) file_get_contents($f), true);
	if (!is_array($d) || !$d) { return null; }
	return $d[((int) floor($ts / 86400)) % count($d)];
}

function ga_votd_daily_mail($v, $lang) {
	$T = ga_votd_t($lang);
	$has = !empty($v[$lang]);
	$tr = $has ? $v[$lang] : $v['en'];
	$ref = $T['q'] . ' ' . $v['s'] . ':' . $v['a'];
	$url = 'https://godalone.in/quran/#/' . $v['s'] . '/' . $v['a'];
	$b = '<div style="font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:#F7D97E;font-weight:700;text-align:center">✦ ' . esc_html($T['wtitle']) . '</div>';
	$b .= '<div style="text-align:center;margin:10px 0 18px"><span style="display:inline-block;padding:4px 12px;border:1px solid #6b5a2a;border-radius:99px;font-size:13px;color:#F7F2E6">' . esc_html($ref) . '</span></div>';
	$b .= '<p dir="rtl" lang="ar" style="font-family:Amiri,\'Traditional Arabic\',\'Geeza Pro\',serif;font-size:28px;line-height:2;text-align:center;margin:0 0 16px;color:#F7F2E6">' . esc_html($v['ar']) . '</p>';
	$b .= '<p style="font-size:18px;line-height:1.65;text-align:center;margin:0 0 8px;color:#F7F2E6">' . esc_html($tr) . '</p>';
	if (!$has && $lang !== 'en' && $T['note'] !== '') { $b .= '<p style="font-size:12.5px;text-align:center;color:#9AA6C8;margin:0 0 8px">' . esc_html($T['note']) . '</p>'; }
	$b .= ga_votd_btn($url, $T['read'] . ' →');
	return array('subject' => $T['wtitle'] . ' - ' . $ref, 'html' => $b);
}

/* ---------- weekly send (WP-cron, Friday 00:30 UTC = 06:00 IST), batches of 100 ---------- */
add_action('ga_votd_weekly', 'ga_votd_run');
add_action('ga_votd_run_more', 'ga_votd_run');
function ga_votd_run() {
	global $wpdb;
	$t = ga_votd_table();
	$today = gmdate('o-\WW');
	$st = get_option('ga_votd_state', array());
	if (!is_array($st) || empty($st['d']) || $st['d'] !== $today) { $st = array('d' => $today, 'last' => 0, 'done' => 0); }
	if (!empty($st['done'])) { return; }
	$v = ga_votd_verse_for(time());
	if (!$v) { return; }
	if (function_exists('set_time_limit')) { @set_time_limit(240); }
	$rows = $wpdb->get_results($wpdb->prepare("SELECT id,email,lang,token FROM $t WHERE confirmed=1 AND id>%d ORDER BY id ASC LIMIT 100", (int) $st['last']));
	foreach ((array) $rows as $r) {
		$unsub = ga_votd_link('unsub', $r->token);
		$m = ga_votd_daily_mail($v, $r->lang);
		wp_mail($r->email, $m['subject'], ga_votd_shell($r->lang, $m['html'], $unsub), ga_votd_headers($unsub));
		$st['last'] = (int) $r->id;
		update_option('ga_votd_state', $st, false);
		usleep(150000);
	}
	if (count((array) $rows) < 100) { $st['done'] = 1; } else { wp_schedule_single_event(time() + 600, 'ga_votd_run_more'); }
	update_option('ga_votd_state', $st, false);
}

/* ---------- subscribe endpoint (CORS-friendly form POST from the three sites) ---------- */
add_action('rest_api_init', function () {
	register_rest_route('ga/v1', '/subscribe', array('methods' => 'POST', 'callback' => 'ga_votd_subscribe', 'permission_callback' => '__return_true'));
});

function ga_votd_subscribe($r) {
	$ok = new WP_REST_Response(array('ok' => true), 200);
	if ((string) $r->get_param('website') !== '') { return $ok; }
	$email = sanitize_email(trim((string) $r->get_param('email')));
	$lang = (string) $r->get_param('lang');
	if (!in_array($lang, array('en', 'ta', 'hi'), true)) { $lang = 'en'; }
	if (!is_email($email) || strlen($email) > 190) { return new WP_REST_Response(array('ok' => false, 'error' => 'email'), 400); }
	$ip = md5(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	$n = (int) get_transient('ga_votd_ip_' . $ip);
	if ($n >= 5) { return new WP_REST_Response(array('ok' => false, 'error' => 'rate'), 429); }
	set_transient('ga_votd_ip_' . $ip, $n + 1, HOUR_IN_SECONDS);
	$ek = 'ga_votd_em_' . md5(strtolower($email));
	if (get_transient($ek)) { return $ok; }
	set_transient($ek, 1, 10 * MINUTE_IN_SECONDS);
	global $wpdb;
	$t = ga_votd_table();
	$row = $wpdb->get_row($wpdb->prepare("SELECT id,confirmed FROM $t WHERE email=%s", $email));
	if ($row && (int) $row->confirmed === 1) { return $ok; }
	$token = wp_generate_password(32, false, false);
	if ($row) {
		$wpdb->update($t, array('token' => $token, 'lang' => $lang), array('id' => $row->id));
	} else {
		$wpdb->insert($t, array('email' => $email, 'lang' => $lang, 'token' => $token, 'confirmed' => 0, 'created' => current_time('mysql', true), 'src' => substr(sanitize_text_field((string) $r->get_param('src')), 0, 60)));
	}
	if (!ga_votd_send_confirm($email, $lang, $token)) { return new WP_REST_Response(array('ok' => false, 'error' => 'mail'), 500); }
	return $ok;
}

/* ---------- confirm / unsubscribe pages (GET shows a button, POST does it: safe from mail-scanner prefetch) ---------- */
add_action('template_redirect', 'ga_votd_page', 0);
function ga_votd_page() {
	if (!isset($_GET['ga_votd']) || !isset($_GET['t'])) { return; }
	$act = sanitize_key(wp_unslash($_GET['ga_votd']));
	$tok = preg_replace('/[^A-Za-z0-9]/', '', (string) wp_unslash($_GET['t']));
	if (($act !== 'confirm' && $act !== 'unsub') || strlen($tok) < 20) { return; }
	if (!defined('DONOTCACHEPAGE')) { define('DONOTCACHEPAGE', true); }
	do_action('litespeed_control_set_nocache', 'ga votd');
	nocache_headers();
	header('X-Robots-Tag: noindex, nofollow');
	global $wpdb;
	$t = ga_votd_table();
	$row = $wpdb->get_row($wpdb->prepare("SELECT id,lang FROM $t WHERE token=%s", $tok));
	if (!$row) { ga_votd_out('en', 'e'); }
	$lang = $row->lang;
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($act === 'confirm') {
			$wpdb->update($t, array('confirmed' => 1, 'confirmed_at' => current_time('mysql', true)), array('id' => $row->id));
			ga_votd_out($lang, 'd');
		}
		$wpdb->delete($t, array('id' => $row->id));
		ga_votd_out($lang, 'g');
	}
	ga_votd_out($lang, $act === 'confirm' ? 'c' : 'u');
}

function ga_votd_out($lang, $state) {
	$T = ga_votd_t($lang);
	$map = array(
		'c' => array($T['ph'], $T['pp'], $T['pbtn']), 'u' => array($T['uh'], $T['up'], $T['ubtn']),
		'd' => array($T['dh'], $T['dp'], ''), 'g' => array($T['gh'], $T['gp'], ''), 'e' => array($T['eh'], $T['ep'], ''),
	);
	$m = $map[$state];
	status_header(200);
	header('Content-Type: text/html; charset=UTF-8');
	$o = '<!doctype html><html lang="' . esc_attr($lang) . '"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>' . esc_html($m[0]) . '</title></head>';
	$o .= '<body style="margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;background:#0A1024;color:#F7F2E6;font-family:-apple-system,\'Segoe UI\',Roboto,\'Noto Sans Tamil\',\'Noto Sans Devanagari\',Arial,sans-serif;padding:20px">';
	$o .= '<main style="max-width:480px;text-align:center;background:#111B38;border:1px solid #3b3a2f;border-radius:22px;padding:32px 26px"><h1 style="font-size:26px;margin:0 0 12px;color:#F7D97E;font-weight:600">' . esc_html($m[0]) . '</h1><p style="font-size:17px;line-height:1.65;margin:0 0 22px">' . esc_html($m[1]) . '</p>';
	if ($m[2] !== '') { $o .= '<form method="post" action=""><button type="submit" style="min-height:48px;padding:12px 26px;border:0;border-radius:99px;background:#E5B94E;color:#1b1405;font-weight:700;font-size:16px;cursor:pointer">' . esc_html($m[2]) . '</button></form>'; }
	else { $o .= '<a href="' . esc_url(ga_votd_site($lang)) . '" style="color:#F7D97E;font-weight:700">' . esc_html($T['home']) . ' →</a>'; }
	echo $o . '</main></body></html>';
	exit;
}
