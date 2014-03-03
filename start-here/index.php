<?php
/**
 * 'Start Here' index
 *
 * @package Start Here
 * @since 1.0.0
 */
get_header(); ?>

    <div class="sh-main" role="main">
    <?php

        if ( have_posts() ) :

            while (have_posts()) : the_post(); // Start the loop

                get_template_part('loop', get_post_format());

            endwhile;

            sh_page_nav(); // Prev/next buttons

        else:

            get_template_part('404');

        endif;

    ?>
    </div>

<?php
get_sidebar();
get_footer();