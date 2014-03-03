<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @package Start Here
 * @since 1.0.0
 */
function sh_styles() {
    // Protocol (http or https) for webfonts
    $prot = is_ssl() ? 'https' : 'http';

    wp_register_style('normalize',  get_template_directory_uri() . '/css/a-normalize.css', false, '1.0.0');
    wp_register_style('main',       get_template_directory_uri() . '/css/main.css', false, '1.0.0' );
    wp_register_style('sh_fonts',  get_template_directory_uri() . '/css/fonts.css', false, '1.0.0');
    wp_register_style('webfont',    "$prot://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,600" );

    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'main' );
    wp_enqueue_style( 'sh_fonts' );
    wp_enqueue_style( 'webfont' );

}
add_action( 'wp_enqueue_scripts', 'sh_styles' );

function sh_scripts() {

    if (is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script(
        'sh_scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sh_scripts' );