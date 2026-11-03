<?php
/**
 * Template Name: Check it yourself
 *
 * Simple 5-minute check of the 19 facts. Every fact comes from the site's own
 * Mathematical Miracle page. Routed in functions.php (same pattern as /faq).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:middle;line-height:1.55;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{color:var(--ink);font-weight:600}
.who .num{font-size:1.15rem;font-weight:700;color:var(--gold-bright);white-space:nowrap}
.who .res{color:var(--ink-soft);white-space:nowrap}
.who .res b{color:var(--gold-bright);font-size:1.1rem}
.n{display:inline-flex;width:24px;height:24px;border-radius:50%;background:var(--gold-grad);color:#fff;font-size:13px;font-weight:700;align-items:center;justify-content:center;margin-right:6px}
.dots{margin:0;padding-left:20px;color:var(--ink);line-height:1.8}
.dots li{margin-bottom:8px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:600px){.who th,.who td{padding:10px 10px;font-size:.93rem}.who .res{white-space:normal}}
</style>

<style>/*mob-who*/@media(max-width:560px){.who{font-size:.9rem}.who th,.who td{padding:10px 8px}.who td:first-child{width:auto}.who td.num{font-size:.95rem}.who td.res{white-space:nowrap}.who .n{margin-right:4px}}</style>

<div class="page-hero">
 <div class="wrap">
  <div class="crumb">GodAlone.in</div>
  <h1 class="reveal">Check It Yourself in 5 Minutes</h1>
  <p class="hero-sub">Explore these numbers yourself using a calculator, and see how they work.</p>
 </div>
</div>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">1</div><h2>What You Need</h2></div>
  <div class="stack">
   <div class="card reveal"><ul class="dots"><li>A phone or calculator</li><li>About 5 minutes</li><li>An open mind and a willingness to check the numbers</li></ul></div>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">2</div><h2>Try These Calculations</h2><p>The following examples are presented in the mathematical framework described by Dr. Rashad Khalifa. Check the do the calculations yourself.</p></div>
  <div class="stack">
   <table class="who">
    <thead><tr><th>What to check</th><th>Number</th><th>Calculation</th></tr></thead>
    <tbody>
<tr><td><span class="n">1</span> There are 114 chapters in the Quran</td><td class="num">114</td><td class="res">&divide; 19 = <b>6</b> ✔</td></tr>
<tr><td><span class="n">2</span> The total number of verses in the Quran</td><td class="num">6,346</td><td class="res">&divide; 19 = <b>334</b> ✔</td></tr>
<tr><td><span class="n">3</span> God&rsquo;s name in Arabic, &ldquo;Allah,&rdquo; occurs in the Quran</td><td class="num">2,698</td><td class="res">&divide; 19 = <b>142</b> ✔</td></tr>
<tr><td><span class="n">4</span> If you add the numbers of the verses where &ldquo;Allah&rdquo; occurs, the total is</td><td class="num">118,123</td><td class="res">&divide; 19 = <b>6,217</b> ✔</td></tr>
    </tbody>
   </table>
   <p style="margin-top:16px">These calculations produce whole numbers when divided by 19. You can verify each division yourself.</p>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">3</div><h2>Check the Numbers Step by Step</h2></div>
  <div class="stack">
   <div class="card reveal">
    <ol class="steps">
     <li>Open your calculator.</li>
     <li>Enter <b>114 &divide; 19</b>. The result is 6.</li>
     <li>Enter <b>6,346 &divide; 19</b>. The result is 334.</li>
     <li>Enter <b>2,698 &divide; 19</b>. The result is 142.</li>
     <li>Enter <b>118,123 &divide; 19</b>. The result is 6,217.</li>
     <li>You can also use our <a href="<?php echo esc_url(home_url('/calculator-19')); ?>">19 Calculator</a> to check the calculations.</li>
    </ol>
   </div>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">4</div><h2>Explore Further</h2></div>
  <div class="stack">
   <div class="card reveal">
    <p>These examples are an introduction to the mathematical claims associated with the Quran&rsquo;s number 19. The arithmetic is easy to check; understanding the counting methods behind the numbers requires additional investigation.</p>
    <p>Explore the full explanation, examine the evidence, and decide what conclusions you believe the evidence supports.</p>
   </div>
   <p class="big" style="text-align:center;margin-top:10px"><strong>Continue your study:</strong></p>
   <div class="cta-row">
    <a class="btn btn-gold" href="<?php echo esc_url(home_url('/calculator-19')); ?>">🔢 Use the 19 Calculator</a>
    <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/mathematical-miracle')); ?>">📐 Explore the Mathematical Miracle</a>
    <a class="btn btn-ghost" href="https://godalone.in/quran/" target="_blank" rel="noopener">💻 Read the Quran Online</a>
   </div>
   <p class="big" style="text-align:center;margin-top:22px">Read carefully. Check independently. Seek the truth.</p>
   <p style="text-align:center">May God guide us all to the right path, increase our knowledge, and help us understand His Scripture.</p>
  </div>
 </div>
</section>

<?php get_footer(); ?>
