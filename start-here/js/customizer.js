/**
 * Our Theme Customizer enhancements
*/
(function($) {
    // Header menu color
    wp.customize( 'sh_header_menu_color',function( value ) {
        value.bind( function( to ) {
            $( '.sh-nav li a' ).css( 'color', to );
        });
    });

    // Header background color
    wp.customize( 'sh_header_bg_color',function( value ) {
        value.bind( function( to ) {
            $( '.sh-header' ).css( 'background', to );
        });
    });
})(jQuery);
