/**
 * 1819 Bent Metal Blog WordPress Theme - http://www.gnu.com
 * Authors: brian.behrens@mervin.com & tony.keller@mervin.com - http://www.mervin.com
 */

var BENTMETALBLOG = BENTMETALBLOG || {};

BENTMETALBLOG.Blog = function (scrollController) {
	this.init();
};
BENTMETALBLOG.Blog.prototype = {
	init: function () {
		console.log('init');
		var self = this;
		$(document).ready(function(){
			self.setNavigation();
		});
		// lazy load blog overview images
    $('.post-image-wrapper img.lazy').unveil(0, function() {
			$(this).on('load', function() {
				console.log('image loaded');
				$(this).addClass('loaded');
				$(this).off('load');
			});
		});
	},
	setNavigation: function() {
		var str = location.href.toLowerCase();
		$('.filters li a').each(function() {
			if (str.indexOf(this.href.toLowerCase()) > -1) {
				$('li.active').removeClass('active');
				$(this).parent().addClass('active');
			}
	 });
	}
};
