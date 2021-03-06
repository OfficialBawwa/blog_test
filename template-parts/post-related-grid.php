<?php
/**
 * @author  Axilweb
 * @since   1.0.1
 * @version 1.0.1
 * @package blogar
 */

if ( ! function_exists( 'blogar_related_post_grid' )) {
    function blogar_related_post_grid(){
        // Get Value
        $axil_options = Helper::axil_get_options();
        $post_id 				= get_the_id();
        $active_post 			= array( $post_id );
        $related_post_count 	= $axil_options['show_related_post_number'];
        $query_type = $axil_options['related_post_query'];
        $args = array(
            'post__not_in'           => $active_post,
            'posts_per_page'         => $related_post_count,
            'post_status'            => 'publish',
            'no_found_rows'          => true,
            'update_post_term_cache' => false,
            'ignore_sticky_posts'    => true,
        );
        if( !empty($axil_options['related_post_sort']) && isset($axil_options['related_post_sort']) ){
            $post_order = $axil_options['related_post_sort'];
            if( $post_order == 'rand' ){
                $args['orderby'] = 'rand';
            }elseif( $post_order == 'popular' ){
                $args['orderby'] = 'comment_count';
            }elseif( $post_order == 'modified' ){
                $args['orderby'] = 'modified';
                $args['order']   = 'ASC';
            }elseif( $post_order == 'recent' ){
                $args['orderby'] = '';
                $args['order']   = '';
            }
        }
        if( $query_type == 'author' ){
            $args['author'] = get_the_author_meta( 'ID' );
        }
        elseif( $query_type == 'tag' ){
            $tags_ids  = array();
            $post_tags = get_the_terms( $post_id, 'post_tag' );

            if( ! empty( $post_tags ) ){
                foreach( $post_tags as $individual_tag ){
                    $tags_ids[] = $individual_tag->term_id;
                }

                $args['tag__in'] = $tags_ids;
            }
        }
        else{
            $category_ids = array();
            $categories   = get_the_category( $post_id );
            foreach( $categories as $individual_category ){
                $category_ids[] = $individual_category->term_id;
            }
            $args['category__in'] = $category_ids;
        }

        $related_query = new \wp_query( $args );

        if( $related_query->have_posts() ) { ?>
        <div class="axil-more-stories-area axil-section-gap bg-color-grey">
            <div class="related-post p-b-xs-30">
                <div class="container">

                    <?php if ( !empty( $axil_options['related_post_area_title'] ) ): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="title"><?php echo esc_html( $axil_options['related_post_area_title'] ); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <?php
                        while ( $related_query->have_posts() ) {
                            $related_query->the_post();
                            $title = get_the_title();
                            $title = wp_trim_words( $title,  $axil_options['related_title_limit'] );
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="post-stories content-block mt--30">
                                    <?php if(has_post_thumbnail()){ ?>
                                        <!-- Start Post Thumbnail  -->
                                        <div class="post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('axil-grid-small-post-thumb'); ?>
                                            </a>
                                            <?php
                                            if ( has_post_format('video') ) { ?>
                                                <a class="video-popup size-medium position-top-center" href="<?php the_permalink(); ?>"><span class="play-icon"></span></a>
                                            <?php } ?>
                                        </div>
                                        <!-- End Post Thumbnail  -->
                                    <?php } ?>

                                    <div class="post-content">
                                        <?php \Helper::axil_post_category_meta(); ?>
                                        <h5 class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h5>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        wp_reset_postdata();
    }
}
?>
