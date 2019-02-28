<?php
/** Template Name: Home Page */
use rk\FrontendHelper;

$index_pages = array(
    36 => __('Risk Felling', 'sage'),
    38 => __('Pruning trees', 'sage'),
    40 => __('Directional felling', 'sage')
);

$view = Timber::get_context();
foreach($index_pages as $page_id => $title) {
    $post = new HeroIndexPost($page_id);
    $post->title = $title;
    $post->thumbnail = FrontendHelper::get_thumbnail_image_by_device($page_id);
    $view['index_posts'][$page_id] = $post;
}
$view['post'] = new Timber\Post();
$view['link_label'] = __('Více','sage');
Timber::render('home_page.twig', $view);
