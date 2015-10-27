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

    public function __construct()
    {

    }

    protected function get_post($post_id)
    {
        $this->post = get_post($post_id);
    }

    protected function get_post_property($post_id, $property_names){
        $properties = array();
        $this->get_post($post_id);
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