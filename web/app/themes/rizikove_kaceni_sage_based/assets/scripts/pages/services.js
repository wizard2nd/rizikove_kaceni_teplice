/**
 * Created by wizard on 28/09/15.
 */


module.exports = (function(){

    var
        $serviceContainer       = $('#service-page'),
        $serviceContainerData   = $serviceContainer.data(),
        $serviceNavigation      = $('.services-navigation'),
        $h_2                    = $serviceNavigation.find('h2'),

        addSlideDownCursor = function(){
            _.each($h_2, function(title){
                $(title).append('<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>');
            });
        },

        showSlideDownCursor = function(){
            $h_2.children('.glyphicon').fadeIn();
            console.log('showing cursors');
        },

        showList = function($title){
            $title.children('span')
                .toggleClass('glyphicon-chevron-down')
                .toggleClass('glyphicon-chevron-up');
            $title.next('ul').slideToggle();
        },

        bindEvents = function(){
            $h_2.click(function(){
               showList($(this));
            });
        };

    return {
        init: function() {
            if ($serviceContainer.length === 0){
                return;
            }

            if ($serviceContainerData.isMobile === 1){
                addSlideDownCursor();
                showSlideDownCursor();
                bindEvents();
            }
        },
        showSlideDownCursor: function(){

        }
    };


})();