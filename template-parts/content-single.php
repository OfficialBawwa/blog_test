<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

// Get Value
$axil_options = Helper::axil_get_options();

$sidebar = Helper::axil_sidebar_options();
$axil_single_blog_sidebar_class = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'col-lg-8 offset-lg-2':'col-lg-8 col-md-12 col-12 order-1 order-lg-2';
$alignwide = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'wp-block-image alignwide':'';


$images = axil_get_acf_data('axil_gallery_image');
$audio_url = axil_get_acf_data('axil_upload_audio');
$custom_link = axil_get_acf_data('axil_custom_link');

$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$axil_quote_author_name = axil_get_acf_data("axil_quote_author_name");
$axil_quote_author = !empty($axil_quote_author_name) ? $axil_quote_author_name : get_the_author();
$axil_quote_author_name_designation = axil_get_acf_data("axil_quote_author_name_designation");
$video_url = axil_get_acf_data("axil_video_link");

$thumb_size = 'axil-single-blog-thumb';

$header_layout = Helper::axil_post_banner_style();
$post_banner_style = $header_layout['post_banner_style'];

// Review
$review_area = axil_get_acf_data('axil_post_review_box');
$review_box_position = axil_get_acf_data('axil_post_review_box_position');
/**
 * Load Header
 */
if ($post_banner_style) {
    get_template_part('template-parts/post-banner/style', $post_banner_style);
}

?>

<!-- Start Blog Details Area  -->
<div class="post-single-wrapper axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $sidebar == 'left') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40 order-2 order-lg-1">
                    <div class="sidebar-inner">
                        <?php echo Helper::ad_post_before_sidebar(); ?>
                        <?php dynamic_sidebar(); ?>
                        <?php echo Helper::ad_post_after_sidebar(); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($axil_single_blog_sidebar_class); ?>">

                <?php if($post_banner_style == "" || $post_banner_style == "0"){ ?>
                    <!-- Start Banner Area -->
                    <div class="banner banner-single-post post-formate post-video axil-section-gapBottom">
                        <!-- Start Single Slide  -->
                        <div class="content-block">
                            <!-- Start Post Content  -->
                            <div class="post-content">

                                <?php if ($axil_options['axil_show_blog_details_categories_meta'] !== 'no' && has_category()) { ?>
                                    <?php Helper::axil_post_category_meta(); ?>
                                <?php } ?>

                                <?php if(has_post_format('link')){ ?>
                                    <h1 class="title"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h1>
                                <?php } elseif(has_post_format('quote')) { ?>
                                    <blockquote>
                                        <h1 class="title"><?php the_title(); ?></h1>
                                        <div class="author mt--20">
                                            <div class="info">
                                                <h6><?php echo esc_html($axil_quote_author); ?></h6>
                                                <p><?php echo esc_html($axil_quote_author_name_designation); ?></p>
                                            </div>
                                        </div>
                                    </blockquote>
                                <?php } else { ?>
                                    <h1 class="title"><?php the_title(); ?></h1>
                                <?php } ?>

                                <!-- Post Meta  -->
                                <div class="post-meta-wrapper">
                                    <?php Helper::axil_singlepostmeta(); ?>

                                    <?php if($axil_options['axil_blog_details_social_share_for_top']){
                                        if (function_exists('axil_sharing_icon_links')) {
                                            axil_sharing_icon_links();
                                        }
                                    } ?>

                                </div>
                            </div>
                            <!-- End Post Content  -->
                        </div>
                        <!-- End Single Slide  -->
                        <?php if ("hide" !== $axil_options['axil_enable_single_post_breadcrumb_wrap']) { ?>
                            <!-- End Banner Area -->
                            <div class="breadcrumb-wrapper">
                                <!-- End Single Slide  -->
                                <?php axil_breadcrumbs(); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End Banner Area -->
                <?php } ?>

                <div class="axil-post-details">

                    <?php
                    if ( has_post_format('gallery') ) {
                        if ($images): ?>
                            <figure class="wp-block-image <?php echo esc_attr($alignwide); ?>">
                                <div class="post-gallery-activation axil-slick-arrow arrow-between-side">
                                <?php foreach( $images as $image ): ?>
                                    <div class="post-images">
                                        <img class="w-100"  src="<?php echo esc_url($image['sizes'][$thumb_size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php if(!empty($image['caption'])){ ?>
                                            <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
                                        <?php } ?>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </figure>
                        <?php endif;
                    } elseif (has_post_format('audio')) {
                        ?>
                        <div class="mb--60  <?php echo esc_attr($alignwide); ?>">
                        <?php if ($audio_url): ?>
                        <audio controls>
                            <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                            <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                            <?php esc_html_e('Your browser does not support the audio tag.', 'blogar'); ?>
                        </audio>
                        <?php endif; ?>
                        <?php
                        if ( $post_banner_style == "" || $post_banner_style == "0" ) {
                            if (has_post_thumbnail()) { ?>
                                <div class="post-thumbnail mt--40  <?php echo esc_attr($alignwide); ?>">
                                    <?php the_post_thumbnail($thumb_size, ['class' => 'w-100']) ?>
                                </div>
                            <?php }
                        }
                        ?>
                        </div><?php
                    } elseif (has_post_format('video')) {
                        $convar_emb_link = '';
                        if (function_exists('axil_getEmbedUrl')){
                            $convar_emb_link = axil_getEmbedUrl($video_url);
                        }
                        if(!empty($convar_emb_link)){ ?>
                            <div class="thumbnail mb--60 position-relative  <?php echo esc_attr($alignwide); ?>">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="<?php echo esc_url($convar_emb_link); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        <?php } else {
                            if ( $post_banner_style == "" || $post_banner_style == "0" ) {
                                if (has_post_thumbnail()) { ?>
                                    <div class="post-thumbnail mb--60 position-relative  <?php echo esc_attr($alignwide); ?>">
                                        <?php the_post_thumbnail($thumb_size, ['class' => 'w-100']) ?>
                                    </div>
                                <?php }
                            }
                        }
                    } else {
                        if ( $post_banner_style == "" || $post_banner_style == "0" ) {
                            if (has_post_thumbnail()) { ?>
                                <div class="post-thumbnail mb--60 position-relative  <?php echo esc_attr($alignwide); ?>">
                                    <?php the_post_thumbnail($thumb_size, ['class' => 'w-100']) ?>
                                </div>
                            <?php }
                        }
                    }
                    ?>
                    <div class="axil-post-details-content">
                        <?php echo Helper::ad_post_before_content(); ?>
                        <?php
                        if ($review_area && "above" == $review_box_position) {
                            get_template_part('template-parts/review/post-review');
                        }
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="axil-page-links"><span class="page-link-holder">' . esc_html__('Pages:', 'blogar') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                        ));
                        if ($review_area && "under" == $review_box_position) {
                            get_template_part('template-parts/review/post-review');
                        } ?>
                        <?php echo Helper::ad_post_after_content(); ?>
                    </div>

                    <?php
                    $post_tags = get_the_tags();
                    if ( $axil_options['axil_show_blog_details_tags_meta'] !== 'no' && $post_tags ) { ?>
                        <div class="tagcloud">
                            <?php foreach( $post_tags as $tag ) { ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>


                    <?php if($axil_options['axil_blog_details_like_options'] || ($axil_options['axil_blog_details_social_share'] &&  function_exists('axil_sharing_icon_links_bottom') )){ ?>
                        <div class="social-share-block">
                            <?php
                            $nonce = wp_create_nonce( 'pt_like_it_nonce' );
                            $link = admin_url('admin-ajax.php?action=pt_like_it&post_id='.$post->ID.'&nonce='.$nonce);
                            $likes = get_post_meta( get_the_ID(), '_pt_likes', true );
                            $likes = ( empty( $likes ) ) ? 0 : $likes;
                            $likes_text = ( $likes <= 1 ) ? 'Like' : 'Likes';
                            ?>
                            <?php if($axil_options['axil_blog_details_like_options']){ ?>
                                <div class="post-like pt-like-it">
                                    <a class="like-button" href="<?php echo esc_url($link); ?>"  data-id="<?php echo esc_attr(get_the_ID()); ?>" data-nonce="<?php echo esc_attr($nonce); ?>"><i class="fal fa-thumbs-up"></i><span id="like-count-<?php echo get_the_ID() ?>" class="like-count"> <?php echo esc_html($likes); ?></span> &nbsp; <span><?php echo esc_html($likes_text); ?></span></a>
                                </div>
                            <?php } ?>
                            <?php if ($axil_options['axil_blog_details_social_share'] && function_exists('axil_sharing_icon_links_bottom')) {
                                axil_sharing_icon_links_bottom();
                            } ?>
                        </div>
                    <?php } ?>

                    <!-- Start Blog Author  -->
                    <?php
                    if ($axil_options['axil_blog_details_show_author_info']) {
                        get_template_part('template-parts/biography');
                    }
                    ?>
                    <!-- End Blog Author  -->
                    <?php

                    /**
                     *  Output comments wrapper if it's a post, or if comments are open,
                     * or if there's a comment number – and check for password.
                     * */
                    if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                        ?>

                        <div class="axil-comment-area">
                            <?php if($axil_options['axil_show_blog_details_comments_meta_bottom'] || $axil_options['axil_show_blog_details_add_our_comment_button']){ ?>
                                <div class="axil-total-comment-post">
                                    <?php if ($axil_options['axil_show_blog_details_comments_meta_bottom']) { ?>
                                        <div class="title">
                                            <h4 class="mb--0"><?php comments_popup_link(esc_html__('No Comments', 'blogar'), esc_html__('1 Comment', 'blogar'), esc_html__('% Comments', 'blogar'), 'post-comment', esc_html__('Comments off', 'blogar')); ?></h4>
                                        </div>
                                    <?php } ?>
                                    <?php if ($axil_options['axil_show_blog_details_add_our_comment_button']) { ?>
                                        <div class="add-comment-button cerchio">
                                            <a class="axil-button button-rounded" href="<?php the_permalink(); ?>#respond" tabindex="0"><span><?php echo (!empty($axil_options['axil_show_blog_details_add_our_comment_button_text'])) ? $axil_options['axil_show_blog_details_add_our_comment_button_text'] : "Add Your Comment"; ?></span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php comments_template(); ?>

                        </div><!-- .comments-wrapper -->

                        <?php
                    }
                    ?>

                </div>

            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $sidebar == 'right') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40 order-2 order-lg-2">
                    <div class="sidebar-inner">
                        <?php echo Helper::ad_post_before_sidebar(); ?>
                        <?php dynamic_sidebar(); ?>
                        <?php echo Helper::ad_post_after_sidebar(); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php if($axil_options['show_related_post'] == '1' && is_single() && !empty(blogar_related_post_grid())) { ?>
    <?php blogar_related_post_grid(); ?>
<?php } ?>
<!-- End Blog Details Area  -->

<?php
get_footer();