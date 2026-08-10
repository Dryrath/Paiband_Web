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
 wp_enqueue_style('paiband-style',get_stylesheet_uri(),[], '3.3.5');
 wp_enqueue_script('paiband-site',get_template_directory_uri().'/assets/site.js',[], '3.3.5',true);
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
  'paiband_social_linkedin' => ['LinkedIn URL','https://www.linkedin.com/company/paiband-studio'],
  'paiband_social_x' => ['X / Twitter URL',''],
  'paiband_social_instagram' => ['Instagram URL','https://www.instagram.com/paibandstudio?igsh=MXdkOW40dHl3Mmc2ag=='],
  'paiband_social_youtube' => ['YouTube URL','https://www.youtube.com/@Paibandstudio'],
  'paiband_social_tiktok' => ['TikTok URL','https://www.tiktok.com/@paiband'],
  'paiband_social_discord' => ['Discord invite URL','https://discord.com/invite/GAfHQmZzfk'],
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
  'youtube' => [
   'label' => 'YouTube',
   'default' => 'https://www.youtube.com/@Paibandstudio',
  ],
  'discord' => [
   'label' => 'Discord',
   'default' => 'https://discord.com/invite/GAfHQmZzfk',
  ],
  'instagram' => [
   'label' => 'Instagram',
   'default' => 'https://www.instagram.com/paibandstudio?igsh=MXdkOW40dHl3Mmc2ag==',
  ],
  'tiktok' => [
   'label' => 'TikTok',
   'default' => 'https://www.tiktok.com/@paiband',
  ],
  'linkedin' => [
   'label' => 'LinkedIn',
   'default' => 'https://www.linkedin.com/company/paiband-studio',
  ],
 ];

 $links = [];
 foreach($definitions as $key=>$data){
  $url = trim((string)get_theme_mod('paiband_social_'.$key,$data['default']));
  if($url === ''){
   $url = $data['default'];
  }

  $links[] = [
   'key' => $key,
   'label' => $data['label'],
   'url' => $url,
  ];
 }
 return $links;
}

/**
 * Lightweight inline SVG social icons.
 * Keeping the SVGs in the theme avoids an icon-library dependency.
 */
function paiband_social_icon($key){
 $icons = [
  'youtube' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8ZM9.6 15.6V8.4L15.8 12l-6.2 3.6Z"/></svg>',
  'discord' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19.5 5.3A18 18 0 0 0 15 3.9l-.6 1.2a16 16 0 0 0-4.8 0L9 3.9a18 18 0 0 0-4.5 1.4C1.7 9.4.9 13.4 1.3 17.4a18 18 0 0 0 5.5 2.7l1.3-1.8a12 12 0 0 1-2.1-1l.5-.4a13 13 0 0 0 11 0l.6.4a12 12 0 0 1-2.2 1l1.3 1.8a18 18 0 0 0 5.5-2.7c.5-4.7-.8-8.7-3.2-12.1ZM8.3 14.9c-1.1 0-2-1-2-2.2s.9-2.2 2-2.2 2 1 2 2.2-.9 2.2-2 2.2Zm7.4 0c-1.1 0-2-1-2-2.2s.9-2.2 2-2.2 2 1 2 2.2-.9 2.2-2 2.2Z"/></svg>',
  'instagram' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.3 2h9.4A5.3 5.3 0 0 1 22 7.3v9.4a5.3 5.3 0 0 1-5.3 5.3H7.3A5.3 5.3 0 0 1 2 16.7V7.3A5.3 5.3 0 0 1 7.3 2Zm-.2 2A3.1 3.1 0 0 0 4 7.1v9.8A3.1 3.1 0 0 0 7.1 20h9.8a3.1 3.1 0 0 0 3.1-3.1V7.1A3.1 3.1 0 0 0 16.9 4H7.1Zm10.3 1.5a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"/></svg>',
  'tiktok' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.2 2h3.1c.2 1.4 1 2.7 2.1 3.6A6.7 6.7 0 0 0 23 7v3a9.6 9.6 0 0 1-5.7-1.9v7.2A6.7 6.7 0 1 1 11.5 8v3.1a3.7 3.7 0 1 0 2.7 3.6V2Z"/></svg>',
  'linkedin' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4.8 3.4a2.4 2.4 0 1 1 0 4.8 2.4 2.4 0 0 1 0-4.8ZM2.8 9.7h4v11.5h-4V9.7Zm6.5 0h3.8v1.6h.1c.5-1 1.8-2.1 3.8-2.1 4.1 0 4.8 2.7 4.8 6.2v5.8h-4v-5.1c0-1.2 0-3-1.9-3s-2.2 1.4-2.2 2.9v5.2h-4V9.7Z"/></svg>',
 ];
 return isset($icons[$key]) ? $icons[$key] : '';
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
  echo '<div class="notice notice-info is-dismissible"><p><strong>PaiBand Studio v3.3.5:</strong> Elementor Pro Theme Builder can override this theme’s header and footer. If the old header/footer still appears, go to <strong>Elementor → Theme Builder</strong>, remove “Entire Site” display conditions from the old Header/Footer or set them to Draft, then clear Elementor Files &amp; Data and all site/CDN caches.</p></div>';
 }
}
add_action('admin_notices','paiband_elementor_override_notice');


/**
 * Google AdSense — homepage only.
 * Publisher ID: ca-pub-9956094817641062
 *
 * Loaded via wp_head so the script is placed inside <head>.
 * To enable AdSense on every page later, remove:
 *     if (!is_front_page()) return;
 */
function paiband_homepage_adsense(){
 if (!is_front_page()) return;
 ?>
 <script async
  src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9956094817641062"
  crossorigin="anonymous"></script>
 <?php
}
add_action('wp_head','paiband_homepage_adsense',20);

?>
