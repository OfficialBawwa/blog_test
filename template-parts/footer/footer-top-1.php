<?php
/**
 * Template part for displaying footer top layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

// Get Value
$axil_options = Helper::axil_get_options();
// Get data from page option
$op_footer_top_area        = axil_get_acf_data('axil_show_footer_top');
// Get data from theme option
$ot_footer_top_area         = $axil_options['axil_footer_top_enable'];

if (empty($op_footer_top_area)){
    $title                   = (!empty($axil_options['axil_ft_title'])) ? $axil_options['axil_ft_title'] : "";
    $shortcode                   = (!empty($axil_options['axil_ft_shortcode'])) ? $axil_options['axil_ft_shortcode'] : "";
} else {
    $title                  = axil_get_acf_data("axil_footer_top_title");
    $shortcode              = axil_get_acf_data("axil_footer_top_shortcode");
}



$instagram_wrap_class = ($axil_options['show_related_post'] == '1' && is_single()) ? "axil-instagram-area axil-section-gap bg-color-extra03 " : "axil-instagram-area axil-section-gap bg-color-grey";

?>

<!-- Start Instagram Area  -->
<div class="<?php echo esc_attr($instagram_wrap_class); ?>">
    <div class="container">
        <?php if(!empty($title)){ ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title"><?php echo esc_html($title); ?></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(!empty($shortcode)){ ?>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <?php echo do_shortcode($shortcode); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- End Instagram Area  -->