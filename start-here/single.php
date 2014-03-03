<?php
/**
 * The Template for displaying all single posts
 *
 * @package Start Here
 * @since 1.0.0
 */
get_header();

while ( have_posts() ) : the_post();

    get_template_part( 'loop' );

    if ( comments_open() || get_comments_number() ) {

        comments_template('comments.php');

    }

endwhile;

get_sidebar();
get_footer();