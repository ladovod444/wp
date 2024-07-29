<div <?php post_class('grid-item'); ?>>
	<?php
	//Add border transition container start
	ale_hover_border_wrapper_start();

	do_action( 'woocommerce_before_shop_loop_item' );

	//Add a closing link tag
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 );

	do_action( 'woocommerce_before_shop_loop_item_title' );

	//Add border transition container end
	ale_hover_border_wrapper_end();

	echo wc_get_product_category_list('', ', ', '<span class="woo_category">', '</span>' );

	do_action( 'woocommerce_shop_loop_item_title' );

	//Remove the rating
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

	do_action( 'woocommerce_after_shop_loop_item_title' );

	//Remove the closing link tag
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>