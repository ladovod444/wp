<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('woo_sidebar_position');
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
    } 
?>
<div class="content_wrapper shop_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

	<?php if($ale_sidebar_position  !== 'no'){
        do_action( 'woocommerce_sidebar' );
	} ?>
	<div class="story ale_blog_archive content cf">
		<?php do_action( 'woocommerce_archive_description' ); ?>
		<?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php if(ale_get_option('woo_grid_style')!=='minimal' and ale_get_option('woo_grid_style') !== 'keira' and ale_get_option('woo_grid_style') !== 'burger' and ale_get_option('woo_grid_style') !== 'cosushi'){ ?>
			<div class="cf shop_heading_top">
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>
		<?php } ?>

		<?php if ( have_posts() ) : ?>
			<?php woocommerce_product_loop_start(); ?>
				<?php woocommerce_product_subcategories(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; // end of the loop. ?>
			<?php woocommerce_product_loop_end(); ?>
			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		<?php endif; ?>
	<?php do_action( 'woocommerce_after_main_content' ); ?>
	</div>
</div>