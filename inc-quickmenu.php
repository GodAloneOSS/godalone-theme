<?php
if (!defined('ABSPATH')) exit;
/* Floating quick menu: 3-line button on the left edge (17-11-2026). Desktop only; phones keep the bottom bar. */
add_action('wp_footer', function () {
  try {
    if (is_admin() || is_feed()) return;
    $u = function ($p) { return (strpos($p, 'http') === 0 || $p[0] === '#') ? $p : home_url($p); };
    $main = array(array('home', 'Home', '/'), array('book', 'Quran App', 'https://godalone.in/quran/'), array('audio', 'Quran Audio', '/audio-quran/'), array('buy', 'Quran Purchase', 'https://www.amazon.in/l/27943762031?ie=UTF8&marketplaceID=A21TJRUUN4KGV&product=B09DDBLYF3&me=AX4GIDLDYNYHG'), array('more', 'More', '/explore/'));
    $tiles = array(array('🏠', 'Home', '/', ''), array('🤔', 'Is this for me?', '/is-this-for-me/', ''), array('🕋', 'Is the Quran enough?', '/is-the-quran-enough/', ''), array('🧮', 'Check it yourself', '/check-it-yourself/', ''), array('🔢', 'Mathematical Miracle', '/mathematical-miracle/', ''), array('🖼️', 'Picture Messages', '/picture-messages/', ''), array('📚', 'Book Library', '/library/', ''), array('🎥', 'Videos', '/videos/', ''), array('💻', 'Masjid India IT Wing', '/it-wing/', ''), array('❓', 'Quran Q&A', '/quran-qa/', ''), array('🎨', 'Coloring Book', '/coloring-book/', ''), array('🕌', 'Salat & Ramadan', '/salat-timing/', ''), array('🌙', 'Ramadan Calculator', '/ramadan-calculator/', ''), array('💰', 'Obligatory Charity (Zakat)', '/zakat-calculator/', ''), array('🔢', '19 Calculator', '/calculator-19/', ''), array('🧰', 'All Tools', '/utilities/', ''), array('❤️', 'Charity Trust', '/charity/', ''), array('💬', 'FAQ', '/faq/', ''), array('📞', 'Contact', '/contact/', ''), array('ℹ️', 'About', '/about/', ''));
    $ttl = 'Menu';
    $ico = array(
      'home' => '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 11l8-7 8 7v8.5a1.5 1.5 0 0 1-1.5 1.5H5.5A1.5 1.5 0 0 1 4 19.5z"/><path d="M9.5 21v-6h5v6"/></svg>',
      'book' => '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21.5z"/><path d="M4 21.5V5.5"/><path d="M9 8h7"/></svg>',
      'audio' => '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14v-2a8 8 0 0 1 16 0v2"/><rect x="3" y="14" width="4" height="6" rx="1.5"/><rect x="17" y="14" width="4" height="6" rx="1.5"/></svg>',
      'buy' => '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4h2.5l2.2 11h10.6l2-8H6.5"/><circle cx="9" cy="19.5" r="1.3"/><circle cx="17" cy="19.5" r="1.3"/></svg>',
      'more' => '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="6.5" height="6.5" rx="1.6"/><rect x="13.5" y="4" width="6.5" height="6.5" rx="1.6"/><rect x="4" y="13.5" width="6.5" height="6.5" rx="1.6"/><rect x="13.5" y="13.5" width="6.5" height="6.5" rx="1.6"/></svg>'
    );
    $home = untrailingslashit(home_url());
    $a = function ($url, $cls, $inner) use ($u, $home) {
      $h = $u($url);
      $ext = (strpos($h, 'http') === 0 && strpos($h, $home) !== 0);
      return '<a' . ($cls ? ' class="' . esc_attr($cls) . '"' : '') . ' href="' . esc_url($h) . '"' . ($ext ? ' target="_blank" rel="noopener"' : '') . '>' . $inner . '</a>';
    };
    echo '<div class="qm" id="qm"><button type="button" class="qm-fab" id="qmFab" aria-label="' . esc_attr($ttl) . '" aria-expanded="false" aria-controls="qmPill"><i></i><i></i><i></i></button>';
    echo '<nav class="qm-pill" id="qmPill" aria-label="' . esc_attr($ttl) . '">';
    foreach ($main as $i => $m) {
      if ($m[0] === 'more') {
        echo '<span class="qm-sep"></span>' . $a($m[2], 'qm-it', '<b>' . $ico['more'] . '</b><em>' . esc_html($m[1]) . '</em>');
      } else {
        if ($i === 1) echo '<span class="qm-sep"></span>';
        echo $a($m[2], 'qm-it', '<b>' . $ico[$m[0]] . '</b><em>' . esc_html($m[1]) . '</em>');
      }
    }
    echo '</nav></div>';
    ?>
<style>
.qm{display:none}
@media(min-width:900px){
.qm{display:block;position:fixed;left:0;top:50%;z-index:8990;font-family:inherit}
.qm-fab{position:fixed;left:0;top:50%;transform:translateY(-50%);width:46px;height:54px;border:1px solid rgba(229,185,78,.6);border-left:0;border-radius:0 18px 18px 0;background:#26326B;box-shadow:0 6px 22px rgba(0,0,0,.45);cursor:pointer;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;padding:0;transition:width .18s ease,background .18s ease}
.qm-fab:hover{width:52px}
.qm-fab:focus-visible,.qm-it:focus-visible,.qm-mg a:focus-visible{outline:2px solid #E5B94E;outline-offset:2px}
.qm-fab i{display:block;width:20px;height:2px;border-radius:2px;background:#F3D98E;transition:transform .2s ease,opacity .2s ease,width .2s ease}
.qm-fab i:nth-child(2){width:14px;align-self:flex-start;margin-left:13px}
.qm.is-open .qm-fab i:nth-child(1){transform:translateY(7px) rotate(45deg)}
.qm.is-open .qm-fab i:nth-child(2){opacity:0}
.qm.is-open .qm-fab i:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.qm-pill{position:fixed;left:58px;top:50%;transform:translate(-10px,-50%);width:92px;box-sizing:border-box;padding:10px 6px;border-radius:26px;background:#141A33;border:1px solid rgba(229,185,78,.32);box-shadow:0 14px 44px rgba(0,0,0,.45);display:flex;flex-direction:column;align-items:stretch;gap:2px;opacity:0;visibility:hidden;transition:opacity .18s ease,transform .18s ease,visibility .18s}
.qm.is-open .qm-pill{opacity:1;visibility:visible;transform:translate(0,-50%)}
.qm-it{all:unset;box-sizing:border-box;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:5px;padding:9px 4px;border-radius:16px;text-align:center;color:#F3E7C2;font-size:11.5px;line-height:1.25;font-weight:600}
.qm-it b{display:flex;align-items:center;justify-content:center;width:42px;height:42px;border-radius:50%;background:rgba(229,185,78,.12);color:#F3D98E;font-weight:400}
.qm-it em{font-style:normal;overflow-wrap:anywhere}
.qm-it:hover,.qm-it[aria-expanded="true"]{background:rgba(229,185,78,.14);color:#fff}
.qm-sep{display:block;height:1px;margin:5px 14px;background:rgba(229,185,78,.28)}
.qm-more{position:fixed;left:162px;top:50%;transform:translate(-10px,-50%);width:372px;max-width:calc(100vw - 190px);max-height:82vh;overflow:auto;box-sizing:border-box;padding:14px;border-radius:24px;background:#141A33;border:1px solid rgba(229,185,78,.32);box-shadow:0 14px 44px rgba(0,0,0,.45);opacity:0;visibility:hidden;transition:opacity .18s ease,transform .18s ease,visibility .18s}
.qm.is-more .qm-more{opacity:1;visibility:visible;transform:translate(0,-50%)}
.qm-mh{margin:0 4px 10px;color:#F3D98E;font-size:15px}
.qm-mg{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px}
.qm-mg a{box-sizing:border-box;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;min-height:84px;padding:10px 5px;border-radius:16px;background:rgba(229,185,78,.09);border:1px solid rgba(229,185,78,.18);color:#F3E7C2;text-decoration:none;text-align:center;font-size:12px;line-height:1.25;font-weight:600}
.qm-mg a b{font-size:22px;font-weight:400;line-height:1}
.qm-mg a em{font-style:normal;overflow-wrap:anywhere}
.qm-mg a:hover{background:rgba(229,185,78,.2);color:#fff}
html.theme-day .qm-pill,html.theme-day .qm-more{background:#fff;border-color:rgba(27,37,71,.16);box-shadow:0 14px 44px rgba(27,37,71,.22)}
html.theme-day .qm-it{color:#1B2547}
html.theme-day .qm-it b{background:rgba(27,37,71,.07);color:#1B2547}
html.theme-day .qm-it:hover,html.theme-day .qm-it[aria-expanded="true"]{background:rgba(27,37,71,.07);color:#000}
html.theme-day .qm-sep{background:rgba(27,37,71,.16)}
html.theme-day .qm-mh{color:#1B2547}
html.theme-day .qm-mg a{background:#FAF3E3;border-color:rgba(27,37,71,.14);color:#1B2547}
html.theme-day .qm-mg a:hover{background:#F3E7C2;color:#000}
html.theme-day .qm-fab{background:#1B2547}
}
@media print{.qm{display:none!important}}
</style>
<script>
(function(){var q=document.getElementById('qm');if(!q)return;var f=document.getElementById('qmFab'),m=document.getElementById('qmMoreBtn');
function more(o){q.classList.toggle('is-more',o);if(m)m.setAttribute('aria-expanded',o?'true':'false')}
function open(o){q.classList.toggle('is-open',o);f.setAttribute('aria-expanded',o?'true':'false');if(!o)more(false)}
var hov=window.matchMedia&&window.matchMedia('(hover:hover)').matches,tm,pl=document.getElementById('qmPill'),mp=document.getElementById('qmMore');
f.addEventListener('click',function(){open(hov?true:!q.classList.contains('is-open'))});
function hold(){clearTimeout(tm)}function lazy(){hold();tm=setTimeout(function(){open(false)},400)}
if(hov){[f,pl].forEach(function(el){el.addEventListener('mouseenter',function(){hold();open(true)});el.addEventListener('mouseleave',lazy)});if(m)m.addEventListener('mouseenter',function(){more(true)})}
if(m)m.addEventListener('click',function(){more(!q.classList.contains('is-more'))});
document.addEventListener('click',function(e){if(q.classList.contains('is-open')&&!q.contains(e.target))open(false)});
document.addEventListener('keydown',function(e){if(e.key==='Escape'&&q.classList.contains('is-open')){open(false);f.focus()}});
})();
</script>
<?php
  } catch (\Throwable $e) {
    /* never break the page */
  }
}, 30);
