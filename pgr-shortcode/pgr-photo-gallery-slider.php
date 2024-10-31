<?php
/**
 * 'pgr_slider' Shortcode 
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
function pgr_gallery_slider( $atts, $content = null ) {          
	// Shortcode Parameter
	extract(shortcode_atts(array(
		'id'				=> array(),
		'cell' 		        => '3',
		'template' 			=> 'template-1',
		'link_target'		=> 'same-tab',
		'image_height'	    => '',
		'show_title'		=> 'true',
		'show_description'	=> 'false',
		'show_caption'		=> 'true',
		'image_size'		=> 'full',
		'popup'				=> 'true',
		'slidestoscroll' 	=> '1',
		'dots'     			=> 'true',
		'arrows'     		=> 'true',
		'autoplay'     		=> 'true',
		'autoplay_interval' => '3000',
		'speed'             => '500',
		), $atts));	
	$shortcode_template 	= pgr_templates();
	$post_ids			= !empty($id)						? explode(',', $id) 				: array();
	$template 			= ($template && (array_key_exists(trim($template), $shortcode_template))) ? trim($template) : 'template-1';
	$link_target 		= ($link_target == 'new-tab') 		? '_blank' 							: '_self';
	$image_height		= !empty($image_height)			? $image_height 					: '';
	$height_css			= !empty($image_height)			? "height:{$image_height}px;"		: '';
	$show_title			= ($show_title == 'true')			? 'true'							: 'false';
	$show_description	= ($show_description == 'true')		? 'true'							: 'false';
	$show_caption		= ($show_caption == 'false')		? 'false'							: 'true';
	$popup				= ($popup == 'false')				? 'false'							: 'true';
	$image_size 		= !empty($image_size)				? $image_size						: $image_size;
	$slidestoshow 		= !empty($cell) 			        ? $cell 						: 3;
	$slidestoscroll 	= !empty($slidestoscroll) 			? $slidestoscroll 						: 1;
	$dots 				= ( $dots == 'false' ) 				? 'false' 								: 'true';
	$arrows 			= ( $arrows == 'false' ) 			? 'false' 								: 'true';
	$autoplay 			= ( $autoplay == 'false' ) 			? 'false' 								: 'true';
	$autoplay_interval 	= (!empty($autoplay_interval)) 		? $autoplay_interval 					: 3000;
	$speed 				= (!empty($speed)) 					? $speed 								: 300;
	// If no id is passed then return content
	if( empty($post_ids) ) {
		return $content;
	}
	// if popup true Enqueue required script
	if( $popup == 'true' ) {
		wp_enqueue_script('wpoh-magnific-js');
	}
	wp_enqueue_script('wpoh-slick-js');
	wp_enqueue_script('pgr-custom-js');
	// Shortcode file
	$design_file_path 	= PGR_DIR . '/pgr-templates/template-1.php';
	$design_file 		= (file_exists($design_file_path)) ? $design_file_path : '';	
	// Taking some global
	global $post;
	// Taking some variables
	$prefix 				= PGR_META_PREFIX;
	$unique					= pgr_get_unique();
	$wrpper_cls				= 'pgr-slider-slide pgr-cnt-wrp';
	$popup_cls 				= ($popup == 'true') ? 'pgr-popup-gallery' : '';
	$offset_css				= '';
	$loop_count				= 1;
	// Slider configuration
	$slider_conf = compact('slidestoshow', 'slidestoscroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed');
	// WP Query Parameters
	$args = array (
		'post_type'     	 	=> PGR_POST_TYPE,
		'post_status' 			=> array( 'publish' ),
		'post__in'		 		=> $post_ids,
		'ignore_sticky_posts'	=> true,
	);
	// WP Query Parameters
	$query = new WP_Query($args);
	ob_start();
	// If post is there
	if ( $query->have_posts() ) { ?>
	<div class="pgr-gallery-slider-wrp">
		<div class="pgr-gallery pgr-gallery-outter pgr-gallery-slider pgr-clearfix pgr-<?php echo $template.' '.$popup_cls; ?>" id="pgr-gallery-<?php echo $unique; ?>">
		<?php while ( $query->have_posts() ) : $query->the_post();
				$gallery_imgs = get_post_meta( $post->ID, $prefix.'gallery_imgs', true );
				if( !empty($gallery_imgs) ) {
					foreach ($gallery_imgs as $img_key => $img_data) {						
						$gallery_post		= get_post( $img_data );
						$gallery_img_src 	= pgr_get_image_src( $img_data, $image_size );
						$image_alt_text		= get_post_meta( $img_data, '_wp_attachment_image_alt', true );
						if( $popup == 'true' ) {
							$image_link	= pgr_get_image_src( $img_data, 'full' );
						} else {
							$image_link = get_post_meta( $img_data, $prefix.'attachment_link', true );
						}
						// Include shortcode html file
						if( $gallery_post && $design_file && $gallery_img_src ) {
							include( $design_file );
							$loop_count++; // Increment loop count
						}
					} // End of for each
				}
		endwhile;
		?>
		</div>
		<div class="pgr-gallery-slider-conf pgr-hide"><?php echo htmlspecialchars(json_encode($slider_conf)); ?></div>
	</div>
	<?php }
	wp_reset_query(); // Reset WP Query
	$content .= ob_get_clean();
	return $content;
}
// 'pgr-gallery-slider' shortcode
add_shortcode('pgr_slider', 'pgr_gallery_slider');