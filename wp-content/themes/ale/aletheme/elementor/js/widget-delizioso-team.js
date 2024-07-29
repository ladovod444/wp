(function ($) {
    $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/delizioso_team.default", function ($scope, $) {
        "use strict";

        if($('.delizioso_team_members').length){

            $('.delizioso_team_members').slick({
                infinite: true,
                autoplay: false,
                arrows: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                dots:false,
                centerMode: true,
            });
        }
      });
    });
})(jQuery); 