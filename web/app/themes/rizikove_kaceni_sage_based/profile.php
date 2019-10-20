<?php
/** Template Name: Profile */
use rk\FrontendHelper;

$featured_images = get_fields();
$view['profile'] = [
    'featured_images' => FrontendHelper::get_featured_images($featured_images, 'gallery-thumb'),
    'post'            => new Timber\Post()
];

Timber::render('profile.twig', $view);