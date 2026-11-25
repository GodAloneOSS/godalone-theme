<?php
/**
 * Picture of the day: curved 3D picture slider (home page).
 * One identical file is used on godalone.in, kadavulmattum.org and ekkhuda.org.
 * The site is detected from its own picture-messages function (ga_ / km_ / ek_).
 * Pictures come from /picture-messages/img/ (thumb for sides, original for the centre picture).
 */
if (!defined('ABSPATH')) return;

$pmc = null;
$pmc_id = '';
if (function_exists('ga_pm_daily')) {
    $pmc_id = (string) ga_pm_daily('e');
    $pmc = array(
        'lang' => 'e', 'name' => 'GodAlone.in',
        'kicker' => "\u{1F5BC}\u{FE0F} Picture of the day", 'h2' => 'Quran Picture Messages',
        'sub' => "Quranic verse, beautifully presented in a picture. Download it and share God's message with others.",
        'alt' => 'Quran verse picture', 'ref' => 'Quran', 'drag' => 'DRAG',
        'prev' => 'Prev', 'next' => 'Next', 'dl' => 'Download', 'sh' => 'Share', 'all' => 'See all pictures',
        'aprev' => 'Previous picture', 'anext' => 'Next picture', 'adl' => 'Download picture', 'ash' => 'Share picture',
        'share_text' => 'Quran verse from GodAlone.in',
        'm_retry' => 'Please try again', 'm_dl' => "Downloading\u{2026}", 'm_copied' => 'Link copied',
        'm_ig' => 'Link copied. Paste it in Instagram.',
    );
} elseif (function_exists('km_pm_daily')) {
    $pmc_id = (string) km_pm_daily('t');
    $pmc = array(
        'lang' => 't', 'name' => 'KadavulMattum.org',
        'kicker' => "\u{1F5BC}\u{FE0F} இன்றைய படம்", 'h2' => 'குர்ஆன் படச் செய்திகள்',
        'sub' => 'ஒரு வசனம், ஒரு படம். பதிவிறக்கி இன்று யாரோடாவது பகிருங்கள்.',
        'alt' => 'குர்ஆன் வசனப் படம்', 'ref' => 'குர்ஆன்', 'drag' => 'இழுக்க',
        'prev' => 'முந்தையது', 'next' => 'அடுத்தது', 'dl' => 'பதிவிறக்கு', 'sh' => 'பகிர்', 'all' => 'எல்லா படங்களும்',
        'aprev' => 'முந்தைய படம்', 'anext' => 'அடுத்த படம்', 'adl' => 'படத்தைப் பதிவிறக்கு', 'ash' => 'படத்தைப் பகிர்',
        'share_text' => 'குர்ஆன் வசனம் - KadavulMattum.org',
        'm_retry' => 'மீண்டும் முயலுங்கள்', 'm_dl' => "பதிவிறக்கப்படுகிறது\u{2026}", 'm_copied' => 'இணைப்பு நகலெடுக்கப்பட்டது',
        'm_ig' => 'இணைப்பு நகலெடுக்கப்பட்டது. Instagram-இல் ஒட்டுங்கள்.',
    );
} elseif (function_exists('ek_pm_daily')) {
    $pmc_id = (string) ek_pm_daily('h');
    $pmc = array(
        'lang' => 'h', 'name' => 'EkKhuda.org',
        'kicker' => "\u{1F5BC}\u{FE0F} आज की तस्वीर", 'h2' => 'क़ुरआन तस्वीरी पैग़ाम',
        'sub' => 'एक आयत, एक तस्वीर। डाउनलोड कीजिए और आज किसी के साथ शेयर कीजिए।',
        'alt' => 'क़ुरआन आयत की तस्वीर', 'ref' => 'क़ुरआन', 'drag' => 'खींचें',
        'prev' => 'पिछला', 'next' => 'अगला', 'dl' => 'डाउनलोड', 'sh' => 'शेयर', 'all' => 'सभी तस्वीरें',
        'aprev' => 'पिछली तस्वीर', 'anext' => 'अगली तस्वीर', 'adl' => 'तस्वीर डाउनलोड करें', 'ash' => 'तस्वीर शेयर करें',
        'share_text' => 'क़ुरआन की आयत - EkKhuda.org',
        'm_retry' => 'फिर कोशिश कीजिए', 'm_dl' => "डाउनलोड हो रहा है\u{2026}", 'm_copied' => 'लिंक कॉपी हो गया',
        'm_ig' => 'लिंक कॉपी हो गया। इसे Instagram में पेस्ट कीजिए।',
    );
}
if (!$pmc || $pmc_id === '') return;
$pmc['id'] = $pmc_id;
$pmc_ref = preg_match('/^(\d+)\.(\d+)/', $pmc_id, $pmc_m) ? $pmc['ref'] . ' ' . $pmc_m[1] . ':' . $pmc_m[2] : '';
$pmc_all = home_url('/picture-messages/');
$pmc_here = home_url('/picture-messages/#' . $pmc_id);
$pmc_img = home_url('/picture-messages/img/?f=' . $pmc_id);
$pmc_star = '<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" aria-hidden="true"><path d="M12 2l2.2 6.8H21l-5.6 4.1 2.2 6.8L12 15.6l-5.6 4.1 2.2-6.8L3 8.8h6.8L12 2z"/></svg>';
$pmc_ic = function ($d, $w = 2) {
    return '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="' . $w . '" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $d . '</svg>';
};
?>
<section class="blk pmc-sec" id="pmcSec">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal"><?php echo esc_html($pmc['kicker']); ?></span>
      <h2 class="reveal"><?php echo esc_html($pmc['h2']); ?></h2>
      <p class="reveal"><?php echo esc_html($pmc['sub']); ?></p>
    </div>
  </div>
  <style id="pmc-css">
.pmc-sec{overflow:hidden;padding-bottom:56px}
.pmc{--s:clamp(268px,min(82vw,68vh),580px);position:relative;margin:6px 0 0;padding:26px 0 30px;color:#f7f1e3;border-radius:50%/clamp(26px,4.4vw,64px);background:radial-gradient(110% 80% at 50% 0%,rgba(227,189,113,.22),transparent 62%),radial-gradient(90% 70% at 100% 100%,rgba(111,143,255,.20),transparent 66%),radial-gradient(80% 60% at 0% 100%,rgba(227,189,113,.10),transparent 60%),linear-gradient(165deg,#182a49,#0e1a2e 72%);box-shadow:0 40px 90px -40px rgba(0,0,0,.7),inset 0 0 0 1px rgba(227,189,113,.10)}
.pmc-badge{display:flex;justify-content:center;margin:0 0 12px}
.pmc-badge span{display:inline-flex;align-items:center;gap:7px;padding:6px 15px 6px 12px;border-radius:999px;border:1px solid rgba(227,189,113,.38);background:rgba(227,189,113,.09);color:#F1DCA0;font-family:var(--font-display,Georgia,serif);font-size:12.5px;font-weight:600;letter-spacing:.09em;line-height:1}
.pmc-badge svg{color:#E3BD71}
.pmc-stage{position:relative;height:calc(var(--s) + 34px);perspective:1500px;perspective-origin:50% 45%;touch-action:pan-y;user-select:none;-webkit-user-select:none;outline:none;-webkit-tap-highlight-color:transparent}
.pmc-s{position:absolute;top:17px;left:50%;width:var(--s);height:var(--s);margin-left:calc(var(--s) / -2);border-radius:clamp(12px,2.2vw,20px);background:#0b1322;box-shadow:0 26px 50px -22px rgba(0,0,0,.75);will-change:transform,opacity;cursor:grab}
.pmc-s img{display:block;width:100%;height:100%;object-fit:contain;border-radius:inherit;pointer-events:none;-webkit-user-drag:none}
.pmc-s::after{content:"";position:absolute;inset:0;border-radius:inherit;background:rgba(8,14,28,var(--d,0));pointer-events:none}
.pmc-s.is-c{box-shadow:0 34px 70px -24px rgba(0,0,0,.85),0 0 0 2px rgba(227,189,113,.55),0 0 60px -14px rgba(227,189,113,.38)}
.pmc-stage.drag .pmc-s{cursor:grabbing}
.pmc-cap{text-align:center;color:#F1DCA0;font-weight:700;letter-spacing:.07em;font-size:15px;margin:2px 0 18px;min-height:20px}
.pmc-bar{position:relative;display:flex;justify-content:center;align-items:flex-start;gap:clamp(12px,3.6vw,26px);padding:0 12px}
.pmc-b{display:flex;flex-direction:column;align-items:center;gap:8px;min-width:58px;background:none;border:0;padding:0;margin:0;color:#e9dfc6;font:600 12px/1.15 inherit;font-family:inherit;cursor:pointer;-webkit-tap-highlight-color:transparent}
.pmc-b i{display:grid;place-items:center;width:54px;height:54px;border-radius:50%;border:1.5px solid rgba(227,189,113,.55);background:rgba(255,255,255,.05);color:#F1DCA0;transition:transform .18s,background .18s,border-color .18s,box-shadow .18s}
.pmc-b:hover i,.pmc-b:focus-visible i{background:rgba(227,189,113,.20);border-color:#E3BD71;transform:translateY(-2px)}
.pmc-b:active i{transform:scale(.94)}
.pmc-b:focus-visible{outline:none}
.pmc-b.pri i{width:64px;height:64px;margin-top:-5px;border:0;background:linear-gradient(135deg,#F7E4A6,#E3BD71 52%,#C4953F);color:#1a1530;box-shadow:0 14px 26px -10px rgba(227,189,113,.7),0 0 0 6px rgba(227,189,113,.13)}
.pmc-b.pri:hover i,.pmc-b.pri:focus-visible i{background:linear-gradient(135deg,#F7E4A6,#E3BD71 52%,#C4953F);filter:brightness(1.07)}
.pmc-b.sh i{background:linear-gradient(135deg,rgba(255,255,255,.12),rgba(255,255,255,.03))}
.pmc-all{display:block;width:max-content;max-width:92%;margin:22px auto 0;color:#F1DCA0;font-weight:700;font-size:14.5px;text-decoration:none;padding:9px 20px;border-radius:999px;border:1px solid rgba(227,189,113,.28);background:rgba(255,255,255,.03);text-align:center}
.pmc-all:hover{background:rgba(227,189,113,.14);border-color:#E3BD71;color:#fff}
.pmc-sm{position:absolute;left:50%;bottom:calc(100% + 10px);transform:translateX(-50%);display:flex;gap:10px;padding:9px 12px;border-radius:999px;background:rgba(14,26,46,.97);border:1px solid rgba(227,189,113,.4);box-shadow:0 18px 40px -12px rgba(0,0,0,.65);z-index:300}
.pmc-sm[hidden]{display:none}
.pmc-sm a{display:grid;place-items:center;width:42px;height:42px;border-radius:50%;text-decoration:none;transition:transform .15s}
.pmc-sm a:hover{transform:translateY(-2px) scale(1.06)}
.pmc-cur{position:absolute;left:0;top:0;width:86px;height:86px;border-radius:50%;display:grid;place-items:center;background:#0b1126;color:#F1DCA0;border:1px solid rgba(227,189,113,.5);font:700 12px/1 var(--font-body,inherit);letter-spacing:.14em;pointer-events:none;opacity:0;z-index:400;transition:opacity .2s;box-shadow:0 12px 30px -8px rgba(0,0,0,.6)}
.pmc-cur.on{opacity:.96}
.pmc-toast{position:fixed;left:50%;bottom:92px;transform:translateX(-50%);max-width:90vw;background:#10193A;color:#fff;padding:11px 20px;border-radius:99px;font-size:14px;text-align:center;opacity:0;pointer-events:none;transition:opacity .25s;z-index:950}
.pmc-toast.on{opacity:1}
@media (hover:hover) and (pointer:fine){.pmc.pmc-js .pmc-stage,.pmc.pmc-js .pmc-s{cursor:none}}
@media (max-width:520px){.pmc{padding:20px 0 26px}.pmc-b{min-width:54px;font-size:11.5px}.pmc-b i{width:50px;height:50px}.pmc-b.pri i{width:60px;height:60px}.pmc-cap{font-size:14px;margin-bottom:14px}}
@media (prefers-reduced-motion:reduce){.pmc-b i{transition:none}}
  </style>

  <div class="pmc" id="pmc" data-c="<?php echo esc_attr(wp_json_encode($pmc, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)); ?>">
    <div class="pmc-badge"><span><?php echo $pmc_star; ?><?php echo esc_html($pmc['name']); ?></span></div>
    <div class="pmc-stage" id="pmcStage" tabindex="0" role="group" aria-roledescription="carousel" aria-label="<?php echo esc_attr($pmc['h2']); ?>">
      <div class="pmc-s is-c"><a href="<?php echo esc_url($pmc_here); ?>"><img alt="<?php echo esc_attr($pmc['alt']); ?>" src="<?php echo esc_url($pmc_img); ?>"></a></div>
    </div>
    <div class="pmc-cap" id="pmcCap" aria-live="polite"><?php echo esc_html($pmc_ref); ?></div>
    <div class="pmc-bar">
      <button type="button" class="pmc-b" id="pmcPrev" aria-label="<?php echo esc_attr($pmc['aprev']); ?>"><i><?php echo $pmc_ic('<path d="M19 12H5M11 6l-6 6 6 6"/>', 1.7); ?></i><span><?php echo esc_html($pmc['prev']); ?></span></button>
      <button type="button" class="pmc-b pri" id="pmcDl" aria-label="<?php echo esc_attr($pmc['adl']); ?>"><i><?php echo $pmc_ic('<path d="M12 4v11M7.5 10.5L12 15l4.5-4.5M5 20h14"/>', 2.2); ?></i><span><?php echo esc_html($pmc['dl']); ?></span></button>
      <button type="button" class="pmc-b sh" id="pmcSh" aria-label="<?php echo esc_attr($pmc['ash']); ?>" aria-haspopup="true"><i><?php echo $pmc_ic('<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.6 10.5l6.8-4M8.6 13.5l6.8 4"/>', 1.9); ?></i><span><?php echo esc_html($pmc['sh']); ?></span></button>
      <button type="button" class="pmc-b" id="pmcNext" aria-label="<?php echo esc_attr($pmc['anext']); ?>"><i><?php echo $pmc_ic('<path d="M5 12h14M13 6l6 6-6 6"/>', 1.7); ?></i><span><?php echo esc_html($pmc['next']); ?></span></button>
      <div class="pmc-sm" id="pmcMenu" hidden>
        <a data-s="wa" href="#" title="WhatsApp" aria-label="WhatsApp" style="background:#25D366"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3a9 9 0 0 0-7.7 13.6L3 21l4.5-1.2A9 9 0 1 0 12 3z"/><path d="M9 8.5c0 3.5 3 6.5 6.5 6.5l1-1.6-2-1-1 .8c-1-.4-2-1.4-2.4-2.4l.8-1-1-2z" fill="#fff" stroke="none"/></svg></a>
        <a data-s="tg" href="#" title="Telegram" aria-label="Telegram" style="background:#229ED9"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 3L3 10.5l6.5 2.5L12 20l2.5-4.5L18.5 18.5z" fill="#fff" stroke="none"/></svg></a>
        <a data-s="fb" href="#" title="Facebook" aria-label="Facebook" style="background:#1877F2"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 21v-8h2.6l.5-3H14V8.3c0-.9.4-1.5 1.6-1.5H17V4.2C16.6 4.1 15.7 4 14.8 4 12.5 4 11 5.4 11 7.8V10H8.5v3H11v8z" fill="#fff" stroke="none"/></svg></a>
        <a data-s="ig" href="#" title="Instagram" aria-label="Instagram" style="background:linear-gradient(45deg,#F58529,#DD2A7B 55%,#8134AF)"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="5"/><circle cx="12" cy="12" r="3.6"/><circle cx="16.8" cy="7.2" r="1" fill="#fff" stroke="none"/></svg></a>
        <a data-s="cp" href="#" title="Copy link" aria-label="Copy link" style="background:#2a3558"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.5.5l3-3a5 5 0 0 0-7-7l-1.7 1.7"/><path d="M14 11a5 5 0 0 0-7.5-.5l-3 3a5 5 0 0 0 7 7l1.7-1.7"/></svg></a>
      </div>
    </div>
    <a class="pmc-all" id="pmcAll" href="<?php echo esc_url($pmc_all); ?>"><?php echo esc_html($pmc['all']); ?> &rarr;</a>
    <div class="pmc-cur" id="pmcCur" aria-hidden="true"><?php echo esc_html($pmc['drag']); ?></div>
  </div>
  <div class="pmc-toast" id="pmcToast" role="status"></div>
  <script>
(function(){
var root=document.getElementById('pmc');if(!root)return;
var C;try{C=JSON.parse(root.getAttribute('data-c'))}catch(e){return}
var stage=document.getElementById('pmcStage'),cursor=document.getElementById('pmcCur'),menu=document.getElementById('pmcMenu'),toast=document.getElementById('pmcToast'),cap=document.getElementById('pmcCap'),allA=document.getElementById('pmcAll');
var L=C.lang,list=[C.id],N=1,pos=0,tgt=0,cur=C.id,nodes={},S=320,raf=0,upT=0;
var reduced=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
root.classList.add('pmc-js');
function say(t){toast.textContent=t;toast.className='pmc-toast on';clearTimeout(say.t);say.t=setTimeout(function(){toast.className='pmc-toast'},2600)}
function thumb(id){return '/picture-messages/img/?f='+id}
function fullUrl(id){return '/picture-messages/img/?f='+id+'&s=full'}
function mod(a,n){return((a%n)+n)%n}
function kx(){return window.innerWidth<600?0.72:0.80}
function win(){return Math.max(0,Math.min(window.innerWidth>900?3:2,Math.floor((N-1)/2)))}
function mk(ab){var n=document.createElement('div');n.className='pmc-s';n.setAttribute('data-ab',ab);var im=new Image();im.alt=C.alt;im.draggable=false;im.decoding='async';im.src=thumb(list[mod(ab,N)]);n.appendChild(im);return n}
function measure(){var f=stage.firstChild;if(f&&f.offsetWidth)S=f.offsetWidth}
function place(n,o){
 var a=Math.abs(o),sg=o<0?-1:1,w=win();
 var k=kx(),x=a<=1?o*S*k:sg*(k+(a-1)*0.44)*S;
 var ry=-sg*Math.min(a,1.6)*30;
 var sc=1-0.13*Math.min(a,2.5);
 var z=-80*Math.min(a,2.5);
 var op=Math.max(0,Math.min(1,(w+0.5-a)/0.6))*(1-0.10*Math.min(a,2));
 n.style.transform='translate3d('+x.toFixed(1)+'px,0,'+z.toFixed(1)+'px) rotateY('+ry.toFixed(2)+'deg) scale('+sc.toFixed(4)+')';
 n.style.opacity=op.toFixed(3);
 n.style.zIndex=String(100-Math.round(a*10));
 n.style.setProperty('--d',(Math.min(a,1)*0.5).toFixed(3));
 if(a<0.5)n.classList.add('is-c');else n.classList.remove('is-c');
 n.style.pointerEvents=op<0.05?'none':'';
}
function render(){
 var base=Math.round(pos),w=win(),keep={},k,ab,n;
 for(k=-w;k<=w;k++){ab=base+k;keep[ab]=1;n=nodes[ab];if(!n){n=mk(ab);nodes[ab]=n;stage.appendChild(n);if(Object.keys(nodes).length===1)measure()}place(n,ab-pos)}
 for(ab in nodes){if(!keep[ab]){stage.removeChild(nodes[ab]);delete nodes[ab]}}
}
function canFull(){var c=navigator.connection;return!(c&&(c.saveData||/2g|3g/.test(c.effectiveType||'')))}
function settle(){
 cur=list[mod(Math.round(pos),N)];
 var m=cur.match(/^(\d+)\.(\d+)/);if(m)cap.textContent=C.ref+' '+m[1]+':'+m[2];
 clearTimeout(upT);
 if(canFull()){var id=cur;upT=setTimeout(function(){var im=new Image();im.onload=function(){if(id!==cur)return;var n=nodes[Math.round(pos)];if(n&&n.firstChild)n.firstChild.src=fullUrl(id)};im.src=fullUrl(id)},400)}
}
function go(t){
 cancelAnimationFrame(raf);tgt=t;
 if(reduced){pos=t;render();settle();return}
 (function f(){var d=t-pos;if(Math.abs(d)<0.003){pos=t;render();settle();return}pos+=d*0.2;render();raf=requestAnimationFrame(f)})();
}
function step(d){if(N<2){say(C.m_retry);return}go(Math.round(tgt)+d)}
document.getElementById('pmcPrev').onclick=function(){step(-1)};
document.getElementById('pmcNext').onclick=function(){step(1)};
stage.addEventListener('keydown',function(e){if(e.key==='ArrowLeft'){e.preventDefault();step(-1)}else if(e.key==='ArrowRight'){e.preventDefault();step(1)}});
/* drag / swipe */
var down=false,moved=false,sx=0,sp=0,lx=0,lt=0,vel=0;
function moveCur(e){if(e.pointerType!=='mouse')return;var r=root.getBoundingClientRect();cursor.style.transform='translate('+(e.clientX-r.left)+'px,'+(e.clientY-r.top)+'px) translate(-50%,-50%)'}
stage.addEventListener('pointerenter',function(e){if(e.pointerType==='mouse'){moveCur(e);cursor.classList.add('on')}});
stage.addEventListener('pointerleave',function(){cursor.classList.remove('on')});
stage.addEventListener('pointerdown',function(e){if(e.button>0)return;down=true;moved=false;sx=lx=e.clientX;sp=pos;lt=e.timeStamp;vel=0;cancelAnimationFrame(raf);try{stage.setPointerCapture(e.pointerId)}catch(x){}stage.classList.add('drag')});
stage.addEventListener('pointermove',function(e){
 moveCur(e);if(!down)return;
 var dx=e.clientX-sx;if(Math.abs(dx)>6)moved=true;
 if(moved){var u=S*kx();pos=sp-dx/u;var dt=e.timeStamp-lt;if(dt>0)vel=(lx-e.clientX)/u/dt;lx=e.clientX;lt=e.timeStamp;render()}
});
function tapAt(e){
 var els=document.elementsFromPoint?document.elementsFromPoint(e.clientX,e.clientY):[],i,ab;
 for(i=0;i<els.length;i++){var s=els[i].closest&&els[i].closest('.pmc-s');if(s){ab=parseInt(s.getAttribute('data-ab'),10);break}}
 if(ab===undefined||isNaN(ab))return;
 if(ab===Math.round(pos)){location.href='/picture-messages/#'+cur}else go(ab);
}
function end(e){
 if(!down)return;down=false;stage.classList.remove('drag');
 if(moved){var t=Math.round(pos+vel*170),b=Math.round(sp);t=Math.max(b-3,Math.min(b+3,t));go(t)}else{tapAt(e)}
}
stage.addEventListener('pointerup',end);stage.addEventListener('pointercancel',end);
window.addEventListener('resize',function(){measure();render()});
/* download + share */
function pageUrl(){return location.origin+'/picture-messages/share/'+cur+'/'}
function blob(){return fetch(fullUrl(cur)).then(function(r){return r.blob()})}
document.getElementById('pmcDl').onclick=function(){
 blob().then(function(b){var u=URL.createObjectURL(b),a=document.createElement('a');a.href=u;a.download='GodAlone-Quran-'+cur+(b.type==='image/jpeg'?'.jpg':'.png');document.body.appendChild(a);a.click();a.remove();setTimeout(function(){URL.revokeObjectURL(u)},4000);say(C.m_dl)}).catch(function(){say(C.m_retry)});
};
document.getElementById('pmcSh').onclick=function(e){e.stopPropagation();menu.hidden=!menu.hidden};
document.addEventListener('click',function(){menu.hidden=true});
document.addEventListener('keydown',function(e){if(e.key==='Escape')menu.hidden=true});
function copy(msg){var u=pageUrl();if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(u).then(function(){say(msg)},function(){say(u)})}else{var t=document.createElement('textarea');t.value=u;document.body.appendChild(t);t.select();try{document.execCommand('copy');say(msg)}catch(x){say(u)}t.remove()}}
menu.addEventListener('click',function(e){
 var a=e.target.closest('a');if(!a)return;e.preventDefault();
 var s=a.getAttribute('data-s'),u=encodeURIComponent(pageUrl()),t=encodeURIComponent(C.share_text);
 if(s==='wa')window.open('https://wa.me/?text='+t+'%20'+u,'_blank','noopener');
 else if(s==='tg')window.open('https://t.me/share/url?url='+u+'&text='+t,'_blank','noopener');
 else if(s==='fb')window.open('https://www.facebook.com/sharer/sharer.php?u='+u,'_blank','noopener');
 else if(s==='cp')copy(C.m_copied);
 else if(s==='ig'){
  if(navigator.canShare&&navigator.share){blob().then(function(b){var f=new File([b],'GodAlone-'+cur+(b.type==='image/jpeg'?'.jpg':'.png'),{type:b.type});if(navigator.canShare({files:[f]}))return navigator.share({files:[f],text:C.name});copy(C.m_ig)}).catch(function(){})}
  else copy(C.m_ig);
 }
 menu.hidden=true;
});
/* load the full list, then start from today's picture */
fetch('/picture-messages/img/?idx=1').then(function(r){return r.json()}).then(function(o){
 var a=[];Object.keys(o).map(Number).sort(function(x,y){return x-y}).forEach(function(s){Object.keys(o[s]).map(Number).sort(function(x,y){return x-y}).forEach(function(v){if(String(o[s][v]).indexOf(L)>-1)a.push(s+'.'+v+(L==='e'?'':L))})});
 if(a.length<2)return;
 list=a;N=a.length;var i=a.indexOf(C.id);pos=tgt=i<0?0:i;
 stage.innerHTML='';nodes={};render();settle();
}).catch(function(){});
stage.innerHTML='';render();
})();
  </script>
</section>
