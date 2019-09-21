<?php
/** Template Name: Services */
use rk\FrontendHelper;
use rk\Service;

$service_ids = [36, 38, 40, 42];

$services = [];
foreach ($service_ids as $service_id) {
    $service = new Service($service_id, [
        'content',
        'featured_images'
    ]);
    $services[$service_id] = $service->display_fields();
}

$view['spinner'] = FrontendHelper::spinner_path();
$view['services'] = $services;

Timber::render('services.twig', $view);



