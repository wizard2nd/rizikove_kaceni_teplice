/**
 * Created by wizard on 25/09/15.
 */


var gallerySlider = function(){

    var $sliderModalWrap        = $('#slider-modal-wrap'),
        $sliderWrap             = $sliderModalWrap.children('.slider-wrap'),
        $bxSlider               = $sliderWrap.children('.bxslider'),
        $fooGalleryContainer    = $('.foogallery-container'),
        $triggerLinks           = $fooGalleryContainer.find('a'),
        attachmentsIds          = [],
        sliderIndex             = null,

        bxSliderOptions         = {
            pager: false
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

            $.ajax({
                url: 'http://rizikovekaceni-teplice.dev/wp/wp-admin/admin-ajax.php',
                type: 'post',
                dataType: 'json',
                data: {action: getAttachmentsFn, attachment_ids: attachmentsIds},
                success: function(response){
                    if (response.result === false){
                        console.log(response.error);
                        return;
                    }
                    renderSliderImages(response.data);
                    initCarousel(bxSliderOptions);
                },
                error :function(jqXHR, status, err){
                    console.log(status);
                    console.log(err);
                }
            });
        },

        initCarousel = function(){
            $bxSlider.bxSlider();
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

        bindEvents = function(){
            $triggerLinks.click(function(event){
                event.preventDefault();
                getSliderIndex($(this));
                getAttachmentImages();
            });
        };

        return {
            init: function(){
                getAttachmentIds();
                bindEvents();
            }
        };




};

module.exports = new gallerySlider();