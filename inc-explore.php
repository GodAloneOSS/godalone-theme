<?php
if (!defined('ABSPATH')) exit;
/* Explore page route (/explore/) - added 17-11-2026. Template: page-explore.php in this theme. */
add_action('init', function () {
  add_rewrite_rule('^explore/?$', 'index.php?xp_explore=1', 'top');
  if (get_option('xp_explore_rewrite_flushed') !== '1') {
    flush_rewrite_rules(false);
    update_option('xp_explore_rewrite_flushed', '1');
  }
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'xp_explore'; return $vars; });
add_filter('template_include', function ($template) {
  if (get_query_var('xp_explore')) {
    $t = get_stylesheet_directory() . '/page-explore.php';
    if (file_exists($t)) {
      global $wp_query;
      $wp_query->is_404 = false;
      status_header(200);
      return $t;
    }
  }
  return $template;
});
