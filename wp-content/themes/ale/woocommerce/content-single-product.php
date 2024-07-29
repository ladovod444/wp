<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	}

    switch (ale_get_option('woo_grid_style')) {
        case 'exotico':
            get_template_part('partials/woo/single_preview/exotico' );
            break;
        case 'burger':
            get_template_part('partials/woo/single_preview/burger' );
            break;
        case 'laptica':
            get_template_part('partials/woo/single_preview/laptica' );
            break;
        default:
            switch (ALETHEME_DESIGN_STYLE) {
                case 'mimi':
                    get_template_part('partials/woo/single_preview/mimi' );
                    break;
                case 'pizza':
                    get_template_part('partials/woo/single_preview/pizza' );
                    break;
                default:
                    get_template_part('partials/woo/single_preview/default' );
                    break;
            }
            break;
    }

do_action( 'woocommerce_after_single_product' ); ?>
