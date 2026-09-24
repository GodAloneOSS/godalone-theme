<?php if (!defined('ABSPATH')) exit; ?>

<!-- ══════════ HERO ══════════ -->
<section class="hero">
  <div class="hero-inner">
    <div class="flourish reveal"><i></i></div>
    <div class="bism reveal">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
    <div class="bism-en reveal">In the name of God, Most Gracious, Most Merciful</div>
    <h1 class="reveal"><span class="l1">Happiness is</span><span class="l2 gold">Submission to God Alone</span></h1>
    <p class="hero-sub reveal">God created us to worship Him alone — with absolute submission, free from all forms of idol worship. This is God's final message to humanity.</p>
    <div class="hero-cta reveal">
      <a class="btn btn-gold" href="<?php echo esc_url(home_url('/quran/')); ?>" target="_blank" rel="noopener">📖 Read the Quran</a>
      <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/introduction')); ?>">Learn the Message →</a>
    </div>
  </div>
</section>

<!-- ══════════ VERSE ══════════ -->
<div class="verse">
  <div class="q">”</div>
  <blockquote class="reveal">The only religion approved by God is Submission.</blockquote>
  <cite class="reveal">— Quran 3 : 19</cite>
</div>

<!-- ══════════ EXPLORE ══════════ -->
<section class="blk">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal">Explore</span>
      <h2 class="reveal">Discover the Message</h2>
      <p class="reveal">Everything you need to study, understand, and share the Final Testament.</p>
    </div>
    <div class="grid grid-4">
      <?php
      $cards = array(
        array('<img src="'.content_url('/uploads/card-icons/icon-math-miracle.png').'" alt="Mathematical Miracle">','Mathematical Miracle','The incredible patterns based on number 19 that prove the Quran\'s divine origin.','Discover', home_url('/mathematical-miracle'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-quran-downloads.png').'" alt="Quran Downloads">','Quran Downloads','Download the Quran for computer, mobile apps, and PDF formats.','Download', home_url('/downloads'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-quran-audio.png').'" alt="Quran Audio">','Quran Audio','Beautiful recitations in Arabic with English and Tamil translations.','Listen', home_url('/audio-quran'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-purchase-quran.png').'" alt="Purchase Quran">','Purchase Quran','Order physical copies through Amazon and Flipkart India.','Shop Now', '#buy', 'buy'),
        array('<img src="'.content_url('/uploads/card-icons/icon-book-library.png').'" alt="Book Library">','Book Library','Our comprehensive collection of books about Submission.','Browse', home_url('/library'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-submission-videos.png').'" alt="Submission Videos">','Submission Videos','Dr. Rashad Khalifa\'s videos and Friday sermons.','Watch', home_url('/videos'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-charity-trust.png').'" alt="Charity Trust">','Charity Trust','Support charitable work and the spread of God\'s message.','Contribute', home_url('/charity'), ''),
        array('<img src="'.content_url('/uploads/card-icons/icon-quran-qa.png').'" alt="Quran Q&A">','Quran Q&A','Test and improve our understanding through simple questions from the Quran.','Take the Quiz', home_url('/quran-qa'), ''),
      );
      foreach ($cards as $c) {
        list($icon,$title,$desc,$cta,$url,$mode) = $c;
        $cls = $mode === 'buy' ? 'card reveal gh-buy' : 'card reveal';
        $href = $mode === 'buy' ? '#buy' : $url;
        echo '<a class="'.$cls.'" href="'.esc_url($href).'">'
           . '<span class="ico">'.$icon.'</span>'
           . '<h3>'.esc_html($title).'</h3>'
           . '<p>'.esc_html($desc).'</p>'
           . '<span class="go">'.esc_html($cta).' →</span></a>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ══════════ UTILITIES ══════════ -->
<section class="blk utils">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal">🛠️ Islamic Utilities</span>
      <h2 class="reveal">Tools for Every Submitter</h2>
      <p class="reveal">Calculations, prayer times &amp; educational resources.</p>
    </div>
    <div class="util-grid">
      <?php
      $utils = array(
        array('<img src="' . esc_url(content_url('uploads/card-icons/icon-coloring-book.png')) . '" alt="Quran Coloring Book" loading="lazy">','Quran Coloring Book','Color Quran stories online or print', home_url('/coloring-book'),''),
        array('<img src="' . esc_url(content_url('uploads/card-icons/icon-calculator-19.png')) . '" alt="19 Calculator" loading="lazy">','19 Calculator','Check divisibility by 19', home_url('/calculator-19'),''),
        array('<img src="' . esc_url(content_url('uploads/card-icons/icon-salat-ramadan.png')) . '" alt="Salat & Ramadan Timing" loading="lazy">','Salat & Ramadan Timing','Accurate prayer times', home_url('/salat-timing'),''),
        array('<img src="' . esc_url(content_url('uploads/card-icons/icon-utility.png')) . '" alt="Utility" loading="lazy">','Utility','Fasting dates &amp; times', home_url('/ramadan-calculator'),''),
        array('<img src="' . esc_url(content_url('uploads/card-icons/icon-zakat-calculator.png')) . '" alt="Zakat Calculator" loading="lazy">','Zakat Calculator','Quran-based calculator', home_url('/zakat-calculator'),''),
      );
      foreach ($utils as $u) {
        list($icon,$title,$sub,$url,$tgt) = $u;
        $t = $tgt === '_blank' ? ' target="_blank" rel="noopener"' : '';
        echo '<a class="util reveal" href="'.esc_url($url).'"'.$t.'>'
           . '<span class="ui">'.$icon.'</span>'
           . '<b>'.$title.'</b><span>'.$sub.'</span></a>';
      }
      ?>
    </div>
  </div>
</section>
