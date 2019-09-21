<?php
/** Template Name: Service */

use rk\Service;
$display = [ 'content' ];
$service = new Service(get_the_ID(), $display);
$view['service'] = $service->to_view();

Timber::render('service.twig', $view);