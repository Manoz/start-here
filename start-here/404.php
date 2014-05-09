<?php
/**
 * Template for 404 page
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

get_header(); ?>

    <div class="sh-content content404">
        <div class="sh-inner">

            <i class="404 gicn gicn-404"></i>
            <h2><?php _e( 'page not found', 'textdomain' ); ?></h2>
            <p>
                <?php _e( 'The page you were trying to reach wasn\'t there', 'textdomain' ); ?><br>
                <?php _e( 'Maybe you can try with the search form below?', 'textdomain' ); ?>

            </p>

            <?php get_search_form(); ?>

        </div>
    </div>

<?php
get_sidebar();
get_footer();