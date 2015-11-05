<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 25/09/15
 * Time: 13:53
 */

namespace rk;


class addHookHelper {

    public function __construct(){
        $this->filter_galery_thumbs_url();
    }

    /**
     * Add filter hook for Foogalery thumbs images
     * it changes dim from 150x150 to 300X300
     */
    private function filter_galery_thumbs_url(){
        add_action('foogallery_attachment_resize_thumbnail', array('\rk\Gallery', 'get_gallery_thumbnails'), 10, 1);
    }
}

new addHookHelper();

