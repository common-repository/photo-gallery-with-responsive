<?php
/**
 * for Album template Design HTML
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>
<div class="<?php echo $wrpper_cls; ?>">
	<div class="pgr-inner-wrap">
		<div class="pgr-img-outter" style="<?php echo $album_height_css; ?>">
			<a class="pgr-img-link" href="<?php echo $album_image; ?>" target="<?php echo $album_link_target; ?>">
				<?php if($image_link) { ?>
				<img class="pgr-img" src="<?php echo $image_link; ?>"  />
				<?php } ?>
			</a>
		</div><!-- end .pgr-img-outter -->
		<?php if( !empty($total_photo_lbl) ) { ?>
		<div class="pgr-img-count pgr-center"><?php echo $total_photo_lbl; ?></div>
		<?php } ?>
		<?php if( $album_description == 'true' ) {
			  
				if( $album_full_content == 'true' ) { ?>
					<div class="pgr-img-desc pgr-center"><?php echo pgr_get_post_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?></div>
		<?php } else { ?>
					<div class="pgr-img-desc pgr-center"><?php echo pgr_get_post_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?></div>
		<?php } } ?>
	</div><!-- end .pgr-inner-wrap -->
</div><!-- end .pgr-columns -->