<div class="wrapper content_wrapper delizioso_shop">
    <div class="shop_content cf">
        <?php do_action( 'woocommerce_before_main_content' ); ?>
        <header class="woocommerce-products-header">
            <?php do_action( 'woocommerce_archive_description' ); ?>
        </header>

        <?php
        if ( woocommerce_product_loop() ) {
            echo '<div class="top_shop_archive cf">';
                do_action( 'woocommerce_before_shop_loop' );
            echo '</div>';
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();

                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();

            do_action( 'woocommerce_after_shop_loop' );
        } else {
            do_action( 'woocommerce_no_products_found' );
        }

        do_action( 'woocommerce_after_main_content' ); ?>
	</div>
</div>