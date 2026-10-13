<?php
/**
 * Template Name: Library
 *
 * Auto-loads for the "Library" page (slug: library) via the WordPress
 * template hierarchy. Migrated from the old godalone-theme into the
 * GodAlone Premium design system. The /*
 * Books come from the shared feed so one list serves godalone.in,
 * kadavulmattum.org and ekkhuda.org. Add a book in books.json only.
 * Cached 12 hours in the ga_library_books_v3 transient.
 */
$ga_feed  = 'https://godalone.in/wp-content/uploads/data/books.json';
$ga_books = get_transient( 'ga_library_books_v3' );
if ( false === $ga_books ) {
	$ga_res = wp_remote_get( $ga_feed, array( 'timeout' => 10 ) );
	if ( ! is_wp_error( $ga_res ) && 200 === (int) wp_remote_retrieve_response_code( $ga_res ) ) {
		$ga_data = json_decode( wp_remote_retrieve_body( $ga_res ), true );
		if ( ! empty( $ga_data['books'] ) && is_array( $ga_data['books'] ) ) {
			$ga_books = $ga_data['books'];
			set_transient( 'ga_library_books_v3', $ga_books, 12 * HOUR_IN_SECONDS );
		}
	}
}
if ( ! is_array( $ga_books ) ) {
	$ga_books = array();
}

$ga_lang_names = array( 'en' => 'English', 'ta' => 'Tamil', 'hi' => 'Hindi', 'ur' => 'Urdu' );

$books = array();
foreach ( $ga_books as $ga_b ) {
	$ga_code = isset( $ga_b['lang'] ) ? $ga_b['lang'] : '';
	$ga_row  = array(
		'title'       => isset( $ga_b['title']['en'] ) ? $ga_b['title']['en'] : '',
		'author'      => isset( $ga_b['author']['en'] ) ? $ga_b['author']['en'] : '',
		'language'    => isset( $ga_lang_names[ $ga_code ] ) ? $ga_lang_names[ $ga_code ] : '',
		'cover'       => isset( $ga_b['coverId'] ) ? (int) $ga_b['coverId'] : 0,
		'pages'       => isset( $ga_b['pagesLabel']['en'] ) ? $ga_b['pagesLabel']['en'] : '',
		'type'        => ! empty( $ga_b['purchase'] ) ? 'both' : 'free',
		'description' => isset( $ga_b['desc']['en'] ) ? $ga_b['desc']['en'] : '',
		'download'    => ! empty( $ga_b['page'] ) ? $ga_b['page'] : ( isset( $ga_b['download'] ) ? $ga_b['download'] : '' ),
		'amazon'      => isset( $ga_b['purchase'] ) ? $ga_b['purchase'] : '',
		'flipkart'    => '',
	);
	if ( ! empty( $ga_b['page'] ) ) {
		$ga_row['button_text'] = '↗️ Open Page';
	}
	$books[] = $ga_row;
}

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
      <button class="lib-filter-btn" data-language="English">English</button>
      <button class="lib-filter-btn" data-language="Tamil">தமிழ்</button>
      <button class="lib-filter-btn" data-language="Hindi">हिंदी</button>
      <button class="lib-filter-btn" data-language="Urdu">اردو</button>
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
