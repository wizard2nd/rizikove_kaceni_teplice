var Navigation = function() {

    var $navigation = $("[role=navigation]"),
        $burger_menu = $('.burger-menu'),
        $menuOpen = $("[role=menu-open]");

    var menuOpenEvent = function() {
        $menuOpen.click(function () {
            $navigation.toggleClass('open');
            $burger_menu.toggleClass('open');
        });
    };
    
    var scrollFromTopEvent = function () {
        $(document).scroll(function() {
            if($(window).scrollTop() > 10) {
                $navigation.addClass('scrolled');
            }
            else {
                $navigation.removeClass('scrolled');
            }
        });
    };

    return {
        init: function() {
            menuOpenEvent();
            scrollFromTopEvent();
        }
    };
};

module.exports = new Navigation();