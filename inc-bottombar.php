<?php
if (!defined('ABSPATH')) exit;
/* Shared mobile bottom bar + More sheet (14-10-2026) */
add_action('wp_footer', function(){
  if (is_admin() || is_feed()) return;
  $u = function($p){ return (strpos($p,'http')===0 || $p[0]==='#') ? $p : home_url($p); };
  $bar = [['📖','Read','https://godalone.in/quran/',''],['🎧','Listen','/audio-quran/',''],['📥','Download','/downloads/',''],['🛒','Purchase','#buy','gh-buy'],['🧭','Learn','/introduction/','']];
  $tiles = [['🏠','Home','/',''],['🤔','Is this for me?','/is-this-for-me/',''],['🕋','Is the Quran enough?','/is-the-quran-enough/',''],['🧮','Check it yourself','/check-it-yourself/',''],['🔢','Mathematical Miracle','/mathematical-miracle/',''],['🖼️','Picture Messages','/picture-messages/',''],['📚','Book Library','/library/',''],['🎥','Videos','/videos/',''],['❓','Quran Q&A','/quran-qa/',''],['🎨','Coloring Book','/coloring-book/',''],['🕌','Salat & Ramadan','/salat-timing/',''],['🌙','Ramadan Calculator','/ramadan-calculator/',''],['💰','Obligatory Charity (Zakat)','/zakat-calculator/',''],['🔢','19 Calculator','/calculator-19/',''],['🧰','All Tools','/utilities/',''],['❤️','Charity Trust','/charity/',''],['💬','FAQ','/faq/',''],['📞','Contact','/contact/',''],['ℹ️','About','/about/','']];
  $langs = [['English','https://godalone.in/'],['தமிழ்','https://kadavulmattum.org/'],['हिंदी','https://ekkhuda.org/']];
  echo '<nav class="gx-bb" aria-label="'.esc_attr('Quick navigation').'">';
  foreach ($bar as $b) { echo '<a'.($b[3]?' class="'.esc_attr($b[3]).'"':'').' href="'.esc_url($u($b[2])).'"><span>'.$b[0].'</span><em>'.esc_html($b[1]).'</em></a>'; }
  echo '<button type="button" id="gxbbMore" aria-expanded="false" aria-controls="gxbbSheet"><span>☰</span><em>'.esc_html('More').'</em></button></nav>';
  echo '<div class="gx-sh" id="gxbbSheet" hidden><div class="gx-sh-bg" data-x></div><div class="gx-sh-p" role="dialog" aria-modal="true" aria-label="'.esc_attr('Menu').'"><div class="gx-sh-h"><b>'.esc_html('Menu').'</b><button type="button" data-x aria-label="'.esc_attr('Close').'">✕</button></div><div class="gx-sh-g">';
  foreach ($tiles as $t) { echo '<a href="'.esc_url($u($t[2])).'"><span>'.$t[0].'</span>'.esc_html($t[1]).'</a>'; }
  echo '</div><div class="gx-sh-l">';
  foreach ($langs as $l) { echo '<a href="'.esc_url($l[1]).'">'.esc_html($l[0]).'</a>'; }
  echo '</div></div></div>';
  echo '<style>' . '.gx-bb,.gx-sh{display:none}
@media(max-width:760px){
body{padding-bottom:74px}
.float{display:none!important}
.gx-bb{display:flex;position:fixed;left:0;right:0;bottom:0;z-index:9000;background:#fff;border-top:1px solid rgba(27,37,71,.18);box-shadow:0 -6px 20px rgba(0,0,0,.10);padding-bottom:env(safe-area-inset-bottom)}
.gx-bb a,.gx-bb button{flex:1 1 0;min-width:0;display:flex;flex-direction:column;align-items:center;gap:2px;padding:8px 1px 9px;font-family:inherit;font-weight:700;font-size:10.5px;line-height:1.2;color:#1B2547;background:none;border:0;border-top:3px solid transparent;text-decoration:none;cursor:pointer;white-space:nowrap}
.gx-bb span{font-size:21px;line-height:1}
.gx-bb em{font-style:normal;max-width:100%;overflow:hidden;text-overflow:ellipsis}
.gx-bb .on{color:#9A6A14;border-top-color:#C9922B}
.gx-sh{display:block;position:fixed;inset:0;z-index:9500}
.gx-sh[hidden]{display:none}
.gx-sh-bg{position:absolute;inset:0;background:rgba(0,0,0,.5)}
.gx-sh-p{box-sizing:border-box;overflow-x:hidden;position:absolute;left:0;right:0;bottom:0;max-height:84vh;overflow:auto;background:#fff;border-radius:22px 22px 0 0;padding:14px 14px calc(20px + env(safe-area-inset-bottom));box-shadow:0 -10px 40px rgba(0,0,0,.28);animation:gxup .22s ease-out}
@keyframes gxup{from{transform:translateY(40px);opacity:0}to{transform:none;opacity:1}}
.gx-sh-h{display:flex;justify-content:space-between;align-items:center;margin:0 2px 12px}
.gx-sh-h b{font-size:19px;color:#1B2547}
.gx-sh-h button{width:38px;height:38px;border-radius:50%;border:1px solid rgba(27,37,71,.3);background:#FAF3E3;color:#1B2547;font-size:18px;cursor:pointer}
.gx-sh-g{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
.gx-sh-g a{box-sizing:border-box;min-width:0;overflow-wrap:break-word;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;text-align:center;padding:12px 5px;min-height:88px;border:1px solid rgba(27,37,71,.16);border-radius:16px;background:#FAF3E3;color:#1B2547;font-weight:600;font-size:12px;line-height:1.3;text-decoration:none}
.gx-sh-g a span{font-size:27px;line-height:1}
.gx-sh-l{display:flex;gap:8px;justify-content:center;margin-top:16px}
.gx-sh-l a{padding:9px 18px;border-radius:99px;border:1px solid rgba(27,37,71,.3);color:#1B2547;font-weight:700;text-decoration:none;font-size:14px}
body.gx-lock{overflow:hidden}
html:not(.theme-day) .gx-bb{background:#0A1024;border-top-color:rgba(255,255,255,.14)}
html:not(.theme-day) .gx-bb a,html:not(.theme-day) .gx-bb button{color:#F4EDDC}
html:not(.theme-day) .gx-bb .on{color:#F7D97E;border-top-color:#E5B94E}
html:not(.theme-day) .gx-sh-p{background:#111B38}
html:not(.theme-day) .gx-sh-h b{color:#F5ECD9}
html:not(.theme-day) .gx-sh-h button,html:not(.theme-day) .gx-sh-l a{background:transparent;color:#F5ECD9;border-color:rgba(255,255,255,.3)}
html:not(.theme-day) .gx-sh-g a{background:rgba(255,255,255,.07);color:#F5ECD9;border-color:rgba(255,255,255,.14)}
}' . '</style><script>' . '(function(){var m=document.getElementById(\'gxbbMore\'),s=document.getElementById(\'gxbbSheet\');if(!m||!s)return;function o(){s.hidden=false;document.body.classList.add(\'gx-lock\');m.setAttribute(\'aria-expanded\',\'true\');}function c(){s.hidden=true;document.body.classList.remove(\'gx-lock\');m.setAttribute(\'aria-expanded\',\'false\');}m.addEventListener(\'click\',function(){s.hidden?o():c();});s.addEventListener(\'click\',function(e){var t=e.target;if(t.closest&&(t.closest(\'[data-x]\')||t.closest(\'a\')))c();});document.addEventListener(\'keydown\',function(e){if(e.key===\'Escape\')c();});var p=location.pathname.replace(/\\/+$/,\'\')||\'/\';document.querySelectorAll(\'.gx-bb a\').forEach(function(a){try{var u=new URL(a.href,location.href);if(u.origin!==location.origin)return;var q=u.pathname.replace(/\\/+$/,\'\')||\'/\';if(a.getAttribute(\'href\').indexOf(\'#\')>-1&&q===\'/\')return;if(q===p)a.classList.add(\'on\');}catch(e){}});})();' . '</script>';
}, 20);

/* Desktop navigation row (14-10-2026) */
add_action('wp_footer', function(){
  if (is_admin() || is_feed()) return;
  $u = function($p){ return (strpos($p,'http')===0 || $p[0]==='#') ? $p : home_url($p); };
  $top = [['dd','Learn',[['🤔','Is this for me?','/is-this-for-me/',''],['🕋','Is the Quran enough?','/is-the-quran-enough/',''],['🧮','Check it yourself','/check-it-yourself/',''],['🔢','Mathematical Miracle','/mathematical-miracle/',''],['📖','Introduction','/introduction/','']]],['link','📖 Read','https://godalone.in/quran/',''],['link','🎧 Listen','/audio-quran/',''],['link','📥 Download','/downloads/',''],['link','🛒 Purchase','#buy','gh-buy'],['dd','Library & Media',[['🖼️','Picture Messages','/picture-messages/',''],['📚','Book Library','/library/',''],['🎥','Videos','/videos/',''],['❓','Quran Q&A','/quran-qa/',''],['🎨','Coloring Book','/coloring-book/','']]],['dd','Tools',[['🕌','Salat & Ramadan','/salat-timing/',''],['🌙','Ramadan Calculator','/ramadan-calculator/',''],['💰','Obligatory Charity (Zakat)','/zakat-calculator/',''],['🔢','19 Calculator','/calculator-19/',''],['🧰','All Tools','/utilities/','']]],['dd','More',[['❤️','Charity Trust','/charity/',''],['💬','FAQ','/faq/',''],['📞','Contact','/contact/',''],['ℹ️','About','/about/','']]]];
  echo '<nav class="gx-dn" id="gxDn" aria-label="'.esc_attr('Main navigation').'"><ul>';
  foreach ($top as $it) {
    if ($it[0] === 'link') { echo '<li><a'.($it[3]?' class="'.esc_attr($it[3]).'"':'').' href="'.esc_url($u($it[2])).'">'.esc_html($it[1]).'</a></li>'; }
    else { echo '<li><button type="button" aria-expanded="false" aria-haspopup="true">'.esc_html($it[1]).' <i class="car">▾</i></button><div class="gx-dd">';
      foreach ($it[2] as $s) { echo '<a href="'.esc_url($u($s[2])).'"><span>'.$s[0].'</span>'.esc_html($s[1]).'</a>'; }
      echo '</div></li>'; }
  }
  echo '</ul></nav>';
  echo '<style>' . '.gx-dn{display:none}
@media(min-width:900px){
.gx-dn{display:block;position:sticky;top:71px;z-index:890;background:rgba(255,255,255,.94);backdrop-filter:blur(8px);border-bottom:1px solid rgba(27,37,71,.16);box-shadow:0 4px 14px rgba(0,0,0,.05)}
.gx-dn ul{list-style:none;margin:0 auto;padding:4px 16px;max-width:1180px;display:flex;justify-content:center;flex-wrap:wrap;gap:2px}
.gx-dn li{position:relative}
.gx-dn li>a,.gx-dn li>button{display:flex;align-items:center;gap:6px;padding:10px 13px;font-family:inherit;font-size:14.5px;font-weight:700;color:#1B2547;background:none;border:0;border-bottom:3px solid transparent;border-radius:10px 10px 0 0;text-decoration:none;cursor:pointer;white-space:nowrap}
.gx-dn li>a:hover,.gx-dn li>button:hover,.gx-dn li:focus-within>button,.gx-dn li.open>button{background:rgba(229,185,78,.14)}
.gx-dn .on>a,.gx-dn .on>button,.gx-dn li>a.on{color:#9A6A14;border-bottom-color:#C9922B}
.gx-dn .car{font-size:10px;opacity:.7}
.gx-dd{display:none;position:absolute;top:100%;left:0;min-width:270px;background:#fff;border:1px solid rgba(27,37,71,.18);border-radius:14px;padding:8px;box-shadow:0 14px 34px rgba(0,0,0,.18);z-index:5}
.gx-dn li:last-child .gx-dd{left:auto;right:0}
.gx-dn li:hover>.gx-dd,.gx-dn li:focus-within>.gx-dd,.gx-dn li.open>.gx-dd{display:block}
.gx-dd a{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;color:#1B2547;font-size:14.5px;font-weight:600;text-decoration:none}
.gx-dd a:hover{background:#F5ECD9}
.gx-dd a.on{background:#F0E6CF;color:#9A6A14}
.gx-dd a span{font-size:19px;line-height:1;width:24px;text-align:center}
html:not(.theme-day) .gx-dn{background:rgba(10,16,36,.94);border-bottom-color:rgba(255,255,255,.12)}
html:not(.theme-day) .gx-dn li>a,html:not(.theme-day) .gx-dn li>button{color:#F4EDDC}
html:not(.theme-day) .gx-dn li>a:hover,html:not(.theme-day) .gx-dn li>button:hover,html:not(.theme-day) .gx-dn li.open>button{background:rgba(255,255,255,.09)}
html:not(.theme-day) .gx-dn .on>a,html:not(.theme-day) .gx-dn .on>button,html:not(.theme-day) .gx-dn li>a.on{color:#F7D97E;border-bottom-color:#E5B94E}
html:not(.theme-day) .gx-dd{background:#111B38;border-color:rgba(255,255,255,.16)}
html:not(.theme-day) .gx-dd a{color:#F5ECD9}
html:not(.theme-day) .gx-dd a:hover{background:rgba(255,255,255,.09)}
html:not(.theme-day) .gx-dd a.on{background:rgba(229,185,78,.2);color:#F7D97E}
}
@media print{.gx-dn{display:none!important}}' . '</style><script>' . '(function(){var n=document.getElementById(\'gxDn\');if(!n)return;var h=document.querySelector(\'header.gh\');if(!h){n.remove();return;}h.parentNode.insertBefore(n,h.nextSibling);function t(){n.style.top=h.offsetHeight+\'px\';}t();window.addEventListener(\'resize\',t);var p=location.pathname.replace(/\\/+$/,\'\')||\'/\';n.querySelectorAll(\'a\').forEach(function(a){try{var u=new URL(a.href,location.href);if(u.origin!==location.origin)return;if(a.getAttribute(\'href\').indexOf(\'#\')===0)return;var q=u.pathname.replace(/\\/+$/,\'\')||\'/\';if(q===p){a.classList.add(\'on\');var li=a.closest(\'li\');var top=li&&li.parentNode===n.firstElementChild?li:a.closest(\'.gx-dn > ul > li\');if(top)top.classList.add(\'on\');}}catch(e){}});n.querySelectorAll(\'li>button\').forEach(function(b){b.addEventListener(\'click\',function(e){var li=b.parentNode;var o=li.classList.contains(\'open\');n.querySelectorAll(\'li.open\').forEach(function(x){x.classList.remove(\'open\');x.firstElementChild.setAttribute(\'aria-expanded\',\'false\');});if(!o){li.classList.add(\'open\');b.setAttribute(\'aria-expanded\',\'true\');}e.stopPropagation();});});document.addEventListener(\'click\',function(e){if(!n.contains(e.target))n.querySelectorAll(\'li.open\').forEach(function(x){x.classList.remove(\'open\');});});document.addEventListener(\'keydown\',function(e){if(e.key===\'Escape\')n.querySelectorAll(\'li.open\').forEach(function(x){x.classList.remove(\'open\');});});})();' . '</script>';
}, 21);
