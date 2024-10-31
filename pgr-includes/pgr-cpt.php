<?php
/**
 * Register Post type functionality
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to register post type
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_register_post_type() {
	$pgr_post_lbls = apply_filters( 'pgr_post_labels', array(
								'name'                 	=> __('Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'singular_name'        	=> __('Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'add_new'              	=> __('Add Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'add_new_item'         	=> __('Add New Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'edit_item'            	=> __('Edit Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'new_item'             	=> __('New Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'view_item'            	=> __('View Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'search_items'         	=> __('Search Photo Gallery', 'wp-photo-gallery-with-responsive'),
								'not_found'            	=> __('No Photo Gallery Found', 'wp-photo-gallery-with-responsive'),
								'not_found_in_trash'   	=> __('No Photo Gallery Found in Trash', 'wp-photo-gallery-with-responsive'),
								'parent_item_colon'    	=> '',
								'featured_image'		=> __('For Album Image', 'wp-photo-gallery-with-responsive'),
								'set_featured_image'	=> __('Set Image', 'wp-photo-gallery-with-responsive'),
								'remove_featured_image'	=> __('Remove  Image', 'wp-photo-gallery-with-responsive'),
								'menu_name'           	=> __('Photo Gallery', 'wp-photo-gallery-with-responsive')
							));
	$pgr_slider_args = array(
		'labels'				=> $pgr_post_lbls,
		'public'              	=> false,
		'show_ui'             	=> true,
		'query_var'           	=> false,
		'rewrite'             	=> false,
		'capability_type'     	=> 'post',
		'hierarchical'        	=> false,
		'menu_icon'				=> 'dashicons-format-gallery',
		'supports'            	=> apply_filters('pgr_post_supports', array('title', 'editor', 'thumbnail')),
	);
	// Register slick slider post type
	register_post_type( PGR_POST_TYPE, apply_filters( 'pgr_registered_post_type_args', $pgr_slider_args ) );
}
// Action to register plugin post type
add_action('init', 'pgr_register_post_type');
/**
 * Function to register taxonomy
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_register_taxonomies() {
	$pgr_cat_lbls = apply_filters('pgr_cat_labels', array(
		'name'              => __( 'Category', 'wp-photo-gallery-with-responsive' ),
		'singular_name'     => __( 'Category', 'wp-photo-gallery-with-responsive' ),
		'search_items'      => __( 'Search Category', 'wp-photo-gallery-with-responsive' ),
		'all_items'         => __( 'All Category', 'wp-photo-gallery-with-responsive' ),
		'parent_item'       => __( 'Parent Category', 'wp-photo-gallery-with-responsive' ),
		'parent_item_colon' => __( 'Parent Category:', 'wp-photo-gallery-with-responsive' ),
		'edit_item'         => __( 'Edit Category', 'wp-photo-gallery-with-responsive' ),
		'update_item'       => __( 'Update Category', 'wp-photo-gallery-with-responsive' ),
		'add_new_item'      => __( 'Add New Category', 'wp-photo-gallery-with-responsive' ),
		'new_item_name'     => __( 'New Category Name', 'wp-photo-gallery-with-responsive' ),
		'menu_name'         => __( 'Category', 'wp-photo-gallery-with-responsive' ),
	));
    $pgr_cat_args = array(
    	'public'			=> false,
        'hierarchical'      => true,
        'labels'            => $pgr_cat_lbls,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false,
    );    
    // Register slick slider category
    register_taxonomy( PGR_CAT, array( PGR_POST_TYPE ), apply_filters('pgr_registered_cat_args', $pgr_cat_args) );
}
// Action to register plugin taxonomies
add_action( 'init', 'pgr_register_taxonomies');
/**
 * Function to update post message for photo gallery
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_post_updated_messages( $messages ) {	
	global $post, $post_ID;	
	$messages[PGR_POST_TYPE] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'Photo Gallery updated.', 'wp-photo-gallery-with-responsive' ) ),
		2 => __( 'Custom field updated.', 'wp-photo-gallery-with-responsive' ),
		3 => __( 'Custom field deleted.', 'wp-photo-gallery-with-responsive' ),
		4 => __( 'Photo Gallery updated.', 'wp-photo-gallery-with-responsive' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Photo Gallery restored to revision from %s', 'wp-photo-gallery-with-responsive' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Photo Gallery published.', 'wp-photo-gallery-with-responsive' ) ),
		7 => __( 'Photo Gallery saved.', 'wp-photo-gallery-with-responsive' ),
		8 => sprintf( __( 'Photo Gallery submitted.', 'wp-photo-gallery-with-responsive' ) ),
		9 => sprintf( __( 'Photo Gallery scheduled for: <strong>%1$s</strong>.', 'wp-photo-gallery-with-responsive' ),
		  date_i18n( __( 'M j, Y @ G:i', 'wp-photo-gallery-with-responsive' ), strtotime( $post->post_date ) ) ),
		10 => sprintf( __( 'Photo Gallery draft updated.', 'wp-photo-gallery-with-responsive' ) ),
	);	
	return $messages;
}
// Filter to update slider post message
add_filter( 'post_updated_messages', 'pgr_post_updated_messages' );