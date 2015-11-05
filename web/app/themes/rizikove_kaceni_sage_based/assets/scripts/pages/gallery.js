/**
 * Created by wizard on 27/09/15.
 */

module.exports = (function(){

    var
        $galleryHeader      = $('.foogallery-album-header'),
        $galleryNav         = $galleryHeader.find('a'),
        $galleryContainer   = $('.gallery-image-container'),
        $thumbnails         = $galleryContainer.find('a.slide-image'),
        showDelay           = 200,

        addNavigationArrow = function(){
            $galleryNav.prepend('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>');
        },

        showThumbnails = function(){
          for (var i = 0; i <= $thumbnails.length; i++){
              $($thumbnails[i]).addClass('full-opacity').delay(i * showDelay);
          }
        };

    return {
        init: function(){
            addNavigationArrow();
        }
    };

})();