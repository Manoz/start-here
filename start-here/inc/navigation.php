<?php
/**
 * Better walker for wp_nav_menu()
 *
 * This menu is cleaner than default WP Menu.
 * WordPress adds a lot of classes on <li>
 * We do not need as many classes in this theme. And it's ugly >_<
 *
 * @package Start Here
 * @since Start Here 1.0.0
 * @todo Find a better way to manage the depth
 */

class StartHere_Nav_Walker extends Walker_Nav_Menu {
    // Find and replace the .current-xxx classe
    function find_current( $classes ) {
        return preg_match( '/(current[-_])|active|submenu/', $classes );
    }

    // Create the <ul> submenu element
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu\">\n";
    }

    // Create the <li> elements
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $item, $depth, $args );

        if( $item->is_submenu && ( $depth === 0 ) ) :
            $item_html = str_replace( '<a', '<a class="sub-item"', $item_html);
            $item_html = str_replace( '</a>', ' <i class="gicn gicn-expand"></i></a>', $item_html);
        // I wonder if another method would be better
        elseif( $item->is_submenu && ( $depth > 0 ) ) :
            $item_html = str_replace( '<a', '<a class="sub-item"', $item_html);
            $item_html = str_replace( '</a>', ' <i class="gicn gicn-dropdown-left"></i></a>', $item_html);
        endif;

        $item_html = apply_filters( 'sh_menu_item', $item_html );
        $output .= $item_html;
    }

    // Display our elements
    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->is_submenu = ( (!empty( $children_elements[$element->ID]) && (( $depth + 1) < $max_depth || ( $max_depth === 0))));

        if( $element->is_submenu) {
            $element->classes[] = 'parent-menu';
        }

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

function sh_menu_css_class( $classes, $item ) {
    $slug      = sanitize_title( $item->title );
    $classes   = preg_replace( '/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes );
    $classes   = preg_replace( '/^((menu|page)[-_\w+]+)+/', '', $classes );
    $classes[] = 'menu-' . $slug;
    $classes   = array_unique( $classes );

    return array_filter( $classes );
}
add_filter('nav_menu_css_class', 'sh_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');
