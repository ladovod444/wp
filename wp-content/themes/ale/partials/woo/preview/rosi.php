<div <?php post_class('grid-item rosi-item font_two'); ?>>
    <?php do_action( 'woocommerce_before_shop_loop_item' );
    echo '<div class="mask_rosi_product">';
    do_action( 'woocommerce_before_shop_loop_item_title' );
    echo '<div class="border_one"></div><div class="border_two"></div><div class="quickview font_two"><span>'.esc_html__('quick view','ale').'</span></div></div><!-- close -->';
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
    do_action( 'woocommerce_shop_loop_item_title' );

    //Remove the rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );
    do_action( 'woocommerce_after_shop_loop_item_title' );

    //Remove the closing link tag and add to cart button
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>