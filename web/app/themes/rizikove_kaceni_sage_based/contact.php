<?php
/** Template Name: Contact */

use \rk\Contact;
use Timber\Post;

$contact = new Contact();
$coordinates = $contact->get_coordinates();
$post = new Post();

//var_dump($post->thumbnail->src('gallery-thumb'));

$view = $contact->get_address_fields();
$view['post'] = $post;
$view['coordinates']['lat'] = $coordinates['lat'];
$view['coordinates']['lng'] = $coordinates['lng'];
$view['zoom'] = 11;

Timber::render('contact.twig', $view);