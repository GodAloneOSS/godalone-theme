<?php
/**
 * Fallback template (required by WordPress).
 */
if (!defined('ABSPATH')) exit;
get_header();

if (is_front_page() || is_home()) {
    get_template_part('template-parts/home');
} else {
    echo '<div class="page-hero"><div class="wrap"><h1>' . esc_html(wp_get_document_title()) . '</h1></div></div>';
    echo '<div class="article">';
    if (have_posts()) {
        while (have_posts()) { the_post();
            echo '<article class="reveal" style="margin-bottom:30px">';
            echo '<h2><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h2>';
            echo '<div>' . wp_kses_post(get_the_excerpt()) . '</div></article>';
        }
    } else {
        echo '<p>Nothing found.</p>';
    }
    echo '</div>';
}

get_footer();
