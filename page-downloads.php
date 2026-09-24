<?php
/**
 * Template Name: Download Quran
 *
 * Auto-loads for the "Downloads" page (slug: downloads) via the WordPress
 * template hierarchy. Migrated from the old godalone-theme into the
 * GodAlone Premium design system.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">Download Quran</h1>
    <p class="hero-sub">Download the Final Testament — God's message to
    humanity — in multiple formats and languages, Insha'Allah.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">🧠 AI-Powered</div>
      <h2>Quran WebApp</h2>
    </div>
    <div class="grid" style="max-width:480px;margin:0 auto">
      <a class="card reveal" href="https://godalone.in/quran/">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/icon-quran-webapp-ai.png')); ?>" alt="Quran WebApp with Advanced AI Features" loading="lazy"></div>
        <h3>Quran WebApp with Advanced AI Features</h3>
        <p>Available in Arabic, English, Tamil &amp; Hindi</p>
        <span class="go">Open Quran WebApp →</span>
      </a>
    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">📱 Android</div>
      <h2>Android apps</h2>
    </div>
    <div class="grid grid-3">
      <a class="card reveal" href="https://play.google.com/store/apps/details?id=ws.submission.my" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/app-icon-english-multilang.png')); ?>" alt="English and Multi-Language Quran app icon" loading="lazy"></div>
        <h3>English &amp; Multi-Language</h3>
        <p>Complete Quran app with multiple language support — multi-language, Salat reminder, Qiblah compass.</p>
        <span class="go">Download from Play Store →</span>
      </a>
      <a class="card reveal" href="https://play.google.com/store/apps/details?id=io.united.quran.v2" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/app-icon-arabic-english-tamil.png')); ?>" alt="Arabic, English and Tamil Quran app icon" loading="lazy"></div>
        <h3>Arabic, English &amp; Tamil</h3>
        <p>Quran in Arabic with English and Tamil translations — free download.</p>
        <span class="go">Download from Play Store →</span>
      </a>
      <a class="card reveal" href="https://submission.ws/download-quran-reader-for-android-authorized-english-version-of-quran-translated-from-the-original-by-dr-rashad-khalifa/" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/icon-google-play-books.png')); ?>" alt="Google Play Books icon" loading="lazy"></div>
        <h3>Google Play Book Reader</h3>
        <p>Dr. Rashad Khalifa's authorized English translation, with a built-in dictionary, for computer &amp; mobile.</p>
        <span class="go">Download Book Reader →</span>
      </a>
    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">🍏 iOS</div>
      <h2>iPhone &amp; iPad apps</h2>
    </div>
    <div class="grid grid-2">
      <a class="card reveal" href="https://apps.apple.com/us/app/submission-the-only-religion/id687445823?ls=1" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/app-icon-english-multilang-ios.png')); ?>" alt="English and Multi-Language Quran app icon for iOS" loading="lazy"></div>
        <h3>English &amp; Multi-Language</h3>
        <p>"Submission — The Only Religion" app for iOS devices, with multi-language support and Salat reminders.</p>
        <span class="go">Download from App Store →</span>
      </a>
      <a class="card reveal" href="https://apps.apple.com/us/app/quran-study-learn-word-by-word/id1447827034" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/icon-quran-study-word-by-word.png')); ?>" alt="Quran Study Word by Word icon" loading="lazy"></div>
        <h3>Quran Study — Word by Word</h3>
        <p>Detailed word-by-word English translation, root words, and study features.</p>
        <span class="go">Download from App Store →</span>
      </a>
    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">📄 PDF</div>
      <h2>PDF downloads</h2>
    </div>
    <div class="grid grid-3">
      <a class="card reveal" href="https://kadavulmattum.org/wp-content/uploads/2020/06/Tamil-Quran-Iruthi-vetham.pdf" target="_blank" rel="noopener">
        <div class="ico"><img src="<?php echo esc_url(content_url('uploads/downloads/icon-tamil-quran-pdf.png')); ?>" alt="Tamil Quran PDF icon" loading="lazy"></div>
        <h3>Tamil Quran PDF</h3>
        <p>இறுதி வேதம் — the complete Quran in the Tamil language, free download.</p>
        <span class="go">Download Tamil PDF →</span>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
