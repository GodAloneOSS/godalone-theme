<?php
/**
 * Template Name: Submitters Perspective
 * Description: 64-issue Muslim Perspective / Submitters Perspective newsletter archive
 * (Feb 1985 - Mar 1990), including 2 special bonus issues.
 *
 * Restyled to the GodAlone Premium design system (matches page-library.php /
 * page-puthiya-ninaivootal.php pattern). The $newsletters data array and all
 * title/date/bonus business logic are unchanged from what was supplied; only
 * the markup/CSS wrapper uses the theme's shared design tokens (--gold,
 * --panel, --ink, .page-hero, .wrap, .blk, .grid, .card, .btn) instead of
 * undefined ones. A file_exists() check was added so a PDF that hasn't been
 * uploaded yet (currently: September 1989) shows "Coming Soon" instead of a
 * dead link.
 */
if (!defined('ABSPATH')) exit;

get_header();

// All 64 newsletter issues with their dates.
$newsletters = array(
    array('issue' => 1, 'month' => 'February', 'year' => 1985, 'pdf' => 'SP1985feb.pdf'),
    array('issue' => 2, 'month' => 'March', 'year' => 1985, 'pdf' => 'SP1985mar.pdf'),
    array('issue' => 3, 'month' => 'April', 'year' => 1985, 'pdf' => 'SP1985apr.pdf'),
    array('issue' => 4, 'month' => 'May', 'year' => 1985, 'pdf' => 'SP1985may.pdf'),
    array('issue' => 5, 'month' => 'June', 'year' => 1985, 'pdf' => 'SP1985jun.pdf'),
    array('issue' => 6, 'month' => 'July', 'year' => 1985, 'pdf' => 'SP1985jul.pdf'),
    array('issue' => 7, 'month' => 'August', 'year' => 1985, 'pdf' => 'SP1985aug.pdf'),
    array('issue' => 8, 'month' => 'September', 'year' => 1985, 'pdf' => 'SP1985sep.pdf'),
    array('issue' => 9, 'month' => 'October', 'year' => 1985, 'pdf' => 'SP1985oct.pdf'),
    array('issue' => 10, 'month' => 'November', 'year' => 1985, 'pdf' => 'SP1985nov.pdf'),
    array('issue' => 11, 'month' => 'December', 'year' => 1985, 'pdf' => 'SP1985dec.pdf'),

    array('issue' => 12, 'month' => 'January', 'year' => 1986, 'pdf' => 'SP1986jan.pdf'),
    array('issue' => 13, 'month' => 'February', 'year' => 1986, 'pdf' => 'SP1986feb.pdf'),
    array('issue' => 14, 'month' => 'March', 'year' => 1986, 'pdf' => 'SP1986mar.pdf'),
    array('issue' => 15, 'month' => 'April', 'year' => 1986, 'pdf' => 'SP1986apr.pdf'),
    array('issue' => 16, 'month' => 'May', 'year' => 1986, 'pdf' => 'SP1986may.pdf'),
    array('issue' => 17, 'month' => 'June', 'year' => 1986, 'pdf' => 'SP1986jun.pdf'),
    array('issue' => 18, 'month' => 'July', 'year' => 1986, 'pdf' => 'SP1986jul.pdf'),
    array('issue' => 19, 'month' => 'August', 'year' => 1986, 'pdf' => 'SP1986aug.pdf'),
    array('issue' => 20, 'month' => 'September', 'year' => 1986, 'pdf' => 'SP1986sep.pdf'),
    array('issue' => 21, 'month' => 'October', 'year' => 1986, 'pdf' => 'SP1986oct.pdf'),
    array('issue' => 22, 'month' => 'November', 'year' => 1986, 'pdf' => 'SP1986nov.pdf'),
    array('issue' => 23, 'month' => 'December', 'year' => 1986, 'pdf' => 'SP1986dec.pdf'),

    array('issue' => 24, 'month' => 'January', 'year' => 1987, 'pdf' => 'SP1987jan.pdf'),
    array('issue' => 25, 'month' => 'February', 'year' => 1987, 'pdf' => 'SP1987feb.pdf'),
    array('issue' => 26, 'month' => 'March', 'year' => 1987, 'pdf' => 'SP1987mar.pdf'),
    array('issue' => 27, 'month' => 'April', 'year' => 1987, 'pdf' => 'SP1987apr.pdf'),
    array('issue' => 28, 'month' => 'May', 'year' => 1987, 'pdf' => 'SP1987may.pdf'),
    array('issue' => 29, 'month' => 'June', 'year' => 1987, 'pdf' => 'SP1987jun.pdf'),
    array('issue' => 30, 'month' => 'July', 'year' => 1987, 'pdf' => 'SP1987jul.pdf'),
    array('issue' => 31, 'month' => 'August', 'year' => 1987, 'pdf' => 'SP1987aug.pdf'),
    array('issue' => 32, 'month' => 'September', 'year' => 1987, 'pdf' => 'SP1987sep.pdf'),
    array('issue' => 33, 'month' => 'October', 'year' => 1987, 'pdf' => 'SP1987oct.pdf'),
    array('issue' => 34, 'month' => 'November', 'year' => 1987, 'pdf' => 'SP1987nov.pdf'),
    array('issue' => 35, 'month' => 'December', 'year' => 1987, 'pdf' => 'SP1987dec.pdf'),

    array('issue' => 36, 'month' => 'January', 'year' => 1988, 'pdf' => 'SP1988jan.pdf'),
    array('issue' => 37, 'month' => 'February', 'year' => 1988, 'pdf' => 'SP1988feb.pdf'),
    array('issue' => 38, 'month' => 'March', 'year' => 1988, 'pdf' => 'SP1988mar.pdf'),
    array('issue' => 39, 'month' => 'April', 'year' => 1988, 'pdf' => 'SP1988apr.pdf'),
    array('issue' => 40, 'month' => 'May', 'year' => 1988, 'pdf' => 'SP1988may.pdf'),
    array('issue' => 41, 'month' => 'June', 'year' => 1988, 'pdf' => 'SP1988jun.pdf'),
    array('issue' => 42, 'month' => 'July', 'year' => 1988, 'pdf' => 'SP1988jul.pdf'),
    array('issue' => 43, 'month' => 'August', 'year' => 1988, 'pdf' => 'SP1988aug.pdf'),
    array('issue' => 44, 'month' => 'September', 'year' => 1988, 'pdf' => 'SP1988sep.pdf'),
    array('issue' => 45, 'month' => 'October', 'year' => 1988, 'pdf' => 'SP1988oct.pdf'),
    array('issue' => 46, 'month' => 'November', 'year' => 1988, 'pdf' => 'SP1988nov.pdf'),
    array('issue' => 47, 'month' => 'December', 'year' => 1988, 'pdf' => 'SP1988dec.pdf'),

    array('issue' => 48, 'month' => 'January', 'year' => 1989, 'pdf' => 'SP1989jan.pdf'),
    array('issue' => 49, 'month' => 'February', 'year' => 1989, 'pdf' => 'SP1989feb.pdf'),
    array('issue' => 50, 'month' => 'March', 'year' => 1989, 'pdf' => 'SP1989mar.pdf'),
    array('issue' => 51, 'month' => 'April', 'year' => 1989, 'pdf' => 'SP1989apr.pdf'),
    array('issue' => 52, 'month' => 'May', 'year' => 1989, 'pdf' => 'SP1989may.pdf'),
    array('issue' => 53, 'month' => 'May', 'year' => 1989, 'pdf' => 'SP1988may_bulletin.pdf', 'bonus' => true),
    array('issue' => 54, 'month' => 'June', 'year' => 1989, 'pdf' => 'SP1989jun.pdf'),
    array('issue' => 55, 'month' => 'July', 'year' => 1989, 'pdf' => 'SP1989jul.pdf'),
    array('issue' => 56, 'month' => 'August', 'year' => 1989, 'pdf' => 'SP1989aug.pdf'),
    array('issue' => 57, 'month' => 'September', 'year' => 1989, 'pdf' => 'SP1989sep.pdf'),
    array('issue' => 58, 'month' => 'October', 'year' => 1989, 'pdf' => 'SP1989oct.pdf'),
    array('issue' => 59, 'month' => 'November', 'year' => 1989, 'pdf' => 'SP1989nov.pdf'),
    array('issue' => 60, 'month' => 'December', 'year' => 1989, 'pdf' => 'SP1989dec.pdf'),

    array('issue' => 61, 'month' => 'January', 'year' => 1990, 'pdf' => 'SP1990jan.pdf'),
    array('issue' => 62, 'month' => 'January', 'year' => 1990, 'pdf' => 'SP1990jan_special_issue.pdf', 'bonus' => true),
    array('issue' => 63, 'month' => 'February', 'year' => 1990, 'pdf' => 'SP1990feb.pdf'),
    array('issue' => 64, 'month' => 'March', 'year' => 1990, 'pdf' => 'SP1990mar.pdf'),
);

$short_months = array(
    'January' => 'Jan', 'February' => 'Feb', 'March' => 'Mar',
    'April' => 'Apr', 'May' => 'May', 'June' => 'Jun',
    'July' => 'Jul', 'August' => 'Aug', 'September' => 'Sep',
    'October' => 'Oct', 'November' => 'Nov', 'December' => 'Dec',
);
?>

<style>
.sp-card{display:flex;flex-direction:column;overflow:hidden}
.sp-card.sp-bonus{border-color:var(--gold-bright);box-shadow:0 0 0 1px rgba(216,180,94,.35),0 12px 30px rgba(216,180,94,.12)}
.sp-year-sep{grid-column:1/-1;display:flex;align-items:center;justify-content:center;gap:12px;padding:1.6rem 0 .8rem}
.sp-year-badge{display:inline-flex;align-items:center;gap:10px;padding:.55rem 1.6rem;border-radius:50px;
  background:rgba(216,180,94,.1);border:1px solid var(--line)}
.sp-year-badge h2{font-size:1.3rem;color:var(--gold-bright);margin:0;font-family:var(--font-display)}
.sp-bonus-tag{display:inline-block;padding:2px 10px;border-radius:10px;font-size:.68rem;font-weight:700;
  margin-bottom:.5rem;width:fit-content;background:rgba(216,180,94,.16);color:var(--gold-bright)}
.sp-title{font-size:1rem;margin-bottom:.3rem}
.sp-date{font-size:.82rem;color:var(--muted);margin-bottom:.9rem}
.sp-actions{display:flex;flex-direction:column;gap:.6rem;margin-top:auto;padding-top:.4rem}
.sp-unavailable{opacity:.55;cursor:not-allowed;pointer-events:none;border-style:dashed}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">📰 Submitters Perspective</h1>
    <p class="hero-sub" style="font-weight:600">Editor: Dr. Rashad Khalifa, Ph.D.</p>
    <p class="hero-sub" style="color:var(--gold-bright)">📅 February 1985 – March 1990 · 64 Issues</p>
    <p class="hero-sub">
      Muslim Perspective (Feb 1985 – Aug 1989) was renamed to Submitters Perspective from Sep 1989.
      This monthly newsletter was dedicated to spreading the message of Submission to God Alone and the
      Mathematical Miracle of the Quran. All 64 issues, including 2 special bonus issues (May 1989 &amp; Jan 1990),
      are available for reading and download, Alhamdulillah.
    </p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-4">
      <?php
      $current_year = 0;
      foreach ($newsletters as $newsletter):
          if ($current_year != $newsletter['year']) {
              $current_year = $newsletter['year'];
              echo '<div class="sp-year-sep"><span class="sp-year-badge"><h2>' . esc_html($current_year) . '</h2></span></div>';
          }

          $is_bonus = !empty($newsletter['bonus']);

          // Muslim Perspective: Feb 1985 - Aug 1989 (incl. the May 1989 bonus).
          // Submitters Perspective: Sep 1989 onward (incl. the Jan 1990 bonus).
          $is_muslim_perspective = false;
          if ($newsletter['year'] < 1989) {
              $is_muslim_perspective = true;
          } elseif ($newsletter['year'] == 1989 && !in_array($newsletter['month'], array('September', 'October', 'November', 'December'), true)) {
              $is_muslim_perspective = true;
          }
          $title_prefix = $is_muslim_perspective ? 'Muslim Perspective' : 'Submitters Perspective';

          if ($is_bonus) {
              $card_title = '⭐ ' . $title_prefix . ' – ' . $short_months[$newsletter['month']] . ' ' . $newsletter['year'] . ' Bonus';
              $card_date  = 'Special Issue';
          } else {
              $card_title = $title_prefix . ' #' . $newsletter['issue'];
              $card_date  = $short_months[$newsletter['month']] . ' ' . $newsletter['year'];
          }

          $pdf_rel  = 'wp-content/uploads/submitters-perspective/' . $newsletter['pdf'];
          $pdf_url  = home_url('/' . $pdf_rel);
          $pdf_exists = file_exists(ABSPATH . $pdf_rel);
      ?>
      <div class="card sp-card reveal<?php echo $is_bonus ? ' sp-bonus' : ''; ?>">
        <?php if ($is_bonus): ?><span class="sp-bonus-tag">Bonus Issue</span><?php endif; ?>
        <h3 class="sp-title"><?php echo esc_html($card_title); ?></h3>
        <p class="sp-date"><?php echo esc_html($card_date); ?></p>
        <div class="sp-actions">
          <?php if ($pdf_exists): ?>
            <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-gold" style="font-size:.85rem;padding:10px" target="_blank" rel="noopener noreferrer">👁️ View PDF</a>
            <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-ghost" style="font-size:.85rem;padding:10px" download="<?php echo esc_attr($newsletter['pdf']); ?>">📥 Download</a>
          <?php else: ?>
            <span class="btn btn-ghost sp-unavailable" style="font-size:.85rem;padding:10px">📄 Coming Soon</span>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
