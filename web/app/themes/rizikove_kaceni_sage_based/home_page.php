<?php
/** Template Name: Home Page */
use rk\FrontendHelper;

$index_pages = array(
    36 => __('Risk Felling', 'sage'),
    38 => __('Pruning trees', 'sage'),
    40 => __('Directional felling', 'sage'),
    42 => __('Forklift trim', 'sage'));

$view['services'] = [];
$view['more_info'] = __('More info', 'sage');
$view['home_page_content'] = have_posts() ? $post->post_content : '';
$world_count = 15;

switch (FrontendHelper::get_device()){
    case 'mobile':
        $world_count = 15;
        break;
    case 'tablet':
        $world_count = 20;
        break;
    case 'desktop':
        $world_count = 30;
}


foreach($index_pages as $page_id => $title) {
    $service = get_post($page_id);
    $view['services'][$page_id] = array(
        'image_url' => FrontendHelper::thumbnail_image_url($page_id),
        'title' => $title,
        'preview' => wp_trim_words(__($service->post_content), $world_count, '...'),
        'url' => get_page_link($page_id)
    );
}

Timber::render('home_page.twig', $view);

