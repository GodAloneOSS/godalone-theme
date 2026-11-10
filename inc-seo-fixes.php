<?php
/* GodAlone SEO, language and security refinements (added 04-11-2026). Delete this file to switch everything off. */
if (!defined("ABSPATH")) { exit; }
function ga_seo_overrides() {
    return array(
        'is-this-for-me' => array('Is Submission for Me? | GodAlone.in', 'Is Submission to God Alone for you? People of every faith are invited. See what the Quran promises to anyone who believes in God and the Last Day and leads a righteous life (2:62).'),
        'is-the-quran-enough' => array('Is the Quran Enough? | GodAlone.in', 'Is the Quran alone enough as a guide? Read why Submitters follow the Quran, the whole Quran and nothing but the Quran.'),
        'check-it-yourself' => array('Check It Yourself in 5 Minutes: The Number 19 | GodAlone.in', 'Test the mathematical signature of the number 19 in the Quran yourself in five minutes. The simple facts need no special tools.'),
        'picture-messages' => array('Quran Picture Messages: Share Verses as Images | GodAlone.in', 'Beautiful Quran picture messages to view and share with friends and family, each carrying a verse of God’s final message.'),
        'quran-qa' => array('Quran Q&A: Answers from the Quran | GodAlone.in', 'Questions about God, the Quran and Submission, answered from the Quran itself.'),
        'faq' => array('Frequently Asked Questions | GodAlone.in', 'Clear answers to frequently asked questions about Submission to God Alone, the Quran and its mathematical miracle.'),
        'coloring-book' => array(null, 'Quran coloring book for kids: fun pages to color while learning about God’s message.'),
        'zakat-calculator' => array(null, 'Calculate your obligatory charity (Zakat) easily: enter your savings and see the amount due.'),
        'ramadan-calculator' => array(null, 'Ramadan calculator: find the dates and fasting times of Ramadan for any year and place.'),
        'salat-timing' => array(null, 'Salat (contact prayer) times and Ramadan timings for your city.'),
        'downloads' => array(null, 'Download the Quran and related books from GodAlone.in.'),
        'audio-quran' => array(null, 'Listen to the Quran verse by verse with the Arabic recitation and English, Tamil or Hindi voice, and read along.'),
        'calculator-19' => array(null, '19 calculator: check whether any number is a multiple of 19 and explore the number 19 pattern in the Quran.'),
        'randomversegenerator' => array(null, 'Generate a random verse of the Quran for daily reflection, with its translation.'),
    );
}
function ga_seo_noindex_slug($slug) {
    return (bool) preg_match('/^(home|quranindex|quran-2|preface|glossary|proclamation|appendices-introduction)$/', $slug);
}
function ga_seo_current_slug() {
    if (is_singular('page')) {
        $id = get_queried_object_id();
        return $id ? (string) get_post_field('post_name', $id) : '';
    }
    $path = isset($_SERVER['REQUEST_URI']) ? trim((string) parse_url((string) $_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';
    if ($path !== '' && strpos($path, '/') === false) {
        $map = ga_seo_overrides();
        if (isset($map[$path])) { return $path; }
    }
    return '';
}
function ga_seo_fallback_desc($id) {
    $title = get_the_title($id);
    $text = trim(preg_replace('/\s+/', ' ', wp_strip_all_tags(strip_shortcodes((string) get_post_field('post_content', $id)))));
    if (function_exists('mb_strlen') && mb_strlen($text) >= 60) {
        $cut = mb_substr($text, 0, 155);
        $cut = preg_replace('/\s+\S*$/u', '', $cut);
        return $cut . '…';
    }
    return $title . ': read more on GodAlone.in, God’s final message to humanity.';
}
function ga_seo_decide() {
    $slug = ga_seo_current_slug();
    if ($slug === '') { return null; }
    $map = ga_seo_overrides();
    return array('id' => get_queried_object_id(), 'real' => is_singular('page'), 'o' => isset($map[$slug]) ? $map[$slug] : null, 'noindex' => ga_seo_noindex_slug($slug));
}
function ga_seo_set_meta($html, $attr, $name, $value) {
    $v = esc_attr($value);
    $pattern = '#<meta\s+' . $attr . '=["\']' . preg_quote($name, '#') . '["\']\s+content=["\'][^"\']*["\']#i';
    return preg_replace_callback($pattern, function ($m) use ($attr, $name, $v) {
        return '<meta ' . $attr . '="' . $name . '" content="' . $v . '"';
    }, $html, 1);
}
function ga_seo_rewrite($html) {
    try {
        $ctx = ga_seo_decide();
        if (!$ctx || !is_string($html) || stripos($html, '</head>') === false) { return $html; }
        $homeTitle = 'GODalone.in - Happiness is Submission to GOD ALONE';
        $title = null; $desc = null;
        if ($ctx['o'] && $ctx['o'][0]) { $title = $ctx['o'][0]; }
        if ($ctx['o'] && $ctx['o'][1]) { $desc = $ctx['o'][1]; }
        if ($title === null && $ctx['real'] && preg_match('#<title>(.*?)</title>#is', $html, $m)) {
            $plain = trim(html_entity_decode(wp_strip_all_tags($m[1]), ENT_QUOTES, 'UTF-8'));
            if ($plain === '' || $plain === $homeTitle) { $title = get_the_title($ctx['id']) . ' | GodAlone.in'; }
        }
        $hasDesc = preg_match('#<meta\s+name=["\']description["\']\s+content=["\']([^"\']*)["\']#i', $html, $m2);
        if ($desc === null && $ctx['real']) {
            $cur = $hasDesc ? trim(html_entity_decode($m2[1], ENT_QUOTES, 'UTF-8')) : '';
            if ($cur === '' || strpos($cur, 'Submission to God alone (Islam)') === 0) { $desc = ga_seo_fallback_desc($ctx['id']); }
        }
        if ($title !== null) {
            $t = esc_html($title);
            $html = preg_replace_callback('#<title>.*?</title>#is', function ($m) use ($t) { return '<title>' . $t . '</title>'; }, $html, 1);
            $html = ga_seo_set_meta($html, 'property', 'og:title', $title);
            $html = ga_seo_set_meta($html, 'name', 'twitter:title', $title);
        }
        if ($desc !== null) {
            if ($hasDesc) {
                $html = ga_seo_set_meta($html, 'name', 'description', $desc);
            } else {
                $d = esc_attr($desc);
                $html = preg_replace_callback('#</head>#i', function ($m) use ($d) { return '<meta name="description" content="' . $d . '" />' . "\n" . '</head>'; }, $html, 1);
            }
            $html = ga_seo_set_meta($html, 'property', 'og:description', $desc);
            $html = ga_seo_set_meta($html, 'name', 'twitter:description', $desc);
        }
        if ($ctx['noindex']) {
            if (preg_match('#<meta\s+name=["\']robots["\']#i', $html)) {
                $html = ga_seo_set_meta($html, 'name', 'robots', 'noindex, follow');
            } else {
                $html = preg_replace_callback('#</head>#i', function ($m) { return '<meta name="robots" content="noindex, follow" />' . "\n" . '</head>'; }, $html, 1);
            }
        }
        return $html;
    } catch (\Throwable $e) {
        return $html;
    }
}
add_action('template_redirect', function () {
    if (is_admin() || is_feed() || is_embed() || wp_doing_ajax() || ga_seo_current_slug() === '') { return; }
    ob_start('ga_seo_rewrite');
}, 99);
function ga_seo_strip_sitemap($xml) {
    try {
        if (!is_string($xml) || strpos($xml, '<url>') === false) { return $xml; }
        return preg_replace('#<url>\s*<loc>(?:<!\[CDATA\[)?[^<]*/(home|quranindex|quran-2|preface|glossary|proclamation|appendices-introduction)/(?:\]\]>)?</loc>.*?</url>\s*#is', '', $xml);
    } catch (\Throwable $e) {
        return $xml;
    }
}
add_action('init', function () {
    $uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
    if (strpos($uri, 'page-sitemap') !== false && strpos($uri, '.xml') !== false) { ob_start('ga_seo_strip_sitemap'); }
}, 0);

// ---- Sitemap exclusion (AIOSEO filters) ----
function ga_seo_sitemap_excluded_ids() {
    static $ids = null;
    if ($ids !== null) { return $ids; }
    $ids = array();
    try {
        global $wpdb;
        $names = array('home','quranindex','quran-2','preface','glossary','proclamation','appendices-introduction');
        $in = "'" . implode("','", array_map('esc_sql', $names)) . "'";
        $rows = $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_type='page' AND post_status='publish' AND (post_name IN ($in))");
        if (is_array($rows)) { $ids = array_map('intval', $rows); }
    } catch (\Throwable $e) { $ids = array(); }
    return $ids;
}
add_filter('aioseo_sitemap_exclude_posts', function ($ids, $type = '') {
    try { return array_values(array_unique(array_merge((array) $ids, ga_seo_sitemap_excluded_ids()))); } catch (\Throwable $e) { return $ids; }
}, 10, 2);
add_filter('aioseo_sitemap_posts', function ($entries, $postType = '') {
    try {
        if (!is_array($entries)) { return $entries; }
        foreach ($entries as $k => $e) {
            $loc = is_array($e) && isset($e['loc']) ? (string) $e['loc'] : '';
            if ($loc !== '' && preg_match('#/(home|quranindex|quran-2|preface|glossary|proclamation|appendices-introduction)/?$#', $loc)) { unset($entries[$k]); }
        }
        return array_values($entries);
    } catch (\Throwable $e) { return $entries; }
}, 10, 2);
add_action('init', function () {
    try {
        if (get_option('ga_sm_flushed') === 'v1') { return; }
        global $wpdb;
        $tbl = $wpdb->prefix . 'aioseo_cache';
        if ($wpdb->get_var("SHOW TABLES LIKE '" . esc_sql($tbl) . "'") === $tbl) {
            $wpdb->query("DELETE FROM {$tbl} WHERE `key` LIKE '%sitemap%'");
        }
        update_option('ga_sm_flushed', 'v1', false);
    } catch (\Throwable $e) { }
}, 20);
function ga_hreflang_pages() {
    return array(
        'appendix-1' => array('en' => 'appendix-1', 'ta' => 'mathematical-miracle'),
        'appendix-2' => array('en' => 'appendix-2', 'ta' => 'appendix-2'),
        'appendix-3' => array('en' => 'appendix-3', 'ta' => 'appendix-3'),
        'appendix-4' => array('en' => 'appendix-4', 'ta' => 'appendix-4'),
        'appendix-5' => array('en' => 'appendix-5', 'ta' => 'appendix-5'),
        'appendix-6' => array('en' => 'appendix-6', 'ta' => 'appendix-6'),
        'appendix-7' => array('en' => 'appendix-7', 'ta' => 'appendix-7'),
        'appendix-8' => array('en' => 'appendix-8', 'ta' => 'appendix-8'),
        'appendix-9' => array('en' => 'appendix-9', 'ta' => 'appendix-9'),
        'appendix-10' => array('en' => 'appendix-10', 'ta' => 'appendix-10'),
        'appendix-11' => array('en' => 'appendix-11', 'ta' => 'appendix-11'),
        'appendix-12' => array('en' => 'appendix-12', 'ta' => 'appendix-12'),
        'appendix-13' => array('en' => 'appendix-13', 'ta' => 'appendix-13'),
        'appendix-14' => array('en' => 'appendix-14', 'ta' => 'appendix-14'),
        'appendix-15' => array('en' => 'appendix-15', 'ta' => 'appendix-15'),
        'appendix-16' => array('en' => 'appendix-16', 'ta' => 'appendix-16'),
        'appendix-17' => array('en' => 'appendix-17', 'ta' => 'appendix-17'),
        'appendix-18' => array('en' => 'appendix-18', 'ta' => 'appendix-18'),
        'appendix-19' => array('en' => 'appendix-19', 'ta' => 'appendix-19'),
        'appendix-20' => array('en' => 'appendix-20', 'ta' => 'appendix-20'),
        'appendix-21' => array('en' => 'appendix-21', 'ta' => 'appendix-21'),
        'appendix-22' => array('en' => 'appendix-22', 'ta' => 'appendix-22'),
        'appendix-23' => array('en' => 'appendix-23', 'ta' => 'appendix-23'),
        'appendix-24' => array('en' => 'appendix-24', 'ta' => 'appendix-24'),
        'appendix-25' => array('en' => 'appendix-25', 'ta' => 'appendix-25'),
        'appendix-26' => array('en' => 'appendix-26', 'ta' => 'appendix-26'),
        'appendix-27' => array('en' => 'appendix-27', 'ta' => 'appendix-27'),
        'appendix-28' => array('en' => 'appendix-28', 'ta' => 'appendix-28'),
        'appendix-29' => array('en' => 'appendix-29', 'ta' => 'appendix-29'),
        'appendix-30' => array('en' => 'appendix-30', 'ta' => 'appendix-30'),
        'appendix-31' => array('en' => 'appendix-31', 'ta' => 'appendix-31'),
        'appendix-32' => array('en' => 'appendix-32', 'ta' => 'appendix-32'),
        'appendix-33' => array('en' => 'appendix-33', 'ta' => 'appendix-33'),
        'appendix-34' => array('en' => 'appendix-34', 'ta' => 'appendix-34'),
        'appendix-35' => array('en' => 'appendix-35', 'ta' => 'appendix-35'),
        'appendix-36' => array('en' => 'appendix-36', 'ta' => 'appendix-36'),
        'appendix-37' => array('en' => 'appendix-37', 'ta' => 'appendix-37'),
        'appendix-38' => array('en' => 'appendix-38', 'ta' => 'appendix-38'),
        'introduction' => array('en' => 'introduction', 'ta' => 'introduction', 'hi' => 'introduction'),
        'is-this-for-me' => array('en' => 'is-this-for-me', 'ta' => 'is-this-for-me', 'hi' => 'is-this-for-me'),
        'is-the-quran-enough' => array('en' => 'is-the-quran-enough', 'ta' => 'is-the-quran-enough', 'hi' => 'is-the-quran-enough'),
        'check-it-yourself' => array('en' => 'check-it-yourself', 'ta' => 'check-it-yourself', 'hi' => 'check-it-yourself'),
        'mathematical-miracle' => array('en' => 'mathematical-miracle', 'ta' => 'mathematical-miracle', 'hi' => 'mathematical-miracle'),
        'downloads' => array('en' => 'downloads', 'ta' => 'downloads', 'hi' => 'downloads'),
        'audio' => array('en' => 'audio-quran', 'ta' => 'audios', 'hi' => 'audio-quran'),
        'picture-messages' => array('en' => 'picture-messages', 'ta' => 'picture-messages', 'hi' => 'picture-messages'),
        'library' => array('en' => 'library', 'ta' => 'library', 'hi' => 'library'),
        'videos' => array('en' => 'videos', 'ta' => 'videos', 'hi' => 'videos'),
        'charity' => array('en' => 'charity', 'ta' => 'charity', 'hi' => 'charity'),
        'contact' => array('en' => 'contact', 'ta' => 'contact', 'hi' => 'contact'),
        'faq' => array('en' => 'faq', 'ta' => 'faq', 'hi' => 'faq'),
        'utilities' => array('en' => 'utilities', 'ta' => 'utilities', 'hi' => 'utilities'),
        'salat-timing' => array('en' => 'salat-timing', 'ta' => 'salat-timing', 'hi' => 'salat-timing'),
        'ramadan-calculator' => array('en' => 'ramadan-calculator', 'ta' => 'ramadan-calculator', 'hi' => 'ramadan-calculator'),
        'zakat-calculator' => array('en' => 'zakat-calculator', 'ta' => 'zakat-calculator', 'hi' => 'zakat-calculator'),
        'calculator-19' => array('en' => 'calculator-19', 'ta' => 'calculator-19', 'hi' => 'calculator-19'),
        'coloring-book' => array('en' => 'coloring-book', 'ta' => 'coloring-book', 'hi' => 'coloring-book'),
        'quran-qa' => array('en' => 'quran-qa', 'ta' => 'quran-qa', 'hi' => 'quran-qa'),
        'privacy-policy' => array('en' => 'privacy-policy', 'ta' => 'privacy-policy', 'hi' => 'privacy-policy'),
        'copyright' => array('en' => 'copyright', 'ta' => 'copyright', 'hi' => 'copyright'),
        'about' => array('en' => 'about', 'ta' => 'about', 'hi' => 'about'),
    );
}
add_action('wp_head', function () {
    $self = 'en';
    $bases = array('en' => 'https://godalone.in', 'ta' => 'https://kadavulmattum.org', 'hi' => 'https://ekkhuda.org');
    if (is_404() || is_admin()) { return; }
    $reqPath = isset($_SERVER['REQUEST_URI']) ? trim((string) parse_url((string) $_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';
    $paths = array();
    if ($reqPath === '') {
        foreach ($bases as $l => $b) { $paths[$l] = $b . '/'; }
    } elseif (strpos($reqPath, '/') === false) {
        foreach (ga_hreflang_pages() as $row) {
            if (isset($row[$self]) && $row[$self] === $reqPath) {
                foreach ($bases as $l => $b) { if (isset($row[$l])) { $paths[$l] = $b . '/' . $row[$l] . '/'; } }
                break;
            }
        }
    }
    if ((count($paths) < 2)) { return; }
    foreach ($paths as $l => $u) { echo '<link rel="alternate" hreflang="' . esc_attr($l) . '" href="' . esc_url($u) . '" />' . "\n"; }
    if (isset($paths['en'])) { echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($paths['en']) . '" />' . "\n"; }
}, 5);
add_action('send_headers', function () {
    if (is_admin()) { return; }
    header_remove('X-Powered-By');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Strict-Transport-Security: max-age=31536000');
}, 1);
add_filter('rest_endpoints', function ($endpoints) {
    if (!is_user_logged_in()) {
        foreach (array('/wp/v2/users', '/wp/v2/users/(?P<id>[\d]+)') as $route) {
            if (isset($endpoints[$route])) { unset($endpoints[$route]); }
        }
    }
    return $endpoints;
});
add_action('template_redirect', function () {
    if (isset($_GET['author']) && !is_user_logged_in() && !is_admin()) { wp_safe_redirect(home_url('/'), 301); exit; }
}, 1);
remove_action('wp_head', 'wp_generator');


/* GA-A11Y-2026-11-04 accessibility: skip link + footer heading levels */
function ga_a11y_rewrite($html) {
    try {
        if (!is_string($html) || strlen($html) < 500 || stripos($html, '<body') === false) { return $html; }
        if (strpos($html, 'ga-skip') !== false) { return $html; }
        $target = '';
        $html = preg_replace_callback('#<main\b([^>]*)>#i', function ($m) use (&$target) {
            if (preg_match('#\bid=(["\'])(.*?)\1#i', $m[1], $im)) { $target = $im[2]; return $m[0]; }
            $target = 'ga-main';
            return '<main' . $m[1] . ' id="ga-main" tabindex="-1">';
        }, $html, 1);
        if ($target !== '') {
            $html = preg_replace_callback('#<body\b[^>]*>#i', function ($m) use ($target) {
                return $m[0] . '<a class="ga-skip" href="#' . esc_attr($target) . '">Skip to main content</a>';
            }, $html, 1);
        }
        $fp = stripos($html, '<footer');
        if ($fp !== false) {
            $tail = preg_replace('#<h4(?![^>]*aria-level)#i', '<h4 aria-level="3"', substr($html, $fp));
            if (is_string($tail)) { $html = substr($html, 0, $fp) . $tail; }
        }
    } catch (\Throwable $e) { }
    return $html;
}
add_action('template_redirect', function () {
    if (is_admin() || is_feed() || ( function_exists('wp_doing_ajax') && wp_doing_ajax() )) { return; }
    ob_start('ga_a11y_rewrite');
}, 97);


/* GA-SYNC-2026-11-04 cross-site reading progress */
add_action('wp_head', function () {
    $js = <<<'GAJS'
(function(){try{
var KEYS=['quranLastPos','quranReadStreak','quranChapterCounts114'],TS='gaSyncTs',LS=window.localStorage;
var HOSTS={'godalone.in':1,'quran.godalone.in':1,'kadavulmattum.org':1,'ekkhuda.org':1};
function norm(h){return String(h).replace(/^www\./,'')}
function valid(k,v){try{var j=JSON.parse(v);
if(k==='quranLastPos')return !!(j&&j.s>=1&&j.s<=114&&j.a>=0&&j.a<=300);
if(k==='quranReadStreak')return !!(j&&typeof j.count==='number'&&typeof j.last==='string'&fj.last.length<14);
if(k==='quranChapterCounts114')return Array.isArray(j)&&j.length===114;}catch(e){}return false}
function enc(o){return btoa(unescape(encodeURIComponent(JSON.stringify(o)))).replace(/\+/g,'-').replace(/\//g,'_').replace(/=+$/,'')}
function dec(s){s=s.replace(/-/g,'+').replace(/_/g,'/');while(s.length%4)s+='=';return JSON.parse(decodeURIComponent(escape(atob(s))))}
function bundle(){var k={};KEYS.forEach(function(n){var v=LS.getItem(n);if(v!==null&&valid(n,v))k[n]=v});return {ts:+LS.getItem(TS)||0,k:k}}
var os=Storage.prototype.setItem;
if(location.hash.indexOf('#gp=')===0){try{var inc=dec(location.hash.slice(4));
if(inc&&inc.k&&typeof inc.ts==='number'&&inc.ts<=Date.now()+86400000){var loc=+LS.getItem(TS)||0;
if(inc.ts>loc||!LS.getItem('quranLastPos')){KEYS.forEach(function(n){if(typeof inc.k[n]==='string'&&valid(n,inc.k[n]))os.call(LS,n,inc.k[n])});os.call(LS,TS,String(inc.ts))}}}catch(e){}
try{history.replaceState(null,'',location.pathname+location.search)}catch(e){}}
if(/[?&]continue=1/.test(location.search)&&/^\/quran\/?$/.test(location.pathname)){try{var p=JSON.parse(LS.getItem('quranLastPos'));if(p&&p.s>=1&&p.s<=114&&p.a>=1){history.replaceState(null,'','/quran/#/'+p.s+'/'+p.a)}}catch(e){}}
if(!LS.getItem(TS)&&LS.getItem('quranLastPos')){os.call(LS,TS,String(Date.now()))}
Storage.prototype.setItem=function(k,v){os.call(this,k,v);try{if(this===LS&&KEYS.indexOf(k)>-1)os.call(this,TS,String(Date.now()))}catch(e){}};
function tag(e){try{var a=e.target&&e.target.closest?e.target.closest('a[href]'):null;if(!a)return;var u=new URL(a.href,location.href);var uh=norm(u.hostname);
if(!HOSTS[uh]||uh===norm(location.hostname))return;if(u.hash&&u.hash.length>1&&u.hash.indexOf('#gp=')!==0)return;
var b=bundle();if(!b.k.quranLastPos)return;u.hash='gp='+enc(b);a.href=u.href}catch(x){}}
['mousedown','touchstart','keydown','contextmenu'].forEach(function(ev){document.addEventListener(ev,tag,true)});
}catch(e){}})();
GAJS;
    echo "<script>" . $js . "</script>\n";
}, 1);
add_action('wp_footer', function () {
    $js = <<<'GAJS'
(function(){try{var LANG='en';var sec=document.querySelector('.gaj');if(!sec)return;var pos=null,streak=0;
try{pos=JSON.parse(localStorage.quranLastPos)}catch(e){}
if(!(pos&&pos.s>=1&&pos.s<=114&&pos.a>0))return;
try{var rs=JSON.parse(localStorage.quranReadStreak);var d=new Date(),t0=new Date(d.getFullYear(),d.getMonth(),d.getDate()).getTime();var pp=String(rs.last).split('-');var lt=new Date(+pp[0],+pp[1]-1,+pp[2]).getTime();if(t0-lt<=86400000*1.01)streak=rs.count||0}catch(e){}
var cta=sec.querySelector('.gaj-cta');if(cta){cta.href='https://godalone.in/quran/?continue=1';if(LANG==='hi')cta.textContent='पढ़ना जारी रखें →'}
if(LANG==='hi'){var h=sec.querySelector('h2');if(h)h.textContent='वापसी मुबारक — सूरा '+pos.s+', आयत '+pos.a+' से आगे बढ़ें';var c=sec.querySelector('.gaj-chip');if(c&&streak>0)c.textContent='🔥 '+streak+' दिन की लगातार पढ़ाई'}
}catch(e){}})();
GAJS;
    echo "<script>" . $js . "</script>\n";
}, 99);

/* GA-VOTD-2026-11-04: daily verse card (all pages: front page only) + e-mail subscriptions. Guarded: a problem here cannot take the site down. */
try { $ga_votd_inc = get_template_directory() . '/inc-votd.php'; if (file_exists($ga_votd_inc)) { include_once $ga_votd_inc; } } catch (\Throwable $e) { }
add_action('wp_footer', function () {
	if (!is_front_page()) { return; }
	echo '<script src="https://godalone.in/quran/ga-votd.js?v=2" defer></script>' . "\n";
}, 98);

/* GA-VTG-2026-11-04: optional Telegram auto-post of the verse of the day (settings: Settings > Verse to Telegram). Guarded. */
try { $ga_vtg_inc = get_template_directory() . '/inc-votd-tg.php'; if (file_exists($ga_vtg_inc)) { include_once $ga_vtg_inc; } } catch (\Throwable $e) { }

/* GA-PMTG-2026-11-09: optional Telegram auto-post of the daily Quran Picture Message (settings: Settings > Picture Msg to Telegram). Guarded. */
try { $ga_pmtg_inc = get_template_directory() . '/inc-pmtg.php'; if (file_exists($ga_pmtg_inc)) { include_once $ga_pmtg_inc; } } catch (\Throwable $e) { }

/* GA-VFB-2026-11-10: optional Facebook auto-post of the verse of the day (settings: Settings > Verse to Facebook). Guarded. */
try { $ga_vfb_inc = get_template_directory() . '/inc-votd-fb.php'; if (file_exists($ga_vfb_inc)) { include_once $ga_vfb_inc; } } catch (\Throwable $e) { }

/* GA-PMFB-2026-11-10: optional Facebook auto-post of the daily Quran Picture Message (settings: Settings > Picture Msg to Facebook). Guarded. */
try { $ga_pmfb_inc = get_template_directory() . '/inc-pmfb.php'; if (file_exists($ga_pmfb_inc)) { include_once $ga_pmfb_inc; } } catch (\Throwable $e) { }

/* GA-QSM-2026-11-04: list the Quran sura and verse sitemaps in robots.txt. */
add_filter('robots_txt', function ($o) { return rtrim((string) $o) . "\nSitemap: https://godalone.in/quran/sitemap-suras.xml\nSitemap: https://godalone.in/quran/sitemap-verses.xml\n"; }, 99);

/* GA-VIG-2026-11-10: post the verse + daily picture message to Instagram Business accounts
   (Settings > Verse Picture to Instagram). Instagram's API only works for Business/Creator
   accounts linked to a Facebook Page - a personal Instagram account cannot be posted to by
   any app. Needs, per language, the Instagram Business Account ID and a Page Access Token
   with instagram_basic + instagram_content_publish permissions (the same kind of token used
   for Verse to Facebook can often be reused, once Instagram permissions are added to it).
   Loaded here directly because the Theme Editor can only edit this file, not create new ones. */
function ga_ig_opts() { $o = get_option('ga_ig', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
	add_options_page('Verse Picture to Instagram', 'Verse Picture to Instagram', 'manage_options', 'ga-ig', 'ga_ig_page');
});

add_action('init', function () {
	if (!wp_next_scheduled('ga_ig_daily')) {
		wp_schedule_event(strtotime('tomorrow 00:45:00 UTC'), 'daily', 'ga_ig_daily');
	}
});
add_action('ga_ig_daily', function () { ga_ig_run(false); });

function ga_ig_pm_lang($lang) {
	$map = array('en' => 'e', 'ta' => 't', 'hi' => 'h');
	return isset($map[$lang]) ? $map[$lang] : $lang;
}

function ga_ig_caption($v, $lang) {
	if (!function_exists('ga_votd_t')) { return ''; }
	$T = ga_votd_t($lang);
	$tr = !empty($v[$lang]) ? $v[$lang] : $v['en'];
	if (empty($v[$lang]) && !empty($T['note'])) { $tr .= "\n\n" . $T['note']; }
	$ref = $T['q'] . ' ' . $v['s'] . ':' . $v['a'];
	$url = 'https://godalone.in/quran/#/' . $v['s'] . '/' . $v['a'];
	return "\xE2\x9C\xA6 " . ($lang === 'ta' ? 'Kadavulmattum.org' : ($lang === 'hi' ? 'Ekkhuda.org' : 'GodAlone.in')) . ' ' . $T['title'] . "\n\n" . $v['ar'] . "\n\n" . $tr . "\n\n" . $ref . "\n" . $T['read'] . ': ' . $url;
}

function ga_ig_publish($ig_id, $token, $image_url, $caption) {
	$create = wp_remote_post('https://graph.facebook.com/v21.0/' . rawurlencode($ig_id) . '/media', array(
		'timeout' => 30,
		'body'    => array('image_url' => $image_url, 'caption' => $caption, 'access_token' => $token),
	));
	if (is_wp_error($create)) { return array(false, str_replace($token, '***', $create->get_error_message())); }
	$cj = json_decode(wp_remote_retrieve_body($create), true);
	if (!is_array($cj) || empty($cj['id'])) {
		$msg = (is_array($cj) && isset($cj['error']['message'])) ? $cj['error']['message'] : ('HTTP ' . wp_remote_retrieve_response_code($create));
		return array(false, str_replace($token, '***', $msg));
	}
	$creation_id = $cj['id'];
	sleep(3);
	$publish = wp_remote_post('https://graph.facebook.com/v21.0/' . rawurlencode($ig_id) . '/media_publish', array(
		'timeout' => 30,
		'body'    => array('creation_id' => $creation_id, 'access_token' => $token),
	));
	if (is_wp_error($publish)) { return array(false, str_replace($token, '***', $publish->get_error_message())); }
	$pj = json_decode(wp_remote_retrieve_body($publish), true);
	if (is_array($pj) && !empty($pj['id'])) { return array(true, 'posted'); }
	$msg = (is_array($pj) && isset($pj['error']['message'])) ? $pj['error']['message'] : ('HTTP ' . wp_remote_retrieve_response_code($publish));
	return array(false, str_replace($token, '***', $msg));
}

function ga_ig_run($force) {
	$o = ga_ig_opts();
	if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
	$today = gmdate('Y-m-d');
	if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
	if (!function_exists('ga_votd_verse_for') || !function_exists('ga_pm_daily') || !function_exists('ga_pm_find')) { return array('Verse/picture data is unavailable.'); }
	$v = ga_votd_verse_for(time());
	if (!$v) { return array('Verse data is unavailable.'); }
	$res = array();
	$any = false;
	foreach (array('en', 'ta', 'hi') as $lang) {
		$ig    = isset($o['ig_' . $lang]) ? trim((string) $o['ig_' . $lang]) : '';
		$token = isset($o['token_' . $lang]) ? trim((string) $o['token_' . $lang]) : '';
		if ($ig === '' || $token === '') { continue; }
		$stem = ga_pm_daily(ga_ig_pm_lang($lang));
		if ($stem === '' || !ga_pm_find($stem)) {
			$res[] = strtoupper($lang) . ': no picture message available today - skipped.';
			continue;
		}
		$image_url = home_url('/picture-messages/img/?f=' . rawurlencode($stem) . '&s=full');
		$r = ga_ig_publish($ig, $token, $image_url, ga_ig_caption($v, $lang));
		if ($r[0]) { $any = true; }
		$res[] = strtoupper($lang) . ' Instagram ' . $ig . ': ' . ($r[0] ? 'posted' : 'FAILED - ' . $r[1]);
	}
	if (!$res) { $res[] = 'No Instagram account is set.'; }
	if ($any) { $o['last_day'] = $today; }
	$o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
	update_option('ga_ig', $o, false);
	return $res;
}

function ga_ig_page() {
	if (!current_user_can('manage_options')) { return; }
	$o = ga_ig_opts();
	$notice = '';
	if (isset($_POST['ga_ig_action']) && check_admin_referer('ga_ig')) {
		$act = sanitize_key(wp_unslash($_POST['ga_ig_action']));
		if ($act === 'save') {
			foreach (array('en', 'ta', 'hi') as $l) {
				$ig = isset($_POST['ig_' . $l]) ? trim((string) wp_unslash($_POST['ig_' . $l])) : '';
				$o['ig_' . $l] = preg_match('/^[0-9]{5,25}$/', $ig) ? $ig : '';
				$tok = isset($_POST['token_' . $l]) ? trim((string) wp_unslash($_POST['token_' . $l])) : '';
				if ($tok !== '') {
					if (strlen($tok) >= 40) { $o['token_' . $l] = $tok; }
					else { $notice .= 'The ' . strtoupper($l) . ' token did not look right, so it was not changed. '; }
				}
			}
			$o['on'] = isset($_POST['on']) ? 1 : 0;
			update_option('ga_ig', $o, false);
			$notice .= 'Saved.';
		} elseif ($act === 'remove') {
			foreach (array('en', 'ta', 'hi') as $l) { unset($o['token_' . $l]); }
			$o['on'] = 0;
			update_option('ga_ig', $o, false);
			$notice = 'Tokens removed and auto-posting switched off.';
		} elseif ($act === 'post') {
			$notice = implode(' | ', ga_ig_run(true));
			$o = ga_ig_opts();
		}
	}
	$has_any = !empty($o['token_en']) || !empty($o['token_ta']) || !empty($o['token_hi']);
	echo '<div class="wrap"><h1>Verse Picture to Instagram</h1>';
	if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
	echo '<p>Posts today&#8217;s picture message (with the verse as the caption) to each site&#8217;s Instagram account every morning (about 6:15 AM IST). This only works for an Instagram <strong>Business or Creator</strong> account linked to the matching Facebook Page &mdash; a personal Instagram account cannot be posted to by any app. To set this up: in the Instagram app, go to Settings &rarr; Account type and tools &rarr; Switch to professional account, choose Business, and link it to the matching Facebook Page. Then in Facebook&#8217;s Graph API Explorer (developers.facebook.com/tools/explorer), generate a Page Access Token with the <code>instagram_basic</code> and <code>instagram_content_publish</code> permissions added (besides the usual Page ones), extend it with the Access Token Debugger, and find the Instagram Business Account ID under the Page&#8217;s <code>instagram_business_account</code> field.</p>';
	echo '<form method="post" autocomplete="off">';
	wp_nonce_field('ga_ig');
	echo '<table class="form-table" role="presentation">';
	foreach (array('en' => 'English (GodAlone.in)', 'ta' => 'Tamil (Kadavulmattum.org)', 'hi' => 'Hindi (Ekkhuda.org)') as $l => $label) {
		$ig  = isset($o['ig_' . $l]) ? $o['ig_' . $l] : '';
		$has = !empty($o['token_' . $l]);
		echo '<tr><th scope="row" colspan="2"><strong>' . esc_html($label) . '</strong></th></tr>';
		echo '<tr><th scope="row"><label for="igid' . $l . '">Instagram Business Account ID</label></th><td><input id="igid' . $l . '" type="text" name="ig_' . $l . '" value="' . esc_attr($ig) . '" class="regular-text"></td></tr>';
		echo '<tr><th scope="row"><label for="igtok' . $l . '">Access Token</label></th><td><input id="igtok' . $l . '" type="password" name="token_' . $l . '" class="regular-text" autocomplete="new-password" placeholder="' . ($has ? 'Saved (ends ...' . esc_attr(substr($o['token_' . $l], -4)) . ') - leave blank to keep' : 'Paste the Page Access Token (with Instagram permissions)') . '"></td></tr>';
	}
	echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
	echo '</table>';
	echo '<p class="submit"><button type="submit" name="ga_ig_action" value="save" class="button button-primary">Save</button> ';
	if ($has_any) {
		echo '<button type="submit" name="ga_ig_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s picture to Instagram now?\');">Post today\'s picture now (test)</button> ';
		echo '<button type="submit" name="ga_ig_action" value="remove" class="button" onclick="return confirm(\'Remove all saved Instagram tokens?\');">Remove tokens</button>';
	}
	echo '</p></form>';
	if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
	echo '</div>';
}

/* GA-TWT-2026-11-10: post the verse + daily picture message to a single shared X (Twitter) account
   (Settings > Verse Picture to X), once per language (English/Tamil/Hindi), each labelled with its
   own website name - mirrors GA-VIG above but with one shared OAuth 1.0a credential set instead of
   per-language tokens, a shorter caption that fits X's 280-character limit, and X's own 2-step
   posting flow (upload the image via v1.1 media/upload, then create the tweet via v2 tweets).
   Loaded here directly because the Theme Editor can only edit this file, not create new ones. */
function ga_twt_opts() { $o = get_option('ga_twt', array()); return is_array($o) ? $o : array(); }

add_action('admin_menu', function () {
	add_options_page('Verse Picture to X', 'Verse Picture to X', 'manage_options', 'ga-twt', 'ga_twt_page');
});

add_action('init', function () {
	if (!wp_next_scheduled('ga_twt_daily')) {
		wp_schedule_event(strtotime('tomorrow 01:15:00 UTC'), 'daily', 'ga_twt_daily');
	}
});
add_action('ga_twt_daily', function () { ga_twt_run(false); });

function ga_twt_caption($v, $lang) {
	if (!function_exists('ga_votd_t')) { return ''; }
	$T = ga_votd_t($lang);
	$site = ($lang === 'ta') ? 'Kadavulmattum.org' : (($lang === 'hi') ? 'Ekkhuda.org' : 'GodAlone.in');
	$ref = $T['q'] . ' ' . $v['s'] . ':' . $v['a'];
	$url = 'https://godalone.in/quran/#/' . $v['s'] . '/' . $v['a'];
	$head = "\xE2\x9C\xA6 " . $site . ' ' . $T['title'];
	$tr = !empty($v[$lang]) ? $v[$lang] : $v['en'];
	$slen = function_exists('mb_strlen') ? 'mb_strlen' : 'strlen';
	$ssub = function_exists('mb_substr') ? 'mb_substr' : 'substr';
	$url_cost = 23; // X always counts a link as 23 chars (t.co), regardless of its real length
	$fixed_len = call_user_func($slen, $head . "\n\n" . "\n\n" . $ref . "\n");
	$budget = 280 - $fixed_len - $url_cost;
	if ($budget < 10) { $budget = 10; }
	if (call_user_func($slen, $tr) > $budget) {
		$cut = call_user_func($ssub, $tr, 0, max(0, $budget - 1));
		$cut = preg_replace('/\s+\S*$/u', '', $cut);
		$tr = $cut . "\xE2\x80\xA6";
	}
	return $head . "\n\n" . $tr . "\n\n" . $ref . "\n" . $url;
}

function ga_twt_oauth_header($method, $url, $params, $keys) {
	$oauth = array(
		'oauth_consumer_key'     => $keys['ck'],
		'oauth_nonce'            => md5(uniqid('', true) . wp_rand()),
		'oauth_signature_method' => 'HMAC-SHA1',
		'oauth_timestamp'        => (string) time(),
		'oauth_token'            => $keys['at'],
		'oauth_version'          => '1.0',
	);
	$all = array_merge($oauth, $params);
	$pairs = array();
	foreach ($all as $k => $v) { $pairs[] = rawurlencode($k) . '=' . rawurlencode($v); }
	sort($pairs);
	$base = strtoupper($method) . '&' . rawurlencode($url) . '&' . rawurlencode(implode('&', $pairs));
	$signing_key = rawurlencode($keys['cs']) . '&' . rawurlencode($keys['ats']);
	$oauth['oauth_signature'] = base64_encode(hash_hmac('sha1', $base, $signing_key, true));
	$parts = array();
	foreach ($oauth as $k => $v) { $parts[] = rawurlencode($k) . '="' . rawurlencode($v) . '"'; }
	return 'OAuth ' . implode(', ', $parts);
}

function ga_twt_upload_media($image_bytes, $keys) {
	$url = 'https://upload.twitter.com/1.1/media/upload.json';
	$auth = ga_twt_oauth_header('POST', $url, array(), $keys);
	$boundary = wp_generate_password(24, false);
	$body = '--' . $boundary . "\r\n" . 'Content-Disposition: form-data; name="media_data"' . "\r\n\r\n" . base64_encode($image_bytes) . "\r\n" . '--' . $boundary . '--' . "\r\n";
	$resp = wp_remote_post($url, array(
		'timeout' => 60,
		'headers' => array('Authorization' => $auth, 'Content-Type' => 'multipart/form-data; boundary=' . $boundary),
		'body'    => $body,
	));
	if (is_wp_error($resp)) { return array(false, $resp->get_error_message()); }
	$j = json_decode(wp_remote_retrieve_body($resp), true);
	if (is_array($j) && !empty($j['media_id_string'])) { return array(true, $j['media_id_string']); }
	$msg = (is_array($j) && isset($j['errors'][0]['message'])) ? $j['errors'][0]['message'] : ('HTTP ' . wp_remote_retrieve_response_code($resp));
	return array(false, $msg);
}

function ga_twt_post_tweet($text, $media_id, $keys) {
	$url = 'https://api.twitter.com/2/tweets';
	$auth = ga_twt_oauth_header('POST', $url, array(), $keys);
	$payload = array('text' => $text);
	if ($media_id) { $payload['media'] = array('media_ids' => array($media_id)); }
	$resp = wp_remote_post($url, array(
		'timeout' => 30,
		'headers' => array('Authorization' => $auth, 'Content-Type' => 'application/json'),
		'body'    => wp_json_encode($payload),
	));
	if (is_wp_error($resp)) { return array(false, $resp->get_error_message()); }
	$j = json_decode(wp_remote_retrieve_body($resp), true);
	if (is_array($j) && !empty($j['data']['id'])) { return array(true, $j['data']['id']); }
	$msg = (is_array($j) && isset($j['errors'][0]['message'])) ? $j['errors'][0]['message'] : ((is_array($j) && isset($j['detail'])) ? $j['detail'] : ('HTTP ' . wp_remote_retrieve_response_code($resp)));
	return array(false, $msg);
}

function ga_twt_publish($keys, $image_url, $text) {
	$img = wp_remote_get($image_url, array('timeout' => 30));
	if (is_wp_error($img)) { return array(false, 'image fetch: ' . $img->get_error_message()); }
	$bytes = wp_remote_retrieve_body($img);
	if ($bytes === '') { return array(false, 'image fetch failed'); }
	list($ok, $r) = ga_twt_upload_media($bytes, $keys);
	if (!$ok) { return array(false, 'media upload: ' . $r); }
	list($ok2, $r2) = ga_twt_post_tweet($text, $r, $keys);
	if (!$ok2) { return array(false, 'tweet: ' . $r2); }
	return array(true, 'posted');
}

function ga_twt_run($force) {
	$o = ga_twt_opts();
	if (!$force && empty($o['on'])) { return array('Auto-posting is switched off.'); }
	$today = gmdate('Y-m-d');
	if (!$force && isset($o['last_day']) && $o['last_day'] === $today) { return array('Already posted today.'); }
	$keys = array(
		'ck'  => isset($o['ck']) ? trim((string) $o['ck']) : '',
		'cs'  => isset($o['cs']) ? trim((string) $o['cs']) : '',
		'at'  => isset($o['at']) ? trim((string) $o['at']) : '',
		'ats' => isset($o['ats']) ? trim((string) $o['ats']) : '',
	);
	if ($keys['ck'] === '' || $keys['cs'] === '' || $keys['at'] === '' || $keys['ats'] === '') { return array('X credentials are not set.'); }
	if (!function_exists('ga_votd_verse_for') || !function_exists('ga_pm_daily') || !function_exists('ga_pm_find')) { return array('Verse/picture data is unavailable.'); }
	$v = ga_votd_verse_for(time());
	if (!$v) { return array('Verse data is unavailable.'); }
	$res = array();
	$any = false;
	foreach (array('en', 'ta', 'hi') as $lang) {
		$stem = ga_pm_daily(ga_ig_pm_lang($lang));
		if ($stem === '' || !ga_pm_find($stem)) {
			$res[] = strtoupper($lang) . ': no picture message available today - skipped.';
			continue;
		}
		$image_url = home_url('/picture-messages/img/?f=' . rawurlencode($stem) . '&s=full');
		$r = ga_twt_publish($keys, $image_url, ga_twt_caption($v, $lang));
		if ($r[0]) { $any = true; }
		$msg = $r[0] ? 'posted' : 'FAILED - ' . $r[1];
		foreach (array($keys['ck'], $keys['cs'], $keys['at'], $keys['ats']) as $secret) {
			if ($secret !== '') { $msg = str_replace($secret, '***', $msg); }
		}
		$res[] = strtoupper($lang) . ' X: ' . $msg;
	}
	if (!$res) { $res[] = 'No picture message was available today.'; }
	if ($any) { $o['last_day'] = $today; }
	$o['last_result'] = gmdate('Y-m-d H:i') . ' UTC - ' . implode(' | ', $res);
	update_option('ga_twt', $o, false);
	return $res;
}

function ga_twt_page() {
	if (!current_user_can('manage_options')) { return; }
	$o = ga_twt_opts();
	$notice = '';
	if (isset($_POST['ga_twt_action']) && check_admin_referer('ga_twt')) {
		$act = sanitize_key(wp_unslash($_POST['ga_twt_action']));
		if ($act === 'save') {
			foreach (array('ck', 'cs', 'at', 'ats') as $field) {
				$val = isset($_POST[$field]) ? trim((string) wp_unslash($_POST[$field])) : '';
				if ($val !== '') {
					if (strlen($val) >= 10) { $o[$field] = $val; }
					else { $notice .= 'The ' . strtoupper($field) . ' value did not look right, so it was not changed. '; }
				}
			}
			$o['on'] = isset($_POST['on']) ? 1 : 0;
			update_option('ga_twt', $o, false);
			$notice .= 'Saved.';
		} elseif ($act === 'remove') {
			foreach (array('ck', 'cs', 'at', 'ats') as $field) { unset($o[$field]); }
			$o['on'] = 0;
			update_option('ga_twt', $o, false);
			$notice = 'Credentials removed and auto-posting switched off.';
		} elseif ($act === 'post') {
			$notice = implode(' | ', ga_twt_run(true));
			$o = ga_twt_opts();
		}
	}
	$has_any = !empty($o['ck']) && !empty($o['cs']) && !empty($o['at']) && !empty($o['ats']);
	echo '<div class="wrap"><h1>Verse Picture to X</h1>';
	if ($notice !== '') { echo '<div class="notice notice-info"><p>' . esc_html($notice) . '</p></div>'; }
	echo '<p>Posts today&#8217;s picture message (with a short verse caption that fits X&#8217;s 280-character limit) to <strong>one shared X account</strong> every morning (about 6:45 AM IST), once for each language (English, Tamil, Hindi), each post labelled with its own website name. Needs an X Developer app with <strong>Read and write</strong> permission, and its 4 OAuth 1.0a credentials from the app&#8217;s Keys &amp; Tokens page (developer.twitter.com / console.x.com): Consumer Key, Consumer Secret, Access Token and Access Token Secret.</p>';
	echo '<form method="post" autocomplete="off">';
	wp_nonce_field('ga_twt');
	echo '<table class="form-table" role="presentation">';
	foreach (array('ck' => 'Consumer Key', 'cs' => 'Consumer Secret', 'at' => 'Access Token', 'ats' => 'Access Token Secret') as $field => $label) {
		$has = !empty($o[$field]);
		echo '<tr><th scope="row"><label for="twt' . $field . '">' . esc_html($label) . '</label></th><td><input id="twt' . $field . '" type="password" name="' . $field . '" class="regular-text" autocomplete="new-password" placeholder="' . ($has ? 'Saved (ends ...' . esc_attr(substr($o[$field], -4)) . ') - leave blank to keep' : 'Paste the ' . esc_attr($label)) . '"></td></tr>';
	}
	echo '<tr><th scope="row">Auto-post every morning</th><td><label><input type="checkbox" name="on" value="1"' . (!empty($o['on']) ? ' checked' : '') . '> Switched on</label></td></tr>';
	echo '</table>';
	echo '<p class="submit"><button type="submit" name="ga_twt_action" value="save" class="button button-primary">Save</button> ';
	if ($has_any) {
		echo '<button type="submit" name="ga_twt_action" value="post" class="button" onclick="return confirm(\'Post today\\\'s picture to X now?\');">Post today\'s picture now (test)</button> ';
		echo '<button type="submit" name="ga_twt_action" value="remove" class="button" onclick="return confirm(\'Remove all saved X credentials?\');">Remove credentials</button>';
	}
	echo '</p></form>';
	if (!empty($o['last_result'])) { echo '<p><strong>Last run:</strong> ' . esc_html($o['last_result']) . '</p>'; }
	echo '</div>';
}
