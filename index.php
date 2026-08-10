<?php
if(is_home()){ require get_template_directory().'/home.php'; return; }
get_header(); ?>
<main class="site-main"><section class="page-hero"><div class="wrap"><h1><?php bloginfo('name'); ?></h1></div></section><section><div class="wrap"><?php if(have_posts()): while(have_posts()): the_post(); the_content(); endwhile; endif; ?></div></section></main>
<?php get_footer(); ?>