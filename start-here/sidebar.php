<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?>

<aside class="sh-sidebar" role="complementary">
    <div class="sh-inner">

        <?php
            do_action( 'before_sidebar' );
            if( !dynamic_sidebar( 'sidebar-primary' ) ) : ?>

            <p style="text-align: center; padding: 0 10px;"><?php _e( 'There is no widgets yet. Add them in your admin panel.', 'textdomain' ) ?></p>

        <?php endif; ?>

    </div>

</aside>