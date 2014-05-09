<?php
/**
 * Sidebars stuff (main and footer)
 *
 * @package Start Here
 * @since Start Here 1.0.0
*/

add_action( 'widgets_init', 'sh_sidebars_init' );
function sh_sidebars_init() {
    register_sidebar( array(
        'name'          => __( 'Main sidebar', 'textdomain' ),
        'id'            => 'sidebar-primary',
        'description'   => __( 'The main blog sidebar.', 'textdomain' ),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ) );

}
