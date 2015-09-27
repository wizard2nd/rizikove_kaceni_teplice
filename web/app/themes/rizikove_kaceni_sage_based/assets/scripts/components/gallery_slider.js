/**
 * Created by wizard on 25/09/15.
 */


module.exports = (function(){

    var $sliderModalWrap        = $('#slider-modal-wrap'),
        $closeModal             = $('#close-modal'),
        $loader                 = $sliderModalWrap.children('.loader'),
        $sliderWrap             = $sliderModalWrap.children('.slider-wrap'),
        $bxSlider               = $sliderWrap.children('.bx-slider'),
        $fooGalleryContainer    = $('.foogallery-container'),
        $triggerLinks           = $fooGalleryContainer.find('a'),
        attachmentsIds          = [],
        sliderIndex             = null,
        $bxSliderInstance       = null,
        carouselInitialized     = false,
        firstTimeDisplayed      = true,

        bxSliderOptions         = {
            pager : false,
            nextSelector: '#next-slide',
            prevSelector: '#prev-slide',
            nextText: '',
            prevText: ''
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
            sliderIndex = $el.index();
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
                beforeSend: function(){
                  showSliderModal();
                },
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
            initCarousel();
            if (firstTimeDisplayed){
                firstTimeDisplayed = false;
            }
            else{
                $bxSliderInstance.goToSlide(sliderIndex);
                setTimeout(function(){showSliderModal();},300);
            }
        },

        renderSliderImage = function(src){
            var $listItem = $('<li/>'),
                $sliderImage = $('<img/>');
            $sliderImage.attr('src', src);
            $sliderImage.appendTo($listItem);
            $listItem.appendTo($bxSlider);
        },

        renderSliderImages = function(images){
            _.each(images, function(image, index){
                renderSliderImage(image[0]);
            });
        },

        closeCarousel = function(){
            hideSliderModal();
        },

        bindEvents = function(){

            $triggerLinks.click(function(event){
                event.preventDefault();
                getSliderIndex($(this));
                showCarousel();
                //initCarousel();
            });

            $closeModal.click(function(){
                closeCarousel();
            });
        };

        return {
            init: function(){
                getAttachmentIds();
                bindEvents();
            }
        };
})();
