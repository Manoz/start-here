<?php
/**
 * Start Here functions and definitions
 *
 * If you want to add more functions, don't add them in this file.
 * Keep it clean. I created a custom function file for you.
 * You can uncomment the last line and add your functions
 * inside the '/inc/custom.php' file :)
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
if( !defined( 'ABSPATH' ) ) die( 'Love the blank page?' );

// Define some constants
define( 'THEME_URI',  get_template_directory_uri() );
define( 'THEME_JS',   THEME_URI . '/js' );
define( 'THEME_CSS',  THEME_URI . '/css' );

// Global theme functions
require_once locate_template( '/inc/init.php' );
require_once locate_template( '/inc/scripts.php' );
require_once locate_template( '/inc/comments.php' );
require_once locate_template( '/inc/navigation.php' );

// Tweaks and utils
require_once locate_template( '/inc/tweaks.php' );
require_once locate_template( '/inc/posts-tweaks.php' );
require_once locate_template( '/inc/custom-header.php' );
require_once locate_template( '/inc/customizer.php' );

// Sidebar and Widgets
require_once locate_template( '/inc/widgets.php' );
require_once locate_template( '/inc/widgets/likebox.php');
require_once locate_template( '/inc/widgets/recent-posts.php');

// Your custom functions
//require_once locate_template('/inc/custom.php');
