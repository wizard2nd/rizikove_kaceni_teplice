/**
 * Created by wizard on 27/09/15.
 */

module.exports = (function(){

    var
        $galleryHeader  = $('.foogallery-album-header'),
        $galleryNav      = $galleryHeader.find('a'),

        addNavigationArrow = function(){
            $galleryNav.prepend('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>');
        };

    return {
        init: function(){
            addNavigationArrow();
        }
    };

})();