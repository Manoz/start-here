<?php
/**
 * Template for displaying image attachments
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
$metadata = wp_get_attachment_metadata();

get_header();
?>

    <div class="sh-content full-width">
        <div class="sh-inner">

            <?php while( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="post-header">
                        <div class="header-metas">

                            <?php edit_post_link( __( 'Edit', 'textdomain' ), '<span class="edit-link">', '</span>' ); ?>

                            <div class="post-format-icn">
                                <a title="<?php _e( 'See all &quot;image&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><i class="gicn gicn-image"></i></a>
                            </div>

                            <span class="post-date">
                                <time class="published" datetime="<?php echo get_the_time('c'); ?>"><a title="<?php _e( 'Permalink to: ', 'textdomain' ); echo the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></time>
                            </span>

                        </div>

                        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

                    </header>

                    <div class="post-content" style="text-align: center;">
                        <?php
                            $post            = get_post();
                            $attachment_size = apply_filters( 'sh_attachment_size', array( 820, 820 ) );
                            $metadata        = wp_get_attachment_metadata();

                            printf( wp_get_attachment_image( $post->ID, $attachment_size ) );
                        ?>

                        <ul class="attachment-metas" style="text-align: left;">
                            <li><?php _e( 'Parent post:', 'textdomain' ); ?> <a href="<?php echo get_permalink( $post->post_parent ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></li>
                            <li><?php _e( 'Full width image:', 'textdomain' ); ?> <a target="_blank" href="<?php echo wp_get_attachment_url(); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a></li>
                        </ul>
                    </div>

                </article>

                <nav class="image-nav">
                    <div class="nav-links sh-cf">
                    <?php previous_image_link( false, '<div class="previous-img"><i class="gicn gicn-leftarrow"></i>' . __( 'Previous Image', 'textdomain' ) . '</div>' ); ?>
                    <?php next_image_link( false, '<div class="next-img">' . __( 'Next Image', 'textdomain' ) . '<i class="gicn gicn-rightarrow"></i></div>' ); ?>
                    </div>
                </nav>

                <?php if ( comments_open() || get_comments_number() ) {
                    comments_template();
                } ?>

            <?php endwhile; ?>

        </div>
    </div>


<?php
get_footer();