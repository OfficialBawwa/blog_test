<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

?>
<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'blogar' ); ?></h3>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
            esc_html_e( 'Ready to publish your first post? Please create a post.', 'blogar' );
		elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blogar' ); ?></p>
			<?php
			get_search_form();
		else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blogar' ); ?></p>
			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
