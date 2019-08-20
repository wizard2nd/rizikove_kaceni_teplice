var Navigation = function() {

    var $navigation = $("[role=navigation]"),
        $menuOpen = $("[role=menu-open]");

    var menuOpenEvent = function() {
        $menuOpen.click(function () {
            $navigation.toggleClass('open');
        });
    };

    return {
        init: function() {
            menuOpenEvent();
        }
    }
};

module.exports = new Navigation();