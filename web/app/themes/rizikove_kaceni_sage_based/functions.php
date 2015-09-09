<?php
/**
 * Custom theme functions
 *
 * automatically loads all php files in inc folder
 */

$custom_includes = [
  'frontend_helper.php'
];

foreach ($custom_includes as $file) {
    $file = __DIR__."/inc/$file";
    file_exists($file) ?
        require_once $file :
        trigger_error(sprintf('Unable to load %s', $file), E_USER_ERROR);
}


/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_filter('show_admin_bar', '__return_false');

add_filter('wp_nav_menu_items', array('\rk\frontend_helper\FrontendHelper', 'add_icon_to_menu'), 10, 2);

/*
    * My custom functions
    *
    */

function rk_create_home_image_post_type(){
    $post_setting = array(
        'labels' => array(
            'name' => __('Index Images'),
            'singular_name' => __('Index Image')
        ),
        'public' => true
    );
    register_post_type('rk_index_images', $post_setting);
}

add_action('init', 'rk_create_home_image_post_type');


function rk_custom_translate($cz, $de){

    if (rk_get_language() == 'cz') return $cz;
    if (rk_get_language() == 'de') return $de;
}

function rk_get_routes(){
    return $routes = array(4 => 71, 5 => 73, 6 => 75);
}

function rk_nbsp($string){
    return str_replace('@', '&nbsp;', $string);
}

function rk_get_language_url($lang){
    $current_url = get_permalink();
    return preg_replace('@/(cz|de)@', "/$lang", $current_url);
}

