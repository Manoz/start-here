<?php
/**
 * Tweaks and utils for Start Here.
 * You can add your tweaks and utils functions here.
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */

/**
 * Better wp_title
 * @since 1.0.0
 */
function sh_wp_title( $title, $sep ) {
    global $paged, $page;

    if( is_feed() )
        return $title;

    $title .= get_bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'textdomain' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'sh_wp_title', 10, 2 );

/**
 * Navigation for next/prev posts
 * @since 1.0.0
 */
if( ! function_exists( 'sh_page_nav' ) ) :
    function sh_page_nav() {

        echo '<nav class="sh-pagination">';

        global $wp_query;
        $big  = 999999999;
        $args = array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?page=%#%',
            'total'     => $wp_query->max_num_pages,
            'current'   => max( 1, get_query_var( 'paged' ) ),
            'show_all'  => false,
            'end_size'  => 3,
            'mid_size'  => 2,
            'prev_next' => true,
            'prev_text' => __( '<i class="gicn gicn-leftarrow"></i>' ),
            'next_text' => __( '<i class="gicn gicn-rightarrow"></i>' ),
            'type'      => 'plain',
        );

        echo paginate_links( $args );
        echo '</nav>';

    }
endif;

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 * This search form is used in the default search widget and the search page.
 */
add_filter( 'get_search_form', 'sh_get_search_form' );
function sh_get_search_form($form) {
    $form = '';
    locate_template( '/templates/searchform.php', true, false );
    return $form;
}

/**
 * Copyright stuff
 * @see /inc/customizer.php line 70.
*/
function sh_copyright() {
    $copyright = 'Copyright &copy; ';

    $owner = esc_attr( get_theme_mod( 'sh_copyright_owner' ) );
    if( $owner != '' ) {
        $copyright .= ' ' . $owner;
    } else {
        $copyright .= ' ' . get_bloginfo();
    }

    echo $copyright;
}

/**
 * Displays page links for paginated posts when applicable
 */
if( ! function_exists( 'sh_content_nav' ) ):
function sh_content_nav() {
    $args = array(
        'before'           => '<div class="sh-right page-links">' . __( 'Pages:', 'textdomain' ),
        'after'            => '</div><div class="clear"></div>',
        'text_before'      => '',
        'text_after'       => '',
        'next_or_number'   => 'number',
        'separator'        => ' ',
        'nextpagelink'     => __( 'Next page', 'textdomain' ),
        'previouspagelink' => __( 'Previous page', 'textdomain' ),
        'pagelink'         => '%',
        'echo'             => 1
    );
    wp_link_pages( $args );
}
endif; // sh_content_nav
