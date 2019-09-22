<?php
/** Template Name: References */

use rk\References;

$references = new References(get_the_ID());
$view['references'] = $references->get_page(1);
$view['post_id'] = get_the_ID();
$view['ref_count'] = $references->count;

Timber::render('reference.twig', $view);
