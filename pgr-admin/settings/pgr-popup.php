<?php
/**
 * Image Data Popup
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>
<div class="pgr-img-data-wrp pgr-hide">
	<div class="pgr-img-data-cnt">
		<div class="pgr-img-cnt-block">
			<div class="pgr-popup-close pgr-popup-close-wrp"><img src="<?php echo PGR_URL; ?>assets/images/close.png" alt="<?php _e('Close (Esc)', 'wp-photo-gallery-with-responsive'); ?>" title="<?php _e('Close (Esc)', 'wp-photo-gallery-with-responsive'); ?>" /></div>
			<div class="pgr-popup-body-wrp">
			</div><!-- end .pgr-popup-body-wrp -->
			<div class="pgr-img-loader"><?php _e('Please Wait', 'wp-photo-gallery-with-responsive'); ?> <span class="spinner"></span></div>
		</div><!-- end .pgr-img-cnt-block -->
	</div><!-- end .pgr-img-data-cnt -->
</div><!-- end .pgr-img-data-wrp -->
<div class="pgr-popup-overlay"></div>