<?php
/** Template Name: References */

$rows = get_field('reference');
$view['references'] = $rows;

Timber::render('reference.twig', $view);
