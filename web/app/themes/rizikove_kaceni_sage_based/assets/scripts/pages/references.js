/**
 * Created by wizard on 28/09/15.
 */


module.exports = (function(){

    var $nextButton     = $('#next'),
        $references     = $('#references'),
        $referenceTmpl  = $('#references-tmpl'),
        page            = 1,
        $spinner        = $('#spinner'),

        getNextReferences = function () {

            return $.ajax({
                url: '/wp/wp-admin/admin-ajax.php',
                type: 'get',
                dataType: 'json',
                data: {
                    action: 'get_references',
                    post_id: $references.data('postId'),
                    page: page
                },
                beforeSend: function () {
                  showSpinner();
                },
                success: function (response) {
                    showNextReferences(response.data);
                    if (page >= $references.data('pageCount')) { hideNextButton(); }
                },
                error: function (jqXHR, status, err) {
                    console.log(status);
                    console.log(err);
                    $spinner.addClass('hide');
                }
            });
        },

        hideSpinner = function () {
            $spinner.addClass('hide');
        },

        showSpinner = function () {
            $spinner.removeClass('hide');
        },

        hideNextButton = function () {
            $nextButton.addClass('hide');
        },

        newReferences = function () {
            return $references.find('.new-references').last();
        },

        showNextReferences = function (references) {
            console.log(references);
            Mustache.parse($referenceTmpl.html());
            $references.append(Mustache.render($referenceTmpl.html(), { references: references } ));
            hideSpinner();
            setTimeout(function () {
                newReferences().addClass('new-references-show');
            },100);
        },

        loadNextReferences = function(){
            $nextButton.click(function (event) {
                page++;
                event.preventDefault();
                getNextReferences();
            });
        };

        return {
            init: function() {
                loadNextReferences();
            }
        };

})();