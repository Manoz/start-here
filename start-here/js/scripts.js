/**
 * Start Here scripts
 * @since 1.0.0
*/

(function($) {
    hachcustom = {

        /* --------------------------------------
          =Better count for categories
        ---------------------------------------- */
        categories: function() {
            $('.widget_categories li.cat-item').each(function() {
                var $contents = $(this).contents();
                if ($contents.length > 1) {
                    $contents.eq(1).wrap('<div class="cat-num"><span class="inner-num"></span></div>');

                    $contents.eq(1).each(function() {});
                }
            }).contents();

            $('.widget_categories li.cat-item .cat-num .inner-num').each(function() {
                $(this).html($(this).text().substring(2));
                $(this).html($(this).text().replace(/\)/gi, ""));
            });

            if ($('.widget_categories li.cat-item').length) {
                $('.widget_categories li.cat-item .cat-num .inner-num').each(function() {
                    if ($(this).is(':empty')) {
                        $(this).parent().hide();
                    }
                });
            }
        },

        /* -------------------------------------------
          =Equalize the sidebar and the content sizes
        ---------------------------------------------- */
        equalize: function() {
            $( '.sh-sidebar' ).css( 'min-height', $( '.sh-content' ).height() );
        }

    }


})(jQuery);

// Init all this crappy stuff
jQuery(document).ready(function($) {

    hachcustom.categories();
    hachcustom.equalize();

    // Equalize the sidebar each time the content is resized.
    $( 'sh-content' ).resize( function() {
        sh_equal_sizes();
    });

});
