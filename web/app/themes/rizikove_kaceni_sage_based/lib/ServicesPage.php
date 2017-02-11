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

    private $slide_down_icon = '<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>';

    private $slide_up_icon = '<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>';

    public function __construct(){

    }

    public function add_slide_down_icon($content){
        return preg_replace('@(<h2>.*</h2>)@', '<div class="title-wrap">$1'.$this->slide_down_icon.'</div>', $content);
    }

    public function add_slide_up_icon($content){
        return preg_replace('@(<h2>.*</h2>)@', '<div class="title-wrap">$1'.$this->slide_up_icon.'</div>', $content);
    }

}