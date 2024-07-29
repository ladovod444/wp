<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="burger_single_product cf">
        <div class="summary entry-summary cf">
            <?php
                //Remove the rating and meta
                remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
                remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
                do_action( 'woocommerce_single_product_summary' ); ?>
        </div><!-- .summary -->

        <div class="image_holder">
            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
        </div>
	</div>
	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->