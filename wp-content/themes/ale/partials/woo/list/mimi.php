<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('woo_sidebar_position');
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
    } 
?>
<div class="wrapper content_wrapper alekids_shop_archive <?php  echo esc_attr($sidebar_class); ?> cf">
    <?php if($ale_sidebar_position  !== 'no'){
        do_action( 'woocommerce_sidebar' );
	} ?>    
    <div class="ale_blog_archive shop_content cf">
        <?php do_action( 'woocommerce_before_main_content' ); ?>
        <header class="woocommerce-products-header">
            <?php do_action( 'woocommerce_archive_description' ); ?>
        </header>
        <?php if ( woocommerce_product_loop() ) {
            echo '<div class="top_shop_archive">';
                do_action( 'woocommerce_before_shop_loop' );
            echo '</div>';
            do_action('alekids_custom_woo_notices');
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