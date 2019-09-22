<?php
/** Template Name: References */

$references = get_field('reference');
$view['references'] = array_slice($references, 0,4);

Timber::render('reference.twig', $view);
