<?php
/**
 * Template Name: Puthiya Ninaivootal
 * Description: Beautiful Tamil Book Library Collection - 26 Books
 *
 * Restyled to the GodAlone Premium design system (matches page-library.php's
 * pattern). The $books data array and wp_get_attachment_url() cover/PDF
 * references are unchanged from what was supplied; only the markup/CSS
 * wrapper uses the theme's shared design tokens (--gold, --panel, --ink,
 * .page-hero, .wrap, .blk, .grid, .card, .btn) instead of undefined ones.
 */
if (!defined('ABSPATH')) exit;

get_header();

// Define all 26 books with their details
$books = array(
	array('title' => 'Book 1',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 643, 'pdf' => 644, 'description' => 'Sep 1999'),
	array('title' => 'Book 2',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 651, 'pdf' => 652, 'description' => 'Oct 1999'),
	array('title' => 'Book 3',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 662, 'pdf' => 663, 'description' => 'Nov 1999'),
	array('title' => 'Book 4',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 664, 'pdf' => 665, 'description' => 'Dec 1999'),
	array('title' => 'Book 5',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 670, 'pdf' => 671, 'description' => 'Jan 2000'),
	array('title' => 'Book 6',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 676, 'pdf' => 678, 'description' => 'Feb 2000'),
	array('title' => 'Book 7',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 681, 'pdf' => 679, 'description' => 'Mar 2000'),
	array('title' => 'Book 8',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 707, 'pdf' => 706, 'description' => 'Apl 2000'),
	array('title' => 'Book 9',  'author' => 'புதிய நினைவூட்டல்', 'cover' => 715, 'pdf' => 714, 'description' => 'May 2000'),
	array('title' => 'Book 10', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 712, 'pdf' => 711, 'description' => 'Jun 2000'),
	array('title' => 'Book 11', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 719, 'pdf' => 720, 'description' => 'Jul 2000'),
	array('title' => 'Book 12', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 723, 'pdf' => 722, 'description' => 'Aug 2000'),
	array('title' => 'Book 13', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 730, 'pdf' => 726, 'description' => 'Sep 2000'),
	array('title' => 'Book 14', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 733, 'pdf' => 727, 'description' => 'Oct 2000'),
	array('title' => 'Book 15', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 735, 'pdf' => 728, 'description' => 'Nov 2000'),
	array('title' => 'Book 16', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 738, 'pdf' => 736, 'description' => 'Dec 2000'),
	array('title' => 'Book 17', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 742, 'pdf' => 740, 'description' => 'Jan 2001'),
	array('title' => 'Book 18', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 746, 'pdf' => 744, 'description' => 'Feb 2001'),
	array('title' => 'Book 19', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 750, 'pdf' => 748, 'description' => 'Mar 2001'),
	array('title' => 'Book 20', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 752, 'pdf' => 753, 'description' => 'Apr 2001'),
	array('title' => 'Book 21', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 755, 'pdf' => 756, 'description' => 'May 2001'),
	array('title' => 'Book 22', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 761, 'pdf' => 759, 'description' => 'Jun 2001'),
	array('title' => 'Book 23', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 762, 'pdf' => 760, 'description' => 'Jul 2001'),
	array('title' => 'Book 24', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 771, 'pdf' => 769, 'description' => 'Aug 2001'),
	array('title' => 'Book 25', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 777, 'pdf' => 779, 'description' => 'Sep 2001'),
	array('title' => 'Book 26', 'author' => 'புதிய நினைவூட்டல்', 'cover' => 778, 'pdf' => 776, 'description' => 'Oct 2001'),
);
?>

<style>
.pn-card{display:flex;flex-direction:column;overflow:hidden}
.pn-cover{position:relative;width:100%;height:0;padding-bottom:135%;overflow:hidden;
  background:linear-gradient(135deg,var(--panel-2),var(--panel));border-radius:var(--radius);margin-bottom:14px}
.pn-cover img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:contain;object-position:center;padding:10px}
.pn-cover .pn-fallback{position:absolute;top:0;left:0;width:100%;height:100%;display:flex;
  align-items:center;justify-content:center;font-size:2.6rem;color:var(--gold)}
.pn-month{display:inline-block;padding:3px 11px;border-radius:10px;font-size:.72rem;font-weight:700;
  margin-bottom:.5rem;width:fit-content;background:rgba(216,180,94,.14);color:var(--gold-bright)}
.pn-actions{display:flex;flex-direction:column;gap:.6rem;margin-top:auto;padding-top:.8rem}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">📚 Puthiya Ninaivootal</h1>
    <p class="hero-sub" style="font-family:'Noto Sans Tamil',sans-serif;font-size:1.3rem">புதிய நினைவூட்டல்</p>
    <p class="hero-sub">A collection of 26 Tamil Islamic reminders dedicated to spreading the message
    of Submission to God Alone. Free to read and download, Insha'Allah.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-4">
      <?php foreach ($books as $book): ?>
      <div class="card pn-card reveal">
        <div class="pn-cover">
          <?php $cover_url = wp_get_attachment_url($book['cover']); ?>
          <?php if ($cover_url): ?>
            <img src="<?php echo esc_url($cover_url); ?>" alt="<?php echo esc_attr($book['title']); ?>" loading="lazy">
          <?php else: ?>
            <span class="pn-fallback">📖</span>
          <?php endif; ?>
        </div>
        <span class="pn-month"><?php echo esc_html($book['description']); ?></span>
        <h3 style="font-size:1.05rem;margin-bottom:.3rem"><?php echo esc_html($book['title']); ?></h3>
        <p style="font-size:.82rem;color:var(--muted);font-style:italic;margin-bottom:.8rem"><?php echo esc_html($book['author']); ?></p>
        <div class="pn-actions">
          <?php $pdf_url = wp_get_attachment_url($book['pdf']); ?>
          <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-gold" style="font-size:.85rem;padding:10px" target="_blank" rel="noopener noreferrer">👁️ View PDF</a>
          <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-ghost" style="font-size:.85rem;padding:10px" download>📥 Download</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
