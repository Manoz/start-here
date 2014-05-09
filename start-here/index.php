<?php
/**
 * The main template file
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

get_header(); ?>

    <div class="sh-content">
        <div class="sh-inner">

            <?php
                if( have_posts() ) :

                    while( have_posts() ) : the_post();

                        get_template_part( 'templates/content', get_post_format() );

                    endwhile;

                    sh_page_nav();

                else:

                    get_template_part( 'templates/content', 'nope' );

                endif;

            ?>

        </div>
    </div>

<?php
get_sidebar();
get_footer();