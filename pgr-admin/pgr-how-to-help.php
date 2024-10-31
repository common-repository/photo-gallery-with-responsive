<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if (!defined('ABSPATH'))
	exit;
// Action to add menu
add_action('admin_menu', 'pgr_register_design_page');
/**
 * Register plugin design page in admin menu
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_register_design_page() {
	add_submenu_page('edit.php?post_type=' . PGR_POST_TYPE, __('works & Use, our plugins and offers', 'wp-photo-gallery-with-responsive'), __('Works & Use', 'wp-photo-gallery-with-responsive'), 'manage_options', 'pgr-designs', 'pgr_designs_page');
}
/**
 * Function to display plugin design HTML
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_designs_page() {
	$wpoh_feed_tabs = pgr_help_tabs();
	$active_tab = isset($_GET['tab']) ? pgr_sanitize_clean($_GET['tab']) : 'how-it-work';
	?>
	<div class="wrap pgr-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpoh_feed_tabs as $tab_key => $tab_val) {
				$tab_name = $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link = add_query_arg(array('post_type' => PGR_POST_TYPE, 'page' => 'pgr-designs', 'tab' => $tab_key), admin_url('edit.php'));
				?>
				<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
				<?php } ?>
			</h2>
			<div class="pgr-tab-cnt-wrp">
				<?php
				if (isset($active_tab) && $active_tab == 'how-it-work') {
					pgr_helpwork_page();
				} else if (isset($active_tab) && $active_tab == 'pgr-grid-shortcode-generator') {
					pgr_grid_generator();
				} else if (isset($active_tab) && $active_tab == 'pgr-slider-shortcode-generator') {
					pgr_slider_generator(); 
				} else if (isset($active_tab) && $active_tab == 'pgr-album-grid-sg') {
					pgr_album_grid_sg();
				}else if (isset($active_tab) && $active_tab == 'pgr-album-slider-sg') {
					pgr_album_slider_sg();
				}else if (isset($active_tab) && $active_tab == 'pgr-portfolio-sg') {
					pgr_portfolio_sg();
				}
				else if (isset($active_tab) && $active_tab == 'hire-wpexpert') {
					echo  pgr_hire_wp_experts('hire-wpexpert');
				}
				?>
			</div><!-- end .pgr-tab-cnt-wrp -->
		</div><!-- end .pgr-wrap -->
		<?php
	}
/**
 * Function to get plugin feed tabs
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_help_tabs() {
	$wpoh_feed_tabs = array(
		'how-it-work' => array(
			'name' => __('How It Works', 'wp-photo-gallery-with-responsive'),
		),
		'pgr-grid-shortcode-generator' => array(
			'name' => __('Grid Shortcode Generator', 'wp-photo-gallery-with-responsive'),
			'url' => '#',
			'transient_key' => 'wpoh_plugins_feed',
			'transient_time' => 172800
		),
		'pgr-slider-shortcode-generator' => array(
			'name' => __('Slider Shortcode Generator', 'wp-photo-gallery-with-responsive'),
			'url' => '#',
			'transient_key' => 'wpoh_plugins_feed', 
			'transient_time' => 172800
		),
		'pgr-album-grid-sg' => array(
			'name' => __('Album Grid Shortcode Generator', 'wp-photo-gallery-with-responsive'),
			'url' => '#',
			'transient_key' => 'wpoh_plugins_feed',
			'transient_time' => 172800
		),
		'pgr-album-slider-sg' => array(
			'name' => __('Album Slider Shortcode Generator', 'wp-photo-gallery-with-responsive'),
			'url' => '#',
			'transient_key' => 'wpoh_plugins_feed',
			'transient_time' => 172800
		),
		'pgr-portfolio-sg' => array(
			'name' => __('Image Portfolio Shortcode Generator', 'wp-photo-gallery-with-responsive'),
			'url' => '#',
			'transient_key' => 'wpoh_plugins_feed',
			'transient_time' => 172800
		),
		'hire-wpexpert' 	=> array(
													'name'				=> __('For WordPress Help ', 'wp-responsive-testimonials-slider'),
													'url'				=> 'https://wponlinehelp.com/wordpress-help/help-offers.php',
													'offer_key'		=> 'wpoh_offers_feed',
													'offer_time'	=> 98400,
												)
	);
	return $wpoh_feed_tabs;
}
/**
 * Function to get 'How It Works' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_helpwork_page() {
	?>
	<style type="text/css">
	.wpoh-pro-box .hndle{background-color:#0073AA; color:#fff;}
	.wpoh-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
	.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
	.pgr-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
	.pgr-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
</style>
<div class="post-box-container">
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<h3 class="hndle">
								<span><?php _e('How It Works', 'wp-photo-gallery-with-responsive'); ?></span>
							</h3>
							<div class="inside">
								<table class="form-table">
									<tbody>
										<tr>
											<th>
												<label><?php _e('Getting Started with Album Gallery', 'wp-photo-gallery-with-responsive'); ?>:</label>
											</th>
											<td>
												<ul>
													<li><?php _e('Step-1. Go to "Photo Gallery --> Add Photo Gallery tab".', 'wp-photo-gallery-with-responsive'); ?></li>
													<li><?php _e('Step-2. Add Photo Title, Description and Images under Photo Gallery with Responsive - Settings.', 'wp-photo-gallery-with-responsive'); ?></li>
													<li><?php _e('Step-3. Under "Choose Gallery Images" click on "Gallery Images" button and select multiple images from WordPress media and click on "Add to Gallery" button.', 'wp-photo-gallery-with-responsive'); ?></li>
													<li><?php _e('Step-4. You can find out shortcode for album under "Photo Gallery" list view.', 'wp-photo-gallery-with-responsive'); ?></li>
												</ul>
											</td>
										</tr>
										<tr>
											<th>
												<label><?php _e('How Shortcode Works', 'wp-photo-gallery-with-responsive'); ?>:</label>
											</th>
											<td>
												<ul>
												  <li><?php _e('Step-1. Create a page like Image OR My Gallery.', 'wp-photo-gallery-with-responsive'); ?></li>
												 <li><?php _e('Step-2. Paste below shortcode as per your need.', 'wp-photo-gallery-with-responsive'); ?></li>
												</ul>
											</td>
										</tr>
										<tr>
											<th>
												<label><?php _e('All Shortcodes', 'wp-photo-gallery-with-responsive'); ?>:</label>
											</th>
											<td>
												<span class="pgr-shortcode-preview">[pgr_grid]</span> – <?php _e('Image Grid Shortcode', 'wp-photo-gallery-with-responsive'); ?> <br />
												<span class="pgr-shortcode-preview">[pgr_slider]</span> – <?php _e('Image Slider Shortcode', 'wp-photo-gallery-with-responsive'); ?> <br />
												<span class="pgr-shortcode-preview">[pgr_album_grid]</span> – <?php _e('Image Grid for Album  Shortcode', 'wp-photo-gallery-with-responsive'); ?> <br />
												<span class="pgr-shortcode-preview">[pgr_album_slider]</span> – <?php _e('Image Slider for Album Shortcode', 'wp-photo-gallery-with-responsive'); ?> <br />
												<span class="pgr-shortcode-preview">[pgr_portfolio]</span> – <?php _e('Image Portfolio Shortcode', 'wp-photo-gallery-with-responsive'); ?>
											</td>
										</tr>
											<tr>
												<th>
													<label><?php _e('Need Any Help?', 'wp-photo-gallery-with-responsive'); ?></label>
												</th>
												<td>							
													<a  href="mailto:help@wponlinehelp.com">help@wponlinehelp.com</a><br/> <br/>
													<a class="button button-primary" href="http://demo.wponlinehelp.com/photo-gallery-with-responsive/" target="_blank"><?php _e('Live Demo', 'wp-photo-gallery-with-responsive'); ?></a>
													<a class="button button-primary" href="http://docs.wponlinehelp.com/docs-project/photo-gallery-with-responsive/" target="_blank"><?php _e('Documentation', 'wp-photo-gallery-with-responsive'); ?></a>
												</td>
											</tr>
									</tbody>
								</table>
							</div><!-- .inside -->
						</div><!-- #general -->
					</div><!-- .meta-box-sortables ui-sortable -->
				</div><!-- .metabox-holder -->
			</div><!-- #post-body-content -->
			<!--Upgrad to Pro HTML -->
		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div><!-- #post-box-container -->
<?php
}
/**
 * Function to get 'Shortcode Generator' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_grid_generator() {
	?>
<style type="text/css">
	 .shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.pgr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.pgr_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Photo Grid Shortcode :-', 'wp-photo-gallery-with-responsive') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
								<form id="shortcode_generator" style="padding:20px;" class="pgr_shortcode_generator">										
										<p>
											<label for="select_gallery">
												<?php _e('1) Select Gallery:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php global $post;
												$args = array("post_type"=>PGR_POST_TYPE, "post_status"=> "publish");
												  	   $query = new WP_Query($args);   						
												 ?>
												<select id="select_gallery" name="select_gallery" onchange="pgr_grid()">
												   
													<?php while ( $query->have_posts() ) : $query->the_post();?>
														<option value="<?php echo $post->ID; ?>">
															<?php the_title();  ?>
														</option>													
													<?php endwhile; ?>
												</select>
												<span class="howto"> Please select Gallery.</span>												
											</p>
											<p><label for="pgr_grids"><?php _e('2) Select Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_grids" name="pgr_grids"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								       <p><label for="pgr_grid_design"><?php _e('3) Select Template:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_templates();  ?>
								 	      <select id="pgr_grid_design" name="pgr_grid_design"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								   <p><label for="pgr_grid_design"><?php _e('4) Click Target:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_linktarget" name="pgr_grid_linktarget"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								   <p><label for="pgr_grid_hight"><?php _e('5) Set Image Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_hight" name="pgr_grid_hight" type="text" value=" "
										      onchange="pgr_grid()">
										      <span class="howto"> <?php _e('Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									  <p><label for="pgr_grid_design"><?php _e('6) Display Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_title" name="pgr_grid_show_title"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p> 
								   <p><label for="pgr_grid_design"><?php _e('7) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_desc" name="pgr_grid_show_desc"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								  
								   <p><label for="pgr_grid_show_caption"><?php _e('8) Display Caption:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_caption" name="pgr_grid_show_caption"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_img_size"><?php _e('9) Set Image Size:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_img_size();  ?>
								 	      <select id="pgr_grid_img_size" name="pgr_grid_img_size"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_popup"><?php _e('10) Set Lightbox Popup:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_popup" name="pgr_grid_popup"
								 	         onchange="pgr_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-photo-gallery-with-responsive'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Photo Gallery in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'wp-photo-gallery-with-responsive'); ?> </p>
									<div id="pgr-grid-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php  echo do_shortcode(<span id="pgr-grid_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php 
/**
 * Function to get 'Shortcode Generator' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_slider_generator() {
	?>
<style type="text/css">
	 .shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.pgr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.pgr_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Photo Grid Shortcode :-', 'wp-photo-gallery-with-responsive') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
								<form id="shortcode_generator" style="padding:20px;" class="pgr_shortcode_generator">										
										<p>
											<label for="select_gallery">
												<?php _e('1) Select Gallery:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php global $post;
												$args = array("post_type"=>PGR_POST_TYPE, "post_status"=> "publish");
												  	   $query = new WP_Query($args);   						
												 ?>
												<select id="select_gallery" name="select_gallery" onchange="pgr_slider()">												   
													<?php while ( $query->have_posts() ) : $query->the_post();?>
														<option value="<?php echo $post->ID; ?>">
															<?php the_title();  ?>
														</option>													
													<?php endwhile; ?>
												</select>
												<span class="howto"> Please select Gallery.</span>												
											</p>
											<p><label for="pgr_grids"><?php _e('2) Select Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_grids" name="pgr_grids"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								       <p><label for="pgr_grid_design"><?php _e('3) Select Template:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_templates();  ?>
								 	      <select id="pgr_grid_design" name="pgr_grid_design"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								   <p><label for="pgr_grid_design"><?php _e('4) Click Target:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_linktarget" name="pgr_grid_linktarget"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"> <strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								   <p><label for="pgr_grid_hight"><?php _e('5)  Set Image Height::', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_hight" name="pgr_grid_hight" type="text" value=" "
										      onchange="pgr_slider()">
										      <span class="howto"> <?php _e(' Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									  <p><label for="pgr_grid_design"><?php _e('6) Display Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_title" name="pgr_grid_show_title"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p> 
								   <p><label for="pgr_grid_design"><?php _e('7) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_desc" name="pgr_grid_show_desc"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_grid_show_caption"><?php _e('8) Display Caption:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_caption" name="pgr_grid_show_caption"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_img_size"><?php _e('9) Set Image Size:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_img_size();  ?>
								 	      <select id="pgr_grid_img_size" name="pgr_grid_img_size"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_popup"><?php _e('10) Set Lightbox Popup:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_popup" name="pgr_grid_popup"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_slide_scroll"><?php _e('11) Slide to Scroll:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_scroll" name="pgr_slide_scroll" type="text" value="1"
										      onchange="pgr_slider()">
										      <span class="howto"> <?php _e('Number of Images to slide at same time.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_slider_dots"><?php _e('12) Display Pagination Bullets(Dots):', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_dots" name="pgr_slider_dots"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								     <p><label for="pgr_slider_arrows"><?php _e('13) Display Arrows:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_arrows" name="pgr_slider_arrows"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_slider_autoplay"><?php _e('14) Set Slide Autoplay:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_autoplay" name="pgr_slider_autoplay"
								 	         onchange="pgr_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto">Set Slider to Slide Automatically.</span>									
								   </p>
								   <p><label for="pgr_slide_autoplay_interval"><?php _e('15) Set Autoplay Interval:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_autoplay_interval" name="pgr_slide_autoplay_interval" type="text" value="3000"
										      onchange="pgr_slider()">
										      <span class="howto"> <?php _e('To Set interval between two slides in MS.<br>Ex. Enter 3000 for 3ms.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_slide_speed"><?php _e('16) Set Slide Speed:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_speed" name="pgr_slide_speed" type="text" value="5000"
										      onchange="pgr_slider()">
										      <span class="howto"> <?php _e('To Set Slide moving Speed in MS.<br>Ex. Enter 3000 for 3ms', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-photo-gallery-with-responsive'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Photo Gallery Slider in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'wp-photo-gallery-with-responsive'); ?> </p>
									<div id="pgr-slider-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="pgr-slider_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
/**
 * Function to get 'Album Grid Shortcode Generator' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_album_grid_sg() {
	?>
<style type="text/css">
	 .shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.pgr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.pgr_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Photo Grid Shortcode :-', 'wp-photo-gallery-with-responsive') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
								<form id="shortcode_generator" style="padding:20px;" class="pgr_shortcode_generator">
								<p><label for="pgr_grids"><?php _e('1) Select Album Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_grids" name="pgr_grids"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								       <p><label for="pgr_grid_album_design"><?php _e('2) Select Template:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_templates();  ?>
								 	      <select id="pgr_grid_album_design" name="pgr_grid_album_design"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								    <p><label for="pgr_galbum_design"><?php _e('3) Click Target:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_album_linktarget" name="pgr_grid_album_linktarget"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								     <p><label for="pgr_grid_album_hight"><?php _e('4) Set Album Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_album_hight" name="pgr_grid_album_hight" type="text" value=" "
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e(' Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									  <p><label><?php _e('5) Display  Album Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_title" name="pgr_grid_album_title"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p> 
								     <p><label><?php _e('6) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_desc" name="pgr_grid_album_desc"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label><?php _e('7) Display Full Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_full_desc" name="pgr_grid_album_full_desc"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_order"><?php _e('8) Select Order:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_order();?>
								 	      <select id="pgr_grid_order" name="pgr_grid_order"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): 
											?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								     <p><label for="pgr_grid_orderby"><?php _e('9) Select Orderby:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_orderby();  ?>
								 	      <select id="pgr_grid_orderby" name="pgr_grid_orderby"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								   <p><label for="pgr_grid_word_limit"><?php _e('10) Set Word Limit:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_word_limit" name="pgr_grid_word_limit" type="text" value=" "
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e('To Show 30 words. Set word limit as 30.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_grid_content_tail"><?php _e('11) Set content Tail:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_content_tail" name="pgr_grid_content_tail" type="text" value=""
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e('To set (...) or anything you want after decription.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
										<p>
											<label for="select_gallery">
												<?php _e('12) Select Gallery:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php global $post;
												$args = array("post_type"=>PGR_POST_TYPE, "post_status"=> "publish");
												  	   $query = new WP_Query($args);   						
												 ?>
												<select id="select_album_gallery" name="select_album_gallery" onchange="pgr_album_grid()">
												   <option value="default-value">No need</option>
													<?php while ( $query->have_posts() ) : $query->the_post();?>
														<option value="<?php echo $post->ID; ?>">
															<?php the_title();  ?>
														</option>													
													<?php endwhile; ?>
												</select>
												<span class="howto"> Select Album to show. For multiple use id="25,27,45".</span>
											</p>
											<p><label for="pgr_grid_album_display"><?php _e('13) Set Album Limit:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_album_display" name="pgr_grid_album_display" type="text" value="-1"
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e('Number of Albums to Display. e.i., 1,7 or 9', 'wp-photo-gallery-with-responsive'); ?></span>
									    </p>
									    <p>
											<label>
												<?php _e('14) Select Category:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php $args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => PGR_CAT,$args]);  ?>
												<select id="pgr_grid_album_cat" name="pgr_grid_album_cat" onchange="pgr_album_grid()">
												   <option value="default-value">All Album</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> Display Albums Category wise. By default Display All.</span>
											</p>
											<p><label for="pgr_grid_total_album"><?php _e('15) change total image:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_total_album" name="pgr_grid_total_album" type="text" value=" "
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e('Set Number of Images to show i.e. 3, 4', 'wp-photo-gallery-with-responsive'); ?></span>
									    </p>
									     <p><label for="pgr_grid_album_popup"><?php _e('16) Set Lightbox Popup:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_popup" name="pgr_grid_album_popup"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_image_cell"><?php _e('17) Set Image Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_image_cell" name="pgr_image_cell"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								     <p><label for="pgr_grid_image_hight"><?php _e('18) Set Image Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_image_hight" name="pgr_grid_album_hight" type="text" value=" "
										      onchange="pgr_album_grid()">
										      <span class="howto"> <?php _e('Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
								   <p><label for="pgr_grid_show_caption"><?php _e('19) Display Caption:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_caption" name="pgr_grid_show_caption"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
                                    <p><label for="pgr_grid_ait"><?php _e('20) Display Image Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_ait" name="pgr_grid_ait"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_grid_design"><?php _e('21) Display image Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_desc" name="pgr_grid_show_desc"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label><?php _e('22) Click Target for Image:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_album_ilinkt" name="pgr_grid_album_ilinkt"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								    <p><label for="pgr_grid_ais"><?php _e('23) Set Image Size:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_img_size();  ?>
								 	      <select id="pgr_grid_ais" name="pgr_grid_ais"
								 	         onchange="pgr_album_grid()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>								   
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-photo-gallery-with-responsive'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Photo Album Grid Gallery in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'wp-photo-gallery-with-responsive'); ?> </p>
									<div id="pgr-album-grid-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="pgr-album-grid_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
/**
 * Function to get 'Album Grid Shortcode Generator' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_album_slider_sg() {
	?>
<style type="text/css">
	 .shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.pgr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.pgr_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Photo Grid Shortcode :-', 'wp-photo-gallery-with-responsive') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
								<form id="shortcode_generator" style="padding:20px;" class="pgr_shortcode_generator">
								<p><label for="pgr_grids"><?php _e('1) Select Album Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_grids" name="pgr_grids"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								       <p><label for="pgr_grid_album_design"><?php _e('2) Select Template:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_templates();  ?>
								 	      <select id="pgr_grid_album_design" name="pgr_grid_album_design"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								    <p><label for="pgr_galbum_design"><?php _e('3) Click Target:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_album_linktarget" name="pgr_grid_album_linktarget"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								     <p><label for="pgr_grid_album_hight"><?php _e('4) Set Album Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_album_hight" name="pgr_grid_album_hight" type="text" value=" "
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									  <p><label><?php _e('5) Display  Album Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_title" name="pgr_grid_album_title"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p> 
								     <p><label><?php _e('6) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_desc" name="pgr_grid_album_desc"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label><?php _e('7) Display Full Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_full_desc" name="pgr_grid_album_full_desc"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_order"><?php _e('8) Select Order:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_order();?>
								 	      <select id="pgr_grid_order" name="pgr_grid_order"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): 
											?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								     <p><label for="pgr_grid_orderby"><?php _e('9) Select Orderby:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_orderby();  ?>
								 	      <select id="pgr_grid_orderby" name="pgr_grid_orderby"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								   <p><label for="pgr_grid_word_limit"><?php _e('10) Set Word Limit:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_word_limit" name="pgr_grid_word_limit" type="text" value=" "
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('To Show 30 words. Set word limit as 30.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_grid_content_tail"><?php _e('11) Set content Tail:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_content_tail" name="pgr_grid_content_tail" type="text" value=""
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('To set (...) or anything you want after decription.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
										<p>
											<label for="select_gallery">
												<?php _e('12) Select Gallery:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php global $post;
												$args = array("post_type"=>PGR_POST_TYPE, "post_status"=> "publish");
												  	   $query = new WP_Query($args);   						
												 ?>
												<select id="select_album_gallery" name="select_album_gallery" onchange="pgr_album_slider()">
												   <option value="default-value">No need</option>
													<?php while ( $query->have_posts() ) : $query->the_post();?>
														<option value="<?php echo $post->ID; ?>">
															<?php the_title();  ?>
														</option>													
													<?php endwhile; ?>
												</select>
												<span class="howto"> Which Album want to show if need multiple use multiple id. 27,28</span>
											</p>
											<p><label for="pgr_grid_album_display"><?php _e('13) Set Album Limit:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_album_display" name="pgr_grid_album_display" type="text" value="-1"
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('Number of Albums Display. e.i., 1,7 or 9', 'wp-photo-gallery-with-responsive'); ?></span>
									    </p>
									    <p>
											<label>
												<?php _e('14) Select Category:', 'wp-photo-gallery-with-responsive') ?></label>
												<?php $args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => PGR_CAT,$args]);  ?>
												<select id="pgr_grid_album_cat" name="pgr_grid_album_cat" onchange="pgr_album_slider()">
												   <option value="default-value">All Album</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> Display Albums Category wise. By default Display All.</span>
											</p>
											<p><label for="pgr_grid_total_album"><?php _e('15) change total image:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_total_album" name="pgr_grid_total_album" type="text" value=" "
										      onchange="pgr_album_slider()">
										   <span class="howto"> <?php _e('Set Number of Images to show i.e. 3, 4', 'wp-photo-gallery-with-responsive'); ?></span>
									    </p>
									     <p><label for="pgr_grid_album_popup"><?php _e('16) Set Lightbox Popup:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_album_popup" name="pgr_grid_album_popup"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_image_cell"><?php _e('17) Set Image Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_image_cell" name="pgr_image_cell"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								     <p><label for="pgr_grid_image_hight"><?php _e('18) Set Image Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_image_hight" name="pgr_grid_album_hight" type="text" value=" "
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
								   <p><label for="pgr_grid_show_caption"><?php _e('19) Display Caption:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_caption" name="pgr_grid_show_caption"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
                                    <p><label for="pgr_grid_ait"><?php _e('20) Display Image Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_ait" name="pgr_grid_ait"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>	
								   <p><label for="pgr_grid_design"><?php _e('21) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_desc" name="pgr_grid_show_desc"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label><?php _e('22) Click Target for Image:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_album_ilinkt" name="pgr_grid_album_ilinkt"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								    <p><label for="pgr_grid_ais"><?php _e('23) Set Image Size:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_img_size();  ?>
								 	      <select id="pgr_grid_ais" name="pgr_grid_ais"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   	 <p><label for="pgr_slide_scroll"><?php _e('24) Slide to Scroll:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_scroll" name="pgr_slide_scroll" type="text" value="1"
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('Number of Images to slide at same time.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_slider_dots"><?php _e('23) Display Pagination Bullets(Dots):', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_dots" name="pgr_slider_dots"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								     <p><label for="pgr_slider_arrows"><?php _e('25) Display Arrows:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_arrows" name="pgr_slider_arrows"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_slider_autoplay"><?php _e('26) Set Slide Autoplay:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_slider_autoplay" name="pgr_slider_autoplay"
								 	         onchange="pgr_album_slider()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto">Set Slider to Slide Automatically.</span>									
								   </p>
								   <p><label for="pgr_slide_autoplay_interval"><?php _e('27) Set Autoplay Interval:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_autoplay_interval" name="pgr_slide_autoplay_interval" type="text" value="3000"
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('To Set interval between two slides in MS.<br>Ex. Enter 3000 for 3ms.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									 <p><label for="pgr_slide_speed"><?php _e('28) Set Slide Speed:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_slide_speed" name="pgr_slide_speed" type="text" value="5000"
										      onchange="pgr_album_slider()">
										      <span class="howto"> <?php _e('To Set Slide moving Speed in MS.<br>Ex. Enter 3000 for 3ms', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>								   
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-photo-gallery-with-responsive'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Photo Album Slider Gallery in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'wp-photo-gallery-with-responsive'); ?> </p>
									<div id="pgr-album-slider-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="pgr-album-slider_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
/**
 * Function to get 'Portfolio Shortcode Generator' HTML
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_portfolio_sg() {
	?>
<style type="text/css">
	 .shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.pgr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.pgr_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Photo Grid Shortcode :-', 'wp-photo-gallery-with-responsive') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
								<form id="shortcode_generator" style="padding:20px;" class="pgr_shortcode_generator">
											<p><label for="pgr_grids"><?php _e('1) Select Cell:', 'wp-photo-gallery-with-responsive'); ?></label>
								 	       <?php $pgr_cell = raigl_gallery_shortcode_grid();  ?>
								 	        <select id="pgr_grids" name="pgr_grids"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php                                      
										foreach ($pgr_cell as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								      </p>
								       <p><label for="pgr_grid_design"><?php _e('2) Select Template:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_templates();  ?>
								 	      <select id="pgr_grid_design" name="pgr_grid_design"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								   <p><label for="pgr_grid_design"><?php _e('3) Click Target:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_link_target();  ?>
								 	      <select id="pgr_grid_linktarget" name="pgr_grid_linktarget"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="howto"><strong>Note:-</strong>Popup Needs to be set as False.</span>
								   </p>
								   <p><label for="pgr_grid_hight"><?php _e('4) Set Image Height:', 'wp-photo-gallery-with-responsive'); ?></label>
						                    <input id="pgr_grid_hight" name="pgr_grid_hight" type="text" value=" "
										      onchange="pgr_portfolio()">
										      <span class="howto"> <?php _e('Set image height like: 300. i.e., Remove px from 300px.', 'wp-photo-gallery-with-responsive'); ?></span>
									</p>
									  <p><label for="pgr_grid_design"><?php _e('5) Display Title:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_title" name="pgr_grid_show_title"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p> 
								   <p><label for="pgr_grid_design"><?php _e('6) Display Description:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_desc" name="pgr_grid_show_desc"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								   <p><label for="pgr_grid_show_caption"><?php _e('7) Display Caption:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_show_caption" name="pgr_grid_show_caption"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_order"><?php _e('8) Select Order:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_order();?>
								 	      <select id="pgr_grid_order" name="pgr_grid_order"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): 
											?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								     <p><label for="pgr_grid_orderby"><?php _e('9) Select Orderby:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_gallery_shortcode_orderby();  ?>
								 	      <select id="pgr_grid_orderby" name="pgr_grid_orderby"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>
								   </p>
								    <p><label for="pgr_grid_img_size"><?php _e('10) Set Image Size:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_img_size();  ?>
								 	      <select id="pgr_grid_img_size" name="pgr_grid_img_size"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
								    <p><label for="pgr_grid_popup"><?php _e('11) Set Lightbox Popup:', 'wp-photo-gallery-with-responsive'); ?></label>
									       <?php $sg_tempalte = pgr_true_false();  ?>
								 	      <select id="pgr_grid_popup" name="pgr_grid_popup"
								 	         onchange="pgr_portfolio()">
								 	      	<option value="default-value">No need</option>
										<?php foreach ($sg_tempalte as $k ): ?>
											<option value="<?php _e($k, 'wp-photo-gallery-with-responsive') ?>">
												<?php _e($k, 'wp-photo-gallery-with-responsive') ?>
											</option>
										<?php endforeach; ?>
									</select>									
								   </p>
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-photo-gallery-with-responsive'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the image Portfolio Filter in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'wp-photo-gallery-with-responsive'); ?> </p>
									<div id="pgr-portfolio-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="pgr-portfolio_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr></div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
/**
 * Gets the plugin design part feed
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */
function pgr_hire_wp_experts( $feed_type = '' ) {
	
	$active_tab = isset($_GET['tab']) ?  pgr_sanitize_clean($_GET['tab']) : '';
	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}
	// Taking some variables
	$wpoh_admin_tabs = pgr_help_tabs();
	$offer_key 	= isset($wpoh_admin_tabs[$active_tab]['offer_key']) 	? $wpoh_admin_tabs[$active_tab]['offer_key'] 	: 'wppf_' . $active_tab;
	$url 			= isset($wpoh_admin_tabs[$active_tab]['url']) 			? $wpoh_admin_tabs[$active_tab]['url'] 				: '';
	$offer_time = isset($wpoh_admin_tabs[$active_tab]['offer_time']) ? $wpoh_admin_tabs[$active_tab]['offer_time'] 	: 172800;
    $offercache 			= get_transient( $offer_key );	
	if ($offercache !=" ") {		
		$feed 			= wp_remote_get( pgr_clean_url($url));
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$offercache = wp_remote_retrieve_body( $feed );
				set_transient( $offer_key, $offercache, $offer_time );
			}
		} else {
			$offercache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'html5-videogallery-plus-player' ) . '</div>';
		}
	}
	return $offercache;	
}