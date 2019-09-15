<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 20/10/15
 * Time: 12:27
 */

namespace rk;


class PageBase {

    private $post = null;

    const TITLE_MAX_CHARS = 20;

    public function __construct($post_id) {
        $this->post = get_post($post_id);
    }

    public function has_long_title(){
        if (strlen($this->post->post_title) > self::TITLE_MAX_CHARS){
            return true;
        }
        else {
            return false;
        }
    }

    protected static function error_handler($errno, $errstr, $file, $line){
        $data = [
            'result' => false,
            'error' => $errstr,
            'line' => $line
        ];
        die(json_encode($data));
    }

    /**
     * Returns attachment images url of post
     */
    public static function get_attachment_images(){
        set_error_handler(array('self', 'error_handler'));
        $result = [
            'result' => true,
            'error' => null,
        ];

        $device = FrontendHelper::get_device();
        $dim = '';
        switch($device){
            case 'mobile': $dim = 'gallery-image-mobile';
                break;
            case 'tablet': $dim = 'gallery-image-tablet';
                break;
            case 'desktop': $dim = 'gallery-image-desktop';


        }

        $attachment_ids = $_POST['attachment_ids'];

        if (isset($attachment_ids) && !empty($attachment_ids)){
            $attachment_images = [];
            foreach ($attachment_ids as $id) {
                $attachment_images[] = wp_get_attachment_image_src($id, $dim);
            }
            $result['data'] = $attachment_images;
            die(json_encode($result));
        }
        else{
            $result['error'] = 'No images found';
            die(json_encode($result));
        }
    }

    protected function get_post($post_id)
    {
        $this->post = get_post($post_id);
    }

    protected function get_post_property($post_id, $property_names){
        $properties = array();
        $this->get_post($post_id);
        if ($this->post === null){
            return null;
        }
        if (is_array($property_names)){
            foreach ($property_names as $property_name) {
                if (property_exists($this->post, $property_name)){
                    $properties[$property_name] = __($this->post->{$property_name});
                }
            }
            return $properties;
        }
        elseif (is_string($property_names)){
            if (property_exists($this->post, $property_names)){
                return __($this->post->{$property_names});
            }
        }
    }

}