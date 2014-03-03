<?php
/**
 * Displays page links for paginated posts when applicable
 * Taken from : http://bavotasan.com/2012/a-better-wp_link_pages-for-wordpress/
 *
 * @package Start Here
 * @since 1.0.0
 */
if ( ! function_exists( 'sh_content_nav' ) ):
function sh_content_nav( $args = '' ) {
    $defaults = array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'starthere' ),
        'after' => '</div>',
        'text_before' => '',
        'text_after' => '',
        'next_or_number' => 'number',
        'nextpagelink' => __( 'Next page', 'starthere' ),
        'previouspagelink' => __( 'Previous page', 'starthere' ),
        'pagelink' => '%',
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                $output .= ' ';
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= _wp_link_page( $i );
                else
                    $output .= '<span class="current-post-page">';

                $output .= $text_before . $j . $text_after;
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '</a>';
                else
                    $output .= '</span>';
            }
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $previouspagelink . $text_after . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $nextpagelink . $text_after . '</a>';
                }
                $output .= $after;
            }
        }
    }

    if ( $echo )
        echo $output;

    return $output;
}
endif; // sh_content_nav