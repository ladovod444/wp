<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content_product_box cf">
	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
	<div class="summary entry-summary cf">
		<?php
			function ale_laptica_single_cart_form_open(){
                echo '<div class="ale_laptica_single_cart_form_open">';
            }
            function ale_laptica_single_cart_form_close(){
                echo '</div>';
            }
			//Remove the rating
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
            add_action('woocommerce_single_product_summary','ale_laptica_single_cart_form_open',28);
            add_action('woocommerce_single_product_summary','woocommerce_template_single_price',29);
            add_action('woocommerce_single_product_summary','ale_laptica_single_cart_form_close',31);
			do_action( 'woocommerce_single_product_summary' );

			wp_enqueue_script( 'ale-woo-accordion' );

			$tabs = apply_filters( 'woocommerce_product_tabs', array() );
			if ( ! empty( $tabs ) ) : ?>
				<div id="accordion-container" class="woocommerce-tabs wc-tabs-wrapper minimal-accordion-container">
					<?php foreach ( $tabs as $key => $tab ) : ?>
						<h1 class="<?php echo esc_attr( $key ); ?>_tab">
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title',
								esc_html( $tab['title'] ),
								$key ); ?>
						</h1>
						<div id="tab-<?php echo esc_attr( $key ); ?>">
							<?php call_user_func( $tab['callback'], $key, $tab ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;
		?>
	</div><!-- .summary -->
	</div>
	<?php
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->