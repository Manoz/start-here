<?php
/**
 * 'Start Here' head
 *
 * @package Start Here
 * @since 1.0.0
 */
?><!DOCTYPE HTML>
<!--[if lt IE 8 ]><html <?php language_attributes(); ?> class="is_ie7 lt_ie8 lt_ie9 lt_ie10"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="is_ie8 lt_ie9 lt_ie10"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="is_ie9 lt_ie10"><![endif]-->
<!--[if gt IE 9]><html <?php language_attributes(); ?> class="is_ie10"><![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" >
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="sh-container">
    <header class="sh-header" role="banner">
        <div class="sh-inner">
            <div class="sh-brand">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-desc"><?php bloginfo('description'); ?></h2>
            </div>

            <div class="sh-nav-wrap">
            <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu( array(
                        'theme_location'    => 'primary_navigation',
                        'menu_class'        => 'nav sh-nav',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>'
                    ));
                endif;
            ?>
            </div>

            <div class="sh-right">
                <div class="sh-search">
                    <!-- searchform here -->
                </div>
                <div class="sh-social">
                <!-- social icons here -->
                </div>
            </div>
        </div>
    </header>

    <div class="sh-content">
        <div class="sh-inner">
