jQuery(function($) {

    "use strict";

    $(document).ready(function() {
        $(".woocommerce-ordering .orderby").select2({
            minimumResultsForSearch: Infinity
        });

        $(".ale_single_product_page .variations select").select2({
            minimumResultsForSearch: Infinity
        });
    });

});