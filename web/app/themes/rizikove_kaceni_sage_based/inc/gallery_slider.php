<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 25/09/15
 * Time: 13:50
 */

namespace rk;


class gallerySlider {

    private static function error_handler($errno, $errstr, $file, $line){
        $data = [
            'result' => false,
            'error' => $errstr,
            'line' => $line
        ];
        die(json_encode($data));
    }

    public static function get_attachment_images(){
        set_error_handler(array('self', 'error_handler'));
        $result = [
            'result' => true,
            'error' => null,
        ];

        $attachment_ids = $_POST['attachment_ids'];

        if (isset($attachment_ids)){
            $attachment_images = [];
            foreach ($attachment_ids as $id) {
                $attachment_images[] = wp_get_attachment_image_src($id, 'gallery-image');
            }
            $result['data'] = $attachment_images;
            die(json_encode($result));
        }
        else{
            $result['error'] = 'No images found';
            die(json_encode($result));
        }
    }

}