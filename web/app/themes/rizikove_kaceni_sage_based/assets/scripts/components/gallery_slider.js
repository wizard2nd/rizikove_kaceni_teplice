/**
 * Created by wizard on 25/09/15.
 */


module.exports = (function(){

    var $sliderModalWrap        = $('#slider-modal-wrap'),
        $closeModal             = $('#close-modal'),
        $loader                 = $sliderModalWrap.children('.loader'),
        $sliderWrap             = $sliderModalWrap.children('.slider-wrap'),
        $bxSlider               = $sliderWrap.find('.bx-slider'),
        $fooGalleryContainer    = $('.gallery-image-container'),
        $triggerLinks           = $fooGalleryContainer.find('a.slide-image'),
        attachmentsIds          = [],
        slideIndex              = 0,
        $bxSliderInstance       = null,
        carouselBuild           = false,
        carouselInitialized     = false,
        firstTimeDisplayed      = true,
        $window                 = $(window),
        orientation             = 'portrait',

        bxSliderOptions         = {
            pager : false,
            nextSelector: '#prev-slide',
            prevSelector: '#next-slide',
            nextText: '',
            prevText: ''
            //slideWidth: 300
        },


        getAttachmentIds = function(){
            if ($triggerLinks.length > 0){
                _.each($triggerLinks, function(el, index){
                    var data = $(el).data();
                    attachmentsIds.push(data.attachmentId);
                });
            }
        },

        getSlideIndex = function($el){
            var li_parent = $el.parent('li');
            slideIndex = li_parent.length === 0 ? $el.index()
                                                 : li_parent.index();
            //console.log(slideIndex);
        },

        /**
         * Download carousel images on background
         * @returns {*}
         */
        getAttachmentImages = function(){
            var getAttachmentsFn = $sliderModalWrap.data();
            getAttachmentsFn = getAttachmentsFn.getAttachmentImages;

            return $.ajax({
                url: '/wp/wp-admin/admin-ajax.php',
                type: 'post',
                dataType: 'json',
                data: {action: getAttachmentsFn, attachment_ids: attachmentsIds},
                success: function(response){},
                error :function(jqXHR, status, err){
                    console.log(status);
                    console.log(err);
                }
            });
        },

        showSliderModal = function(){
            $sliderModalWrap.removeClass('hide-slider');
        },

        hideSliderModal = function(){
            $sliderModalWrap.addClass('hide-slider');
        },

        /**
         * Download images from server and create carousel html markup
         */
        buildCarousel = function(){
            // load slide images only if slider is empty
            if ($bxSlider.children('li').length === 0){
                getAttachmentImages().done(function(response){

                    if (response.result === false){
                        console.log(response.error);
                        return;
                    }

                    renderSliderImages(response.data);
                    carouselBuild = true;
                });
            }
        },

        initCarousel = function(){
            bxSliderOptions.startSlide = slideIndex;
            $bxSliderInstance = $bxSlider.bxSlider(bxSliderOptions);
            centerCarouselVertically();
            $loader.hide();
            $sliderWrap.removeClass('invisible');
        },

        showCarousel = function(){

            // show slider modal
            $sliderModalWrap.removeClass('hide-slider');

            // wait until buildCarousel is finished
            while(true){
                if (carouselBuild){
                    initCarousel();
                    break;
                }
            }

            if (carouselInitialized){
                initCarousel();
            }
        },

        renderSliderImage = function(image){
            var $listItem = $('<li/>'),
                $sliderImage = $('<img/>');
            $sliderImage.attr('src', image[0]);

            // portrait image
            if (image[1] < image[2]){
                $sliderImage.addClass('portrait');
            }

            $sliderImage.appendTo($listItem);
            $listItem.appendTo($bxSlider);
        },

        renderSliderImages = function(images){
            _.each(images, function(image, index){
                renderSliderImage(image);
            });
        },

        closeCarousel = function(){
            hideSliderModal();
            $loader.show();
            $bxSlider.destroySlider();
        },

        centerCarouselVertically = function(){
            $sliderWrap.css('margin-top', (Math.round($sliderWrap.height()/2)) * -1);
        },

        bindEvents = function(){

            $triggerLinks.click(function(event){
                event.preventDefault();
                getSlideIndex($(this));
                showCarousel();
            });

            $closeModal.click(function(){
                closeCarousel();
            });

            $window.resize(function(){
                centerCarouselVertically();
            });
        };

        return {
            init: function(){
                console.log('gallery slider init');
                getAttachmentIds();
                buildCarousel();
                bindEvents();
            }
        };
})();
