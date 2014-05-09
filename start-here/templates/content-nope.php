<?php
/**
 * The default template if no post exist
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
?>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'textdomain' ), admin_url( 'post-new.php' ) ); ?></p>

<?php elseif ( is_search() ) : ?>

<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'textdomain' ); ?></p>
<?php get_search_form(); ?>

<?php else : ?>

<p>
    <?php _e( 'The page you were trying to reach wasn\'t there', 'textdomain' ); ?><br>
    <?php _e( 'Maybe you can try with the search form below?', 'textdomain' ); ?>

</p>

<?php get_search_form(); ?>

<?php endif; ?>

