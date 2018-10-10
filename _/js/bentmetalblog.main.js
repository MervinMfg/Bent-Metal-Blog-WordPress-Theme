/**
 * 1819 Bent Metal Blog WordPress Theme Template - http://www.mervin.com
 * Author: brian.behrens@mervin.com & tony.keller@mervin.com - http://www.mervin.com
 */

var BENTMETALBLOG = BENTMETALBLOG || {};

BENTMETALBLOG.Main = {
	config: {
		wpImgPath: '/wp-content/themes/Bent-Metal-Blog-WordPress-Theme/_/img/'
	},
	init: function () {
		var self, $body, shop, hash, hashIndex;
    self = this;
    $body = $('body');
		// init global components
		new BENTMETALBLOG.Search();
		new BENTMETALBLOG.SearchResults();
		new BENTMETALBLOG.Blog();
		new BENTMETALBLOG.BlogSingle();
		// lazy load of images
		// $("img.lazy").unveil(0, function() {
		// 	$(this).on('load', function() {
		// 		$(this).addClass('loaded');
		// 		$(this).off('load');
		// 	});
		// });
	},
	utilities: {
		events: {
			listen: function (eventName, callback) {
				if(document.addEventListener) {
					document.addEventListener(eventName, callback, false);
				} else {
					document.documentElement.attachEvent('onpropertychange', function (e) {
						if(e.propertyName  == eventName) {
							callback();
						}
					});
				}
			},
			trigger: function (eventName) {
				if(document.createEvent) {
					var event = document.createEvent('Event');
					event.initEvent(eventName, true, true);
					document.dispatchEvent(event);
				} else {
					document.documentElement[eventName]++;
				}
			}
		},
		cookie: {
			getCookie: function (name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for (var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') c = c.substring(1, c.length);
					if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
				}
				return null;
			},
			setCookie: function (name, value, days) {
				var date, expires;
				if (days) {
					date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					expires = "; expires=" + date.toGMTString();
				} else {
					expires = "";
				}
				document.cookie = name + "=" + value + expires + "; path=/";
			}
		},
		pageScroll: function (hash, duration, updateLocation) {
			var yPosition;
			// make sure of leading #
			hashIndex = hash.indexOf('#');
			hash = hash.substr(hashIndex);
			// check duration
			if (typeof duration === 'undefined') {
				duration = 1;
			}
			if (typeof updateLocation === 'undefined') {
				updateLocation = true;
			}
			// Smooth Page Scrolling, update hash on complete of animation
			yPosition = $(hash).offset().top;
			TweenMax.to(window, duration, {scrollTo:{y: yPosition, x: 0}, onComplete: function () { if (updateLocation) window.location = hash; }});
		},
		responsiveCheck: function() {
			var size;
			if ( $('.responsive-check .breakpoint-small').css('display') == 'block' ) {
				size = 'small';
			} else if ( $('.responsive-check .breakpoint-medium').css('display') == 'block' ) {
				size = 'medium';
			} else if ( $('.responsive-check .breakpoint-large').css('display') == 'block' ) {
				size = 'large';
			} else {
				size = 'base';
			}
			return size;
		},
		addLink: function () {
			//get selected text and append source link
			var selection = window.getSelection();
			if (selection.toString().length > 50) {
				var pageLink = '<br /><br /> Read more at: ' + document.location.href;
				var copyText = selection + pageLink;
				var newDiv = document.createElement('div');
				//hide new contatiner
				newDiv.style.position = 'absolute';
				newDiv.style.left = '-99999px';
				//insert contatiner, fill with text and define selection
				document.body.appendChild(newDiv);
				newDiv.innerHTML = copyText;
				selection.selectAllChildren(newDiv);
				window.setTimeout(function () {
					document.body.removeChild(newDiv);
				}, 100);
			}
		},
	}
};
