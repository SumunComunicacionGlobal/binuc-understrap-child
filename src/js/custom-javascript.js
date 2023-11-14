// Add your custom JS here.

jQuery(document).ready(function($) {
	var body = $('body');
  var scrolled = false;
  var navbarClasses = $('#main-nav').attr('class');

  jQuery(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 25) {
			body.addClass("scrolled");
      scrolled = true;
      // $('#main-nav').removeClass('navbar-dark');
      // $('#main-nav').addClass('navbar-light');
    } else {
			body.removeClass("scrolled");
      scrolled = false;
      // $('#main-nav').removeClass('navbar-light navbar-dark').addClass(navbarClasses);
    }

	   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	       body.addClass("near-bottom");
	   } else {
			body.removeClass("near-bottom");
	   }

	});

  $('#navbarNavDropdown').on('show.bs.collapse', function () {
    body.addClass('menu-open');
  });

  $('#navbarNavDropdown').on('hide.bs.collapse', function () {
    body.removeClass('menu-open');
  });

  $('.sub-menu-toggler').click(function(e) {
    e.preventDefault();
    $(this).parent().next().toggleClass('show');
    $(this).parent().parent().toggleClass('show');
  });


  $('.slick-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide ) {
    $(this).closest('.slick-slider-wrapper').find('.slick-count-item').removeClass('slick-active');
    $(this).closest('.slick-slider-wrapper').find('.slick-count-item[data-slide="' + nextSlide + '"]').addClass('slick-active');
  });

  $('.slick-count-item').bind('click', function(e) {
    e.preventDefault();
    $(this).closest('.slick-slider-wrapper').find('.slick-slider').slick('slickGoTo', $(this).attr('data-slide') );
  });

});


/* Carruseles */

jQuery('.slick-carousel, .wp-block-group.is-style-slick-carousel > .wp-block-group__inner-container, .wp-block-gallery.is-style-slick-carousel').slick({
  dots: true,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false
});