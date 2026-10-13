<?php
/**
 * Template Name: Audio Quran
 *
 * Auto-loads for the "Audio Quran" page (slug: audio-quran) via the
 * WordPress template hierarchy. Migrated from the old godalone-theme into
 * the GodAlone Premium design system. The sura data table and player logic
 * are preserved unchanged from the original; only the markup/CSS wrapper
 * is restyled to the new theme's design tokens.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<style>
.audio-page-wrap{max-width:900px;margin:0 auto;padding:0 22px}
.lang-tabs{display:flex;justify-content:center;gap:.8rem;margin-bottom:28px}
.lang-tab{padding:10px 25px;background:var(--panel-2);color:var(--gold-bright);
  border:2px solid var(--gold);border-radius:25px;cursor:pointer;font-weight:600;
  transition:.2s;font-size:.95rem;font-family:inherit}
.lang-tab.active{background:var(--gold-grad);color:#1a1206;box-shadow:0 4px 15px -4px rgba(216,180,94,.6)}
.lang-tab:hover{transform:translateY(-2px)}
.audio-player-box{background:linear-gradient(180deg,var(--panel),var(--panel-2));
  border:1px solid var(--line);border-radius:var(--radius-lg);padding:34px;box-shadow:var(--shadow)}
.sura-info-line{display:flex;align-items:center;justify-content:center;gap:.8rem;margin-bottom:.6rem}
.sura-number{font-size:2.4rem;font-weight:700;color:var(--gold);font-family:var(--font-display);min-width:56px;text-align:right}
.sura-arabic{font-family:var(--font-ar);font-size:1.9rem;color:var(--gold-bright);direction:rtl}
.sura-name{font-size:1.2rem;color:var(--ink);margin-bottom:.4rem;text-align:center}
.sura-meta{font-size:.9rem;color:var(--muted);text-align:center;margin-bottom:22px}
.audio-controls{display:flex;justify-content:center;align-items:center;gap:14px;margin-bottom:20px}
.control-btn{background:var(--gold-grad);border:none;border-radius:50%;width:48px;height:48px;
  display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;
  box-shadow:0 4px 15px -6px rgba(0,0,0,.4)}
.control-btn:hover{transform:scale(1.08)}
.control-btn svg{width:20px;height:20px;fill:#1a1206}
.play-btn{width:58px;height:58px}
.play-btn svg{width:26px;height:26px}
.progress-container{margin-bottom:14px}
.progress-bar{width:100%;height:6px;background:var(--line-2);border-radius:10px;cursor:pointer;overflow:hidden}
.progress-fill{height:100%;background:var(--gold-grad);border-radius:10px;width:0%}
.time-display{display:flex;justify-content:space-between;margin-top:6px;color:var(--muted);font-size:.85rem}
.sura-selector{margin-top:20px;text-align:center}
.sura-selector label{display:block;color:var(--gold-bright);margin-bottom:8px;font-weight:600;font-size:.95rem}
.sura-selector select{width:100%;max-width:500px;padding:10px;background:var(--panel-2);
  color:var(--ink);border:1px solid var(--line);border-radius:12px;font-size:.95rem}
.playlist-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:12px;margin-top:16px}
.playlist-card{display:grid;grid-template-columns:48px 1fr 18px;grid-template-rows:auto auto;column-gap:14px;row-gap:1px;align-items:center;padding:12px 16px;border-radius:16px;background:linear-gradient(135deg,#b3141b 0%,#e02a2a 100%);border:1px solid rgba(255,255,255,.2);box-shadow:0 8px 18px rgba(179,20,27,.28),inset 0 1px 0 rgba(255,255,255,.22);text-align:left;text-decoration:none;color:#fff;transition:transform .2s,box-shadow .2s}
.playlist-card:hover{transform:translateY(-3px);box-shadow:0 12px 24px rgba(179,20,27,.36),inset 0 1px 0 rgba(255,255,255,.22);color:#fff}
.playlist-icon{grid-row:1/3;grid-column:1;width:48px;height:48px;margin:0;border-radius:14px;background:rgba(255,255,255,.18);display:grid;place-items:center;font-size:0;line-height:0}
.playlist-icon svg{width:28px;height:28px;fill:#fff;display:block}
.playlist-card h3{grid-column:2;grid-row:1;align-self:end;margin:0;padding:0;font-size:1.02rem;font-weight:600;line-height:1.25;color:#fff}
.playlist-card p{grid-column:2;grid-row:2;align-self:start;margin:0;padding:0;font-size:.82rem;line-height:1.35;color:rgba(255,255,255,.9)}
.playlist-card::after{content:"›";grid-column:3;grid-row:1/3;font-size:1.7rem;line-height:1;color:rgba(255,255,255,.85);justify-self:end}
@media(max-width:560px){.playlist-card{padding:10px 14px;grid-template-columns:44px 1fr 14px;column-gap:12px}.playlist-icon{width:44px;height:44px}.playlist-icon svg{width:26px;height:26px}.playlist-card h3{font-size:.98rem}}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">🎧 Audio Quran</h1>
    <p class="bism reveal" style="margin-top:22px">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</p>
    <p class="bism-en">In the Name of God, Most Gracious, Most Merciful</p>
  </div>
</div>

<!-- GAQ-NEW-PLAYER START (multilingual audio player, added 2026-10-11 — delete from START to END to remove) -->
<section class="blk">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil:wght@400;600&family=Noto+Sans+Devanagari:wght@400;600&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
/* Same Arabic font as the web Quran (godalone.in/quran): Uthmanic Hafs — clear and easy for every reader */
@font-face{font-family:"GAQ Uthmanic";src:url("/quran/fonts/uthmanic-hafs.woff2") format("woff2");font-weight:400;font-style:normal;font-display:swap}
#gaq{--navy:#0a1024;--navy2:#111a3a;--card:rgba(255,255,255,.05);--line:rgba(212,175,55,.26);--gold:#d4af37;--gold2:#f3d77a;--txt:#eef1fb;--mut:#9aa6c8;
  font-family:'Poppins',system-ui,sans-serif;color:var(--txt);max-width:880px;margin:0 auto 34px;border-radius:26px;padding:26px 24px;
  background:radial-gradient(900px 320px at 50% -8%,#1f3170 0%,transparent 62%),linear-gradient(180deg,var(--navy2),var(--navy));
  border:1px solid var(--line);box-shadow:0 18px 50px rgba(0,0,0,.42);box-sizing:border-box;line-height:1.5}
#gaq *{box-sizing:border-box}
#gaq button,#gaq select,#gaq summary{font-family:inherit}
#gaq .gq-top{text-align:center}
#gaq .gq-top h2{margin:0;font-size:1.3rem;font-weight:600;color:var(--gold2);letter-spacing:.2px;border:0;padding:0}
#gaq .gq-top p{margin:2px 0 0;font-size:.82rem;color:var(--mut)}
#gaq .gq-pick{margin:18px auto 0;max-width:520px}
#gaq select{width:100%;background:rgba(255,255,255,.07);color:var(--txt);border:1px solid var(--line);border-radius:14px;padding:12px 14px;font-size:.95rem;appearance:auto}
#gaq select option{background:#111a3a;color:#fff}
#gaq .gq-sura{text-align:center;margin:18px 0 6px}
#gaq .gq-sura .ar{font-family:'GAQ Uthmanic','UthmanicHafs','Scheherazade New','Traditional Arabic',serif;font-size:2.1rem;line-height:1.6;color:var(--gold2)}
#gaq .gq-sura .meta{font-size:.82rem;color:var(--mut);margin-top:2px}
#gaq .gq-langs{display:flex;flex-wrap:wrap;gap:8px;justify-content:center;margin:14px 0 4px}
#gaq .chip{display:inline-flex;align-items:center;gap:7px;cursor:pointer;padding:9px 16px;border-radius:999px;border:1px solid var(--line);background:var(--card);color:var(--txt);font-size:.92rem;transition:.2s}
#gaq .chip svg{width:15px;height:15px;opacity:.35;flex:none}
#gaq .chip.on{background:linear-gradient(135deg,var(--gold2),var(--gold));color:#1a1405;border-color:transparent;font-weight:600;box-shadow:0 4px 14px rgba(212,175,55,.3)}
#gaq .chip.on svg{opacity:1}
#gaq .gq-hint{text-align:center;font-size:.76rem;color:var(--mut);margin:0 0 4px}
#gaq .gq-player{--card:rgba(255,255,255,.12);--line:rgba(243,215,122,.42);--mut:#c4eadf;margin:16px 0 0;padding:16px 16px 12px;border-radius:20px;background:linear-gradient(150deg,#0e6b5b 0%,#0a4a52 58%,#0f3a5c 100%);border:1px solid rgba(243,215,122,.5);box-shadow:0 10px 28px rgba(0,0,0,.35),inset 0 1px 0 rgba(255,255,255,.12)}
#gaq .gq-player select{background:rgba(0,0,0,.24)}
#gaq .gq-player select option{background:#0b4a52;color:#fff}
#gaq .bar{height:7px;border-radius:99px;background:rgba(0,0,0,.28);cursor:pointer;position:relative;overflow:hidden}
#gaq .bar i{position:absolute;inset:0 auto 0 0;width:0;background:linear-gradient(90deg,var(--gold),var(--gold2));border-radius:99px;transition:width .25s}
#gaq .gq-vpos{text-align:center;font-size:.78rem;color:var(--mut);margin:7px 0 2px}
#gaq .ctl{display:flex;align-items:center;justify-content:center;gap:14px;margin:8px 0 4px}
#gaq .btn{width:46px;height:46px;border-radius:50%;border:1px solid var(--line);background:var(--card);color:var(--txt);font-size:1.05rem;cursor:pointer;display:grid;place-items:center;padding:0;margin:0;line-height:1;transition:.2s}
#gaq .btn:hover{border-color:var(--gold)}
#gaq .btn svg{display:block;width:1em;height:1em;pointer-events:none}
#gaq .btn.play{width:68px;height:68px;font-size:1.7rem;background:linear-gradient(135deg,var(--gold2),var(--gold));color:#1a1405;border:0;box-shadow:0 8px 24px rgba(212,175,55,.42)}
#gaq .btn.sm{width:38px;height:38px;font-size:.9rem}
#gaq .btn.on{background:rgba(212,175,55,.28);border-color:var(--gold);color:var(--gold2)}
#gaq .status{text-align:center;color:var(--gold2);font-size:.8rem;min-height:1.3em}
#gaq details.opt{margin-top:2px}
#gaq details.opt>summary{cursor:pointer;list-style:none;text-align:center;font-size:.8rem;color:var(--mut);padding:6px}
#gaq details.opt>summary::-webkit-details-marker{display:none}
#gaq details.opt>summary:hover{color:var(--gold2)}
#gaq details.opt[open]>summary{display:none}
#gaq .opthead{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-top:4px;padding:2px 0 8px;border-bottom:1px solid var(--line);font-size:.86rem;font-weight:600;color:var(--gold2)}
#gaq .optx{width:34px;height:34px;flex:none;border-radius:50%;border:1px solid var(--line);background:rgba(0,0,0,.25);color:#fff;font-size:1.05rem;line-height:1;cursor:pointer;display:grid;place-items:center;padding:0;margin:0}
#gaq .optx:hover{background:var(--gold);color:#1a1405;border-color:var(--gold)}
#gaq .optgrid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:8px;align-items:end}
#gaq .optgrid label{display:block;font-size:.72rem;color:var(--mut);margin-bottom:4px}
#gaq .optgrid .wide{grid-column:1/-1}
#gaq .optgrid select{padding:9px 12px;font-size:.88rem}
#gaq .optrow{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;align-items:center;grid-column:1/-1}
#gaq .txtbtn{display:inline-flex;align-items:center;gap:7px;cursor:pointer;padding:8px 14px;border-radius:999px;border:1px solid var(--line);background:var(--card);color:var(--txt);font-size:.8rem}
#gaq .txtbtn svg{width:15px;height:15px}
#gaq .txtbtn:hover{border-color:var(--gold)}
#gaq .txtbtn.on{background:rgba(212,175,55,.28);border-color:var(--gold);color:var(--gold2)}
#gaq .verses{position:relative;max-height:min(62vh,560px);overflow-y:auto;margin-top:16px;padding:2px 4px 2px 2px}
#gaq .verses::-webkit-scrollbar{width:7px}#gaq .verses::-webkit-scrollbar-thumb{background:var(--line);border-radius:9px}
#gaq .v{padding:14px 16px 16px;border-radius:18px;margin-bottom:10px;background:var(--card);border:1px solid transparent;cursor:pointer;transition:.25s}
#gaq .v:hover{border-color:var(--line)}
#gaq .v.cur{border-color:var(--gold);background:rgba(212,175,55,.09)}
#gaq .vn{display:inline-flex;align-items:center;justify-content:center;min-width:28px;height:28px;padding:0 9px;border-radius:99px;background:rgba(212,175,55,.18);color:var(--gold2);font-size:.75rem;margin-bottom:6px}
#gaq .t{border-radius:10px;transition:background .25s}
#gaq .t.say{background:rgba(212,175,55,.08);box-shadow:0 0 0 6px rgba(212,175,55,.08)}
#gaq .w{border-radius:7px;padding:0 2px;transition:background .12s,color .12s,box-shadow .12s}
#gaq .w.on{background:rgba(243,215,122,.34);color:#fff3c4;box-shadow:0 0 0 2px rgba(243,215,122,.34)}
#gaq .t-ar{direction:rtl;text-align:right;font-family:'GAQ Uthmanic','UthmanicHafs','Scheherazade New','Traditional Arabic',serif;font-size:2rem;line-height:2;color:#fff}
#gaq .t-en{font-size:1rem;line-height:1.7;color:#dfe5fb;margin-top:8px}
#gaq .t-ta{font-family:'Noto Sans Tamil',sans-serif;font-size:1rem;line-height:1.9;color:#dfe5fb;margin-top:8px}
#gaq .t-hi{font-family:'Noto Sans Devanagari',sans-serif;font-size:1rem;line-height:1.9;color:#dfe5fb;margin-top:8px}
#gaq .soon{color:var(--mut);font-style:italic;font-size:.84rem}
#gaq details.fn{margin-top:6px;font-size:.84rem;color:var(--mut)}
#gaq details.fn summary{cursor:pointer;color:var(--gold);font-size:.75rem}
#gaq .dlnote{flex-basis:100%;text-align:center;font-size:.72rem;color:var(--mut)}
@media(max-width:560px){
  #gaq{padding:12px 10px 10px;border-radius:18px;margin-bottom:22px}
  #gaq .gq-top,#gaq .gq-hint{display:none}
  #gaq .gq-pick{margin-top:0}
  #gaq select{padding:9px 12px;font-size:.88rem;border-radius:12px}
  #gaq .gq-sura{margin:6px 0 0}
  #gaq .gq-sura .ar{font-size:1.45rem;line-height:1.5}
  #gaq .gq-sura .meta{font-size:.7rem}
  #gaq .gq-langs{margin:8px 0 0;gap:6px}
  #gaq .chip{padding:6px 11px;font-size:.82rem;gap:5px}
  #gaq .chip svg{width:12px;height:12px}
  #gaq .gq-player{margin-top:8px;padding:9px 10px 4px;border-radius:16px;position:sticky;top:var(--gaq-top,0px);z-index:30;background:linear-gradient(150deg,#0e6b5b,#0a4a52 60%,#0f3a5c);box-shadow:0 10px 20px rgba(0,0,0,.45)}
  #gaq .bar{height:5px}
  #gaq .gq-vpos{margin:4px 0 0;font-size:.7rem}
  #gaq .ctl{gap:8px;margin:4px 0 0}
  #gaq .btn{width:38px;height:38px;font-size:.95rem}
  #gaq .btn.sm{width:32px;height:32px;font-size:.8rem}
  #gaq .btn.play{width:50px;height:50px;font-size:1.3rem}
  #gaq .status{font-size:.7rem;min-height:1.1em}
  #gaq details.opt>summary{padding:3px;font-size:.74rem}
  #gaq .optgrid{grid-template-columns:1fr;max-height:min(58vh,430px);overflow-y:auto;padding-right:2px}
  #gaq .verses{margin-top:10px;max-height:none;overflow:visible;min-height:0;padding:0}
  #gaq .t-ar{font-size:1.6rem;line-height:1.95}
  #gaq .v{padding:10px 11px 12px;margin-bottom:8px;border-radius:15px}
}
</style>

<style id="gaq-x1">
#gaq .vrow{position:relative}
#gaq .mini{position:absolute;top:50%;transform:translateY(-50%);width:26px;height:26px;padding:0;border-radius:50%;border:1px solid var(--line);background:rgba(255,255,255,.1);color:var(--gold2);display:inline-flex;align-items:center;justify-content:center;cursor:pointer;line-height:0}
#gaq .mini svg{width:14px;height:14px;display:block}
#gaq .mini.r{right:0}#gaq .mini.l{left:0;display:none}
#gaq .mini:hover{background:rgba(255,255,255,.2)}
#gaq .pickbtn{display:none;width:100%;align-items:center;justify-content:space-between;gap:8px;text-align:left;background:rgba(255,255,255,.07);color:var(--txt);border:1px solid var(--line);border-radius:14px;padding:12px 14px;font-size:.95rem;cursor:pointer}
#gaq .pickbtn svg{width:16px;height:16px;flex:none;opacity:.8}
@media(max-width:560px),(pointer:coarse){#gaq .pickbtn{display:flex}#gaq #gaq-sura{display:none}#gaq .mini.l{display:inline-flex}}
html.gaq-lock{overflow:hidden}
#gaq-ov{position:fixed;inset:0;z-index:2147483000;background:rgba(3,10,20,.72);display:none;align-items:center;justify-content:center;padding:14px;font-family:Poppins,system-ui,sans-serif}
#gaq-ov.on{display:flex}
#gaq-ov .ovbox{width:100%;max-width:460px;max-height:86vh;max-height:86dvh;display:flex;flex-direction:column;background:#0f1a36;color:#eef1fb;border:1px solid rgba(212,175,55,.4);border-radius:20px;box-shadow:0 18px 60px rgba(0,0,0,.6);overflow:hidden}
#gaq-ov .ovhead{display:flex;align-items:center;justify-content:space-between;padding:10px 10px 10px 18px;border-bottom:1px solid rgba(212,175,55,.25);font-weight:600;color:#f3d77a}
#gaq-ov .ovx{width:42px;height:42px;border-radius:50%;border:1px solid rgba(243,215,122,.5);background:rgba(255,255,255,.08);color:#f3d77a;font-size:22px;line-height:1;cursor:pointer;display:flex;align-items:center;justify-content:center;padding:0}
#gaq-ov .ovlist{overflow-y:auto;-webkit-overflow-scrolling:touch;overscroll-behavior:contain;padding:6px}
#gaq-ov .ovrow{display:block;width:100%;text-align:left;background:none;border:0;border-radius:12px;color:inherit;font:inherit;font-size:.93rem;padding:11px 12px;cursor:pointer}
#gaq-ov .ovrow:hover{background:rgba(255,255,255,.07)}
#gaq-ov .ovrow.on{background:rgba(212,175,55,.2);color:#f3d77a;font-weight:600}
#gaq-ov.gq-light{background:rgba(20,50,45,.45)}
#gaq-ov.gq-light .ovbox{background:#f6fbf8;color:#12332e;border-color:rgba(14,107,91,.4)}
#gaq-ov.gq-light .ovhead{color:#0e6b5b;border-color:rgba(14,107,91,.25)}
#gaq-ov.gq-light .ovx{color:#0e6b5b;border-color:rgba(14,107,91,.5);background:rgba(14,107,91,.08)}
#gaq-ov.gq-light .ovrow:hover{background:rgba(14,107,91,.08)}
#gaq-ov.gq-light .ovrow.on{background:rgba(14,107,91,.16);color:#0a4a40}
/* light theme */
#gaq.gq-light{--navy:#f4faf7;--navy2:#eaf6f0;--card:rgba(14,107,91,.07);--line:rgba(14,107,91,.3);--gold:#b08400;--gold2:#7d5d00;--txt:#12332e;--mut:#4d6a65;background:radial-gradient(900px 320px at 50% -8%,#d6efe6 0%,transparent 62%),linear-gradient(180deg,#f8fdfa,#e8f4ee);box-shadow:0 12px 34px rgba(14,107,91,.16)}
#gaq.gq-light select{background:#fff;color:#12332e}
#gaq.gq-light select option{background:#fff;color:#12332e}
#gaq.gq-light .pickbtn{background:#fff}
#gaq.gq-light .chip.on{color:#fff;background:linear-gradient(135deg,#12806b,#0e6b5b);box-shadow:0 4px 14px rgba(14,107,91,.3)}
#gaq.gq-light .mini{background:rgba(14,107,91,.1);color:#0e6b5b}
#gaq.gq-light .gq-player{--card:rgba(255,255,255,.55);--line:rgba(14,107,91,.35);--mut:#3d6a63;--txt:#10302b;--gold:#0e6b5b;--gold2:#0a5a4c;background:linear-gradient(150deg,#e3f5ee 0%,#d4ece6 58%,#d6e8f3 100%);border-color:rgba(14,107,91,.4);box-shadow:0 8px 22px rgba(14,107,91,.18)}
#gaq.gq-light .gq-player select{background:#fff}
#gaq.gq-light .gq-player .bar{background:rgba(14,107,91,.2)}
#gaq.gq-light .v.cur{background:rgba(14,107,91,.1)}
#gaq.gq-light .vn{background:rgba(14,107,91,.14)}
#gaq.gq-light .w.on{background:rgba(14,107,91,.22);color:inherit}
#gaq.gq-light .t-ar{color:#0b2b26}
#gaq.gq-light .t-en,#gaq.gq-light .t-ta,#gaq.gq-light .t-hi{color:#1c3d37}
#gaq.gq-light .fn summary{color:#0e6b5b}
</style>
<style id="gaq-x2">
#gaq .gq-vpos{padding:0 92px}
#gaq .mini.b1{right:30px}#gaq .mini.b2{right:60px}#gaq .mini.rg{left:0}
@media(max-width:560px),(pointer:coarse){#gaq .mini.rg{left:0}#gaq #gaq-down{display:none!important}}
#gaq .mini.rg{width:auto;border-radius:13px;padding:0 9px 0 7px;display:inline-flex;align-items:center;gap:4px;font-size:10px;font-weight:600;line-height:1;letter-spacing:.2px;white-space:nowrap}
#gaq .mini.rg .m{display:none}
@media(max-width:560px),(pointer:coarse){#gaq .mini.rg .d{display:none}#gaq .mini.rg .m{display:inline}}
.gaov input[type=number]{width:100%;box-sizing:border-box;margin-top:4px;background:rgba(255,255,255,.08);color:inherit;border:1px solid rgba(212,175,55,.35);border-radius:12px;padding:10px;font:inherit;font-size:.95rem}
.gaov.gq-light input[type=number]{background:#fff;color:#0b3d35;border-color:rgba(14,107,91,.35)}
.gaov .rg2{grid-template-columns:1.7fr 1fr}
#gaq .mini.on{background:var(--gold);color:#1a1405;border-color:transparent}
#gaq.gq-light .mini.on{background:#0e6b5b;color:#fff}
.gaov{position:fixed;inset:0;z-index:2147483000;background:rgba(3,10,20,.72);display:none;align-items:center;justify-content:center;padding:14px;font-family:Poppins,system-ui,sans-serif}
.gaov.on{display:flex}
.gaov .ovbox{width:100%;max-width:460px;max-height:86vh;max-height:86dvh;display:flex;flex-direction:column;background:#0f1a36;color:#eef1fb;border:1px solid rgba(212,175,55,.4);border-radius:20px;box-shadow:0 18px 60px rgba(0,0,0,.6);overflow:hidden}
.gaov .ovhead{display:flex;align-items:center;justify-content:space-between;padding:10px 10px 10px 18px;border-bottom:1px solid rgba(212,175,55,.25);font-weight:600;color:#f3d77a}
.gaov .ovx{width:42px;height:42px;border-radius:50%;border:1px solid rgba(243,215,122,.5);background:rgba(255,255,255,.08);color:#f3d77a;font-size:22px;line-height:1;cursor:pointer;display:flex;align-items:center;justify-content:center;padding:0}
.gaov .ovlist{overflow-y:auto;-webkit-overflow-scrolling:touch;overscroll-behavior:contain;padding:6px}
.gaov .ovbody{padding:14px 16px 16px;overflow-y:auto}
.gaov .note{font-size:.8rem;opacity:.8;margin:0 0 10px}
.gaov .rggrid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.gaov label{display:block;font-size:.78rem;opacity:.9}
.gaov select{width:100%;margin-top:4px;background:rgba(255,255,255,.08);color:inherit;border:1px solid rgba(212,175,55,.35);border-radius:12px;padding:10px 10px;font:inherit;font-size:.95rem}
.gaov select option{background:#111a3a;color:#fff}
.gaov .rgrep{display:flex;align-items:center;gap:8px;margin:12px 0 0;font-size:.85rem}
.gaov .rgbtns{display:flex;gap:10px;margin-top:14px}
.gaov .ovbtn{flex:1;border:1px solid rgba(243,215,122,.5);background:rgba(255,255,255,.08);color:inherit;border-radius:999px;padding:11px 14px;font:inherit;font-weight:600;font-size:.88rem;cursor:pointer}
.gaov .ovbtn.pri{background:linear-gradient(135deg,#f3d77a,#d4af37);color:#1a1405;border-color:transparent}
.gaov .bmauth{display:flex;align-items:center;gap:10px;padding:10px 16px;border-bottom:1px solid rgba(212,175,55,.2);font-size:.8rem}
.gaov .bmauth .who{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;opacity:.9}
.gaov .gbtn{display:inline-flex;align-items:center;gap:8px;background:#fff;color:#222;border:0;border-radius:99px;padding:8px 14px;font:inherit;font-weight:600;font-size:.82rem;cursor:pointer;white-space:nowrap}
.gaov .gbtn svg{width:16px;height:16px}
.gaov .lnk{background:none;border:0;color:#f3d77a;text-decoration:underline;cursor:pointer;font:inherit;font-size:.8rem;padding:0}
.gaov .bmtabs{display:flex;gap:8px;padding:10px 16px 4px}
.gaov .bmtab{display:inline-flex;align-items:center;gap:6px;border:1px solid rgba(243,215,122,.4);background:rgba(255,255,255,.06);color:inherit;border-radius:999px;padding:6px 12px;font:inherit;font-size:.8rem;cursor:pointer}
.gaov .bmtab svg{width:14px;height:14px}
.gaov .bmtab.on{background:linear-gradient(135deg,#f3d77a,#d4af37);color:#1a1405;border-color:transparent}
.gaov .bmrow{display:flex;align-items:center;gap:10px;padding:9px 8px 9px 10px;border-radius:12px;cursor:pointer}
.gaov .bmrow:hover{background:rgba(255,255,255,.07)}
.gaov .bmic{flex:none;width:24px;height:24px;display:flex;align-items:center;justify-content:center}
.gaov .bmic svg{width:20px;height:20px}
.gaov .bmic.a{color:#5fd3bc}.gaov .bmic.r{color:#f3d77a}
.gaov .bmtx{flex:1;min-width:0;font-size:.9rem;line-height:1.3}
.gaov .bmtx small{display:block;opacity:.75;font-size:.74rem}
.gaov .bmx{flex:none;width:30px;height:30px;border-radius:50%;border:0;background:rgba(255,255,255,.08);color:inherit;cursor:pointer;font-size:14px;line-height:1;padding:0}
.gaov .empty{padding:22px 14px;text-align:center;font-size:.85rem;opacity:.8}
.gaov.gq-light{background:rgba(20,50,45,.45)}
.gaov.gq-light .ovbox{background:#f6fbf8;color:#12332e;border-color:rgba(14,107,91,.4)}
.gaov.gq-light .ovhead{color:#0e6b5b;border-color:rgba(14,107,91,.25)}
.gaov.gq-light .ovx{color:#0e6b5b;border-color:rgba(14,107,91,.5);background:rgba(14,107,91,.08)}
.gaov.gq-light select{background:#fff;border-color:rgba(14,107,91,.35)}
.gaov.gq-light select option{background:#fff;color:#12332e}
.gaov.gq-light .ovbtn{border-color:rgba(14,107,91,.45);background:rgba(14,107,91,.07)}
.gaov.gq-light .ovbtn.pri{background:linear-gradient(135deg,#12806b,#0e6b5b);color:#fff}
.gaov.gq-light .bmauth{border-color:rgba(14,107,91,.2)}
.gaov.gq-light .gbtn{box-shadow:0 0 0 1px rgba(14,107,91,.3)}
.gaov.gq-light .lnk{color:#0e6b5b}
.gaov.gq-light .bmtab{border-color:rgba(14,107,91,.35);background:rgba(14,107,91,.06)}
.gaov.gq-light .bmtab.on{background:linear-gradient(135deg,#12806b,#0e6b5b);color:#fff}
.gaov.gq-light .bmrow:hover{background:rgba(14,107,91,.08)}
.gaov.gq-light .bmic.a{color:#0e6b5b}.gaov.gq-light .bmic.r{color:#a87b00}
.gaov.gq-light .bmx{background:rgba(14,107,91,.1)}
</style>
<div id="gaq" aria-label="Audio Quran player">
  <div class="gq-top">
    <h2>Audio Quran — Listen &amp; Read</h2>
    <p>Arabic recitation with English, Tamil &amp; Hindi voice</p>
  </div>

  <div class="gq-pick"><select id="gaq-sura" aria-label="Choose a sura"></select><button type="button" id="gaq-pickbtn" class="pickbtn" aria-haspopup="dialog"><span id="gaq-picktxt">Choose a sura</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></button></div>
  <div class="gq-sura">
    <div class="ar" id="gaq-name">…</div>
    <div class="meta" id="gaq-meta"></div>
  </div>

  <div class="gq-langs" id="gaq-langs">
    <button type="button" class="chip on" data-l="ar" aria-pressed="true"><span data-ic="spk"></span>العربية</button>
    <button type="button" class="chip on" data-l="en" aria-pressed="true"><span data-ic="spk"></span>English</button>
    <button type="button" class="chip" data-l="ta" aria-pressed="false"><span data-ic="spk"></span>தமிழ்</button>
    <button type="button" class="chip" data-l="hi" aria-pressed="false"><span data-ic="spk"></span>हिन्दी</button>
  </div>
  <p class="gq-hint">Tap a language to show it and hear it, one after another.</p>

  <div class="gq-player">
    <div class="bar" id="gaq-bar" title="Tap to jump"><i id="gaq-fill"></i></div>
    <div class="vrow"><button type="button" id="gaq-down" class="mini l" aria-label="Scroll down to other players"></button><button type="button" id="gaq-range" class="mini rg" aria-label="Play a range of verses" title="Play range"></button><div class="gq-vpos" id="gaq-vpos">Verse 0 of 0</div><button type="button" id="gaq-bmlist" class="mini b2" aria-label="My bookmarks" title="Bookmarks"></button><button type="button" id="gaq-star" class="mini b1" aria-label="Bookmark this verse" title="Bookmark this verse"></button><button type="button" id="gaq-theme" class="mini r" aria-label="Switch light or dark mode"></button></div>
    <div class="ctl">
      <button type="button" class="btn sm" id="gaq-psura" data-ic="psura" title="Previous sura" aria-label="Previous sura"></button>
      <button type="button" class="btn" id="gaq-prev" data-ic="prev" title="Previous verse" aria-label="Previous verse"></button>
      <button type="button" class="btn play" id="gaq-play" data-ic="play" title="Play / Pause" aria-label="Play or pause"></button>
      <button type="button" class="btn" id="gaq-next" data-ic="next" title="Next verse" aria-label="Next verse"></button>
      <button type="button" class="btn sm" id="gaq-nsura" data-ic="nsura" title="Next sura" aria-label="Next sura"></button>
    </div>
    <div class="status" id="gaq-status"></div>
    <details class="opt">
      <summary>⚙ Reciter, speed &amp; downloads</summary>
      <div class="opthead"><span>⚙ Reciter, speed &amp; downloads</span><button type="button" class="optx" id="gaq-optx" aria-label="Close settings" title="Close">✕</button></div>
      <div class="optgrid">
        <div class="wide">
          <label for="gaq-reciter">Arabic reciter</label>
          <select id="gaq-reciter">
            <option value="Alafasy">Mishary Alafasy — clear &amp; gentle (recommended)</option>
            <option value="AbdulBaset/Murattal">Abdul Basit — classic Murattal</option>
            <option value="Minshawi/Murattal">Al-Minshawi — slow &amp; reflective</option>
            <option value="Sudais">Abdurrahman As-Sudais — Imam of Makkah</option>
          </select>
        </div>
        <div class="wide">
          <label for="gaq-speed">Speed</label>
          <select id="gaq-speed"><option value="0.8">Slow</option><option value="1" selected>Normal</option><option value="1.2">Fast</option></select>
        </div>
        <div class="optrow">
          <button type="button" class="txtbtn" id="gaq-dl"><span data-ic="dl"></span>Download verse</button>
          <button type="button" class="txtbtn" id="gaq-dls"><span data-ic="dls"></span>Download sura</button>
          <div class="dlnote" id="gaq-dlnote"></div>
        </div>
      </div>
    </details>
  </div>

  <div class="verses" id="gaq-verses"></div>
</div>

<script>
window.GAQ_CONFIG = window.GAQ_CONFIG || {
  dataUrl: "/quran/quran-data.json",
  ttsEndpoint: "/tts/tts.php",
  audioBase: "https://verses.quran.com",
  suraAudioBase: "https://download.quranicaudio.com/qdc/mishari_al_afasy/murattal"
};
</script>
<script>
(function(){
"use strict";
var C=window.GAQ_CONFIG, $=function(id){return document.getElementById(id)};
var BCP={ar:"ar-SA",en:"en-US",ta:"ta-IN",hi:"hi-IN"};
var NAMES={ar:"Arabic",en:"English",ta:"Tamil",hi:"Hindi"};
var ORDER=["ar","en","ta","hi"];
var suras=[], cur=1, verses=[], idx=0, playing=false, token=0, steps=[], stepI=0;
var shown={ar:true,en:true,ta:false,hi:false};
var audio=new Audio(); audio.preload="auto";
var cache={};

/* ---------- icons ---------- */
var P={
  psura:"M6 6h2v12H6zM9.5 12L18 18V6z", prev:"M11 18V6l-8.5 6zm.5-6l8.5 6V6z", next:"M4 18l8.5-6L4 6zm9-12v12l8.5-6z",
  nsura:"M16 6h2v12h-2zM6 18l8.5-6L6 6z", play:"M8 5v14l11-7z", pause:"M6 5h4v14H6zM14 5h4v14h-4z",
  rep:"M7 7h10v3l4-4-4-4v3H5v6h2zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2zm-4-2V9h-1l-2 1v1h1.5v4z",
  dl:"M5 20h14v-2H5zM19 9h-4V3H9v6H5l7 7z", dls:"M4 6h10v2H4zm0 4h10v2H4zm0 4h6v2H4zm12-2v3h-3l4.5 4.5L22 15h-3v-3z",
  spk:"M3 9v6h4l5 5V4L7 9H3zm13.5 3A4.5 4.5 0 0 0 14 7.97v8.05c1.48-.73 2.5-2.25 2.5-4.02z"
};
function svg(k){ return '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="'+P[k]+'"/></svg>'; }
document.querySelectorAll("#gaq [data-ic]").forEach(function(e){ e.innerHTML=svg(e.getAttribute("data-ic")); });

/* ---------- remembered settings ---------- */
function ls(k,v){ try{ if(v===undefined) return localStorage.getItem(k); localStorage.setItem(k,v); }catch(e){} return null; }
(function(){
  var l=ls("gaq.langs"); if(l){ var a=l.split(","); if(a.some(function(x){return ORDER.indexOf(x)>-1})){ ORDER.forEach(function(k){ shown[k]=a.indexOf(k)>-1; }); } }
  var r=ls("gaq.rec"); if(r&&[].some.call($("gaq-reciter").options,function(o){return o.value===r})) $("gaq-reciter").value=r;
  var s=ls("gaq.spd"); if(s&&[].some.call($("gaq-speed").options,function(o){return o.value===s})) $("gaq-speed").value=s;
  document.querySelectorAll("#gaq-langs .chip").forEach(function(c){ var on=!!shown[c.dataset.l]; c.classList.toggle("on",on); c.setAttribute("aria-pressed",on); });
})();

function setStatus(t){$("gaq-status").textContent=t||""}

/* ---------- data ---------- */
function loadSuras(){
  return fetch("https://api.alquran.cloud/v1/surah").then(function(r){return r.json()}).then(function(j){
    var SUB=[["The Key (Al-Fatehah)",7],["The Heifer (Al-Baqarah)",286],["The Amramites (Ali-'Imran)",200],["Women (Al-Nesa')",176],["The Feast (Al-Ma'edah)",120],["Livestock (Al-An'am)",165],["The Purgatory (Al-A'araf)",206],["The Spoils of War (Al-Anfal)",75],["Ultimatum (Bara'ah)",127],["Jonah (Younus)",109],["Hood (Hud)",123],["Joseph (Yousuf)",111],["Thunder (Al-Ra`ad)",43],["Abraham (Ibrahim)",52],["Al-Hijr Valley (Al-Hijr)",99],["The Bee (Al-Nahl)",128],["The Children of Israel (Bani Israel)",111],["The Cave (Al-Kahf)",110],["Mary (Maryam)",98],["T.H. (Ta Ha)",135],["The Prophets (Al-Anbya')",112],["Pilgrimage (Al-Hajj)",78],["The Believers (Al-Mu'minun)",118],["Light (Al-Noor)",64],["The Statute Book (Al-Furqan)",77],["The Poets (Al-Shu`ara')",227],["The Ant (Al-Naml)",93],["History (Al-Qasas)",88],["The Spider (Al-'Ankaboot)",69],["The Romans (Al-Room)",60],["Luqmaan (Luqman)",34],["Prostration (Al-Sajdah)",30],["The Parties (Al-Ahzab)",73],["Sheba (Saba')",54],["Initiator (Faater)",45],["Y.S. (Ya Sin)",83],["The Arrangers (Al-Saffat)",182],["S. (Saad)",88],["The Throngs (Al-Zumar)",75],["Forgiver (Ghafer)",85],["Detailed (Fussilat)",54],["Consultation (Al-Shoora)",53],["Ornaments (Al-Zukhruf)",89],["Smoke (Al-Dukhan)",59],["Kneeling (Al-Jatheyah)",37],["The Dunes (Al-Ahqaf)",35],["Muhammad (Muhammad)",38],["Victory (Al-Fatt-h)",29],["The Walls (Al-Hujurat)",18],["Q. (Qaf)",45],["Drivers of the Winds (Al-Dhareyat)",60],["Mount Sinai (Al-Toor)",49],["The Stars (Al-Najm)",62],["The Moon (Al-Qamar)",55],["Most Gracious (Al-Rahmaan)",78],["The Inevitable (Al-Waaqe'ah)",96],["Iron (Al-Hadeed)",29],["The Debate (Al-Mujaadalah)",22],["Exodus (Al-Hashr)",24],["The Test (Al-Mumtahanah)",13],["The Column (Al-Suff)",14],["Friday (Al-Jumu`ah)",11],["The Hypocrites (Al-Munaafeqoon)",11],["Mutual Blaming (Al-Taghaabun)",18],["Divorce (Al-Talaaq)",12],["Prohibition (Al-Tahreem)",12],["Kingship (Al-Mulk)",30],["The Pen (Al-Qalam)",52],["Incontestable (Al-Haaqqah)",52],["The Heights (Al-Ma'aarej)",44],["Noah (Noah)",28],["Jinns (Al-Jinn)",28],["Cloaked (Al-Muzzammil)",20],["The Hidden Secret (Al-Muddath-thir)",56],["Resurrection (Al-Qeyaamah)",40],["The Human (Al-Insaan)",31],["Dispatched (Al-Mursalaat)",50],["The Event (Al-Naba')",40],["The Snatchers (Al-Naaze`aat)",46],["He Frowned (`Abasa)",42],["The Rolling (Al-Takweer)",29],["The Shattering (Al-Infitaar)",19],["The Cheaters (Al-Mutaffifeen)",36],["The Rupture (Al-Inshiqaaq)",25],["The Galaxies (Al-Burooj)",22],["The Bright Star (Al-Taareq)",17],["The Most High (Al-A`alaa)",19],["Overwhelming (Al-Ghaasheyah)",26],["Dawn (Al-Fajr)",30],["The Town (Al-Balad)",20],["The Sun (Al-Shams)",15],["The Night (Al-Layl)",21],["The Forenoon (Al-Duhaa)",11],["Cooling the Temper (Al-Sharrhh)",8],["The Fig (Al-Teen)",8],["The Embryo (Al-`Alaq)",19],["Destiny (Al-Qadr)",5],["Proof (Al-Bayyinah)",8],["The Quake (Al-Zalzalah)",8],["The Gallopers (Al-`Aadeyaat)",11],["The Shocker (Al-Qaare`ah)",11],["Hoarding (Al-Takaathur)",8],["The Afternoon (Al-`Asr)",3],["The Backbiter (Al-Humazah)",9],["The Elephant (Al-Feel)",5],["Quraish Tribe (Quraish)",4],["Charity (Al-Maa`oon)",7],["Bounty (Al-Kawthar)",3],["The Disbelievers (Al-Kaaferoon)",6],["Triumph (Al-Naasr)",3],["Thorns (Al-Masad)",5],["Absoluteness (Al-Ikhlaas)",4],["Daybreak (Al-Falaq)",5],["People (Al-Naas)",6]];
    suras=j.data; suras.forEach(function(s,i){ var t=SUB[i]; if(t){ s.englishName=t[0]; s.englishNameTranslation=""; s.numberOfAyahs=t[1]; } }); var sel=$("gaq-sura");
    sel.innerHTML=suras.map(function(s){return '<option value="'+s.number+'">'+s.number+'.  '+s.englishName+' — '+s.numberOfAyahs+' verses</option>'}).join("");
  });
}
/* quran-data.json = flat rows {Surah, Ayah, Arabic, English, Tamil, Hindi, *_Footnote}. Ayah 0 = Bismillah row of a sura. */
var ARABIC_FIX={
  "2:11":"وَإِذَا قِيلَ لَهُمْ لَا تُفْسِدُوا فِى ٱلْأَرْضِ قَالُوٓا إِنَّمَا نَحْنُ مُصْلِحُونَ",
  "26:160":"كَذَّبَتْ قَوْمُ لُوطٍ ٱلْمُرْسَلِينَ"
};
var DATA=null;
function loadData(){
  if(DATA) return Promise.resolve(DATA);
  return fetch(C.dataUrl).then(function(r){ if(!r.ok) throw new Error("HTTP "+r.status); return r.json(); }).then(function(rows){
    var by={}; rows.forEach(function(r){ (by[r.Surah]=by[r.Surah]||[]).push(r); });
    Object.keys(by).forEach(function(k){ by[k].sort(function(a,b){return a.Ayah-b.Ayah}); });
    DATA=by; return by;
  });
}
function loadSura(n){
  if(cache[n]) return Promise.resolve(cache[n]);
  setStatus("Loading…");
  return loadData().then(function(by){
    var max=suras[n-1].numberOfAyahs;
    var pad=function(x){return ("00"+x).slice(-3)};
    var out=(by[n]||[]).map(function(r){
      var a=+r.Ayah, g=a===0?(r.Arabic?"001001":""):(a<=max?pad(n)+pad(a):"");
      return {i:a,g:g,ar:r.Arabic||"",en:r.English||"",ta:r.Tamil||"",hi:r.Hindi||"",
              fn:{en:r.English_Footnote||"",ta:r.Tamil_Footnote||"",hi:r.Hindi_Footnote||""}};
    }).filter(function(v){ return v.ar||v.en||v.ta||v.hi; });
    cache[n]=out;
    out.forEach(function(v){ var fix=ARABIC_FIX[n+":"+v.i]; if(fix&&!v.ar) v.ar=fix; });
    out.forEach(function(v){
      if(v.ar||!v.i||!v.g) return;
      fetch("https://api.alquran.cloud/v1/ayah/"+n+":"+v.i+"/quran-uthmani").then(function(r){return r.json()}).then(function(j){
        if(j&&j.data&&j.data.text){ v.ar=j.data.text; if(verses.indexOf(v)!==-1){ render(); mark(false); } }
      }).catch(function(){});
    });
    return out;
  });
}
function esc(s){ return String(s).replace(/[&<>"]/g,function(c){return {"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"}[c]}); }

/* ---------- render ---------- */
function render(){
  var h="";
  verses.forEach(function(v,k){
    h+='<div class="v'+(k===idx?' cur':'')+'" data-k="'+k+'"><span class="vn">'+(v.i===0?(cur===9?"Note":"Bismillah"):cur+":"+v.i)+'</span>';
    if(shown.ar&&v.ar) h+='<div class="t t-ar" data-l="ar" lang="ar">'+esc(v.ar)+'</div>';
    ["en","ta","hi"].forEach(function(l){
      if(!shown[l]) return;
      if(v[l]){
        h+='<div class="t t-'+l+'" data-l="'+l+'" lang="'+l+'">'+esc(v[l])+'</div>';
        if(v.fn[l]) h+='<details class="fn" onclick="event.stopPropagation()"><summary>Footnote</summary><div class="t-'+l+'">'+esc(v.fn[l])+'</div></details>';
      } else if(l==="hi") h+='<div class="t-hi soon">Hindi translation coming soon, In sha Allah</div>';
    });
    h+='</div>';
  });
  $("gaq-verses").innerHTML=h;
}
function innerScroll(){ var o=getComputedStyle($("gaq-verses")).overflowY; return o==="auto"||o==="scroll"; }
function topEdge(){ var p=document.querySelector("#gaq .gq-player"); return p?Math.max(0,p.getBoundingClientRect().bottom):0; }
var stickyHdr=null, stickyLast=-1, userHold=0;
function setStickyTop(){
  if(!stickyHdr||!document.contains(stickyHdr)){ stickyHdr=null; [].forEach.call(document.querySelectorAll("header,.site-header,#masthead"),function(e){ var cs=getComputedStyle(e); if(!stickyHdr&&(cs.position==="fixed"||cs.position==="sticky")) stickyHdr=e; }); }
  var h=stickyHdr?Math.max(0,Math.round(stickyHdr.getBoundingClientRect().bottom)):0;
  if(h!==stickyLast){ stickyLast=h; $("gaq").style.setProperty("--gaq-top",h+"px"); }
}
function scrollToCur(){
  if(Date.now()<userHold) return;
  var box=$("gaq-verses"), el=box.children[idx]; if(!el) return;
  if(innerScroll()) box.scrollTo({top:Math.max(0,el.offsetTop-(box.clientHeight-el.offsetHeight)/2),behavior:"smooth"});
  else window.scrollBy({top:el.getBoundingClientRect().top-topEdge()-12,behavior:"smooth"});
}
/* ---------- word-by-word highlight (light: only the line being spoken is wrapped, one tiny rAF loop) ---------- */
var hl={box:null,text:"",els:[],b:[],starts:[],cur:-1,raf:0,mode:"audio",ar:false,armed:false,t0:0,est:1};
audio.addEventListener("playing",function(){ hl.armed=true; });
var WRE; try{ WRE=new RegExp("[^\\p{L}\\p{N}]","gu"); }catch(e){ WRE=/[\s.,;:!?"'()\[\]*\-]/g; }
/* Arabic: exact word timings (quran.com segments, same recordings as the verse files); falls back to letter-weighted estimate */
var RECID={"Alafasy":7,"AbdulBaset/Murattal":2,"Minshawi/Murattal":9,"Sudais":3}, segCache={}, segBusy={};
function ensureSegs(rec,s){
  var k=rec+":"+s; if(segCache[k]||segBusy[k]) return; segBusy[k]=1;
  fetch("https://api.quran.com/api/v4/chapter_recitations/"+rec+"/"+s+"?segments=true").then(function(r){return r.json()}).then(function(j){
    var m={}; ((j.audio_file&&j.audio_file.timestamps)||[]).forEach(function(t){ m[t.verse_key]=t; }); segCache[k]=m;
  }).catch(function(){ delete segBusy[k]; });
}
function prefetchSegs(){ var rec=RECID[$("gaq-reciter").value]; if(!rec) return; ensureSegs(rec,cur); ensureSegs(rec,1); }
function segApply(n){
  var v=hl.v; if(!v) return; var s=v.i===0?1:cur, vk=s+":"+(v.i===0?1:v.i), rec=RECID[$("gaq-reciter").value]; if(!rec) return;
  ensureSegs(rec,s); var m=segCache[rec+":"+s], t=m&&m[vk]; if(!t||!t.segments||t.segments.length!==n) return;
  var sg=t.segments, S0=sg[0][1], E=sg[n-1][2]-S0; if(!(E>0)) return;
  var b=[]; for(var i=0;i<n;i++) b.push(i<n-1?Math.min(1,Math.max(0,(sg[i+1][1]-S0)/E)):1);
  hl.b=b; hl.segOK=true;
}
function hlBounds(words){
  var w=words.map(function(x){ var n=x.replace(WRE,"").length, p=/[.!?۔।]$/.test(x)?4:(/[,;:،؛]$/.test(x)?2.5:0); return Math.max(n,.6)+p; });
  var tot=w.reduce(function(a,b){return a+b},0), c=0;
  return w.map(function(x){ c+=x; return c/tot; });
}
function hlClear(){ cancelAnimationFrame(hl.raf); if(hl.box){ hl.box.textContent=hl.text; hl.box=null; } hl.els=[]; hl.cur=-1; }
function hlPrep(lang,text,mode){
  hlClear(); hl.mode=mode; hl.ar=(lang==="ar"); hl.armed=false;
  var el=$("gaq-verses").children[idx]; if(!el) return;
  var box=el.querySelector('.t[data-l="'+lang+'"]'); if(!box) return;
  var words=[], starts=[], html="", pos=0;
  String(text).split(/(\s+)/).forEach(function(p){ if(!p) return; if(/^\s+$/.test(p)) html+=p; else { words.push(p); starts.push(pos); html+='<span class="w">'+esc(p)+'</span>'; } pos+=p.length; });
  box.innerHTML=html; hl.box=box; hl.text=String(text); hl.els=[].slice.call(box.querySelectorAll(".w")); hl.b=hlBounds(words); hl.starts=starts; hl.v=verses[idx]; hl.segOK=false; hl.n=0; if(lang==="ar") segApply(words.length);
}
function setIdx(i){
  if(i===hl.cur||!hl.els[i]) return;
  if(hl.cur>=0&&hl.els[hl.cur]) hl.els[hl.cur].classList.remove("on");
  hl.els[i].classList.add("on"); hl.cur=i;
  if(Date.now()>=userHold){ var r=hl.els[i].getBoundingClientRect(); if(innerScroll()){ var bx=$("gaq-verses"), br=bx.getBoundingClientRect(); if(r.bottom>br.bottom-24||r.top<br.top+8) bx.scrollBy({top:r.top-br.top-br.height/3,behavior:"smooth"}); } else { var te=topEdge(); if(r.bottom>innerHeight-110||r.top<te+8) window.scrollBy({top:r.top-te-(innerHeight-te)*0.3,behavior:"smooth"}); } }
}
function hlRun(t){
  cancelAnimationFrame(hl.raf);
  (function tick(){
    if(t!==token||!hl.els.length) return;
    if(hl.ar&&!hl.segOK&&(hl.n=(hl.n||0)+1)%20===0) segApply(hl.b.length);
    if(hl.armed&&hl.mode!=="boundary"){
      var f=0;
      if(hl.mode==="audio"){ var d=audio.duration; if(d>0&&isFinite(d)){ var lead=.05, tail=hl.ar?.08:.05; f=(audio.currentTime-lead+(hl.ar?(hl.segOK?.05:.1):0))/Math.max(.3,d-lead-tail); } }
      else f=(performance.now()-hl.t0)/(hl.est*1000);
      var i=Math.max(0,hl.cur); while(i>0&&f<=hl.b[i-1]) i--; while(i<hl.b.length-1&&f>hl.b[i]) i++;
      setIdx(i);
    }
    hl.raf=requestAnimationFrame(tick);
  })();
}
function sayLang(l){
  hlClear();
  document.querySelectorAll("#gaq-verses .say").forEach(function(e){e.classList.remove("say")});
  if(!l) return;
  var el=$("gaq-verses").children[idx]; if(!el) return;
  var t=el.querySelector('.t[data-l="'+l+'"]'); if(t) t.classList.add("say");
}
function mark(scroll){
  var els=$("gaq-verses").children;
  for(var k=0;k<els.length;k++) els[k].classList.toggle("cur",k===idx);
  if(scroll) scrollToCur();
  var cv=verses[idx]; $("gaq-vpos").textContent=!verses.length?"Verse 0 of 0":(cv.i===0?(cur===9?"Introduction":"Bismillah"):"Verse "+cv.i+" of "+suras[cur-1].numberOfAyahs);
  $("gaq-fill").style.width=(verses.length?((idx+1)/verses.length*100):0)+"%";
}
function setHead(){
  var s=suras[cur-1]; if(!s) return; if(window.__gqPL) window.__gqPL();
  $("gaq-name").textContent=s.name;
  $("gaq-meta").textContent=s.number+" · "+s.englishName+" · "+s.numberOfAyahs+" verses · "+s.revelationType;
}
function openSura(n,autoplay){
  stop(); cur=n; idx=0; prefetchSegs(); $("gaq-sura").value=n; setHead(); setStatus("Loading…");
  return loadSura(n).then(function(v){ verses=v; render(); mark(false); $("gaq-verses").scrollTop=0; setStatus(""); if(autoplay) play(); })
    .catch(function(){setStatus("Could not load the sura. Please check your connection.")});
}

/* ---------- playback: Arabic recitation, then a voice for every other selected language ---------- */
function recUrl(g){return C.audioBase+"/"+$("gaq-reciter").value+"/mp3/"+g+".mp3"}
function suraUrl(n){return C.suraAudioBase+"/"+n+".mp3"}
function buildSteps(){ steps=ORDER.filter(function(l){return shown[l]}); }
function setPlayIcon(){ $("gaq-play").innerHTML=svg(playing?"pause":"play"); }
function stop(){ token++; playing=false; try{audio.pause()}catch(e){} if(window.speechSynthesis) speechSynthesis.cancel(); sayLang(null); setPlayIcon(); }
function play(){ if(!verses.length) return; playing=true; setPlayIcon(); buildSteps(); stepI=0; runStep(++token); }
function pause(){ playing=false; token++; audio.pause(); if(window.speechSynthesis) speechSynthesis.cancel(); setPlayIcon(); setStatus("Paused"); }
function prefetch(i){
  var v=verses[i]; if(!v||!C.ttsEndpoint) return;
  steps.forEach(function(l){ if(l!=="ar"&&v[l]) ttsUrl(l,v[l]); });
}
function afterStep(t){
  if(t!==token||!playing) return;
  stepI++;
  if(stepI<steps.length){ runStep(t); return; }
  if(idx<verses.length-1){ idx++; stepI=0; mark(true); runStep(t); }
  else if(cur<114){ nextSuraAuto(); }
  else { playing=false; setPlayIcon(); sayLang(null); setStatus(""); }
}
/* the next sura is loaded while the last verses play, so reading carries on without a gap (and without needing a new tap) */
function nextSuraAuto(){
  var n=cur+1, c=cache[n];
  if(!c){ openSura(n,true); return; }
  cur=n; idx=0; verses=c; $("gaq-sura").value=n; setHead(); prefetchSegs(); render(); mark(false); $("gaq-verses").scrollTop=0; setStatus(""); play();
}
function runStep(t){
  var lang=steps[stepI], v=verses[idx]; if(!v) return;
  mark(stepI===0);
  if(stepI===0){ prefetch(idx); prefetch(idx+1); if(idx>=verses.length-2&&cur<114&&!cache[cur+1]) loadSura(cur+1).then(function(){ if(playing&&t===token) setStatus(""); }).catch(function(){}); }
  var rate=parseFloat($("gaq-speed").value)||1;
  if(lang==="ar"){
    if(!v.g||!v.ar){ afterStep(t); return; }
    sayLang("ar"); setStatus("Reciting in Arabic…");
    hlPrep("ar",v.ar,"audio"); hlRun(t);
    audio.src=recUrl(v.g); audio.playbackRate=rate;
    audio.onended=function(){afterStep(t)};
    audio.onerror=function(){ if(t===token){ setStatus("Recitation could not be loaded."); playing=false; setPlayIcon(); } };
    audio.play().catch(function(){});
  } else {
    if(!v[lang]){ afterStep(t); return; }
    sayLang(lang); speakTr(lang,v[lang],rate,t);
  }
}
var ttsMem={};
function cleanTr(t){ return String(t||"").replace(/<[^>]*>/g," ").replace(/\[\d+\]/g," ").replace(/\*/g,"").replace(/\s+/g," ").trim(); }
function ttsUrl(lang,text){
  var clean=cleanTr(text), key=lang+"|"+clean;
  if(ttsMem[key]) return ttsMem[key];
  var p=fetch(C.ttsEndpoint,{method:"POST",headers:{"Content-Type":"application/json"},credentials:"same-origin",
      body:JSON.stringify({text:clean,lang:lang,rate:0.9})})
    .then(function(r){ if(!r.ok) throw new Error("HTTP "+r.status); return r.blob(); })
    .then(function(b){ if(!b.size) throw new Error("empty"); return URL.createObjectURL(b); })
    .catch(function(){ delete ttsMem[key]; return null; });
  ttsMem[key]=p; return p;
}
function speakTr(lang,text,rate,t){
  setStatus("Reading in "+NAMES[lang]+"…");
  if(!C.ttsEndpoint){ browserTTS(lang,text,rate,t); return; }
  ttsUrl(lang,text).then(function(u){
    if(t!==token) return;
    if(!u){ browserTTS(lang,text,rate,t); return; }
    hlPrep(lang,text,"audio"); hlRun(t);
    audio.src=u; audio.playbackRate=rate;
    audio.onended=function(){afterStep(t)};
    audio.onerror=function(){ if(t===token) browserTTS(lang,text,rate,t); };
    audio.play().catch(function(){});
  });
}
function browserTTS(lang,text,rate,t){
  if(!window.speechSynthesis){ setStatus("Voice is not supported in this browser."); afterStep(t); return; }
  speechSynthesis.cancel();
  var u=new SpeechSynthesisUtterance(cleanTr(text)); u.lang=BCP[lang]; u.rate=rate*0.95;
  var vs=speechSynthesis.getVoices().filter(function(x){return x.lang.toLowerCase().indexOf(lang)===0});
  if(vs.length) u.voice=vs[0]; else setStatus("No "+NAMES[lang]+" voice on this device.");
  hlPrep(lang,text,"speech"); hl.est=Math.max(1,String(text).length*0.075/rate);
  u.addEventListener("start",function(){ hl.armed=true; hl.t0=performance.now(); });
  u.addEventListener("boundary",function(e){ if(e.name&&e.name!=="word") return; hl.mode="boundary"; var cl=cleanTr(text), p=Math.round(e.charIndex*String(text).length/Math.max(1,cl.length)), i=0; while(i<hl.starts.length-1&&hl.starts[i+1]<=p) i++; setIdx(i); });
  hlRun(t);
  u.onend=function(){afterStep(t)}; u.onerror=function(){afterStep(t)};
  speechSynthesis.speak(u);
}
function goto(k){ if(k<0||k>=verses.length) return; userHold=0; var was=playing; stop(); idx=k; mark(true); if(was) play(); }

/* ---------- download ---------- */
function save(url,name){
  setStatus("Preparing download…");
  fetch(url).then(function(r){return r.blob()}).then(function(b){
    var a=document.createElement("a"); a.href=URL.createObjectURL(b); a.download=name; document.body.appendChild(a); a.click(); a.remove(); setStatus("Downloaded ✔");
  }).catch(function(){ window.open(url,"_blank"); setStatus(""); });
}

/* ---------- events ---------- */
document.querySelectorAll("#gaq-langs .chip").forEach(function(c){
  c.onclick=function(){
    var l=c.dataset.l, on=!shown[l], count=ORDER.filter(function(k){return shown[k]}).length;
    if(!on&&count===1) return;                       /* keep at least one language */
    shown[l]=on; c.classList.toggle("on",on); c.setAttribute("aria-pressed",on);
    ls("gaq.langs",ORDER.filter(function(k){return shown[k]}).join(","));
    updateDlNote();
    var was=playing; stop(); render(); mark(false); if(was) play();
  };
});
$("gaq-sura").onchange=function(){ var was=playing; openSura(+this.value,was); };
$("gaq-play").onclick=function(){ userHold=0; playing?pause():play() };
$("gaq-next").onclick=function(){ goto(idx+1) };
$("gaq-prev").onclick=function(){ goto(idx-1) };
$("gaq-nsura").onclick=function(){ if(cur<114) openSura(cur+1,playing) };
$("gaq-psura").onclick=function(){ if(cur>1) openSura(cur-1,playing) };
$("gaq-optx").onclick=function(){ document.querySelector("#gaq details.opt").open=false; };
$("gaq-reciter").onchange=function(){ ls("gaq.rec",this.value); prefetchSegs(); if(playing){stop();play();} };
$("gaq-speed").onchange=function(){ ls("gaq.spd",this.value); audio.playbackRate=parseFloat(this.value)||1 };
$("gaq-verses").onclick=function(e){ var el=e.target.closest(".v"); if(!el) return; userHold=0; stop(); idx=+el.dataset.k; mark(false); play(); };
var dlBusy=false, dlStop=false;
function wait(ms){ return new Promise(function(r){setTimeout(r,ms)}); }
function langLabel(){ return ORDER.filter(function(k){return shown[k]}).map(function(k){return NAMES[k]}).join(" + "); }
function tag(){ return ORDER.filter(function(k){return shown[k]}).join("-"); }
function updateDlNote(){ var n=$("gaq-dlnote"); if(n) n.textContent="Downloads include: "+langLabel(); }
function getBlob(url,opt,tries){
  return fetch(url,opt).then(function(r){
    if((r.status===429||r.status>=500)&&tries>0){ setStatus("Server is busy, waiting a moment…"); return wait(10000).then(function(){ return getBlob(url,opt,tries-1); }); }
    if(!r.ok) throw new Error("HTTP "+r.status);
    return r.blob();
  });
}
function trBlob(lang,text){
  return getBlob(C.ttsEndpoint,{method:"POST",headers:{"Content-Type":"application/json"},credentials:"same-origin",body:JSON.stringify({text:cleanTr(text),lang:lang,rate:0.9})},5);
}
/* one verse = Arabic recitation + a voice for each other selected language */
function verseBlobs(v){
  var jobs=[];
  ORDER.forEach(function(l){
    if(!shown[l]) return;
    if(l==="ar"){ if(v.g&&v.ar) jobs.push(function(){return getBlob(recUrl(v.g),undefined,2)}); }
    else if(v[l]) jobs.push(function(){return trBlob(l,v[l])});
  });
  var out=[];
  return jobs.reduce(function(p,j){ return p.then(function(){ if(dlStop) throw new Error("stopped"); return j().then(function(b){out.push(b)}); }); },Promise.resolve()).then(function(){return out});
}
/* Every piece is decoded and written again into ONE clean MP3 (plain file-gluing left the voices silent in many players) */
var lameP=null;
function loadLame(){
  if(window.lamejs) return Promise.resolve();
  if(lameP) return lameP;
  lameP=new Promise(function(res,rej){
    var s=document.createElement("script"); s.src="https://cdnjs.cloudflare.com/ajax/libs/lamejs/1.2.1/lame.min.js";
    s.onload=res; s.onerror=function(){ lameP=null; rej(new Error("lame")); }; document.head.appendChild(s);
  });
  return lameP;
}
function newJoiner(){
  var AC=window.AudioContext||window.webkitAudioContext; if(!AC||!window.lamejs) return null;
  var ctx=new AC(), sr=ctx.sampleRate, enc=new lamejs.Mp3Encoder(1,sr,64), chunks=[];
  function push(f){
    var n=f.length, q=new Int16Array(n), i, x;
    for(i=0;i<n;i++){ x=f[i]; x=x>1?1:(x<-1?-1:x); q[i]=x<0?x*32768:x*32767; }
    for(i=0;i<n;i+=9216){ var o=enc.encodeBuffer(q.subarray(i,Math.min(n,i+9216))); if(o.length) chunks.push(new Uint8Array(o)); }
  }
  return {
    add:function(blob){
      return new Response(blob).arrayBuffer().then(function(ab){ return new Promise(function(res,rej){ var p=ctx.decodeAudioData(ab,res,rej); if(p&&p.catch) p.catch(rej); }); }).then(function(buf){
        var n=buf.length, ch=buf.numberOfChannels, m=new Float32Array(n), c, i, d;
        for(c=0;c<ch;c++){ d=buf.getChannelData(c); for(i=0;i<n;i++) m[i]+=d[i]/ch; }
        push(m);
      });
    },
    gap:function(sec){ push(new Float32Array(Math.round(sr*sec))); },
    finish:function(){ var o=enc.flush(); if(o.length) chunks.push(new Uint8Array(o)); try{ctx.close()}catch(e){} return new Blob(chunks,{type:"audio/mpeg"}); }
  };
}
function addVerse(j,v){
  return verseBlobs(v).then(function(parts){
    if(!parts.length) throw new Error("none");
    return parts.reduce(function(p,b,i){ return p.then(function(){ if(dlStop) throw new Error("stopped"); return j.add(b).then(function(){ j.gap(i<parts.length-1?.35:.6); }); }); },Promise.resolve());
  });
}
var GA_LOGO="/wp-content/themes/godalone-premium/images/ga-cover-logo.jpg";
function rawSave(blob,name){var a=document.createElement("a");a.href=URL.createObjectURL(blob);a.download=name;document.body.appendChild(a);a.click();a.remove();setTimeout(function(){URL.revokeObjectURL(a.href)},60000)}
function gaImg(src){return new Promise(function(res,rej){var im=new Image();im.onload=function(){res(im)};im.onerror=rej;im.src=src})}
function gaFit(c,t,max,size,wt,fam){var s=size;do{c.font=wt+" "+s+"px "+fam;s--}while(c.measureText(t).width>max&&s>12)}
function gaCover(title,sub){var W=500,cv=document.createElement("canvas");cv.width=cv.height=W;var c=cv.getContext("2d"),FAM="Poppins,Arial,sans-serif";
 var g=c.createLinearGradient(0,0,W,W);g.addColorStop(0,"#0e6b5b");g.addColorStop(.55,"#0a4a52");g.addColorStop(1,"#0f3a5c");c.fillStyle=g;c.fillRect(0,0,W,W);
 var rg=c.createRadialGradient(250,142,10,250,142,270);rg.addColorStop(0,"rgba(255,214,120,.55)");rg.addColorStop(1,"rgba(255,214,120,0)");c.fillStyle=rg;c.fillRect(0,0,W,W);
 c.fillStyle="#FF9933";c.fillRect(0,0,W,8);c.fillStyle="#ffffff";c.fillRect(0,8,W,6);c.fillStyle="#138808";c.fillRect(0,14,W,8);
 var fl=(document.fonts&&document.fonts.load)?Promise.all([document.fonts.load("600 30px Poppins"),document.fonts.load("400 18px Poppins")]).catch(function(){}):Promise.resolve();
 return fl.then(function(){return gaImg(GA_LOGO)}).then(function(im){c.save();c.shadowColor="rgba(0,0,0,.45)";c.shadowBlur=18;c.beginPath();c.arc(250,142,118,0,7);c.fillStyle="#fff";c.fill();c.restore();c.save();c.beginPath();c.arc(250,142,114,0,7);c.clip();c.drawImage(im,134,26,232,232);c.restore();c.lineWidth=3;c.strokeStyle="#f3d77a";c.beginPath();c.arc(250,142,118,0,7);c.stroke()},function(){}).then(function(){
  c.textAlign="center";c.textBaseline="alphabetic";
  c.fillStyle="#f3d77a";gaFit(c,title,440,30,"600",FAM);c.fillText(title,250,306);
  c.fillStyle="#c4eadf";gaFit(c,sub,440,17,"400",FAM);c.fillText(sub,250,336);
  c.fillStyle="rgba(243,215,122,.55)";c.fillRect(150,350,200,2);
  c.fillStyle="#ffffff";gaFit(c,"GodAlone.in",440,33,"600",FAM);c.fillText("GodAlone.in",250,392);
  c.fillStyle="#d6f2ea";gaFit(c,"KadavulMattum.org   \u2022   Ekkhuda.org",440,19,"400",FAM);c.fillText("KadavulMattum.org   \u2022   Ekkhuda.org",250,428);
  c.fillStyle="#9fd6c8";gaFit(c,"Happiness is Submission to GOD alone",440,14,"400",FAM);c.fillText("Happiness is Submission to GOD alone",250,462);
  return new Promise(function(res){cv.toBlob(res,"image/jpeg",.84)})})}
function gaCat(a){var n=0,i;for(i=0;i<a.length;i++)n+=a[i].length;var o=new Uint8Array(n),p=0;for(i=0;i<a.length;i++){o.set(a[i],p);p+=a[i].length}return o}
function gaU16(s){var b=[255,254],i,ch;for(i=0;i<s.length;i++){ch=s.charCodeAt(i);b.push(ch&255,ch>>8)}return b}
function gaFr(id,body){var h=new Uint8Array(10),n=body.length,i;for(i=0;i<4;i++)h[i]=id.charCodeAt(i);h[4]=(n>>>24)&255;h[5]=(n>>>16)&255;h[6]=(n>>>8)&255;h[7]=n&255;return gaCat([h,body])}
function gaTx(id,t){return gaFr(id,new Uint8Array([1].concat(gaU16(t))))}
function gaTag(blob,name){var m=/^(?:quran|sura)_(\d+)(?:_(\d+))?/.exec(name);return new Response(blob).arrayBuffer().then(function(ab){var b=new Uint8Array(ab);
 if(b[0]===73&&b[1]===68&&b[2]===51){var sz=((b[6]&127)<<21)|((b[7]&127)<<14)|((b[8]&127)<<7)|(b[9]&127);b=b.subarray(10+sz+((b[5]&16)?10:0))}
 var N=m?+m[1]:cur,s=suras[N-1],en=(s&&s.englishName)||("Sura "+N),isV=!!(m&&/^quran_/.test(name)&&m[2]!==undefined),vn=isV?+m[2]:0;
 var title=N+". "+en+(isV&&vn>0?" \u2014 Verse "+vn:""),sub="Sura "+N+(isV&&vn>0?" \u00b7 Verse "+vn:"")+" \u00b7 "+langLabel();
 return gaCover(title,sub).then(function(jb){return new Response(jb).arrayBuffer()}).then(function(jab){
  var jp=new Uint8Array(jab),mime=[105,109,97,103,101,47,106,112,101,103],ap=gaCat([new Uint8Array([0].concat(mime,[0,3,0])),jp]);
  var fr=gaCat([gaTx("TIT2",title),gaTx("TPE1","GodAlone.in"),gaTx("TPE2","GodAlone.in"),gaTx("TALB","Holy Quran \u2014 GodAlone.in"),gaTx("TCOP","GodAlone.in \u00b7 KadavulMattum.org \u00b7 Ekkhuda.org"),gaFr("APIC",ap)]);
  var n=fr.length,hd=new Uint8Array([73,68,51,3,0,0,(n>>21)&127,(n>>14)&127,(n>>7)&127,n&127]);
  return new Blob([hd,fr,b],{type:"audio/mpeg"})})})}
function saveBlob(blob,name){if(!/\.mp3$/i.test(name)){rawSave(blob,name);return}gaTag(blob,name).then(function(nb){rawSave(nb,name)},function(){rawSave(blob,name)})}
var DL_FAIL="Download could not be prepared. Please try again (Chrome works best).";
$("gaq-dl").onclick=function(){
  var v=verses[idx]; if(!v||dlBusy) return;
  dlBusy=true; dlStop=false; setStatus("Preparing verse audio ("+langLabel()+")…");
  var onlyAr=(tag()==="ar");
  (onlyAr?verseBlobs(v).then(function(p){ if(!p.length) throw new Error("none"); return p[0]; })
         :loadLame().then(function(){ var j=newJoiner(); if(!j) throw new Error("nojoin"); return addVerse(j,v).then(function(){ return j.finish(); }); })
  ).then(function(blob){
    saveBlob(blob,"quran_"+cur+"_"+v.i+"_"+tag()+".mp3"); setStatus("Downloaded ✔");
  }).catch(function(){ setStatus(DL_FAIL); }).then(function(){dlBusy=false});
};
$("gaq-dls").onclick=function(){
  var btn=this;
  if(dlBusy){ dlStop=true; setStatus("Stopping…"); return; }
  var name="sura_"+cur+"_"+suras[cur-1].englishName.replace(/\W+/g,"_");
  if(tag()==="ar"||!C.ttsEndpoint){ save(suraUrl(cur),name+".mp3"); return; }   /* Arabic only: ready-made full-sura file */
  var nTr=ORDER.filter(function(k){return shown[k]&&k!=="ar"}).length*verses.length;
  if(nTr>60&&!confirm("This sura has "+verses.length+" verses. Preparing "+langLabel()+" audio takes about "+Math.ceil(nTr/35)+" minutes. Please keep this page open. Continue?")) return;
  dlBusy=true; dlStop=false; btn.lastChild.textContent="Cancel download"; setStatus("Getting ready…");
  var k=0, j=null, total=verses.length;
  function finish(err){
    btn.lastChild.textContent="Download sura"; dlBusy=false;
    if(err||dlStop){ dlStop=false; setStatus(err?DL_FAIL:"Download cancelled."); return; }
    saveBlob(j.finish(),name+"_"+tag()+".mp3"); setStatus("Downloaded ✔");
  }
  loadLame().then(function(){
    j=newJoiner(); if(!j) throw new Error("nojoin");
    (function next(){
      if(dlStop||k>=total) return finish();
      setStatus("Preparing sura audio… verse "+(k+1)+" of "+total+" ("+Math.round(k/total*100)+"%)");
      addVerse(j,verses[k]).then(function(){ k++; next(); }).catch(function(e){ if(e&&e.message==="none"){ k++; next(); } else finish(!dlStop); });
    })();
  }).catch(function(){ finish(true); });
};
(function(){
var ICO={sun:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>',
 moon:'<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21 14.5A9 9 0 1 1 9.5 3a7 7 0 0 0 11.5 11.5z"/></svg>',
 down:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8l6 6 6-6M6 14l6 6 6-6"/></svg>'};
var root=$("gaq"), tb=$("gaq-theme"), ov=null;
$("gaq-down").innerHTML=ICO.down;
function applyTheme(t){ var l=(t==="light"); root.classList.toggle("gq-light",l); if(ov) ov.classList.toggle("gq-light",l); tb.innerHTML=l?ICO.moon:ICO.sun; tb.setAttribute("aria-label",l?"Switch to dark mode":"Switch to light mode"); tb.title=l?"Dark mode":"Light mode"; }
var th="dark"; try{ th=ls("gaq.theme")||"dark"; }catch(e){}
applyTheme(th);
tb.onclick=function(){ th=(th==="light")?"dark":"light"; applyTheme(th); try{ ls("gaq.theme",th); }catch(e){} };
function hold(){ userHold=Date.now()+10000; }
document.addEventListener("touchmove",hold,{passive:true}); document.addEventListener("wheel",hold,{passive:true});
$("gaq-down").onclick=function(){ userHold=Date.now()+15000; var r=root.getBoundingClientRect(); window.scrollTo({top:window.pageYOffset+r.bottom-(stickyLast>0?stickyLast:0)-8,behavior:"smooth"}); };
function pickLabel(){ var s=$("gaq-sura"), o=s.options[s.selectedIndex]; $("gaq-picktxt").textContent=o?o.text:"Choose a sura"; }
window.__gqPL=pickLabel; pickLabel();
function closePick(){ if(!ov) return; ov.classList.remove("on"); document.documentElement.classList.remove("gaq-lock"); }
function openPick(){
 if(!ov){ ov=document.createElement("div"); ov.id="gaq-ov"; ov.setAttribute("role","dialog"); ov.setAttribute("aria-label","Choose a sura");
  ov.innerHTML='<div class="ovbox"><div class="ovhead"><span>Choose a sura</span><button type="button" class="ovx" aria-label="Close">\u2715</button></div><div class="ovlist"></div></div>';
  document.body.appendChild(ov); ov.classList.toggle("gq-light",th==="light");
  ov.addEventListener("click",function(e){ if(e.target===ov||e.target.closest(".ovx")) closePick(); });
  document.addEventListener("keydown",function(e){ if(e.key==="Escape") closePick(); }); }
 var s=$("gaq-sura"), L=ov.querySelector(".ovlist"), h="";
 for(var i=0;i<s.options.length;i++){ var o=s.options[i]; h+='<button type="button" class="ovrow'+(i===s.selectedIndex?" on":"")+'" data-i="'+i+'"></button>'; }
 L.innerHTML=h; var rows=L.children; for(var j=0;j<rows.length;j++) rows[j].textContent=s.options[j].text;
 L.onclick=function(e){ var b=e.target.closest(".ovrow"); if(!b) return; s.selectedIndex=+b.getAttribute("data-i"); closePick(); s.dispatchEvent(new Event("change")); };
 ov.classList.add("on"); document.documentElement.classList.add("gaq-lock");
 var cr=L.children[s.selectedIndex]; if(cr) L.scrollTop=Math.max(0,cr.offsetTop-L.clientHeight/2+20);
}
$("gaq-pickbtn").onclick=openPick;
})();
(function(){
var SV={
 star:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"><path d="M12 3.5l2.6 5.4 5.9.8-4.3 4.1 1 5.9L12 17l-5.2 2.7 1-5.9L3.5 9.7l5.9-.8z"/></svg>',
 starOn:'<svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"><path d="M12 3.5l2.6 5.4 5.9.8-4.3 4.1 1 5.9L12 17l-5.2 2.7 1-5.9L3.5 9.7l5.9-.8z"/></svg>',
 list:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4h12v17l-6-4-6 4z"/></svg>',
 range:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M8 5H5v14h3M16 5h3v14h-3M9 12h6"/></svg>',
 aud:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15v-3a8 8 0 0 1 16 0v3"/><rect x="3" y="14" width="4" height="6" rx="1.5"/><rect x="17" y="14" width="4" height="6" rx="1.5"/></svg>',
 rd:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5.5C5 4.5 8.5 4.5 12 6.5c3.5-2 7-2 9-1v13c-2-1-5.5-1-9 1-3.5-2-7-2-9-1z"/><path d="M12 6.5v13"/></svg>',
 g:'<svg viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9 3.6l6.7-6.7C35.6 2.6 30.1 0 24 0 14.6 0 6.4 5.4 2.5 13.3l7.8 6.1C12.2 13.2 17.6 9.5 24 9.5z"/><path fill="#4285F4" d="M46.1 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.4c-.5 2.9-2.1 5.3-4.6 7l7.1 5.5c4.2-3.9 6.6-9.6 6.6-16.5z"/><path fill="#FBBC05" d="M10.3 28.6c-.5-1.4-.7-2.9-.7-4.6s.3-3.2.7-4.6l-7.8-6.1C.9 16.5 0 20.1 0 24s.9 7.5 2.5 10.7l7.8-6.1z"/><path fill="#34A853" d="M24 48c6.1 0 11.3-2 15-5.5l-7.1-5.5c-2 1.3-4.6 2.1-7.9 2.1-6.4 0-11.8-3.7-13.7-9.1l-7.8 6.1C6.4 42.6 14.6 48 24 48z"/></svg>'};
var root=$("gaq"), bStar=$("gaq-star"), bList=$("gaq-bmlist"), bRg=$("gaq-range");
bList.innerHTML=SV.list; bRg.innerHTML=SV.range+'<span class="d">Range to play</span><span class="m">Range</span>';
function jget(k){var a=[];try{a=JSON.parse(ls(k)||"[]")}catch(e){}return Array.isArray(a)?a.filter(function(x){return typeof x==="string"&&/^\d+:\d+$/.test(x)}):[]}
function uniq(a){var o=[],s={};a.forEach(function(x){if(!s[x]){s[x]=1;o.push(x)}});return o.sort(function(p,q){var a=p.split(":"),b=q.split(":");return a[0]-b[0]||a[1]-b[1]})}
var bmA=uniq(jget("gaq.abm")), cloudR=[], user=null, fbP=null, fbOK=false, filt="all";
function readLocal(){return jget("quranBookmarks")}
function allR(){return uniq(readLocal().concat(cloudR))}
function flash(m){setStatus(m);setTimeout(function(){if($("gaq-status").textContent===m)setStatus("")},3200)}
var FB={apiKey:"AIzaSyAIvmDEiHvbxsyqIqvPnGg08aik1ra4yIw",authDomain:"bayyinah-c110a.firebaseapp.com",projectId:"bayyinah-c110a",storageBucket:"bayyinah-c110a.firebasestorage.app",messagingSenderId:"831184810834",appId:"1:831184810834:web:b134bfb3ef6014e9ebc08b"};
function ldS(src){return new Promise(function(res,rej){var s=document.createElement("script");s.src=src;s.onload=res;s.onerror=rej;document.head.appendChild(s)})}
function fbInit(){ if(fbP) return fbP; var B="https://www.gstatic.com/firebasejs/10.14.1/";
 fbP=Promise.resolve().then(function(){return window.firebase?0:ldS(B+"firebase-app-compat.js")}).then(function(){return firebase.auth?0:ldS(B+"firebase-auth-compat.js")}).then(function(){return firebase.firestore?0:ldS(B+"firebase-firestore-compat.js")}).then(function(){ if(!firebase.apps.length) firebase.initializeApp(FB); fbOK=true; firebase.auth().onAuthStateChanged(onAuth); return 1}).catch(function(){fbP=null; renderBm(); throw new Error("fb")});
 return fbP }
function docRef(){return firebase.firestore().collection("users").doc(user.uid)}
function onAuth(u){ user=u||null; ls("gaq.signed",user?"1":"0"); if(!user){cloudR=[];renderStar();renderBm();return}
 docRef().get().then(function(d){var data=d.exists?d.data():{}; var ca=Array.isArray(data.audioBookmarks)?data.audioBookmarks:[]; cloudR=Array.isArray(data.bookmarks)?data.bookmarks.filter(function(x){return typeof x==="string"}):[];
  var merged=uniq(bmA.concat(ca.filter(function(x){return typeof x==="string"}))); var changed=merged.length!==ca.length; bmA=merged; ls("gaq.abm",JSON.stringify(bmA)); if(changed) pushA(); renderStar(); renderBm()}).catch(function(){renderStar();renderBm()}) }
function pushA(){ if(!user||!fbOK) return; docRef().set({audioBookmarks:bmA,updatedAt:firebase.firestore.FieldValue.serverTimestamp()},{merge:true}).catch(function(){flash("Saved on this device. Cloud sync is unavailable right now.")}) }
function pushR(list){ ls("quranBookmarks",JSON.stringify(readLocal().filter(function(x){return list.indexOf(x)>-1}))); cloudR=cloudR.filter(function(x){return list.indexOf(x)>-1}); if(!user||!fbOK) return; docRef().set({bookmarks:uniq(cloudR.concat(readLocal())),updatedAt:firebase.firestore.FieldValue.serverTimestamp()},{merge:true}).catch(function(){}) }
function curKey(){var cv=verses[idx];return cv?(cur+":"+cv.i):null}
function renderStar(){var k=curKey(),on=!!k&&bmA.indexOf(k)>-1; bStar.innerHTML=on?SV.starOn:SV.star; bStar.classList.toggle("on",on); bStar.setAttribute("aria-label",on?"Remove this audio bookmark":"Bookmark this verse"); bStar.title=on?"Remove bookmark":"Bookmark this verse"}
bStar.onclick=function(){ var k=curKey(); if(!k) return; var i=bmA.indexOf(k); if(i>-1){bmA.splice(i,1);flash("Bookmark removed")}else{bmA.push(k);bmA=uniq(bmA);flash(user?"Bookmarked ✔ (Audio)":"Bookmarked ✔ on this device. Sign in to sync.")}
 ls("gaq.abm",JSON.stringify(bmA)); renderStar(); pushA(); if(!fbP&&ls("gaq.signed")==="1") fbInit().catch(function(){}) };
var _mark=mark; mark=function(s){ _mark(s); renderStar(); if(rg.on){var vp=$("gaq-vpos"); vp.textContent+=" · "+rgLabel()} };
/* overlays */
var OVS=[];
function mkOv(id,title){var o=document.createElement("div");o.id=id;o.className="gaov";o.setAttribute("role","dialog");o.setAttribute("aria-label",title);o.innerHTML='<div class="ovbox"><div class="ovhead"><span></span><button type="button" class="ovx" aria-label="Close">✕</button></div><div class="ovcontent"></div></div>';o.querySelector(".ovhead span").textContent=title;document.body.appendChild(o);
 o.addEventListener("click",function(e){if(e.target===o||e.target.closest(".ovx")) cl(o)});OVS.push(o);return o}
function op(o){o.classList.toggle("gq-light",root.classList.contains("gq-light"));o.classList.add("on");document.documentElement.classList.add("gaq-lock")}
function cl(o){o.classList.remove("on");if(!OVS.some(function(x){return x.classList.contains("on")})) document.documentElement.classList.remove("gaq-lock")}
document.addEventListener("keydown",function(e){if(e.key==="Escape") OVS.forEach(cl)});
/* bookmarks panel */
var bmO=null;
function suraName(n){var s=suras[n-1];return s&&s.englishName?s.englishName:("Sura "+n)}
function renderBm(){ if(!bmO||!bmO.classList.contains("on")) return; var C=bmO.querySelector(".ovcontent"); C.innerHTML=""; C.style.cssText="display:flex;flex-direction:column;min-height:0";
 var au=document.createElement("div"); au.className="bmauth";
 if(user){ var w=document.createElement("span"); w.className="who"; w.textContent="✔ "+(user.displayName||user.email||"Signed in")+" · synced"; var so=document.createElement("button"); so.type="button"; so.className="lnk"; so.textContent="Sign out"; so.onclick=function(){firebase.auth().signOut()}; au.appendChild(w); au.appendChild(so) }
 else { var gb=document.createElement("button"); gb.type="button"; gb.className="gbtn"; gb.innerHTML=SV.g+"<span>Sign in with Google</span>"; gb.onclick=signIn; var tx=document.createElement("span"); tx.className="who"; tx.style.whiteSpace="normal"; tx.textContent="Sync bookmarks on all your devices and with the Quran WebApp."; au.appendChild(gb); au.appendChild(tx) }
 C.appendChild(au);
 var A=bmA.map(function(k){return{k:k,t:"a"}}), R=allR().map(function(k){return{k:k,t:"r"}}), all=A.concat(R);
 var tabs=document.createElement("div"); tabs.className="bmtabs";
 [["all","All",all.length,null],["a","Audio",A.length,SV.aud],["r","Read",R.length,SV.rd]].forEach(function(d){var b=document.createElement("button");b.type="button";b.className="bmtab"+(filt===d[0]?" on":"");b.innerHTML=(d[3]||"")+"<span></span>";b.lastChild.textContent=d[1]+" "+d[2];b.onclick=function(){filt=d[0];renderBm()};tabs.appendChild(b)});
 C.appendChild(tabs);
 var L=document.createElement("div"); L.className="ovlist"; var rows=all.filter(function(x){return filt==="all"||x.t===filt}).sort(function(p,q){var a=p.k.split(":"),b=q.k.split(":");return a[0]-b[0]||a[1]-b[1]||(p.t<q.t?-1:1)});
 if(!rows.length){var em=document.createElement("div");em.className="empty";em.textContent="No bookmarks yet. Tap the ★ on a verse to save it.";L.appendChild(em)}
 rows.forEach(function(x){var p=x.k.split(":"),s=+p[0],a=+p[1]; var r=document.createElement("div");r.className="bmrow";
  var ic=document.createElement("span");ic.className="bmic "+x.t;ic.innerHTML=x.t==="a"?SV.aud:SV.rd;
  var tx=document.createElement("div");tx.className="bmtx";tx.textContent=s+":"+(a===0?"Intro":a)+" · "+suraName(s);var sm=document.createElement("small");sm.textContent=x.t==="a"?"Audio bookmark":"Read bookmark (Quran WebApp)";tx.appendChild(sm);
  var xb=document.createElement("button");xb.type="button";xb.className="bmx";xb.textContent="✕";xb.setAttribute("aria-label","Remove bookmark");
  xb.onclick=function(e){e.stopPropagation(); if(x.t==="a"){bmA=bmA.filter(function(z){return z!==x.k});ls("gaq.abm",JSON.stringify(bmA));pushA();renderStar()}else{pushR(allR().filter(function(z){return z!==x.k}))} renderBm()};
  r.onclick=function(){cl(bmO);jump(s,a)}; r.appendChild(ic);r.appendChild(tx);r.appendChild(xb);L.appendChild(r)});
 C.appendChild(L) }
function jump(s,a){ function go(){var k=-1;for(var i=0;i<verses.length;i++) if(verses[i].i===a){k=i;break} if(k<0&&verses.length) k=0; goto(k)}
 if(s===cur&&verses.length){var was=playing; stop(); go(); if(was) play()} else { openSura(s,false).then(go) } }
function signIn(){ if(!window.firebase||!firebase.auth||!firebase.apps.length){flash("Please wait a moment, then tap Sign in again.");fbInit().then(renderBm).catch(function(){flash("Could not reach Google sign-in. Check your connection.")});return}
 firebase.auth().signInWithPopup(new firebase.auth.GoogleAuthProvider()).catch(function(e){ if(e&&e.code!=="auth/popup-closed-by-user"&&e.code!=="auth/cancelled-popup-request"){ flash(e.code==="auth/unauthorized-domain"?"This website is not authorised for Google sign-in yet.":"Sign-in did not complete. Please try again.")} }) }
bList.onclick=function(){ if(!bmO) bmO=mkOv("gaq-bm","My bookmarks"); op(bmO); renderBm(); if(!fbP) fbInit().catch(function(){}) };
/* range */
var rg={on:false,fs:1,fa:1,ts:1,ta:1,rep:false}, rgO=null, SI=null;
function suraInfo(){ if(SI&&SI.length>100) return SI; SI=[]; var o=$("gaq-sura").options; for(var i=0;i<o.length;i++){ var m=/^\d+\.\s*(.*?)\s*[—\-]\s*(\d+)\s*verses?/.exec(o[i].text); SI.push({n:+o[i].value,name:m?m[1]:"Sura "+o[i].value,c:m?+m[2]:286}) } return SI }
function rgLabel(){ return rg.fs===rg.ts?rg.fa+"–"+rg.ta:rg.fs+":"+rg.fa+"–"+rg.ts+":"+rg.ta }
function vNo(){var x=verses[idx];return x?x.i:0}
function clr(m){ if(!rg.on) return; rg.on=false; bRg.classList.remove("on"); bRg.title="Play a range"; if(m) flash(m) }
function startRg(){ var go=function(){ var k=0; if(rg.fa>1){ for(var i=0;i<verses.length;i++) if(verses[i].i===rg.fa){k=i;break} } stop(); idx=k; mark(!0); play() };
 if(cur===rg.fs&&verses.length) go(); else { rg.on=!1; openSura(rg.fs,false).then(function(){rg.on=!0;go()}) } }
bRg.onclick=function(){ if(!rgO){ rgO=mkOv("gaq-rg","Select range to play"); var opts=suraInfo().map(function(s){return '<option value="'+s.n+'">'+s.n+'. '+s.name+'</option>'}).join("");
  rgO.querySelector(".ovcontent").innerHTML='<div class="ovbody"><div class="rggrid rg2"><label>From sura<select id="gaq-rgfs">'+opts+'</select></label><label>From verse<input type="number" id="gaq-rgfa" min="1" inputmode="numeric"></label><label>To sura<select id="gaq-rgts">'+opts+'</select></label><label>To verse<input type="number" id="gaq-rgta" min="1" inputmode="numeric"></label></div><p class="note" id="gaq-rgn" style="margin-top:10px"></p><label class="rgrep"><input type="checkbox" id="gaq-rgr"> Repeat this range</label><div class="rgbtns"><button type="button" class="ovbtn pri" id="gaq-rgp">▶ Play range</button><button type="button" class="ovbtn" id="gaq-rgc">Clear</button></div></div>';
  var cnt=function(n){var s=suraInfo()[n-1];return s?s.c:286};
  var fix=function(){ var a=$("gaq-rgfa"),b=$("gaq-rgta"); a.max=cnt(+$("gaq-rgfs").value); b.max=cnt(+$("gaq-rgts").value); $("gaq-rgn").textContent="Verses 1–"+a.max+" in the first sura, 1–"+b.max+" in the last. Plays continuously across suras." };
  $("gaq-rgfs").onchange=function(){ if(+$("gaq-rgts").value<+this.value) $("gaq-rgts").value=this.value; $("gaq-rgfa").value=1; $("gaq-rgta").value=cnt(+$("gaq-rgts").value); fix() };
  $("gaq-rgts").onchange=function(){ if(+$("gaq-rgfs").value>+this.value) $("gaq-rgfs").value=this.value; $("gaq-rgta").value=cnt(+this.value); fix() };
  $("gaq-rgp").onclick=function(){ var fs=+$("gaq-rgfs").value,ts=+$("gaq-rgts").value,fa=Math.max(1,Math.min(cnt(fs),+$("gaq-rgfa").value||1)),ta=Math.max(1,Math.min(cnt(ts),+$("gaq-rgta").value||1)); if(ts<fs||(ts===fs&&ta<fa)){var q=ta;ta=fa;fa=q} rg={on:true,fs:fs,fa:fa,ts:ts,ta:ta,rep:$("gaq-rgr").checked}; cl(rgO); bRg.classList.add("on"); bRg.title="Range: "+rgLabel(); flash("Playing "+(fs===ts?"":fs+":")+fa+"–"+(fs===ts?"":ts+":")+ta+(rg.rep?" (repeat)":"")); startRg() };
  $("gaq-rgc").onclick=function(){ cl(rgO); if(rg.on){clr("Range cleared");mark(!1)} };
  rgO._fix=fix }
 var last=cnt0(); $("gaq-rgfs").value=rg.on?rg.fs:cur; $("gaq-rgts").value=rg.on?rg.ts:cur; $("gaq-rgfa").value=rg.on?rg.fa:Math.max(1,vNo()); $("gaq-rgta").value=rg.on?rg.ta:last; $("gaq-rgr").checked=rg.rep; rgO._fix(); op(rgO) };
function cnt0(){var s=suraInfo()[cur-1];return s?s.c:verses.length}
var _after=afterStep; afterStep=function(t){ if(rg.on&&t===token&&playing&&stepI>=steps.length-1&&cur===rg.ts&&(vNo()>=rg.ta||idx>=verses.length-1)){ if(rg.rep){ startRg() } else { playing=!1;setPlayIcon();sayLang(null);setStatus("Range finished ✔");rg.on=!1;bRg.classList.remove("on");bRg.title="Play a range";mark(!1) } return } _after(t) };
var _play=play; play=function(){ if(rg.on&&(cur<rg.fs||cur>rg.ts)) clr("Range cleared"); _play() };
var _os=openSura; openSura=function(n,a){ if(rg.on&&(n<rg.fs||n>rg.ts)) clr(); return _os(n,a) };
bStar.innerHTML=SV.star;
if(ls("gaq.signed")==="1") setTimeout(function(){fbInit().catch(function(){})},2500);
})();
updateDlNote();
$("gaq-bar").onclick=function(e){ var r=this.getBoundingClientRect(); goto(Math.min(verses.length-1,Math.floor((e.clientX-r.left)/r.width*verses.length))); };
document.addEventListener("keydown",function(e){
  var tg=(e.target.tagName||"").toLowerCase(); if(tg==="input"||tg==="select"||tg==="textarea"||tg==="button") return;
  if(!$("gaq").matches(":hover")) return;
  if(e.code==="Space"){e.preventDefault();$("gaq-play").click()}
  if(e.code==="ArrowRight")$("gaq-next").click();
  if(e.code==="ArrowLeft")$("gaq-prev").click();
});
if("mediaSession" in navigator){
  navigator.mediaSession.setActionHandler("play",function(){play()});
  navigator.mediaSession.setActionHandler("pause",function(){pause()});
  navigator.mediaSession.setActionHandler("nexttrack",function(){goto(idx+1)});
  navigator.mediaSession.setActionHandler("previoustrack",function(){goto(idx-1)});
}
if(window.speechSynthesis) speechSynthesis.getVoices();
/* The classic player stays below: the two take turns instead of overlapping */
document.addEventListener("play",function(e){ if(e.target&&e.target.id==="audioPlayer"&&playing) pause(); },true);
audio.addEventListener("play",function(){ var o=document.getElementById("audioPlayer"); if(o&&!o.paused) o.pause(); });

setPlayIcon(); setStickyTop(); window.addEventListener("resize",setStickyTop); window.addEventListener("load",setStickyTop); window.addEventListener("scroll",setStickyTop,{passive:true});
loadSuras().then(function(){ return openSura(1,false) }).catch(function(){ setStatus("Could not reach the Quran data service."); });
})();
</script>
</section>
<!-- GAQ-NEW-PLAYER END -->

<section class="blk">
  <div class="audio-page-wrap">

    <!-- GAQ-OLD-TITLE START -->
    <style>
    .gaq-oldt{margin:0 0 18px;text-align:center;padding:22px 18px;border-radius:22px;background:linear-gradient(135deg,#0b5a40,#07402e);border:1px solid rgba(243,215,122,.45);box-shadow:0 10px 28px rgba(0,0,0,.25);color:#fff}
    .gaq-oldt .tag{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:999px;background:linear-gradient(135deg,#f3d77a,#d4af37);color:#1a1405;font-size:.76rem;font-weight:600;letter-spacing:.4px}
    .gaq-oldt h2{margin:10px 0 6px;font-size:1.45rem;color:#f3d77a;font-weight:600;line-height:1.3;border:0;padding:0}
    .gaq-oldt p{margin:0 auto;max-width:560px;font-size:.92rem;line-height:1.6;color:#e6f4ec}
    .gaq-oldt .pts{display:flex;flex-wrap:wrap;gap:8px;justify-content:center;margin-top:12px}
    .gaq-oldt .pts span{font-size:.78rem;padding:4px 12px;border-radius:999px;background:rgba(255,255,255,.12);color:#fff}
    @media(max-width:560px){.gaq-oldt{padding:16px 12px;border-radius:18px}.gaq-oldt h2{font-size:1.2rem}.gaq-oldt p{font-size:.85rem}}
    </style>
    <div class="gaq-oldt">
      <span class="tag">🎙 REAL HUMAN VOICE</span>
      <h2>Classic Quran Recitation — Full Sura Audio</h2>
      <p>Complete suras read by real human voices in English and Tamil. Choose a language, pick a sura, listen, and download the MP3 for offline listening.</p>
      <div class="pts"><span>🎧 Human recitation</span><span>English</span><span>தமிழ்</span><span>⬇ Download MP3</span></div>
    </div>
    <!-- GAQ-OLD-TITLE END -->

    <div class="lang-tabs">
      <button class="lang-tab active" onclick="switchLanguage('english')" id="englishTab">English</button>
      <button class="lang-tab" onclick="switchLanguage('tamil')" id="tamilTab">தமிழ் (Tamil)</button>
    </div>

    <div class="audio-player-box">
      <div class="sura-info-line">
        <div class="sura-number" id="suraNumber">1</div>
        <div class="sura-arabic" id="suraArabic">الفاتحة</div>
      </div>
      <div class="sura-name" id="suraName">The Key (Al-Fatihah) <span class="meccan-icon">🕋</span></div>
      <div class="sura-meta" id="suraMeta">7 Verses • Revelation Order: 5 • Meccan</div>

      <audio id="audioPlayer" preload="metadata"></audio>

      <div class="audio-controls">
        <button class="control-btn" onclick="previousSura()" title="Previous Sura">
          <svg viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
        </button>
        <button class="control-btn play-btn" onclick="togglePlay()" id="playPauseBtn" title="Play">
          <svg viewBox="0 0 24 24" id="playIcon"><path d="M8 5v14l11-7z"/></svg>
          <svg viewBox="0 0 24 24" id="pauseIcon" style="display:none"><path d="M6 4h4v16H6zm8 0h4v16h-4z"/></svg>
        </button>
        <button class="control-btn" onclick="nextSura()" title="Next Sura">
          <svg viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
        </button>
        <button class="control-btn" onclick="downloadAudio()" title="Download Current Sura">
          <svg viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
        </button>
      </div>

      <div class="progress-container">
        <div class="progress-bar" id="progressBar" onclick="seek(event)">
          <div class="progress-fill" id="progressFill"></div>
        </div>
        <div class="time-display">
          <span id="currentTime">0:00</span>
          <span id="duration">0:00</span>
        </div>
      </div>

      <div class="sura-selector">
        <label for="suraSelect">Select Sura:</label>
        <select id="suraSelect" onchange="changeSura()"></select>
      </div>
    </div>

  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">YouTube</div>
      <h2>Quran playlists</h2>
    </div>
    <div class="playlist-cards" style="max-width:780px;margin:0 auto">
      <a href="https://youtube.com/playlist?list=PL1ZWur9ydxbTFg--5zWUILdBvc_UiLEN2" target="_blank" rel="noopener" class="playlist-card">
        <div class="playlist-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.6 7.2a2.5 2.5 0 0 0-1.76-1.77C18.27 5 12 5 12 5s-6.27 0-7.84.43A2.5 2.5 0 0 0 2.4 7.2C2 8.78 2 12 2 12s0 3.22.4 4.8a2.5 2.5 0 0 0 1.76 1.77C5.73 19 12 19 12 19s6.27 0 7.84-.43a2.5 2.5 0 0 0 1.76-1.77C22 15.22 22 12 22 12s0-3.22-.4-4.8zM10 15V9l5.2 3z"/></svg></div>
        <h3>English Quran</h3>
        <p>Complete recitation in English translation</p>
      </a>
      <a href="https://music.youtube.com/playlist?list=PL5aSCB9_3K7n2A0q5CqE1m6kavQuthQHV&si=hhIEEzVmmqpv5M1J" target="_blank" rel="noopener" class="playlist-card">
        <div class="playlist-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.6 7.2a2.5 2.5 0 0 0-1.76-1.77C18.27 5 12 5 12 5s-6.27 0-7.84.43A2.5 2.5 0 0 0 2.4 7.2C2 8.78 2 12 2 12s0 3.22.4 4.8a2.5 2.5 0 0 0 1.76 1.77C5.73 19 12 19 12 19s6.27 0 7.84-.43a2.5 2.5 0 0 0 1.76-1.77C22 15.22 22 12 22 12s0-3.22-.4-4.8zM10 15V9l5.2 3z"/></svg></div>
        <h3>Tamil Quran</h3>
        <p>திருக்குர்ஆன் தமிழ் மொழிபெயர்ப்பு ஆடியோ</p>
      </a>
    </div>
  </div>
</section>

<script>
const suraData = [
{ar: "الفاتحة", en: "The Key (Al-Fatehah)", ta: "திறவுகோல் (அல்-ஃபாத்திஹாஹ்)", verses: 7, revelationOrder: 5, type: "Meccan", taFile: "001 sura al fatehah"},
{ar: "البقرة", en: "The Heifer (Al-Baqarah)", ta: "பசுங்கன்று (அல்-பகராஹ்)", verses: 286, revelationOrder: 87, type: "Medinan", taFile: "002 sura al bakara"},
{ar: "آل عمران", en: "The Amramites (Ali-'Imran)", ta: "இம்ரானியர்கள் (ஆலி-இம்ரான்)", verses: 200, revelationOrder: 89, type: "Medinan", taFile: "003 sura aala imran"},
{ar: "النساء", en: "Women (Al-Nesa')", ta: "பெண்கள் (அல்-நிஸா)", verses: 176, revelationOrder: 92, type: "Medinan", taFile: "004 sura al nisa"},
{ar: "المائدة", en: "The Feast (Al-Ma'edah)", ta: "விருந்து (அல்-மா'யிதாஹ்)", verses: 120, revelationOrder: 112, type: "Medinan", taFile: "005 sura al mayidha"},
{ar: "الأنعام", en: "Livestock (Al-An'am)", ta: "கால்நடைகள் (அல்-அன்'ஆம்)", verses: 165, revelationOrder: 55, type: "Meccan", taFile: "006 sura al ana am"},
{ar: "الأعراف", en: "The Purgatory (Al-A'araf)", ta: "ஆத்ம சுத்திகரிப்பு ஸ்தலம் (அல்-அஃராஃப்)", verses: 206, revelationOrder: 39, type: "Meccan", taFile: "007 sura al ahraf"},
{ar: "الأنفال", en: "The Spoils of War (Al-Anfal)", ta: "போரின் வெற்றிப் பொருட்கள் (அல்-அன்ஃபால்)", verses: 75, revelationOrder: 88, type: "Medinan", taFile: "008 sura al anfal"},
{ar: "براءة", en: "Ultimatum (Bara'ah)", ta: "இறுதி நிபந்தனை (பரா'அஹ்)", verses: 127, revelationOrder: 113, type: "Medinan", taFile: "009 sura al bara a"},
{ar: "يونس", en: "Jonah (Younus)", ta: "ஜோனா (யூனுஸ்)", verses: 109, revelationOrder: 51, type: "Meccan", taFile: "010 sura younus"},
{ar: "هود", en: "Hood (Hud)", ta: "ஹூத் (ஹூத்)", verses: 123, revelationOrder: 52, type: "Meccan", taFile: "011 sura hoodh"},
{ar: "يوسف", en: "Joseph (Yousuf)", ta: "ஜோஸஃப் (யூஸுஃப்)", verses: 111, revelationOrder: 53, type: "Meccan", taFile: "012 sura yousuff"},
{ar: "الرعد", en: "Thunder (Al-Ra`ad)", ta: "இடியோசை (அல்-ரஃத்)", verses: 43, revelationOrder: 96, type: "Medinan", taFile: "013 sura al ra adh"},
{ar: "ابراهيم", en: "Abraham (Ibrahim)", ta: "ஆப்ரஹாம் (இப்ராஹீம்)", verses: 52, revelationOrder: 72, type: "Meccan", taFile: "014 sura ibrahim"},
{ar: "الحجر", en: "Al-Hijr Valley (Al-Hijr)", ta: "அல்-ஹிஜ்ர் பள்ளத்தாக்கு (அல்-ஹிஜ்ர்)", verses: 99, revelationOrder: 54, type: "Meccan", taFile: "015 sura al hijr"},
{ar: "النحل", en: "The Bee (Al-Nahl)", ta: "தேனீ (அல்-நஹ்ல்)", verses: 128, revelationOrder: 70, type: "Meccan", taFile: "016 sura al nahl"},
{ar: "الإسراء", en: "The Children of Israel (Bani Israel)", ta: "இஸ்ரவேலின் சந்ததியர் (பனீ இஸ்ராயீல்)", verses: 111, revelationOrder: 50, type: "Meccan", taFile: "017 sura banee israeel"},
{ar: "الكهف", en: "The Cave (Al-Kahf)", ta: "குகை (அல்-கஹ்ஃப்)", verses: 110, revelationOrder: 69, type: "Meccan", taFile: "018 sura al khahaf"},
{ar: "مريم", en: "Mary (Maryam)", ta: "மேரி (மர்யம்)", verses: 98, revelationOrder: 44, type: "Meccan", taFile: "019 sura mariam"},
{ar: "طه", en: "T.H. (Ta Ha)", ta: "த.ஹ (தாஹா)", verses: 135, revelationOrder: 45, type: "Meccan", taFile: "020 sura thaha"},
{ar: "الأنبياء", en: "The Prophets (Al-Anbya')", ta: "நபிமார்கள் (அல்-அன்பியா)", verses: 112, revelationOrder: 73, type: "Meccan", taFile: "021 sura al anbiya"},
{ar: "الحج", en: "Pilgrimage (Al-Hajj)", ta: "புனித யாத்திரை (அல்-ஹஜ்)", verses: 78, revelationOrder: 103, type: "Medinan", taFile: "022 sura al haj"},
{ar: "المؤمنون", en: "The Believers (Al-Mu'minun)", ta: "நம்பிக்கையாளர்கள் (அல்-முஃமினூன்)", verses: 118, revelationOrder: 74, type: "Meccan", taFile: "023 sura al moominoon"},
{ar: "النور", en: "Light (Al-Noor)", ta: "ஒளி (அல்-நூர்)", verses: 64, revelationOrder: 102, type: "Medinan", taFile: "024 sura al noor"},
{ar: "الفرقان", en: "The Statute Book (Al-Furqan)", ta: "சட்டப்புத்தகம் (அல்-ஃபுர்கான்)", verses: 77, revelationOrder: 42, type: "Meccan", taFile: "025 sura al furqan"},
{ar: "الشعراء", en: "The Poets (Al-Shu`ara')", ta: "கவிஞர்கள் (அல்-ஷுஃரா)", verses: 227, revelationOrder: 47, type: "Meccan", taFile: "026 sura al shuara"},
{ar: "النمل", en: "The Ant (Al-Naml)", ta: "எறும்பு (அல்-நம்ல்)", verses: 93, revelationOrder: 48, type: "Meccan", taFile: "027 sura al naml"},
{ar: "القصص", en: "History (Al-Qasas)", ta: "வரலாறு (அல்-கஸஸ்)", verses: 88, revelationOrder: 49, type: "Meccan", taFile: "028 sura al kasas"},
{ar: "العنكبوت", en: "The Spider (Al-'Ankaboot)", ta: "சிலந்திப்பூச்சி (அல்-'அன்கபூத்)", verses: 69, revelationOrder: 85, type: "Meccan", taFile: "029 sura al ankabooth"},
{ar: "الروم", en: "The Romans (Al-Room)", ta: "ரோமர்கள் (அல்-ரூம்)", verses: 60, revelationOrder: 84, type: "Meccan", taFile: "030 sura al rome"},
{ar: "لقمان", en: "Luqmaan (Luqman)", ta: "லுக்மான் (லுக்மான்)", verses: 34, revelationOrder: 57, type: "Meccan", taFile: "031 sura lukman"},
{ar: "السجدة", en: "Prostration (Al-Sajdah)", ta: "சிரம் பணிதல் (அல்-ஸஜ்தா)", verses: 30, revelationOrder: 75, type: "Meccan", taFile: "032 sura sajtha"},
{ar: "الأحزاب", en: "The Parties (Al-Ahzab)", ta: "படையினர் (அல்-அஹ்ஸாப்)", verses: 73, revelationOrder: 90, type: "Medinan", taFile: "033 sura al ahzab"},
{ar: "سبإ", en: "Sheba (Saba')", ta: "ஷீபா (ஸபா')", verses: 54, revelationOrder: 58, type: "Meccan", taFile: "034 sura sheeba"},
{ar: "فاطر", en: "Initiator (Faater)", ta: "துவக்கக்கர்த்தா (ஃபாதிர்)", verses: 45, revelationOrder: 43, type: "Meccan", taFile: "035 sura al faathir"},
{ar: "يس", en: "Y.S. (Ya Sin)", ta: "ய.ஸ (யா ஸீன்)", verses: 83, revelationOrder: 41, type: "Meccan", taFile: "036 sura al yasin"},
{ar: "الصافات", en: "The Arrangers (Al-Saffat)", ta: "வரிசைப்படுத்துவோர் (அல்-ஸஃப்ஃபாத்)", verses: 182, revelationOrder: 56, type: "Meccan", taFile: "037 sura al saffath"},
{ar: "ص", en: "S. (Saad)", ta: "ஸ (ஸாத்)", verses: 88, revelationOrder: 38, type: "Meccan", taFile: "038 sura al swad"},
{ar: "الزمر", en: "The Throngs (Al-Zumar)", ta: "மக்கள் கூட்டங்கள் (அல்-ஜுமர்)", verses: 75, revelationOrder: 59, type: "Meccan", taFile: "039 sura al jumar"},
{ar: "غافر", en: "Forgiver (Ghafer)", ta: "மன்னிப்பவர் (க்ஹாபிர்)", verses: 85, revelationOrder: 60, type: "Meccan", taFile: "040 sura al khafir"},
{ar: "فصلت", en: "Detailed (Fussilat)", ta: "விவரிக்கப்பட்டது (ஃபுஸ்ஸிலத்)", verses: 54, revelationOrder: 61, type: "Meccan", taFile: "041 sura al fussilath"},
{ar: "الشورى", en: "Consultation (Al-Shoora)", ta: "ஆலோசனை (அல்-ஷுரா)", verses: 53, revelationOrder: 62, type: "Meccan", taFile: "042 sura al shura"},
{ar: "الزخرف", en: "Ornaments (Al-Zukhruf)", ta: "ஆபரணங்கள் (அல்-ஜுக்ருஃப்)", verses: 89, revelationOrder: 63, type: "Meccan", taFile: "043 sura al zukhruf"},
{ar: "الدخان", en: "Smoke (Al-Dukhan)", ta: "புகை (அல்-துகான்)", verses: 59, revelationOrder: 64, type: "Meccan", taFile: "044 sura al dhuhan"},
{ar: "الجاثية", en: "Kneeling (Al-Jatheyah)", ta: "மண்டியிடுதல் (அல்-ஜாஸியா)", verses: 37, revelationOrder: 65, type: "Meccan", taFile: "045 sura al jasia"},
{ar: "الأحقاف", en: "The Dunes (Al-Ahqaf)", ta: "மணற்குன்றுகள் (அல்-அஹ்காஃப்)", verses: 35, revelationOrder: 66, type: "Meccan", taFile: "046 sura al ahqaf"},
{ar: "محمد", en: "Muhammad (Muhammad)", ta: "முஹம்மத் (முஹம்மத்)", verses: 38, revelationOrder: 95, type: "Medinan", taFile: "047 sura mohamed"},
{ar: "الفتح", en: "Victory (Al-Fatt-h)", ta: "வெற்றி (அல்-ஃபத்ஹ்)", verses: 29, revelationOrder: 111, type: "Medinan", taFile: "048 sura al fathh"},
{ar: "الحجرات", en: "The Walls (Al-Hujurat)", ta: "சுவர்கள் (அல்-ஹுஜ்ராத்)", verses: 18, revelationOrder: 106, type: "Medinan", taFile: "049 sura al hujraat"},
{ar: "ق", en: "Q. (Qaf)", ta: "க (காஃப்)", verses: 45, revelationOrder: 34, type: "Meccan", taFile: "050 sura qaaf"},
{ar: "الذاريات", en: "Drivers of the Winds (Al-Dhareyat)", ta: "காற்றுகளைச் செலுத்துவோர் (அல்-தாரியாத்)", verses: 60, revelationOrder: 67, type: "Meccan", taFile: "051 sura al thariyath"},
{ar: "الطور", en: "Mount Sinai (Al-Toor)", ta: "சினாய் மலை (அல்-தூர்)", verses: 49, revelationOrder: 76, type: "Meccan", taFile: "052 sura al thoor"},
{ar: "النجم", en: "The Stars (Al-Najm)", ta: "நட்சத்திரங்கள் (அல்-நஜ்ம்)", verses: 62, revelationOrder: 23, type: "Meccan", taFile: "053 sura al najm"},
{ar: "القمر", en: "The Moon (Al-Qamar)", ta: "நிலவு (அல்-கமர்)", verses: 55, revelationOrder: 37, type: "Meccan", taFile: "054 sura al qamar"},
{ar: "الرحمن", en: "Most Gracious (Al-Rahmaan)", ta: "மிக்க அருளாளர் (அல்-ரஹ்மான்)", verses: 78, revelationOrder: 97, type: "Medinan", taFile: "055 sura al rahman"},
{ar: "الواقعة", en: "The Inevitable (Al-Waaqe'ah)", ta: "தவிர்க் இயலாதத் (அல்-வாகி'ஆ)", verses: 96, revelationOrder: 46, type: "Meccan", taFile: "056 sura al waakya"},
{ar: "الحديد", en: "Iron (Al-Hadeed)", ta: "இரும்பு (அல்-ஹதீத்)", verses: 29, revelationOrder: 94, type: "Medinan", taFile: "057 sura al hadheedh"},
{ar: "المجادلة", en: "The Debate (Al-Mujaadalah)", ta: "தர்க்கம் (அல்-முஜாதலா)", verses: 22, revelationOrder: 105, type: "Medinan", taFile: "058 sura al mujathala"},
{ar: "الحشر", en: "Exodus (Al-Hashr)", ta: "வெளியேற்றம் (அல்-ஹஷ்ர்)", verses: 24, revelationOrder: 101, type: "Medinan", taFile: "059 sura al hasr"},
{ar: "الممتحنة", en: "The Test (Al-Mumtahanah)", ta: "பரிசோதனை (அல்-மும்தஹனஹ்)", verses: 13, revelationOrder: 91, type: "Medinan", taFile: "060 sura al mumthahina"},
{ar: "الصف", en: "The Column (Al-Suff)", ta: "அணிவகுப்பு (அல்-ஸஃப்)", verses: 14, revelationOrder: 109, type: "Medinan", taFile: "061 sura al suf"},
{ar: "الجمعة", en: "Friday (Al-Jumu`ah)", ta: "வெள்ளிக்கிழமை (அல்-ஜுமுஆ)", verses: 11, revelationOrder: 110, type: "Medinan", taFile: "062 sura al jumua"},
{ar: "المنافقون", en: "The Hypocrites (Al-Munaafeqoon)", ta: "நயவஞ்சகர்கள் (அல்-முனாஃபிகூன்)", verses: 11, revelationOrder: 104, type: "Medinan", taFile: "063 sura al munafiqoon"},
{ar: "التغابن", en: "Mutual Blaming (Al-Taghaabun)", ta: "பரஸ்பரம் பழித்துக் கொள்ளுதல் (அல்-தகாபுன்)", verses: 18, revelationOrder: 108, type: "Medinan", taFile: "064 sura al thaghaboon"},
{ar: "الطلاق", en: "Divorce (Al-Talaaq)", ta: "விவாகரத்து (அல்-தலாக்)", verses: 12, revelationOrder: 99, type: "Medinan", taFile: "065 sura al thalaak"},
{ar: "التحريم", en: "Prohibition (Al-Tahreem)", ta: "தடை செய்தல் (அல்-தஹ்ரீம்)", verses: 12, revelationOrder: 107, type: "Medinan", taFile: "066 sura al thahrim"},
{ar: "الملك", en: "Kingship (Al-Mulk)", ta: "அரசிமை (அல்-முல்க்)", verses: 30, revelationOrder: 77, type: "Meccan", taFile: "067 sura al mulk"},
{ar: "القلم", en: "The Pen (Al-Qalam)", ta: "பேனா (அல்-கலம்)", verses: 52, revelationOrder: 2, type: "Meccan", taFile: "068 sura al kalam"},
{ar: "الحاقة", en: "Incontestable (Al-Haaqqah)", ta: "மறுக்க இயலாதது (அல்-ஹாக்காஹ்)", verses: 52, revelationOrder: 78, type: "Meccan", taFile: "069 sura al haaka"},
{ar: "المعارج", en: "The Heights (Al-Ma'aarej)", ta: "உயரங்கள் (அல்-மஆரிஜ்)", verses: 44, revelationOrder: 79, type: "Meccan", taFile: "070 sura al ma aarij"},
{ar: "نوح", en: "Noah (Noah)", ta: "நோவா (நோவா)", verses: 28, revelationOrder: 71, type: "Meccan", taFile: "071 sura nooh"},
{ar: "الجن", en: "Jinns (Al-Jinn)", ta: "ஜின்கள் (அல்-ஜின்)", verses: 28, revelationOrder: 40, type: "Meccan", taFile: "072 sura al jin"},
{ar: "المزمل", en: "Cloaked (Al-Muzzammil)", ta: "அங்கி அணிந்தவர் (அல்-முஸ்ஸம்மில்)", verses: 20, revelationOrder: 3, type: "Meccan", taFile: "073 sura al mussammil"},
{ar: "المدثر", en: "The Hidden Secret (Al-Muddath-thir)", ta: "மறைக்கப்பட்ட இரகசியம் (அல்-முத்தஸ்ஸிர்)", verses: 56, revelationOrder: 4, type: "Meccan", taFile: "074 sura al muththasir"},
{ar: "القيامة", en: "Resurrection (Al-Qeyaamah)", ta: "உயிர்த்தெழுப்புதல் (அல்-கியாமஹ்)", verses: 40, revelationOrder: 31, type: "Meccan", taFile: "075 sura al kiama"},
{ar: "الانسان", en: "The Human (Al-Insaan)", ta: "மானிடன் (அல்-இன்ஸான்)", verses: 31, revelationOrder: 98, type: "Medinan", taFile: "076 sura al insaan"},
{ar: "المرسلات", en: "Dispatched (Al-Mursalaat)", ta: "அனுப்பப்படுகின்றவர்கள் (அல்-முர்ஸலாத்)", verses: 50, revelationOrder: 33, type: "Meccan", taFile: "077 sura al mursalaath"},
{ar: "النبإ", en: "The Event (Al-Naba')", ta: "அந்த நிகழ்வு (அல்-நபஅ')", verses: 40, revelationOrder: 80, type: "Meccan", taFile: "078 sura al naba"},
{ar: "النازعات", en: "The Snatchers (Al-Naaze`aat)", ta: "பறிப்பவர்கள் (அல்-நாஸியாத்)", verses: 46, revelationOrder: 81, type: "Meccan", taFile: "079 sura al nasiyath"},
{ar: "عبس", en: "He Frowned (`Abasa)", ta: "அவர் முகம் சுளித்தார் ('அபஸ)", verses: 42, revelationOrder: 24, type: "Meccan", taFile: "080 sura abasa"},
{ar: "التكوير", en: "The Rolling (Al-Takweer)", ta: "சுருட்டுதல் (அல்-தக்வீர்)", verses: 29, revelationOrder: 7, type: "Meccan", taFile: "081 sura al thakveer"},
{ar: "الإنفطار", en: "The Shattering (Al-Infitaar)", ta: "வெடித்துப் பிளதல் (அல்-இன்ஃபிதார்)", verses: 19, revelationOrder: 82, type: "Meccan", taFile: "082 sura al infithaar"},
{ar: "المطففين", en: "The Cheaters (Al-Mutaffifeen)", ta: "மோசடியாளர்கள் (அல்-முதஃபிஃபீன்)", verses: 36, revelationOrder: 86, type: "Meccan", taFile: "083 sura al muthafifin"},
{ar: "الإنشقاق", en: "The Rupture (Al-Inshiqaaq)", ta: "தகர்க்கப்படுதல் (அல்-இன்ஷிகாக்)", verses: 25, revelationOrder: 83, type: "Meccan", taFile: "084 sura al inshikaak"},
{ar: "البروج", en: "The Galaxies (Al-Burooj)", ta: "நட்சத்திர மண்டலங்கள் (அல்-புரூஜ்)", verses: 22, revelationOrder: 27, type: "Meccan", taFile: "085 sura al brooj"},
{ar: "الطارق", en: "The Bright Star (Al-Taareq)", ta: "பிரகாசமான நட்சத்திரம் (அல்-தாரிக்)", verses: 17, revelationOrder: 36, type: "Meccan", taFile: "086 sura al thariq"},
{ar: "الأعلى", en: "The Most High (Al-A`alaa)", ta: "மிகவும் மேலானவர் (அல்-அஃலா)", verses: 19, revelationOrder: 8, type: "Meccan", taFile: "087 sura al aalaa"},
{ar: "الغاشية", en: "Overwhelming (Al-Ghaasheyah)", ta: "மூழ்கடித்தல் (அல்-காஷியா)", verses: 26, revelationOrder: 68, type: "Meccan", taFile: "088 sura al gasiya"},
{ar: "الفجر", en: "Dawn (Al-Fajr)", ta: "விடியல் (அல்-ஃபஜ்ர்)", verses: 30, revelationOrder: 10, type: "Meccan", taFile: "089 sura al fajir"},
{ar: "البلد", en: "The Town (Al-Balad)", ta: "நகரம் (அல்-பலத்)", verses: 20, revelationOrder: 35, type: "Meccan", taFile: "090 sura al baladh"},
{ar: "الشمس", en: "The Sun (Al-Shams)", ta: "சூரியன் (அல்-ஷம்ஸ்)", verses: 15, revelationOrder: 26, type: "Meccan", taFile: "091 sura al shams"},
{ar: "الليل", en: "The Night (Al-Layl)", ta: "இரவு (அல்-லைல்)", verses: 21, revelationOrder: 9, type: "Meccan", taFile: "092 sura al lail"},
{ar: "الضحى", en: "The Forenoon (Al-Duhaa)", ta: "முற்பகல் (அல்-துஹா)", verses: 11, revelationOrder: 11, type: "Meccan", taFile: "093 sura al duhaa"},
{ar: "الشرح", en: "Cooling the Temper (Al-Sharrhh)", ta: "சுபாவத்தைக் குளிர்விததல் (அல்-ஷ்ரஹ்)", verses: 8, revelationOrder: 12, type: "Meccan", taFile: "094 sura al sharh"},
{ar: "التين", en: "The Fig (Al-Teen)", ta: "அத்தி (அல்-தீன்)", verses: 8, revelationOrder: 28, type: "Meccan", taFile: "095 sura al theen"},
{ar: "العلق", en: "The Embryo (Al-`Alaq)", ta: "கருமுளை (அல்-'அலக்)", verses: 19, revelationOrder: 1, type: "Meccan", taFile: "096 sura al alak"},
{ar: "القدر", en: "Destiny (Al-Qadr)", ta: "விதி (அல்-கத்ர்)", verses: 5, revelationOrder: 25, type: "Meccan", taFile: "097 sura al qadhir"},
{ar: "البينة", en: "Proof (Al-Bayyinah)", ta: "சான்று (அல்-பய்யினஹ்)", verses: 8, revelationOrder: 100, type: "Medinan", taFile: "098 sura al baiena"},
{ar: "الزلزلة", en: "The Quake (Al-Zalzalah)", ta: "அதிர்வு (அல்-ஜல்ஜலஹ்)", verses: 8, revelationOrder: 93, type: "Medinan", taFile: "099 sura al zalzala"},
{ar: "العاديات", en: "The Gallopers (Al-`Aadeyaat)", ta: "பாய்ந்தோடுபவை (அல்-ஆதியாத்)", verses: 11, revelationOrder: 14, type: "Meccan", taFile: "100 sura al aadhiyath"},
{ar: "القارعة", en: "The Shocker (Al-Qaare`ah)", ta: "அதிர்ச்சியூட்டுவத் (அல்-காரியஹ்)", verses: 11, revelationOrder: 30, type: "Meccan", taFile: "101 sura al qariya"},
{ar: "التكاثر", en: "Hoarding (Al-Takaathur)", ta: "சேகரித்தல் (அல்-தகாஸுர்)", verses: 8, revelationOrder: 16, type: "Meccan", taFile: "102 sura al thakasur"},
{ar: "العصر", en: "The Afternoon (Al-`Asr)", ta: "பிற்பகல் (அல்-'அஸ்ர்)", verses: 3, revelationOrder: 13, type: "Meccan", taFile: "103 sura al asr"},
{ar: "الهمزة", en: "The Backbiter (Al-Humazah)", ta: "புறங்கூறுபவன் (அல்-ஹுமஜஹ்)", verses: 9, revelationOrder: 32, type: "Meccan", taFile: "104 sura al humajah"},
{ar: "الفيل", en: "The Elephant (Al-Feel)", ta: "யானை (அல்-ஃபீல்)", verses: 5, revelationOrder: 19, type: "Meccan", taFile: "105 sura al fheel"},
{ar: "قريش", en: "Quraish Tribe (Quraish)", ta: "குறைஷிக்குலம் (குறைஷ்)", verses: 4, revelationOrder: 29, type: "Meccan", taFile: "106 sura kuraish"},
{ar: "الماعون", en: "Charity (Al-Maa`oon)", ta: "தர்மம் (அல்-மா'ஊன்)", verses: 7, revelationOrder: 17, type: "Meccan", taFile: "107 sura al maaun"},
{ar: "الكوثر", en: "Bounty (Al-Kawthar)", ta: "வெகுமதி (அல்-கவ்த்ஸர்)", verses: 3, revelationOrder: 15, type: "Meccan", taFile: "108 sura al kausar"},
{ar: "الكافرون", en: "The Disbelievers (Al-Kaaferoon)", ta: "நம்பமறுப்புப்பவர்கள் (அல்-காஃபிரூன்)", verses: 6, revelationOrder: 18, type: "Meccan", taFile: "109 sura al kafiroon"},
{ar: "النصر", en: "Triumph (Al-Naasr)", ta: "வெற்றிக்களிப்பு (அல்-நஸ்ர்)", verses: 3, revelationOrder: 114, type: "Medinan", taFile: "110 sura al nasr"},
{ar: "المسد", en: "Thorns (Al-Masad)", ta: "முட்கள் (அல்-மஸத்)", verses: 5, revelationOrder: 6, type: "Meccan", taFile: "111 sura al masadh"},
{ar: "الإخلاص", en: "Absoluteness (Al-Ikhlaas)", ta: "பரிபூரணத்துவம் (அல்-இஃக்லாஸ்)", verses: 4, revelationOrder: 22, type: "Meccan", taFile: "112 sura al iqlas"},
{ar: "الفلق", en: "Daybreak (Al-Falaq)", ta: "வைகறை (அல்-ஃபலக்)", verses: 5, revelationOrder: 20, type: "Meccan", taFile: "113 sura al falaq"},
{ar: "الناس", en: "People (Al-Naas)", ta: "மனிதர்கள் (அல்-நாஸ்)", verses: 6, revelationOrder: 21, type: "Meccan", taFile: "114 sura al naas"}
];

let currentSuraIndex = 0;
let currentLanguage = 'english';
let isPlaying = false;
const audioPlayer = document.getElementById('audioPlayer');

const AUDIO_BASE_PATH = '<?php echo home_url(); ?>/wp-content/uploads/audio/';
const ENGLISH_PATH = AUDIO_BASE_PATH + 'english/';
const TAMIL_PATH = AUDIO_BASE_PATH + 'tamil/';

window.addEventListener('load', function() {
  populateSuraSelect();
  loadSura(0);
  audioPlayer.addEventListener('ended', nextSura);
  audioPlayer.addEventListener('timeupdate', updateProgress);
  audioPlayer.addEventListener('loadedmetadata', updateDuration);
  audioPlayer.addEventListener('error', function(e) {
    console.error('Audio error:', e, audioPlayer.src);
  });
});

function populateSuraSelect() {
  const select = document.getElementById('suraSelect');
  select.innerHTML = '';
  suraData.forEach((sura, index) => {
    const option = document.createElement('option');
    option.value = index;
    option.textContent = (index + 1) + '. ' + (currentLanguage === 'english' ? sura.en : sura.ta);
    select.appendChild(option);
  });
}

function switchLanguage(lang) {
  currentLanguage = lang;
  document.getElementById('englishTab').classList.toggle('active', lang === 'english');
  document.getElementById('tamilTab').classList.toggle('active', lang === 'tamil');
  populateSuraSelect();
  loadSura(currentSuraIndex);
}

function loadSura(index) {
  currentSuraIndex = index;
  const sura = suraData[index];

  document.getElementById('suraNumber').textContent = index + 1;
  document.getElementById('suraArabic').textContent = sura.ar;

  const displayName = currentLanguage === 'english' ? sura.en : sura.ta;
  const icon = sura.type === 'Meccan' ? '<span class="meccan-icon">🕋</span>' : '<span class="medinan-icon">🕌</span>';
  document.getElementById('suraName').innerHTML = displayName + ' ' + icon;
  document.getElementById('suraMeta').textContent = sura.verses + ' Verses • Revelation Order: ' + sura.revelationOrder + ' • ' + sura.type;
  document.getElementById('suraSelect').value = index;

  let audioPath;
  if (currentLanguage === 'english') {
    const suraNum = String(index + 1).padStart(3, '0');
    audioPath = ENGLISH_PATH + 'sura' + suraNum + '.mp3';
  } else {
    audioPath = TAMIL_PATH + sura.taFile + '.mp3';
  }

  audioPlayer.src = audioPath;
  audioPlayer.load();
  isPlaying = false;
  updatePlayButton();
}

function togglePlay() {
  if (isPlaying) {
    audioPlayer.pause();
  } else {
    audioPlayer.play().catch(e => console.error('Play error:', e));
  }
  isPlaying = !isPlaying;
  updatePlayButton();
}

function updatePlayButton() {
  document.getElementById('playIcon').style.display = isPlaying ? 'none' : 'block';
  document.getElementById('pauseIcon').style.display = isPlaying ? 'block' : 'none';
  document.getElementById('playPauseBtn').title = isPlaying ? 'Pause' : 'Play';
}

function previousSura() {
  if (currentSuraIndex > 0) {
    loadSura(currentSuraIndex - 1);
    if (isPlaying) audioPlayer.play();
  }
}

function nextSura() {
  if (currentSuraIndex < suraData.length - 1) {
    loadSura(currentSuraIndex + 1);
    if (isPlaying) audioPlayer.play();
  }
}

function changeSura() {
  loadSura(parseInt(document.getElementById('suraSelect').value));
}

function downloadAudio() {
  const link = document.createElement('a');
  link.href = audioPlayer.src;
  const sura = suraData[currentSuraIndex];
  link.download = 'sura-' + (currentSuraIndex + 1) + '-' + sura.en.split('(')[1].split(')')[0] + '.mp3';
  link.click();
}

function seek(event) {
  const progressBar = document.getElementById('progressBar');
  const percent = event.offsetX / progressBar.offsetWidth;
  audioPlayer.currentTime = percent * audioPlayer.duration;
}

function updateProgress() {
  const percent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
  document.getElementById('progressFill').style.width = percent + '%';
  document.getElementById('currentTime').textContent = formatTime(audioPlayer.currentTime);
}

function updateDuration() {
  document.getElementById('duration').textContent = formatTime(audioPlayer.duration);
}

function formatTime(seconds) {
  if (isNaN(seconds)) return '0:00';
  const mins = Math.floor(seconds / 60);
  const secs = Math.floor(seconds % 60);
  return mins + ':' + secs.toString().padStart(2, '0');
}
</script>

<?php get_footer(); ?>
