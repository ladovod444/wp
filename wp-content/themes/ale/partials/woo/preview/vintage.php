<div <?php post_class('grid-item vintage-item'); ?>>
    <?php
    echo '<div class="image_holder">';
        do_action( 'woocommerce_before_shop_loop_item_title' );
    echo '</div>';

    do_action( 'woocommerce_before_shop_loop_item' );
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 );
    do_action( 'woocommerce_shop_loop_item_title' );

    echo wc_get_product_category_list( '', ', ', '<span class="woo_category">', '</span>' );
    echo '<div class="shop_separator"></div>';
    echo '<div class="bottom_shop_item font_two">';

    //Remove the rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    do_action( 'woocommerce_after_shop_loop_item_title' );

    //Remove the closing link tag
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    do_action( 'woocommerce_after_shop_loop_item' );
    echo '</div>';  ?>
</div>