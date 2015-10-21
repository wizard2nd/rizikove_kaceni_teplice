<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 21/09/15
 * Time: 13:33
 */

namespace rk\contact;


class Contact {

    private $post_type = 'personal_info';

    private $post_name = 'address';

    private $map;

    private $address_fields = array();

    private $contact_fields = array();


    public function __construct(){
        $args = array( 'post_type' => $this->post_type, );
        $personal_infos = get_posts($args);
        foreach ($personal_infos as $info) {
            if (strtolower($info->post_name) === $this->post_name) {
                $contact_fields = get_fields($info->ID);
                $this->map = $info->post_content;
                foreach ($contact_fields as $field => $value) {
                    if (!in_array($field, array('email', 'phone_number'))){
                        $this->address_fields[$field] = $value;
                    }
                    else{
                        $this->contact_fields[$field] = $value;
                    }

                }
                break;
            }
        }
    }

    private function render($fields, $class){
        print '<p class="'.$class.'">';
        foreach ($fields as $value){
            print $value.'</br>';
        }
        print '<p>';
    }

    public function render_address(){
        $this->render($this->address_fields, 'address');
    }

    public function render_contact(){
        print '<p class="mail-phone">';
        $this->render_email();
        $this->render_phone();
        print '</p>';


    }

    public function render_email(){
        print "<span class=\"glyphicon glyphicon-envelope\" aria-hidden=\"true\"></span>";
        print '&nbsp;';
        print "<a href=\"mailto:{$this->contact_fields['email']}\">{$this->contact_fields['email']}</a><br/>";
    }

    public function render_phone(){
        print "<span class=\"glyphicon glyphicon-earphone\" aria-hidden=\"true\"></span>";
        print '&nbsp;';
        print $this->contact_fields['phone_number'];
    }

    public function get_map(){
        return $this->map;
    }

}
