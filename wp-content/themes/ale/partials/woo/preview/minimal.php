<div <?php post_class('minimal-item'); ?>>
    <?php
    echo '<div class="product_holder">';
    do_action( 'woocommerce_before_shop_loop_item_title' );
        echo '<div class="cart_hover font_two">';
            //Remove the closing link tag
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
            do_action( 'woocommerce_after_shop_loop_item' );
        echo '</div>';
    echo '</div>';

    do_action( 'woocommerce_before_shop_loop_item' );
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 );
    do_action( 'woocommerce_shop_loop_item_title' );

    //Remove the rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
</div>