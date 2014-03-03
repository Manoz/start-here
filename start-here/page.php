<?php
/**
 * Template for all Pages
 *
 * @package Start Here
 * @since 1.0.0
 */
get_header();

if ( have_posts() ) :

    while (have_posts()) : the_post();

        get_template_part( 'loop' );

    endwhile;

endif;

get_sidebar();
get_footer();