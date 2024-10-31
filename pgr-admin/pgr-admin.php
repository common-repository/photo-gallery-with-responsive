<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
class Pgr_Admin {
	function __construct() {
		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'pgr_post_metabox') );
		// Action to save metabox
		add_action( 'save_post', array($this, 'pgr_save_metabox_value') );
		// Filter to add extra column in gallery `category` table
		add_filter( 'manage_edit-'.PGR_CAT.'_columns', array($this, 'pgr_manage_category_columns') );
		add_filter( 'manage_'.PGR_CAT.'_custom_column', array($this, 'pgr_category_data'), 10, 3 );
		// Action to add custom column to Gallery listing
		add_filter( 'manage_'.PGR_POST_TYPE.'_posts_columns', array($this, 'pgr_posts_columns') );
		// Action to add custom column data to Gallery listing
		add_action('manage_'.PGR_POST_TYPE.'_posts_custom_column', array($this, 'pgr_post_columns_data'), 10, 2);
		// Filter to add row data
		add_filter( 'post_row_actions', array($this, 'pgr_add_post_row_data'), 10, 2 );
		// Action to add Attachment Popup HTML
		add_action( 'admin_footer', array($this,'pgr_image_update_popup_html') );
		// Ajax call to update option
		add_action( 'wp_ajax_pgr_get_attachment_edit_form', array($this, 'pgr_get_attachment_edit_form'));
		add_action( 'wp_ajax_nopriv_pgr_get_attachment_edit_form',array( $this, 'pgr_get_attachment_edit_form'));
		// Ajax call to update attachment data
		add_action( 'wp_ajax_pgr_save_attachment_data', array($this, 'pgr_save_attachment_data'));
		add_action( 'wp_ajax_nopriv_pgr_save_attachment_data',array( $this, 'pgr_save_attachment_data'));
	}
	/**
	 * Post Settings Metabox
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_post_metabox() {
		add_meta_box( 'pgr-post-sett', __( 'Photo Gallery - Settings', 'wp-photo-gallery-with-responsive' ), array($this, 'pgr_post_sett_mb_content'), PGR_POST_TYPE, 'normal', 'high' );
	}
	/**
	 * Post Settings Metabox HTML
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_post_sett_mb_content() {		
		include_once( PGR_DIR .'/pgr-admin/metabox/pgr-metabox.php');
	}
	/**
	 * Function to save metabox values
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_save_metabox_value( $post_id ) {
		global $post_type;		
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( $post_type !=  PGR_POST_TYPE ) )              					// Check if current post type is supported.
		{
		  return $post_id;
		}		
		$prefix = PGR_META_PREFIX; // Taking metabox prefix		
		// Taking variables
		$gallery_imgs = isset($_POST['pgr_img']) ? pgr_slashes_deep($_POST['pgr_img']) : '';		
		update_post_meta($post_id, $prefix.'gallery_imgs', $gallery_imgs);
	}	
	/**
	 * Add extra column to news category
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_manage_category_columns($columns) {
		$new_columns['pgr_shortcode'] = __( 'Category Shortcode', 'wp-photo-gallery-with-responsive' );
		$columns = pgr_add_array( $columns, $new_columns, 2 );
		return $columns;
	}
	/**
	 * Add data to extra column to news category
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_category_data($ouput, $column_name, $tax_id) {		
		if( $column_name == 'pgr_shortcode' ) {
			$ouput .= '[pgr_album_grid category="' . $tax_id. '"]<br/>';
			$ouput .= '[pgr_album_slider category="' . $tax_id. '"]';
	    }		
	    return $ouput;
	}
	/**
	 * Add custom column to Post listing page
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_posts_columns( $columns ) {
	    $new_columns['pgr_shortcode'] 	= __('Shortcode', 'wp-photo-gallery-with-responsive');
	    $new_columns['pgr_photos'] 		= __('Number of Photos', 'wp-photo-gallery-with-responsive');
	    $columns = pgr_add_array( $columns, $new_columns, 1, true );
	    return $columns;
	}
	/**
	 * Add custom column data to Post listing page
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_post_columns_data( $column, $post_id ) {
		global $post;
		// Taking some variables
		$prefix = PGR_META_PREFIX;
	    switch ($column) {
	    	case 'pgr_shortcode':	    		
	    		echo '<div class="pgr-shortcode-preview">[pgr_grid id="'.$post_id.'"]</div> <br/>';
	    		echo '<div class="pgr-shortcode-preview">[pgr_slider id="'.$post_id.'"]</div>';
	    		break;
	    	case 'pgr_photos':
	    		$total_photos = get_post_meta($post_id, $prefix.'gallery_imgs', true);
	    		echo !empty($total_photos) ? count($total_photos) : '--';
	    		break;
		}
	}
	/**
	 * Function to add custom quick links at post listing page
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_add_post_row_data( $actions, $post ) {
		
		if( $post->post_type == PGR_POST_TYPE ) {
			return array_merge( array( 'pgr_id' => 'ID: ' . $post->ID ), $actions );
		}		
		return $actions;
	}
	/**
	 * Image data popup HTML
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_image_update_popup_html() {
		global $typenow;
		if( $typenow == PGR_POST_TYPE ) {
			include_once( PGR_DIR .'/pgr-admin/settings/pgr-popup.php');
		}
	}
	/**
	 * Get attachment edit form
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_get_attachment_edit_form() {
		// Taking some defaults
		$result 			= array();
		$result['success'] 	= 0;
		$result['msg'] 		= __('Sorry, Something happened wrong.', 'wp-photo-gallery-with-responsive');
		$attachment_id 		= !empty($_POST['attachment_id']) ? trim($_POST['attachment_id']) : '';
		if( !empty($attachment_id) ) {
			$attachment_post = get_post( $_POST['attachment_id'] );
			if( !empty($attachment_post) ) {				
				ob_start();
				// Popup Data File
				include( PGR_DIR . '/pgr-admin/settings/pgr-popup-data.php' );
				$attachment_data = ob_get_clean();
				$result['success'] 	= 1;
				$result['msg'] 		= __('Attachment Found.', 'wp-photo-gallery-with-responsive');
				$result['data']		= $attachment_data;
			}
		}
		echo json_encode($result);
		exit;
	}
	/**
	 * Get attachment edit form
	 * 
	 * @package photo gallery with responsive
	 * @since 1.0.0
	 */
	function pgr_save_attachment_data() {
		$prefix 			= PGR_META_PREFIX;
		$result 			= array();
		$result['success'] 	= 0;
		$result['msg'] 		= __('Sorry, Something happened wrong.', 'wp-photo-gallery-with-responsive');
		$attachment_id 		= !empty($_POST['attachment_id']) ? trim($_POST['attachment_id']) : '';
		$form_data 			= parse_str($_POST['form_data'], $form_data_arr);
		if( !empty($attachment_id) && !empty($form_data_arr) ) {
			// Getting attachment post
			$pgr_attachment_post = get_post( $attachment_id );
			// If post type is attachment
			if( isset($pgr_attachment_post->post_type) && $pgr_attachment_post->post_type == 'attachment' ) {
				$post_args = array(
									'ID'			=> $attachment_id,
									'post_title'	=> !empty($form_data_arr['pgr_attachment_title']) ? $form_data_arr['pgr_attachment_title'] : $pgr_attachment_post->post_name,
									'post_content'	=> $form_data_arr['pgr_attachment_desc'],
									'post_excerpt'	=> $form_data_arr['pgr_attachment_caption'],
								);
				$update = wp_update_post( $post_args, $wp_error );
				if( !is_wp_error( $update ) ) {
					update_post_meta( $attachment_id, '_wp_attachment_image_alt', pgr_slashes_deep($form_data_arr['pgr_attachment_alt']) );
					update_post_meta( $attachment_id, $prefix.'pgr_attachment_link', pgr_slashes_deep($form_data_arr['pgr_attachment_link']) );
					$result['success'] 	= 1;
					$result['msg'] 		= __('Your changes saved successfully.', 'wp-photo-gallery-with-responsive');
				}
			}
		}
		echo json_encode($result);
		exit;
	}
}
$pgr_admin = new Pgr_Admin();