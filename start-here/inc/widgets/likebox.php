<?php
/**
 * Register our Facebook likebox widget
 *
 * @package Start Here
 * @since Start Here 1.0.0
*/

add_action( 'widgets_init', array( 'StartHere_Likebox_Widget', 'register_likebox' ) );
class StartHere_Likebox_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sh_likebox_widget',
            __( 'SH Likebox', 'textdomain' ),
            array(
                'classname'   => 'sh_likebox_widget',
                'description' => __( 'Simple Facebook Likebox', 'textdomain' )
            )
        );
    }

    public static function register_likebox() {
        register_widget( 'StartHere_Likebox_Widget' );
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title      = apply_filters(
                        'widget_title',
                        empty( $instance['title'] ) ?
                            __( 'Find me on Facebook', 'textdomain' ) :
                            $instance['title']
                    );
        $width      = $instance['width'];
        $height     = $instance['height'];
        $color      = $instance['color'];
        $faces      = $instance['faces'];
        $stream     = $instance['stream'];
        $header     = $instance['header'];
        $background = $instance['background'];
        $borderc    = $instance['borderc'];
        $page       = $instance['page'];

        echo $before_widget;

        if( $title ) echo $before_title . $title . $after_title; ?>

            <div class="sh-like-box" style="<?php if( $background != '' ) { echo 'background:'.$background.';'; } if( $borderc != '' ) { echo 'border:1px solid '.$borderc.';'; } ?>">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $page ; ?>&amp;width=<?php echo $width ; ?>&amp;height=<?php echo $height; ?>&amp;colorscheme=<?php echo $color; ?>&amp;show_faces=<?php if($faces != 'on') {echo 'false';}else{echo 'true';} ?>&amp;show_border=false&amp;stream=<?php if($stream != 'on') {echo 'false';}else{echo 'true';} ?>&amp;header=<?php if($header != 'on') {echo 'false';}else{echo 'true';} ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" allowTransparency="true"></iframe>
            </div>

        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['width']      = $new_instance['width'];
        $instance['height']     = $new_instance['height'];
        $instance['color']      = $new_instance['color'];
        $instance['faces']      = $new_instance['faces'];
        $instance['stream']     = $new_instance['stream'];
        $instance['header']     = $new_instance['header'];
        $instance['background'] = $new_instance['background'];
        $instance['borderc']    = $new_instance['borderc'];
        $instance['page']       = $new_instance['page'];

        return $instance;
    }

    function form( $instance ) {

        $defaults = array(
            'title'      => __( 'Find me on Facebook', 'textdomain' ),
            'page'       => 'https://www.facebook.com/yourpage',
            'width'      => 320,
            'height'     => 258,
            'color'      => 'light',
            'faces'      => 'on',
            'stream'     => 'on',
            'header'     => 'on',
            'background' => '',
            'borderc'    => ''
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

        include( plugin_dir_path( __FILE__ ).'/adm-likebox.php' );
    }
}
