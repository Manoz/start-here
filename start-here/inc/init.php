<?php
/**
 * Start Here - Theme init stuff
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
add_action( 'after_setup_theme', 'sh_setup' );
function sh_setup() {

    // Set the content width
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 750;
    }

    // Load our textdomain
    load_theme_textdomain( 'textdomain', get_template_directory() . '/languages' );

    // Register our two navigation menus
    register_nav_menus( array(
        'primary_navigation' => __( 'Main navigation', 'textdomain' ),
        'social_navigation'  => __( 'Footer social navigation', 'textdomain' )
    ) );

    // Add some theme support
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption') );
    add_editor_style( '/css/editor-style.css' );

    // Custom header arguments
    $args_head = array(
        'width'                  => 1920,
        'height'                 => 200,
        'flex-height'            => true,
        'flex-width'             => true,
        'uploads'                => true,
        'default-text-color'     => 'd35b5b',
        'header-text'            => true
    );
    add_theme_support( 'custom-header', $args_head );

    // Custom background arguments
    $args_bg = array(
        'default-color'          => 'f9f9f9',
        'default-image'          => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $args_bg );

    // Add social networks fields to aithor profil and author info box
    add_filter( 'user_contactmethods', 'sh_profile_fields' );
    function sh_profile_fields( $profile_fields ) {
        $profile_fields['twitter']    = __( 'Twitter URL',   'textdomain' );
        $profile_fields['facebook']   = __( 'Facebook URL',  'textdomain' );
        $profile_fields['googleplus'] = __( 'Google+ URL',   'textdomain' );
        $profile_fields['linkedin']   = __( 'LinkedIn URL',  'textdomain' );
        $profile_fields['dribbble']   = __( 'Dribbble URL',  'textdomain' );
        $profile_fields['pinterest']  = __( 'Pinterest URL', 'textdomain' );
        $profile_fields['instagram']  = __( 'Instagram URL', 'textdomain' );
        $profile_fields['github']     = __( 'Github URL',    'textdomain' );

        return $profile_fields;
    }

}
