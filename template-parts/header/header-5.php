<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogar
 */

// Get Value
$axil_options = Helper::axil_get_options();
$header_layout = Helper::axil_header_layout();
$header_sticky = $header_layout['header_sticky'];
$header_transparent = $header_layout['header_transparent'];
// Condition
$unique_id = esc_attr( blogar_unique_id( 'header-search-' ) );

$header_sticky = ("no" !== $header_sticky && "0" !== $header_sticky) ? " header-sticky " : "";
$header_transparent = ("no" !== $header_transparent && "0" !== $header_transparent) ? " header-transparent " : "";
// Menu
$axil_nav_menu_args = Helper::axil_nav_menu_args();
$axil_heaedr_top_menu_args = Helper::axil_heaedr_top_menu_args();

?>
<!-- Start Header -->
<header class="header axil-header header-style-4  header-light <?php echo esc_attr($header_sticky) ?>  <?php echo esc_attr($header_transparent) ?>">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
                    <div class="header-top-bar d-flex flex-wrap align-items-center justify-content-center justify-content-md-start">
                        <?php if($axil_options['axil_enable_header_top_menu']){ ?>
                            <ul class="header-top-date liststyle d-flex flrx-wrap align-items-center mr--20">
                                <li><?php echo date(get_option('date_format')); ?></li>
                            </ul>
                        <?php } ?>
                        <?php if (has_nav_menu('headertop') && $axil_options['axil_enable_header_top_menu']) { ?>
                            <?php wp_nav_menu($axil_heaedr_top_menu_args); ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
                    <?php if(!empty($axil_options['axil_social_icons']) && $axil_options['axil_enable_header_social_icon']){ ?>
                        <!-- Start Social Icons  -->
                        <ul class="social-share-transparent md-size justify-content-center justify-content-md-end">
                            <?php
                            foreach ($axil_options['axil_social_icons'] as $key => $value) {
                                if ($value != '') {
                                    echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" target="_blank"><i class="fab fa-' . esc_attr($key) . '"></i></a></li>';
                                }
                            }
                            ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php $has_search_form = (!empty($axil_options['axil_enable_header_search']) && $axil_options['axil_enable_header_search']) ? "col-xl-9 col-lg-4 col-md-6 col-sm-4 col-7" : "col-xl-12 col-lg-4 col-md-4 col-sm-8 col-7"; ?>
    <div class="header-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="<?php echo esc_attr($has_search_form); ?>">
                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="logo">
                            <?php if (isset($axil_options['axil_logo_type'])): ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

                                    <?php if ('image' == $axil_options['axil_logo_type']): ?>

                                        <?php if($axil_options['axil_head_logo']){ ?>
                                            <img class="dark-logo" src="<?php echo esc_url( $axil_options['axil_head_logo']['url'] ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        <?php } ?>
                                        <?php if($axil_options['axil_head_logo_white']){ ?>
                                            <img class="light-logo" src="<?php echo esc_url( $axil_options['axil_head_logo_white']['url'] ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        <?php } ?>

                                    <?php else: ?>

                                        <?php if ('text' == $axil_options['axil_logo_type']): ?>

                                            <?php echo esc_html($axil_options['axil_logo_text']); ?>

                                        <?php endif ?>

                                    <?php endif ?>

                                </a>
                            <?php else: ?>

                                <h3>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                        <?php if (isset($axil_options['axil_logo_text']) ? $axil_options['axil_logo_text'] : '') {
                                            echo esc_html($axil_options['axil_logo_text']);
                                        } else {
                                            bloginfo('name');
                                        }
                                        ?>
                                    </a>
                                </h3>

                                <?php $description = get_bloginfo('description', 'display');

                                if ($description || is_customize_preview()) { ?>

                                    <p class="site-description"><?php echo esc_html($description); ?> </p>

                                <?php } ?>

                            <?php endif ?>

                        </div> 
                        <!-- End Logo-->
                        <div class="mainmenu-wrapper d-none d-xl-block">
                            <!-- Start Mainmanu Nav -->
                            <?php if (has_nav_menu('primary')) {
                                wp_nav_menu($axil_nav_menu_args);
                            } ?>
                            <!-- End Mainmanu Nav -->
                        </div>
                    </div>
                </div>

                <?php if(!empty($axil_options['axil_enable_header_search']) && $axil_options['axil_enable_header_search']){ ?>
                    <div class="mobile-search-wrapper col-xl-3 col-lg-8 col-md-6 col-sm-6 col-5">
                        <div class="header-search d-none d-sm-block">
                            <div class="d-flex align-items-center justify-content-end">
                                <form  id="<?php echo esc_attr($unique_id); ?>"  action="<?php echo esc_url(home_url( '/' )); ?>" method="GET" class="blog-search">
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                        <input type="text"  name="s"  class="form-control" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'blogar' ); ?>" value="<?php echo get_search_query(); ?>"/>
                                    </div>
                                </form>
                                <!-- Start Hamburger Menu  -->
                                <div class="hamburger-menu d-block d-xl-none ml--20">
                                    <div class="hamburger-inner">
                                        <div class="icon"><i class="fal fa-bars"></i></div>
                                    </div>
                                </div>
                                <!-- End Hamburger Menu  -->
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <div class="header-search text-right d-flex align-items-center justify-content-end">
                                <div class="search-mobile-icon">
                                    <button><i class="fal fa-search"></i></button>
                                </div>
                                <form  id="<?php echo esc_attr($unique_id); ?>"  action="<?php echo esc_url(home_url( '/' )); ?>" method="GET" class="blog-search large-mobile-blog-search">
                                    <div class="axil-search-mobile form-group">
                                        <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                        <input type="text"  name="s"  class="form-control" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'blogar' ); ?>" value="<?php echo get_search_query(); ?>"/>
                                    </div>
                                </form>
                                <!-- Start Hamburger Menu  -->
                                <div class="hamburger-menu d-block d-xl-none ml--20">
                                    <div class="hamburger-inner">
                                        <div class="icon"><i class="fal fa-bars"></i></div>
                                    </div>
                                </div>
                                <!-- End Hamburger Menu  -->
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if(empty($axil_options['axil_enable_header_search']) && $axil_options['axil_enable_header_search'] == false){ ?>
                    <div class="col-xl-3 col-lg-8 col-md-6 col-sm-6 col-5 d-block d-xl-none">
                        <!-- Start Hamburger Menu  -->
                        <div class="hamburger-menu text-right">
                            <div class="hamburger-inner">
                                <div class="icon"><i class="fal fa-bars"></i></div>
                            </div>
                        </div>
                        <!-- End Hamburger Menu  -->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>
<!-- Start Header -->