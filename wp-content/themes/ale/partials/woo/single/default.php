<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('woo_sidebar_position');
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
    }

    //Style Class
    $variant_style = '';
    if(ale_get_option('woo_grid_style')){
        $variant_style = ale_get_option('woo_grid_style').'-item-style';
    } ?>

<div class="content_wrapper flex_container <?php  echo esc_attr($variant_style).' '.esc_attr($sidebar_class); ?> cf">
	<?php if($ale_sidebar_position  !== 'no'){ do_action( 'woocommerce_sidebar' ); } ?>
	
    <section class="story ale_blog_archive content ale_single_product_page cf">
	    <?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
	<?php do_action( 'woocommerce_after_main_content' ); ?>
	</section>
</div>