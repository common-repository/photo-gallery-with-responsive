jQuery(document).ready(function($) {	
	// For photo gallery with responsive Slider
	$( '.pgr-gallery-slider' ).each(function( index ) {		
		var slider_id   = $(this).attr('id');
		var slider_conf = $.parseJSON( $(this).closest('.pgr-gallery-slider-wrp').find('.pgr-gallery-slider-conf').text());
		jQuery('#'+slider_id).slick({
			dots			: (slider_conf.dots) == "true" ? true : false,
			infinite		: true,
			arrows			: (slider_conf.arrows) == "true" ? true : false,
			speed			: parseInt(slider_conf.speed),
			autoplay		: (slider_conf.autoplay) == "true" ? true : false,
			autoplaySpeed	: parseInt(slider_conf.autoplay_interval),
			slidesToShow	: parseInt(slider_conf.slidestoshow),
			slidesToScroll	: parseInt(slider_conf.slidestoscroll),
			rtl             : (Raigl.is_rtl == 1) ? true : false,
			prevArrow: "<div class='slick-prev'><i class='fa fa-angle-left'></i></div>",
            nextArrow: "<div class='slick-next'><i class='fa fa-angle-right'></i></div>",
			mobileFirst    	: (Raigl.is_mobile == 1) ? true : false,
			responsive 		: [{
				breakpoint 	: 1023,
				settings 	: {
					slidesToShow 	: (parseInt(slider_conf.slidestoshow) > 3) ? 3 : parseInt(slider_conf.slidestoshow),
					slidesToScroll 	: 1,
					dots 			: (slider_conf.dots) == "true" ? true : false,
				}
			},{
				breakpoint	: 767,	  			
				settings	: {
					slidesToShow 	: (parseInt(slider_conf.slidestoshow) > 2) ? 2 : parseInt(slider_conf.slidestoshow),
					slidesToScroll 	: 1,
					dots 			: (slider_conf.dots) == "true" ? true : false,
				}
			},
			{
				breakpoint	: 479,
				settings	: {
					slidesToShow 	: 1,
					slidesToScroll 	: 1,
					dots 			: false,
				}
			},
			{
				breakpoint	: 319,
				settings	: {
					slidesToShow 	: 1,
					slidesToScroll 	: 1,
					dots 			: false,
				}
			}]
		});
	});	
	// Popup Gallery
	$( '.pgr-popup-gallery' ).each(function( index ) {
		var gallery_id = $(this).attr('id');
		if( typeof('gallery_id') !== 'undefined' && gallery_id != '' ) { //.slick-image-slide:not(.slick-cloned) a
			$('#'+gallery_id).magnificPopup({
				delegate: '.pgr-cnt-wrp:not(.slick-cloned) a.pgr-img-link',
				type: 'image',
				mainClass: 'pgr-mfp-popup',
				tLoading: 'Loading image #%curr%...',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.closest('.pgr-img-outter').find('.pgr-img').attr('title');
					}
				},
				zoom: {
					enabled: true,
					duration: 300, // don't foget to change the duration also in CSS
					opener: function(element) {
						return element.closest('.pgr-img-outter').find('.pgr-img');
					}
				}
			});
		}
	});
});
 jQuery(document).ready(function($) {
    /* Logo Slider Filter */ 
    jQuery('.wpoh-filtr-row').filterizr({      
      selector  : '.wpoh-filtr-row',
      layout    : 'sameWidth',
    });    
    jQuery(document).on('click', '.pgr-tabs-outter li', function($){
      jQuery('.pgr-tab').removeClass('pgr-tab-current');
      jQuery(this).addClass('pgr-tab-current');
    });
});