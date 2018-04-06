/*global jQuery:false */
(function($) {

  var wow = new WOW({
    boxClass: 'wow', // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset: 0, // distance to the element when triggering the animation (default is 0)
    mobile: false // trigger animations on mobile devices (true is default)
  });
  wow.init();

  //jQuery to collapse the navbar on scroll
  $(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
      $(".navbar-fixed-top").addClass("top-nav-collapse");
      $(".top-area").addClass("top-padding");
      $(".navbar-brand").addClass("reduce");

      $(".navbar-custom ul.nav ul.dropdown-menu").css("margin-top", "11px");

    } else {
      $(".navbar-fixed-top").removeClass("top-nav-collapse");
      $(".top-area").removeClass("top-padding");
      $(".navbar-brand").removeClass("reduce");

      $(".navbar-custom ul.nav ul.dropdown-menu").css("margin-top", "16px");

    }
  });

	var navMain = $(".navbar-collapse"); 
	navMain.on("click", "a:not([data-toggle])", null, function () {
	   navMain.collapse('hide');
	});

  //scroll to top
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

  //jQuery for page scrolling feature - requires jQuery Easing plugin
  $(function() {
    $('.navbar-nav li a').bind('click', function(event) {
      var $anchor = $(this);
      var nav = $($anchor.attr('href'));
      if (nav.length) {
        $('html, body').stop().animate({
          scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

        event.preventDefault();
      }
    });
    $('.page-scroll a').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1500, 'easeInOutExpo');
      event.preventDefault();
    });
  });

  //owl carousel
  $('#owl-works').owlCarousel({
    items: 4,
    itemsDesktop: [1199, 5],
    itemsDesktopSmall: [980, 5],
    itemsTablet: [768, 5],
    itemsTabletSmall: [550, 2],
    itemsMobile: [480, 2],
  });


  // (function($, window, document, undefined) {

  //   var gridContainer = $('#grid-container'),
  //     filtersContainer = $('#filters-container');

  //   // init cubeportfolio
  //   gridContainer.cubeportfolio({

  //     defaultFilter: '*',

  //     animationType: 'sequentially',

  //     gapHorizontal: 50,

  //     gapVertical: 40,

  //     gridAdjustment: 'responsive',

  //     caption: 'fadeIn',

  //     displayType: 'lazyLoading',

  //     displayTypeSpeed: 100,

  //     // lightbox
  //     lightboxDelegate: '.cbp-lightbox',
  //     lightboxGallery: true,
  //     lightboxTitleSrc: 'data-title',
  //     lightboxShowCounter: true,

  //     // singlePage popup
  //     singlePageDelegate: '.cbp-singlePage',
  //     singlePageDeeplinking: true,
  //     singlePageStickyNavigation: true,
  //     singlePageShowCounter: true,
  //     singlePageCallback: function(url, element) {

  //       // to update singlePage content use the following method: this.updateSinglePage(yourContent)
  //       var t = this;

  //       $.ajax({
  //           url: url,
  //           type: 'GET',
  //           dataType: 'html',
  //           timeout: 5000
  //         })
  //         .done(function(result) {
  //           t.updateSinglePage(result);
  //         })
  //         .fail(function() {
  //           t.updateSinglePage("Error! Please refresh the page!");
  //         });

  //     },

  //     // singlePageInline
  //     singlePageInlineDelegate: '.cbp-singlePageInline',
  //     singlePageInlinePosition: 'above',
  //     singlePageInlineShowCounter: true,
  //     singlePageInlineInFocus: true,
  //     singlePageInlineCallback: function(url, element) {
  //       // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
  //     }
  //   });

  //   // add listener for filters click
  //   filtersContainer.on('click', '.cbp-filter-item', function(e) {

  //     var me = $(this),
  //       wrap;

  //     // get cubeportfolio data and check if is still animating (reposition) the items.
  //     if (!$.data(gridContainer[0], 'cubeportfolio').isAnimating) {

  //       if (filtersContainer.hasClass('cbp-l-filters-dropdown')) {
  //         wrap = $('.cbp-l-filters-dropdownWrap');

  //         wrap.find('.cbp-filter-item').removeClass('cbp-filter-item-active');

  //         wrap.find('.cbp-l-filters-dropdownHeader').text(me.text());

  //         me.addClass('cbp-filter-item-active');
  //       } else {
  //         me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
  //       }

  //     }

  //     // filter the items
  //     gridContainer.cubeportfolio('filter', me.data('filter'), function() {});

  //   });

  //   // activate counter for filters
  //   gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'));

  // })(jQuery, window, document);


})(jQuery);
$(window).on('load', function() {
  $(".loader").delay(100).fadeOut();
  $("#page-loader").delay(100).fadeOut("fast");
});
