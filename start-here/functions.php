<?php
/**
 * 'Start Here' functions and definitions
 *
 * If you want to add more functions, don't add them in this file.
 * Keep it clean. I created a custom function file for you.
 * You can uncomment the last line and add your functions
 * inside the '/inc/custom.php' file :)
 *
 * Also, be careful with your functions names.
 * Don't use 'sh_your_function()' to avoid conflicts \o/
 *
 * @package Start Here
 * @since 1.0.0
 */

require_once locate_template('/inc/init.php');          // Lang, nav and some theme support
require_once locate_template('/inc/theme-setup.php');   // Theme config (excerpt, content width,...)
require_once locate_template('/inc/tweaks.php');        // Tweaks and utils
require_once locate_template('/inc/scripts.php');       // Scripts and stylesheets
require_once locate_template('/inc/widgets.php');       // Sidebars and widgets
require_once locate_template('/inc/comments.php');      // Custom comments template
require_once locate_template('/inc/clean.php');         // Clean stuff for wp_head(), search, dashboard, ...
require_once locate_template('/inc/posts-nav.php');     // Display nav to next/prev pages
//require_once locate_template('/inc/post-formats.php');  // Post format stuff
require_once locate_template('/inc/navigation.php');    // Custom walker for better wp_nav_menu
//require_once locate_template('/inc/ot-admin.php');      // Contains all the Theme Options functions.

//require_once locate_template('/inc/custom.php');        // Your Custom functions