/**
 * Created by wizard on 16/09/15.
 */

var Profile = function(){

    var profileCarouselId = 'profile-carousel',
        $profileCarousel  = $('#'+profileCarouselId),
        slideClass        = '.slide-image',
        $slide            = $(slideClass);

    var showCarousel = function(){
        $profileCarousel.show();
    };

    var bindEvents = function(){
        $slide.click(function(e){
            e.preventDefault();
            showCarousel();
        });
    };

    return {
        init: function(){
            bindEvents();
        }
    };
};


module.exports = new Profile();
