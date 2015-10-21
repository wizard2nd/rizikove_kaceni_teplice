<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 16/09/15
 * Time: 12:07
 */

namespace rk\helpers;

class CarouselHelper {

    private $slide_count = null;

    private $carousel_name = null;

    private $slide_images = null;

    /**
     * @param $carousel_name
     * @param $slide_images
     */
    public function __construct($carousel_name, $slide_images)
    {
        $this->carousel_name = $carousel_name;
        $this->slide_images = $slide_images;
        $this->slide_count = count($this->slide_images);
    }

    private function render_indicators(){
        print '<ol class="carousel-indicators">';
        for($i = 0; $i <= $this->slide_count - 1; $i++){
            $active = $this->is_active($i);
            print "<li data-target=\"#$this->carousel_name\" data-slide-to=\"$i\" class=\"$active\"></li>";
        }
        print '</ol>';
    }

    private function render_controls(){
        print <<<HTML
            <a class="left carousel-control" href="#$this->carousel_name" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#$this->carousel_name" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
HTML;
    }

    private function is_active($index){
        return $index == 0 ? 'active' : null;
    }

    private function render_slides(){
        print '<div class="carousel-inner" role="listbox">';
        $i = 0;
        foreach ($this->slide_images as $caption => $image_slide) {
            $caption = is_string($caption) ? "<div class=\"carousel-caption\">$caption</div>" : null;
            $active = $this->is_active($i++);
            print <<< HTML
                <div class="item $active">
                    $image_slide
                    $caption
                </div>
HTML;
        }
        print '</div>';

    }

    public function render($indicators = true){
        print "<div id=\"$this->carousel_name\" class=\"carousel slide\" data-ride=\"carousel\">";
        if ($indicators){
            $this->render_indicators();
        }
        $this->render_slides();
        $this->render_controls();
        print "</div>";
    }
}