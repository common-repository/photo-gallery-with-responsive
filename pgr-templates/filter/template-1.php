<?php
/**
 * portfolio filter template Design HTML
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>
<div class="<?php echo $wrpper_cls; ?>" data-category="<?php echo $pgr_query->post->ID; ?>">
	<div class="pgr-inner-wrap">
		<div class="pgr-img-outter" <?php if($height_css!="") { ?> style="<?php echo $height_css; ?>" <?php } ?>>
			<?php if($image_link) { ?>
			<a class="pgr-img-link" href="<?php echo $image_link; ?>">
				<img class="pgr-img" src="<?php echo $gallery_img_src ?>" title="<?php echo $gallery_post->post_title; ?>" alt="<?php echo $image_alt_text; ?>" /></a>
			<?php } else { ?>
				<img class="pgr-img" src="<?php echo $gallery_img_src ?>" title="<?php echo $gallery_post->post_title; ?>" alt="<?php echo $image_alt_text; ?>" />
			<?php } ?>
			<?php if( $show_caption == 'true' && $gallery_post->post_excerpt ) { ?>
			<div class="pgr-img-caption">
				<?php echo $gallery_post->post_excerpt; ?>
			</div>
			
			<?php } ?>
		</div><!-- end .pgr-img-outter -->
		<?php if( $show_description == 'true' && !empty($gallery_post->post_content) ) { ?>
		<div class="pgr-img-desc pgr-center"><?php echo wpautop($gallery_post->post_content); ?></div>
		<?php } ?>
	</div><!-- end .pgr-inner-wrap -->
</div><!-- end .pgr-columns -->