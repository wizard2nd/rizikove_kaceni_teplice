<?php
/**
 * Custom theme functions
 *
 * automatically loads all php files in inc folder
 */

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


/**
 * Custom classes
 */
$custom_includes = [
    'frontend_helper.php',
    'media_helper.php',
    'carousel_helper.php',
    'contact.php',
    'gallery_slider.php',
    'ajax_helper.php'
];

foreach ($custom_includes as $file) {
    $file = __DIR__."/inc/$file";
    file_exists($file) ?
        require_once $file :
        trigger_error(sprintf('Unable to load %s', $file), E_USER_ERROR);
}

add_filter('show_admin_bar', '__return_false');

add_filter('wp_nav_menu_items', array('\rk\frontend_helper\FrontendHelper', 'add_icon_to_menu'), 10, 2);

add_filter('post_thumbnail_html', array('\rk\frontend_helper\FrontendHelper', 'add_class_to_thumbnail'), 10, 1);

function get_gallery_attachments_images(){
    \rk\gallerySlider::get_attachment_images();
}

add_action("wp_ajax_get_gallery_attachments_images", "get_gallery_attachments_images");
add_action("wp_ajax_nopriv_get_gallery_attachments_images", "get_gallery_attachments_images");



/**
* My custom functions
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

