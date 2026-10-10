<?php if (!defined('ABSPATH')) exit; get_header(); ?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal"><?php printf(esc_html__('Search Results for "%s"', 'godalone'), esc_html(get_search_query())); ?></h1>
  </div>
</div>
<article class="article reveal">
<style>
.srch-results{display:flex;flex-direction:column;gap:16px;max-width:820px;margin:0 auto}
.srch-card{background:var(--panel);border:1px solid var(--line);border-radius:var(--radius-lg,20px);padding:20px 24px;transition:.18s}
.srch-card:hover{border-color:var(--gold)}
.srch-card h2{margin:0 0 8px;font-size:19px}
.srch-card h2 a{color:var(--ink);text-decoration:none}
.srch-card h2 a:hover{color:var(--gold-bright)}
.srch-meta{font-size:12.5px;color:var(--muted);text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px}
.srch-excerpt{color:var(--muted);font-size:15px;line-height:1.6}
.srch-hl{background:var(--gold);color:var(--ink);padding:0 3px;border-radius:3px;font-weight:600}
.srch-verse{border-color:var(--gold);background:linear-gradient(135deg,rgba(212,175,55,.12),var(--panel))}
.srch-verse .srch-meta{color:var(--gold-bright)}
.srch-empty{text-align:center;padding:60px 20px;color:var(--muted)}
.srch-empty a{color:var(--gold-bright);font-weight:600}
.srch-count{color:var(--muted);font-size:14px;margin-bottom:22px;max-width:820px;margin-left:auto;margin-right:auto}
.nav-links{max-width:820px;margin:22px auto 0;display:flex;gap:10px;justify-content:center}
.nav-links a,.nav-links span{padding:8px 14px;border:1px solid var(--line);border-radius:10px;color:var(--ink)}
@media(max-width:600px){.srch-card{padding:16px 18px}}
</style>
<?php if (function_exists('kh_looks_like_verse') && kh_looks_like_verse(get_search_query())) : ?>
<div class="srch-card srch-verse" style="max-width:820px;margin:0 auto 16px">
<div class="srch-meta">QURAN VERSE</div>
<h2><a href="<?php echo esc_url(home_url('/quran/')); ?>" target="_blank" rel="noopener">Read "<?php echo esc_html(get_search_query()); ?>" in the Quran WebApp →</a></h2>
<div class="srch-excerpt">This looks like a Quran verse or sura reference. Open the Quran WebApp and search "<?php echo esc_html(get_search_query()); ?>" there to read it directly — in Arabic, English, Tamil & Hindi.</div>
</div>
<?php endif; ?>
<?php if (have_posts()) : global $wp_query; ?>
<p class="srch-count"><?php printf(esc_html__('%d results found', 'godalone'), (int) $wp_query->found_posts); ?></p>
<div class="srch-results">
<?php while (have_posts()) : the_post(); ?>
<?php
$__is_idx = (get_post_type() === 'kh_index');
$__link = $__is_idx ? kh_index_url(get_the_ID()) : get_permalink();
$__ext = $__is_idx && (strpos($__link, home_url()) !== 0);
$__raw = $__is_idx ? get_the_excerpt() : get_the_content();
?>
<div class="srch-card">
<?php if (!$__is_idx) : ?><div class="srch-meta"><?php echo esc_html(get_the_date()); ?></div><?php endif; ?>
<h2><a href="<?php echo esc_url($__link); ?>"<?php echo $__ext ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo kh_highlight_plain(get_the_title(), get_search_query()); ?></a></h2>
<div class="srch-excerpt"><?php echo kh_highlight_excerpt($__raw, get_search_query()); ?></div>
</div>
<?php endwhile; ?>
</div>
<?php the_posts_pagination(array('prev_text' => '←', 'next_text' => '→')); ?>
<?php else : ?>
<div class="srch-empty">
<p><?php esc_html_e('No results found.', 'godalone'); ?></p>
<p><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'godalone'); ?></a></p>
</div>
<?php endif; ?>
</article>
<?php get_footer(); ?>
