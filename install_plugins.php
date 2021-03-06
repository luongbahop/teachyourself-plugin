<?php

// require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {
	global $themename;
	$plugins = array(
		// array(
		// 	'name'     				=> 'Revolution Slider', // The plugin name
		// 	'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
		// 	'source'   				=> get_stylesheet_directory() . '/core/plugins/revslider.zip', // The plugin source
		// 	'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		// 	'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
		// 	'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		// 	'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		// 	'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		// ),
		array(
			'name'     				=> 'ACF repeater', 
			'slug'     				=> 'acf-repeater',
			'source'   				=> get_stylesheet_directory() . '/plugins/acf-repeater.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Mega main menu', 
			'slug'     				=> 'mega_main_menu',
			'source'   				=> get_stylesheet_directory() . '/plugins/mega_main_menu.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Visual composer', 
			'slug'     				=> 'js-composer',
			'source'   				=> get_stylesheet_directory() . '/plugins/js_composer.zip',
			'required' 				=> yes,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Advanced custom fields', 
			'slug'     				=> 'advanced-custom-fields-pro',
			'source'   				=> get_stylesheet_directory() . '/plugins/advanced-custom-fields.zip',
			'required' 				=> yes,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),
		array(
			'name' 		=> 'Pagination PageNavi',
			'slug' 		=> 'wp-pagenavi',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Contact form 7 - Tạo form',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Contact form 7 - flamingo',
			'slug' 		=> 'flamingo',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Smush Image Compression and Optimization - Tối ưu ảnh',
			'slug' 		=> 'wp-smushit',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Tinymce Advanced - Bộ editor thêm tính năng',
			'slug' 		=> 'tinymce-advanced',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Black Studio TinyMCE Widget - TinyMCE Widget',
			'slug' 		=> 'black-studio-tinymce-widget',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WP SMTP - Gửi mail',
			'slug' 		=> 'wp-smtp',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Simple Custom Post Order - Sắp xếp bằng kéo thả',//'orderby'=>'menu_order'
			'slug' 		=> 'simple-custom-post-order', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WP Super Cache - Tạo cache',
			'slug' 		=> 'wp-super-cache', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Lite speed cache - Tạo cache',
			'slug' 		=> 'litespeed-cache', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Autoptimize - Tối ưu HTML-CSS-JS',
			'slug' 		=> 'autoptimize', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WP Optimize - Tối ưu , dọn dẹp CSDL',
			'slug' 		=> 'wp-optimize', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'umanit update urls',
			'slug' 		=> 'umanit-update-urls', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WordPress ReCaptcha Integration',
			'slug' 		=> 'wp-recaptcha-integration', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Duplicate Post',
			'slug' 		=> 'duplicate-post', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Social warfare',
			'slug' 		=> 'social-warfare', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'iThemes Security',
			'slug' 		=> 'itsec', 
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Polylang',
			'slug' 		=> 'polylang', 
			'required' 	=> false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$theme_text_domain = $themename;

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       => $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' => '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug'  => 'themes.php', 				// Default parent menu slug
		'parent_slug'  => 'themes.php', 				// Default parent URL slug
		'menu'         => 'install-required-plugins', 	// Menu slug
		'has_notices'  => true,                       	// Show admin notices or not
		'is_automatic' => false,					   	// Automatically activate plugins after installation or not
		'message'      => '',							// Message to output right before the plugins table
		'strings'      => array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}