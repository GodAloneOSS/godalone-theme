<?php
/**
 * Generic page template (Introduction, Mathematical Miracle, Contact, etc.).
 */
if (!defined('ABSPATH')) exit;
get_header();

while (have_posts()) : the_post(); ?>
  <div class="page-hero">
    <div class="wrap">
      <div class="crumb">GodAlone.in</div>
      <h1 class="reveal"><?php the_title(); ?></h1>
    </div>
  </div>
  <article class="article reveal">
    <?php
      the_content();
      wp_link_pages(array('before'=>'<div class="pagelinks">','after'=>'</div>'));
    ?>
  </article>
<?php endwhile;

get_footer();
