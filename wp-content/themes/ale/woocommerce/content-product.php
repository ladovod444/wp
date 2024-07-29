<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

switch (ale_get_option('woo_grid_style')) {
    case 'vintage':
        get_template_part('partials/woo/preview/vintage' );
        break;
    case 'minimal':
    case 'smoothie':
        get_template_part('partials/woo/preview/minimal' );
        break;
    case 'fashion':
        get_template_part('partials/woo/preview/fashion' );
        break;
    case 'rosi':
        get_template_part('partials/woo/preview/rosi' );
        break;
    case 'keira':
        get_template_part('partials/woo/preview/keira' );
        break;
    case 'exotico':
        get_template_part('partials/woo/preview/exotico' );
        break;
    case 'organic':
        get_template_part('partials/woo/preview/organic' );
        break;
    case 'burger':
        get_template_part('partials/woo/preview/burger' );
        break;
    case 'laptica':
        get_template_part('partials/woo/preview/laptica' );
        break;
    case 'kitty':
        get_template_part('partials/woo/preview/kitty' );
        break;
    case 'moka':
        get_template_part('partials/woo/preview/moka' );
        break;
    case 'delizioso':
        get_template_part('partials/woo/preview/delizioso' );
        break;
    case 'cosushi':
        get_template_part('partials/woo/preview/cosushi' );
        break;
    case 'default':
        switch (ALETHEME_DESIGN_STYLE) {
            case 'mimi':
                get_template_part('partials/woo/preview/mimi' );
                break;
            case 'pizza':
                get_template_part('partials/woo/preview/pizza' );
                break;
            default:
                get_template_part('partials/woo/preview/default' );
                break;
        }
        break;
}
