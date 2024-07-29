<div <?php post_class('grid-item kitty-item font_two'); ?>>
    <?php
    do_action( 'woocommerce_before_shop_loop_item' );
    add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
    do_action( 'woocommerce_before_shop_loop_item_title' );
    echo wc_get_product_category_list('', ', ', '<div class="woo_category">', '</div>' );
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );
    do_action( 'woocommerce_shop_loop_item_title' );

    //Remove the rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    echo '<div class="bottom_price">';
        do_action( 'woocommerce_after_shop_loop_item_title' );

        //Remove the closing link tag and add to cart button
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
        do_action( 'woocommerce_after_shop_loop_item' );
    echo '</div>'; ?>
</div>