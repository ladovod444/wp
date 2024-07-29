<div id="product-<?php the_ID(); ?>" <?php global $product; wc_product_class( '', $product ); ?>>
	<div class="top_product">
		<div class="left_content summary entry-summary">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
		<div class="right_content">
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
</div>