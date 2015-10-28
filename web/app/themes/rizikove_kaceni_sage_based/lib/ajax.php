<?php

function get_gallery_attachments_images(){
\rk\Gallery::get_attachment_images();
}

add_action("wp_ajax_get_gallery_attachments_images", "get_gallery_attachments_images");
add_action("wp_ajax_nopriv_get_gallery_attachments_images", "get_gallery_attachments_images");