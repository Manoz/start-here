<?php
/**
 * Custom header functions
 * If we use a global $post; in a 404 or an archive page,
 * the $post is NULL. We should use if ( is_a( $post, 'WP_Post' ) ) instead.
 * See : https://twitter.com/BoiteAWeb/status/442783684899254273 (french tweets)
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

/**
 * Add a <style> tag for the custom header image.
 * @since 1.0.0
 * @todo Find a better way to do this
 */
add_action( 'wp_enqueue_scripts', 'sh_add_style_custom_header' );
function sh_add_style_custom_header() {
    $header_img      = get_header_image();
    $title_color     = get_header_textcolor();
    $menu_color      = get_theme_mod( 'sh_header_menu_color' );
    $header_bg_color = get_theme_mod( 'sh_header_bg_color' );

    if( $header_img ) {
        $custom_css = "
        .sh-header {
            background: transparent url('$header_img') !important;
            background-position: 50% 30%  !important;
            background-size: cover  !important;
        }

        .site-title a {color: #$title_color;}
        .sh-nav li a {color: $menu_color;}
        .sh-header {background: $header_bg_color;}
        ";
    } else {
        $custom_css = "
        .site-title a {color: #$title_color;}
        .sh-nav li a {color: $menu_color;}
        .sh-header {background: $header_bg_color;}
        ";
    }

    if( $header_img || $title_color || $menu_color || $header_bg_color ) {
        wp_add_inline_style( 'sh_main', $custom_css );
    }
}
