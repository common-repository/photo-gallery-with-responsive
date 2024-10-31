<?php
/**
 * Plugin generic functions file
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;
/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_esc_attr($data) {
    return esc_attr(stripslashes($data));
}
/**
 * Strip Slashes From Array
 *
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_slashes_deep($data = array(), $flag = false) {
    if ($flag != true) {
        $data = pgr_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
   return $data;
}
/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_nohtml_kses($data = array()) {
    if (is_array($data)) {
        $data = array_map('pgr_nohtml_kses', $data);
    } elseif (is_string($data)) {
        $data = trim($data);
        $data = wp_filter_nohtml_kses($data);
    }
    return $data;
}
/**
 * Function to unique number value
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_get_unique() {
    static $unique = 0;
    $unique++;
    return $unique;
}
/**
 * Function to add array after specific key
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_add_array(&$array, $value, $index, $from_last = false) {
    if (is_array($array) && is_array($value)) {
        if ($from_last) {
            $total_count = count($array);
            $index = (!empty($total_count) && ($total_count > $index)) ? ($total_count - $index) : $index;
        }
        $split_arr = array_splice($array, max(0, $index));
        $array = array_merge($array, $value, $split_arr);
    }
    return $array;
}
/**
 * Function to get post featured image
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_get_image_src($post_id = '', $size = 'full') {
    $size = !empty($size) ? $size : 'full';
    $image = wp_get_attachment_image_src($post_id, $size);
    if (!empty($image)) {
        $image = isset($image[0]) ? $image[0] : '';
    }
    return $image;
}
/**
 * Function to get post excerpt
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_get_post_excerpt($post_id = null, $content = '', $word_length = '55', $more = '...') {
     
    $has_excerpt = false;
    $word_length = !empty($word_length) ? $word_length : '55';
    // If post id is passed
    if (!empty($post_id)) {
        if (has_excerpt($post_id)) {
            $has_excerpt = true;
            $content = get_the_excerpt();
        } else {
            $content = !empty($content) ? $content : get_the_content();
        }
    }
    if (!empty($content) && (!$has_excerpt)) {
        $content = strip_shortcodes($content); // Strip shortcodes
        $content = wp_trim_words($content, $word_length, $more);
    }
    return $content;
}
/**
 * Function to get `igsp-gallery` shortcode designs
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_templates() {
    $design_arr = array(
        'template-1' => __('template-1', 'wp-photo-gallery-with-responsive'),
        'template-2' => __('template-2', 'wp-photo-gallery-with-responsive'),
        'template-3' => __('template-3', 'wp-photo-gallery-with-responsive'),
        'template-4' => __('template-4', 'wp-photo-gallery-with-responsive'),
        'template-5' => __('template-5', 'wp-photo-gallery-with-responsive'),
        'template-6' => __('template-6', 'wp-photo-gallery-with-responsive'),
        'template-7' => __('template-7', 'wp-photo-gallery-with-responsive'),
        'template-8' => __('template-8', 'wp-photo-gallery-with-responsive'),
    );
    return apply_filters('pgr_tempaltes', $design_arr);
}
/**
 * Function to get `igsp-gallery` shortcode designs
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function pgr_album_templates() {
    $design_arr = array(
        'template-1' => __('template-1', 'wp-photo-gallery-with-responsive'),
        'template-2' => __('template-2', 'wp-photo-gallery-with-responsive'),
        'template-3' => __('template-3', 'wp-photo-gallery-with-responsive'),
        'template-4' => __('template-4', 'wp-photo-gallery-with-responsive'),
        'template-5' => __('template-5', 'wp-photo-gallery-with-responsive'),
        'template-6' => __('template-6', 'wp-photo-gallery-with-responsive'),
        'template-7' => __('template-7', 'wp-photo-gallery-with-responsive'),
        'template-8' => __('template-8', 'wp-photo-gallery-with-responsive'),
    );
    return apply_filters('pgr_album_template', $design_arr);
}
/**
 * Function to get `Grid columns values` shortcode generator
 * 
 * @package photo gallery with responsive
 * @since 1.0.0
 */
function raigl_gallery_shortcode_grid() {
    $design_arr[0] = __(1, 'wp-photo-gallery-with-responsive');
    $design_arr[1] = __(2, 'wp-photo-gallery-with-responsive');
    $design_arr[2] = __(3, 'wp-photo-gallery-with-responsive');
    $design_arr[3] = __(4, 'wp-photo-gallery-with-responsive');
    $design_arr[4] = __(5, 'wp-photo-gallery-with-responsive');
    $design_arr[5] = __(6, 'wp-photo-gallery-with-responsive');
    $design_arr[6] = __(7, 'wp-photo-gallery-with-responsive');
    $design_arr[7] = __(8, 'wp-photo-gallery-with-responsive');
    $design_arr[8] = __(9, 'wp-photo-gallery-with-responsive');
    $design_arr[9] = __(10, 'wp-photo-gallery-with-responsive');
    $design_arr[10] = __(11, 'wp-photo-gallery-with-responsive');
    $design_arr[11] = __(12, 'wp-photo-gallery-with-responsive');
    return apply_filters('pgr_album_designs', $design_arr);
}
function pgr_gallery_shortcode_link_target() {
    $target_arr = array(
        __('same-tab', 'wp-photo-gallery-with-responsive'),
        __('new-tab', 'wp-photo-gallery-with-responsive')
    );
    return apply_filters('pgr_album_designs', $target_arr);
}
function pgr_true_false() {
    $pgr_true_false = array(
        __('true', 'wp-photo-gallery-with-responsive'),
        __('false', 'wp-photo-gallery-with-responsive')
    );
    return apply_filters('pgr_true_false', $pgr_true_false);
}
function pgr_gallery_shortcode_order() {
    $order_arr = array(
        __('ASC', 'wp-photo-gallery-with-responsive'),
        __('DESC', 'wp-photo-gallery-with-responsive')
    );
    return apply_filters('pgr_album_designs', $order_arr);
}
function pgr_gallery_shortcode_orderby() {
    $orderby_arr = array(
        __('ID', 'wp-logo-slider-and-widget'),
        __('author', 'wp-logo-slider-and-widget'),
        __('title', 'wp-logo-slider-and-widget'),
        __('name', 'wp-logo-slider-and-widget'),
        __('rand', 'wp-logo-slider-and-widget'),
        __('date', 'wp-logo-slider-and-widget'),
    );
    return apply_filters('pgr_album_designs', $orderby_arr);
}
function pgr_img_size() {
    $img_size_arr = array(
        __('full', 'wp-photo-gallery-with-responsive'),
        __('medium', 'wp-photo-gallery-with-responsive'),
        __('large', 'wp-photo-gallery-with-responsive'),
        __('thumbnail', 'wp-photo-gallery-with-responsive')
    );
    return apply_filters('pgr_album_designs', $img_size_arr);
}
/**
 * create Sanitize URL.
 * 
 * @package photo gallery with responsive
 * @since 1.0
 */
function pgr_clean_url( $url ) {
    return esc_url_raw( trim($url) );
}

/**
 * Clean variables using sanitize text field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package photo gallery with responsive
 * @since 1.0
 */
function pgr_sanitize_clean( $var ) {
    if ( is_array( $var ) ) {
        return array_map( 'pgr_sanitize_clean', $var );
    } else {
        $data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
        return wp_unslash($data);
    }
}