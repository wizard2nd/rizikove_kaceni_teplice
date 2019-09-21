<?php
/** Template Name: Home Page */

$view = [];
$services_ids = array(36, 38, 42);

foreach ($services_ids as $service_id) {
    $service = [
        'image' => get_the_post_thumbnail($service_id, 'gallery-thumb'),
        'title' => get_the_title($service_id),
        'link' => get_permalink($service_id)
    ];
    $view['services'][$service_id] = $service;
};

$view['clients'] = get_field('clients');
$view['additional_services'] = get_field('front_page_services', 27);

Timber::render('home_page.twig', $view);

