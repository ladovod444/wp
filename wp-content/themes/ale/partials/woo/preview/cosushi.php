<div <?php post_class('grid-item cosushi-item'); ?>>
    <div class="left_image">
        <?php
        do_action( 'woocommerce_before_shop_loop_item' );

        add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
        
        do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>
    </div>
    <div class="right_data">
        <?php

        echo '<div class="product_title">';
            add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
            add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );
        
            do_action( 'woocommerce_shop_loop_item_title' );

            echo '<div class="separator"></div>';

            //Remove the rating
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            do_action( 'woocommerce_after_shop_loop_item_title' );
        echo '</div>';

        echo wc_get_product_category_list('', ', ', '<div class="woo_category">', '</div>' );

        //Remove the closing link tag and add to cart button
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
        do_action( 'woocommerce_after_shop_loop_item' );
        ?>
    </div>
</div>