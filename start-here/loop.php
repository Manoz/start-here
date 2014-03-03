<?php
/**
 * Default template for content
 *
 * @package Start Here
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header class="sh-post-header">
    <?php if ( has_post_thumbnail() ) {
        echo '<div class="sh-thumbnail">';
            the_post_thumbnail();
        echo '</div>';
    } ?>

        <h1 class="sh-post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h1>

        <ul class="sh-post-metas">
            <li class="author"><?php _e('Published by', 'starthere'); ?> <?php the_author_posts_link(); ?></li>
            <li class="date"><time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php _e('on ', 'starthere'); echo get_the_date(); ?></time></li>
            <?php if( get_the_category() ) { ?><li class="category"><?php _e('in', 'starthere'); ?> <?php the_category(' &middot; '); ?></li><?php } ?>
        </ul>
    </header>

    <div class="sh-post-content">
    <?php
        if ( is_home() || is_search() || is_archive() ) :
            the_excerpt(); ?>
            <a class="read-more" href="<?php the_permalink(); ?>" title="<?php echo _e( 'Read more', 'starthere' ); ?>"><?php echo _e( 'Read more', 'starthere' ); ?></a>
        <?php else:
            the_content();
            sh_content_nav();
        endif; ?>
    </div>

    <footer class="sh-post-footer">
        <ul class="footer-metas">
            <li class="comments-meta">
                <a href="<?php the_permalink(); ?>#comments"><?php comments_number('0 comment', '1 comment', '% comments'); ?></a>
            </li>
            <li class="tag-links"><?php
                $tags_list = get_the_tag_list( '', __( ' ', 'starthere' ) );
                if ( $tags_list ) :
                    printf( __( 'Tags: %1$s', 'starthere' ), $tags_list );
                else :
                    _e( 'No tags', 'starthere' );
                endif; ?>
            </li>
        </ul>
    </footer>
</article>
