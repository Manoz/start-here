<?php
/*
 * The admin view for the Facebook Likebox widget
*/
?>

<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'textdomain' ) ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'Facebook Page URL:', 'textdomain' ) ?></label>
    <input id="<?php echo $this->get_field_id( 'page' ); ?>" name="<?php echo $this->get_field_name( 'page' ); ?>" value="<?php echo $instance['page']; ?>"  class="widefat" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:', 'textdomain' ) ?></label>
    <input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>"  class="widefat" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:', 'textdomain' ) ?></label>
    <input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>"  class="widefat" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Color Scheme', 'textdomain' ) ?></label>
    <select id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" class="widefat">
        <option <?php if( 'light' == $instance['color'] ) echo 'selected="selected"'; ?> >light</option>
        <option <?php if( 'dark' == $instance['color'] ) echo 'selected="selected"'; ?> >dark</option>
    </select>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php _e( 'Box background Color:', 'textdomain' ) ?></label>
    <input id="<?php echo $this->get_field_id( 'background' ); ?>" name="<?php echo $this->get_field_name( 'background' ); ?>" placeholder="Ex. #fcfcfc" value="<?php echo $instance['background']; ?>"  class="widefat" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'borderc' ); ?>"><?php _e( 'Box border Color:', 'textdomain' ) ?></label>
    <input id="<?php echo $this->get_field_id( 'borderc' ); ?>" name="<?php echo $this->get_field_name( 'borderc' ); ?>" placeholder="Ex. #e5e6e9" value="<?php echo $instance['borderc']; ?>"  class="widefat" />
</p>

<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance['faces'], 'on' ); ?> id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php _e( 'Show faces', 'textdomain' ); ?></label>
</p>

<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance['stream'], 'on' ); ?> id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'stream' ); ?>"><?php _e( 'Show stream', 'textdomain' ); ?></label>
</p>

<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance['header'], 'on' ); ?> id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'header' ); ?>"><?php _e( 'Show header', 'textdomain' ); ?></label>
</p>