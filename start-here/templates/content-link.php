<?php
/**
 * Link posts
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <div class="header-metas">

            <?php sh_post_format(); ?>

            <?php if( is_singular() ) { edit_post_link( __( 'Edit', 'textdomain' ), '<span class="edit-link">', '</span>' ); } ?>

            <span class="post-date">
                <time class="published" datetime="<?php echo get_the_time('c'); ?>"><a title="<?php _e( 'Permalink to: ', 'textdomain' ); echo the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></time>
            </span>

            <span class="post-author">
                <?php _e( '- By ', 'textdomain' ); ?><a title="<?php _e('See other posts by ', 'textdomain'); the_author_meta( 'display_name' ); ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
            </span>
        </div>

    </header>

    <div class="<?php if( is_single() ) { echo 'post-content'; } else { echo 'link-content'; } ?>">

        <?php the_content(''); ?>

    </div>

    <?php if( !is_single() && has_excerpt() ) : ?>
        <?php the_excerpt(); ?>
        <a class="read-more" href="<?php the_permalink(); ?>" title="<?php echo _e( 'Read more', 'textdomain' ); ?>"><i class="g"></i><?php echo _e( 'Read more', 'textdomain' ); ?></a>
    <?php endif; ?>

    <?php if( is_single() ) : ?>
    <footer class="post-footer">
        <ul class="taxo-metas">
            <?php if( get_the_category() ) { ?><li class="category"><i class="gicn gicn-category"></i><?php the_category(' &#8226; '); ?></li><?php } ?>

            <li class="tag-links"><i class="gicn gicn-tag"></i><?php
                $tags_list = get_the_tag_list( '', __( ' ', 'textdomain' ) );
                if ( $tags_list ) :
                    printf( __( '%1$s', 'textdomain' ), $tags_list );
                else :
                    _e( 'No tags', 'textdomain' );
                endif; ?>
            </li>
        </ul>
    </footer>
    <?php endif; ?>

</article>