<?php
/** Template Name: References */

use rk\References;
use rk\FrontendHelper;

$references = new References(get_the_ID());
$view['references'] = $references->get_page(1);
$view['post_id'] = get_the_ID();
$view['ref_count'] = $references->count;
$view['spinner'] = FrontendHelper::spinner_path();
$view['page_count'] = $references->page_count();

Timber::render('reference.twig', $view);
