<?php
/**
 * 'pgr-gallery-album' Shortcode
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
function pgr_gallery_album( $atts, $content = null ) {
	// Shortcode Parameter
	extract(shortcode_atts(array(
	    'template'			=> 'template-1',		
		'album_cell'    	=> '3',
		'album_link_target'	=> 'same-tab',
		'album_height'		=> '',
		'album_title'		=> 'true',
		'album_description'	=> 'true',
		'album_full_content'=> 'true',
		'order'				=> 'DESC',
		'orderby'			=> 'date',
		'words_limit' 		=> 100,
		'content_tail' 		=> '!!!',		
		'limit'				=> -1,
		'category' 			=> '',
		'total_photo'		=> '{total}'.' '.__('Photos','wp-photo-gallery-with-responsive'),		
		'id'				=> array(),
		'image_cell'				=> '3',
		'template'			=> 'template-1',
		'link_target'		=> 'same-tab',
		'image_height'	=> '',
		'show_title'		=> 'true',
		'show_description'	=> 'true',
		'show_caption'		=> 'true',		
		'image_size'		=> 'full',
		'popup'				=> 'true',
	), $atts));	
	$templates 	        = pgr_templates();
	$content_tail 		= html_entity_decode($content_tail);
	$limit 				= !empty($limit) 					? $limit 					    		: 15;
	$post_ids			= !empty($id)						? explode(',', $id)	    	: array();
	$album_image_cell 		= (!empty($album_cell) && $album_cell <= 12) 	? $album_cell 			: '3';
	$template 	= ($template && (array_key_exists(trim($template), $templates))) ? trim($template)  : 'template-1';
	$album_link_target 	= ($album_link_target == 'new-tab') 	? '_blank' 							: '_self';
	$album_title		= ($album_title == 'true')			? 'true'							    : 'false';
	$album_description	= ($album_description == 'true')	? 'true'							    : 'false';
	$album_full_content	= ($album_full_content == 'true')	? 'true'							    : 'false';
	$category 			= (!empty($category))				? explode(',',$category) 			    : '';
	$album_height		= !empty($album_height)				? $album_height 					    : '';
	$album_height_css	= !empty($album_height)				? "height:{$album_height}px;"		    : '';
	$total_photo 		= !empty($total_photo) 				? $total_photo						    : '';
	$image_cell       	= !empty($image_cell)				? $image_cell 							: '';
	$order 				= ( strtolower($order) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$orderby			= !empty($orderby) 					? $orderby 						: 'date';
	// Taking some global
	global $post, $pgr_image_render;	
	// If album id passed and it is empty then return
	if( isset($_GET['album']) && (empty($_GET['album']) || !empty($pgr_image_render)) ) {
		return $content;
	} elseif ( isset($_GET['album']) && !empty($_GET['album']) ) {
		$post_ids = $_GET['album'];
	}	
	// Shortcode file
	$template_file_path 	= PGR_DIR . '/pgr-templates/album/template-1.php';
	$template_file 		= (file_exists($template_file_path)) ? $template_file_path : '';	
	// Taking some variables
	$prefix 			= PGR_META_PREFIX;
	$unique				= pgr_get_unique();
	$album_page 		= get_permalink();
	$loop_count			= 1;
	$main_cls 			= "pgr-cnt-wrp pgr-col-{$album_cell} pgr-columns";
	// If album id is not passed then take all albums else album images
	if( empty($_GET['album']) ) {
		// WP Query Parameters
		$args = array (
			'post_type'     	 	=> PGR_POST_TYPE,
			'post_status' 			=> array( 'publish' ),
			'post__in'		 		=> $post_ids,
			'ignore_sticky_posts'	=> true,
			'posts_per_page'		=> $limit,
			'order'					=> $order,
			'orderby'				=> $orderby,
		);
		// Meta Query
		$args['meta_query'] = array(
								array(
									'key'     => $prefix.'gallery_imgs',
									'value'   => '',
									'compare' => '!=',
								));
		// Category Parameter
		if( !empty($category) ) {
			$args['tax_query'] = array(
									array( 
										'taxonomy' 			=> PGR_CAT,
										'field' 			=> 'term_id',
										'terms' 			=> $category,
								));
		}
		// WP Query Parameters
		$pgr_query = new WP_Query($args);
	}
	ob_start();
	// If post is there
	if ( empty($_GET['album']) && $pgr_query->have_posts() ) { ?>		
		<div class="pgr-gallery-album-outter pgr-gallery-album pgr-div-clear" id="pgr-gallery-<?php echo $unique; ?>">
		<?php while ( $pgr_query->have_posts() ) : $pgr_query->the_post();				
				$wrpper_cls			= ($loop_count == 1) ? $main_cls.' pgr-first' : $main_cls;
				$album_image 		= add_query_arg( array('album' => $post->ID), $album_page );
				$image_link			= pgr_get_image_src( get_post_thumbnail_id($post->ID), 'full', true );
				$total_photo_no		= get_post_meta($post->ID, $prefix.'gallery_imgs', true);
				$total_photo_no 	= !empty($total_photo_no) ? count($total_photo_no) : '';
				$total_photo_lbl	= str_replace('{total}', $total_photo_no, $total_photo);				
				// Include shortcode html file
				if( $template_file ) {
					include( $template_file );
				}				
				$loop_count++; // Increment loop count				
				// Reset loop count
				if( $loop_count == $album_cell ) {
					$loop_count = 0;
				}
		endwhile;
		?>
		</div><!-- end .pgr-gallery-album-outter -->
	<?php
		wp_reset_query(); // Reset WP Query
	} elseif( !empty($_GET['album']) ) { // If album id is passed			
			// If there are two shortcodes so display for first only
			$pgr_image_render = true;			
			echo "<div class='pgr-breadcrumb-wrp'><a class='pgr-breadcrumb' href='{$album_page}'>".__('Main Album', 'wp-photo-gallery-with-responsive')."</a> &raquo; ".get_the_title($post_ids)."</div>";			
			echo do_shortcode( '[pgr_grid id="'.$post_ids.'" cell="'.$image_cell.'" image_height="'.$image_height.'" show_title="'.$show_title.'" show_description="'.$show_description.'" popup="'.$popup.'" link_target="'.$link_target.'" template="'.$template.'" image_size="'.$image_size.'"]' );
	} // end else	
	$content .= ob_get_clean();
	return $content;
}
// 'pgr-gallery-album' shortcode
add_shortcode('pgr_album_grid', 'pgr_gallery_album');