<div <?php post_class('grid-item keira-shop-item'); ?>>
    <?php
    remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
    do_action( 'woocommerce_before_shop_loop_item' );
    add_action('woocommerce_before_shop_loop_item_title','ale_show_custom_keira_thumbnail',10);
    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
    do_action( 'woocommerce_before_shop_loop_item_title' );
    add_action('woocommerce_shop_loop_item_title','ale_start_custom_keira_data',5);
    add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',9);
    add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
    do_action( 'woocommerce_shop_loop_item_title' );
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
    add_action('woocommerce_after_shop_loop_item_title','the_excerpt',10);
    do_action( 'woocommerce_after_shop_loop_item_title' );
    remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
    add_action('woocommerce_after_shop_loop_item','ale_end_custom_keira_data',100);
    do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>