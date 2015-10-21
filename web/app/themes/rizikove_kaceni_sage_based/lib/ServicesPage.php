<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 20/10/15
 * Time: 12:28
 */

namespace rk;


class ServicesPage extends PageBase {

    private $id = 27;

    public function __construct(){

    }

    public function add_slide_down_icon($content){
        if ($GLOBALS['post']->ID == $this->id){
            return preg_replace('@(<h2>.*</h2>)@', '<div class="title-wrap">$1<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></div>', $content);
        }
    }

}