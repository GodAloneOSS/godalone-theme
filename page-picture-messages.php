<?php
/**
 * Template Name: Picture Messages
 * Quran verse pictures (English / Tamil / Hindi). Files are read from
 * wp-content/uploads/picture-messages and picked up automatically.
 */
if (!defined('ABSPATH')) exit;
get_header();
$idx = function_exists('ga_pm_index') ? ga_pm_index() : array();
?>
<style>
.pm-wrap{max-width:1100px;margin:0 auto}
.pm-tabs,.pm-chips{display:flex;flex-wrap:wrap;gap:8px;margin:0 0 14px}
.pm-tabs button,.pm-chips button{border:1px solid rgba(231,200,119,.3);background:#1f2850;color:#eef2ff;padding:9px 16px;border-radius:999px;font:inherit;font-size:.95rem;cursor:pointer}
.pm-tabs button.on,.pm-chips button.on{background:linear-gradient(92deg,#caa43d,#e7c877 60%,#d6b25e);color:#1a1530;border-color:transparent;font-weight:700}
.pm-chips{max-height:132px;overflow:auto;padding:2px}
.pm-chips button{padding:6px 12px;font-size:.88rem}
.pm-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:18px;margin-top:6px}
.pm-card{margin:0;background:#1a2040;border:1px solid rgba(231,200,119,.22);border-radius:16px;overflow:hidden;display:flex;flex-direction:column}
.pm-img{display:block;width:100%;padding:0;border:0;background:#f4f4f0;cursor:zoom-in;line-height:0}
.pm-img img{width:100%;height:auto;display:block;min-height:140px;object-fit:contain}
.pm-strip,.pm-lb .pm-strip{background:linear-gradient(90deg,#141a36,#1f2850 50%,#caa43d 85%,#e7c877 100%);color:#fff;text-align:center;font-weight:700;letter-spacing:.3px;padding:7px 8px;font-size:.95rem;text-shadow:0 1px 2px rgba(0,0,0,.35)}
.pm-card figcaption{padding:10px 14px 4px;font-size:.92rem;opacity:.85}
.pm-act{display:flex;gap:8px;padding:6px 12px 14px}
.pm-act button{flex:1;border:1px solid rgba(238,242,255,.3);background:transparent;color:#eef2ff;border-radius:10px;padding:9px 6px;font:inherit;font-size:.9rem;cursor:pointer}
.pm-act button:hover{border-color:#e7c877}
.pm-empty{padding:30px;text-align:center;opacity:.8}
.pm-lb{position:fixed;inset:0;background:rgba(0,0,0,.86);z-index:9999;display:none;align-items:center;justify-content:center;padding:14px;overflow:auto}
.pm-lb.on{display:flex}
.pm-lb .box{max-width:min(94vw,560px);width:100%;background:#1a2040;border-radius:14px;overflow:hidden}
.pm-lb img{width:100%;display:block}
.pm-lb .pm-act{padding:10px 12px}
.pm-note{font-size:.9rem;opacity:.8;margin-top:18px}
@media(max-width:560px){.pm-grid{grid-template-columns:1fr 1fr;gap:12px}.pm-act{flex-direction:column}.pm-card figcaption{font-size:.85rem}}
.page-hero{background:linear-gradient(135deg,#141a36,#1f2850 55%,#2a2f5c)!important}
.page-hero .crumb{color:#e7c877!important}
body{background:#101530!important}
body::before,body::after{background:#101530!important}
:root{--bg:#101530!important}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">Quran Picture Messages</h1>
    <p class="hero-sub">Beautiful verses to read, download and share. God Alone &amp; Quran Alone.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap pm-wrap">
    <div class="pm-tabs" id="pmTabs" role="tablist" aria-label="Language"></div>
    <div class="pm-chips" id="pmChips" aria-label="Sura"></div>
    <div class="pm-grid" id="pmGrid"></div>
    <p class="pm-note">New pictures are added regularly, Insha Allah. Please share them freely and keep the website name on them.</p>
  </div>
</section>

<div class="pm-lb" id="pmLb" role="dialog" aria-modal="true">
  <div class="box">
    <img id="pmLbImg" alt="">
    <div class="pm-strip">GodAlone.in</div>
    <div class="pm-act">
      <button type="button" id="pmLbDl">⬇ Download</button>
      <button type="button" id="pmLbSh">📲 Share</button>
      <button type="button" id="pmLbX">✕ Close</button>
    </div>
  </div>
</div>

<script>
(function(){
var D = <?php echo wp_json_encode($idx); ?>;
var BASE = <?php echo wp_json_encode(home_url('/picture-messages/img/')); ?>;
var NAMES = ["Al-Fatiha","Al-Baqarah","Al-Imran","An-Nisa","Al-Ma'idah","Al-An'am","Al-A'raf","Al-Anfal","At-Tawbah","Yunus","Hud","Yusuf","Ar-Ra'd","Ibrahim","Al-Hijr","An-Nahl","Al-Isra","Al-Kahf","Maryam","Ta-Ha","Al-Anbiya","Al-Hajj","Al-Mu'minun","An-Nur","Al-Furqan","Ash-Shu'ara","An-Naml","Al-Qasas","Al-Ankabut","Ar-Rum","Luqman","As-Sajdah","Al-Ahzab","Saba","Fatir","Ya-Sin","As-Saffat","Sad","Az-Zumar","Ghafir","Fussilat","Ash-Shura","Az-Zukhruf","Ad-Dukhan","Al-Jathiyah","Al-Ahqaf","Muhammad","Al-Fath","Al-Hujurat","Qaf","Adh-Dhariyat","At-Tur","An-Najm","Al-Qamar","Ar-Rahman","Al-Waqi'ah","Al-Hadid","Al-Mujadila","Al-Hashr","Al-Mumtahanah","As-Saff","Al-Jumu'ah","Al-Munafiqun","At-Taghabun","At-Talaq","At-Tahrim","Al-Mulk","Al-Qalam","Al-Haqqah","Al-Ma'arij","Nuh","Al-Jinn","Al-Muzzammil","Al-Muddaththir","Al-Qiyamah","Al-Insan","Al-Mursalat","An-Naba","An-Nazi'at","Abasa","At-Takwir","Al-Infitar","Al-Mutaffifin","Al-Inshiqaq","Al-Buruj","At-Tariq","Al-A'la","Al-Ghashiyah","Al-Fajr","Al-Balad","Ash-Shams","Al-Layl","Ad-Duha","Ash-Sharh","At-Tin","Al-Alaq","Al-Qadr","Al-Bayyinah","Az-Zalzalah","Al-Adiyat","Al-Qari'ah","At-Takathur","Al-Asr","Al-Humazah","Al-Fil","Quraysh","Al-Ma'un","Al-Kawthar","Al-Kafirun","An-Nasr","Al-Masad","Al-Ikhlas","Al-Falaq","An-Nas"];
var LABEL = {e:'English', t:'தமிழ்', h:'हिन्दी'};
var lang = 'e', sura = null;
var tabsEl = document.getElementById('pmTabs'), chipsEl = document.getElementById('pmChips'), gridEl = document.getElementById('pmGrid');
function count(l){var n=0;Object.keys(D).forEach(function(s){Object.keys(D[s]).forEach(function(v){if(D[s][v][l])n++;});});return n;}
function surasFor(l){return Object.keys(D).filter(function(s){return Object.keys(D[s]).some(function(v){return D[s][v][l];});}).map(Number).sort(function(a,b){return a-b;});}
function stem(s,v,l){return s+'.'+v+(l==='e'?'':l);}
function thumb(st){return BASE+'?f='+st;}
function drawTabs(){
  tabsEl.innerHTML='';
  ['e','t','h'].forEach(function(l){
    var b=document.createElement('button');b.type='button';b.textContent=LABEL[l]+' ('+count(l)+')';
    if(l===lang)b.className='on';
    b.onclick=function(){lang=l;sura=null;draw();};
    tabsEl.appendChild(b);
  });
}
function drawChips(){
  chipsEl.innerHTML='';
  var list=surasFor(lang);
  if(sura===null||list.indexOf(sura)<0)sura=list.length?list[0]:null;
  list.forEach(function(s){
    var b=document.createElement('button');b.type='button';b.textContent=s+'. '+(NAMES[s-1]||'Sura '+s);
    if(s===sura)b.className='on';
    b.onclick=function(){sura=s;draw();};
    chipsEl.appendChild(b);
  });
}
function ref(st){var m=st.match(/^(\d+)\.(\d+)/);return 'Quran '+m[1]+':'+m[2];}
function drawGrid(){
  gridEl.innerHTML='';
  if(sura===null){gridEl.innerHTML='<div class="pm-empty">Pictures for this language are coming soon, Insha Allah.</div>';return;}
  var verses=Object.keys(D[sura]).map(Number).sort(function(a,b){return a-b;});
  verses.forEach(function(v){
    if(!D[sura][v][lang])return;
    var st=stem(sura,v,lang);
    var f=document.createElement('figure');f.className='pm-card';
    f.innerHTML='<button type="button" class="pm-img" aria-label="Open '+ref(st)+'"><img loading="lazy" decoding="async" alt="'+ref(st)+'" src="'+thumb(st)+'"></button>'+
      '<div class="pm-strip">GodAlone.in</div>'+
      '<figcaption>'+sura+':'+v+' · '+(NAMES[sura-1]||'')+'</figcaption>'+
      '<div class="pm-act"><button type="button" data-a="dl">⬇ Download</button><button type="button" data-a="sh">📲 Share</button></div>';
    f.querySelector('.pm-img').onclick=function(){openLb(st);};
    f.querySelector('[data-a=dl]').onclick=function(){download(st);};
    f.querySelector('[data-a=sh]').onclick=function(){share(st);};
    gridEl.appendChild(f);
  });
}
function draw(){drawTabs();drawChips();drawGrid();}

/* Picture + colourful website-name line, drawn in the browser (original file is never changed) */
function compose(st){
  return new Promise(function(res,rej){
    var im=new Image();
    im.onload=function(){
      var W=im.naturalWidth,H=im.naturalHeight,S=Math.round(W*0.085);
      var c=document.createElement('canvas');c.width=W;c.height=H+S;
      var x=c.getContext('2d');
      x.fillStyle='#fff';x.fillRect(0,0,W,H+S);
      x.drawImage(im,0,0);
      var g=x.createLinearGradient(0,0,W,0);
      [[0,'#141a36'],[.5,'#1f2850'],[.85,'#caa43d'],[1,'#e7c877']].forEach(function(s){g.addColorStop(s[0],s[1]);});
      x.fillStyle=g;x.fillRect(0,H,W,S);
      x.fillStyle='#fff';x.textAlign='center';x.textBaseline='middle';
      x.font='700 '+Math.round(S*0.52)+'px system-ui,Arial,sans-serif';
      x.shadowColor='rgba(0,0,0,.35)';x.shadowBlur=S*0.08;
      x.fillText('GodAlone.in',W/2,H+S/2+1);
      c.toBlob(function(b){b?res(b):rej();},'image/jpeg',0.92);
    };
    im.onerror=rej;
    im.src=BASE+'?s=full&f='+st;
  });
}
function fname(st){return 'GodAlone-Quran-'+st+'.jpg';}
function download(st){
  compose(st).then(function(b){
    var a=document.createElement('a');a.href=URL.createObjectURL(b);a.download=fname(st);
    document.body.appendChild(a);a.click();
    setTimeout(function(){URL.revokeObjectURL(a.href);a.remove();},2000);
  }).catch(function(){window.open(BASE+'?s=full&f='+st,'_blank');});
}
function share(st){
  var link=location.origin+location.pathname+'#'+st;
  var text=ref(st)+' - GodAlone.in';
  function fallback(){ window.open('https://wa.me/?text='+encodeURIComponent(text+' '+link),'_blank'); }
  compose(st).then(function(b){
    var file=new File([b],fname(st),{type:'image/jpeg'});
    if(navigator.canShare&&navigator.canShare({files:[file]})){
      navigator.share({files:[file],text:text}).catch(function(err){
        if(err&&err.name==='AbortError')return;
        fallback();
      });
    } else {
      fallback();
    }
  }).catch(fallback);
}
var lb=document.getElementById('pmLb'),lbImg=document.getElementById('pmLbImg'),cur=null;
function openLb(st){cur=st;lbImg.src=BASE+'?s=full&f='+st;lbImg.alt=ref(st);lb.className='pm-lb on';}
function closeLb(){lb.className='pm-lb';lbImg.src='';}
document.getElementById('pmLbX').onclick=closeLb;
document.getElementById('pmLbDl').onclick=function(){if(cur)download(cur);};
document.getElementById('pmLbSh').onclick=function(){if(cur)share(cur);};
lb.addEventListener('click',function(e){if(e.target===lb)closeLb();});
document.addEventListener('keydown',function(e){if(e.key==='Escape')closeLb();});

/* Deep link: /picture-messages/#3.2t */
var h=(location.hash||'').replace('#','');var m=h.match(/^(\d+)\.(\d+)([th]?)$/);
if(m){lang=m[3]===''?'e':m[3];sura=parseInt(m[1],10);}
draw();
if(m)openLb(h);
})();
</script>
<?php get_footer(); ?>
