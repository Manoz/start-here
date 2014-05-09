<?php
/**
 * Posts tweaks
 * All tweaks related to posts (about author box, related posts, etc...)
 *
 * @package   Start Here
 * @since     Start Here 1.0.0
 * @author    Kevin Legrand
 * @copyright Copyright (c) 2014, Kevin Legrand
 * @link      http://k-legrand.fr
 * @license   http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * **********************************************
 * Display our post thumbnails
 * @since 1.0.0
************************************************* */

function sh_display_thumbnails() {

    $get_id    = get_post_thumbnail_id();
    $get_thumb = wp_get_attachment_url( $get_id, 'thumbnail' );
    $size      = wp_get_attachment_image_src( $get_id, 'full' );
    $width     = $size[1];
    $height    = $size[2];

    if( has_post_thumbnail() ) { ?>

        <div class="sh-thumbnail">

            <?php if( is_singular() ) { ?>

                <?php the_post_thumbnail(); ?>

            <?php } else { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo get_the_title(); ?>" src="<?php echo $get_thumb; ?>" <?php if( $height > $width ) {echo 'class="vertical"';} ?> >
                </a>

            <?php } ?>

        </div>

    <?php }

}

/**
 * **********************************************
 * Display the post format icon
 * @since 1.0.0
************************************************* */
function sh_post_format() {
    $format  = get_post_format();
    if ( false === $format ) {
        $format = 'standard';
    }
    ?>

    <div class="post-format-icn">

    <?php if( is_sticky() ) { ?>
        <a href="<?php the_permalink(); ?>"><i class="gicn gicn-pinned"></i></a>
    <?php } elseif( $format == 'audio' ) { ?>
        <a title="<?php _e( 'See all &quot;audio&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>"><i class="gicn gicn-audio"></i></a>
    <?php } elseif( $format == 'video' ) { ?>
        <a title="<?php _e( 'See all &quot;video&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>"><i class="gicn gicn-video"></i></a>
    <?php } elseif( $format == 'chat' ) { ?>
        <a title="<?php _e( 'See all &quot;chat&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'chat' ) ); ?>"><i class="gicn gicn-chat"></i></a>
    <?php } elseif( $format == 'gallery' ) { ?>
        <a title="<?php _e( 'See all &quot;gallery&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>"><i class="gicn gicn-gallery"></i></a>
    <?php } elseif( $format == 'image' ) { ?>
        <a title="<?php _e( 'See all &quot;image&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><i class="gicn gicn-image"></i></a>
    <?php } elseif( $format == 'quote' ) { ?>
        <a title="<?php _e( 'See all &quot;quote&quot;', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'quote' ) ); ?>"><i class="gicn gicn-quote"></i></a>
    <?php } elseif( $format == 'status' ) { ?>
        <a title="<?php _e( 'See all &quot;status&quot;', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'status' ) ); ?>"><i class="gicn gicn-status"></i></a>
    <?php } elseif( $format == 'link' ) { ?>
        <a title="<?php _e( 'See all &quot;links&quot;', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>"><i class="gicn gicn-link"></i></a>
    <?php } elseif( $format == 'aside' ) { ?>
        <a title="<?php _e( 'See all &quot;aside&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>"><i class="gicn gicn-aside"></i></a>
    <?php } elseif( $format == 'standard' ) { ?>
        <a title="<?php _e( 'See all &quot;standard&quot; posts', 'textdomain' ); ?>" href="<?php echo esc_url( get_post_format_link( 'standard' ) ); ?>"><i class="gicn gicn-standard"></i></a>
    <?php } ?>

    </div>

<?php }

/**
 * **********************************************
 * Display the author info box
 * @since 1.0.0
************************************************* */
function sh_author_info() {

    $social_names = array( 'user_url', 'twitter', 'facebook', 'googleplus', 'linkedin', 'dribbble', 'pinterest', 'instagram', 'github' );
    $social_urls  = array();

    foreach( $social_names as $social_name ) {
        $link = get_the_author_meta( $social_name );
        if( !empty( $link ) ) {
            if( strpos( $link, "http" ) === 0) {
                $new_url = 'http://' . $link;
            }
            $social_urls[$social_name] = $link;
        }
    } ?>

<div class="author-infobox">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
    <div class="author-description sh-cf">
        <h3><?php echo __( 'About', 'textdomain' );?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h3>
        <?php if( !empty( $social_urls ) ) { ?>
            <div class="author-social">
                <ul>

                <?php
                    foreach( $social_urls as $social_name => $social_url ) {
                        echo '<li><a href="'.$social_url.'"><i class="gicn gicn-'.$social_name.'"></i></a></li>';
                    }
                 ?>

                 </ul>
            </div>
        <?php } ?>
        <p><?php the_author_meta( 'user_description' ); ?></p>
    </div>
</div>

<?php }

/**
 * **********************************************
 * Display the related posts box.
 * @since 1.0.0
************************************************* */
function sh_related_box() {
    global $post;
    $orig_post = $post;
    $tags      = wp_get_post_tags( $post->ID );

    if( $tags ) :
        $tag_ids = array();
        foreach( $tags as $tag )
            $tag_ids[] = $tag->term_id;

        $args = array(
            'tag__in'             => $tag_ids,
            'post__not_in'        => array( $post->ID ),
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => 1
        );

        $sh_query = new wp_query( $args );

        if( $sh_query->have_posts() ) : ?>

            <h3 class="related-title"><?php _e( 'Related posts:', 'textdomain' ); ?></h3>
            <div class="related-posts">
                <div class="sh-related sh-cf">
                <?php
                    while( $sh_query->have_posts() ) : $sh_query->the_post();
                        $thumb = get_post_thumbnail_id();
                        $img   = wp_get_attachment_url( $thumb, 'thumbnail' );
                ?>

                    <div class="related-box">
                        <?php if( $img ) : ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <img src="<?php echo $img; ?>">
                        </a>
                        <?php endif; ?>

                        <a class="related-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </div>

                <?php endwhile; ?>

                </div>
            </div>

        <?php endif; ?>

    <?php endif;

    $post = $orig_post;
    wp_reset_query();

}