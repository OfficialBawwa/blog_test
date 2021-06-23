<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package blogar
 */

class TGM_Config {
    public $prfx = AXIL_THEME_FIX;
    public $path = "http://axilthemes.com/themes/blogar/demo/plugins/";

	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'axil_tgn_plugins' ) );
	}

	public function axil_tgn_plugins(){
		$plugins = array(	
			array(
				'name'         => esc_html__('Blogar Core','blogar'),
				'slug'         => 'blogar-core',
				'source'       => 'blogar-core.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			array(
				'name'         => esc_html__('Blogar Demo','blogar'),
				'slug'         => 'blogar-demo',
				'source'       => 'blogar-demo.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
            array(
                'name'      => esc_html__('Advanced Custom Fields Pro', 'blogar'),
                'slug'      => 'advanced-custom-fields-pro',
                'source'	=> 'advanced-custom-fields-pro.zip',
                'required'  => true,
            ),
					
			// Repository
			array(
				'name'     => esc_html__('Redux Framework','blogar'),
				'slug'     => 'redux-framework',
				'required' => true,
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress','blogar'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Smash Balloon Social Photo Feed','blogar'),
				'slug'     => 'instagram-feed',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Elementor Page Builder','blogar'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','blogar'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
            array(
                'name'      => esc_html__('One Click Demo', 'blogar'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
            )

		);

		$config = array(
			'id'           => $this->prfx,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prfx . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;