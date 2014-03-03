<?php
/**
 * Start Here - constants
 *
 * @package Start Here
 * @since 1.0.0
 */

function sh_setup() {
    load_theme_textdomain( 'starthere', get_template_directory() . '/lang' );

    register_nav_menus(array(
        'primary_navigation' => __( 'Main nav', 'starthere' ),
    ));

    // Add some theme support
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('nice-search'); // See /inc/clean.php line 187

    // Add post formats
    add_theme_support( 'post-formats', array(
        'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
    ) );

    /**
     * Add custom background
     * @since 1.0.0
     */
    add_theme_support( 'custom-background', apply_filters( 'sh_custom_background', array(
        'default-color' => 'fafafa',
    ) ) );

    // Add editor styles
    add_editor_style( '/css/editor-style.css' );

}
add_action( 'after_setup_theme', 'sh_setup' );
