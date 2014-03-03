<?php
/**
 * The template for displaying Comments.
 *
 * @package Start Here
 * @since 1.0.0
 */
if ( post_password_required() )
    return;
?>
<div class="sh-comments-area">
    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title"><?php printf( _n( 'One comment on this post.', '%1$s comments on this post.', get_comments_number(), 'starthere' ), number_format_i18n( get_comments_number() )); ?></h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

        <nav class="comment-navigation" role="navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'starthere' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'starthere' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'starthere' ) ); ?></div>
        </nav>
        <?php endif; ?>

        <ul class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'sh_comment' ) ); ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comment-navigation" role="navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'starthere' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'starthere' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'starthere' ) ); ?></div>
        </nav>
        <?php endif;

    endif;

    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Comments are closed.', 'starthere' ); ?></p>
    <?php endif;
    $comments_args = array(
        'comment_notes_after' => '',
        // You can add your comments settings here
        // See http://codex.wordpress.org/Function_Reference/comment_form
    );
    comment_form( $comments_args ); ?>

</div>