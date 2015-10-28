<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 21/09/15
 * Time: 13:33
 */

namespace rk;


class Contact {

    private $post_type = 'personal_info';

    private $post_name = 'address-2';

    private $address_fields = array();

    private $email;

    private $phone_number;

    private $google_map_api_key;

    private $address_coordinates;


    public function __construct(){
        $args = array( 'post_type' => $this->post_type, );
        $personal_infos = get_posts($args);
        foreach ($personal_infos as $info) {
            if (strtolower($info->post_name) === $this->post_name) {
                $contact_fields = get_fields($info->ID);
                foreach ($contact_fields as $field => $value) {
                    switch($field) {
                        case 'email':
                            $this->email = $value;
                            break;
                        case 'phone_number':
                            $this->phone_number = $value;
                            break;
                        case 'google_api_key':
                            $this->google_map_api_key = $value;
                            break;
                        case 'coordinates':
                            $coordinates = explode(',', $value);
                            $this->address_coordinates['lat'] = trim($coordinates[0]);
                            $this->address_coordinates['lng'] = trim($coordinates[1]);
                            break;
                        default:
                            $this->address_fields[$field] = $value;
                    }
                }
                break;
            }
        }
    }

    public function get_address_fields()
    {
        $view['address_fields'] = $this->address_fields;
        $view['email'] = $this->email;
        $view['phone'] = $this->phone_number;
        return $view;
    }

    public function get_google_api_key()
    {
        return $this->google_map_api_key;
    }

    public function get_coordinates()
    {
        return $this->address_coordinates;
    }
}
