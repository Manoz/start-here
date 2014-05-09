<?php
/**
 * Our theme footer
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?>

    </main>

    <footer class="sh-footer" role="content-info">
        <div class="sh-inner sh-cf">
            <div class="sh-left">
                <span><?php sh_copyright(); ?></span>

                <!-- Feel free to remove the copyright notice below in your "Customize" settings :) -->
                <?php if( get_theme_mod( 'sh_theme_dev' ) == 'no' ) : ?>
                <span><?php _e( '- Theme', 'textdomain' ) ?> <a title="Visit the theme website" target="_blank" href="http://k-legrand.fr">Start Here</a></span>
                <?php endif; ?>

            </div>

            <div class="sh-right">

            <?php
                if( has_nav_menu( 'social_navigation' ) ) :
                    wp_nav_menu( array(
                        'theme_location'  => 'social_navigation',
                        'container'       => 'div',
                        'container_class' => 'social-wrap',
                        'menu_class'      => 'menu-social',
                        'depth'           => 1,
                        'link_before'     => '<span class="screen-reader-text">',
                        'link_after'      => '</span>'
                    ) );
                endif;
            ?>

            </div>
        </div>
    </footer>

</div> <!-- ./sh-wrapper -->

<?php wp_footer(); ?>

</body>
</html>