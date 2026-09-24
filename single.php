<?php
/**
 * Single post template.
 */
if (!defined('ABSPATH')) exit;
get_header();

while (have_posts()) : the_post(); ?>
  <div class="page-hero">
    <div class="wrap">
      <div class="crumb"><?php echo esc_html(get_the_date()); ?></div>
      <h1 class="reveal"><?php the_title(); ?></h1>
    </div>
  </div>
  <article class="article reveal">
    <?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(array('before'=>'<div class="pagelinks">','after'=>'</div>')); ?>
  </article>
<?php endwhile;

get_footer();
