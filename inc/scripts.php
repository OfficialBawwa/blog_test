<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package blogar
 */

/**
 * Enqueue scripts and styles.
 */

if (!function_exists('blogar_scripts')){
    function blogar_scripts() {

        wp_deregister_style('font-awesome');

        // Fonts
        wp_enqueue_style('axil-fonts',axil_fonts_url());

        // Style
        wp_enqueue_style('bootstrap', AXIL_CSS_URL . 'vendor/bootstrap.min.css', array(), AXIL_VERSION);
        wp_enqueue_style('slick', AXIL_CSS_URL . 'vendor/slick.css', array(), AXIL_VERSION);
        wp_enqueue_style('slick-theme', AXIL_CSS_URL . 'vendor/slick-theme.css', array(), AXIL_VERSION);
        wp_enqueue_style('font-awesome', AXIL_CSS_URL . 'vendor/font-awesome.css', array(), AXIL_VERSION);
        wp_enqueue_style('axil-style', AXIL_CSS_URL . 'style.css', array(), AXIL_VERSION);
        wp_enqueue_style( 'blogar-style', get_stylesheet_uri() );

        // Scripts
        wp_enqueue_script('modernizr', AXIL_JS_URL . 'vendor/modernizr.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('popper', AXIL_JS_URL . 'vendor/popper.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('bootstrap', AXIL_JS_URL . 'vendor/bootstrap.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('slick', AXIL_JS_URL . 'vendor/slick.min.js', array('jquery'), AXIL_VERSION, false);
        wp_enqueue_script('tweenmax', AXIL_JS_URL . 'vendor/tweenmax.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('gsap', AXIL_JS_URL . 'vendor/gsap.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('axil-copylink', AXIL_JS_URL . 'vendor/commands.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('axil-cookie', AXIL_JS_URL . 'vendor/js.cookie.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('axil-main', AXIL_JS_URL . 'main.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('jquery-style-switcher', AXIL_JS_URL . 'vendor/jquery.style.switcher.js', array('jquery'), AXIL_VERSION, true);


        wp_enqueue_script( 'blogar-navigation', AXIL_ADMIN_JS_URL . 'navigation.js', array(), AXIL_VERSION, true );
        wp_enqueue_script( 'blogar-skip-link-focus-fix', AXIL_ADMIN_JS_URL . 'skip-link-focus-fix.js', array(), AXIL_VERSION, true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // For Post Like
        if( is_single() ) {
            wp_enqueue_style('axil-like-it', AXIL_CSS_URL . 'vendor/like-it.css', array(), AXIL_VERSION);
            wp_enqueue_script('axil-like-it', AXIL_JS_URL . 'vendor/like-it.js', array('jquery'), AXIL_VERSION, true);
            wp_localize_script( 'axil-like-it', 'likeit', array(
                'ajax_url' => admin_url( 'admin-ajax.php' )
            ));
        }


    }
}
add_action( 'wp_enqueue_scripts', 'blogar_scripts' );


/**
 * Axil admin script
 */
if( !function_exists('blogar_media_scripts') ) {
    function blogar_media_scripts() {

        wp_enqueue_style('blogar-wp-admin', AXIL_ADMIN_CSS_URL . 'admin-style.css', array(), AXIL_VERSION);
        if (is_rtl()){
            wp_enqueue_style('blogar-rtl-admin', AXIL_ADMIN_CSS_URL . 'rtl-admin.css', array(), AXIL_VERSION);
        }

        // JS
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'axil-logo-uploader', AXIL_ADMIN_JS_URL .'logo-uploader.js', false, '', true );
    }
}
add_action('admin_enqueue_scripts', 'blogar_media_scripts', 1000);