<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
 <div class="wrap nav">
  <a class="studio-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="PaiBand Studio home">
   <span class="studio-brand-mark"><img src="<?php echo paiband_asset('paiband-flower.png'); ?>" alt="PaiBand Studio flower mark"></span>
   <span class="studio-brand-name">PaiBand Studio</span>
  </a>
  <nav class="nav-links" id="mainNav">
   <?php
   if(has_nav_menu('primary')){
     wp_nav_menu(['theme_location'=>'primary','container'=>false,'items_wrap'=>'%3$s','depth'=>1]);
   } else { paiband_menu_fallback(); }
   ?>
  </nav>
  <button class="mobile-toggle" aria-label="Open menu" onclick="document.getElementById('mainNav').classList.toggle('open')">☰</button>
 </div>
</header>