<?php
/**
 * The template for category pages
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

get_header(); ?>

    <div class="sh-content">
        <div class="sh-inner">

            <?php
                if( have_posts() ) : ?>

                    <header class="sh-archive-header">
                        <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'textdomain' ), single_cat_title( '', false ) ); ?></h1>
                        <?php
                            $term_desc = term_description();
                            if( !empty( $term_desc ) ) :
                                printf( '<div class="taxonomy-desc">%s</div>', $term_desc );
                            endif;
                        ?>
                    </header>

                <?php
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