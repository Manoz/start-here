<?php
/*
Template Name: Full Width
*/

get_header(); ?>

    <div class="sh-content full-width">
        <div class="sh-inner">

            <?php

                while( have_posts() ) : the_post();

                    get_template_part( 'templates/content', get_post_format() );

                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                endwhile;

            ?>

        </div>
    </div>

<?php
get_footer();