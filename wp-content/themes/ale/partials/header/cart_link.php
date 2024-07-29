<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $woocommerce;  ?>
		<div class="ale_shop_cart">
			<?php if(ALETHEME_DESIGN_STYLE == 'creative'){ ?>
				<i class="fa fa-shopping-basket" aria-hidden="true"></i>
			<?php } else if(ALETHEME_DESIGN_STYLE == 'rosi') {
			    echo "<span>";
			    echo esc_html_e('CART','ale');
			    echo "</span>";
            } else if(ALETHEME_DESIGN_STYLE == 'laptica') {?>
			    <img src="<?php echo esc_url(get_template_directory_uri()).'/assets/css/svg/milk.svg'; ?>" alt="<?php esc_attr_e( 'Cart','ale' ) ?>" />
            <?php } else { ?>
				<i class="fa fa-shopping-bag" aria-hidden="true"></i>
			<?php } ?>
			<?php  echo '<a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__( 'Cart','ale' ) . '" class="cart_link ale_cart_link_location"><span>'.esc_attr(WC()->cart->get_cart_contents_count()).'</span></a>'; ?>
        </div>
	<?php
} ?>