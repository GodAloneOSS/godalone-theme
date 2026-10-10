<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0a1024">
<script>
/* set theme before paint to avoid flash (default = night/navy, matches /quran) */
try{var t=localStorage.getItem('gaTheme3');if(t==='day')document.documentElement.className='theme-day';}catch(e){}
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="gh" id="ghHdr">
  <div class="ghbar">
    <div class="gh-left">
      <div class="menuw">
        <button class="ic" id="ghMenuBtn" aria-label="Menu" type="button">☰</button>
        <nav class="ghmenu" id="ghMenu" aria-label="Main menu">
          <div class="menu-langs">
            <span class="on">English</span>
            <a href="https://www.kadavulmattum.org" rel="noopener">தமிழ்</a>
            <a href="https://ekkhuda.org" rel="noopener">हिंदी</a>
          </div>
          <?php ga_primary_menu(); ?>
        </nav>
      </div>

      <a href="<?php echo esc_url(home_url('/')); ?>" class="brand brand-logo" aria-label="GodAlone.in — Happiness is Submission to God Alone">
        <img class="logo-dark" src="<?php echo esc_url(get_template_directory_uri() . '/images/godalone-logo-light.png'); ?>" alt="GodAlone.in — Happiness is Submission to God Alone">
        <img class="logo-light" src="<?php echo esc_url(get_template_directory_uri() . '/images/godalone-logo.png'); ?>" alt="GodAlone.in — Happiness is Submission to God Alone">
      
<div class="names"><span class="n1">GodAlone.in</span></div>
</a>
    </div>

    <div class="gh-right">
      <div class="langs" aria-label="Language">
        <span class="on">EN</span>
        <a href="https://www.kadavulmattum.org" rel="noopener">தமிழ்</a>
        <a href="https://ekkhuda.org" rel="noopener">हिंदी</a>
      </div>

      <div class="srchw" id="ghSrchw">
        <button class="ic" id="ghSearchBtn" aria-label="Search" type="button">
          <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <form class="srchbox" id="ghSrchbox" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
          <input type="text" name="s" id="ghSrchInput" placeholder="Search..." autocomplete="off">
          <button type="submit" aria-label="Search"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button>
        </form>
      </div>
      <button class="ic" id="ghThemeBtn" aria-label="Toggle theme" type="button">🌙</button>
    </div>
  </div>
</header>

<main id="ga-main">
