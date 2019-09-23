<?php

use rk\References;
use rk\PageBase;

//set_error_handler(array('PageBase', 'error_handler'));

function get_gallery_attachments_images(){
    PageBase::get_attachment_images();
}

function get_references(){
    $references = new References($_GET['post_id']);
    $result = [
        'result' => true,
        'data' => $references->get_page($_GET['page'])
    ];

    die(json_encode($result));
}

add_action("wp_ajax_get_gallery_attachments_images", "get_gallery_attachments_images");
add_action("wp_ajax_nopriv_get_gallery_attachments_images", "get_gallery_attachments_images");

add_action("wp_ajax_get_references", "get_references");
add_action("wp_ajax_get_references", "get_references");
