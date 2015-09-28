/**
 * Created by wizard on 16/09/15.
 */

var Modal = function(){

    var $modalWrap      = $('.modal-wrap'),
        $modalContent   = $modalWrap.find('.rk-modal-content'),
        $modalOpen      = $('.modal-open'),
        $closeModal     = $('#close-modal'),
        target_id       = null,
        content         = null;

    var showCarousel = function(){
        $modalWrap.show();
    };

    var closeCarousel = function(){
        $modalWrap.hide();
    };

    var getTarget = function($el){
        target_id = $el.attr('href');
    };

    var emptyModalContent = function(){
        $modalContent.empty();
    };

    var insertModalContent = function(){
        content = $('#'+target_id).clone();
        $modalContent.append(content.show());
        if (content.hasClass('carousel')){
            $('#profile-carousel').carousel();
        }

    };

    var bindEvents = function(){
        $modalOpen.click(function(e){
            e.preventDefault();
            getTarget($(this));
            insertModalContent();
            showCarousel();
        });


        _.each([$closeModal], function($el){
            $el.click(function(){
                emptyModalContent();
                closeCarousel();
            });
        });

    };

    return {
        init: function(){
            bindEvents();
        }
    };
};

module.exports = new Modal();
