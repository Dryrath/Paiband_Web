<?php get_header(); ?>
<main class="site-main">
<section class="page-hero"><div class="wrap"><div class="eyebrow">News & updates</div><h1>From PaiBand Studio.</h1><p>Development updates, releases, event announcements and studio news.</p></div></section>
<section><div class="wrap">
<?php if(have_posts()): ?><div class="posts-grid"><?php while(have_posts()): the_post(); ?><article class="post-card"><?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?><div class="post-card-body"><time><?php echo esc_html(get_the_date()); ?></time><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(get_the_excerpt()); ?></p><a href="<?php the_permalink(); ?>"><strong>Read update →</strong></a></div></article><?php endwhile; ?></div><div style="margin-top:35px"><?php the_posts_pagination(); ?></div>
<?php else: ?><div class="callout"><div><h2>Your WordPress posts will appear here.</h2><p>Publish news from Posts → Add New. The homepage can be extended to pull the latest posts automatically once you start using it.</p></div><a class="btn dark" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact PaiBand</a></div><?php endif; ?>
</div></section>
</main><?php get_footer(); ?>