<?php
/**
 * 'Start Here' sidebar stuff
 *
 * @package Start Here
 * @since 1.0.0
 */
?>
<div class="sh-sidebar" role="complementary">
    <div class="sh-widgets-wrap">
    <?php
        do_action( 'before_sidebar' );
        if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside class="sh-widget">
            <?php get_search_form(); ?>
        </aside>

        <aside class="sh-widget">
            <h1 class="widget-title"><?php _e( 'Archives', 'starthere' ); ?></h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>

        <aside class="sh-widget">
            <h1 class="widget-title"><?php _e( 'Meta', 'starthere' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; ?>
    </div>
</div>