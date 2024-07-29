<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="shop-item_ins cf">
        <div class="first_part">
            <?php
            add_action('ale_exotico_woocommerce_part_first','woocommerce_template_single_title',21);
            add_action('ale_exotico_woocommerce_part_first','woocommerce_template_single_excerpt',22);
            add_action('ale_exotico_woocommerce_part_first','woocommerce_template_single_price',23);
            do_action( 'ale_exotico_woocommerce_part_first' ); ?>
        </div>
        <div class="second_part">
            <?php
            add_action('ale_exotico_woocommerce_part_second','ale_exotico_custom_single_image',10);
            do_action( 'ale_exotico_woocommerce_part_second' ); ?>
        </div>
        <div class="third_part">
            <?php
            add_action('ale_exotico_woocommerce_part_third','woocommerce_template_single_add_to_cart',10);
            do_action('ale_exotico_woocommerce_part_third'); ?>
        </div>
    </div>
    <?php
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    do_action( 'woocommerce_after_single_product_summary' ); ?>
    <meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->