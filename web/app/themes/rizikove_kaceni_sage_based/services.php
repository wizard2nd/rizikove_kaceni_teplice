<?php
/** Template Name: Services */
use rk\FrontendHelper;
use rk\ServicesPage;

$service_page = new ServicesPage();

$posts_to_nav = [36, 38, 40, 42];
$view = array();

$main_nav_title = '<h2>'.__('Tree felling', 'sage').'</h2>';
$view['main_nav_title'] = $service_page->add_slide_down_icon($main_nav_title);
$links = [];

// dynamic Service navigation
foreach ($posts_to_nav as $post_id) {
    $_post = get_post($post_id);
    $links[] = ['url' => get_permalink($post_id), 'title' => __($_post->post_title)];
}
$view['nav'] = $links;

// Static service list
$service_list = get_post(27);
$service_list = __(FrontendHelper::add_icon_to_list_item($service_list->post_content));
$service_list = $service_page->add_slide_down_icon($service_list);
$view['service_list'] = $service_list;

// Serve rizikove kaceni as main service
// if access page from main menu
if (have_posts()){
    $post = get_post();
    $post_id = $post->ID;
    $post = $post_id == 27 ? get_post(36): $post;
    $view['long_title'] = strlen($post->post_name) > 30 ? 'long-title': '';
    $view['post']['title'] = __($post->post_title, 'sage');
    $view['post']['image'] = FrontendHelper::get_thumbnail_image_by_device($post->ID);
    $view['post']['content'] = __($post->post_content, 'sage');

    $custom_images = get_fields($post->ID);
    $view['featured_images'] = FrontendHelper::get_featured_images($custom_images, 'mobile');

}

$view['spinner'] = FrontendHelper::spinner_path();

Timber::render('services.twig', $view);



