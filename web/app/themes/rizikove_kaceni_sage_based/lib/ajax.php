<?php

use rk\References;

function get_gallery_attachments_images(){
    \rk\PageBase::get_attachment_images();
}

function get_references(){
    $references = new References($_GET['post_id']);
    die(json_encode($references->get_page($_GET['page'])));
}

add_action("wp_ajax_get_gallery_attachments_images", "get_gallery_attachments_images");
add_action("wp_ajax_nopriv_get_gallery_attachments_images", "get_gallery_attachments_images");

add_action("wp_ajax_get_references", "get_references");
add_action("wp_ajax_get_references", "get_references");
