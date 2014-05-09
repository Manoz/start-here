<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

// Enqueue stylesheets
add_action( 'wp_enqueue_scripts', 'sh_styles' );
function sh_styles() {
     // Define some variables for webfonts
     // Fonts variables (Ex: $source_sans) are only here to improve the code readability.
    $prot        = is_ssl() ? 'https' : 'http';
    $open_sans   = 'Open+Sans:300,400,600,300italic,400italic,600italic';
    $source_code = 'Source+Code+Pro';

    wp_enqueue_style( 'sh_norma',      THEME_CSS . '/norma.css',      false, '3.0.1' );
    wp_enqueue_style( 'sh_main',       THEME_CSS . '/main.css',       false, '1.0.0' );
    wp_enqueue_style( 'sh_fonts',      THEME_CSS . '/genericons.css', false, '3.0.3' );
    wp_enqueue_style( 'sh_webfont', "$prot://fonts.googleapis.com/css?family=Yellowtail|$open_sans|$source_code", false, '1.0.0' );
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'sh_scripts' );
function sh_scripts() {

    if( is_single() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
    wp_enqueue_script( 'sh_scripts',   THEME_JS . '/scripts.js',   array( 'jquery' ), '1.0.0', true );

}