<div <?php post_class('grid-item moka-shop-item'); ?>>
    <div class="image_holder olins_do_fadein delay200" <?php if(ale_get_meta('shop_bg_product')){ echo 'style="background: url('.ale_get_meta('shop_bg_product').') no-repeat left top;"'; } ?> >
        <?php
        do_action( 'woocommerce_before_shop_loop_item' );
        add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
        do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>
    </div>
    <div class="data_holder olins_do_fadein delay400">
        <?php
        add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',9);
        add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
        do_action( 'woocommerce_shop_loop_item_title' );

        //Show categvory
        echo wc_get_product_category_list('', ', ', '<div class="woo_category">', '</div>' );

        remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
        remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
        add_action('woocommerce_after_shop_loop_item_title','the_excerpt',10);
        do_action( 'woocommerce_after_shop_loop_item_title' );
        remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
        do_action( 'woocommerce_after_shop_loop_item' ); ?>
    </div>
</div>