<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if(!function_exists('axil_widgets_init')){
    function axil_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'blogar'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'blogar'),
            'before_widget' => '<div class="%1$s axil-single-widget %2$s mt--30 mt_sm--30 mt_md--30">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
        ));

        $number_of_widget 	= 6;
        $axil_widget_titles = array(
            '1' => esc_html__( 'Footer 1', 'blogar' ),
            '2' => esc_html__( 'Footer 2', 'blogar' ),
            '3' => esc_html__( 'Footer 3', 'blogar' ),
            '4' => esc_html__( 'Footer 4', 'blogar' ),
            '5' => esc_html__( 'Footer 5', 'blogar' ),
            '6' => esc_html__( 'Footer 6', 'blogar' ),
        );
        for ( $i = 1; $i <= $number_of_widget; $i++ ) {
            register_sidebar( array(
                'name'          => $axil_widget_titles[$i],
                'id'            => 'footer-'. $i,
                'before_widget' => '<div id="%1$s" class="footer-widget-item widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'axil_widgets_init' );