<?php
/** Template Name: Services */
use rk\FrontendHelper;

define('ROOT_SERVICE_PAGE_ID', 27);
define('RISK_FELLING_PAGE_ID', 36);

$current_id = get_the_ID();
if ( $current_id == ROOT_SERVICE_PAGE_ID) $current_id = RISK_FELLING_PAGE_ID;
$service_ids = [36, 38, 40, 42];
$service_ids = array_unique($service_ids);

$services = [];
foreach ($service_ids as $service_id) {
    $service_post = get_post($service_id);
    $service['title'] = __($service_post->post_title, 'sage');
    $service['image_src'] = get_the_post_thumbnail_url($service_id, 'gallery-thumb');
    $service['content'] = __($service_post->post_content, 'sage');
    $service['active'] = $service_id == $current_id;
    $service['inactive'] = !$service['active'];
    $service['featured_images'] = FrontendHelper::get_featured_images(get_fields($service_id), 'gallery-thumb');
    $services[$service_id] = $service;
}

$view['spinner'] = FrontendHelper::spinner_path();
$view['services'] = $services;



Timber::render('services.twig', $view);



