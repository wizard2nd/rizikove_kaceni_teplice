<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 25/09/15
 * Time: 13:50
 */

namespace rk;


class Gallery extends PageBase {

    public static function get_gallery_thumbnails($image_url){
        return preg_replace('@(\d*)(x)(\d*)@', '300x300', $image_url);
    }

}