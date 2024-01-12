// Add your custom JS here.
jQuery(window).scroll(function () {
  var fixedtop = jQuery("header");

  if (jQuery(this).scrollTop() > 100) {
    fixedtop.addClass("fixed");
  } else {
    fixedtop.removeClass("fixed");
  }
});

if (window.matchMedia("(max-width: 991px)").matches) {
  jQuery(".navbar-nav").append(".my-account");
}
else {

}

jQuery(".logo-slider").slick({
  dots: true,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true,
      },
    },
  ],
});

jQuery(".hero-slider").slick({
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
});

jQuery(".story-slider").slick({
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
});

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
    jQuery(".scrollTop").fadeIn();
  } else {
    jQuery(".scrollTop").fadeOut();
  }
});

// Scroll To
jQuery(".scrollTop").click(function () {
  jQuery("html, body").animate(
    {
      scrollTop: 0,
    },
    800
  );
  return false;
});
