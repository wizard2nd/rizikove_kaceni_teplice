<?php
/** Template Name: Services */
use rk\frontend_helper\FrontendHelper;

$posts_to_nav = [36, 38, 40, 42];
$view = array();

$view['main_nav_title'] = __('Tree felling', 'sage');
$links = [];
foreach ($posts_to_nav as $post_id) {
    $_post = get_post($post_id);
    $links[] = ['url' => get_permalink($post_id), 'title' => __($_post->post_title)];
}
$view['nav'] = $links;


$service_list = get_post(27);
$view['service_list'] = __(FrontendHelper::add_icon_to_list_item($service_list->post_content));

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

Timber::render('services.twig', $view);



