<?php
/**
 * Template part for displaying page banner style one
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
$axil_breadcrumbs_enable = axil_get_acf_data("axil_breadcrumbs_enable");

$page_breadcrumb = Helper::axil_page_breadcrumb();
$page_breadcrumb_enable = $page_breadcrumb['breadcrumbs'];
$allowed_tags = wp_kses_allowed_html( 'post' );

?>
<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area breadcrumb-style-1 bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <?php
                    if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
                        axil_breadcrumbs();
                    }
                    ?>
                    <?php
                    if($banner_title){ ?>
                        <h1 class="page-title"><?php echo wp_kses( $banner_title, $allowed_tags ); ?></h1>
                    <?php  } else { ?>
                        <h1 class="page-title"><?php wp_title(''); ?></h1>
                    <?php  }  ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->