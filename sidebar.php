<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogar
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="axil-blog-sidebar" class="widget-area axil-blog-sidebar">
    <?php echo Helper::ad_post_before_sidebar(); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php echo Helper::ad_post_after_sidebar(); ?>
</div><!-- #secondary -->