<?php
/**
 * Front page (used when a static homepage is set).
 */
if (!defined('ABSPATH')) exit;
get_header();
get_template_part('template-parts/home');
get_footer();
