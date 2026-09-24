<?php
/**
 * GodAlone Premium — theme functions
 *
 * Complete drop-in replacement for the godalone-theme. Registers assets,
 * menus, theme supports, the Firebase login config passthrough and the
 * newsletter subscribe AJAX endpoint (same `newsletter_subscribe` action
 * and field names the front-end already uses).
 *
 * NOTE ON THE NEWSLETTER: this ships with a self-contained handler that
 * stores subscribers in the `godalone_subscribers` option and emails the
 * site admin. If your old theme integrated a mail service (Mailchimp,
 * Brevo, etc.), copy that provider code into ga_newsletter_subscribe()
 * below — the AJAX contract (action, fields, JSON shape) is unchanged, so
 * the front-end keeps working either way.
 *
 * NOTE ON THE CONTACT FORM: ga_submit_contact_form() below handles the
 * message form on the Contact page (action: submit_contact_form). It
 * verifies a nonce, sanitizes the submitted fields, and emails the site
 * admin — mirroring the newsletter handler's pattern.
 */

if (!defined('ABSPATH')) exit;

if (!defined('GA_VER')) define('GA_VER', '2.1.9');

/* ---- Firebase config (Google sign-in). Edit here if the project changes. ---- */
function ga_firebase_config() {
	return array(
		'apiKey' => 'AIzaSyAIvmDEiHvbxsyqIqvPnGg08aik1ra4yIw',
		'authDomain' => 'bayyinah-c110a.firebaseapp.com',
		'projectId' => 'bayyinah-c110a',
		'storageBucket' => 'bayyinah-c110a.firebasestorage.app',
		'messagingSenderId' => '831184810834',
		'appId' => '1:831184810834:web:b134bfb3ef6014e9ebc08b',
	);
}

/* ---- Theme supports ---- */
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form','gallery','caption','style','script'));
	add_theme_support('responsive-embeds');
	add_theme_support('custom-logo', array('height'=>80,'width'=>80,'flex-height'=>true,'flex-width'=>true));
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'godalone'),
		'footer' => __('Footer Menu', 'godalone'),
	));
});

/* ---- Assets ---- */
add_action('wp_enqueue_scripts', function () {
	// Google Fonts — matches the /quran reader (Marcellus + Inter + Scheherazade + Tamil)
	wp_enqueue_style(
		'ga-fonts',
		'https://fonts.googleapis.com/css2?family=Marcellus&family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Scheherazade+New:wght@400;700&family=Noto+Sans+Tamil:wght@400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap',
		array(), null
	);
	wp_enqueue_style('ga-style', get_stylesheet_uri(), array('ga-fonts'), GA_VER);

	// Firebase (compat build — same as current site)
	wp_enqueue_script('ga-firebase-app', 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app-compat.js', array(), null, false);
	wp_enqueue_script('ga-firebase-auth', 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth-compat.js', array('ga-firebase-app'), null, false);

	wp_enqueue_script('ga-main', get_template_directory_uri() . '/assets/js/main.js', array(), GA_VER, true);
	wp_localize_script('ga-main', 'GA', array(
		'ajax' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ga_news'),
		'firebase' => ga_firebase_config(),
		'quran' => 'https://godalone.in/quran/',
	));
});

/* ---- Quran Q&A page routing (no wp-admin page created this session) ---- */
add_action('init', function () {
	add_rewrite_rule('^quran-qa/?$', 'index.php?ga_quranqa_page=1', 'top');
	if (get_option('ga_quranqa_rewrite_flushed') !== GA_VER) {
		flush_rewrite_rules(false);
		update_option('ga_quranqa_rewrite_flushed', GA_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'ga_quranqa_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('ga_quranqa_page')) {
		$t = get_stylesheet_directory() . '/page-quran-qa.php';
		if (file_exists($t)) return $t;
	}
	return $template;
});

/* ---- Newsletter subscribe (AJAX). Keeps the old action + field names. ---- */
function ga_newsletter_subscribe() {
	// Honeypot + minimum fill-time (anti-bot)
	if (!empty($_POST['website'])) { wp_send_json(array('success'=>true,'data'=>'Thank you for subscribing!')); }
	$loaded = isset($_POST['form_load_time']) ? intval($_POST['form_load_time']) : 0;
	if ($loaded && (time() - $loaded) < 2) { wp_send_json(array('success'=>false,'data'=>'Please try again.')); }

	$email = isset($_POST['newsletter_email']) ? sanitize_email(wp_unslash($_POST['newsletter_email'])) : '';
	$lang = isset($_POST['newsletter_language']) ? sanitize_text_field(wp_unslash($_POST['newsletter_language'])) : 'english';
	if (!is_email($email)) { wp_send_json(array('success'=>false,'data'=>'Please enter a valid email address.')); }
	if (!in_array($lang, array('english','tamil','both'), true)) $lang = 'english';

	$subs = get_option('godalone_subscribers', array());
	if (!is_array($subs)) $subs = array();
	$subs[$email] = array('lang'=>$lang, 'time'=>current_time('mysql'));
	update_option('godalone_subscribers', $subs, false);

	// notify admin (best-effort; ignore failures)
	@wp_mail(
		'info@godalone.in',
		'New newsletter subscriber — GodAlone.in',
		"Email: {$email}
Language: {$lang}
When: " . current_time('mysql')
	);

	wp_send_json(array('success'=>true,'data'=>'Subscribed, Insha\'Allah! May God accept it.'));
}
add_action('wp_ajax_newsletter_subscribe', 'ga_newsletter_subscribe');
add_action('wp_ajax_nopriv_newsletter_subscribe', 'ga_newsletter_subscribe');

/* ---- Contact form submission (AJAX). Used by the Contact page's message form. ---- */
function ga_submit_contact_form() {
	$nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';
	if (!wp_verify_nonce($nonce, 'contact_form_nonce')) {
		wp_send_json(array('success'=>false,'data'=>'Security check failed. Please refresh the page and try again.'));
	}

	$name = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
	$email = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
	$phone = isset($_POST['contact_phone']) ? sanitize_text_field(wp_unslash($_POST['contact_phone'])) : '';
	$message = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';

	if (empty($name) || empty($message)) {
		wp_send_json(array('success'=>false,'data'=>'Please fill in your name and message.'));
	}
	if (!is_email($email)) {
		wp_send_json(array('success'=>false,'data'=>'Please enter a valid email address.'));
	}

	$body = "Name: {$name}
Email: {$email}
";
	if (!empty($phone)) { $body .= "Phone: {$phone}
"; }
	$body .= "When: " . current_time('mysql') . "

Message:
{$message}";

	$sent = @wp_mail(
		'info@godalone.in',
		'New contact form message — GodAlone.in',
		$body,
		array('Reply-To: ' . $name . ' <' . $email . '>')
	);

	if ($sent) {
		wp_send_json(array('success'=>true,'data'=>'Thank you, Insha\'Allah! Your message has been sent — we will get back to you soon.'));
	} else {
		wp_send_json(array('success'=>false,'data'=>'Sorry, something went wrong sending your message. Please try again or email us directly.'));
	}
}
add_action('wp_ajax_submit_contact_form', 'ga_submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'ga_submit_contact_form');

/* ---- Small admin page to view / export subscribers ---- */
add_action('admin_menu', function () {
	add_menu_page('Subscribers', 'Subscribers', 'manage_options', 'ga-subscribers', function () {
		$subs = get_option('godalone_subscribers', array());
		echo '<div class="wrap"><h1>Newsletter Subscribers (' . count($subs) . ')</h1>';
		echo '<table class="widefat striped"><thead><tr><th>Email</th><th>Language</th><th>Date</th></tr></thead><tbody>';
		foreach ($subs as $em => $row) {
			$lang = is_array($row) ? esc_html($row['lang']) : '';
			$time = is_array($row) ? esc_html($row['time']) : '';
			echo '<tr><td>' . esc_html($em) . '</td><td>' . $lang . '</td><td>' . $time . '</td></tr>';
		}
		echo '</tbody></table></div>';
	}, 'dashicons-email', 26);
});

/* ---- Helper: render the primary nav (falls back to the built-in link set) ---- */
function ga_primary_menu() {
	if (has_nav_menu('primary')) {
		wp_nav_menu(array('theme_location'=>'primary','container'=>false,'items_wrap'=>'%3$s','fallback_cb'=>'ga_default_menu'));
	} else {
		ga_default_menu();
	}
}
function ga_default_menu() {
	$items = array(
		array('🏠', 'Home', home_url('/'), ''),
		array('📖', 'Introduction', home_url('/introduction'), ''),
		array('🔢', 'Mathematical Miracle', home_url('/mathematical-miracle'), ''),
		array('💻', 'Online Quran', home_url('/quran/'), '_blank'),
		array('📱', 'Download Quran', home_url('/downloads'), ''),
		array('🎧', 'Quran Audio', home_url('/audio-quran'), ''),
		array('🛒', 'Purchase Quran', '#buy', 'buy'),
		array('📚', 'Library', home_url('/library'), ''),
		array('🎥', 'Videos', home_url('/videos'), ''),
		array('🤖', 'Telegram Bot', 'https://t.me/quranalonebot', '_blank'),
		array('❤️', 'Charity Trust', home_url('/charity'), ''),
		array('📞', 'Contact', home_url('/contact'), ''),
	);
	foreach ($items as $it) {
		list($emoji, $label, $url, $mode) = $it;
		if ($mode === 'buy') {
			echo '<a class="gh-buy" href="#buy">' . $emoji . ' ' . esc_html($label) . '</a>';
		} else {
			$tgt = $mode === '_blank' ? ' target="_blank" rel="noopener"' : '';
			echo '<a href="' . esc_url($url) . '"' . $tgt . '>' . $emoji . ' ' . esc_html($label) . '</a>';
		}
	}
}

/* ---- Body class helper so front-page sections style correctly ---- */
add_filter('body_class', function ($c) { $c[] = 'ga'; return $c; });
