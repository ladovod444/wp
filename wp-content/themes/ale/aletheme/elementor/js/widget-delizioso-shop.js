(function ($) {
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/delizioso_shop.default", function ($scope, $) {
      "use strict";

        if($('.delizioso_product_slider').length){
          var columns = $('.delizioso_product_slider .products').data('columns');

          $('.delizioso_product_slider .products').slick({
              infinite: true,
              autoplay: false,
              arrows: true,
              slidesToShow: columns,
              slidesToScroll: 1,
              dots:false,
              prevArrow: '<button type="button" class="slick-prev">Prev</button>',
              nextArrow: '<button type="button" class="slick-next">Next</button>',
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
          });
        }
    });
  });
})(jQuery);
