<?php
/** Template Name: Services */
use rk\FrontendHelper;
use rk\ServicesPage;

$current_id = get_the_ID();
$service_ids = [36, 38, 40, 42];
array_unshift($service_ids, $current_id);
$service_ids = array_unique($service_ids);

$services = [];
foreach ($service_ids as $service_id) {
    $service_post = get_post($service_id);
    $service['title'] = __($service_post->post_title, 'sage');
    $service['image'] = get_the_post_thumbnail($service_id, 'gallery-thumb');
    $service['content'] = __($service_post->post_content, 'sage');
    $services[$service_id] = $service;
}

$view['spinner'] = FrontendHelper::spinner_path();
$view['services'] = $services;

$post = get_post();
$custom_images = get_fields($post->ID);
$view['featured_images'] = FrontendHelper::get_featured_images($custom_images, 'mobile');

Timber::render('services.twig', $view);



