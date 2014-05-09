<?php
/**
 * Quote posts
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-content">

        <?php the_content(''); ?>

    </div>


    <footer class="post-footer">
        <span class="post-date">
            <time class="published" datetime="<?php echo get_the_time('c'); ?>"><a title="<?php _e( 'Permalink to: ', 'textdomain' ); echo the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></time>
        </span>
        <?php if( is_single() ) : ?>
        <?php endif; ?>
    </footer>


</article>