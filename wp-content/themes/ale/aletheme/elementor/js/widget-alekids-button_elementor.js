(function ($) {
    $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/alekids_top_screen.default", function ($scope, $) {
        "use strict";

        function alekids_button_rect(svg){
            if(svg){
                var width = svg.outerWidth();
                var height = svg.outerHeight();
                var svgRect = svg.find('rect');
                var x_pos_rect = svgRect.attr('x');
                var y_pos_rect = svgRect.attr('y');
    
                if(x_pos_rect) width = width - (parseInt(x_pos_rect) * 2);
                if(y_pos_rect) height = height - (parseInt(y_pos_rect) * 2);
    
                if(width > 0 && height > 0){
                    svgRect.attr('width', width);
                    svgRect.attr('height',height);
                }
            }
        }
        if($('.alekids_dashed').length){
            $('.alekids_dashed').each(function(){
                var svg = $(this);
                alekids_button_rect(svg);
            });
        }
      });
    });
})(jQuery);
  