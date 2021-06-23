<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

get_header();
// Get Value
$axil_options = Helper::axil_get_options();
$axil_blog_sidebar_class = ($axil_options['axil_blog_sidebar'] === 'no') || !is_active_sidebar( 'sidebar-1' ) ? 'col-lg-10 offset-lg-1 col-md-12 col-12':'col-lg-8 col-md-12 col-12 order-1 order-lg-2';
?>
<!-- Start Blog Area  -->
<div class="axil-post-list-area axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $axil_options['axil_blog_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40 order-2 order-lg-1">
                    <?php echo Helper::ad_post_before_sidebar(); ?>
                    <?php dynamic_sidebar(); ?>
                    <?php echo Helper::ad_post_after_sidebar(); ?>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($axil_blog_sidebar_class); ?>">

                <?php echo Helper::ad_post_before_content(); ?>

                <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/post/content', get_post_format() );

                    endwhile;

                    axil_blog_pagination();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
                <?php echo Helper::ad_post_after_content(); ?>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $axil_options['axil_blog_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40 order-2 order-lg-2">
                    <?php echo Helper::ad_post_before_sidebar(); ?>
                    <?php dynamic_sidebar(); ?>
                    <?php echo Helper::ad_post_after_sidebar(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog Area  -->
<?php
get_footer();