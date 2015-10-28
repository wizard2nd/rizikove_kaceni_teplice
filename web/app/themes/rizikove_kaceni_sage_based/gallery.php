<?php
/** Template Name: Gallery */

use rk\FrontendHelper;

$view['post'] = Timber::get_post();
$view['spinner'] = FrontendHelper::spinner_path();
$view['get_images_fn'] = 'get_gallery_attachments_images'; // ajax function to call to get big slider images

Timber::render('gallery.twig', $view);