<?php
/**
 * Template Name: Quran Q&A Page
 *
 * Serves the Quranic Quiz (Quranic Quiz plugin) at /quran-qa/. Routed via
 * a rewrite rule in functions.php (same hub-page technique used across
 * this theme). Renders the [quranic_quiz] shortcode.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">Quran Q&amp;A</h1>
    <p class="bism reveal" style="margin-top:22px">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
    <p class="bism-en">In the Name of God, Most Gracious, Most Merciful</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <?php echo do_shortcode('[quranic_quiz]'); ?>
  </div>
</section>

<?php get_footer(); ?>
