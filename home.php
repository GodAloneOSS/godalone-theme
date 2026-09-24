<?php
/**
 * Blog/front index. The current site shows the custom homepage here
 * (Settings → Reading = "Your latest posts"), so we render the homepage
 * sections when this is the front page, and a normal post list otherwise.
 */
if (!defined('ABSPATH')) exit;
get_header();

if (is_front_page()) {
    get_template_part('template-parts/home');
} else {
    echo '<div class="page-hero"><div class="wrap"><div class="crumb">Journal</div><h1>' . esc_html(get_the_title(get_option('page_for_posts'))) . '</h1></div></div>';
    echo '<div class="article">';
    if (have_posts()) {
        while (have_posts()) { the_post();
            echo '<article class="reveal" style="margin-bottom:34px;padding-bottom:26px;border-bottom:1px solid var(--line-2)">';
            echo '<h2 style="margin:0 0 6px"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h2>';
            echo '<div style="color:var(--muted);font-size:14px;margin-bottom:10px">' . esc_html(get_the_date()) . '</div>';
            echo '<div>' . wp_kses_post(get_the_excerpt()) . '</div>';
            echo '</article>';
        }
        the_posts_pagination();
    } else {
        echo '<p>No posts yet.</p>';
    }
    echo '</div>';
}

get_footer();
