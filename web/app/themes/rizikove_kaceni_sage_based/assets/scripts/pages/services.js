/**
 * Created by wizard on 28/09/15.
 */


module.exports = (function(){

    var
        $serviceNavigation      = $('.services-navigation'),
        $iconDown                    = $serviceNavigation.find('h2').next('span.glyphicon'),

        showList = function($iconDown){
            $iconDown
                .toggleClass('glyphicon-chevron-down')
                .toggleClass('glyphicon-chevron-up');
            $iconDown.parent('.title-wrap').next('ul').slideToggle();
        },

        bindEvents = function(){
            $iconDown.click(function(){
               showList($(this));
            });
        };

    return {
        init: function() {
            bindEvents();
            console.log('services init');
        }
    };


})();