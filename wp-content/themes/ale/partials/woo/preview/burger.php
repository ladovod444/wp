<div <?php post_class('grid-item burger-shop-item'); ?>>
    <?php
    //Open Link
    do_action( 'woocommerce_before_shop_loop_item' );
    remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);

    //Show title
    echo '<a href="'.esc_url(get_permalink()).'">';
        do_action( 'woocommerce_shop_loop_item_title' );
    echo '</a>';

    //Show categvory
    echo wc_get_product_category_list('', ', ', '<div class="woo_category">', '</div>' );

    //Remove the rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    //Show Price
    do_action( 'woocommerce_after_shop_loop_item_title' );

    //Remove the closing link tag
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

    //Show Add to cart button
    do_action( 'woocommerce_after_shop_loop_item' );

    //Show the image
    echo '<div class="image_holder">';
        echo '<a href="'.esc_url(get_permalink()).'">';
            do_action( 'woocommerce_before_shop_loop_item_title' );
       echo '</a>';
    echo '</div>';
    ?>
</div>  