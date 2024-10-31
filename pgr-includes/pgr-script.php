<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
class Pgr_Script {
	function __construct() {		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pgr_front_style') );		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pgr_front_script') );		
		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'pgr_admin_style') );		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'pgr_admin_script') );
	}
	/**
	 * Function to add style at front side
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_front_style() {
		// Registring and enqueing magnific css
		if( !wp_style_is( 'wpoh-magnific-css', 'registered' ) ) {
			wp_register_style( 'wpoh-magnific-css', PGR_URL.'assets/css/popup.css', array(), PGR_VERSION );
			wp_enqueue_style( 'wpoh-magnific-css');
		}
		// Registring and enqueing slick css
		if( !wp_style_is( 'wpoh-slick-css', 'registered' ) ) {
			wp_register_style( 'wpoh-slick-css', PGR_URL.'assets/css/slick.css', array(), PGR_VERSION );
			wp_enqueue_style( 'wpoh-slick-css');	
		}
		if( !wp_style_is( 'wpoh-fontawesome-css', 'registered' ) ) {
			wp_register_style( 'wpoh-fontawesome-css', PGR_URL.'assets/css/font-awesome.min.css', array(), PGR_VERSION );
			wp_enqueue_style( 'wpoh-fontawesome-css');	
		}
		// Registring and enqueing public css
		wp_register_style( 'pgr-custom-css', PGR_URL.'assets/css/pgr-custom.css', null, PGR_VERSION );
		wp_enqueue_style( 'pgr-custom-css' );
	}
	/**
	 * Function to add script at front side
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_front_script() { 
	// Registring magnific popup script
		if( !wp_script_is( 'wpoh-magnific-js', 'registered' ) ) {			
			wp_register_script( 'wpoh-magnific-js', PGR_URL.'assets/js/popup.min.js', array('jquery'), PGR_VERSION, true );
		}		
      // Registring slick slider script
		if( !wp_script_is( 'wpoh-catfilter-js', 'registered' ) ) {
			wp_register_script( 'wpoh-catfilter-js', PGR_URL.'assets/js/catfilter.js', array('jquery'), PGR_VERSION, true );
			wp_enqueue_script('wpoh-catfilter-js');
		}
		// Registring slick slider script
		if( !wp_script_is( 'wpoh-slick-js', 'registered' ) ) {
			wp_register_script( 'wpoh-slick-js', PGR_URL.'assets/js/slick.min.js', array('jquery'), PGR_VERSION, true );
		}
		// Registring public script
		wp_register_script( 'pgr-custom-js', PGR_URL.'assets/js/pgr-custom.js', array('jquery'), PGR_VERSION, true );
		wp_localize_script( 'pgr-custom-js', 'Raigl', array(
															'is_mobile' 		=>	(wp_is_mobile()) 	? 1 : 0,
															'is_rtl' 			=>	(is_rtl()) 			? 1 : 0,
														));
	}	
	/**
	 * Enqueue admin styles
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_admin_style( $hook ) {
		global $typenow;
		// If page is plugin setting page then enqueue script
		if( $typenow == PGR_POST_TYPE ) {
			// Registring admin script
			wp_register_style( 'pgr-admin-style', PGR_URL.'assets/css/pgr-admin.css', null, PGR_VERSION );
			wp_enqueue_style( 'pgr-admin-style' );
		}
	}
	/**
	 * Function to add script at admin side
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_admin_script( $hook ) {
		global $wp_version, $wp_query, $typenow;
		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts
		if( $typenow == PGR_POST_TYPE ) {
			// Enqueue required inbuilt sctipt
			wp_enqueue_script( 'jquery-ui-sortable' );
			// Registring admin script
			wp_register_script( 'pgr-admin-script', PGR_URL.'assets/js/pgr-admin.js', array('jquery'), PGR_VERSION, true );
			wp_localize_script( 'pgr-admin-script', 'PgrAdmin', array(
																	'new_ui' 				=>	$new_ui,
																	'img_edit_popup_text'	=> __('Edit Image in Popup', 'wp-photo-gallery-with-responsive'),
																	'attachment_edit_text'	=> __('Edit Image', 'wp-photo-gallery-with-responsive'),
																	'img_delete_text'		=> __('Remove Image', 'wp-photo-gallery-with-responsive'),
																));
			wp_enqueue_script( 'pgr-admin-script' );
			wp_enqueue_media(); // For media uploader
		}
	}
}
$pgr_script = new Pgr_Script();