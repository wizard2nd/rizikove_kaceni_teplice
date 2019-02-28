<?php
class HeroIndexPost extends TimberPost {

    var $title = null;

    var $thumbnail = null;

    public function set_title($title){
        $this->title = $title;
    }

    public function set_thumbnail($thumbnail){
        $this->thumbnail = $thumbnail;
    }
}