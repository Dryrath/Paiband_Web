<?php
if (!defined('ABSPATH')) exit;

/**
 * PaiBand Studio theme setup.
 */
function paiband_setup(){
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support('html5',['search-form','gallery','caption','style','script']);
 add_theme_support('responsive-embeds');
 register_nav_menus([
  'primary' => 'Primary Menu',
  'footer' => 'Footer Menu',
 ]);
}
add_action('after_setup_theme','paiband_setup');

/**
 * Theme assets.
 * Bump the version when CSS/JS changes so browsers do not keep stale files.
 */
function paiband_assets(){
 wp_enqueue_style('paiband-style',get_stylesheet_uri(),[], '3.3.3');
 wp_enqueue_script('paiband-site',get_template_directory_uri().'/assets/site.js',[], '3.3.3',true);
}
add_action('wp_enqueue_scripts','paiband_assets');

/**
 * Editable site settings exposed in Appearance → Customize.
 */
function paiband_customize($wp_customize){
 $wp_customize->add_section('paiband_site',[
  'title' => 'PaiBand Studio Settings',
  'priority' => 30,
 ]);

 $text_settings = [
  'paiband_contact_email' => ['Public contact email','contact@paibandstudio.com'],
  'paiband_location' => ['Studio location','Oman'],
  'paiband_booth' => ['TGS 2026 area / booth','SELECTED INDIE 80 area · Booth E-26'],
 ];

 foreach($text_settings as $key=>$data){
  $wp_customize->add_setting($key,[
   'default'=>$data[1],
   'sanitize_callback'=>'sanitize_text_field',
  ]);
  $wp_customize->add_control($key,[
   'label'=>$data[0],
   'section'=>'paiband_site',
   'type'=>'text',
  ]);
 }

 $url_settings = [
  'paiband_meeting_url' => ['TGS meeting URL','mailto:contact@paibandstudio.com?subject=TGS%202026%20Meeting'],
  'paiband_social_linkedin' => ['LinkedIn URL',''],
  'paiband_social_x' => ['X / Twitter URL',''],
  'paiband_social_instagram' => ['Instagram URL',''],
  'paiband_social_youtube' => ['YouTube URL',''],
  'paiband_social_tiktok' => ['TikTok URL',''],
  'paiband_social_discord' => ['Discord invite URL',''],
 ];

 foreach($url_settings as $key=>$data){
  $wp_customize->add_setting($key,[
   'default'=>$data[1],
   'sanitize_callback'=>'esc_url_raw',
  ]);
  $wp_customize->add_control($key,[
   'label'=>$data[0],
   'section'=>'paiband_site',
   'type'=>'url',
  ]);
 }
}
add_action('customize_register','paiband_customize');

/**
 * Asset helper.
 */
function paiband_asset($name){
 return esc_url(get_template_directory_uri().'/assets/'.$name);
}

/**
 * Common site values.
 */
function paiband_email(){
 return get_theme_mod('paiband_contact_email','contact@paibandstudio.com');
}
function paiband_location(){
 return get_theme_mod('paiband_location','Oman');
}
function paiband_booth(){
 return get_theme_mod('paiband_booth','SELECTED INDIE 80 area · Booth E-26');
}
function paiband_meeting(){
 return get_theme_mod('paiband_meeting_url','mailto:contact@paibandstudio.com?subject=TGS%202026%20Meeting');
}

/**
 * Social links.
 * Leave a URL blank in the Customizer to hide that network.
 */
function paiband_social_links(){
 $definitions = [
  'linkedin' => 'LinkedIn',
  'x' => 'X / Twitter',
  'instagram' => 'Instagram',
  'youtube' => 'YouTube',
  'tiktok' => 'TikTok',
  'discord' => 'Discord',
 ];

 $links = [];
 foreach($definitions as $key=>$label){
  $url = trim((string)get_theme_mod('paiband_social_'.$key,''));
  if($url !== ''){
   $links[] = [
    'key' => $key,
    'label' => $label,
    'url' => $url,
   ];
  }
 }
 return $links;
}

function paiband_excerpt_length(){
 return 24;
}
add_filter('excerpt_length','paiband_excerpt_length',999);

/**
 * Menu used only when no WordPress Primary Menu has been assigned.
 */
function paiband_menu_fallback(){
 echo '<a href="'.esc_url(home_url('/games/')).'">Games</a>';
 echo '<a href="'.esc_url(home_url('/about/')).'">Studio</a>';
 echo '<a href="'.esc_url(home_url('/news/')).'">News</a>';
 echo '<a href="'.esc_url(home_url('/press/')).'">Press</a>';
 echo '<a href="'.esc_url(home_url('/support/')).'">Support</a>';
 echo '<a href="'.esc_url(home_url('/contact/')).'">Contact</a>';
 echo '<a href="'.esc_url(home_url('/tgs/')).'">TGS 2026</a>';
}

/**
 * Elementor compatibility.
 * Elementor Theme Builder can still override the theme header/footer when
 * a global Header/Footer template is assigned to "Entire Site".
 */
function paiband_register_elementor_locations($elementor_theme_manager){
 if(method_exists($elementor_theme_manager,'register_all_core_location')){
  $elementor_theme_manager->register_all_core_location();
 }
}
add_action('elementor/theme/register_locations','paiband_register_elementor_locations');

function paiband_elementor_override_notice(){
 if(!current_user_can('manage_options')) return;
 if(defined('ELEMENTOR_PRO_VERSION')){
  echo '<div class="notice notice-info is-dismissible"><p><strong>PaiBand Studio v3.3.3:</strong> Elementor Pro Theme Builder can override this theme’s header and footer. If the old header/footer still appears, go to <strong>Elementor → Theme Builder</strong>, remove “Entire Site” display conditions from the old Header/Footer or set them to Draft, then clear Elementor Files &amp; Data and all site/CDN caches.</p></div>';
 }
}
add_action('admin_notices','paiband_elementor_override_notice');
?>