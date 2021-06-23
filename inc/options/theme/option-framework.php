<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}
$opt_name = AXIL_THEME_FIX . '_options';
$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Axil Theme Options', 'blogar'),
    'page_title' => esc_html__('Axil Theme Options', 'blogar'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => AXIL_THEME_FIX . '_options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => '&nbsp;',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'hide_expand' => true,
    // This variable determines if the ‘Expand Options’ buttons is visible on the options panel.
);

Redux::setArgs($opt_name, $args);
/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'blogar'),
    'id' => 'axil_general',
    'icon' => 'el el-cog',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('General Setting', 'blogar'),
    'id' => 'axil-general-setting',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'active_dark_mode',
            'type' => 'switch',
            'title' => esc_html__('Switch to Dark Mode', 'blogar'),
            'on' => esc_html__('Yes', 'blogar'),
            'off' => esc_html__('No', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'show_ld_switcher_form_user_end',
            'type' => 'switch',
            'title' => esc_html__('Enabled Dark/Light Switcher Form User End', 'blogar'),
            'on' => esc_html__('Enabled', 'blogar'),
            'off' => esc_html__('Disabled', 'blogar'),
            'default' => true,
        ),

        // Start logo
        array(
            'id' => 'axil_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Select Logo Type', 'blogar'),
            'subtitle' => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work. (Note: Used when Transparent Header is enabled.)', 'blogar'),
            'options' => array(
                'image' => 'Image',
                'text' => 'Text',
            ),
            'default' => 'image',
        ),
        array(
            'id' => 'axil_head_logo',
            'title' => esc_html__('Default Logo', 'blogar'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'blogar'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'logo.png'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_head_logo_white',
            'title' => esc_html__('White Logo', 'blogar'),
            'subtitle' => esc_html__('Upload the white logo of your site that use into off canvas area. ( Recommended size: Width 267px and Height: 70px )', 'blogar'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'white-logo.png'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_logo_max_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Logo Height', 'blogar'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'blogar'),
            'width' => false,
            'output' => array(
                'max-height' => '.logo img'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_logo_padding',
            'type' => 'spacing',
            'title' => esc_html__('Logo Padding', 'blogar'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the logo. (Note: Used when Transparent Header is enabled.)', 'blogar'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => 'px',
                'padding-right' => 'px',
                'padding-bottom' => 'px',
                'padding-left' => 'px',
                'units' => 'px',
            ),
            'output'         => array('.logo a'),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_logo_text',
            'type' => 'text',
            'required' => array('axil_logo_type', 'equals', 'text'),
            'title' => esc_html__('Site Title', 'blogar'),
            'subtitle' => esc_html__('Enter your site title here. (Note: Used when Transparent Header is enabled.)', 'blogar'),
            'default' => get_bloginfo('name')
        ),
        array(
            'id' => 'axil_logo_text_font',
            'type' => 'typography',
            'title' => esc_html__('Site Title Font Settings', 'blogar'),
            'required' => array('axil_logo_type', 'equals', 'text'),
            'google' => true,
            'subsets' => false,
            'line-height' => false,
            'text-transform' => true,
            'transition' => false,
            'text-align' => false,
            'preview' => false,
            'all_styles' => true,
            'output' => array('.logo a, .haeder-default .logo a'),
            'units' => 'px',
            'subtitle' => esc_html__('Controls the font settings of the site title. (Note: Used when Transparent Header is enabled.)', 'blogar'),
            'default' => array(
                'google' => true,
            )
        ),
        // End logo
        array(
            'id' => 'axil_scroll_to_top_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'blogar'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Yes', 'blogar'),
                'no' => esc_html__('No', 'blogar'),
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'axil_modern_cursor_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Modern Cursor', 'blogar'),
            'subtitle' => esc_html__('Enable the modern cursor that appears in the whole website.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Yes', 'blogar'),
                'no' => esc_html__('No', 'blogar'),
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'axil_preloader',
            'type' => 'button_set',
            'title' => esc_html__('Enable Preloader', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Yes', 'blogar'),
                'no' => esc_html__('No', 'blogar'),
            ),
            'default' => 'no'
        ),
        array(
            'id' => 'axil_preloader_image',
            'type' => 'media',
            'title' => esc_html__('Preloader Image', 'blogar'),
            'subtitle' => esc_html__('Please upload your choice of preloader image. Transparent GIF format is recommended', 'blogar'),
            'default' => array(
                'url' => AXIL_THEME_URI . '/assets/images/preloader.gif'
            ),
            'required' => array('axil_preloader', 'equals', 'yes')
        ),
    )
));
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Contact & Socials', 'blogar'),
        'id' => 'socials_section',
        'heading' => esc_html__('Contact & Socials', 'blogar'),
        'subtitle' => esc_html__('In case you want to hide any field, just keep that field empty', 'blogar'),
        'icon' => 'el el-twitter',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'social_title',
                'type' => 'text',
                'title' => esc_html__('Social Title', 'blogar'),
                'default' => esc_html__('Follow us', 'blogar'),
            ),

            array(
                'id' => 'axil_social_icons',
                'type' => 'sortable',
                'title' => esc_html__('Social Icons', 'blogar'),
                'subtitle' => esc_html__('Enter social links to show the icons', 'blogar'),
                'mode' => 'text',
                'label' => true,
                'options' => array(
                    'facebook-f' => '',
                    'twitter' => '',
                    'pinterest-p' => '',
                    'linkedin-in' => '',
                    'instagram' => '',
                    'vimeo-v' => '',
                    'dribbble' => '',
                    'behance' => '',
                    'youtube' => '',
                ),
                'default' => array(
                    'facebook-f' => 'https://www.facebook.com/',
                    'twitter' => 'https://twitter.com/',
                    'pinterest-p' => 'https://pinterest.com/',
                    'linkedin-in' => 'https://linkedin.com/',
                    'instagram' => 'https://instagram.com/',
                    'vimeo-v' => 'https://vimeo.com/',
                    'dribbble' => 'https://dribbble.com/',
                    'behance' => 'https://behance.com/',
                    'youtube' => '',
                ),
            )
        )
    )
);

/**
 * Header
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'blogar'),
    'id' => 'header_id',
    'icon' => 'el el-minus',
    'fields' => array(
        array(
            'id' => 'axil_enable_header',
            'type' => 'switch',
            'title' => esc_html__('Header', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the header area.', 'blogar'),
            'default' => true
        ),
        // Header Custom Style
        array(
            'id' => 'axil_select_header_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Header Layout', 'blogar'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Header Layout 1', 'blogar'),
                    'title' => esc_html__('Header Layout 1', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Header Layout 2', 'blogar'),
                    'title' => esc_html__('Header Layout 2', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                    'alt' => esc_html__('Header Layout 3', 'blogar'),
                    'title' => esc_html__('Header Layout 3', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/3.png',
                ),
                '4' => array(
                    'alt' => esc_html__('Header Layout 4', 'blogar'),
                    'title' => esc_html__('Header Layout 4', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/4.png',
                ),
                '5' => array(
                    'alt' => esc_html__('Header Layout 5', 'blogar'),
                    'title' => esc_html__('Header Layout 5', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/5.png',
                ),
            ),
            'default' => '1',
            'required' => array('axil_enable_header', 'equals', true),
        ),
        array(
            'id' => 'axil_enable_header_search',
            'type' => 'switch',
            'title' => esc_html__('Header Search Form', 'blogar'),
            'subtitle' => esc_html__('Enable or disable header search form.', 'blogar'),
            'default' => true,
        ),
        array(
            'id' => 'axil_enable_header_social_icon',
            'type' => 'switch',
            'title' => esc_html__('Social Icon', 'blogar'),
            'subtitle' => esc_html__('Enable or disable social icon.', 'blogar'),
            'default' => true,
            'required' => array( 'axil_select_header_template', 'equals', array('3', '4', '5') ),
        ),
        array(
            'id' => 'axil_enable_header_top_menu',
            'type' => 'switch',
            'title' => esc_html__('Header Top Menu', 'blogar'),
            'subtitle' => esc_html__('Enable or disable header top menu.', 'blogar'),
            'default' => false,
            'required' => array( 'axil_select_header_template', 'equals', array('3', '4', '5') ),
        ),
        array(
            'id' => 'axil_enable_header_top_date',
            'type' => 'switch',
            'title' => esc_html__('Header Top Date', 'blogar'),
            'subtitle' => esc_html__('Enable or disable header top date.', 'blogar'),
            'default' => false,
            'required' => array( 'axil_select_header_template', 'equals', array('3', '4', '5') ),
        ),
        array(
            'id' => 'axil_header_sticky',
            'type' => 'switch',
            'title' => esc_html__('Header Sticky', 'blogar'),
            'subtitle' => esc_html__('Enable to activate the sticky header.', 'blogar'),
            'default' => false,
            'required' => array('axil_enable_header', 'equals', true),
        ),
        array(
            'id' => 'axil_header_transparent',
            'type' => 'switch',
            'title' => esc_html__('Header Transparent', 'blogar'),
            'subtitle' => esc_html__('Enable to make the header area transparent.', 'blogar'),
            'default' => true,
            'required' => array('axil_enable_header', 'equals', true),
        ), // output body class


    )
));

/**
 * footer Top
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'blogar'),
    'id' => 'axil_footer_top_section',
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'axil_footer_top_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Top', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the footer top area.', 'blogar'),
            'default' => false,
        ),
        // Header Custom Style
        array(
            'id' => 'axil_ft_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'blogar'),
            'default' => 'Instagram',
            'required' => array('axil_footer_top_enable', 'equals', true),
        ),
        array(
            'id' => 'axil_ft_shortcode',
            'type' => 'textarea',
            'title' => esc_html__('Add Shortcode Here', 'blogar'),
            'default' => '',
            'required' => array('axil_footer_top_enable', 'equals', true),
        ),
        array(
            'id'       => 'axil_ft_area_background',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'blogar'),
            'subtitle' => esc_html__('Footer Top Background', 'blogar'),
            'required' => array('axil_footer_top_enable', 'equals', true),
            'output'    => array('background' => '.axil-instagram-area.bg-color-grey')
        ),

    )
));


/**
 * Footer section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'blogar'),
    'id' => 'axil_footer_section',
    'icon' => 'el el-photo',
    'fields' => array(
        array(
            'id' => 'axil_footer_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the footer area.', 'blogar'),
            'default' => true,
        ),
        // Header Custom Style
        array(
            'id' => 'axil_select_footer_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Footer Layout', 'blogar'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Footer Layout 1', 'blogar'),
                    'title' => esc_html__('Footer Layout 1', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Footer Layout 2', 'blogar'),
                    'title' => esc_html__('Footer Layout 2', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/2.png',
                ),
                '3' => array(
                    'alt' => esc_html__('Footer Layout 3', 'blogar'),
                    'title' => esc_html__('Footer Layout 3', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/3.png',
                ),
                '4' => array(
                    'alt' => esc_html__('Footer Layout 4', 'blogar'),
                    'title' => esc_html__('Footer Layout 4', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/4.png',
                ),
            ),
            'default' => '2',
            'required' => array('axil_footer_enable', 'equals', true),
        ),
        array(
            'id' => 'axil_footer_social_network',
            'type' => 'switch',
            'title' => esc_html__('Footer Social Network', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the footer social network.', 'blogar'),
            'default' => false,
            'required' => array('axil_select_footer_template', 'equals', array('1', '2', '3')),
        ),
        // Footer Bottom
        array(
            'id' => 'axil_copyright_contact',
            'type' => 'editor',
            'title' => esc_html__('Copyright Content', 'blogar'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 5,
            ),
            'default' => '© 2021. All rights reserved by <a href="#" target="_blank" rel="noopener">Your Company.</a>',
            'required' => array('axil_footer_enable', 'equals', true),
        ),

    )
));

/**
 * Page Banner/Title section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Banner', 'blogar'),
    'id' => 'axil_banner_section',
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => 'axil_banner_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'blogar'),
            'default' => true,
        ),
        // Header Custom Style
        array(
            'id' => 'axil_select_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select banner Layout', 'blogar'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'blogar'),
                    'title' => esc_html__('banner Layout 1', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'blogar'),
                    'title' => esc_html__('banner Layout 2', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
            ),
            'default' => '1',
            'required' => array('axil_banner_enable', 'equals', true),
        ),
        array(
            'id' => 'axil_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'blogar'),
            'default' => true,
            'required' => array('axil_select_banner_template', 'equals', '1'),

        ),
    )
));

/**
 * Blog Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'blogar'),
    'id' => 'axil_blog',
    'icon' => 'el el-file-edit',
));

/**
 * Blog Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'blogar'),
    'id' => 'axil_blog_genaral',
    'icon' => 'el el-edit',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'axil_enable_blog_title',
            'type' => 'button_set',
            'title' => esc_html__('Title', 'blogar'),
            'subtitle' => esc_html__('Enable or Disable the blog page title.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Enable', 'blogar'),
                'no' => esc_html__('Disable', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_blog_text',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'blogar'),
            'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'blogar'),
            'default' => esc_html__('Blog', 'blogar'),
            'required' => array('axil_enable_blog_title', 'equals', 'yes'),
        ),
        array(
            'id' => 'axil_blog_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'blogar'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'blogar'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'blogar'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'blogar'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'blogar'),
                ),
            ),
            'default' => 'right',
        ),
        array(
            'id' => 'axil_show_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'blogar'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'blogar'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_updated_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Updated Date', 'blogar'),
            'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'axil_show_post_reading_time_meta',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'blogar'),
            'subtitle' => esc_html__('Show or hide the publish content reading time.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_comments_meta',
            'type' => 'button_set',
            'title' => esc_html__('Comments', 'blogar'),
            'subtitle' => esc_html__('Show or hide the comments of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'axil_show_post_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'blogar'),
            'subtitle' => esc_html__('Show or hide the categories of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'blogar'),
            'subtitle' => esc_html__('Show or hide the tags of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'axil_show_post_share_icon',
            'type' => 'button_set',
            'title' => esc_html__('Share icon', 'blogar'),
            'subtitle' => esc_html__('Show or hide the share icon of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
    )
));

/**
 * Single Post
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'blogar'),
    'id' => 'axil_blog_details_id',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'axil_single_pos',
            'type' => 'image_select',
            'title' => esc_html__('Blog Details Sidebar', 'blogar'),
            'subtitle' => esc_html__('Choose your favorite layout', 'blogar'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'blogar'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'blogar'),
                ),
                'full' => array(
                    'alt' => esc_html__('No Sidebar', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'blogar'),
                ),
            ),
            'default' => 'full',
        ),
        array(
            'id' => 'axil_single_post_style',
            'type' => 'image_select',
            'title' => esc_html__('Blog Details Banner Style', 'blogar'),
            'subtitle' => esc_html__('Choose your favorite layout', 'blogar'),
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Default', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/post-style-0.png',
                    'title' => esc_html__('Default', 'blogar'),
                ),
                '1' => array(
                    'alt' => esc_html__('Full Banner', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/post-style-1.png',
                    'title' => esc_html__('Full Banner', 'blogar'),
                ),
                '2' => array(
                    'alt' => esc_html__('Boxed Banner', 'blogar'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/post-style-2.png',
                    'title' => esc_html__('Boxed Banner', 'blogar'),
                ),
            ),
        ),
        array(
            'id' => 'axil_enable_single_post_breadcrumb_wrap',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb Area', 'blogar'),
            'subtitle' => esc_html__('Enable or Disable Breadcrumb Area.', 'blogar'),
            'options' => array(
                'show' => esc_html__('Enable', 'blogar'),
                'hide' => esc_html__('Disable', 'blogar'),
            ),
            'default' => 'show',
        ),
        array(
            'id' => 'axil_show_blog_details_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'blogar'),
            'subtitle' => esc_html__('Show or hide the categories of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_blog_details_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'blogar'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_blog_details_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'blogar'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_blog_details_updated_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Updated Date', 'blogar'),
            'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'axil_show_blog_details_reading_time_meta',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'blogar'),
            'subtitle' => esc_html__('Show or hide the publish content reading time.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_blog_details_comments_meta',
            'type' => 'button_set',
            'title' => esc_html__('Comments', 'blogar'),
            'subtitle' => esc_html__('Show or hide the comments of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'axil_show_blog_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'blogar'),
            'subtitle' => esc_html__('Show or hide the tags of blog post.', 'blogar'),
            'options' => array(
                'yes' => esc_html__('Show', 'blogar'),
                'no' => esc_html__('Hide', 'blogar'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_blog_details_social_share_for_top',
            'type' => 'switch',
            'title' => esc_html__('Social Share Form Top', 'blogar'),
            'subtitle' => esc_html__('Show or hide the social share of single post.', 'blogar'),
            'default' => true,
        ),
        array(
            'id' => 'axil_blog_details_social_share',
            'type' => 'switch',
            'title' => esc_html__('Social Share', 'blogar'),
            'subtitle' => esc_html__('Show or hide the social share of single post.', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'axil_blog_details_like_options',
            'type' => 'switch',
            'title' => esc_html__('Like Button', 'blogar'),
            'subtitle' => esc_html__('Show or hide the like button of single post.', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'axil_blog_details_show_author_info',
            'type' => 'switch',
            'title' => esc_html__('Show Author Info', 'blogar'),
            'subtitle' => esc_html__('Show or hide the Author Info box of single post.', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'axil_show_blog_details_comments_meta_bottom',
            'type' => 'switch',
            'title' => esc_html__('Comments Count', 'blogar'),
            'subtitle' => esc_html__('Show or hide the Comments Count of single post.', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'axil_show_blog_details_add_our_comment_button',
            'type' => 'switch',
            'title' => esc_html__('Add your comment button', 'blogar'),
            'subtitle' => esc_html__('Show or hide the Add your comment button of single post.', 'blogar'),
            'default' => false,
        ),
        array(
            'id' => 'axil_show_blog_details_add_our_comment_button_text',
            'type' => 'text',
            'title' => esc_html__('Add your comment button Text', 'blogar'),
            'default' => esc_html__('Add Your Comment', 'blogar'),
            'required' => array('axil_show_blog_details_add_our_comment_button', 'equals', true),
        ),
        array(
            'id' => 'axil_post_review_pors_label',
            'type' => 'text',
            'title' => esc_html__('Pors', 'blogar'),
            'default' => esc_html__('Pors', 'blogar'),
        ),
        array(
            'id' => 'axil_post_review_cons_label',
            'type' => 'text',
            'title' => esc_html__('Cons', 'blogar'),
            'default' => esc_html__('Cons', 'blogar'),
        ),

        // Show Related post
        array(
            'id'      => 'show_related_post',
            'type'    => 'switch',
            'title'   => esc_html__( 'Show Related post', 'blogar' ),
            'on'      => esc_html__( 'On', 'blogar' ),
            'off'     => esc_html__( 'Off', 'blogar' ),
            'default' => false,
        ),
        array(
            'id'       => 'related_post_area_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Related Post Area Title', 'blogar' ),
            'default'  => esc_html__( 'Related Posts', 'blogar' ),
            'required' => array('show_related_post', 'equals', true),
        ),

        array(
            'id'       => 'show_related_post_number',
            'type'     => 'text',
            'title'    => esc_html__( 'Show Related Post Number', 'blogar' ),
            'required' => array( 'show_related_post', 'equals', true ),
            'default'  =>  '4',
        ),

        array(
            'id'       => 'related_post_query',
            'type'     => 'radio',
            'title'    => esc_html__('Query Type', 'blogar'),
            'subtitle' => esc_html__('Post Query', 'blogar'),
            'required' => array( 'show_related_post', 'equals', true ),
            'options'  => array(
                'cat'       => esc_html__( 'Posts in the same Categories', 'blogar' ),
                'tag'       => esc_html__( 'Posts in the same Tags', 'blogar' ),
                'author'    => esc_html__( 'Posts by the same Author', 'blogar' ),
            ),
            'default'   => 'cat'
        ),

        array(
            'id'       => 'related_post_sort',
            'type'     => 'radio',
            'title'    => esc_html__('Sort Order', 'blogar'),
            'subtitle' => esc_html__('Display post Order', 'blogar'),
            'required' => array( 'show_related_post', 'equals', true ),
            'options'  => array(
                'recent'    => esc_html__( 'Recent Posts', 'blogar' ),
                'rand'      => esc_html__( 'Random Posts', 'blogar' ),
                'modified'  => esc_html__( 'Last Modified Posts', 'blogar' ),
                'popular'   => esc_html__( 'Most Commented posts', 'blogar' ),
            ),
            'default'   => 'recent'
        ),
        array(
            'id'       => 'related_title_limit',
            'type'     => 'text',
            'required' => array( 'show_related_post', 'equals', true ),
            'title'    => esc_html__( 'Related Post Title Length', 'blogar' ),
            'default'  => '15',
        ),
    )
));

/**
 * Typography
 */

/**
 * 404 error page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'blogar'),
    'id' => 'axil_error_page',
    'icon' => 'el el-eye-close',
    'fields' => array(
        array(
            'id' => 'axil_404_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'blogar'),
            'subtitle' => esc_html__('Add your Default title.', 'blogar'),
            'value' => 'Page not Found',
            'default' => esc_html__('Page not Found', 'blogar'),
        ),
        array(
            'id' => 'axil_404_subtitle',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'blogar'),
            'subtitle' => esc_html__('Add your custom subtitle.', 'blogar'),
            'default' => esc_html__('Sorry, but the page you were looking for could not be found.', 'blogar'),
        ),
        array(
            'id' => 'axil_enable_go_back_btn',
            'type' => 'button_set',
            'title' => esc_html__('Button', 'blogar'),
            'subtitle' => esc_html__('Enable or disable the go to home page button.', 'blogar'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'axil_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'blogar'),
            'subtitle' => esc_html__('Set the custom text of go to home page button.', 'blogar'),
            'default' => esc_html__('Back to Homepage', 'blogar'),
            'required' => array('axil_enable_go_back_btn', 'equals', 'yes'),
        )
    )
));

/**
 * Ads Management
 */
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Ad Management', 'blogar'),
        'id' => 'ad_settings_section',
        'icon' => 'el el-speaker',
    )
);

// Blog / Archive
$header_mid = axil_redux_add_fields('ad_post_header_mid', esc_html__('Header Mid', 'blogar'));
$before_content = axil_redux_add_fields('ad_post_before_content', esc_html__('Before Post Contents', 'blogar'));
$after_content = axil_redux_add_fields('ad_post_after_content', esc_html__('After Post Contents', 'blogar'));
$before_sidebar = axil_redux_add_fields('ad_post_before_sidebar', esc_html__('Before Post Sidebar', 'blogar'));
$after_sidebar = axil_redux_add_fields('ad_post_after_sidebar', esc_html__('After Post Sidebar', 'blogar'));

$fields = array_merge($before_content, $after_content, $before_sidebar, $after_sidebar);

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Header', 'blogar'),
        'id' => 'ad_settings_header_mid',
        'heading' => esc_html__('Header Mid Ad', 'blogar'),
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $header_mid
    )
);

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Blog', 'blogar'),
        'id' => 'ad_settings_blog_section',
        'heading' => esc_html__('Blog', 'blogar'),
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $fields
    )
);