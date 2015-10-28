<?php
/** Template Name: Contact */

use \rk\Contact;

$contact = new Contact();

//$view = Timber::get_context();


$view = $contact->get_address_fields();

$view['post'] = Timber::get_post();
$view['address_title'] = __('Address', 'sage');
$view['form_title'] = __('Use this form to contact provider instantly', 'sage');


$coordinates = $contact->get_coordinates();
$view['coordinates']['lat'] = $coordinates['lat'];
$view['coordinates']['lng'] = $coordinates['lng'];

if (is_mobile()){
    $view['zoom'] = 14;
}
elseif (is_tablet()){
    $view['zoom'] = 15;
}
else{
    $view['zoom'] = 15;
}

Timber::render('contact.twig', $view);