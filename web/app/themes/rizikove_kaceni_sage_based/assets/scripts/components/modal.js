/**
 * Created by wizard on 16/09/15.
 */

var Profile = function(){

    var profileCarouselClass    = '.modal-wrap',
        $profileCarousel        = $(profileCarouselClass),
        slideClass              = '.slide-image',
        $slide                  = $(slideClass),
        closeCarouselId         = 'close-modal',
        $closeCarousel          = $('#'+closeCarouselId),
        carouselClass           = '.carousel';

    var showCarousel = function(){
        $profileCarousel.show();
    };

    var closeCarousel = function(){
        $profileCarousel.hide();
    };

    var getSlideNUmber = function($el){

    };

    var bindEvents = function(){
        $slide.click(function(e){
            e.preventDefault();
            showCarousel();

        });

        $closeCarousel.click(function(){
            closeCarousel();
        });
    };

    return {
        init: function(){
            bindEvents();
        }
    };
};


module.exports = new Profile();
