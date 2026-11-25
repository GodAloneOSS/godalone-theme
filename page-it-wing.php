<?php
/**
 * Template: Masjid India IT Wing (godalone.in). Route: /it-wing/ (added in functions.php).
 * Page design supplied by the user as it-wing.html; styles are scoped under .itw.
 * Language is fixed per site (data-lang), the page's own EN/TA switch is removed.
 */
if (!defined('ABSPATH')) exit;
$itw_title = 'Masjid India IT Wing — GodAlone.in';
$itw_desc = 'Masjid India Muslim Jamath IT Wing — the team, its completed work and projects in progress.';
$itw_url = home_url('/it-wing/');
add_filter('body_class', function ($c) { return array_merge(array_diff($c, array('home', 'blog')), array('page', 'page-it-wing')); }, 99);
ob_start(function ($h) use ($itw_title, $itw_desc, $itw_url) {
	$t = esc_html($itw_title); $d = esc_attr($itw_desc); $u = esc_url($itw_url);
	$h = preg_replace('#<title>.*?</title>#is', '<title>' . $t . '</title>', $h, 1);
	$h = preg_replace('#(<meta\s+(?:property|name)=["\'](?:og:title|twitter:title)["\']\s+content=["\'])[^"\']*#i', '${1}' . $t, $h);
	$h = preg_replace('#(<meta\s+(?:property|name)=["\'](?:description|og:description|twitter:description)["\']\s+content=["\'])[^"\']*#i', '${1}' . $d, $h);
	$h = preg_replace('#(<link\s+rel=["\']canonical["\']\s+href=["\'])[^"\']*#i', '${1}' . $u, $h);
	$h = preg_replace('#(<meta\s+property=["\']og:url["\']\s+content=["\'])[^"\']*#i', '${1}' . $u, $h);
	return $h;
});
get_header();
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Inter:wght@400;500;600;700&family=Scheherazade+New:wght@400;700&family=Noto+Sans+Tamil:wght@400;500;600&family=Noto+Serif+Tamil:wght@500;700&display=swap" rel="stylesheet">
<style>

/* All styles are scoped under .itw so the block can be pasted into an existing page */
.itw{--bg:#0A1024;--bg2:#111B38;--card:#111B38;--hi:#18254D;--line:rgba(229,185,78,.18);--line2:rgba(255,255,255,.07);--gold:#E5B94E;--gold2:#F7D97E;--gold-deep:#9A6A14;--tan:#F2DFA8;--ink:#F9FAFB;--soft:#D9DCEB;--mute:#9AA6C8;--teal:#5fd0b8;--amber:#f0a94b;--violet:#a99cf7;--danger:#ff8a80;
  --grad:linear-gradient(92deg,#9A6A14,#F7D97E 45%,#E5B94E);--shadow:0 24px 60px -24px rgba(0,0,0,.75);
  --serif:"Marcellus",Georgia,serif;--sans:"Inter",system-ui,sans-serif;
  background:var(--bg);color:var(--ink);font-family:var(--sans);line-height:1.6;overflow:hidden;position:relative;-webkit-font-smoothing:antialiased}
.itw *{box-sizing:border-box;margin:0;padding:0}
.itw a{color:inherit}
.itw[data-lang="ta"]{--serif:"Noto Serif Tamil","Marcellus",serif;--sans:"Noto Sans Tamil","Inter",sans-serif}
.itw[data-lang="en"] .ta,.itw[data-lang="ta"] .en{display:none!important}
.itw .wrap{max-width:1180px;margin:0 auto;padding:0 24px;position:relative;z-index:2}

/* ---------- language switch ---------- */
.itw .lang{position:fixed;top:18px;right:18px;z-index:50;display:flex;background:rgba(10,16,36,.75);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);border:1px solid var(--line);border-radius:999px;padding:4px}
.itw .lang button{all:unset;cursor:pointer;padding:8px 16px;border-radius:999px;font:600 13px/1 var(--sans);color:var(--mute);transition:.3s}
.itw .lang button[aria-pressed="true"]{background:var(--grad);color:#fff}
.itw .lang button:focus-visible{outline:2px solid var(--gold2);outline-offset:2px}
.itw .lang .tb{font-family:"Noto Sans Tamil",sans-serif}

/* ---------- hero ---------- */
.itw .hero{position:relative;min-height:92vh;display:flex;align-items:center;padding:110px 0 80px;isolation:isolate}
.itw #net{position:absolute;inset:0;width:100%;height:100%;z-index:-1;opacity:.9}
.itw .hero::before{content:"";position:absolute;inset:0;z-index:-2;background:radial-gradient(120% 90% at 12% -5%,rgba(229,185,78,.26),transparent 52%),radial-gradient(120% 90% at 88% 105%,rgba(111,143,255,.13),transparent 55%),linear-gradient(162deg,#18254D 0%,#0F1831 52%,#0A1024 100%)}
.itw .hero::after{content:"";position:absolute;left:0;right:0;bottom:0;height:160px;z-index:-1;background:linear-gradient(transparent,var(--bg))}
.itw .hero-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:40px;align-items:center}
.itw .eyebrow{display:inline-flex;align-items:center;gap:10px;color:var(--gold2);font:500 14px/1.4 var(--sans);letter-spacing:.04em;margin-bottom:22px}
.itw .eyebrow i{width:34px;height:1px;background:var(--gold)}
.itw h1{font:400 clamp(50px,8vw,104px)/1.02 var(--serif);letter-spacing:-.01em}
.itw[data-lang="ta"] h1{font-size:clamp(40px,6.4vw,82px);line-height:1.15;letter-spacing:0}
.itw h1 .g{background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.itw .lead{margin-top:26px;max-width:560px;font-size:clamp(17px,1.6vw,20px);color:#cdd2e4}
.itw[data-lang="ta"] .lead{font-size:clamp(16px,1.4vw,18px);line-height:1.8}
.itw .cta-row{margin-top:36px;display:flex;gap:14px;flex-wrap:wrap}
.itw .btn{display:inline-flex;align-items:center;gap:10px;text-decoration:none;padding:14px 24px;border-radius:999px;font:600 15px/1 var(--sans);transition:transform .25s,box-shadow .25s,background .25s}
.itw .btn-p{background:var(--grad);background-size:200% 100%;color:#fff;text-shadow:0 1px 2px rgba(80,50,0,.45);box-shadow:0 10px 30px -10px rgba(229,185,78,.6),inset 0 1px 0 rgba(255,255,255,.35);transition:background-position .6s,transform .25s,box-shadow .25s}
.itw .btn-p:hover{background-position:100% 0}
.itw .btn-p:hover{transform:translateY(-2px);box-shadow:0 16px 40px -10px rgba(229,185,78,.75)}
.itw .btn-g{border:1px solid var(--line);color:var(--gold2);background:rgba(10,16,36,.4)}
.itw .btn-g:hover{background:rgba(229,185,78,.08)}

/* star emblem */
.itw .emblem{position:relative;aspect-ratio:1;max-width:440px;width:100%;justify-self:center}
.itw .emblem svg{width:100%;height:100%;overflow:visible}
.itw .spin{transform-origin:50% 50%;animation:itw-spin 80s linear infinite}
.itw .spin-r{transform-origin:50% 50%;animation:itw-spin 120s linear infinite reverse}
.itw .pulse{animation:itw-pulse 4s ease-in-out infinite}
@keyframes itw-spin{to{transform:rotate(360deg)}}
@keyframes itw-pulse{50%{opacity:.45}}
.itw .emblem .core{position:absolute;inset:0;display:grid;place-items:center;text-align:center}
.itw .emblem .core b{display:block;font:700 clamp(54px,7vw,84px)/1 var(--serif);color:var(--gold2);font-family:"Marcellus",serif}
.itw .emblem .core span{display:block;margin-top:6px;font:500 13px/1.3 var(--sans);letter-spacing:.14em;text-transform:uppercase;color:var(--mute)}
.itw[data-lang="ta"] .emblem .core span{letter-spacing:0;font-size:14px}

/* ---------- stats ---------- */
.itw .stats{display:grid;grid-template-columns:repeat(4,1fr);border:1px solid var(--line);border-radius:22px;background:linear-gradient(180deg,rgba(18,27,59,.85),rgba(15,23,51,.6));backdrop-filter:blur(8px);overflow:hidden;margin-top:-30px}
.itw .stat{padding:30px 26px;position:relative}
.itw .stat+.stat{border-left:1px solid var(--line)}
.itw .stat .n{font:700 clamp(38px,4.6vw,56px)/1 "Marcellus",serif;color:var(--gold2)}
.itw .stat .l{margin-top:10px;color:var(--mute);font-size:15px}

/* ---------- sections ---------- */
.itw section.s{padding:120px 0 0}
.itw .kicker{color:var(--gold);font:600 13px/1 var(--sans);letter-spacing:.18em;text-transform:uppercase;display:flex;align-items:center;gap:12px}
.itw[data-lang="ta"] .kicker{letter-spacing:.02em;font-size:14px}
.itw .kicker::before{content:"";width:8px;height:8px;transform:rotate(45deg);background:var(--gold)}
.itw h2{margin-top:16px;font:400 clamp(34px,4.6vw,56px)/1.12 var(--serif);letter-spacing:-.01em}
.itw[data-lang="ta"] h2{line-height:1.35;font-size:clamp(28px,3.6vw,44px)}
.itw .sub{margin-top:16px;max-width:640px;color:var(--mute);font-size:17px}

/* about */
.itw .about{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start}
.itw .quote{font:400 clamp(22px,2.4vw,30px)/1.5 var(--serif);color:#dfe3f1}
.itw[data-lang="ta"] .quote{font-size:clamp(19px,2vw,24px);line-height:1.8}
.itw .quote em{color:var(--gold2);font-style:normal}
.itw .pillars{display:grid;gap:14px}
.itw .pillar{display:flex;gap:16px;padding:20px;border:1px solid var(--line);border-radius:16px;background:rgba(18,27,59,.5)}
.itw .pillar .ic{flex:none;width:44px;height:44px;border-radius:12px;display:grid;place-items:center;background:rgba(229,185,78,.12);color:var(--gold2)}
.itw .pillar h4{font:600 17px/1.3 var(--sans)}
.itw .pillar p{color:var(--mute);font-size:15px;margin-top:4px}

/* filters */
.itw .bar{display:flex;justify-content:space-between;align-items:end;gap:20px;flex-wrap:wrap}
.itw .filters{display:flex;gap:8px;flex-wrap:wrap}
.itw .filters button{all:unset;cursor:pointer;padding:10px 16px;border-radius:999px;border:1px solid var(--line);color:var(--mute);font:500 14px/1 var(--sans);transition:.25s;display:inline-flex;gap:8px;align-items:center}
.itw .filters button:hover{color:var(--ink);border-color:rgba(229,185,78,.45)}
.itw .filters button[aria-pressed="true"]{background:var(--ink);color:var(--bg);border-color:var(--ink)}
.itw .filters button:focus-visible{outline:2px solid var(--gold2);outline-offset:2px}
.itw .filters .c{font-size:12px;opacity:.7}

/* cards */
.itw .grid{margin-top:40px;display:grid;grid-template-columns:repeat(3,1fr);gap:20px;grid-auto-flow:dense}
.itw .card{--mx:50%;--my:0%;position:relative;border-radius:22px;padding:28px;background:var(--card);border:1px solid rgba(255,255,255,.06);overflow:hidden;transition:transform .4s cubic-bezier(.2,.8,.2,1),border-color .4s,opacity .4s;display:flex;flex-direction:column;min-height:300px}
.itw .card::before{content:"";position:absolute;inset:0;background:radial-gradient(420px circle at var(--mx) var(--my),rgba(229,185,78,.16),transparent 45%);opacity:0;transition:opacity .4s;pointer-events:none}
.itw .card:hover{transform:translateY(-6px);border-color:rgba(229,185,78,.35)}
.itw .card:hover::before{opacity:1}
.itw .card.hide{display:none}
.itw .card .top{display:flex;justify-content:space-between;align-items:start}
.itw .card .ic{width:52px;height:52px;border-radius:15px;display:grid;place-items:center;background:linear-gradient(135deg,rgba(229,185,78,.22),rgba(229,185,78,.05));color:var(--gold2);border:1px solid rgba(229,185,78,.25)}
.itw .card .no{font:400 15px/1 "Marcellus",serif;color:rgba(229,185,78,.55)}
.itw .card h3{margin-top:24px;font:400 23px/1.25 var(--serif)}
.itw[data-lang="ta"] .card h3{font-size:20px;line-height:1.45}
.itw .card .alt{font-size:13px;color:var(--mute);margin-top:4px}
.itw .card p{margin-top:14px;color:#c3c9de;font-size:15px;flex:1}
.itw[data-lang="ta"] .card p{line-height:1.85;font-size:14.5px}
.itw .card .foot{margin-top:22px;display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}
.itw .badge{display:inline-flex;align-items:center;gap:8px;padding:6px 12px;border-radius:999px;font:600 12.5px/1 var(--sans)}
.itw .badge i{width:7px;height:7px;border-radius:50%;background:currentColor}
.itw .b-live{color:var(--teal);background:rgba(79,195,176,.12)}
.itw .b-live i{box-shadow:0 0 0 0 rgba(79,195,176,.7);animation:itw-ping 2s infinite}
@keyframes itw-ping{70%{box-shadow:0 0 0 8px rgba(79,195,176,0)}100%{box-shadow:0 0 0 0 rgba(79,195,176,0)}}
.itw .b-prog{color:var(--amber);background:rgba(240,169,75,.12)}
.itw .b-plan{color:var(--violet);background:rgba(155,140,245,.13)}
.itw .link{font:600 14px/1 var(--sans);color:var(--gold2);text-decoration:none;display:inline-flex;gap:6px;align-items:center}
.itw .link:hover{text-decoration:underline}
.itw .card .foot{position:relative;z-index:1}
.itw .btn.visit{padding:11px 20px;font-size:14px}

/* featured Bayyinah */

/* ice breaker spotlight */
.itw .card.ice{grid-column:1/-1;display:grid;grid-template-columns:1.25fr .75fr;gap:36px;padding:34px;min-height:0;border-color:rgba(247,217,126,.4);background:radial-gradient(70% 120% at 100% 50%,rgba(111,143,255,.16),transparent 60%),radial-gradient(60% 90% at 0% 0%,rgba(229,185,78,.18),transparent 60%),linear-gradient(160deg,#18254D,#0F1831 60%,#0A1024)}
.itw .ice-l{display:flex;flex-direction:column}
.itw .ice-tag{margin-top:22px;display:inline-flex;align-self:flex-start;padding:6px 12px;border-radius:999px;font:600 12px/1 var(--sans);letter-spacing:.06em;color:#0A1024;background:var(--grad)}
.itw .card.ice h3{margin-top:14px;font-size:36px;font-family:"Marcellus",serif;letter-spacing:.02em}
.itw .ice-q{margin-top:14px;padding:12px 16px;border-left:3px solid var(--gold);border-radius:0 12px 12px 0;background:rgba(229,185,78,.07);font:italic 400 15px/1.6 "Marcellus",serif;color:var(--tan)}
.itw[data-lang="ta"] .ice-q{font:400 14px/1.8 "Noto Sans Tamil",sans-serif}
.itw .b-ready{color:var(--gold2);background:rgba(229,185,78,.14)}
.itw .b-ready i{animation:itw-pulse 1.6s infinite}
.itw .ice-r{display:grid;place-items:center}
.itw .phone-m{width:100%;max-width:330px;border-radius:30px;padding:10px;background:linear-gradient(160deg,#1d2b57,#0A1024);border:1px solid rgba(247,217,126,.3);box-shadow:0 30px 60px -25px rgba(0,0,0,.8),0 0 0 6px rgba(255,255,255,.02);transform:rotate(2deg);transition:transform .5s}
.itw .card.ice:hover .phone-m{transform:rotate(0) translateY(-4px)}
.itw .pm-head{display:flex;align-items:center;gap:10px;padding:12px 14px;border-radius:22px 22px 8px 8px;background:rgba(229,185,78,.12);color:var(--gold2)}
.itw .pm-head b{display:block;font:400 16px/1.2 "Marcellus",serif;color:var(--ink)}
.itw .pm-head small{font-size:11.5px;color:var(--mute)}
.itw .pm-head div{flex:1}
.itw .pm-dot{width:34px;height:34px;border-radius:50%;background:var(--grad);flex:none}
.itw .pm-body{padding:14px 6px;display:grid;gap:10px}
.itw .bub{max-width:88%;padding:10px 13px;border-radius:14px;font-size:13px;line-height:1.45;color:var(--soft);opacity:0;transform:translateY(10px);animation:itw-bub .6s forwards}
.itw .bub em{display:block;font-style:normal;font-size:11px;font-weight:600;color:var(--gold);margin-bottom:3px}
.itw .bub.in{background:rgba(255,255,255,.06);border-top-left-radius:4px}
.itw .bub.out{justify-self:end;background:linear-gradient(135deg,rgba(229,185,78,.25),rgba(154,106,20,.25));border-top-right-radius:4px}
.itw .bub.out em{color:var(--gold2)}
.itw .bub:nth-child(2){animation-delay:.6s}.itw .bub:nth-child(3){animation-delay:1.2s}
@keyframes itw-bub{to{opacity:1;transform:none}}
.itw .typing{display:flex;gap:4px;padding:10px 12px;background:rgba(255,255,255,.06);border-radius:14px;width:max-content}
.itw .typing i{width:6px;height:6px;border-radius:50%;background:var(--mute);animation:itw-dot 1.2s infinite}
.itw .typing i:nth-child(2){animation-delay:.2s}.itw .typing i:nth-child(3){animation-delay:.4s}
@keyframes itw-dot{50%{transform:translateY(-4px);background:var(--gold2)}}
.itw .pm-in{margin:2px 4px 4px;padding:11px 14px;border-radius:999px;background:rgba(10,16,36,.8);border:1px solid var(--line2);font-size:12.5px;color:var(--mute);display:flex;justify-content:space-between}
.itw .pm-in b{color:var(--gold2)}
@media (max-width:960px){.itw .card.ice{grid-template-columns:1fr}.itw .phone-m{transform:none}}
@media (max-width:640px){.itw .card.ice{padding:26px 22px}}
.itw .card.wide{grid-column:span 2}
.itw .card.feat{grid-column:span 2;background:
  radial-gradient(80% 120% at 100% 0%,rgba(229,185,78,.20),transparent 60%),
  linear-gradient(160deg,#18254D,#0F1831);border-color:rgba(229,185,78,.3)}
.itw .card.feat h3{font-size:30px}
.itw[data-lang="ta"] .card.feat h3{font-size:26px}
.itw .card.feat .arabic{position:absolute;right:28px;bottom:6px;font:700 120px/1 "Scheherazade New","Amiri",serif;color:rgba(229,185,78,.07);pointer-events:none;direction:rtl}
.itw .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:18px;position:relative}
.itw .chip{padding:6px 12px;border-radius:8px;font:500 12.5px/1 var(--sans);background:rgba(255,255,255,.06);color:#d8dcec;border:1px solid rgba(255,255,255,.08)}
.itw .chip.g{color:var(--gold2);border-color:rgba(229,185,78,.3);background:rgba(229,185,78,.08)}

/* roadmap */
.itw .road{margin-top:50px;border:1px solid var(--line);border-radius:24px;padding:40px 32px;background:linear-gradient(180deg,rgba(18,27,59,.7),rgba(10,16,36,.4))}
.itw .lanes{display:grid;grid-template-columns:1fr 1fr 2fr;gap:0;position:relative}
.itw .lane{padding:0 18px;position:relative}
.itw .lane+.lane{border-left:1px dashed rgba(229,185,78,.22)}
.itw .lane h5{display:flex;align-items:center;gap:10px;font:600 15px/1.3 var(--sans);margin-bottom:6px}
.itw .lane h5 .dot{width:12px;height:12px;border-radius:50%;background:currentColor;box-shadow:0 0 16px currentColor}
.itw .lane .cnt{color:var(--mute);font-size:13px;margin-bottom:18px}
.itw .lane ul{list-style:none;display:grid;gap:10px}
.itw .lane.live ul{grid-template-columns:1fr 1fr}
.itw .lane li{padding:12px 14px;border-radius:12px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);font-size:14px;display:flex;gap:10px;align-items:center}
.itw .lane li svg{flex:none;opacity:.8}
.itw .track{height:6px;border-radius:6px;background:rgba(255,255,255,.06);margin:0 18px 34px;position:relative;overflow:hidden}
.itw .track span{position:absolute;inset:0;width:0;background:linear-gradient(90deg,var(--violet),var(--gold) 33%,var(--teal));border-radius:6px;transition:width 2s cubic-bezier(.2,.8,.2,1)}
.itw .road.in .track span{width:100%}

/* team */
.itw .team{margin-top:46px;display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px}
.itw .mem{position:relative;padding:26px 20px;border-radius:20px;background:var(--card);border:1px solid rgba(255,255,255,.06);text-align:center;transition:transform .35s,border-color .35s}
.itw .mem:hover{transform:translateY(-4px);border-color:rgba(229,185,78,.35)}
.itw .av{width:76px;height:76px;margin:0 auto;border-radius:50%;display:grid;place-items:center;position:relative;font:600 24px/1 "Marcellus",serif;color:var(--bg)}
.itw .av::before{content:"";position:absolute;inset:-5px;border-radius:50%;background:conic-gradient(from var(--a,0deg),var(--gold2),transparent 40%,var(--gold) 70%,var(--gold2));animation:itw-spin 9s linear infinite;-webkit-mask:radial-gradient(farthest-side,transparent calc(100% - 2px),#000 calc(100% - 1px));mask:radial-gradient(farthest-side,transparent calc(100% - 2px),#000 calc(100% - 1px))}
.itw .mem .nm{margin-top:16px;font:600 16px/1.3 var(--sans);font-family:"Inter",sans-serif}
.itw .mem .rl{margin-top:4px;color:var(--mute);font-size:13px}

/* closing */
.itw .close{margin:130px 0 0;padding:90px 0 70px;text-align:center;position:relative;border-top:1px solid var(--line);background:radial-gradient(60% 80% at 50% 0%,rgba(229,185,78,.12),transparent 70%)}
.itw .close .ar{font:400 clamp(44px,6vw,70px)/1.3 "Scheherazade New","Amiri",serif;color:var(--gold2);direction:rtl}
.itw .close h2{margin-top:10px}
.itw .close .sub{margin:16px auto 0}
.itw .close .cta-row{justify-content:center}
.itw .foot-note{margin-top:60px;color:var(--mute);font-size:13px;letter-spacing:.06em}

/* reveal */
.itw .rv{opacity:0;transform:translateY(28px);transition:opacity .9s cubic-bezier(.2,.8,.2,1),transform .9s cubic-bezier(.2,.8,.2,1)}
.itw .rv.in{opacity:1;transform:none}
.itw .lang-fade{animation:itw-fade .5s ease}
@keyframes itw-fade{from{opacity:0;transform:translateY(6px)}}


/* ---------- bismillah ---------- */
.itw .bism{margin-bottom:26px}
.itw .orn{display:flex;align-items:center;gap:12px;width:220px;margin-bottom:12px}
.itw .orn i{flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(229,185,78,.6))}
.itw .orn i:last-child{background:linear-gradient(90deg,rgba(229,185,78,.6),transparent)}
.itw .orn b{width:8px;height:8px;background:var(--gold);transform:rotate(45deg)}
.itw .bism .ar{font:400 clamp(28px,3.2vw,40px)/1.5 "Scheherazade New","Amiri",serif;color:var(--gold2);direction:rtl;text-align:left;unicode-bidi:plaintext}
.itw .bism .tr{font:italic 400 15px/1.4 "Marcellus",serif;color:var(--tan)}
.itw[data-lang="ta"] .bism .tr{font-style:normal;font-family:"Noto Sans Tamil",sans-serif;font-size:14px}

/* ---------- join card in team ---------- */
.itw .mem.you{border:1px dashed rgba(229,185,78,.5);background:linear-gradient(160deg,rgba(229,185,78,.10),rgba(17,27,56,.6));text-decoration:none;display:block}
.itw .mem.you .av{background:transparent;color:var(--gold2);font-size:34px;border:1px dashed rgba(229,185,78,.6)}
.itw .mem.you .av::before{display:none}
.itw .mem.you .nm{color:var(--gold2)}

/* ---------- registration ---------- */
.itw .join{position:relative;padding:130px 0 0}
.itw .join-shell{position:relative;border-radius:32px;padding:2px;background:linear-gradient(140deg,rgba(247,217,126,.55),rgba(229,185,78,.08) 35%,rgba(111,143,255,.18) 70%,rgba(247,217,126,.45));box-shadow:var(--shadow)}
.itw .join-in{position:relative;border-radius:30px;overflow:hidden;display:grid;grid-template-columns:.92fr 1.08fr;background:linear-gradient(162deg,#18254D 0%,#0F1831 52%,#0A1024 100%)}
.itw .join-side{position:relative;padding:54px 46px;isolation:isolate;border-right:1px solid var(--line)}
.itw .join-side::before{content:"";position:absolute;inset:0;z-index:-1;opacity:.5;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23E5B94E' stroke-opacity='.13'%3E%3Cpath d='M40 4l10 26 26 10-26 10-10 26-10-26L4 40l26-10z'/%3E%3Crect x='22' y='22' width='36' height='36' transform='rotate(45 40 40)'/%3E%3C/g%3E%3C/svg%3E");-webkit-mask:linear-gradient(180deg,#000,transparent 85%);mask:linear-gradient(180deg,#000,transparent 85%)}
.itw .join-side::after{content:"";position:absolute;width:360px;height:360px;left:-120px;top:-120px;z-index:-1;border-radius:50%;background:radial-gradient(circle,rgba(229,185,78,.25),transparent 65%)}
.itw .join-side h2{font-size:clamp(34px,3.8vw,48px)}
.itw .join-side h2 .g{background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.itw .join-side .sub{font-size:16px}
.itw .ayah{margin-top:30px;padding:22px 24px;border-radius:18px;background:rgba(10,16,36,.55);border:1px solid var(--line);position:relative}
.itw .ayah::before{content:"\201C";position:absolute;top:-18px;left:18px;font:400 64px/1 "Marcellus",serif;color:var(--gold)}
.itw .ayah p{font:italic 400 17px/1.6 "Marcellus",serif;color:var(--tan)}
.itw[data-lang="ta"] .ayah p{font-style:normal;font:400 15px/1.8 "Noto Sans Tamil",sans-serif}
.itw .ayah small{display:block;margin-top:10px;color:var(--gold);font:600 11.5px/1 var(--sans);letter-spacing:.16em}
.itw .ways{margin-top:30px;display:grid;grid-template-columns:1fr 1fr;gap:10px}
.itw .way{display:flex;align-items:center;gap:10px;padding:12px 14px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--line2);font-size:14px;color:var(--soft);transition:.3s}
.itw .way:hover{border-color:rgba(229,185,78,.4);transform:translateX(3px)}
.itw .way svg{flex:none;color:var(--gold2)}
.itw .school{margin-top:22px;display:flex;gap:16px;align-items:flex-start;padding:20px 22px;border-radius:18px;position:relative;overflow:hidden;background:linear-gradient(120deg,rgba(229,185,78,.20),rgba(229,185,78,.05) 60%,rgba(95,208,184,.10));border:1px solid rgba(247,217,126,.45);box-shadow:0 14px 34px -18px rgba(229,185,78,.55)}
.itw .school::after{content:"";position:absolute;top:0;left:-40%;width:30%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.14),transparent);transform:skewX(-20deg);animation:itw-shine 5s ease-in-out infinite}
.itw .school-ic{flex:none;width:50px;height:50px;border-radius:14px;display:grid;place-items:center;background:var(--grad);color:#fff;box-shadow:0 8px 20px -8px rgba(229,185,78,.7)}
.itw .school h4{font:400 21px/1.3 var(--serif);color:var(--gold2)}
.itw[data-lang="ta"] .school h4{font-size:18px;line-height:1.5}
.itw .school p{margin-top:4px;font-size:14.5px;color:var(--soft)}

.itw .form{padding:50px 46px 46px;position:relative}
.itw .fhead{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:28px}
.itw .fhead h3{font:400 26px/1.2 var(--serif)}
.itw[data-lang="ta"] .fhead h3{font-size:21px;line-height:1.5}
.itw .fhead p{color:var(--mute);font-size:14px;margin-top:4px}
.itw .ring{flex:none;width:68px;height:68px;position:relative}
.itw .ring svg{width:100%;height:100%;transform:rotate(-90deg)}
.itw .ring circle{fill:none;stroke-width:5}
.itw .ring .bgc{stroke:rgba(255,255,255,.08)}
.itw .ring .fg{stroke:url(#itw-rg);stroke-linecap:round;stroke-dasharray:176;stroke-dashoffset:176;transition:stroke-dashoffset .6s cubic-bezier(.2,.8,.2,1)}
.itw .ring span{position:absolute;inset:0;display:grid;place-items:center;font:600 14px/1 var(--sans);color:var(--gold2)}
.itw .fgrid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.itw .full{grid-column:1/-1}
.itw .fld{position:relative}
.itw .fld input,.itw .fld textarea{width:100%;font:500 15.5px/1.4 var(--sans);color:var(--ink);background:rgba(10,16,36,.55);border:1px solid rgba(255,255,255,.1);border-radius:14px;padding:26px 16px 10px 46px;outline:none;transition:border-color .25s,box-shadow .25s,background .25s;-webkit-appearance:none;appearance:none}
.itw .fld textarea{min-height:96px;resize:vertical}
.itw .fld input[type="date"]{color-scheme:dark;min-height:60px}
.itw .fld label{position:absolute;left:46px;top:19px;font:400 15px/1.2 var(--sans);color:var(--mute);pointer-events:none;transition:all .2s ease;transform-origin:left top}
.itw .fld .fi{position:absolute;left:15px;top:19px;color:rgba(229,185,78,.7);pointer-events:none;transition:color .25s}
.itw .fld input:focus,.itw .fld textarea:focus{border-color:var(--gold);background:rgba(10,16,36,.8);box-shadow:0 0 0 4px rgba(229,185,78,.12)}
.itw .fld input:focus~.fi,.itw .fld textarea:focus~.fi{color:var(--gold2)}
.itw .fld input:focus~label,.itw .fld input:not(:placeholder-shown)~label,.itw .fld textarea:focus~label,.itw .fld textarea:not(:placeholder-shown)~label,.itw .fld.date label{top:9px;font-size:11.5px;color:var(--gold2);letter-spacing:.03em}
.itw .fld .req{color:var(--gold)}
.itw .fld .err{display:none;margin:6px 4px 0;font-size:12.5px;color:var(--danger)}
.itw .fld.bad input,.itw .fld.bad textarea{border-color:rgba(255,138,128,.7);box-shadow:0 0 0 4px rgba(255,138,128,.1)}
.itw .fld.bad .err{display:block}
.itw .fld.ok input,.itw .fld.ok textarea{border-color:rgba(95,208,184,.45)}
.itw .fld .tick{position:absolute;right:14px;top:21px;width:18px;height:18px;border-radius:50%;background:var(--teal);color:#0A1024;display:grid;place-items:center;transform:scale(0);transition:transform .3s cubic-bezier(.3,1.6,.5,1)}
.itw .fld.ok .tick{transform:scale(1)}
.itw .phone input{padding-left:92px}
.itw .phone .cc{position:absolute;left:46px;top:26px;font:500 15.5px/1.4 var(--sans);color:var(--soft);pointer-events:none;opacity:0;transition:opacity .2s}
.itw .phone input:focus~.cc,.itw .phone input:not(:placeholder-shown)~.cc{opacity:1}
.itw .seg-l{font:500 13px/1 var(--sans);color:var(--mute);margin:4px 2px 10px;display:block}
.itw .seg{position:relative;display:grid;grid-template-columns:1fr 1fr;padding:5px;border-radius:16px;background:rgba(10,16,36,.55);border:1px solid rgba(255,255,255,.1)}
.itw .seg input{position:absolute;opacity:0;pointer-events:none}
.itw .seg label{position:relative;z-index:1;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:10px;padding:14px 10px;border-radius:12px;font:600 15px/1 var(--sans);color:var(--mute);transition:color .3s}
.itw .seg .pill{position:absolute;z-index:0;top:5px;bottom:5px;left:5px;width:calc(50% - 5px);border-radius:12px;background:var(--grad);box-shadow:0 8px 24px -8px rgba(229,185,78,.6);transform:translateX(0);opacity:0;transition:transform .45s cubic-bezier(.3,1.3,.5,1),opacity .3s}
.itw .seg[data-v="student"] .pill{opacity:1}
.itw .seg[data-v="working"] .pill{opacity:1;transform:translateX(100%)}
.itw .seg[data-v="student"] label[for="itw-st"],.itw .seg[data-v="working"] label[for="itw-wk"]{color:#fff;text-shadow:0 1px 2px rgba(80,50,0,.5)}
.itw .seg-wrap.bad .seg{border-color:rgba(255,138,128,.7)}
.itw .seg-wrap .err{display:none;margin:6px 4px 0;font-size:12.5px;color:var(--danger)}
.itw .seg-wrap.bad .err{display:block}
.itw .itw-reveal{display:grid;grid-template-rows:0fr;transition:grid-template-rows .45s cubic-bezier(.2,.8,.2,1),opacity .35s;opacity:0}
.itw .itw-reveal>div{overflow:hidden;min-height:0}
.itw .itw-reveal.open{grid-template-rows:1fr;opacity:1}
.itw .itw-reveal .fld{margin-top:16px}
.itw .consent{display:flex;gap:12px;align-items:flex-start;cursor:pointer;font-size:13.5px;color:var(--mute);line-height:1.55}
.itw .consent input{flex:none;appearance:none;-webkit-appearance:none;width:20px;height:20px;border-radius:6px;border:1.5px solid rgba(229,185,78,.55);background:rgba(10,16,36,.6);margin-top:1px;cursor:pointer;display:grid;place-items:center;transition:.2s}
.itw .consent input:checked{background:var(--gold);border-color:var(--gold)}
.itw .consent input:checked::after{content:"";width:5px;height:10px;border:solid #0A1024;border-width:0 2px 2px 0;transform:rotate(45deg) translate(-1px,-1px)}
.itw .consent.bad input{border-color:var(--danger)}
.itw .submit{margin-top:26px;width:100%;justify-content:center;padding:18px 24px;font-size:16px;border:0;cursor:pointer;position:relative;overflow:hidden}
.itw .submit::after{content:"";position:absolute;top:0;left:-60%;width:40%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.45),transparent);transform:skewX(-20deg);animation:itw-shine 3.6s ease-in-out infinite}
@keyframes itw-shine{0%,60%{left:-60%}100%{left:130%}}
.itw .submit[disabled]{opacity:.75;cursor:wait}
.itw .submit .spin-i{width:18px;height:18px;border:2.5px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:itw-spin .8s linear infinite;display:none}
.itw .submit.busy .spin-i{display:block}
.itw .privacy{margin-top:14px;text-align:center;font-size:12.5px;color:var(--mute);display:flex;justify-content:center;gap:8px;align-items:center}
.itw .ferr{display:none;margin-top:14px;padding:12px 16px;border-radius:12px;background:rgba(255,138,128,.1);border:1px solid rgba(255,138,128,.35);color:#ffc4be;font-size:14px}
.itw .ferr.on{display:block}
.itw .demo{margin-bottom:18px;padding:10px 14px;border-radius:12px;background:rgba(169,156,247,.1);border:1px dashed rgba(169,156,247,.45);color:#cfc8ff;font-size:12.5px}
.itw .done{display:none;text-align:center;padding:40px 10px}
.itw .form.sent form,.itw .form.sent .demo,.itw .form.sent .ring{display:none}
.itw .form.sent .done{display:block;animation:itw-fade .6s ease}
.itw .done svg{width:110px;height:110px}
.itw .done .c1{stroke-dasharray:300;stroke-dashoffset:300;animation:itw-draw 1s .1s forwards cubic-bezier(.6,0,.2,1)}
.itw .done .c2{stroke-dasharray:60;stroke-dashoffset:60;animation:itw-draw .5s .9s forwards ease-out}
@keyframes itw-draw{to{stroke-dashoffset:0}}
.itw .done .ar{margin-top:18px;font:400 40px/1.3 "Scheherazade New",serif;color:var(--gold2)}
.itw .done h3{margin-top:6px;font:400 30px/1.3 var(--serif)}
.itw .done p{margin:12px auto 0;max-width:380px;color:var(--soft)}
.itw .done .btn{margin-top:26px}
.itw .burst{position:absolute;inset:0;pointer-events:none;overflow:hidden}
.itw .burst i{position:absolute;width:8px;height:8px;background:var(--gold2);transform:rotate(45deg);opacity:0;animation:itw-burst 1.6s ease-out forwards}
@keyframes itw-burst{0%{opacity:1;transform:translate(0,0) rotate(45deg) scale(1)}100%{opacity:0;transform:translate(var(--dx),var(--dy)) rotate(225deg) scale(.4)}}
@media (max-width:960px){
  .itw .join-in{grid-template-columns:1fr}
  .itw .join-side{border-right:0;border-bottom:1px solid var(--line)}
}
@media (max-width:640px){
  .itw .join-side,.itw .form{padding:36px 22px}
  .itw .fgrid{grid-template-columns:1fr}
  .itw .join{padding-top:90px}
  .itw .team{grid-template-columns:1fr 1fr;gap:12px}
  .itw .mem{padding:20px 10px}
  .itw .av{width:60px;height:60px;font-size:20px}
  .itw .mem .nm{font-size:14.5px}
  .itw .mem .rl{font-size:12px}
}

@media (max-width:960px){
  .itw .hero-grid,.itw .about{grid-template-columns:1fr}
  .itw .emblem{max-width:300px;order:-1}
  .itw .hero{min-height:auto;padding-top:96px}
  .itw .grid{grid-template-columns:1fr 1fr}
  .itw .stats{grid-template-columns:1fr 1fr}
  .itw .stat:nth-child(3){border-left:0}
  .itw .stat:nth-child(n+3){border-top:1px solid var(--line)}
  .itw .lanes{grid-template-columns:1fr;gap:28px}
  .itw .lane.live ul{grid-template-columns:1fr}
  .itw .lane+.lane{border-left:0;border-top:1px dashed rgba(229,185,78,.22);padding-top:26px}
}
@media (max-width:640px){
  .itw .grid{grid-template-columns:1fr}
  .itw .card.feat,.itw .card.wide,.itw .card.ice{grid-column:auto}
  .itw section.s{padding-top:90px}
  .itw .road{padding:28px 16px}
  .itw .lang{top:12px;right:12px}
}

/* one card per row */
.itw .grid{grid-template-columns:1fr!important}
.itw .grid .card{grid-column:1/-1!important;min-height:0}
.itw .grid .card:not(.ice){display:grid;grid-template-columns:auto 1fr;column-gap:26px;align-items:start}
.itw .grid .card:not(.ice) .top{grid-row:1/span 6;flex-direction:column;align-items:center;gap:12px}
.itw .grid .card:not(.ice)>*:not(.top):not(.arabic){grid-column:2}
.itw .grid .card:not(.ice) h3{margin-top:2px}
.itw .grid .card:not(.ice) p{flex:none}
@media (max-width:640px){
  .itw .grid .card:not(.ice){display:flex;flex-direction:column}
  .itw .grid .card:not(.ice) .top{flex-direction:row;justify-content:space-between;width:100%}
}
@media (prefers-reduced-motion:reduce){
  .itw *,.itw *::before{animation:none!important;transition:none!important}
  .itw .rv{opacity:1;transform:none}
}

/* keep the page's own dark look in the site's light mode (theme-day) */
html.theme-day .itw .kicker{color:#E5B94E}
html.theme-day .itw .card h3{color:#F9FAFB}
html.theme-day .itw .card p{color:#c3c9de}
html.theme-day .itw .bism,html.theme-day .itw .orn{color:#F7D97E}

</style>
<div class="itw" id="itw" data-lang="en">

  

  <!-- ================= HERO ================= -->
  <header class="hero">
    <canvas id="net" aria-hidden="true"></canvas>
    <div class="wrap hero-grid">
      <div>
        <div class="bism rv">
          <div class="orn"><i></i><b></b><i></i></div>
          <div class="ar">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
          <div class="tr"><span class="en">In the name of God, Most Gracious, Most Merciful</span><span class="ta">அளவற்ற அருளாளனும், நிகரற்ற அன்புடையோனுமாகிய கடவுளின் பெயரால்</span></div>
        </div>
        <div class="eyebrow rv"><i></i>
          <span class="en">Masjid India Muslim Jamath · GodAlone.in</span>
          <span class="ta">மஸ்ஜித் இந்தியா முஸ்லிம் ஜமாத் · GodAlone.in</span>
        </div>
        <h1 class="rv">
          <span class="en">The <span class="g">IT Wing</span></span>
          <span class="ta"><span class="g">IT பிரிவு</span></span>
        </h1>
        <p class="lead rv">
          <span class="en">Building digital tools for our community — from a weekly newsletter and Quran quiz to Bayyinah, our trilingual Quran study site. Here is what we have done, and what we are working on next.</span>
          <span class="ta">நம் சமூகத்திற்கான டிஜிட்டல் கருவிகளை உருவாக்குகிறோம் — வாராந்திர செய்திமடல், குர்ஆன் வினாடி-வினா முதல் மூன்று மொழிகளில் இயங்கும் பய்யினாஹ் குர்ஆன் தளம் வரை. நாங்கள் செய்து முடித்தவையும், அடுத்து செய்து கொண்டிருப்பவையும் இங்கே.</span>
        </p>
        <div class="cta-row rv">
          <a class="btn btn-p" href="#itw-work"><span class="en">See our work</span><span class="ta">எங்கள் பணிகள்</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg></a>
          <a class="btn btn-g" href="#itw-join"><span class="en">Join as a volunteer</span><span class="ta">தன்னார்வலராக இணையுங்கள்</span></a>
        </div>
      </div>

      <div class="emblem rv" aria-hidden="true">
        <svg viewBox="0 0 400 400">
          <defs>
            <linearGradient id="gg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#F7D97E"/><stop offset="1" stop-color="#9A6A14"/></linearGradient>
          </defs>
          <g class="spin-r" opacity=".35">
            <circle cx="200" cy="200" r="190" fill="none" stroke="#E5B94E" stroke-width=".8" stroke-dasharray="2 8"/>
          </g>
          <g class="spin">
            <!-- 8-point star lattice -->
            <g fill="none" stroke="url(#gg)" stroke-width="1.4">
              <rect x="80" y="80" width="240" height="240" rx="4"/>
              <rect x="80" y="80" width="240" height="240" rx="4" transform="rotate(45 200 200)"/>
            </g>
            <g fill="none" stroke="#E5B94E" stroke-width=".8" opacity=".55">
              <rect x="110" y="110" width="180" height="180" transform="rotate(22.5 200 200)"/>
              <rect x="110" y="110" width="180" height="180" transform="rotate(67.5 200 200)"/>
            </g>
            <g fill="#F7D97E">
              <circle cx="200" cy="30" r="4"/><circle cx="370" cy="200" r="4"/><circle cx="200" cy="370" r="4"/><circle cx="30" cy="200" r="4"/>
              <circle cx="320" cy="80" r="3"/><circle cx="320" cy="320" r="3"/><circle cx="80" cy="320" r="3"/><circle cx="80" cy="80" r="3"/>
            </g>
          </g>
          <circle class="pulse" cx="200" cy="200" r="96" fill="rgba(229,185,78,.07)" stroke="rgba(229,185,78,.4)"/>
        </svg>
        <div class="core"><div><b>10</b>
          <span class="en">initiatives</span><span class="ta">முயற்சிகள்</span></div></div>
      </div>
    </div>
  </header>

  <!-- ================= STATS ================= -->
  <div class="wrap">
    <div class="stats rv">
      <div class="stat"><div class="n" data-count="10">0</div><div class="l"><span class="en">Initiatives in one year</span><span class="ta">ஓர் ஆண்டில் முயற்சிகள்</span></div></div>
      <div class="stat"><div class="n" data-count="7">0</div><div class="l"><span class="en">Live for the community</span><span class="ta">நடைமுறையில் உள்ளவை</span></div></div>
      <div class="stat"><div class="n" data-count="3">0</div><div class="l"><span class="en">Languages on Bayyinah</span><span class="ta">பய்யினாஹ் மொழிகள்</span></div></div>
      <div class="stat"><div class="n" data-count="11">0</div><div class="l"><span class="en">Team members</span><span class="ta">குழு உறுப்பினர்கள்</span></div></div>
    </div>
  </div>

  <!-- ================= ABOUT ================= -->
  <section class="s">
    <div class="wrap about">
      <div class="rv">
        <div class="kicker"><span class="en">Who we are</span><span class="ta">நாங்கள் யார்</span></div>
        <h2><span class="en">Technology in service of the community</span><span class="ta">சமூகத்தின் சேவையில் தொழில்நுட்பம்</span></h2>
        <p class="quote" style="margin-top:26px">
          <span class="en">The IT Wing of Masjid India Muslim Jamath began in <em>August 2025</em>. We meet every week, and by God's grace the group has reached all of these milestones together.</span>
          <span class="ta">மஸ்ஜித் இந்தியா முஸ்லிம் ஜமாத்தின் IT பிரிவு <em>ஆகஸ்ட் 2025</em>-ல் தொடங்கப்பட்டது. நாங்கள் வாரந்தோறும் கூடுகிறோம்; கடவுளின் அருளால் இவ்வளவு சாதனைகளையும் இணைந்து அடைந்துள்ளோம்.</span>
        </p>
      </div>
      <div class="pillars">
        <div class="pillar rv"><div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/></svg></div>
          <div><h4><span class="en">Learning the Quran</span><span class="ta">குர்ஆனைக் கற்றல்</span></h4>
          <p><span class="en">Bayyinah, the Quran quiz, Arabic class and the colouring book for children.</span><span class="ta">பய்யினாஹ், குர்ஆன் வினாடி-வினா, அரபிக் வகுப்பு, குழந்தைகளுக்கான கலரிங் புக்.</span></p></div></div>
        <div class="pillar rv"><div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div><h4><span class="en">Staying connected</span><span class="ta">இணைந்திருத்தல்</span></h4>
          <p><span class="en">A weekly newsletter, social media channels and a verified matrimony website.</span><span class="ta">வாராந்திர செய்திமடல், சமூக ஊடகப் பக்கங்கள், சரிபார்க்கப்பட்ட மேட்ரிமோனி வெப்சைட்.</span></p></div></div>
        <div class="pillar rv"><div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.74V17h8v-2.26A7 7 0 0 0 12 2z"/></svg></div>
          <div><h4><span class="en">Listening to members</span><span class="ta">உறுப்பினர்களின் குரல்</span></h4>
          <p><span class="en">The Inheritance Calculator was added at a community member's request.</span><span class="ta">வாரிசு உரிமை கணக்கீட்டாளர் ஒரு சமூக உறுப்பினரின் கோரிக்கையின் பேரில் சேர்க்கப்பட்டது.</span></p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= WORK ================= -->
  <section class="s" id="itw-work">
    <div class="wrap">
      <div class="bar">
        <div class="rv">
          <div class="kicker"><span class="en">Our work</span><span class="ta">எங்கள் பணிகள்</span></div>
          <h2><span class="en">A year of achievements</span><span class="ta">கடந்த ஓர் ஆண்டு சாதனைகள்</span></h2>
          <p class="sub"><span class="en">By God's grace, here is everything our group has built over the past year — and what is still in progress.</span><span class="ta">கடவுளின் அருளால், கடந்த ஓர் ஆண்டுகளாக நம் குழு செய்த சாதனைகள் பட்டியல் — மற்றும் தற்போது நடைபெற்று வருபவை.</span></p>
        </div>
        <div class="filters rv" role="group" aria-label="Filter">
          <button type="button" data-f="all" aria-pressed="true"><span class="en">All</span><span class="ta">அனைத்தும்</span> <span class="c">10</span></button>
          <button type="button" data-f="live" aria-pressed="false"><span class="en">Live</span><span class="ta">நடைமுறையில்</span> <span class="c">7</span></button>
          <button type="button" data-f="ready" aria-pressed="false"><span class="en">Ready to launch</span><span class="ta">வெளியீட்டிற்குத் தயார்</span> <span class="c">1</span></button>
          <button type="button" data-f="plan" aria-pressed="false"><span class="en">Planning</span><span class="ta">திட்டமிடலில்</span> <span class="c">2</span></button>
        </div>
      </div>

      <div class="grid" id="itw-grid">









        <!-- 8 Bayyinah (featured) -->
        <article class="card feat rv" data-s="live">
          <span class="arabic">بيّنة</span>
          <div class="top"><div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div><span class="no">01</span></div>
          <h3><span class="en">Bayyinah</span><span class="ta">பய்யினாஹ்</span></h3>
          <div class="alt"><span class="en">AI-assisted Quran study website</span><span class="ta">AI உதவியுடன் குர்ஆன் தளம்</span></div>
          <p><span class="en">We built our Bayyinah website with the help of AI assistants. It is available in three languages — Tamil, English and Hindi — and more people use it every day. Gemini, Groq and NVIDIA are connected as fallback services so it keeps running on free tokens, and as free usage nears its limit we plan to buy more so access is never interrupted. The Quran content is reviewed daily and translation errors are corrected continuously.</span>
          <span class="ta">AI உதவியுடன் நமது பய்யினாஹ் வெப்சைட் உருவாக்கப்பட்டுள்ளது. தற்போது இந்த தளம் மூன்று வெவ்வேறு மொழிகளில் (தமிழ், ஆங்கிலம் மற்றும் ஹிந்தி) கிடைக்கிறது. நாளுக்கு நாள் அதிகமான மக்கள் இதை பயன்படுத்தி வருகின்றனர். இலவச Token பயன்பாட்டிற்காக Gemini / Groq / NVIDIA இடையே fallback சேவைகள் இணைக்கப்பட்டுள்ளன; இடையூறு ஏற்படாமல் இருக்க Token பயன்பாட்டை அதிகரிக்க வாங்க திட்டமிட்டுள்ளோம். குர்ஆன் தள உள்ளடக்கம் தினசரி சரிபார்க்கப்பட்டு, மொழிபெயர்ப்பு பிழைகள் தொடர்ந்து திருத்தப்பட்டு வருகின்றன.</span></p>
          <div class="chips">
            <span class="chip g">தமிழ்</span><span class="chip g">English</span><span class="chip g">हिंदी</span>
            <span class="chip">Gemini</span><span class="chip">Groq</span><span class="chip">NVIDIA</span>
          </div>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live</span><span class="ta">நடைமுறையில்</span></span>
            <a class="btn btn-p visit" href="https://godalone.in/quran"><span class="en">Visit Bayyinah</span><span class="ta">பய்யினாஹ் தளத்தைப் பார்வையிட</span> →</a></div>
        </article>
        <!-- 1 Newsletter -->
        <article class="card rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M4 7l8 6 8-6"/></svg></div><span class="no">02</span></div>
          <h3><span class="en">Newsletter</span><span class="ta">செய்திமடல்</span></h3>
          <p><span class="en">The newsletter has been launched and fully set up — our community now receives it every week, regularly.</span><span class="ta">செய்திமடல் ஆரம்பிக்கப்பட்டு, தற்போது நம் சமூக மக்கள் ஒவ்வொரு வாரமும் தொடர்ந்து பெற்று வருகின்றனர்.</span></p>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live · weekly</span><span class="ta">நடைமுறையில் · வாராந்திர</span></span></div>
        </article>
        <!-- 2 Colouring book -->
        <article class="card rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a10 10 0 1 1 10-10c0 2.5-2 3.5-4 3.5h-2a2 2 0 0 0-1.5 3.3A2 2 0 0 1 12 22z"/><circle cx="7.5" cy="10.5" r="1.2"/><circle cx="12" cy="7" r="1.2"/><circle cx="16.5" cy="10.5" r="1.2"/></svg></div><span class="no">03</span></div>
          <h3><span class="en">Colouring Book</span><span class="ta">கலரிங் புக்</span></h3>
          <p><span class="en">The colouring book has been completed and integrated into the godalone.in website.</span><span class="ta">கலரிங் புக் தயாரிக்கப்பட்டு முடிக்கப்பட்டது; godalone.in வெப்சைட்டுடன் இணைக்கப்பட்டது.</span></p>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live</span><span class="ta">நடைமுறையில்</span></span>
            <a class="link" href="<?php echo esc_url(home_url('/coloring-book/')); ?>"><span class="en">Open</span><span class="ta">திறக்க</span> →</a></div>
        </article>
        <!-- 3 Arabic class -->
        <article class="card rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg></div><span class="no">04</span></div>
          <h3><span class="en">Arabic Class</span><span class="ta">அரபிக் வகுப்பு</span></h3>
          <p><span class="en">The Arabic class has started and is running successfully, Alhamdulillah.</span><span class="ta">அரபிக் வகுப்பு தொடங்கப்பட்டு, அல்ஹம்துலில்லாஹ், வெற்றிகரமாக நடைபெற்று வருகிறது.</span></p>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live</span><span class="ta">நடைமுறையில்</span></span></div>
        </article>
        <!-- 6 Quiz -->
        <article class="card rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.1 9a3 3 0 0 1 5.8 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg></div><span class="no">05</span></div>
          <h3><span class="en">Dictionary &amp; Question Bank</span><span class="ta">அகராதி &amp; கேள்வி வங்கி</span></h3>
          <p><span class="en">We added many more questions to the Quran quiz on godalone.in, so that everyone can make use of it.</span><span class="ta">godalone.in வெப்சைட்டில் உள்ள குர்ஆன் வினாடி-வினாவிற்கு (Quiz) மேலும் அதிக எண்ணிக்கையிலான கேள்விகள் சேர்க்கப்பட்டுள்ளன. இதன் மூலம் அனைவரும் இதைப் பயன்படுத்திக் கொள்ளலாம்.</span></p>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live</span><span class="ta">நடைமுறையில்</span></span>
            <a class="link" href="<?php echo esc_url(home_url('/quran-qa/')); ?>"><span class="en">Try the quiz</span><span class="ta">முயற்சிக்க</span> →</a></div>
        </article>
        <!-- 7 Matrimony -->
        <article class="card rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21l7.8-7.6 1-1.1a5.5 5.5 0 0 0 0-7.7z"/></svg></div><span class="no">06</span></div>
          <h3><span class="en">Matrimony Website</span><span class="ta">மேட்ரிமோனி வெப்சைட்</span></h3>
          <p><span class="en">The matrimony website has been verified and is ready to be shared with anyone who needs it.</span><span class="ta">மேட்ரிமோனி வெப்சைட் Verified செய்யப்பட்டது மற்றும் மேலும் தேவைப்படுவோருக்கு பகிரலாம்.</span></p>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live · verified</span><span class="ta">நடைமுறையில் · சரிபார்க்கப்பட்டது</span></span></div>
        </article>
        <!-- 5 Social -->
        <article class="card wide rv" data-s="live">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="4"/><path d="M10 9l5 3-5 3z"/></svg></div><span class="no">07</span></div>
          <h3><span class="en">YouTube &amp; Social Media</span><span class="ta">YouTube &amp; சமூக ஊடகங்கள்</span></h3>
          <p><span class="en">Our YouTube, Instagram and X pages are now live. New videos are uploaded every week, Insha'Allah.</span><span class="ta">நமது YouTube, Instagram மற்றும் X பக்கங்கள் தற்போது நடைமுறையில் உள்ளன. ஒவ்வொரு வாரமும் புதிய வீடியோக்கள் பதிவேற்றப்படும், இன்ஷா அல்லாஹ்.</span></p>
          <div class="chips"><span class="chip g">YouTube</span><span class="chip g">Instagram</span><span class="chip g">X</span></div>
          <div class="foot"><span class="badge b-live"><i></i><span class="en">Live</span><span class="ta">நடைமுறையில்</span></span></div>
        </article>
        <!-- 10 Ice Breaker -->
          <article class="card ice rv" data-s="ready">
          <div class="ice-l">
            <div class="top"><div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 10h.01M12 10h.01M16 10h.01"/></svg></div><span class="no">08</span></div>
            <div class="ice-tag"><span class="en">New · Anonymous community portal</span><span class="ta">புதியது · அநாமதேய சமூக தளம்</span></div>
            <h3>ICE Breaker</h3>
            <p><span class="en">An anonymous messaging portal for our community. Members can offer charity and contributions, share honest suggestions and raise concerns — without revealing who they are. Givers keep their sincerity, receivers keep their dignity: identities stay hidden from everyone, including admins. The application is built and ready, in line for deployment and community use.</span><span class="ta">நம் சமூகத்திற்கான அநாமதேய (anonymous) செய்தித் தளம். உறுப்பினர்கள் தங்கள் அடையாளத்தை வெளிப்படுத்தாமல் தர்மம் மற்றும் பங்களிப்புகளை வழங்கலாம், நேர்மையான ஆலோசனைகளைப் பகிரலாம், கவலைகளைத் தெரிவிக்கலாம். கொடுப்பவரின் இக்லாஸும் பெறுபவரின் கண்ணியமும் காக்கப்படும் — அட்மின்கள் உட்பட யாருக்கும் அடையாளம் தெரியாது. இந்த செயலி உருவாக்கப்பட்டு, வெளியீட்டிற்கும் சமூகப் பயன்பாட்டிற்கும் தயாராக உள்ளது.</span></p>
            <div class="ice-q"><span class="en">The Quran (2:271) teaches that charity given in secret to those in need is even better.</span><span class="ta">தேவையுள்ளோருக்கு இரகசியமாக வழங்கப்படும் தர்மம் இன்னும் சிறந்தது என்று குர்ஆன் (2:271) கற்பிக்கிறது.</span></div>
            <div class="chips">
              <span class="chip g"><span class="en">Anonymous charity</span><span class="ta">அநாமதேய தர்மம்</span></span>
              <span class="chip g"><span class="en">Community contributions</span><span class="ta">சமூகப் பங்களிப்புகள்</span></span>
              <span class="chip g"><span class="en">Honest feedback</span><span class="ta">நேர்மையான கருத்துகள்</span></span>
              <span class="chip"><span class="en">Hidden even from admins</span><span class="ta">அட்மினுக்கும் தெரியாது</span></span>
              <span class="chip"><span class="en">End-to-end encrypted</span><span class="ta">End-to-end குறியாக்கம்</span></span>
            </div>
            <div class="foot"><span class="badge b-ready"><i></i><span class="en">Ready · in line for deployment</span><span class="ta">தயார் · வெளியீட்டிற்குக் காத்திருக்கிறது</span></span></div>
          </div>
          <div class="ice-r" aria-hidden="true">
            <div class="phone-m">
              <div class="pm-head"><span class="pm-dot"></span><div><b>ICE Breaker</b><small><span class="en">Community · anonymous mode on</span><span class="ta">சமூகம் · அநாமதேய முறை</span></small></div><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
              <div class="pm-body">
                <div class="bub in"><em>🎭 <span class="en">Anonymous</span><span class="ta">அநாமதேயர்</span></em><span class="en">I'd like to cover one student's school fees this term.</span><span class="ta">இந்த பருவத்தில் ஒரு மாணவரின் பள்ளிக் கட்டணத்தை நான் செலுத்த விரும்புகிறேன்.</span></div>
                <div class="bub in"><em>🎭 <span class="en">Anonymous</span><span class="ta">அநாமதேயர்</span></em><span class="en">Suggestion: a weekend Quran circle for the kids?</span><span class="ta">ஆலோசனை: குழந்தைகளுக்கு வார இறுதி குர்ஆன் வகுப்பு?</span></div>
                <div class="bub out"><em><span class="en">Coordinator</span><span class="ta">ஒருங்கிணைப்பாளர்</span></em><span class="en">JazakAllah khair — noted. Your identity stays private.</span><span class="ta">ஜஸாக்கல்லாஹு கைரன் — குறித்துக்கொண்டோம். உங்கள் அடையாளம் ரகசியமாகவே இருக்கும்.</span></div>
                <div class="typing"><i></i><i></i><i></i></div>
              </div>
              <div class="pm-in"><span class="en">Send anonymously…</span><span class="ta">அநாமதேயமாக அனுப்பு…</span><b>➤</b></div>
            </div>
          </div>
        </article>
        <!-- 4 Dashboard -->
        <article class="card rv" data-s="plan">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l4-4 3 3 5-6"/></svg></div><span class="no">09</span></div>
          <h3><span class="en">Daily Activity Dashboard</span><span class="ta">Daily Activity Dashboard</span></h3>
          <p><span class="en">Daily reminders for habits like Quran reading, controlling anger and how many of the five daily prayers were completed. Each month you can compare your progress with the previous month and work on improving yourself.</span><span class="ta">குர்ஆன் ஓதும் பழக்கம், கோபத்தை கட்டுப்படுத்துதல், ஐந்து நேரத் தொழுகையில் எத்தனை தொழுகைகள் நிறைவேற்றப்பட்டன என்பது போன்ற தினசரி நினைவூட்டல்கள். ஒவ்வொரு மாத இறுதியிலும் முந்தைய மாதத்துடன் ஒப்பிட்டு நம் முன்னேற்றத்தைப் பார்க்கவும், நம்மை மேம்படுத்திக் கொள்ளவும் முடியும்.</span></p>
          <div class="foot"><span class="badge b-plan"><i></i><span class="en">Planning</span><span class="ta">திட்டமிடலில்</span></span></div>
        </article>
        <!-- 9 Inheritance -->
        <article class="card wide rv" data-s="plan">
          <div class="top"><div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 11h2M14 11h2M8 15h2M14 15h2M8 19h2M14 19h2"/></svg></div><span class="no">10</span></div>
          <h3><span class="en">Inheritance Calculator</span><span class="ta">வாரிசு உரிமை கணக்கீட்டாளர்</span></h3>
          <p><span class="en">First proposed in February 2026 and added at a community member's request. Development is done; it now needs further review before release.</span><span class="ta">வாரிசு உரிமை கணக்கீட்டு கருவி பிப்ரவரி 2026-ல் யோசனையாக முன்வைக்கப்பட்டது; சமூக உறுப்பினர் கோரிக்கையின் பேரில் சேர்க்கப்பட்டது. இதற்கான வேலை முடிக்கப்பட்டது; ஆனால் மேற்கொண்டு ஆய்விற்காக உள்ளது.</span></p>
          <div class="foot"><span class="badge b-plan"><i></i><span class="en">Built · under review</span><span class="ta">உருவாக்கப்பட்டது · ஆய்வில்</span></span></div>
        </article>
      </div>

      <!-- roadmap -->
      <div class="road rv" id="itw-road">
        <div class="kicker" style="margin-bottom:26px"><span class="en">Where everything stands</span><span class="ta">ஒவ்வொன்றின் தற்போதைய நிலை</span></div>
        <div class="track"><span></span></div>
        <div class="lanes">
          <div class="lane"><h5 style="color:var(--violet)"><span class="dot"></span><span class="en">Planning &amp; review</span><span class="ta">திட்டமிடல் &amp; ஆய்வு</span></h5>
            <div class="cnt"><span class="en">2 projects</span><span class="ta">2 திட்டங்கள்</span></div>
            <ul><li><span class="en">Daily Activity Dashboard</span><span class="ta">Daily Activity Dashboard</span></li><li><span class="en">Inheritance Calculator</span><span class="ta">வாரிசு உரிமை கணக்கீட்டாளர்</span></li></ul></div>
          <div class="lane"><h5 style="color:var(--gold2)"><span class="dot"></span><span class="en">Ready to launch</span><span class="ta">வெளியீட்டிற்குத் தயார்</span></h5>
            <div class="cnt"><span class="en">1 project</span><span class="ta">1 திட்டம்</span></div>
            <ul><li><span class="en">ICE Breaker</span><span class="ta">ICE Breaker</span></li></ul></div>
          <div class="lane live"><h5 style="color:var(--teal)"><span class="dot"></span><span class="en">Live</span><span class="ta">நடைமுறையில்</span></h5>
            <div class="cnt"><span class="en">7 projects</span><span class="ta">7 திட்டங்கள்</span></div>
            <ul>
              <li><span class="en">Bayyinah</span><span class="ta">பய்யினாஹ்</span></li>
              <li><span class="en">Newsletter</span><span class="ta">செய்திமடல்</span></li>
              <li><span class="en">Colouring Book</span><span class="ta">கலரிங் புக்</span></li>
              <li><span class="en">Arabic Class</span><span class="ta">அரபிக் வகுப்பு</span></li>
              <li><span class="en">Quran Quiz question bank</span><span class="ta">குர்ஆன் கேள்வி வங்கி</span></li>
              <li><span class="en">Matrimony Website</span><span class="ta">மேட்ரிமோனி வெப்சைட்</span></li>
              <li><span class="en">YouTube &amp; Social Media</span><span class="ta">YouTube &amp; சமூக ஊடகங்கள்</span></li>
            </ul></div>
        </div>
      </div>
    </div>
  </section>

    <!-- ================= TEAM ================= -->
  <section class="s" id="itw-team">
    <div class="wrap">
      <div class="rv">
        <div class="kicker"><span class="en">The people</span><span class="ta">உறுப்பினர்கள்</span></div>
        <h2><span class="en">Meet the IT Wing</span><span class="ta">எங்கள் IT பிரிவு குழு</span></h2>
        <p class="sub"><span class="en">Eleven members of our community who give their time and skills to this work.</span><span class="ta">இந்தப் பணிக்காகத் தங்கள் நேரத்தையும் திறமையையும் வழங்கும் நம் சமூகத்தின் பதினொரு உறுப்பினர்கள்.</span></p>
      </div>
      <div class="team" id="itw-members"></div>
    </div>
  </section>

  <!-- ================= JOIN / REGISTRATION ================= -->
  <section class="join" id="itw-join">
    <div class="wrap">
      <div class="join-shell rv">
        <div class="join-in">

          <aside class="join-side">
            <div class="kicker"><span class="en">Volunteer with us</span><span class="ta">தன்னார்வலராக இணையுங்கள்</span></div>
            <h2 style="margin-top:16px"><span class="en">Give your skills to a <span class="g">noble cause</span></span><span class="ta">உங்கள் திறமையை ஒரு <span class="g">உன்னத நோக்கத்திற்காக</span> வழங்குங்கள்</span></h2>
            <p class="sub"><span class="en">School or college student, working professional, technical or not — there is a place for you in the IT Wing. Register below and our team will get in touch, Insha'Allah.</span><span class="ta">பள்ளி/கல்லூரி மாணவரோ, பணியில் இருப்பவரோ, தொழில்நுட்ப அறிவு உள்ளவரோ இல்லையோ — IT பிரிவில் உங்களுக்கும் இடம் உண்டு. கீழே பதிவு செய்யுங்கள்; இன்ஷா அல்லாஹ், எங்கள் குழு உங்களைத் தொடர்பு கொள்ளும்.</span></p>

            <div class="ayah">
              <p><span class="en">You shall cooperate in matters of righteousness and piety; do not cooperate in matters that are sinful and evil.</span><span class="ta">நன்மையிலும் இறையச்சத்திலும் ஒருவருக்கொருவர் உதவி செய்யுங்கள்; பாவத்திலும் வரம்பு மீறலிலும் உதவி செய்யாதீர்கள்.</span></p>
              <small>QURAN 5 : 2</small>
            </div>

            <div class="ways">
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/></svg><span class="en">Web &amp; app development</span><span class="ta">வெப் &amp; ஆப் உருவாக்கம்</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9zM19 15l.9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9z"/></svg><span class="en">AI video &amp; image creation</span><span class="ta">AI வீடியோ &amp; படம் உருவாக்கம்</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg><span class="en">Content writing</span><span class="ta">உள்ளடக்க எழுத்து</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 5h20v14H2zM10 9l5 3-5 3z"/></svg><span class="en">Design &amp; video editing</span><span class="ta">வடிவமைப்பு &amp; வீடியோ எடிட்டிங்</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 8l6 6M4 14l6-6 2-3M2 5h12M7 2h1M22 22l-5-10-5 10M14 18h6"/></svg><span class="en">Translation &amp; review</span><span class="ta">மொழிபெயர்ப்பு &amp; சரிபார்ப்பு</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM18 22a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM8.6 13.5l6.8 4M15.4 6.5l-6.8 4"/></svg><span class="en">Social media</span><span class="ta">சமூக ஊடகங்கள்</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4zM4 7l8 6 8-6"/></svg><span class="en">Newsletter</span><span class="ta">செய்திமடல்</span></div>
              <div class="way"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10L12 5 2 10l10 5 10-5zM6 12v5c3 2 9 2 12 0v-5"/></svg><span class="en">Teaching</span><span class="ta">கற்பித்தல்</span></div>
            </div>

            <div class="school">
              <div class="school-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/><path d="M9 7h7M9 11h5"/></svg></div>
              <div>
                <h4><span class="en">Even school students can join!</span><span class="ta">பள்ளி மாணவர்களும் இணையலாம்!</span></h4>
                <p><span class="en">No experience needed — we will guide you step by step, from your first task onwards.</span><span class="ta">முன் அனுபவம் தேவையில்லை — முதல் பணியிலிருந்தே படிப்படியாக நாங்கள் உங்களுக்கு வழிகாட்டுவோம்.</span></p>
              </div>
            </div>
          </aside>

          <div class="form" id="itw-form-box">
            <div class="burst" id="itw-burst"></div>
            <div class="fhead">
              <div>
                <h3><span class="en">Volunteer registration</span><span class="ta">தன்னார்வலர் பதிவு</span></h3>
                <p><span class="en">Takes about a minute · <span style="color:var(--gold)">*</span> required</span><span class="ta">ஒரு நிமிடம் போதும் · <span style="color:var(--gold)">*</span> கட்டாயம்</span></p>
              </div>
              <div class="ring" aria-hidden="true">
                <svg viewBox="0 0 64 64"><defs><linearGradient id="itw-rg"><stop offset="0" stop-color="#9A6A14"/><stop offset=".5" stop-color="#F7D97E"/><stop offset="1" stop-color="#E5B94E"/></linearGradient></defs>
                  <circle class="bgc" cx="32" cy="32" r="28"/><circle class="fg" id="itw-ring" cx="32" cy="32" r="28"/></svg>
                <span id="itw-pct">0%</span>
              </div>
            </div>

            <div class="demo" id="itw-demo" hidden><span class="en">Preview mode — the form works, but submissions are not saved until the Google Sheet link is added.</span><span class="ta">முன்னோட்டம் — Google Sheet இணைப்பு சேர்க்கப்படும் வரை பதிவுகள் சேமிக்கப்படாது.</span></div>

            <form id="itw-form" novalidate autocomplete="on">
              <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
              <div class="fgrid">
                <div class="fld" data-k="name">
                  <input id="itw-name" name="name" type="text" placeholder=" " autocomplete="name" required maxlength="80">
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  <label for="itw-name"><span class="en">Full name</span><span class="ta">பெயர்</span> <span class="req">*</span></label>
                  <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                  <div class="err"><span class="en">Please enter your name</span><span class="ta">உங்கள் பெயரை உள்ளிடவும்</span></div>
                </div>
                <div class="fld" data-k="father">
                  <input id="itw-father" name="father_name" type="text" placeholder=" " required maxlength="80">
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                  <label for="itw-father"><span class="en">Father's name</span><span class="ta">தந்தை பெயர்</span> <span class="req">*</span></label>
                  <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                  <div class="err"><span class="en">Please enter your father's name</span><span class="ta">தந்தை பெயரை உள்ளிடவும்</span></div>
                </div>
                <div class="fld date" data-k="dob">
                  <input id="itw-dob" name="dob" type="date" required>
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                  <label for="itw-dob"><span class="en">Date of birth</span><span class="ta">பிறந்த தேதி</span> <span class="req">*</span></label>
                  <div class="err"><span class="en">Please enter a valid date of birth</span><span class="ta">சரியான பிறந்த தேதியை உள்ளிடவும்</span></div>
                </div>
                <div class="fld phone" data-k="mobile">
                  <input id="itw-mobile" name="mobile" type="tel" inputmode="tel" placeholder=" " autocomplete="tel-national" required maxlength="16">
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M11 18h2"/></svg>
                  <span class="cc">+91 |</span>
                  <label for="itw-mobile"><span class="en">Mobile number</span><span class="ta">மொபைல் எண்</span> <span class="req">*</span></label>
                  <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                  <div class="err"><span class="en">Enter a 10-digit mobile number</span><span class="ta">10 இலக்க மொபைல் எண்ணை உள்ளிடவும்</span></div>
                </div>
                <div class="fld full" data-k="email">
                  <input id="itw-email" name="email" type="email" placeholder=" " autocomplete="email" required maxlength="120">
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16v16H4z"/><path d="M4 7l8 6 8-6"/></svg>
                  <label for="itw-email"><span class="en">Email ID</span><span class="ta">மின்னஞ்சல் முகவரி</span> <span class="req">*</span></label>
                  <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                  <div class="err"><span class="en">Please enter a valid email</span><span class="ta">சரியான மின்னஞ்சலை உள்ளிடவும்</span></div>
                </div>
                <div class="fld full" data-k="address">
                  <textarea id="itw-address" name="address" placeholder=" " autocomplete="street-address" required maxlength="400"></textarea>
                  <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  <label for="itw-address"><span class="en">Address</span><span class="ta">முகவரி</span> <span class="req">*</span></label>
                  <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                  <div class="err"><span class="en">Please enter your address</span><span class="ta">உங்கள் முகவரியை உள்ளிடவும்</span></div>
                </div>

                <div class="full seg-wrap" id="itw-segw">
                  <span class="seg-l"><span class="en">Are you a student or working?</span><span class="ta">நீங்கள் மாணவரா அல்லது பணியில் உள்ளவரா?</span> <span class="req" style="color:var(--gold)">*</span></span>
                  <div class="seg" id="itw-seg" role="radiogroup">
                    <span class="pill"></span>
                    <input type="radio" name="status" id="itw-st" value="Student">
                    <label for="itw-st"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg><span class="en">Student</span><span class="ta">மாணவர்</span></label>
                    <input type="radio" name="status" id="itw-wk" value="Working">
                    <label for="itw-wk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span class="en">Working</span><span class="ta">பணியில்</span></label>
                  </div>
                  <div class="err"><span class="en">Please choose one</span><span class="ta">ஒன்றைத் தேர்ந்தெடுக்கவும்</span></div>

                  <div class="itw-reveal" id="itw-rv-st"><div>
                    <div class="fld" data-k="study">
                      <input id="itw-study" name="studying" type="text" placeholder=" " maxlength="120">
                      <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zM22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                      <label for="itw-study"><span class="en">What are you studying? (e.g. 9th Std, B.E. CSE)</span><span class="ta">என்ன படிக்கிறீர்கள்? (உ.தா. 9-ம் வகுப்பு, B.E. CSE)</span> <span class="req">*</span></label>
                      <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                      <div class="err"><span class="en">Please tell us what you are studying</span><span class="ta">நீங்கள் என்ன படிக்கிறீர்கள் என்பதைக் குறிப்பிடவும்</span></div>
                    </div>
                  </div></div>
                  <div class="itw-reveal" id="itw-rv-wk"><div>
                    <div class="fld" data-k="prof">
                      <input id="itw-prof" name="profession" type="text" placeholder=" " autocomplete="organization-title" maxlength="120">
                      <svg class="fi" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                      <label for="itw-prof"><span class="en">Your profession (e.g. Software Engineer, Teacher)</span><span class="ta">உங்கள் தொழில் (உ.தா. மென்பொருள் பொறியாளர், ஆசிரியர்)</span> <span class="req">*</span></label>
                      <span class="tick"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><path d="M5 12l5 5L20 7"/></svg></span>
                      <div class="err"><span class="en">Please tell us your profession</span><span class="ta">உங்கள் தொழிலைக் குறிப்பிடவும்</span></div>
                    </div>
                  </div></div>
                </div>

                <label class="consent full" id="itw-consent">
                  <input type="checkbox" name="consent" value="yes">
                  <span><span class="en">I agree that the IT Wing team may contact me using the details above about volunteering.</span><span class="ta">தன்னார்வப் பணி தொடர்பாக மேலே உள்ள விவரங்கள் மூலம் IT பிரிவு குழு என்னைத் தொடர்பு கொள்ள ஒப்புக்கொள்கிறேன்.</span></span>
                </label>
              </div>

              <button class="btn btn-p submit" type="submit" id="itw-submit"><span class="spin-i"></span><span class="en">Register as a volunteer</span><span class="ta">தன்னார்வலராகப் பதிவு செய்</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></button>
              <div class="ferr" id="itw-ferr"><span class="en">Sorry, something went wrong. Please check your connection and try again.</span><span class="ta">மன்னிக்கவும், பிழை ஏற்பட்டது. இணைய இணைப்பைச் சரிபார்த்து மீண்டும் முயற்சிக்கவும்.</span></div>
              <div class="privacy"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><span class="en">Your details are only shared with the IT Wing team.</span><span class="ta">உங்கள் விவரங்கள் IT பிரிவு குழுவுடன் மட்டுமே பகிரப்படும்.</span></div>
            </form>

            <div class="done" role="status" aria-live="polite">
              <svg viewBox="0 0 110 110" fill="none"><circle class="c1" cx="55" cy="55" r="46" stroke="url(#itw-rg)" stroke-width="4"/><path class="c2" d="M36 56l13 13 25-27" stroke="#F7D97E" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <div class="ar">جزاك الله خيرا</div>
              <h3><span class="en">Thank you, <span id="itw-who"></span>!</span><span class="ta">நன்றி, <span id="itw-who-ta"></span>!</span></h3>
              <p><span class="en">Your registration has been received. Our IT Wing team will contact you soon, Insha'Allah.</span><span class="ta">உங்கள் பதிவு பெறப்பட்டது. இன்ஷா அல்லாஹ், எங்கள் IT பிரிவு குழு விரைவில் உங்களைத் தொடர்பு கொள்ளும்.</span></p>
              <a class="btn btn-g" href="#itw-work"><span class="en">Explore our work</span><span class="ta">எங்கள் பணிகளைப் பாருங்கள்</span></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <style>
.gadv{display:none!important}
.itw .so-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:34px}
.itw .so-card{position:relative;display:flex;flex-direction:column;align-items:flex-start;gap:10px;padding:26px;border-radius:22px;background:linear-gradient(160deg,#18254D,#111B38);border:1px solid rgba(229,185,78,.18);text-decoration:none;color:#F9FAFB;overflow:hidden;transition:transform .35s cubic-bezier(.2,.8,.2,1),border-color .35s,box-shadow .35s}
.itw .so-card:hover{transform:translateY(-6px);border-color:#E5B94E;box-shadow:0 24px 50px -22px rgba(0,0,0,.8)}
.itw .so-ic{width:58px;height:58px;border-radius:16px;display:grid;place-items:center;color:#fff}
.itw .so-yt .so-ic{background:#e62117}.itw .so-ig .so-ic{background:linear-gradient(45deg,#f9a03f,#e1306c 55%,#833ab4)}.itw .so-x .so-ic{background:#000;border:1px solid rgba(255,255,255,.25)}
.itw .so-name{font-family:var(--serif);font-size:1.35rem;color:#F9FAFB}
.itw .so-handle{font-size:.95rem;color:#F7D97E;word-break:break-all}
.itw .so-btn{margin-top:8px;display:inline-flex;gap:6px;align-items:center;padding:9px 18px;border-radius:999px;background:linear-gradient(92deg,#9A6A14,#F7D97E 45%,#E5B94E);color:#2a1d05;font-weight:600;font-size:.9rem}
.itw .so-vid{margin-top:34px;border-radius:22px;border:1px solid rgba(229,185,78,.18);background:#111B38;padding:18px}
.itw .so-vid h3{font-family:var(--serif);font-size:1.3rem;color:#F9FAFB;margin:4px 6px 14px}
.itw .so-frame{position:relative;width:100%;aspect-ratio:16/9;border-radius:14px;overflow:hidden;background:#000}
.itw .so-frame iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.itw .so-more{display:flex;justify-content:center;margin-top:16px}
@media(max-width:820px){.itw .so-grid{grid-template-columns:1fr}.itw .so-vid{padding:12px}}
html.theme-day .itw .so-name,html.theme-day .itw .so-vid h3{color:#F9FAFB}
html.theme-day .itw .so-handle{color:#F7D97E}
</style>
  <section class="s" id="itw-social">
    <div class="wrap">
      <div class="rv">
        <div class="kicker"><span class="en">YouTube &amp; Social Media</span><span class="ta">யூடியூப் &amp; சமூக ஊடகங்கள்</span></div>
        <h2><span class="en">Stay connected with us</span><span class="ta">எங்களுடன் இணைந்திருங்கள்</span></h2>
        <p class="sub"><span class="en">Follow us for videos, reminders and community news, in sha Allah.</span><span class="ta">காணொளிகள், நினைவூட்டல்கள், சமூகச் செய்திகளுக்காக எங்களைப் பின்தொடருங்கள்.</span></p>
      </div>
<style>
.itw .vc{overflow:hidden;text-align:center}
.itw .vc-stage{position:relative;height:500px;perspective:1200px;touch-action:pan-y;user-select:none;-webkit-user-select:none}
.itw .vc-card{position:absolute;left:50%;top:20px;width:250px;height:444px;margin-left:-125px;border-radius:20px;overflow:hidden;cursor:pointer;background:#0A1024;border:1px solid rgba(229,185,78,.25);box-shadow:0 30px 60px -25px rgba(0,0,0,.9);transition:transform .65s cubic-bezier(.2,.8,.2,1),opacity .5s,filter .5s;will-change:transform}
.itw .vc-card img{width:100%;height:100%;object-fit:cover;display:block;pointer-events:none;-webkit-user-drag:none}
.itw .vc-card:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,0) 60%,rgba(5,8,20,.8))}
.itw .vc-card.is-c{border-color:#E5B94E;box-shadow:0 30px 70px -20px rgba(229,185,78,.35),0 30px 60px -25px rgba(0,0,0,.9)}
.itw .vc-ico{position:absolute;left:50%;top:50%;width:62px;height:62px;margin:-31px 0 0 -31px;border-radius:50%;background:rgba(230,33,23,.92);display:grid;place-items:center;z-index:2;color:#fff;box-shadow:0 10px 30px rgba(0,0,0,.5)}
.itw .vc-title{min-height:3.4em;margin:8px auto 0;max-width:660px;padding:0 10px;font-family:var(--serif);font-size:1.15rem;line-height:1.5;color:#F9FAFB;transition:opacity .3s}
.itw .vc-ctrl{display:flex;justify-content:center;align-items:center;gap:14px;margin-top:6px}
.itw .vc-b{width:48px;height:48px;border-radius:50%;border:1px solid rgba(229,185,78,.5);background:#18254D;color:#F7D97E;font-size:1.2rem;cursor:pointer;display:grid;place-items:center}
.itw .vc-b:hover{background:#223266;border-color:#E5B94E}
.itw .vc-play{width:auto;padding:0 24px;border-radius:999px;border:0;background:linear-gradient(92deg,#9A6A14,#F7D97E 45%,#E5B94E);color:#2a1d05;font-weight:700;font-size:.95rem}
.itw .vc-play:hover{background:linear-gradient(92deg,#9A6A14,#F7D97E 45%,#E5B94E);filter:brightness(1.08)}
@media(max-width:820px){.itw .vc-stage{height:420px}.itw .vc-card{width:200px;height:356px;margin-left:-100px}.itw .vc-ico{width:52px;height:52px;margin:-26px 0 0 -26px}}
.vcm{position:fixed;inset:0;z-index:2147483000;display:none;align-items:center;justify-content:center;background:rgba(3,6,16,.9)}
.vcm.on{display:flex}
.vcm-box{position:relative;width:min(94vw,calc(min(86vh,780px)*9/16));aspect-ratio:9/16;border-radius:16px;overflow:hidden;background:#000;box-shadow:0 30px 80px rgba(0,0,0,.8)}
.vcm-box iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.vcm-x{position:fixed;top:14px;right:14px;width:46px;height:46px;border-radius:50%;border:1px solid rgba(255,255,255,.4);background:rgba(20,26,50,.9);color:#fff;font-size:1.6rem;line-height:1;cursor:pointer}
</style>
      <div class="so-vid vc rv">
        <h3><span class="en">Watch our videos</span><span class="ta">எங்கள் காணொளிகளைப் பாருங்கள்</span></h3>
        <div class="vc-stage" id="vcStage"></div>
        <div class="vc-title" id="vcTitle"></div>
        <div class="vc-ctrl"><button class="vc-b" id="vcPrev" aria-label="Previous">&larr;</button><button class="vc-b vc-play" id="vcPlay"><span class="en">&#9654; Play</span><span class="ta">&#9654; இயக்கு</span></button><button class="vc-b" id="vcNext" aria-label="Next">&rarr;</button></div>
        <div class="so-more"><a class="so-btn" href="https://www.youtube.com/@GODAlone19/videos" target="_blank" rel="noopener"><span class="en">See all videos</span><span class="ta">அனைத்து காணொளிகளும்</span> <b aria-hidden="true">&rarr;</b></a></div>
        <script>
(function(){
var V=[["uU-MsxuNYQM","The Exact Measure of Rain | A Sign of God's Power | Quran 23:18"],["EGkRQ87g1eY","குர்ஆனின் 19 அதிசயம்: மாற்ற முடியாத ஒரு கணிதக் கட்டமைப்பு!"],["tyH-DCFeOxA","💰 ZAKAT: How does it really work"],["-ZEje-cpy8g","குர்ஆன் ஒன்றே போதுமானதா | வழிகாட்டுதலுக்கு வேறு ஆதாரங்கள் தேவையா"],["cTUKJIup5aE","How Moses Split the sea | The power of one GOD"],["ZSzQH4cCOk4","கடவுளிடம் சரணடைதல் : உண்மையான மார்க்கம் எது"]];
var st=document.getElementById('vcStage'),tt=document.getElementById('vcTitle');
if(!st||!tt)return;
var n=V.length,cur=0,cards=[],hover=false,inview=true,modal=false,x0=null,moved=false;
var reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;
var PLAY='<svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>';
V.forEach(function(v,i){
  var a=document.createElement('div');a.className='vc-card';a.tabIndex=0;a.setAttribute('role','button');a.setAttribute('aria-label',v[1]);
  var im=new Image();im.alt='';im.loading='lazy';im.src='https://i.ytimg.com/vi/'+v[0]+'/hq720.jpg';
  im.onerror=function(){im.onerror=null;im.src='https://i.ytimg.com/vi/'+v[0]+'/hqdefault.jpg'};
  a.appendChild(im);
  var ic=document.createElement('span');ic.className='vc-ico';ic.innerHTML=PLAY;a.appendChild(ic);
  a.addEventListener('click',function(){if(moved)return;if(i===cur)openV(cur);else go(i)});
  a.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();if(i===cur)openV(cur);else go(i)}});
  st.appendChild(a);cards.push(a);
});
function layout(){
  var c=cards[0].offsetWidth||250;
  cards.forEach(function(el,i){
    var d=i-cur;if(d>n/2)d-=n;if(d<-n/2)d+=n;
    var a=Math.abs(d);
    el.style.transform='translateX('+(d*c*0.72)+'px) translateZ('+(-a*140)+'px) rotateY('+(d*32)+'deg)';
    el.style.zIndex=10-a;
    el.style.opacity=a>2?0:1;
    el.style.pointerEvents=a>2?'none':'auto';
    el.style.filter=a===0?'none':'brightness(.55) saturate(.8)';
    el.classList.toggle('is-c',a===0);
  });
}
function setTitle(){tt.style.opacity=0;setTimeout(function(){tt.textContent=V[cur][1];tt.style.opacity=1},180)}
function go(i){cur=((i%n)+n)%n;layout();setTitle()}
function openV(i){
  var m=document.getElementById('vcm');
  if(!m){
    m=document.createElement('div');m.id='vcm';m.className='vcm';
    m.innerHTML='<button class="vcm-x" aria-label="Close">&times;</button><div class="vcm-box"><iframe allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen title="Video"></iframe></div>';
    document.body.appendChild(m);
    var close=function(){m.classList.remove('on');m.querySelector('iframe').src='about:blank';modal=false};
    m.addEventListener('click',function(e){if(e.target===m||e.target.className==='vcm-x')close()});
    document.addEventListener('keydown',function(e){if(e.key==='Escape'&&modal)close()});
  }
  m.querySelector('iframe').src='https://www.youtube-nocookie.com/embed/'+V[i][0]+'?autoplay=1&rel=0&playsinline=1';
  m.classList.add('on');modal=true;
}
document.getElementById('vcPrev').addEventListener('click',function(){go(cur-1)});
document.getElementById('vcNext').addEventListener('click',function(){go(cur+1)});
document.getElementById('vcPlay').addEventListener('click',function(){openV(cur)});
st.addEventListener('pointerdown',function(e){x0=e.clientX;moved=false});
st.addEventListener('pointermove',function(e){if(x0!==null&&Math.abs(e.clientX-x0)>10)moved=true});
function endDrag(e){if(x0===null)return;var dx=e.clientX-x0;x0=null;if(Math.abs(dx)>45){go(dx<0?cur+1:cur-1)}setTimeout(function(){moved=false},60)}
st.addEventListener('pointerup',endDrag);st.addEventListener('pointercancel',function(){x0=null});
st.addEventListener('mouseenter',function(){hover=true});st.addEventListener('mouseleave',function(){hover=false});
st.addEventListener('touchstart',function(){hover=true},{passive:true});st.addEventListener('touchend',function(){setTimeout(function(){hover=false},4000)},{passive:true});
window.addEventListener('resize',layout);
if('IntersectionObserver' in window){new IntersectionObserver(function(es){inview=es[0].isIntersecting}).observe(st)}
if(!reduce){setInterval(function(){if(!hover&&inview&&!modal&&!document.hidden)go(cur+1)},4500)}
tt.textContent=V[0][1];layout();
})();
</script>

      </div>
      <div class="so-grid"><a class="so-card so-yt rv" href="https://www.youtube.com/@GODAlone19" target="_blank" rel="noopener"><span class="so-ic"><svg viewBox="0 0 24 24" width="30" height="30" fill="currentColor" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg></span><span class="so-name"><span class="en">YouTube</span><span class="ta">யூடியூப்</span></span><span class="so-handle">@GODAlone19</span><span class="so-btn"><span class="en">Subscribe</span><span class="ta">சப்ஸ்கிரைப் செய்க</span> <b aria-hidden="true">&rarr;</b></span></a><a class="so-card so-ig rv" href="https://www.instagram.com/masjidindiamuslimjamath/" target="_blank" rel="noopener"><span class="so-ic"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg></span><span class="so-name"><span class="en">Instagram</span><span class="ta">இன்ஸ்டாகிராம்</span></span><span class="so-handle">@masjidindiamuslimjamath</span><span class="so-btn"><span class="en">Follow</span><span class="ta">பின்தொடர்க</span> <b aria-hidden="true">&rarr;</b></span></a><a class="so-card so-x rv" href="https://x.com/godalone9teen" target="_blank" rel="noopener"><span class="so-ic"><svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor" aria-hidden="true"><path d="M18.2 2.3h3.3l-7.2 8.3 8.5 11.1h-6.7l-5.2-6.8-6 6.8H1.6l7.7-8.8L1.2 2.3H8l4.7 6.2 5.5-6.2zm-1.2 17.4h1.8L7.1 4.2H5.1l11.9 15.5z"/></svg></span><span class="so-name"><span class="en">X (Twitter)</span><span class="ta">எக்ஸ் (X)</span></span><span class="so-handle">@godalone9teen</span><span class="so-btn"><span class="en">Follow</span><span class="ta">பின்தொடர்க</span> <b aria-hidden="true">&rarr;</b></span></a></div>

    </div>
  </section>

  <!-- ================= CLOSE ================= -->
  <footer class="close">
    <div class="wrap rv">
      <div class="ar">الحمد لله</div>
      <h2><span class="en">By God's grace, we reached all of this together.</span><span class="ta">கடவுளின் அருளால் இவ்வளவு சாதனைகளை அடைந்துள்ளோம்.</span></h2>
      <p class="sub"><span class="en">Have an idea for a tool that would help the community? The Inheritance Calculator started exactly that way — tell us.</span><span class="ta">சமூகத்திற்கு உதவும் ஒரு கருவிக்கான யோசனை உங்களிடம் உள்ளதா? வாரிசு உரிமை கணக்கீட்டாளர் அப்படித்தான் தொடங்கியது — எங்களிடம் பகிருங்கள்.</span></p>
      <div class="cta-row"><a class="btn btn-p" href="#itw-join"><span class="en">Join the IT Wing</span><span class="ta">IT பிரிவில் இணையுங்கள்</span> →</a><a class="btn btn-g" href="<?php echo esc_url(home_url('/contact/')); ?>"><span class="en">Share your idea</span><span class="ta">உங்கள் யோசனையைப் பகிருங்கள்</span> →</a></div>
      <div class="foot-note">MASJID INDIA MUSLIM JAMATH · IT WING · GODALONE.IN</div>
    </div>
  </footer>
</div>


<script>

(function(){
  var root=document.getElementById('itw');
  var reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- members (alphabetical) ---- */
  var members=["Abdul Waheed","Ishaaq","Jahir Hussain","Mehraj Banu","Mohamed Sadiq","Mohamed Thameem","Nallu Jns","Nisar Ahamed","Shamsul Alam","Thara Rahman","Zulfiquar Latif"];
  var hues=["#F7D97E","#e8c070","#d9ad5a","#f3dca6"];
  var box=document.getElementById('itw-members');
  members.forEach(function(n,i){
    var ini=n.split(' ').map(function(w){return w[0]}).join('').slice(0,2).toUpperCase();
    var d=document.createElement('div');d.className='mem rv';
    d.innerHTML='<div class="av" style="background:radial-gradient(circle at 30% 25%,#fff4d6,'+hues[i%4]+' 55%,#9A6A14)">'+ini+'</div>'+
      '<div class="nm">'+n+'</div><div class="rl"><span class="en">IT Wing member</span><span class="ta">IT பிரிவு உறுப்பினர்</span></div>';
    d.style.transitionDelay=(i%4)*70+'ms';
    box.appendChild(d);
  });


  /* ---- join card in team grid ---- */
  var you=document.createElement('a');you.className='mem you rv';you.href='#itw-join';
  you.innerHTML='<div class="av">+</div><div class="nm"><span class="en">You?</span><span class="ta">நீங்களும்?</span></div><div class="rl"><span class="en">Join the IT Wing</span><span class="ta">IT பிரிவில் இணையுங்கள்</span></div>';
  box.appendChild(you);

  /* ---- registration form ----
     Paste your Google Apps Script web-app URL below to save registrations to a Google Sheet. */
  var ITW_FORM_ENDPOINT='/wp-admin/admin-ajax.php?action=itw_register';

  var form=document.getElementById('itw-form'),fbox=document.getElementById('itw-form-box');
  if(!ITW_FORM_ENDPOINT)document.getElementById('itw-demo').hidden=false;
  var dob=document.getElementById('itw-dob');
  var today=new Date();dob.max=today.toISOString().slice(0,10);dob.min='1930-01-01';
  var seg=document.getElementById('itw-seg'),segw=document.getElementById('itw-segw');
  var rvSt=document.getElementById('itw-rv-st'),rvWk=document.getElementById('itw-rv-wk');
  function status(){var c=form.querySelector('input[name="status"]:checked');return c?c.value:''}
  var rules={
    name:function(v){return v.trim().length>=2},
    father:function(v){return v.trim().length>=2},
    dob:function(v){if(!v)return false;var d=new Date(v);return d<=today&&d.getFullYear()>=1930},
    mobile:function(v){var d=v.replace(/[^\d]/g,'');if(d.length===12&&d.indexOf('91')===0)d=d.slice(2);if(d.length===11&&d[0]==='0')d=d.slice(1);return /^[6-9]\d{9}$/.test(d)||(/^\+/.test(v.trim())&&d.length>=8&&d.length<=15)},
    email:function(v){return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim())},
    address:function(v){return v.trim().length>=8},
    study:function(v){return status()!=='Student'||v.trim().length>=2},
    prof:function(v){return status()!=='Working'||v.trim().length>=2}
  };
  var flds={};form.querySelectorAll('.fld').forEach(function(f){flds[f.dataset.k]=f});
  function check(k,show){var f=flds[k],el=f.querySelector('input,textarea'),ok=rules[k](el.value);
    f.classList.toggle('ok',ok&&el.value.trim()!==''&&k!=='dob');
    if(show)f.classList.toggle('bad',!ok);else if(ok)f.classList.remove('bad');return ok}
  function progress(){
    var keys=['name','father','dob','mobile','email','address'],n=0,t=8;
    keys.forEach(function(k){if(rules[k](flds[k].querySelector('input,textarea').value))n++});
    var st=status();if(st)n++;
    if(st&&rules[st==='Student'?'study':'prof']((st==='Student'?flds.study:flds.prof).querySelector('input').value)&&(st==='Student'?flds.study:flds.prof).querySelector('input').value.trim())n++;
    var p=Math.round(n/t*100);document.getElementById('itw-pct').textContent=p+'%';
    document.getElementById('itw-ring').style.strokeDashoffset=176-176*p/100;
  }
  Object.keys(flds).forEach(function(k){var el=flds[k].querySelector('input,textarea');
    el.addEventListener('input',function(){check(k,false);progress()});
    el.addEventListener('blur',function(){if(el.value!=='')check(k,true)});
  });
  form.querySelectorAll('input[name="status"]').forEach(function(r){r.addEventListener('change',function(){
    var v=status();seg.dataset.v=v==='Student'?'student':'working';segw.classList.remove('bad');
    rvSt.classList.toggle('open',v==='Student');rvWk.classList.toggle('open',v==='Working');
    flds.study.classList.remove('bad');flds.prof.classList.remove('bad');
    setTimeout(function(){(v==='Student'?flds.study:flds.prof).querySelector('input').focus({preventScroll:true})},250);
    progress();
  })});
  var consent=document.getElementById('itw-consent');
  consent.querySelector('input').addEventListener('change',function(){consent.classList.remove('bad')});

  function burst(){if(reduce)return;var b=document.getElementById('itw-burst');b.innerHTML='';
    for(var i=0;i<28;i++){var e=document.createElement('i'),a=Math.random()*6.283,r=120+Math.random()*180;
      e.style.left='50%';e.style.top='32%';e.style.setProperty('--dx',Math.cos(a)*r+'px');e.style.setProperty('--dy',Math.sin(a)*r+'px');
      e.style.animationDelay=(Math.random()*.25)+'s';if(i%3===0)e.style.background='#E5B94E';b.appendChild(e)}}

  form.addEventListener('submit',function(ev){
    ev.preventDefault();
    var allOk=true,first=null;
    Object.keys(flds).forEach(function(k){if(!check(k,true)){allOk=false;if(!first)first=flds[k].querySelector('input,textarea')}});
    if(!status()){segw.classList.add('bad');allOk=false;if(!first)first=seg}
    if(!consent.querySelector('input').checked){consent.classList.add('bad');allOk=false;if(!first)first=consent}
    if(!allOk){first&&first.scrollIntoView({behavior:reduce?'auto':'smooth',block:'center'});if(first&&first.focus)setTimeout(function(){first.focus({preventScroll:true})},300);return}
    if(form.website.value)return; /* spam trap */
    var btn=document.getElementById('itw-submit'),ferr=document.getElementById('itw-ferr');
    btn.disabled=true;btn.classList.add('busy');ferr.classList.remove('on');
    var fd=new URLSearchParams();
    ['name','father_name','dob','mobile','email','address','status','studying','profession'].forEach(function(n){
      var el=form.elements[n];var v=el?(el.value!==undefined?el.value:''):'';
      if(n==='status')v=status();
      if(n==='studying'&&status()!=='Student')v='';if(n==='profession'&&status()!=='Working')v='';
      fd.append(n,(v||'').trim())});
    fd.append('language',root.getAttribute('data-lang'));fd.append('submitted_at',new Date().toISOString());
    var done=function(){var nm=form.elements.name.value.trim().split(' ')[0];
      document.getElementById('itw-who').textContent=nm;document.getElementById('itw-who-ta').textContent=nm;
      fbox.classList.add('sent');burst();fbox.scrollIntoView({behavior:reduce?'auto':'smooth',block:'center'})};
    var p=ITW_FORM_ENDPOINT?fetch(ITW_FORM_ENDPOINT,{method:'POST',body:fd}).then(function(r){if(!r.ok)throw new Error('save')}):new Promise(function(r){setTimeout(r,900)});
    p.then(done).catch(function(){ferr.classList.add('on')}).finally(function(){btn.disabled=false;btn.classList.remove('busy')});
  });

  /* ---- language ---- */
  function setLang(l,anim){
    root.setAttribute('data-lang',l);
    document.documentElement.lang=l;
    root.querySelectorAll('.lang button').forEach(function(b){b.setAttribute('aria-pressed',b.dataset.set===l)});
    try{localStorage.setItem('itw-lang',l)}catch(e){}
    if(anim&&!reduce){root.querySelectorAll('h1,h2,.lead,.card p').forEach(function(el){el.classList.remove('lang-fade');void el.offsetWidth;el.classList.add('lang-fade')})}
  }
  var start=root.getAttribute('data-lang');
  setLang(start,false);
  root.querySelectorAll('.lang button').forEach(function(b){b.addEventListener('click',function(){setLang(b.dataset.set,true)})});

  /* ---- filters ---- */
  var cards=root.querySelectorAll('#itw-grid .card');
  root.querySelectorAll('.filters button').forEach(function(b){
    b.addEventListener('click',function(){
      root.querySelectorAll('.filters button').forEach(function(x){x.setAttribute('aria-pressed',x===b)});
      var f=b.dataset.f;
      cards.forEach(function(c){c.classList.toggle('hide',!(f==='all'||c.dataset.s===f));});
    });
  });

  /* ---- card spotlight ---- */
  cards.forEach(function(c){
    c.addEventListener('pointermove',function(e){var r=c.getBoundingClientRect();c.style.setProperty('--mx',(e.clientX-r.left)+'px');c.style.setProperty('--my',(e.clientY-r.top)+'px')});
  });

  /* ---- reveal + counters ---- */
  function count(el){
    var t=+el.dataset.count,st=null;
    if(reduce){el.textContent=t;return}
    function step(ts){if(!st)st=ts;var p=Math.min((ts-st)/1400,1);el.textContent=Math.round(t*(1-Math.pow(1-p,3)));if(p<1)requestAnimationFrame(step)}
    requestAnimationFrame(step);
  }
  var io='IntersectionObserver' in window?new IntersectionObserver(function(es){
    es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');
      e.target.querySelectorAll&&e.target.querySelectorAll('[data-count]').forEach(count);
      io.unobserve(e.target)}});
  },{threshold:.12,rootMargin:'0px 0px -40px 0px'}):null;
  root.querySelectorAll('.rv').forEach(function(el){io?io.observe(el):el.classList.add('in')});
  if(!io)root.querySelectorAll('[data-count]').forEach(count);

  /* ---- hero network canvas ---- */
  var cv=document.getElementById('net'),ctx=cv.getContext('2d'),W,H,dpr,pts=[],mouse={x:-999,y:-999};
  function size(){dpr=Math.min(window.devicePixelRatio||1,2);W=cv.offsetWidth;H=cv.offsetHeight;cv.width=W*dpr;cv.height=H*dpr;ctx.setTransform(dpr,0,0,dpr,0,0);
    var n=Math.round(Math.min(90,W*H/14000));pts=[];for(var i=0;i<n;i++)pts.push({x:Math.random()*W,y:Math.random()*H,vx:(Math.random()-.5)*.25,vy:(Math.random()-.5)*.25,r:Math.random()*1.6+.6})}
  function draw(){
    ctx.clearRect(0,0,W,H);
    for(var i=0;i<pts.length;i++){var p=pts[i];
      if(!reduce){p.x+=p.vx;p.y+=p.vy;if(p.x<0||p.x>W)p.vx*=-1;if(p.y<0||p.y>H)p.vy*=-1}
      for(var j=i+1;j<pts.length;j++){var q=pts[j],dx=p.x-q.x,dy=p.y-q.y,d=dx*dx+dy*dy;
        if(d<15000){ctx.strokeStyle='rgba(229,185,78,'+(0.16*(1-d/15000))+')';ctx.lineWidth=.7;ctx.beginPath();ctx.moveTo(p.x,p.y);ctx.lineTo(q.x,q.y);ctx.stroke()}}
      var mx=p.x-mouse.x,my=p.y-mouse.y,md=mx*mx+my*my;
      if(md<26000){ctx.strokeStyle='rgba(247,217,126,'+(0.4*(1-md/26000))+')';ctx.beginPath();ctx.moveTo(p.x,p.y);ctx.lineTo(mouse.x,mouse.y);ctx.stroke()}
      ctx.fillStyle='rgba(247,217,126,.75)';ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,6.283);ctx.fill();
    }
    if(!reduce&&visible)requestAnimationFrame(draw);
  }
  var visible=true;
  size();draw();
  window.addEventListener('resize',function(){size();if(reduce)draw()});
  cv.parentElement.addEventListener('pointermove',function(e){var r=cv.getBoundingClientRect();mouse.x=e.clientX-r.left;mouse.y=e.clientY-r.top});
  cv.parentElement.addEventListener('pointerleave',function(){mouse.x=mouse.y=-999});
  if('IntersectionObserver' in window&&!reduce){new IntersectionObserver(function(es){var v=es[0].isIntersecting;if(v&&!visible){visible=true;draw()}else visible=v}).observe(cv)}
})();

</script>
<?php get_footer(); if (ob_get_level()) { ob_end_flush(); } ?>
