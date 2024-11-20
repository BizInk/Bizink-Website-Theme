import { Modal } from "bootstrap";

// Add your custom JS here.
jQuery(window).scroll(function () {
  var fixedtop = jQuery("header");

  if (jQuery(this).scrollTop() > 100) {
    fixedtop.addClass("fixed");
  } else {
    fixedtop.removeClass("fixed");
  }
});

/*
if (window.matchMedia("(max-width: 991px)").matches) {
  jQuery(".navbar-nav").append(".my-account");
} else {

}
*/

// #talktous
  // data-bs-toggle="modal" data-bs-target="#exampleModal"
  /*
  jQuery("a.talk-to-us").data("bs-toggle", "modal");
  jQuery("a.talk-to-us").data("bs-toggle", "#talktous");

  jQuery(".talk-to-us .nav-link").click(() => {
    console.log("talk-to-us a");
  });
  jQuery(".talk-to-us .nav-link").data("bs-toggle", "modal");
  jQuery(".talk-to-us .nav-link").data("bs-target", "#talktous");
 
  
const talktousModel = new Modal('#talktous');
jQuery("body").on("click", ".talk-to-us a, .talk-to-us", () => {
  jQuery("#talktous").modal("show");
  talktousModel.show();
});
jQuery("body").on("click", "#talktous .modal-header .close", function () {
  jQuery("#talktous").modal("toggle");
  talktousModel.hide();
});
  */


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

// Model JS
jQuery(document).ready(function () {
  // data-bs-toggle="modal" data-bs-target="#exampleModal"

  jQuery("a.talk-to-us").data("bs-toggle", "modal");
  jQuery("a.talk-to-us").data("bs-target", "#talktous");
  
  jQuery(".talk-to-us .nav-link").data("bs-toggle", "modal");
  jQuery(".talk-to-us .nav-link").data("bs-target", "#talktous");


  jQuery("body").on("click", ".live-demo a, .live-demo", function () {
    jQuery(".select-demo-picker").hide();
    jQuery(".select-country-picker").fadeIn("slow").show();
  });

  /*
  jQuery("#btnausnz").click(function () {
    jQuery(".select-country-picker").hide();
    jQuery(".ausnz-container").fadeIn("slow").show();
  });
  jQuery("#btnusacn").click(function () {
    jQuery(".select-country-picker").hide();
    jQuery(".usacn-container").fadeIn("slow").show();
  });
  jQuery("#btnukir").click(function () {
    jQuery(".select-country-picker").hide();
    jQuery(".ukir-container").fadeIn("slow").show();
  });
  jQuery("#btnmideast").click(function () {
    jQuery(".select-country-picker").hide();
    jQuery(".mideast-container").fadeIn("slow").show();
  });
  jQuery(".booking-container .back").click(function () {
    jQuery(".select-country-picker").fadeIn("slow").show();
    jQuery(".booking-container").hide();
  });
  
  */

  jQuery("body").on(
    "click",
    ".collapseBlock a.collapseBlock_header",
    function () {
      if (jQuery(this).next().hasClass("showBlock")) {
        jQuery(this).next().removeClass("showBlock");
        jQuery(this).find(".transformIconPlus_icon-minus").css("opacity", "0");
        jQuery(this).find(".transformIconPlus_icon-plus").css("opacity", "1");
        jQuery(this).next().slideUp().hide();
        jQuery(this).next().css("height", "0px");
      } else {
        jQuery(this).next().addClass("showBlock");
        jQuery(this).next().css("height", "auto");
        jQuery(this).find(".transformIconPlus_icon-minus").css("opacity", "1");
        jQuery(this).find(".transformIconPlus_icon-plus").css("opacity", "0");
        jQuery(this).next().slideDown("fast").show();
      }
    }
  );
  jQuery("#accordion .panel-heading .panel-title a").click(function () {
    var collapseID = jQuery(this).attr("href");
    if (jQuery(collapseID).css("display") == "none") {
      jQuery(collapseID).show().animate({ height: "100%" }, 500);
    } else {
      jQuery(collapseID).hide().animate({ height: "0px" }, 500);
    }
  });

});