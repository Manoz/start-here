<?php
/**
 * Custom comments template.
 *
 * @package Impact WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

function sh_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body <?php if($comment->comment_approved == '0') echo 'pending-comment'; ?> sh-cf">
            <div class="comment-details">
                <?php if( get_avatar( $comment ) ) : ?>
                <div class="comment-avatar">
                    <?php echo get_avatar($comment, $size = '50'); ?>
                </div>
                <?php endif; ?>
                <section class="comment-author vcard">
                    <?php printf(__('<cite class="author">%s</cite>'), get_comment_author_link()) ?>
                    <span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> &middot; <?php echo get_comment_date(); ?></a></span>
                    <span class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply','textdomain' ) ,'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?></span>
                </section>
                <section class="comment-content">
                    <div class="comment-text">
                        <?php comment_text() ?>
                    </div>
                </section>
            </div>
        </div>
<?php
}

/**
 * Replace the default "reply" link to "< Author"
 * @since 1.0.0
 */
add_filter( 'comment_reply_link', 'sh_reply_link', 10, 3 );
function sh_reply_link( $link, $args, $comment ) {

    $comment = get_comment( $comment );

    // If no comment author is blank, use 'Anonymous'
    if( empty( $comment->comment_author ) ) {
        if( !empty( $comment->user_id ) ) {
            $user   = get_userdata( $comment->user_id );
            $author = $user->user_login;
        } else {
            $author = __( 'Anonymous', 'textdomain' );
        }
    } else {
        $author = $comment->comment_author;
    }

    // If the user provided more than a first name, use only first name
    if( strpos( $author, ' ' ) ) {
        $author = substr( $author, 0, strpos( $author, ' ' ) );
    }

    // Replace Reply Link with "Reply to <Author First Name>"
    $reply = $args['reply_text'];
    $text  = '<i class="gicn gicn-reply"></i>';
    $link  = str_replace( $reply, $text . $author, $link );

    return $link;
}
