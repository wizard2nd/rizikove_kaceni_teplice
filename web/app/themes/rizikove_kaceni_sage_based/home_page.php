<?php
/** Template Name: Home Page */
use rk\Service;

$services_ids = array(36, 38, 42);
$services = [];
foreach ($services_ids as $service_id) {
    $service = new Service($service_id);
    $services[$service_id] = $service->display_fields();
};

$view['services'] = $services;
$view['additional_services'] = get_field('front_page_services', 27);
$view['clients'] = get_field('clients');

Timber::render('home_page.twig', $view);

