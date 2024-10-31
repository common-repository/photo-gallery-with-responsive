<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
global $post;
$prefix = PGR_META_PREFIX; // set Metabox prefix
$gallery_imgs 	= get_post_meta( $post->ID, $prefix.'gallery_imgs', true );
$no_img_cls		= !empty($gallery_imgs) ? 'pgr-hide' : '';
?>
<table class="form-table pgr-post-sett-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="pgr-gallery-imgs"><?php _e('Choose Gallery Images', 'wp-photo-gallery-with-responsive'); ?></label>
			</th>
			<td>
				<button type="button" class="button button-secondary pgr-img-uploader" id="pgr-gallery-imgs" data-multiple="true" data-button-text="<?php _e('Add to Gallery', 'wp-photo-gallery-with-responsive'); ?>" data-title="<?php _e('Add Images', 'wp-photo-gallery-with-responsive'); ?>"><i class="dashicons dashicons-format-gallery"></i> <?php _e('Add New Images', 'wp-photo-gallery-with-responsive'); ?></button>
				<button type="button" class="button button-secondary pgr-del-gallery-imgs"><i class="dashicons dashicons-trash"></i> <?php _e('Remove All Images', 'wp-photo-gallery-with-responsive'); ?></button><br/>
				<div class="pgr-gallery-imgs-prev pgr-imgs-preview pgr-gallery-imgs-wrp">
					<?php if( !empty($gallery_imgs) ) {
						foreach ($gallery_imgs as $img_key => $img_data) {
							$attachment_url 		= wp_get_attachment_thumb_url( $img_data );
							$attachment_edit_link	= get_edit_post_link( $img_data );
					?>
							<div class="pgr-img-outter">
								<div class="pgr-img-tools pgr-hide">
									<span class="pgr-tool-icon pgr-edit-img dashicons dashicons-edit" title="<?php _e('Edit Image in Popup', 'wp-photo-gallery-with-responsive'); ?>"></span>
									
									<span class="pgr-tool-icon pgr-del-tool pgr-del-img dashicons dashicons-no" title="<?php _e('Remove Image', 'wp-photo-gallery-with-responsive'); ?>"></span>
								</div>
								<img class="pgr-img" src="<?php echo $attachment_url; ?>" alt="" />
								<input type="hidden" class="pgr-attachment-no" name="pgr_img[]" value="<?php echo $img_data; ?>" />
							</div><!-- end .pgr-img-outter -->
					<?php }
					} ?>					
					<p class="pgr-img-placeholder <?php echo $no_img_cls; ?>"><?php _e('No Gallery Images', 'wp-photo-gallery-with-responsive'); ?></p>
				</div><!-- end .pgr-imgs-preview -->
				<span class="description"><?php _e('To Choose your multiple images for gallery. Hold Ctrl key to select multiple images at a Media.', 'wp-photo-gallery-with-responsive'); ?></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .pgr-post-sett-table -->