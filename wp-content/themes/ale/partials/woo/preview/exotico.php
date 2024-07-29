<div <?php post_class('exotico-shop-item'); ?>>
    <?php do_action( 'woocommerce_before_shop_loop_item' );

    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
    add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',15);
    do_action( 'woocommerce_before_shop_loop_item_title' );
    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
    add_action('woocommerce_shop_loop_item_title','ale_exotico_custom_title',13);
    do_action( 'woocommerce_shop_loop_item_title' );
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
    do_action( 'woocommerce_after_shop_loop_item_title' );
    remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
    remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
    add_action('woocommerce_after_shop_loop_item','ale_exotico_custom_button',11);
    do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>