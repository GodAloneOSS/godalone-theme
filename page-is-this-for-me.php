<?php
/**
 * Template Name: Is this for me?
 *
 * Simple welcome page for new visitors. Routed in functions.php (no wp-admin page;
 * same pattern as /faq). Quran verses copied from the site's own English Quran data.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.en-s{font-size:1.02rem;line-height:1.8;color:var(--ink-soft);margin:0 0 .6em}
.vc{margin-top:14px;padding:16px 16px 10px;border-radius:14px;background:rgba(0,0,0,.18);border:1px solid var(--line)}
.vc cite{display:block;font-style:normal;font-weight:600;font-size:13px;letter-spacing:.5px;color:var(--gold-tan);text-align:center;padding-bottom:4px}
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:top;line-height:1.6;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{font-weight:600;color:var(--ink);width:38%}
.who td:last-child{color:var(--ink-soft)}
.big{font-size:1.25rem;color:var(--ink);text-align:center;margin:0 0 6px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:560px){.who td:first-child{width:42%}.who th,.who td{padding:12px}}
</style>

<div class="page-hero">
 <div class="wrap">
  <div class="crumb">GodAlone.in</div>
  <h1 class="reveal">Is this for me?</h1>
  <p class="hero-sub">Whether you are new to the Quran, curious to learn, or searching for the truth, you are welcome here. Explore God's message in the Quran and discover how to worship God Alone and live according to His guidance. May God guide us all to the right path.</p>
 </div>
</div>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">1</div><h2>Who Is This for?</h2></div>
  <div class="stack">
   <table class="who">
    <thead><tr><th>If you are...</th><th>Then...</th></tr></thead>
    <tbody>
<tr><td>A Muslim from any group or tradition</td><td>You are welcome. Explore the Quran's message to worship God Alone, and examine everything in the light of God's Scripture.</td></tr>
<tr><td>A Christian or a Jew</td><td>You are welcome. Read what the Quran says about God and His revelations, and reflect on its message with an open mind.</td></tr>
<tr><td>A Hindu, Buddhist, or someone from another religious background</td><td>You are welcome. Explore the Quran, ask questions, and consider its message freely.</td></tr>
<tr><td>Someone with no religious belief</td><td>You are welcome. Examine the message, consider the evidence, and reach your own conclusions.</td></tr>
<tr><td>Someone with doubts or difficult questions</td><td>You are welcome. Ask questions, think carefully, and check what you read against the Quran. Honest questions are part of the search for understanding.</td></tr>
    </tbody>
   </table>
   <p class="big" style="margin-top:18px"><strong>Our purpose is to encourage everyone to seek the truth, worship God Alone, and learn from His Scripture, the Quran.</strong></p>
   <p>May God guide us all to the right path and increase our knowledge.</p>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">2</div><h2>Is There Any Pressure or Compulsion?</h2></div>
  <div class="stack">
   <div class="card reveal"><p class="big">No.</p><p>This website does not pressure you to join any group, give money, or sign anything. You are free to read, reflect, ask questions, and examine the message for yourself.</p><p>God says:</p><div class="vc"><p class="en-s">&ldquo;There shall be no compulsion in religion: the right way is now distinct from the wrong way. Anyone who denounces the devil and believes in God has grasped the strongest bond; one that never breaks. God is Hearer, Omniscient.&rdquo;</p><cite>Quran 2:256</cite></div></div>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">3</div><h2>What is the one request?</h2></div>
  <div class="stack">
   <div class="card reveal"><p class="big">Worship God Alone.</p><p>Do not set up anyone beside Him.</p><div class="vc"><p class="en-s">&ldquo;Say, “O followers of the scripture, let us come to a logical agreement between us and you: that we shall not worship except God; that we never set up any idols besides Him, nor set up any human beings as lords beside God.” If they turn away, say, “Bear witness that we are submitters.”&rdquo;</p><cite>Quran 3:64</cite></div></div>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">4</div><h2>Are only &ldquo;our&rdquo; people good?</h2></div>
  <div class="stack">
   <div class="card reveal"><p class="big">No.</p><p>God knows what is in every person's heart and what each person does.</p><p>Our religious labels, family backgrounds, and communities do not make us automatically righteous. God calls us to believe in Him, do good deeds, and live righteously.</p><p>God says:</p><div class="vc"><p class="en-s">&ldquo;Surely, those who believe, those who are Jewish, the Christians, and the converts; anyone who (1) believes in God, and (2) believes in the Last Day, and (3) leads a righteous life, will receive their recompense from their Lord. They have nothing to fear, nor will they grieve.&rdquo;</p><cite>Quran 2:62</cite></div><div class="vc"><p class="en-s">&ldquo;O people, we created you from the same male and female, and rendered you distinct peoples and tribes, that you may recognize one another. The best among you in the sight of God is the most righteous. God is Omniscient, Cognizant.&rdquo;</p><cite>Quran 49:13</cite></div></div>
  </div>
 </div>
</section>

<section class="blk">
 <div class="wrap">
  <div class="sec-head"><div class="kicker">5</div><h2>Where do I start?</h2></div>
  <div class="stack">
   <div class="card reveal">
    <ol class="steps">
     <li>Read the <a href="<?php echo esc_url(home_url('/introduction')); ?>">Introduction</a>.</li>
     <li>See the <a href="<?php echo esc_url(home_url('/mathematical-miracle')); ?>">Mathematical Miracle</a>. Check the numbers yourself.</li>
     <li>Read the <a href="https://godalone.in/quran/" target="_blank" rel="noopener">Quran online</a> in your language.</li>
    </ol>
   </div>
   <div class="cta-row">
    <a class="btn btn-gold" href="<?php echo esc_url(home_url('/introduction')); ?>">📖 Introduction</a>
    <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/mathematical-miracle')); ?>">🔢 Mathematical Miracle</a>
    <a class="btn btn-ghost" href="https://godalone.in/quran/" target="_blank" rel="noopener">💻 Read the Quran</a>
   </div>
  </div>
 </div>
</section>

<?php get_footer(); ?>
