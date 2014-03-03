<?php
/**
 * Custom comments template.
 *
 * @todo Build a better reply link
 * @package Start Here
 * @since 1.0.0
 */
if ( ! function_exists( 'sh_comment' ) ) :
function sh_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'starthere' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'starthere' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-author">
                <div class="avatar-container">
                    <?php echo get_avatar( $comment, 60 ); ?>
                </div>
                <div class="comment-meta">
                    <div class="author-name"><?php echo get_comment_author_link(); ?></div>
                    <time pubdate datetime="<?php comment_time( 'c' ); ?>">
                        <a class="comment-time" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf( __( '%1$s at %2$s', 'starthere' ), get_comment_date(), get_comment_time() ); ?></a>
                    </time>
                    <?php edit_comment_link(__('(Edit)', 'starthere'), '', ''); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>

            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="moderation clearfix"><?php _e('Your comment is awaiting moderation.', 'starthere'); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-content clearfix">
                <?php comment_text(); ?>
            </div>
        </div>
    <?php
            break;
    endswitch;
}
endif;

/*
 * Replace the default "reply" link to "Reply to 'Author' "
 */
function sh_reply_link($link, $args, $comment){

    $comment = get_comment( $comment );

    // If no comment author is blank, use 'Anonymous'
    if ( empty($comment->comment_author) ) {
        if (!empty($comment->user_id)){
            $user=get_userdata($comment->user_id);
            $author=$user->user_login;
        } else {
            $author = __('Anonymous', 'starthere');
        }
    } else {
        $author = $comment->comment_author;
    }

    // If the user provided more than a first name, use only first name
    if(strpos($author, ' ')){
        $author = substr($author, 0, strpos($author, ' '));
    }

    // Replace Reply Link with "Reply to &lt;Author First Name>"
    $reply_link_text = $args['reply_text'];
    $text = __('Reply to ', 'starthere');
    $link = str_replace($reply_link_text, $text . $author, $link);

    return $link;
}
add_filter('comment_reply_link', 'sh_reply_link', 10, 3);