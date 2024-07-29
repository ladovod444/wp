(function ($) {
    $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/alekids_timeline.default", function ($scope, $) {
        "use strict";

        if($('.alekids_timeline').length){
            $('.alekids_timeline').slick({
                infinite: true,
                autoplay: true,
                arrows: true,
                nextArrow: '<button type="button" style="margin-top:10px;" class="slick-next">Next (Displays in Admin Area only)</button>',
                prevArrow: '<button type="button" style="margin-bottom:15px;" class="slick-prev">Previous (Displays in Admin Area only)</button>',
                slidesToShow: 4,
                slidesToScroll: 1,
                dots:false,
                swipe: true,
            });
        }
      });
    });
})(jQuery);
  