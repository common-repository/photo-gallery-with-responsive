pgr_grid();
pgr_slider();
pgr_album_grid();
pgr_album_slider();
pgr_portfolio();
function pgr_grid() { 
    var sg_main = "[pgr_grid  ";  
    var select_gallery = jQuery('#select_gallery').val();
    var pgr_grids = jQuery('#pgr_grids').val();
    var pgr_grid_design = jQuery('#pgr_grid_design').val(); 
    var pgr_grid_linktarget = jQuery('#pgr_grid_linktarget').val();
    var pgr_grid_hight = jQuery('#pgr_grid_hight').val();
    var pgr_grid_show_title = jQuery('#pgr_grid_show_title').val();
    var pgr_grid_show_desc = jQuery('#pgr_grid_show_desc').val(); 
    var pgr_grid_show_caption = jQuery('#pgr_grid_show_caption').val();
    var pgr_grid_img_size = jQuery('#pgr_grid_img_size').val();
    var pgr_grid_popup = jQuery('#pgr_grid_popup').val();
 if (select_gallery == '') {} else { sg_main = sg_main + ' id="' + select_gallery + '"' ;}
 if (pgr_grids == 'default-value') {} else { sg_main = sg_main + ' cell="' + pgr_grids + '"' ;}
 if (pgr_grid_design == 'default-value') {} else { sg_main = sg_main + ' template="' + pgr_grid_design + '"' ;}
 if (pgr_grid_linktarget == 'default-value') {} else { sg_main = sg_main + ' link_target="' + pgr_grid_linktarget + '"' ;}
 if (pgr_grid_hight == ' ') {} else { sg_main = sg_main + ' image_height="' + pgr_grid_hight + '"' ;}
 if (pgr_grid_show_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + pgr_grid_show_title + '"' ;}
 if (pgr_grid_show_desc == 'default-value') {} else { sg_main = sg_main + ' show_description="' + pgr_grid_show_desc + '"' ;}
 if (pgr_grid_show_caption == 'default-value') {} else { sg_main = sg_main + ' show_caption="' + pgr_grid_show_caption + '"' ;}
 if (pgr_grid_img_size == 'default-value') {} else { sg_main = sg_main + ' image_size="' + pgr_grid_img_size + '"' ;}
 if (pgr_grid_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + pgr_grid_popup + '"' ;}
    sg_main = sg_main + ']';
    jQuery("#pgr-grid-shortcode").text(sg_main);
    jQuery("#pgr-grid_shortcode_php").text("'"+sg_main+"'");
}
function pgr_slider() { 
    var sg_main = "[pgr_slider  ";  
    var select_gallery = jQuery('#select_gallery').val();
    var pgr_grids = jQuery('#pgr_grids').val();
    var pgr_grid_design = jQuery('#pgr_grid_design').val(); 
    var pgr_grid_linktarget = jQuery('#pgr_grid_linktarget').val();
    var pgr_grid_hight = jQuery('#pgr_grid_hight').val();
    var pgr_grid_show_title = jQuery('#pgr_grid_show_title').val();
    var pgr_grid_show_desc = jQuery('#pgr_grid_show_desc').val();   
    var pgr_grid_show_caption = jQuery('#pgr_grid_show_caption').val();
    var pgr_grid_img_size = jQuery('#pgr_grid_img_size').val();
    var pgr_grid_popup = jQuery('#pgr_grid_popup').val();
    var pgr_slide_scroll = jQuery('#pgr_slide_scroll').val();
    var pgr_slider_dots = jQuery('#pgr_slider_dots').val();
    var pgr_slider_arrows = jQuery('#pgr_slider_arrows').val(); 
    var pgr_slider_autoplay = jQuery('#pgr_slider_autoplay').val(); 
    var pgr_slide_autoplay_interval = jQuery('#pgr_slide_autoplay_interval').val();
    var pgr_slide_speed = jQuery('#pgr_slide_speed').val();   
 if (select_gallery == '') {} else { sg_main = sg_main + ' id="' + select_gallery + '"' ;}
 if (pgr_grids == 'default-value') {} else { sg_main = sg_main + ' cell="' + pgr_grids + '"' ;}
 if (pgr_grid_design == 'default-value') {} else { sg_main = sg_main + ' template="' + pgr_grid_design + '"' ;}
 if (pgr_grid_linktarget == 'default-value') {} else { sg_main = sg_main + ' link_target="' + pgr_grid_linktarget + '"' ;}
 if (pgr_grid_hight == ' ') {} else { sg_main = sg_main + ' image_height="' + pgr_grid_hight + '"' ;}
 if (pgr_grid_show_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + pgr_grid_show_title + '"' ;}
 if (pgr_grid_show_desc == 'default-value') {} else { sg_main = sg_main + ' show_description="' + pgr_grid_show_desc + '"' ;}
 if (pgr_grid_show_caption == 'default-value') {} else { sg_main = sg_main + ' show_caption="' + pgr_grid_show_caption + '"' ;}
 if (pgr_grid_img_size == 'default-value') {} else { sg_main = sg_main + ' image_size="' + pgr_grid_img_size + '"' ;}
 if (pgr_grid_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + pgr_grid_popup + '"' ;}
 if (pgr_slide_scroll == '1') {} else { sg_main = sg_main + ' slidestoscroll="' + pgr_slide_scroll + '"' ;}
 if (pgr_slider_dots == 'default-value') {} else { sg_main = sg_main + ' dots="' + pgr_slider_dots + '"' ;}
 if (pgr_slider_arrows == 'default-value') {} else { sg_main = sg_main + ' arrows="' + pgr_slider_arrows + '"' ;}
 if (pgr_slider_autoplay == 'default-value') {} else { sg_main = sg_main + ' autoplay="' + pgr_slider_autoplay + '"' ;}
 if (pgr_slide_autoplay_interval == '3000') {} else { sg_main = sg_main + ' autoplay_interval="' + pgr_slide_autoplay_interval + '"' ;}
 if (pgr_slide_speed == '5000') {} else { sg_main = sg_main + ' speed="' + pgr_slide_speed + '"' ;}
    sg_main = sg_main + ']';
    jQuery("#pgr-slider-shortcode").text(sg_main);
    jQuery("#pgr-slider_shortcode_php").text("'"+sg_main+"'");
}
function pgr_album_grid() { 
    var sg_main = "[pgr_album_grid  ";  
    var select_album_gallery = jQuery('#select_album_gallery').val();
    var pgr_grids = jQuery('#pgr_grids').val();
    var pgr_grid_album_design = jQuery('#pgr_grid_album_design').val(); 
    var pgr_grid_album_linktarget = jQuery('#pgr_grid_album_linktarget').val();
    var pgr_grid_album_hight = jQuery('#pgr_grid_album_hight').val();
    var pgr_grid_album_title = jQuery('#pgr_grid_album_title').val();
    var pgr_grid_album_desc = jQuery('#pgr_grid_album_desc').val();  
    var pgr_grid_album_full_desc = jQuery('#pgr_grid_album_full_desc').val();
    var pgr_grid_word_limit = jQuery('#pgr_grid_word_limit').val();  
    var pgr_grid_content_tail = jQuery('#pgr_grid_content_tail').val(); 
    var pgr_grid_album_display = jQuery('#pgr_grid_album_display').val();
    var pgr_grid_album_cat = jQuery('#pgr_grid_album_cat').val();
    var pgr_grid_total_album = jQuery('#pgr_grid_total_album').val(); 
    var pgr_grid_album_popup = jQuery('#pgr_grid_album_popup').val();
    var pgr_image_cell = jQuery('#pgr_image_cell').val();
    var pgr_grid_image_hight = jQuery('#pgr_grid_image_hight').val();
    var pgr_grid_show_caption = jQuery('#pgr_grid_show_caption').val();
    var pgr_grid_ait = jQuery('#pgr_grid_ait').val();   
    var pgr_grid_show_desc = jQuery('#pgr_grid_show_desc').val();
    var pgr_grid_album_ilinkt = jQuery('#pgr_grid_album_ilinkt').val();
    var pgr_grid_ais = jQuery('#pgr_grid_ais').val();
    var pgr_grid_order = jQuery('#pgr_grid_order').val();
    var pgr_grid_orderby = jQuery('#pgr_grid_orderby').val(); 
 if (select_album_gallery == 'default-value') {} else { sg_main = sg_main + ' id="' + select_album_gallery + '"' ;}
 if (pgr_grids == 'default-value') {} else { sg_main = sg_main + ' album_cell="' + pgr_grids + '"' ;} 
 if (pgr_grid_album_design == 'default-value') {} else { sg_main = sg_main + ' template="' + pgr_grid_album_design + '"' ;}
 if (pgr_grid_album_linktarget == 'default-value') {} else { sg_main = sg_main + ' album_link_target="' + pgr_grid_album_linktarget + '"' ;}
 if (pgr_grid_album_hight == ' ') {} else { sg_main = sg_main + ' album_height="' + pgr_grid_album_hight + '"' ;}
 if (pgr_grid_album_title == 'default-value') {} else { sg_main = sg_main + ' album_title="' + pgr_grid_album_title + '"' ;}
 if (pgr_grid_album_desc == 'default-value') {} else { sg_main = sg_main + ' album_description="' + pgr_grid_album_desc + '"' ;}
 if (pgr_grid_album_full_desc == 'default-value') {} else { sg_main = sg_main + ' album_full_content="' + pgr_grid_album_full_desc + '"' ;}
 if (pgr_grid_word_limit == ' ') {} else { sg_main = sg_main + ' words_limit="' + pgr_grid_word_limit + '"' ;}
 if (pgr_grid_content_tail == '') {} else { sg_main = sg_main + ' content_tail="' + pgr_grid_content_tail + '"' ;}
 if (pgr_grid_album_display == '-1') {} else { sg_main = sg_main + ' limit="' + pgr_grid_album_display + '"' ;}
 if (pgr_grid_album_cat == 'default-value') {} else { sg_main = sg_main + ' category="' + pgr_grid_album_cat + '"' ;}
 if (pgr_grid_total_album == ' ') {} else { sg_main = sg_main + ' total_photo="' + pgr_grid_total_album + '"' ;}
 if (pgr_grid_album_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + pgr_grid_album_popup + '"' ;}
 if (pgr_image_cell == 'default-value') {} else { sg_main = sg_main + ' image_cell="' + pgr_image_cell + '"' ;}
 if (pgr_grid_image_hight == ' ') {} else { sg_main = sg_main + ' image_height="' + pgr_grid_image_hight + '"' ;}
 if (pgr_grid_show_caption == 'default-value') {} else { sg_main = sg_main + ' show_caption="' + pgr_grid_show_caption + '"' ;}
 if (pgr_grid_ait == 'default-value') {} else { sg_main = sg_main + ' show_title="' + pgr_grid_ait + '"' ;}
 if (pgr_grid_show_desc == 'default-value') {} else { sg_main = sg_main + ' show_description="' + pgr_grid_show_desc + '"' ;}
 if (pgr_grid_album_ilinkt == 'default-value') {} else { sg_main = sg_main + ' link_target="' + pgr_grid_album_ilinkt + '"' ;}
 if (pgr_grid_ais == 'default-value') {} else { sg_main = sg_main + ' image_size="' + pgr_grid_ais + '"' ;}
 if (pgr_grid_order == 'default-value') {} else { sg_main = sg_main + ' order="' + pgr_grid_order + '"' ;}
 if (pgr_grid_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + pgr_grid_orderby + '"' ;}
    sg_main = sg_main + ']';
    jQuery("#pgr-album-grid-shortcode").text(sg_main);
    jQuery("#pgr-album-grid_shortcode_php").text("'"+sg_main+"'");
}
function pgr_album_slider() { 
    var sg_main = "[pgr_album_slider  ";  
    var select_album_gallery = jQuery('#select_album_gallery').val();
    var pgr_grids = jQuery('#pgr_grids').val();
    var pgr_grid_album_design = jQuery('#pgr_grid_album_design').val(); 
    var pgr_grid_album_linktarget = jQuery('#pgr_grid_album_linktarget').val();
    var pgr_grid_album_hight = jQuery('#pgr_grid_album_hight').val();
    var pgr_grid_album_title = jQuery('#pgr_grid_album_title').val();
    var pgr_grid_album_desc = jQuery('#pgr_grid_album_desc').val();  
    var pgr_grid_album_full_desc = jQuery('#pgr_grid_album_full_desc').val();
    var pgr_grid_word_limit = jQuery('#pgr_grid_word_limit').val();  
    var pgr_grid_content_tail = jQuery('#pgr_grid_content_tail').val(); 
    var pgr_grid_album_display = jQuery('#pgr_grid_album_display').val();
    var pgr_grid_album_cat = jQuery('#pgr_grid_album_cat').val();
    var pgr_grid_total_album = jQuery('#pgr_grid_total_album').val(); 
    var pgr_grid_album_popup = jQuery('#pgr_grid_album_popup').val();
    var pgr_image_cell = jQuery('#pgr_image_cell').val();
    var pgr_grid_image_hight = jQuery('#pgr_grid_image_hight').val();
    var pgr_grid_show_caption = jQuery('#pgr_grid_show_caption').val();
    var pgr_grid_ait = jQuery('#pgr_grid_ait').val();   
    var pgr_grid_show_desc = jQuery('#pgr_grid_show_desc').val();
    var pgr_grid_album_ilinkt = jQuery('#pgr_grid_album_ilinkt').val();
    var pgr_grid_ais = jQuery('#pgr_grid_ais').val();
    var pgr_slide_scroll = jQuery('#pgr_slide_scroll').val();
    var pgr_slider_dots = jQuery('#pgr_slider_dots').val();
    var pgr_slider_arrows = jQuery('#pgr_slider_arrows').val(); 
    var pgr_slider_autoplay = jQuery('#pgr_slider_autoplay').val(); 
    var pgr_slide_autoplay_interval = jQuery('#pgr_slide_autoplay_interval').val();
    var pgr_slide_speed = jQuery('#pgr_slide_speed').val();
    var pgr_grid_order = jQuery('#pgr_grid_order').val();
    var pgr_grid_orderby = jQuery('#pgr_grid_orderby').val();  
 if (select_album_gallery == 'default-value') {} else { sg_main = sg_main + ' id="' + select_album_gallery + '"' ;}
 if (pgr_grids == 'default-value') {} else { sg_main = sg_main + ' album_cell="' + pgr_grids + '"' ;} 
 if (pgr_grid_album_design == 'default-value') {} else { sg_main = sg_main + ' template="' + pgr_grid_album_design + '"' ;}
 if (pgr_grid_album_linktarget == 'default-value') {} else { sg_main = sg_main + ' album_link_target="' + pgr_grid_album_linktarget + '"' ;}
 if (pgr_grid_album_hight == ' ') {} else { sg_main = sg_main + ' album_height="' + pgr_grid_album_hight + '"' ;}
 if (pgr_grid_album_title == 'default-value') {} else { sg_main = sg_main + ' album_title="' + pgr_grid_album_title + '"' ;}
 if (pgr_grid_album_desc == 'default-value') {} else { sg_main = sg_main + ' album_description="' + pgr_grid_album_desc + '"' ;}
 if (pgr_grid_album_full_desc == 'default-value') {} else { sg_main = sg_main + ' album_full_content="' + pgr_grid_album_full_desc + '"' ;}
 if (pgr_grid_word_limit == ' ') {} else { sg_main = sg_main + ' words_limit="' + pgr_grid_word_limit + '"' ;}
 if (pgr_grid_content_tail == '') {} else { sg_main = sg_main + ' content_tail="' + pgr_grid_content_tail + '"' ;}
 if (pgr_grid_album_display == '-1') {} else { sg_main = sg_main + ' limit="' + pgr_grid_album_display + '"' ;}
 if (pgr_grid_album_cat == 'default-value') {} else { sg_main = sg_main + ' category="' + pgr_grid_album_cat + '"' ;}
 if (pgr_grid_total_album == ' ') {} else { sg_main = sg_main + ' total_photo="' + pgr_grid_total_album + '"' ;}
 if (pgr_grid_album_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + pgr_grid_album_popup + '"' ;}
 if (pgr_image_cell == 'default-value') {} else { sg_main = sg_main + ' image_cell="' + pgr_image_cell + '"' ;}
 if (pgr_grid_image_hight == ' ') {} else { sg_main = sg_main + ' image_height="' + pgr_grid_image_hight + '"' ;}
 if (pgr_grid_show_caption == 'default-value') {} else { sg_main = sg_main + ' show_caption="' + pgr_grid_show_caption + '"' ;}
 if (pgr_grid_ait == 'default-value') {} else { sg_main = sg_main + ' show_title="' + pgr_grid_ait + '"' ;}
 if (pgr_grid_show_desc == 'default-value') {} else { sg_main = sg_main + ' show_description="' + pgr_grid_show_desc + '"' ;}
 if (pgr_grid_album_ilinkt == 'default-value') {} else { sg_main = sg_main + ' link_target="' + pgr_grid_album_ilinkt + '"' ;}
 if (pgr_grid_ais == 'default-value') {} else { sg_main = sg_main + ' image_size="' + pgr_grid_ais + '"' ;}
 if (pgr_slide_scroll == '1') {} else { sg_main = sg_main + ' slidestoscroll="' + pgr_slide_scroll + '"' ;}
 if (pgr_slider_dots == 'default-value') {} else { sg_main = sg_main + ' dots="' + pgr_slider_dots + '"' ;}
 if (pgr_slider_arrows == 'default-value') {} else { sg_main = sg_main + ' arrows="' + pgr_slider_arrows + '"' ;}
 if (pgr_slider_autoplay == 'default-value') {} else { sg_main = sg_main + ' autoplay="' + pgr_slider_autoplay + '"' ;}
 if (pgr_slide_autoplay_interval == '3000') {} else { sg_main = sg_main + ' autoplay_interval="' + pgr_slide_autoplay_interval + '"' ;}
 if (pgr_slide_speed == '5000') {} else { sg_main = sg_main + ' speed="' + pgr_slide_speed + '"' ;}
 if (pgr_grid_order == 'default-value') {} else { sg_main = sg_main + ' order="' + pgr_grid_order + '"' ;}
 if (pgr_grid_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + pgr_grid_orderby + '"' ;} 
    sg_main = sg_main + ']';
    jQuery("#pgr-album-slider-shortcode").text(sg_main);
    jQuery("#pgr-album-slider_shortcode_php").text("'"+sg_main+"'");
}
function pgr_portfolio() { 
    var sg_main = "[pgr_portfolio  ";  
    var pgr_grids = jQuery('#pgr_grids').val();
    var pgr_grid_design = jQuery('#pgr_grid_design').val(); 
    var pgr_grid_linktarget = jQuery('#pgr_grid_linktarget').val();
    var pgr_grid_hight = jQuery('#pgr_grid_hight').val();
    var pgr_grid_show_title = jQuery('#pgr_grid_show_title').val();
    var pgr_grid_show_desc = jQuery('#pgr_grid_show_desc').val(); 
    var pgr_grid_show_caption = jQuery('#pgr_grid_show_caption').val();
    var pgr_grid_order = jQuery('#pgr_grid_order').val();
    var pgr_grid_orderby = jQuery('#pgr_grid_orderby').val();
    var pgr_grid_img_size = jQuery('#pgr_grid_img_size').val();
    var pgr_grid_popup = jQuery('#pgr_grid_popup').val(); 
 if (pgr_grids == 'default-value') {} else { sg_main = sg_main + ' cell="' + pgr_grids + '"' ;}
 if (pgr_grid_design == 'default-value') {} else { sg_main = sg_main + ' template="' + pgr_grid_design + '"' ;}
 if (pgr_grid_linktarget == 'default-value') {} else { sg_main = sg_main + ' link_target="' + pgr_grid_linktarget + '"' ;}
 if (pgr_grid_hight == ' ') {} else { sg_main = sg_main + ' image_height="' + pgr_grid_hight + '"' ;}
 if (pgr_grid_show_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + pgr_grid_show_title + '"' ;}
 if (pgr_grid_show_desc == 'default-value') {} else { sg_main = sg_main + ' show_description="' + pgr_grid_show_desc + '"' ;}
 if (pgr_grid_show_caption == 'default-value') {} else { sg_main = sg_main + ' show_caption="' + pgr_grid_show_caption + '"' ;}
 if (pgr_grid_order == 'default-value') {} else { sg_main = sg_main + ' order="' + pgr_grid_order + '"' ;}
 if (pgr_grid_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + pgr_grid_orderby + '"' ;}
 if (pgr_grid_img_size == 'default-value') {} else { sg_main = sg_main + ' image_size="' + pgr_grid_img_size + '"' ;}
 if (pgr_grid_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + pgr_grid_popup + '"' ;}
    sg_main = sg_main + ']';
    jQuery("#pgr-portfolio-shortcode").text(sg_main);
    jQuery("#pgr-portfolio_shortcode_php").text("'"+sg_main+"'");
}
jQuery(document).ready(function ($) {
    /*shortcode generator pre call function*/
    // Media Uploader
    $(document).on('click', '.pgr-img-uploader', function () {
        var imgfield, showfield;
        imgfield = jQuery(this).prev('input').attr('id');
        showfield = jQuery(this).parents('td').find('.pgr-imgs-preview');
        var multiple_img = jQuery(this).attr('data-multiple');
        multiple_img = (typeof (multiple_img) != 'undefined' && multiple_img == 'true') ? true : false;
        if (typeof wp == "undefined" || PgrAdmin.new_ui != '1') { // check for media uploader
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            window.original_send_to_editor = window.send_to_editor;
            window.send_to_editor = function (html) {
                if (imgfield) {
                    var mediaurl = $('img', html).attr('src');
                    $('#' + imgfield).val(mediaurl);
                    showfield.html('<img src="' + mediaurl + '" />');
                    tb_remove();
                    imgfield = '';
                } else {
                    window.original_send_to_editor(html);
                }
            };
            return false;
        } else {
            var file_frame;
            //window.formfield = '';
            //new media uploader
            var button = jQuery(this);
            // If the media frame already exists, reopen it.
            if (file_frame) {
                file_frame.open();
                return;
            }
            if (multiple_img == true) {
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: button.data('title'),
                    button: {
                        text: button.data('button-text'),
                    },
                    multiple: true  // Set to true to allow multiple files to be selected
                });
            } else {
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    frame: 'post',
                    state: 'insert',
                    title: button.data('title'),
                    button: {
                        text: button.data('button-text'),
                    },
                    multiple: false  // Set to true to allow multiple files to be selected
                });
            }
            file_frame.on('menu:render:default', function (view) {
                // Store our views in an object.
                var views = {};
                // Unset default menu items
                view.unset('library-separator');
                view.unset('gallery');
                view.unset('featured-image');
                view.unset('embed');
                // Initialize the views in our view object.
                view.set(views);
            });
            // When an image is selected, run a callback.
            file_frame.on('select', function () {
                // Get selected size from media uploader
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                selection.each(function (attachment, index) {
                    attachment = attachment.toJSON();
                    // Selected attachment url from media uploader
                    var attachment_id = attachment.id ? attachment.id : '';
                    if (attachment_id && attachment.sizes && multiple_img == true) {
                        var attachment_url = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                        var attachment_edit_link = attachment.editLink ? attachment.editLink : '';
                        showfield.append('\
                            <div class="pgr-img-outter">\
                                <div class="pgr-img-tools pgr-hide">\
                                    <span class="pgr-tool-icon pgr-edit-img dashicons dashicons-edit" title="' + PgrAdmin.img_edit_popup_text + '"></span>\
                                    <a href="' + attachment_edit_link + '" target="_blank" title="' + PgrAdmin.attachment_edit_text + '"><span class="pgr-tool-icon pgr-edit-attachment dashicons dashicons-visibility"></span></a>\
                                    <span class="pgr-tool-icon pgr-del-tool pgr-del-img dashicons dashicons-no" title="' + PgrAdmin.img_delete_text + '"></span>\
                                </div>\
                                <img class="pgr-img" src="' + attachment_url + '" alt="" />\
                                <input type="hidden" class="pgr-attachment-no" name="pgr_img[]" value="' + attachment_id + '" />\
                            </div>\
                                ');
                        showfield.find('.pgr-img-placeholder').hide();
                    }
                });
            });
            // When an image is selected, run a callback.
            file_frame.on('insert', function () {
                // Get selected size from media uploader
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                selection.each(function (attachment, index) {
                    attachment = attachment.toJSON();
                    // Selected attachment url from media uploader
                    var attachment_url = attachment.sizes[selected_size].url;
                    // place first attachment in field
                    $('#' + imgfield).val(attachment_url);
                    showfield.html('<img src="' + attachment_url + '" />');
                });
            });
            // Finally, open the modal
            file_frame.open();
        }
    });
    // Remove Single Gallery Image
    $(document).on('click', '.pgr-del-img', function () {
        $(this).closest('.pgr-img-outter').fadeOut(300, function () {
            $(this).remove();
            if ($('.pgr-img-outter').length == 0) {
                $('.pgr-img-placeholder').show();
            }
        });
    });
    // Remove All Gallery Image
    $(document).on('click', '.pgr-del-gallery-imgs', function () {
        var ans = confirm('Are you sure to remove all images from this gallery!');
        if (ans) {
            $('.pgr-gallery-imgs-wrp .pgr-img-outter').remove();
            $('.pgr-img-placeholder').fadeIn();
        }
    });
    // Image ordering (Drag and Drop)
    $('.pgr-gallery-imgs-wrp').sortable({
        items: '.pgr-img-outter',
        cursor: 'move',
        scrollSensitivity: 40,
        forcePlaceholderSize: true,
        forceHelperSize: false,
        helper: 'clone',
        opacity: 0.8,
        placeholder: 'pgr-gallery-placeholder',
        containment: '.pgr-post-sett-table',
        start: function (event, ui) {
            ui.item.css('background-color', '#f6f6f6');
        },
        stop: function (event, ui) {
            ui.item.removeAttr('style');
        }
    });
    // Open Attachment Data Popup
    $(document).on('click', '.pgr-img-outter .pgr-edit-img', function () {   
        $('.pgr-img-data-wrp').show();
        $('.pgr-popup-overlay').show();
        $('body').addClass('pgr-no-overflow');
        $('.pgr-img-loader').show();
        var current_obj = $(this);
        var attachment_id = current_obj.closest('.pgr-img-outter').find('.pgr-attachment-no').val();
        var data = {
            action: 'pgr_get_attachment_edit_form',
            attachment_id: attachment_id
        };
        $.post(ajaxurl, data, function (response) {
            var result = $.parseJSON(response);
            if (result.success == 1) {
                $('.pgr-img-data-wrp  .pgr-popup-body-wrp').html(result.data);
                $('.pgr-img-loader').hide();
            }
        });
    });
    // Close Popup
    $(document).on('click', '.pgr-popup-close', function () {
        pgr_hide_popup();
    });
    // `Esc` key is pressed
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            pgr_hide_popup();
        }
    });
    // Save Attachment Data
    $(document).on('click', '.pgr-save-attachment-data', function () {
        var current_obj = $(this);
        current_obj.attr('disabled', 'disabled');
        current_obj.parent().find('.spinner').css('visibility', 'visible');
        var data = {
            action: 'pgr_save_attachment_data',
            attachment_id: current_obj.attr('data-id'),
            form_data: current_obj.closest('form.pgr-attachment-form').serialize()
        };
        $.post(ajaxurl, data, function (response) {
            var result = $.parseJSON(response);
            if (result.success == 1) {
                current_obj.closest('form').find('.pgr-success').html(result.msg).fadeIn().delay(3000).fadeOut();
            } else if (result.success == 0) {
                current_obj.closest('form').find('.pgr-error').html(result.msg).fadeIn().delay(3000).fadeOut();
            }
            current_obj.removeAttr('disabled', 'disabled');
            current_obj.parent().find('.spinner').css('visibility', '');
        });
    });
});
// Function to hide popup
function pgr_hide_popup() {
    jQuery('.pgr-img-data-wrp').hide();
    jQuery('.pgr-popup-overlay').hide();
    jQuery('body').removeClass('pgr-no-overflow');
    jQuery('.pgr-img-data-wrp  .pgr-popup-body-wrp').html('');
}