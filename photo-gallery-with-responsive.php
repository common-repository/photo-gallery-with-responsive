<?php
/**
 * Plugin Name: Photo Gallery with Responsive 
 * Plugin URI: https://wponlinehelp.com/plugins/
 * Version: 1.2
 * Description: Create Photo and Image gellary for grid, slider and Portfolio filter with popupbox view using shortcode.
 * Text Domain: wp-photo-gallery-with-responsive
 * Domain Path: /languages/
 * Author: pareshpachani007
 * Author URI: https://wponlinehelp.com
 */
/**
 * Basic plugin definitions
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if( !defined( 'PGR_VERSION' ) ) {
	define( 'PGR_VERSION', '1.2' ); // Version of plugin
}
if( !defined( 'PGR_DIR' ) ) {
    define( 'PGR_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'PGR_URL' ) ) {
    define( 'PGR_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'PGR_PLUGIN_BASENAME' ) ) {
	define( 'PGR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // plugin base name
}
if( !defined( 'PGR_POST_TYPE' ) ) {
    define( 'PGR_POST_TYPE', 'photo_gallery' ); // Plugin post type
}
if( !defined( 'PGR_CAT' ) ) {
    define( 'PGR_CAT', 'photo_cat' ); // Plugin category name
}
if( !defined( 'PGR_META_PREFIX' ) ) {
    define( 'PGR_META_PREFIX', '_pgr_' ); // Plugin metabox prefix
}
/**
 * Load Text Domain
 * This  plugin ready for translation
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_load_textdomain() {
	load_plugin_textdomain( 'wp-photo-gallery-with-responsive', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'pgr_load_textdomain');
/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'pgr_install' );
/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'pgr_uninstall');
/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_install() {
    
    // Register post type function
    pgr_register_post_type();
    pgr_register_taxonomies();
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}
/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_uninstall() {
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}
// Taking some globals
global $pgr_image_render;
// Functions file
require_once( PGR_DIR . '/pgr-includes/pgr-functions.php' );
// Plugin Post Type File
require_once( PGR_DIR . '/pgr-includes/pgr-cpt.php' );
// Admin Class File
require_once( PGR_DIR . '/pgr-admin/pgr-admin.php' );
// Script Class File
require_once( PGR_DIR . '/pgr-includes/pgr-script.php' );
// Shortcode File
require_once( PGR_DIR . '/pgr-shortcode/pgr-photo-gallery-grid.php' ); 
require_once( PGR_DIR . '/pgr-shortcode/pgr-photo-gallery-filter.php' );
require_once( PGR_DIR . '/pgr-shortcode/pgr-photo-gallery-slider.php' );
require_once( PGR_DIR . '/pgr-shortcode/pgr-photo-album-grid.php' );
require_once( PGR_DIR . '/pgr-shortcode/pgr-photo-album-slider.php' );
// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( PGR_DIR . '/pgr-admin/pgr-how-to-help.php' );
}