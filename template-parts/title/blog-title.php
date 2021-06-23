<?php
/**
 * Template part for displaying header page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

// Get Value
$axil_options = Helper::axil_get_options();
?>
<?php if($axil_options['axil_enable_blog_title'] !== 'no'){ ?>
<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area breadcrumb-style-1 bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <?php  if ( !is_home() && "hide" !== $axil_options['axil_enable_single_post_breadcrumb_wrap']) {
                        axil_breadcrumbs();
                    } ?>
                    <?php
                    if($axil_options['axil_enable_blog_title'] !== 'no'){
                        if ( is_archive() ): ?>
                            <h1 class="page-title"><?php the_archive_title(); ?></h1>
                        <?php elseif( is_search() ): ?>
                            <h1 class="page-title"><?php esc_html_e( 'Search results for: ', 'blogar' ) ?><?php echo get_search_query(); ?></h1>
                        <?php else: ?>
                            <h1 class="page-title">
                                <?php  if ( isset( $axil_options['axil_blog_text'] ) && !empty( $axil_options['axil_blog_text'] ) ){
                                    echo esc_html( $axil_options['axil_blog_text'] );
                                } else {
                                    echo esc_html__('Blog', 'blogar');
                                }  ?>
                            </h1>
                        <?php endif;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<?php }