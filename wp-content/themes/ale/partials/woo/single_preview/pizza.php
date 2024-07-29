<div id="product-<?php the_ID(); ?>" <?php global $product; wc_product_class( '', $product ); ?>>
	<div class="top_product">
		<div class="summary entry-summary">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
		<div class="left_content">
			<div class="image_holder">
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			</div>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_single_product_summary' );?>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>