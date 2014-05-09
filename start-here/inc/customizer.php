<?php
/**
 * Start Here Theme Customizer
 *
 * @package Start Here
 * @since Start Here 1.0.0
*/

/**
 * Load $wp_customize object
 * Add our sections, add our settings, add our controls
 * @link https://codex.wordpress.org/Theme_Customization_API
*/
add_action( 'customize_register', 'sh_customize_register' );
function sh_customize_register( $wp_customize ) {

    /**
     * Add our sections.
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
    */
    $wp_customize->add_section(
        'sh_layout_section',
        array(
            'title'       => __( 'Start Here Layout', 'textdomain' ),
            'capability'  => 'edit_theme_options',
            'description' => __( 'Choose your theme\'s layout.', 'textdomain' )
        )
    );

    $wp_customize->add_section(
        'sh_copyright_section',
        array(
            'title'       => __( 'Start Here Copyright', 'textdomain' ),
            'capability'  => 'edit_theme_options',
            'description' => __( 'Actually, the copyright is shown as <code>Copyright &copy "Date" - "Your blog name"</code>. You can change <strong>"Date" - "Your blog name"</strong> here and remove the theme dev (me) text: <code>Theme Start Here</code> notice.', 'textdomain' ),
    ) );

    /**
     * Add our settings
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
    */

    // Layout setting
    $wp_customize->add_setting(
        'sh_layout[layout_setting]',
        array(
            'default'           => 'right-sidebar',
            'type'              => 'option',
            'sanitize_callback' => 'sh_sanitize_radio_layout'
        )
    );

    // Header menu text color setting
    $wp_customize->add_setting(
        'sh_header_menu_color',
        array(
            'default'           => '#5bcad3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Header background color setting
    $wp_customize->add_setting(
        'sh_header_bg_color',
        array(
            'default'           => '#363141',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Copyright owner text
    $wp_customize->add_setting(
        'sh_copyright_owner',
        array(
            'default'           => '',
            'sanitize_callback' => 'sh_sanitize_text'
        )
    );

    // Remove the "Theme Start Here by Manoz" in the footer?
    $wp_customize->add_setting(
        'sh_theme_dev',
        array(
            'default'           => 'no',
            'sanitize_callback' => 'sh_sanitize_radio_copyright'
        )
    );

    /**
     * Add our controls
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
    */

    // Layout control
    $wp_customize->add_control(
        'layout_control',
        array(
            'type'    => 'radio',
            'label'   => __( 'Theme layout', 'textdomain' ),
            'section' => 'sh_layout_section',
            'choices' => array(
                'left-sidebar'  => __( 'Left sidebar', 'textdomain' ),
                'right-sidebar' => __( 'Right sidebar', 'textdomain' )
            ),
            'settings' => 'sh_layout[layout_setting]'
        )
    );

    // Header menu color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_menu_color_control',
            array(
                'label'    => __( 'Header menu color', 'textdomain' ),
                'section'  => 'colors',
                'settings' => 'sh_header_menu_color'
            )
        )
    );

    // Header background color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color_control',
            array(
                'label'    => __( 'Header background color', 'textdomain' ),
                'section'  => 'colors',
                'settings' => 'sh_header_bg_color'
            )
        )
    );

    // Copyright owner control
    $wp_customize->add_control(
        'copyright_owner_control',
        array(
            'label'    => __( 'Copyright owner', 'textdomain' ),
            'section'  => 'sh_copyright_section',
            'settings' => 'sh_copyright_owner',
            'type'     => 'text',
    ) );

    // Theme dev control
    $wp_customize->add_control(
        'theme_dev_control',
        array(
            'type'    => 'radio',
            'label'   => __( 'Remove the "Theme Start Here" notice in the footer?', 'textdomain' ),
            'section' => 'sh_copyright_section',
            'choices' => array(
                'no'  => __( 'Nope :&#41;', 'textdomain' ),
                'yes' => __( 'Yep :&#40;', 'textdomain' )
            ),
            'settings' => 'sh_theme_dev'
        )
    );

}

/**
 * Add a CSS class to the body tag depending
 * on which layout is chosen in the customizer.
 * @link https://codex.wordpress.org/Function_Reference/body_class#Add_Classes_By_Filters
*/
add_filter( 'body_class', 'sh_body_classes' );
function sh_body_classes( $classes ) {

    $sh_layout = get_option( 'sh_layout' );
    $classes[]      = $sh_layout['layout_setting'];

    return $classes;

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_preview_init', 'sh_customize_preview_js' );
function sh_customize_preview_js() {
    wp_enqueue_script( 'sh_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}

/**
 * Sanitize some fields
*/
function sh_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function sh_sanitize_radio_layout( $input ) {
    $valid = array(
        'left-sidebar'  => __( 'Left sidebar', 'textdomain' ),
        'right-sidebar' => __( 'Right sidebar', 'textdomain' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function sh_sanitize_radio_copyright( $input ) {
    $valid = array(
        'no'  => __( 'Nope :&#41;', 'textdomain' ),
        'yes' => __( 'Yep :&#40;', 'textdomain' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
