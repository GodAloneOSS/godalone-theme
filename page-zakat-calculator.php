<?php
/**
 * Zakat Calculator — computes the 2.5% obligatory charity (Zakat) due on
 * net income (Quran 6:141, 2:215, 7:156). Fully self-contained: markup +
 * scoped <style> + inline <script>, matching this theme's convention for
 * page-specific interactive templates (same pattern as page-calculator-19.php).
 * This page's WP Page (slug zakat-calculator) already has its Template
 * attribute set to this file, so no rewrite-rule routing is needed here.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">💰 Obligatory Charity (Zakat)</h1>
    <p class="reveal zk-sub">Zakat is 2.5% of your net income, due the day you receive it — enter an amount below to calculate what is owed.</p>
  </div>
</div>

<section class="blk zk-sec">
  <div class="wrap">

    <div class="zk-card reveal">
      <label class="zk-label" for="zkIncome">Enter income to calculate zakat :</label>
      <div class="zk-inputwrap">
        <input type="text" inputmode="decimal" autocomplete="off" spellcheck="false" id="zkIncome" class="zk-input" placeholder="e.g. 50000">
        <span class="zk-hint">× 2.5%</span>
      </div>
      <div class="zk-actions">
        <button type="button" id="zkCalc" class="btn btn-gold">🧮 Calculate</button>
        <button type="button" id="zkClear" class="btn btn-ghost">🗑️ Clear</button>
      </div>
      <div class="zk-result" id="zkResult" hidden></div>
    </div>

    <div class="card zk-article reveal">
      <h3>Obligatory Charity (Zakat)</h3>
      <p>The obligatory charity (Zakat) must be given away "on the day of harvest" (6:141). Whenever we receive "net income," we must set aside 2.5% and give it to the specified recipients &mdash; the parents, relatives, orphans, the poor, and the traveling alien, in this order (2:215). The vital importance of Zakat is reflected in God's law: "My mercy encompasses all things, but I will specify it for the righteous who give Zakat" (7:156).</p>
    </div>

    <div class="grid zk-verses">

      <div class="card zk-verse reveal">
        <div class="zk-cite">Quran 6:141</div>
        <div class="zk-ar">وَهُوَ الَّذى أَنشَأَ جَنّٰتٍ مَعروشٰتٍ وَغَيرَ مَعروشٰتٍ وَالنَّخلَ وَالزَّرعَ مُختَلِفًا أُكُلُهُ وَالزَّيتونَ وَالرُّمّانَ مُتَشٰبِهًا وَغَيرَ مُتَشٰبِهٍ كُلوا مِن ثَمَرِهِ إِذا أَثمَرَ وَءاتوا حَقَّهُ يَومَ حَصادِهِ وَلا تُسرِفوا إِنَّهُ لا يُحِبُّ المُҳرِفينَ</div>
        <p class="zk-tr">He is the One who established gardens, trellised and untrellised, and palm trees, and crops with different tastes, and olives, and pomegranate &mdash; fruits that are similar, yet dissimilar. Eat from their fruits if they ripen, and give the due alms on the day of harvest, and do not waste anything. He does not love the wasters.</p>
        <p class="zk-fn"><strong>Foot Note:</strong> Zakat charity is so important, the Most Merciful has restricted His mercy to those who give it (7:156). Yet, the corrupted Muslims have lost this most important commandment; they give Zakat only once a year. We see here that Zakat must be given away "on the day we receive income." The proportion that came to us through Abraham is 2.5% of our net income.</p>
      </div>

      <div class="card zk-verse reveal">
        <div class="zk-cite">Quran 2:215</div>
        <div class="zk-ar">يَسـَٔلونَكَ ماذا يُنفِقونَ قُل ما أَنفَقتُم مِن خَيرٍ فَلِلوٰلِدَينِ وَالأَقرَبينَ وَاليَتٰمىٰ وَالمَسٰكينِ وَابنِ السَّبيلِ وَما تَفعَلوا مِن خَيرٍ فَإِنَّ اللَّهَ بِهِ عَليمٌ</div>
        <p class="zk-tr">They ask you about giving: say, "The charity you give shall go to the parents, the relatives, the orphans, the poor, and the traveling alien." Any good you do, God is fully aware thereof.</p>
      </div>

      <div class="card zk-verse reveal">
        <div class="zk-cite">Quran 7:156</div>
        <div class="zk-ar">وَاكتُب لَنا فى هٰذِهِ الدُّنيا حَسَنَةً وَفِى الـٔاخِرَةِ إِنّا هُدنا إِلَيكَ قالَ عَذابى أُصيبُ بِهِ مَن أَشاءُ وَرَحمَتى وَسِعَت كُلَّ شَىءٍ فَҳَأَكتُبُها لِلَّذينَ يَتَّقونَ وَيُؤتونَ الزَّكوٰةَ وَالَّذينَ هُم بِـٔايٰتِنا يُؤمِنونَ</div>
        <p class="zk-tr">"And decree for us righteousness in this world, and in the Hereafter. We have repented to You." He said, "My retribution befalls whomever I will. But My mercy encompasses all things. However, I will specify it for those who (1) lead a righteous life, (2) give the obligatory charity (Zakat), (3) believe in our revelations, and&hellip;"</p>
        <p class="zk-fn"><strong>Foot Note:</strong> The importance of the obligatory charity (Zakat) cannot be over emphasized. As instituted in 6:141, Zakat must be given away upon receiving any income &mdash; 2.5% of one's net income must be given to the parents, the relatives, the orphans, the poor, and the traveling alien, in this order (see 2:215).</p>
      </div>

    </div>

    <div class="zk-charity reveal">
      <a class="btn btn-gold" href="<?php echo esc_url(home_url('/charity/')); ?>">❤️ Submitter Charity Trust</a>
    </div>

  </div>
</section>

<style>
.zk-sub{max-width:640px;margin:14px auto 0;color:var(--ink-soft);font-size:clamp(15px,2vw,17.5px)}
.zk-sec{padding-top:56px}
.zk-card{max-width:640px;margin:0 auto 40px;padding:36px 32px;border-radius:var(--radius-lg);
  background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid var(--line-2);
  box-shadow:var(--shadow-sm)}
.zk-label{display:block;font-weight:700;font-size:14px;letter-spacing:.3px;color:var(--ink-soft);margin-bottom:10px}
.zk-inputwrap{position:relative}
.zk-input{width:100%;box-sizing:border-box;padding:20px 84px 20px 20px;border-radius:14px;
  border:1px solid var(--line);background:var(--bg-2);color:var(--ink);
  font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(20px,4vw,28px);letter-spacing:.5px;transition:border-color .2s,box-shadow .2s}
.zk-input:focus{outline:none;border-color:var(--gold);box-shadow:0 0 0 3px rgba(216,180,94,.15)}
.zk-input.err{border-color:#f87171;animation:zkshake .32s}
@keyframes zkshake{0%,100%{transform:translateX(0)}25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}
.zk-hint{position:absolute;right:18px;top:50%;transform:translateY(-50%);color:var(--muted);
  font-weight:600;font-size:15px;pointer-events:none}
.zk-actions{display:flex;gap:14px;margin-top:20px;flex-wrap:wrap}
.zk-actions .btn{flex:1;min-width:150px}
.zk-result{margin-top:26px;padding:28px 22px;border-radius:16px;text-align:center;
  border:1px solid rgba(52,211,153,.4);background:rgba(52,211,153,.08);animation:zkin .3s ease}
@keyframes zkin{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.zk-r-icon{width:52px;height:52px;margin:0 auto 14px;border-radius:50%;display:grid;place-items:center;
  font-size:24px;background:rgba(52,211,153,.15);color:#34d399}
.zk-r-title{font-size:clamp(22px,3.6vw,28px);margin:0 0 8px;color:#34d399}
.zk-r-formula{font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(15px,2.6vw,19px);color:var(--ink);word-break:break-all;margin-bottom:8px}
.zk-r-note{color:var(--muted);font-size:14.5px;margin:0}
.zk-article{max-width:820px;margin:0 auto 40px;padding:32px}
.zk-article h3{margin-top:0}
.zk-article p{color:var(--ink-soft);line-height:1.75;margin:0}
.zk-article a{color:var(--gold-tan);text-decoration:underline}
.zk-verses{grid-template-columns:1fr;gap:22px;max-width:820px;margin:0 auto}
.zk-verse{padding:30px 28px}
.zk-cite{font-weight:700;letter-spacing:1.5px;text-transform:uppercase;font-size:13px;color:var(--gold-tan);margin-bottom:14px}
.zk-cite a{color:inherit;text-decoration:none}
.zk-cite a:hover{text-decoration:underline}
.zk-ar{font-family:var(--font-ar);direction:rtl;text-align:right;font-size:clamp(19px,3vw,24px);
  line-height:2;color:var(--ink);margin-bottom:16px}
.zk-tr{color:var(--ink-soft);line-height:1.75;margin:0 0 12px;font-style:italic;font-family:var(--font-display)}
.zk-fn{color:var(--muted);font-size:14px;line-height:1.7;margin:0;padding-top:12px;border-top:1px dashed var(--line-2)}
.zk-charity{text-align:center;margin-top:46px}
@media(max-width:560px){
  .zk-card{padding:26px 20px}
  .zk-actions .btn{min-width:0}
  .zk-verse{padding:24px 20px}
}
</style>

<script>
(function () {
  "use strict";
  var input = document.getElementById("zkIncome");
  var resultBox = document.getElementById("zkResult");
  var calcBtn = document.getElementById("zkCalc");
  var clearBtn = document.getElementById("zkClear");

  function formatMoney(n) {
    var fixed = n.toFixed(2);
    var parts = fixed.split(".");
    var intPart = parts[0];
    var out = "";
    var count = 0;
    for (var i = intPart.length - 1; i >= 0; i--) {
      out = intPart.charAt(i) + out;
      count++;
      if (count % 3 === 0 && i !== 0) out = "," + out;
    }
    return out + "." + parts[1];
  }

  function sanitize(raw) {
    var s = String(raw).replace(/[^0-9.]/g, "");
    var firstDot = s.indexOf(".");
    if (firstDot !== -1) {
      s = s.slice(0, firstDot + 1) + s.slice(firstDot + 1).replace(/\./g, "");
    }
    return s;
  }

  function showError() {
    resultBox.hidden = true;
    input.classList.remove("err");
    void input.offsetWidth;
    input.classList.add("err");
    input.focus();
    setTimeout(function () { input.classList.remove("err"); }, 350);
  }

  function calculate() {
    var digits = sanitize(input.value);
    var income = parseFloat(digits);
    if (!digits || isNaN(income) || income <= 0) {
      showError();
      return;
    }
    input.value = digits;

    var zakat = income * 0.025;

    resultBox.hidden = false;
    resultBox.innerHTML =
      '<div class="zk-r-icon">💰</div>' +
      '<h3 class="zk-r-title">Zakat: ' + formatMoney(zakat) + '</h3>' +
      '<div class="zk-r-formula">' + formatMoney(income) + ' &times; 2.5%</div>' +
      '<p class="zk-r-note">This is the obligatory charity due on this income (Quran 6:141, 2:215).</p>';
    resultBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
  }

  function clearAll() {
    input.value = "";
    resultBox.hidden = true;
    resultBox.innerHTML = "";
    input.focus();
  }

  calcBtn.addEventListener("click", calculate);
  clearBtn.addEventListener("click", clearAll);
  input.addEventListener("keydown", function (evt) {
    if (evt.key === "Enter") calculate();
  });
})();
</script>

<?php get_footer(); ?>
