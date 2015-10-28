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

/**
 * Custom classes
 */
$custom_includes = [
    'PageBase.php',
    'ServicesPage.php',
    'frontend_helper.php',
    'carousel_helper.php',
    'Contact.php',
    'Footer.php',
    'Gallery.php',
    'add_hook_helper.php',
    'ajax.php'
];

foreach ($custom_includes as $file) {
    $file = __DIR__."/lib/$file";
    file_exists($file) ?
        require_once $file :
        trigger_error(sprintf('Unable to load %s', $file), E_USER_ERROR);
}

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

add_filter('show_admin_bar', '__return_false');

/**
 * Google maps API
 */
function load_google_map_api(){
    $contact = new \rk\Contact();
    $api_key = $contact->get_google_api_key();
    $src = "https://maps.googleapis.com/maps/api/js?key=$api_key&callback=initMap";
    wp_enqueue_script('google_maps_api', $src, ['sage_js'], null, true);
}

add_action('wp_enqueue_scripts', 'load_google_map_api', 101);

