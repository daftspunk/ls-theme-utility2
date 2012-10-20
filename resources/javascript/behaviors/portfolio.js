/**
 * Portfolio behavior
 */

define([
	'jquery', 
	'widget',
	'utility/popup', 
	'foundation/orbit',
	'foundation/reveal',
	'vendor/carousel/js/jquery.jcarousel'
	], function($){

	return function(element, config) {
		var self = this;
		self.element = element = $(element);

		var defaults = {
			thumb_width: 75,
			thumb_height: 75,
			use_popup: true // Display full size images in a popup
		};
		self.config = config = $.extend(true, defaults, config);

		var element_id = element.attr('id');
		var popup_id = element_id+'_popup';

		// First lets clean up
		$('#'+popup_id).remove();

		// Then dress up
		element.wrap($('<div />').attr('id', popup_id));
		var popup = $('#'+popup_id);

		// Build thumbs
		var thumb_list = $('<ul />').attr('id', element_id+'_thumbs').addClass('jcarousel-skin-ahoy');
		element.find('img').each(function(key, val){
			var image_id = $(this).attr('data-image-id');
			var thumb_src = $(this).attr('data-thumb-image');
			var anchor = $('<a />').attr({
				href: 'javascript:;',
				'data-image-count': key
			});
			var thumb = $('<img />').attr({
				src: thumb_src,
				'data-image-id': image_id,
				width: config.thumb_width,
				height: config.thumb_height
			});
			var thumb_list_anchor = anchor.append(thumb);
			thumb_list.append($('<li />').append(thumb_list_anchor));
		});
		popup.after(thumb_list);

		// Init thumbs
		setTimeout(function() { thumb_list.jcarousel({ scroll: 1 }); }, 500);

		// If we have no images, do not proceed
		if (!element.find('img').length)
			return;

		// Init Orbit
		element.not('.orbit-enabled').addClass('orbit-enabled').orbit({
			animation: 'horizontal-push',
			bullets: config.use_popup,
			captions: true,
			directionalNav: config.use_popup,
			fluid: true,
			timer: false
		});

		// Popup
		if (config.use_popup) {
			popup.popup({ 
		    	trigger: '#'+element_id+'_thumbs a',
		    	move_to_element: 'body',
		        size: 'portfolio',
		        on_open: function(link) {
		        	self.click_thumb(link);
		        }
		    });
		} else {
			$('#'+element_id+'_thumbs a').click(function() {
				self.click_thumb($(this));
			});
		}

		// When a thumb is clicked
		this.click_thumb = function(link) {
			var image_id = $(link).attr('data-image-count');
			if (image_id)
	    		element.trigger('orbit.goto', [image_id]);
		};

		this.destroy = function() {
			popup.remove();
		};

	}


});

