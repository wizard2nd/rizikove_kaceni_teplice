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
  'sage_lib/utils.php',                 // Utility functions
  'sage_lib/init.php',                  // Initial theme setup and constants
  'sage_lib/wrapper.php',               // Theme wrapper class
  'sage_lib/conditional-tag-check.php', // ConditionalTagCheck class
  'sage_lib/config.php',                // Configuration
  'sage_lib/assets.php',                // Scripts and stylesheets
  'sage_lib/titles.php',                // Page titles
  'sage_lib/extras.php',                // Custom functions
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
    'PageBase.php',
    'ServicesPage.php',
    'frontend_helper.php',
    'carousel_helper.php',
    'contact.php',
    'gallery_slider.php',
    'add_hook_helper.php'
];

foreach ($custom_includes as $file) {
    $file = __DIR__."/lib/$file";
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

