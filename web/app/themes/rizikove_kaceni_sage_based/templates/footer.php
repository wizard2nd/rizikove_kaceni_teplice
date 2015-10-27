<?php

use rk\Contact;
use rk\Footer;

$footer = new Footer();
$contact = new Contact();

$view = $contact->get_address_fields();

$view['site_map_title'] =  __('Site map', 'sage');
$view['service_title'] =  __('Services', 'sage');
$view['contact_title'] = __('Contact', 'sage');

$view['page_map'] = $footer->get_page_map();
$view['service_map'] = $footer->get_services_map();

Timber::render('partials/footer.twig', $view);
