<?php
/**
 * Theme setup
 *
 * @package Start Here
 * @since 1.0.0
 */

/*
 * Custom Excerpt length
 * Custom Excerpt tag
 */
function sh_custom_excerpt_length( $length ) {
    return 30; // Excerpt length
}
add_filter( 'excerpt_length', 'sh_custom_excerpt_length', 999 );

// Inside the excerpt, replace the default [...] by ...
function sh_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'sh_excerpt_more');

// Content width
if (!isset($content_width)) {$content_width = 960;}