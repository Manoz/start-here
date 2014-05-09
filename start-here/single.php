<?php
/**
 * The template file for our single posts
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

get_header(); ?>

    <div class="sh-content">
        <div class="sh-inner">

            <?php

                while( have_posts() ) : the_post();

                    get_template_part( 'templates/content', get_post_format() );
                    sh_author_info();
                    sh_related_box();

                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                endwhile;

                // sh_posts_nav();

            ?>

        </div>
    </div>

<?php
get_sidebar();
get_footer();