<?php
/**
 * Template Name: Library
 *
 * Auto-loads for the "Library" page (slug: library) via the WordPress
 * template hierarchy. Migrated from the old godalone-theme into the
 * GodAlone Premium design system. The $books data array, wp_get_attachment_url()
 * cover references, and language-filter JS are preserved unchanged from the
 * original; only the markup/CSS wrapper is restyled to the new theme's
 * design tokens.
 */
if (!defined('ABSPATH')) exit;

// BOOKS DATABASE
$books = array(
	// FIRST 6 BOOKS - Both Free Download AND Physical Purchase
	array(
		'title' => 'Quran: Arabic-English (Revised Edition)',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 556, // WordPress Media Library ID
		'pages' => '724 pages',
		'type' => 'both', // Both download AND purchase
		'description' => 'English translation with Original Arabic Text',
		'download' => '/wp-content/uploads/2021/11/English-Arabic-Quran-Final.pdf',
		'amazon' => 'https://amzn.in/d/0h9pgaP1',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),
	array(
		'title' => 'குர்ஆன்: இறுதி வேதம் (திருத்தப்பட்ட பதிப்பு)',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'Tamil',
		'cover' => 702, // WordPress Media Library ID
		'pages' => '565 pages',
		'type' => 'both',
		'description' => 'தமிழ் மொழிபெயர்ப்பு (அரபு குர்ஆனின் கணித அற்புதத்துடன்)',
		'download' => '/wp-content/uploads/2021/09/TAMIL-QURAN-IRUTHI-VETHAM-.pdf',
		'amazon' => 'https://amzn.in/d/0fd51qtV',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),
	array(
		'title' => 'Quran: English (Revised Edition)',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 509, // WordPress Media Library ID
		'pages' => '560 pages',
		'type' => 'both',
		'description' => 'English Quran (With Mathematical Miracle of Arabic Quran)',
		'download' => '/wp-content/uploads/2021/08/English-Quran-The-Final-Scripture.pdf',
		'amazon' => 'https://amzn.in/d/047W0zWp',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),
	array(
		'title' => 'Quran Hadith and Islam',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 557, // WordPress Media Library ID
		'pages' => '38 pages',
		'type' => 'both',
		'description' => 'Quran Hadith and Islam By Dr.Rashad Khalifa',
		'download' => '/wp-content/uploads/2021/08/Quran-Hadith-Islam-English.pdf',
		'amazon' => 'https://amzn.in/d/0g3tyKP3',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),
	array(
		'title' => 'குர்ஆன் ஹதீஸ் மற்றும் இஸ்லாம்',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'Tamil',
		'cover' => 639, // WordPress Media Library ID
		'pages' => '116 pages',
		'type' => 'both',
		'description' => 'Quran Hadith and Islam - Tamil Version',
		'download' => '/wp-content/uploads/2021/08/Quran-Hadith-Islam-Tamil.pdf',
		'amazon' => 'https://amzn.in/d/0fOLODIt',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),
	array(
		'title' => 'कुरान हदीस और इस्लाम',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'Hindi',
		'cover' => 785, // WordPress Media Library ID
		'pages' => '116 pages',
		'type' => 'both',
		'description' => 'Quran Hadith and Islam - Hindi Version',
		'download' => '/wp-content/uploads/2022/07/Quran-Hadith-and-Islam-Hindi-version.pdf',
		'amazon' => 'https://amzn.in/d/0aSP8spA',
		'flipkart' => 'https://www.flipkart.com/search?q=Quran%20rashad'
	),

	// REMAINING BOOKS - Free Download Only
	array(
		'title' => 'قرآن حدیث اور اسلام',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'Urdu',
		'cover' => 558, // WordPress Media Library ID
		'pages' => '59 pages',
		'type' => 'free', // Free download only
		'description' => 'Quran Hadith and Islam - Urdu Version',
		'download' => '/wp-content/uploads/2021/08/QHI-URDU.pdf',
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => 'Visual Presentation of the Miracle',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 793, // WordPress Media Library ID
		'pages' => '252 pages',
		'type' => 'free', // Free download only
		'description' => 'Explaining Mathematicle Miracle of Quran',
		'download' => '/wp-content/uploads/2021/08/',
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => 'THE COMPUTER SPEAKS',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 773, // WordPress Media Library ID
		'pages' => '280 pages',
		'type' => 'free', // Free download only
		'description' => 'Explaining Mathematicle Miracle of Quran',
		'download' => '/wp-content/uploads/2021/11/the_computer_speaks.pdf',
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => 'Beyond Probability',
		'author' => 'Abdullah Arik',
		'language' => 'English',
		'cover' => 633, // WordPress Media Library ID
		'pages' => '47 pages',
		'type' => 'free', // Free download only
		'description' => 'Explaining Mathematicle Miracle of Quran',
		'download' => '/wp-content/uploads/2021/08/Beyond-Probability.pdf',
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => 'Quranic Prayers & Names of Allah',
		'author' => 'From Quran',
		'language' => 'Tamil',
		'cover' => 801, // WordPress Media Library ID
		'pages' => '90 pages',
		'type' => 'free', // Free download only
		'description' => 'Quranic Prayers & Names of Allah in Arabic,English & Tamil',
		'download' => '/wp-content/uploads/2023/05/Quranic-Prayers-Names-of-Allah.pdf',
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => '64 Collection of Muslim Perspective',
		'author' => 'Dr. Rashad Khalifa',
		'language' => 'English',
		'cover' => 1073, // WordPress Media Library ID
		'pages' => '64 Issues',
		'type' => 'free', // Free download only
		'description' => 'Editor: Rashad Khalifa, Ph.D., From Feb 1985 to March 1990',
		'download' => 'https://www.godalone.in/submitters-perspective/',
		'button_text' => '↗️ Open Page', // Custom button text
		'amazon' => '',
		'flipkart' => ''
	),
	array(
		'title' => 'புதிய நினைவூட்டல்',
		'author' => 'Puthiya Ninaivootal',
		'language' => 'Tamil',
		'cover' => 1077, // WordPress Media Library ID
		'pages' => '26 Books',
		'type' => 'free', // Free download only
		'description' => 'Tamil Monthly Magazine',
		'download' => 'https://www.godalone.in/puthiya-ninaivootal/',
		'button_text' => '↗️ Open Page', // Custom button text
		'amazon' => '',
		'flipkart' => ''
	),
);

get_header();
?>

<style>
.lib-filters{display:flex;justify-content:center;gap:.6rem;flex-wrap:wrap;margin:0 0 30px}
.lib-filter-btn{padding:9px 20px;background:var(--panel-2);color:var(--ink-soft);
  border:2px solid var(--gold);border-radius:20px;cursor:pointer;font-weight:600;
  font-size:.85rem;transition:.2s;font-family:inherit}
.lib-filter-btn:hover{transform:translateY(-2px)}
.lib-filter-btn.active{background:var(--gold-grad);color:#1a1206;box-shadow:0 4px 15px -4px rgba(216,180,94,.6)}
.lib-count{text-align:center;color:var(--muted);margin-bottom:26px;font-size:.9rem}
.lib-count span{color:var(--gold-bright);font-weight:700}
.book-card{display:flex;flex-direction:column;overflow:hidden}
.book-cover{position:relative;width:100%;height:0;padding-bottom:135%;overflow:hidden;
  background:linear-gradient(135deg,var(--panel-2),var(--panel));border-radius:var(--radius);margin-bottom:14px}
.book-cover img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:contain;
  object-position:center;padding:10px}
.book-pages-badge{position:absolute;bottom:8px;right:8px;color:var(--gold-bright);font-size:.72rem;
  font-weight:700;background:rgba(20,15,8,.75);padding:4px 10px;border-radius:12px}
.lang-badge{display:inline-block;padding:3px 11px;border-radius:10px;font-size:.68rem;
  font-weight:700;margin-bottom:.6rem;width:fit-content;color:#fff}
.lang-english{background:#4A90E2}.lang-tamil{background:#E74C3C}.lang-hindi{background:#FF6B35}
.lang-urdu{background:#9B59B6}.lang-arabic{background:#27AE60}.lang-other{background:var(--gold)}
.book-actions{margin-top:auto;display:flex;flex-direction:column;gap:8px;padding-top:10px}
.lib-no-results{display:none;text-align:center;padding:40px 0;color:var(--muted)}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">📚 Library</h1>
    <p class="hero-sub">"Read in the name of your Lord." — Quran 96:1. Alhamdulillah,
    every book below is free to download.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">

    <div class="lib-filters">
      <button class="lib-filter-btn active" data-language="all">🌍 All Languages</button>
      <button class="lib-filter-btn" data-language="English">🇬🇧 English</button>
      <button class="lib-filter-btn" data-language="Tamil">🇮🇳 தமிழ்</button>
      <button class="lib-filter-btn" data-language="Hindi">🇮🇳 हिंदी</button>
      <button class="lib-filter-btn" data-language="Urdu">🇵🇰 اردو</button>
    </div>

    <div class="lib-count">
      <p>Showing <span id="visibleCount"><?php echo count($books); ?></span> of <?php echo count($books); ?> books</p>
    </div>

    <div class="grid grid-4" id="booksGrid">
      <?php foreach ($books as $book): ?>
      <div class="card book-card reveal" data-language="<?php echo esc_attr($book['language']); ?>">
        <div class="book-cover">
          <img src="<?php echo esc_url(wp_get_attachment_url($book['cover'])); ?>"
               alt="<?php echo esc_attr($book['title']); ?>"
               loading="lazy">
          <span class="book-pages-badge"><?php echo esc_html($book['pages']); ?></span>
        </div>
        <span class="lang-badge lang-<?php echo strtolower(esc_attr($book['language'])); ?>"><?php echo esc_html($book['language']); ?></span>
        <h3 style="font-size:1.05rem;margin-bottom:.3rem"><?php echo esc_html($book['title']); ?></h3>
        <p style="font-size:.82rem;color:var(--muted);font-style:italic;margin-bottom:.5rem">by <?php echo esc_html($book['author']); ?></p>
        <p style="font-size:.85rem;color:var(--ink-soft);flex-grow:1"><?php echo esc_html($book['description']); ?></p>
        <div class="book-actions">
          <?php if ($book['type'] === 'both'): ?>
            <a href="<?php echo esc_url($book['download']); ?>" class="btn btn-gold" style="font-size:.85rem;padding:10px"
               <?php if (strpos($book['download'], 'http') === false): ?>download<?php endif; ?> target="_blank" rel="noopener">
              <?php echo isset($book['button_text']) ? esc_html($book['button_text']) : '📥 Free Download'; ?>
            </a>
<?php if (!empty($book['amazon'])): ?>
<a href="<?php echo esc_url($book['amazon']); ?>" class="btn btn-green" style="font-size:.85rem;padding:10px" target="_blank" rel="noopener">
🛒 Purchase
</a>
<?php endif; ?>
          <?php elseif ($book['type'] === 'free'): ?>
            <a href="<?php echo esc_url($book['download']); ?>" class="btn btn-gold" style="font-size:.85rem;padding:10px"
               <?php if (strpos($book['download'], 'http') === false): ?>download<?php endif; ?> target="_blank" rel="noopener">
              <?php echo isset($book['button_text']) ? esc_html($book['button_text']) : '📥 Free Download'; ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="lib-no-results">
      <p>😔 No books found in this language.</p>
      <p>Try selecting a different language filter.</p>
    </div>

  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar-verse" style="font-family:var(--font-ar);direction:rtl;font-size:1.55rem;color:var(--gold-bright);text-align:center;margin:0 0 .7em">رَبِّ زِدْنِي عِلْمًا</p>
    <blockquote>"My Lord, increase me in knowledge."</blockquote>
    <cite>Quran 20:114</cite>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterBtns = document.querySelectorAll('.lib-filter-btn');
  const bookCards = document.querySelectorAll('.book-card');
  const noResults = document.querySelector('.lib-no-results');
  const visibleCount = document.getElementById('visibleCount');

  filterBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      filterBtns.forEach(function(b) { b.classList.remove('active'); });
      this.classList.add('active');

      const selectedLanguage = this.getAttribute('data-language');
      let visibleBooks = 0;

      bookCards.forEach(function(card) {
        const cardLanguage = card.getAttribute('data-language');
        if (selectedLanguage === 'all' || cardLanguage === selectedLanguage) {
          card.style.display = 'flex';
          visibleBooks++;
        } else {
          card.style.display = 'none';
        }
      });

      visibleCount.textContent = visibleBooks;
      noResults.style.display = visibleBooks === 0 ? 'block' : 'none';
    });
  });
});
</script>

<?php get_footer(); ?>
