<?php
/**
 * Global searchform template
 *
 * @package Start Here
 * @since Start Here 1.0.0
 */
if( !defined( 'ABSPATH' )) die('Love the blank page?');
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <input type="search" value="<?php if(is_search()) { echo get_search_query(); } ?>" name="s" class="search-field" placeholder="<?php _e('Search...', 'textdomain'); ?>">
    <button type="submit" class="search-btn"><i class="gicn gicn-search"></i></button>
</form>