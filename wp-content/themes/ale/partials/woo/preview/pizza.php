<div <?php global $product; wc_product_class( '', $product ); ?>>
    <div class="font_one"><?php  do_action('delizioso_shop_loop_price'); ?></div>
    <div class="title_and_cart">
        <div class="title_container">
            <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
        </div>
        <div class="cart_button_container">
            <?php  do_action('delizioso_shop_loop_cart_button'); ?>
        </div>
    </div>
    <?php  do_action('delizioso_shop_loop_excerpt'); ?>
    <div class="product_image">
        <?php 
            do_action( 'woocommerce_before_shop_loop_item' );
            do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>
    </div>
    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>