<?php
/**
 * Our theme header
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="sh-wrapper">
    <header class="sh-header" role="banner">
        <div class="sh-inner">
        <?php if( display_header_text() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php endif; ?>
            <nav id="sh-main-nav" role="navigation">

                <?php
                    if( has_nav_menu( 'primary_navigation' ) ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary_navigation',
                            'menu_class'     => 'nav sh-nav',
                            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                            'depth'          => 3,
                            'walker'         => new StartHere_Nav_Walker()
                        ) );
                    endif;
                ?>

            </nav>
        </div>
    </header>

    <main class="sh-main sh-cf" role="main">