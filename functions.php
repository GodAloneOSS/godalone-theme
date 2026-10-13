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

if (!defined('GA_VER')) define('GA_VER', '2.2.0');

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

/* ---- FAQ page routing (no wp-admin page created this session) ---- */
add_action('init', function () {
	add_rewrite_rule('^faq/?$', 'index.php?ga_faq_page=1', 'top');
	if (get_option('ga_faq_rewrite_flushed') !== GA_VER) {
		flush_rewrite_rules(false);
		update_option('ga_faq_rewrite_flushed', GA_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'ga_faq_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('ga_faq_page')) {
		$t = get_stylesheet_directory() . '/page-faq.php';
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


/* ---------- Advanced search index (kh_index) — powers deeper search across videos, library, downloads and tool pages ---------- */
add_action('init', function () {
	register_post_type('kh_index', array(
		'label' => 'Search Index',
		'public' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => false,
		'show_ui' => false,
		'supports' => array('title', 'excerpt'),
	));
});

add_filter('pre_get_posts', function ($q) {
	if (!is_admin() && $q->is_main_query() && $q->is_search()) {
		$q->set('post_type', array('post', 'page', 'kh_index'));
	}
});

function kh_index_url($post_id) {
	$u = get_post_meta($post_id, '_kh_url', true);
	return $u ? $u : get_permalink($post_id);
}

function kh_highlight_plain($text, $query) {
	$text = esc_html($text);
	$query = trim((string) $query);
	if ($query === '') return $text;
	return preg_replace('/(' . preg_quote(esc_html($query), '/') . ')/iu', '<mark class="srch-hl">$1</mark>', $text);
}

function kh_highlight_excerpt($raw, $query, $radius = 90) {
	$text = wp_strip_all_tags($raw);
	$query = trim((string) $query);
	$len = mb_strlen($text);
	$start = 0;
	$pos = ($query !== '') ? mb_stripos($text, $query) : false;
	if ($pos !== false) {
		$start = max(0, $pos - (int) ($radius / 2));
	}
	$snippet = mb_substr($text, $start, $radius * 2);
	$prefix = ($start > 0) ? '…' : '';
	$suffix = (($start + mb_strlen($snippet)) < $len) ? '…' : '';
	$escaped = esc_html($snippet);
	if ($query !== '') {
		$escaped = preg_replace('/(' . preg_quote(esc_html($query), '/') . ')/iu', '<mark class="srch-hl">$1</mark>', $escaped);
	}
	return $prefix . $escaped . $suffix;
}

function kh_seed_index_items() {
	return array(
		array('title' => 'Dr. Rashad Khalifa — Speeches', 'excerpt' => 'YouTube playlist — talks and lectures by Dr. Rashad Khalifa.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lqdebZHRvd6Fzja7Mvqzgj'),
		array('title' => 'English Quran Audio', 'excerpt' => 'YouTube playlist — the complete English Quran audio recitation.', 'url' => 'https://www.youtube.com/playlist?list=PL1ZWur9ydxbTFg--5zWUILdBvc_UiLEN2'),
		array('title' => 'HiddenSecret.org Videos', 'excerpt' => 'YouTube — the full playlist library from the HiddenSecret.org channel.', 'url' => 'https://www.youtube.com/@HiddenSecret741/playlists'),
		array('title' => 'Dikr Meditation', 'excerpt' => 'YouTube playlist — remembrance of GOD, dhikr and meditation audio.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lEOC9JOUUjywIeFANWHdfY'),
		array('title' => 'Submission Shorts', 'excerpt' => 'YouTube playlist — short reminders on Submission to GOD Alone.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7m2fgsXr-mSzvfei1Kom6-d'),
		array('title' => 'Tamil Quran Audio', 'excerpt' => 'YouTube playlist — the complete Tamil Quran audio recitation.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7n2A0q5CqE1m6kavQuthQHV'),
		array('title' => 'Dr. Rashad Khalifa Speech (Tamil)', 'excerpt' => "YouTube playlist — Dr. Rashad Khalifa's teachings, in Tamil.", 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7m5XjjdP8KwZgHliPMDtIj2'),
		array('title' => 'Tamil Jummah Bayan', 'excerpt' => 'YouTube playlist — Friday (Jummah) reminders in Tamil.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lME7RdoIgVTZA64KHZHs9B'),
		array('title' => 'Tamil Quran Study', 'excerpt' => 'YouTube playlist — in-depth Quran study sessions in Tamil.', 'url' => 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7kaca87xieCFDTMfieHQGRC'),
		array('title' => 'Hindi Jummah', 'excerpt' => 'YouTube playlist — Friday (Jummah) reminders in Hindi.', 'url' => 'https://www.youtube.com/playlist?list=PLBnAo-0FxRAB9pIwHWZWtE45DMBF0VvMc'),

		array('title' => 'Quran: Arabic-English (Revised Edition)', 'excerpt' => 'Book in the Library — Quran translation, Arabic-English, Revised Edition.', 'url' => home_url('/library/')),
		array('title' => 'குர்ஆன்: இறுதி வேதம் (திருத்தப்பட்ட பதிப்பு)', 'excerpt' => 'Library — Tamil Quran translation, revised edition.', 'url' => home_url('/library/')),
		array('title' => 'Quran: English (Revised Edition)', 'excerpt' => 'Book in the Library — Quran translation, English, Revised Edition.', 'url' => home_url('/library/')),
		array('title' => 'Quran Hadith and Islam', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => 'குர்ஆன் ஹதீஸ் மற்றும் இஸ்லாம்', 'excerpt' => 'Library — Tamil edition.', 'url' => home_url('/library/')),
		array('title' => 'कुरान हदीस और इस्लाम', 'excerpt' => 'Library — Hindi edition.', 'url' => home_url('/library/')),
		array('title' => 'قرآن حدیث اور اسلام', 'excerpt' => 'Library — Urdu edition.', 'url' => home_url('/library/')),
		array('title' => 'Visual Presentation of the Miracle', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => 'THE COMPUTER SPEAKS', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => 'Beyond Probability', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => 'Quranic Prayers & Names of Allah', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => '64 Collection of Muslim Perspective', 'excerpt' => 'Book in the Library.', 'url' => home_url('/library/')),
		array('title' => 'புதிய நினைவூட்டல்', 'excerpt' => 'Library — 26-issue Tamil monthly reminder series.', 'url' => home_url('/puthiya-ninaivootal/')),

		array('title' => 'Quran WebApp', 'excerpt' => 'Downloads — read the Quran online in a web app.', 'url' => home_url('/downloads/')),
		array('title' => 'Quran WebApp with Advanced AI Features', 'excerpt' => 'Downloads — Quran web app with AI features.', 'url' => home_url('/downloads/')),
		array('title' => 'Android apps', 'excerpt' => 'Downloads — Android apps for Quran and Submission.', 'url' => home_url('/downloads/')),
		array('title' => 'Google Play Book Reader', 'excerpt' => 'Downloads — Android book reader app.', 'url' => home_url('/downloads/')),
		array('title' => 'iPhone & iPad apps', 'excerpt' => 'Downloads — iOS apps for Quran and Submission.', 'url' => home_url('/downloads/')),
		array('title' => 'Quran Study — Word by Word', 'excerpt' => 'Downloads — word-by-word Quran study app.', 'url' => home_url('/downloads/')),
		array('title' => 'PDF downloads', 'excerpt' => 'Downloads — Quran and book PDFs.', 'url' => home_url('/downloads/')),
		array('title' => 'Tamil Quran PDF', 'excerpt' => 'Downloads — Tamil Quran PDF.', 'url' => home_url('/downloads/')),

		array('title' => 'Quran Q&A / Quranic Quiz', 'excerpt' => 'Test your Quranic knowledge — questions and answers, quiz.', 'url' => home_url('/quran-qa/')),
		array('title' => '19 Calculator', 'excerpt' => 'Mathematical Miracle calculator — explore the numerical code (19) of the Quran.', 'url' => home_url('/calculator-19/')),
		array('title' => 'Ramadan Calculator', 'excerpt' => 'Fasting calculator — Ramadan dates, Suhoor and Iftar times.', 'url' => home_url('/ramadan-calculator/')),
		array('title' => 'Salat Timing', 'excerpt' => 'Prayer times — Fajr, Dhuhr, Asr, Maghrib, Isha (Namaz timing).', 'url' => home_url('/salat-timing/')),
		array('title' => 'Zakat Calculator', 'excerpt' => 'Charity calculator — calculate your obligatory Zakat (Nisab).', 'url' => home_url('/zakat-calculator/')),
		array('title' => 'Charity', 'excerpt' => 'Give charity — Sadaqah and donations.', 'url' => home_url('/charity/')),
		array('title' => 'Mathematical Miracle', 'excerpt' => 'The numerical (19-based) structure and mathematical miracle of the Quran.', 'url' => home_url('/mathematical-miracle/')),
		array('title' => 'Quran Coloring Book for Kids', 'excerpt' => '24 Quran stories to colour — a kids activity book, including Building the Ka\'bah.', 'url' => home_url('/coloring-book/')),
		array('title' => 'Audio Quran', 'excerpt' => 'Listen to Quran recitation — audio Quran.', 'url' => home_url('/audio-quran/')),
	);
}

function kh_seed_index() {
	foreach (kh_seed_index_items() as $it) {
		$key = 'khidx-' . md5($it['title']);
		$q = new WP_Query(array('post_type'=>'kh_index','meta_key'=>'_kh_key','meta_value'=>$key,'post_status'=>'publish','posts_per_page'=>1,'fields'=>'ids','no_found_rows'=>true));
		$existing_id = $q->have_posts() ? $q->posts[0] : 0;
		$post_id = wp_insert_post(array(
			'ID' => $existing_id,
			'post_type' => 'kh_index',
			'post_status' => 'publish',
			'post_title' => $it['title'],
			'post_excerpt' => $it['excerpt'],
			'post_content' => kh_enrich_content($it['title'], $it['excerpt']),
		));
		if (!is_wp_error($post_id) && $post_id) {
			update_post_meta($post_id, '_kh_url', $it['url']);
			update_post_meta($post_id, '_kh_key', $key);
		}
	}
}

add_action('init', function () {
	$ver = 'kh1.1.0';
	if (get_option('kh_index_seeded_ver') !== $ver) {
		kh_seed_index();
		update_option('kh_index_seeded_ver', $ver);
	}
}, 20);


/* ---------- Verse-number detection: suggest the Quran WebApp when the query looks like a verse/sura reference ---------- */
function kh_looks_like_verse($q) {
    $q = trim((string) $q);
    if ($q === '') return false;
    if (preg_match('/^\d{1,3}\s*[:.\-]\s*\d{1,3}$/', $q)) return true;
    if (preg_match('/^\d{1,3}$/', $q)) {
        $n = (int) $q;
        if ($n >= 1 && $n <= 114) return true;
    }
    return false;
}

/* ---------- Richer real page text layered onto select index items, for deeper "whole page" search matching (kept out of the short displayed excerpt) ---------- */
function kh_enrich_content($title, $fallback) {
    $map = array(
        'Zakat Calculator' => 'Zakat is 2.5% of your net income, due the day you receive it. The obligatory charity (Zakat) must be given away on the day of harvest (6:141). Whenever we receive net income, we must set aside 2.5% and give it to the specified recipients — the parents, relatives, orphans, the poor, and the traveling alien, in this order (2:215). My mercy encompasses all things, but I will specify it for the righteous who give Zakat (7:156). Zakat charity is so important, the Most Merciful has restricted His mercy to those who give it. The corrupted Muslims have lost this most important commandment; they give Zakat only once a year, but Zakat must be given away on the day we receive income. The proportion that came to us through Abraham is 2.5% of our net income. Quran 6:141, 2:215, 7:156.',
        'Salat Timing' => 'Salat & Ramadan Timing — accurate prayer times for any place on Earth. Fajr, Dhuhr, Asr, Maghrib, Isha — five daily Contact Prayers (Salat), Namaz timing. Enter your place name or use your location to find prayer times. The only religion approved by God is Submission (Quran 3:19). Prayer times are calculated automatically from your location\'s coordinates using standard astronomical formulas — sun position, equation of time. The Hijri date shown is a calculated (tabular) estimate. Also find this year\'s Ramadan dates, the First & Last Fasting Day, the 10 Blessed Nights, and the Night of Destiny (Lailat-ul-Qadr) for your place.',
        'Ramadan Calculator' => 'Find this year\'s Ramadan dates for any place on Earth, calculated from the moon. Ramadan is the month during which the Quran was revealed, providing guidance for the people, clear teachings, and the statute book. Those of you who witness this month shall fast therein (Quran 2:185). First Fasting Day, Last Fasting Day, the 10 Blessed Nights, and the Night of Destiny (Lailat-ul-Qadr) are calculated from the new moon and sunset for your chosen place and year. Islamic days begin at sunset. Suhoor and Iftar times, fasting calculator, Hijri calendar.',
        'Mathematical Miracle' => 'The numerical, 19-based mathematical structure and miracle of the Quran. The Quran is characterized by a unique phenomenon never found in any human-authored book — every element is mathematically composed: the suras, the verses, the words, the number of certain letters, the Quranic Initials, and the gematrical (Abjad) values of the Arabic alphabet. The word "God" (Allah) occurs 2698 times, 19x142, and the sum of verse numbers where it occurs is 118123, also a multiple of 19. The Quran consists of 114 suras (19x6) and 6346 total verses (19x334). The Basmalah — In the Name of God, Most Gracious, Most Merciful — consists of 19 letters. Nineteen (19) is the common denominator throughout the Quran\'s mathematical system, mentioned in Sura 74, verse 30: "Over it are nineteen." Gematrical value, Quranic Initials (Muqattaat) such as A.L.M of 2:1, the Five Pillars of Islam — Shahaadah, Salat, Seyaam (Fasting), Zakat, Hajj — are all mathematically coded by the number 19. This is the work of Dr. Rashad Khalifa, discovered in 1974.',
        '19 Calculator' => 'A practical calculator for dividing large numbers by 19 — instantly checks whether any number, however long, is divisible by 19. Examples: 114 suras in the Quran = 19x6. 2698 occurrences of the word Allah = 19x142. 6346 total verses in the Quran = 19x334. "Over it are nineteen" — Quran 74:30. Part of the Quran\'s mathematical miracle based on the number 19.',
        'Quran Q&A / Quranic Quiz' => 'GodAlone.in Quran Quiz — test and grow your knowledge of the Noble Quran. Each quiz has 10 random questions and a 10-minute timer, play as many times as you like. Choose a difficulty: Easy, Medium, Hard, or Mixed. Quranic knowledge questions and answers, quiz certificate.',
    );
    return isset($map[$title]) ? ($map[$title] . ' ' . $fallback) : $fallback;
}

/* GA-AUTO-PURGE: after any theme file is edited, the page cache is cleared automatically (checked at most once a minute),
   and the Audio Quran page always asks the browser to re-check for the newest version. */
add_action('init', function () {
    if (get_transient('ga_purge_chk')) { return; }
    set_transient('ga_purge_chk', 1, 60);
    $dir = get_stylesheet_directory();
    $latest = 0;
    foreach ((array) glob($dir . '/*.{php,css,js}', GLOB_BRACE) as $f) {
        $t = @filemtime($f);
        if ($t && $t > $latest) { $latest = $t; }
    }
    if ($latest && (int) get_option('ga_theme_mtime') !== $latest) {
        update_option('ga_theme_mtime', $latest, false);
        do_action('litespeed_purge_all');
    }
});
add_action('send_headers', function () {
    if (function_exists('is_page') && is_page('audio-quran')) {
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
    }
}, 99);
