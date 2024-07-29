(function ($) {
    $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/delizioso_testimonials.default", function ($scope, $) {
        "use strict";

        if($('.delizioso_testimonials_slider').length){

          $('.delizioso_testimonials_slider').slick({
              infinite: true,
              autoplay: false,
              arrows: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              dots:false,
              fade: true,
              adaptiveHeight:true,
              prevArrow: '<button type="button" class="slick-prev">Prev</button>',
              nextArrow: '<button type="button" class="slick-next">Next</button>',
          });
        }
      });
    });
})(jQuery); 