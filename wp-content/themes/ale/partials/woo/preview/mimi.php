<div <?php global $product; wc_product_class( '', $product ); ?>>
	<?php do_action('alekids_custom_product_sale'); ?>
	<div class="product_item_holder">
		<?php 
        do_action( 'woocommerce_before_shop_loop_item' );
        do_action( 'woocommerce_before_shop_loop_item_title' );
        do_action( 'woocommerce_shop_loop_item_title' );
        do_action( 'woocommerce_after_shop_loop_item_title' );
        do_action( 'woocommerce_after_shop_loop_item' );
		?>
		<div class="hover_content">
			<?php do_action('alekids_custom_woo_product_hover'); ?>
		</div>
	</div>
</div>