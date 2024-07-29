<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content_product_box cf">
	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
    <?php
        $bg_image = '';
        if(ale_get_meta('shop_bg_product') and ale_get_option('woo_grid_style') == 'keira'){
            $bg_image = 'style="background: url('.ale_get_meta('shop_bg_product').') no-repeat top left;"';
        }
    ?>
	<div class="summary entry-summary cf" <?php echo ale_wp_kses($bg_image); ?>>
		<?php
			//Remove the rating
			if(!in_array(ale_get_option('woo_grid_style'), array('vintage','rosi','keira','delizioso'))) {
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			}
			do_action( 'woocommerce_single_product_summary' );

            if(ale_get_option('woo_grid_style')=='minimal' or ale_get_option('woo_grid_style') == 'fashion') {

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
            }?>
	</div><!-- .summary -->
	</div>
	<?php 
        if(ale_get_option('woo_grid_style')=='minimal' or ale_get_option('woo_grid_style')=='fashion') {
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
        }
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->