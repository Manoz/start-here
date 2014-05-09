<?php
/**
 * The template for author page
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

get_header();

$social_names = array( 'user_url', 'twitter', 'facebook', 'googleplus', 'linkedin', 'dribbble', 'pinterest', 'instagram', 'github' );
$social_urls = array();

foreach( $social_names as $social_name ) {
    $link = get_the_author_meta( $social_name );
    if( !empty( $link ) ) {
        if( strpos( $link, "http" ) === 0 ) {
            $new_url = 'http://' . $link;
        }
        $social_urls[$social_name] = $link;
    }
} ?>

    <div class="sh-content">
        <div class="sh-inner">

            <?php
                if( have_posts() ) : ?>

                    <header class="sh-archive-header">
                        <h1 class="archive-title">

                            <?php
                                the_post();
                                printf( __( 'All posts by %s', 'textdomain' ), get_the_author() );
                            ?>

                        </h1>

                        <?php if ( get_the_author_meta( 'description' ) ) : ?>
                            <div class="author-desc sh-cf">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); // 70 is the avatar size ?>
                                <p><?php the_author_meta( 'description' ); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if ( !empty( $social_urls ) ) : ?>
                            <div class="author-links">
                                <h3><?php the_author_meta( 'nickname' ); _e( ' links:', 'textdomain' ) ?></h3>
                                <ul>
                                    <?php foreach ( $social_urls as $social_name => $social_url ) {
                                        echo '<li><a href="'.$social_url.'"><i class="gicn gicn-'.$social_name.'"></i></a></li>';
                                    } ?>
                                </ul>
                            </div>

                        <?php endif; ?>

                    </header>

                <?php
                    rewind_posts();

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