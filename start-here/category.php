<?php
/**
 * Template for Archives page
 *
 * @package Start Here
 * @since 1.0.0
 */
get_header();

if ( have_posts() ) : ?>
    <header class="sh-archive-header">
        <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'starthere' ), single_cat_title( '', false ) ); ?></h1>
        <?php // Term description
            $term_desc = term_description();
            if (!empty($term_desc)) :
                printf('<div class="taxonomy-desc">%s</div>', $term_desc);
            endif;
        ?>
    </header>

<?php
    while (have_posts()) : the_post();

        get_template_part('loop', get_post_format());

    endwhile;

    //sh_page_nav(); // Prev/next buttons

else:

    get_template_part('404');

endif;
get_sidebar();
get_footer();