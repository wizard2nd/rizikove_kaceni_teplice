<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 13/06/15
 * Time: 21:26
 */

namespace rk\frontend_helper;


class FrontendHelper {

    public static function asset_version($asset_path){
        return filemtime(get_stylesheet_directory().DIST_DIR.$asset_path);
    }

}