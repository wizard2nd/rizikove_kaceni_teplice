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
        sliderIndex             = 0,
        $bxSliderInstance       = null,
        carouselInitialized     = false,
        firstTimeDisplayed      = true,
        $window                 = $(window),
        orientation             = 'portrait',

        bxSliderOptions         = {
            pager : false,
            nextSelector: '#next-slide',
            prevSelector: '#prev-slide',
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

        getSliderIndex = function($el){
            var li_parent = $el.parent('li');
            sliderIndex = li_parent.length === 0 ? $el.index()
                                                 : li_parent.index();
            //console.log(sliderIndex);
        },

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

        initCarousel = function(){
            // load slide images only if slider is empty
            if ($bxSlider.children('li').length === 0){
                getAttachmentImages().done(function(response){

                    if (response.result === false){
                        console.log(response.error);
                        return;
                    }

                    renderSliderImages(response.data);
                    $bxSliderInstance = $bxSlider.bxSlider(bxSliderOptions);
                    centerCarouselVertically();
                    $bxSliderInstance.goToSlide(sliderIndex);
                    setTimeout(function(){
                        $loader.hide();
                        $sliderWrap.removeClass('invisible');
                    }, 300);
                    carouselInitialized = true;
                });
            }
        },

        showCarousel = function(){
            if (carouselInitialized){
                $bxSliderInstance.goToSlide(sliderIndex);
                setTimeout(function(){showSliderModal();},300);
            }
            else{
                showSliderModal();
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
        },

        centerCarouselVertically = function(){
            setTimeout(function(){
                $sliderWrap.css('margin-top', (Math.round($sliderWrap.height()/2)) * -1);
            }, 50);
        },

        bindEvents = function(){

            $triggerLinks.click(function(event){
                event.preventDefault();
                getSliderIndex($(this));
                centerCarouselVertically();
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
                initCarousel();
                bindEvents();
            }
        };
})();
