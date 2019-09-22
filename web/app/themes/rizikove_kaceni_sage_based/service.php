<?php
/** Template Name: Service */

use rk\Service;
$display = [ 'content', 'featured_images' ];
$service = new Service(get_the_ID(), $display);
$view['service'] = $service->display_fields();

Timber::render('service.twig', $view);