<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blogar
 */

$unique_id = esc_attr( blogar_unique_id( 'search-' ) );

?>
<div class="inner">
    <form  id="<?php echo esc_attr($unique_id); ?>"  action="<?php echo esc_url(home_url( '/' )); ?>" method="GET" class="blog-search">
        <div class="axil-search form-group">
            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
            <input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'blogar' ); ?>" value="<?php echo get_search_query(); ?>"/>
        </div>
    </form>
</div>