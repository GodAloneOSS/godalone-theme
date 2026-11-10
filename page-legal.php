<?php
/**
 * Template Name: About / Privacy / Copyright
 * One template for three simple pages. Routed in functions.php (query var ga_legal).
 */
if (!defined('ABSPATH')) exit;
$k = get_query_var('ga_legal');
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
.who td:first-child{font-weight:600;color:var(--ink)}
.who td:last-child{color:var(--gold-tan);white-space:nowrap;width:90px}
.big{font-size:1.25rem;color:var(--ink);text-align:center;margin:0 0 6px}
.dots{margin:0;padding-left:20px;color:var(--ink);line-height:1.8}
.dots li{margin-bottom:8px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:560px){.who th,.who td{padding:12px}}
</style>
<?php if ($k === 'about') : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">GodAlone.in</div><h1 class="reveal">About Us</h1><p class="hero-sub">God Alone, and the Quran Alone.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>Who we are</h3><p>GodAlone.in is a free website that shares God&rsquo;s message, the Quran, in simple language. Our aim is simple: God Alone, and the Quran Alone.</p></div>
 <div class="card reveal"><h3>What we believe</h3><ul class="dots"><li>There is only one God, and He alone deserves our worship and obedience.</li><li>The Quran is God&rsquo;s complete and fully detailed book (6:114, 6:115).</li><li>We follow the Quran only, and not any other human-made religious book.</li><li>The only religion approved by God is Submission to Him (3:19).</li></ul></div>
 <div class="card reveal"><h3>What you can find here</h3><p>The online Quran with audio, a Quran app, free books, videos, a 19 Calculator, a Zakat and Ramadan calculator, and simple pages for people who are new.</p></div>
 <div class="card reveal"><h3>Our sister sites</h3><p><a href="https://kadavulmattum.org" target="_blank" rel="noopener">Kadavulmattum.org</a> (Tamil) and <a href="https://ekkhuda.org" target="_blank" rel="noopener">Ekkhuda.org</a> (Hindi).</p></div>
 <div class="card reveal"><h3>Who runs this site</h3><p>The GodAlone.in team, a few friends who love the Quran.</p></div>
 <div class="card reveal"><h3>Contact</h3><p>Please write to us on the <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact page</a>, or email <a href="mailto:info@godalone.in">info@godalone.in</a>.</p></div>
</div></div></section>
<?php elseif ($k === 'privacy-policy') : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">GodAlone.in</div><h1 class="reveal">Privacy Policy</h1><p class="hero-sub">We collect very little. We do not sell your information to anyone.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>What we collect</h3><ul class="dots"><li><b>Contact form:</b> your name, email and message, only so we can reply to you.</li><li><b>Newsletter:</b> your email address, only to send you the newsletter. You can ask us to remove it at any time.</li><li><b>Quran Quiz:</b> the name you type is used only to show your certificate.</li><li><b>Ordinary site records:</b> like most websites, our hosting records basic visit information (such as the page visited and the browser type) to keep the site working and safe.</li></ul></div>
 <div class="card reveal"><h3>If you sign in with Google (optional)</h3><p>You never need an account to read. If you choose &ldquo;Sign in with Google&rdquo;, we receive your name, email address and profile picture from Google. We use them only to greet you and to keep your own things in step across your devices: bookmarks, display settings (language, theme, text size), your saved prayer-time place, your reading streak and quiz scores. This is stored with Google Firebase and is readable only from your own account. We do not sell it and we do not use it for advertising. If you tick &ldquo;Add me to the community list&rdquo;, we also keep your name, email address and language so we can write to you; you can untick it at any time.</p></div>
 <div class="card reveal"><h3>Ask Bayyinah (AI study assistant)</h3><p>The question you type, together with a few Quran verses chosen as context, is sent through our server to an AI service (Google Gemini or Groq) so that an answer can be written. Please do not type personal information. Questions are not linked to your account.</p></div>
 <div class="card reveal"><h3>Phone number (optional)</h3><p>You never need to give a phone number to read. If you choose to give one, for example on our contact form or to receive Quran messages, we use it only to reply to you or to send the messages you asked for. We do not sell it and we do not use it for advertising. You can ask us to delete it at any time by writing to <a href="mailto:info@godalone.in">info@godalone.in</a>.</p></div>
 <div class="card reveal"><h3>Location, prayer and Ramadan times</h3><p>To show prayer (salat) and Ramadan timings, you choose a place yourself, such as a city, and we can save that place in your account if you are signed in. Our pages do not need your exact position. If a feature asks to use your device location and you allow it, we use it only to work out those timings. We do not sell it and we do not use it for advertising. You can say no, or change the permission at any time in your phone or browser settings.</p></div>
 <div class="card reveal"><h3>Other services</h3><p>Our pages load fonts from Google Fonts, and the Quran audio reader may use Google&rsquo;s text-to-speech service. Quran recitation audio is streamed from the Islamic Network audio library. These services may see your IP address when they load. Links to YouTube, WhatsApp, Telegram, Facebook, X, GitHub, Amazon and Flipkart open those sites, and they have their own privacy rules.</p></div>
 <div class="card reveal"><h3>Cookies</h3><p>We use only the small files needed to make the site work and load fast (for example, remembering light or dark mode).</p></div>
 <div class="card reveal"><h3>Your choices</h3><p>You can ask us to show, correct or delete your information by writing to <a href="mailto:info@godalone.in">info@godalone.in</a>. If you signed in with Google, you can delete your account and everything saved with it yourself, at any time, on the <a href="/delete-account/">Delete my account</a> page.</p></div>
 <div class="card reveal"><h3>Children</h3><p>This site is for everyone, but we do not knowingly collect information from young children.</p></div>
 <div class="card reveal"><h3>Changes</h3><p>If we change this page, the new date will be shown here. Last updated: 5 November 2026.</p></div>
</div></div></section>
<?php else : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">GodAlone.in</div><h1 class="reveal">Copyright and Use</h1><p class="hero-sub">Open source, free to share.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>Open source, free to share</h3><p>GodAlone.in is open source and free. The website code is open on <a href="https://github.com/kadavulmattum" target="_blank" rel="noopener">GitHub</a>.</p></div>
 <div class="card reveal"><h3>The Quran</h3><p>The Quran is God&rsquo;s book, and we do not claim it as ours. You are welcome to read it, share it and give it to others.</p></div>
 <div class="card reveal"><h3>Translations and books</h3><p>Some translations and books on this site are the work of other authors, and belong to them. Please share them freely, without changing the text, and keep the author&rsquo;s name.</p></div>
 <div class="card reveal"><h3>Please do</h3><ul class="dots"><li>Share our pages and links freely.</li><li>Tell us if you find any mistake, so we can correct it.</li></ul></div>
 <div class="card reveal"><h3>Please do not</h3><ul class="dots"><li>Change God&rsquo;s words or the meaning of a verse.</li><li>Sell our free material as your own, or use this site&rsquo;s name to say things we did not say.</li></ul></div>
</div></div></section>
<?php endif; ?>

<?php get_footer(); ?>
