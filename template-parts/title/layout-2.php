<?php
/**
 * Template part for displaying page banner style two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

// Get Value
$axil_options = Helper::axil_get_options();
$banner_layout = Helper::axil_banner_layout();
$banner_area = $banner_layout['banner_area'];
$banner_style = $banner_layout['banner_style'];
$banner_title = axil_get_acf_data("axil_custom_title");
$banner_sub_title = axil_get_acf_data("axil_custom_sub_title");
$allowed_tags = wp_kses_allowed_html( 'post' );
// Get $post if you're inside a function.
global $post;
?>
<!-- Start Banner Area  -->
<div class="axil-banner banner-style-1 bg_image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <?php
                    if ($banner_title) { ?>
                        <h1 class="title"><?php echo wp_kses( $banner_title, $allowed_tags ); ?></h1>
                    <?php } else { ?>
                        <h1 class="title"><?php wp_title(''); ?></h1>
                    <?php } ?>

                    <?php if ($banner_sub_title) { ?>
                        <p class="description"><?php echo wp_kses( $banner_sub_title, $allowed_tags ); ?></p>
                    <?php } elseif (has_excerpt($post->ID)) { ?>
                        <?php the_excerpt(); ?>
                    <?php } else {
                        //Noting
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area  -->