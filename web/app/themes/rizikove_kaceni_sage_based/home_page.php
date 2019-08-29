<?php
/** Template Name: Home Page */
use rk\FrontendHelper;

$view = [];
$services_ids = array(36, 38, 42);

foreach ($services_ids as $service_id) {
    $view['services']['img'][$service_id] = FrontendHelper::get_thumbnail_image_by_device($service_id);
    $view['services']['post'][$service_id] = new Timber\Post($service_id);
}

Timber::render('home_page.twig', $view);

