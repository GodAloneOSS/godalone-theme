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

      <button class="login" id="ghSignin" type="button">
        <svg class="gg" viewBox="0 0 48 48" aria-hidden="true"><path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9 3.6l6.7-6.7C35.6 2.6 30.1 0 24 0 14.6 0 6.4 5.4 2.5 13.3l7.8 6.1C12.2 13.2 17.6 9.5 24 9.5z"/><path fill="#4285F4" d="M46.1 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.4c-.5 2.9-2.1 5.3-4.6 7l7.1 5.5c4.2-3.9 6.6-9.6 6.6-16.5z"/><path fill="#FBBC05" d="M10.3 28.6c-.5-1.4-.7-2.9-.7-4.6s.3-3.2.7-4.6l-7.8-6.1C.9 16.5 0 20.1 0 24s.9 7.5 2.5 10.7l7.8-6.1z"/><path fill="#34A853" d="M24 48c6.1 0 11.3-2 15-5.5l-7.1-5.5c-2 1.3-4.6 2.1-7.9 2.1-6.4 0-11.8-3.7-13.7-9.1l-7.8 6.1C6.4 42.6 14.6 48 24 48z"/></svg>
        <span>Login</span>
      </button>

      <div class="userw" id="ghUserw">
        <button class="chip" id="ghChip" type="button"><span class="av" id="ghAv">?</span><span id="ghUnm">Account</span></button>
        <div class="umenu" id="ghUmenu">
          <div class="un" id="ghUfull">Signed in</div>
          <div class="ue" id="ghUml"></div>
          <button id="ghSignout" type="button">Sign out</button>
        </div>
      </div>

      <button class="ic" id="ghThemeBtn" aria-label="Toggle theme" type="button">🌙</button>
    </div>
  </div>
</header>

<main id="ga-main">
