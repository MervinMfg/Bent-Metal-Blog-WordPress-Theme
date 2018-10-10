/**
 * Bent Metal Binding Works WordPress Theme Template - http://www.bentmetal.com
 * Author: brian.behrens@mervin.com & tony.keller@mervin.com - http://www.mervin.com
 */

var BENTMETAL = BENTMETAL || {};

BENTMETAL.Gallery = function() {
  this.config = {
    totalItems: 0,
    gallerySlider: null,
    gallerySLiderNav: null
  };
  this.init();
};

BENTMETAL.Gallery.prototype = {
  init: function() {
    var self = this;
    // check for gallery
    if ($('.gallery')) {
      // set up gallery slider
      self.config.gallerySlider = $('.gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: 'ondemand',
        fade: false,
        adaptiveHeight: true,
        asNavFor: '.gallery-nav',
        responsive: [
        {
          breakpoint: 3000,
          settings: {
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false
          }
        }]
      });
      self.config.gallerySLiderNav = $('.gallery-nav').slick({
        slidesToScroll: 1,
        asNavFor: '.gallery',
        lazyLoad: 'ondemand',
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 3000,
          settings: {
            slidesToShow: 5
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        }]
      });
    }
  }
};
