<?php
/** Template Name: Services */
use rk\FrontendHelper;
use rk\Service;

$services = get_children(array('post_parent' => get_the_ID()));
foreach ($services as $service) {
    $service = new Service($service);
    $services[$service->id] = $service->display_fields();
}

$view['spinner'] = FrontendHelper::spinner_path();
$view['services'] = $services;

Timber::render('services.twig', $view);



