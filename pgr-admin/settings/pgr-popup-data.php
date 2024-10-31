<?php
/**
 * Popup Image Data HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$prefix = PGR_META_PREFIX;
// Taking some values
$alt_text 			= get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
$pgr_attachment_link 	= get_post_meta( $attachment_id, $prefix.'pgr_attachment_link', true );
?>
<div class="pgr-popup-title"><?php _e('Edit Image', 'wp-photo-gallery-with-responsive'); ?></div>
<div class="pgr-popup-body">
	<form method="post" class="pgr-attachment-form">
		<?php if( !empty($attachment_post->guid) ) { ?>
		<div class="pgr-popup-img-preview">
			<img src="<?php echo $attachment_post->guid; ?>" alt="" />
		</div>
		<?php } ?>
		<a href="<?php echo get_edit_post_link( $attachment_id ); ?>" target="_blank" class="button right"><i class="dashicons dashicons-edit"></i> <?php _e('Edit Image From Attachment Page', 'wp-photo-gallery-with-responsive'); ?></a>
		<table class="form-table">
			<tr>
				<th><label for="pgr-attachment-title"><?php _e('Title', 'wp-photo-gallery-with-responsive'); ?>:</label></th>
				<td>
					<input type="text" name="pgr_attachment_title" value="<?php echo pgr_esc_attr($attachment_post->post_title); ?>" class="large-text pgr-attachment-title" id="pgr-attachment-title" />
					<span class="description"><?php _e('Enter image title.', 'wp-photo-gallery-with-responsive'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="pgr-attachment-alt-text"><?php _e('Alternative Text', 'wp-photo-gallery-with-responsive'); ?>:</label></th>
				<td>
					<input type="text" name="pgr_attachment_alt" value="<?php echo pgr_esc_attr($alt_text); ?>" class="large-text pgr-attachment-alt-text" id="pgr-attachment-alt-text" />
					<span class="description"><?php _e('Enter image alternative text.', 'wp-photo-gallery-with-responsive'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="pgr-attachment-caption"><?php _e('Caption', 'wp-photo-gallery-with-responsive'); ?>:</label></th>
				<td>
					<textarea name="pgr_attachment_caption" class="large-text pgr-attachment-caption" id="pgr-attachment-caption"><?php echo pgr_esc_attr($attachment_post->post_excerpt); ?></textarea>
					<span class="description"><?php _e('Enter image caption.', 'wp-photo-gallery-with-responsive'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="pgr-attachment-desc"><?php _e('Description', 'wp-photo-gallery-with-responsive'); ?>:</label></th>
				<td>
					<textarea name="pgr_attachment_desc" class="large-text pgr-attachment-desc" id="pgr-attachment-desc"><?php echo pgr_esc_attr($attachment_post->post_content); ?></textarea>
					<span class="description"><?php _e('Enter image description.', 'wp-photo-gallery-with-responsive'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="pgr-attachment-link"><?php _e('Image Link', 'wp-photo-gallery-with-responsive'); ?>:</label></th>
				<td>
					
					<input type="text" name="pgr_attachment_link" value="<?php echo esc_url($pgr_attachment_link); ?>" class="large-text pgr-attachment-link" id="pgr-attachment-link" />
					<span class="description"><?php _e('Enter image link. e.g http://google.com', 'wp-photo-gallery-with-responsive'); ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<div class="pgr-success pgr-hide"></div>
					<div class="pgr-error pgr-hide"></div>
					<span class="spinner pgr-spinner"></span>
					<button type="button" class="button button-primary pgr-save-attachment-data" data-id="<?php echo $attachment_id; ?>"><i class="dashicons dashicons-yes"></i> <?php _e('Save', 'wp-photo-gallery-with-responsive'); ?></button>
					<button type="button" class="button pgr-popup-close"><?php _e('Close', 'wp-photo-gallery-with-responsive'); ?></button>
				</td>
			</tr>
		</table>
	</form><!-- end .pgr-attachment-form -->
</div><!-- end .pgr-popup-body -->