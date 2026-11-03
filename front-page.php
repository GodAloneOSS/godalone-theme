<?php
/**
 * Front page (used when a static homepage is set).
 */
if (!defined('ABSPATH')) exit;
get_header();
get_template_part('template-parts/' . ((isset($_GET['oldhome']) && $_GET['oldhome']==='1') ? 'home' : 'home-new'));
get_footer();
