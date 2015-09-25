/**
 * Created by wizard on 25/09/15.
 */


var gallerySlider = function(){

    var $sliderModalWrap    = $('.slider-modal-wrap'),
        $sliderWrap         = $('.slider-wrap'),
        $fooGaleryContainer = $('.foogallery-container'),
        $trigerLinks        = $fooGaleryContainer.find('a');


        return {
            inint: function(){
                console.log($trigerLinks);
            }
        };




};

module.export = new gallerySlider();