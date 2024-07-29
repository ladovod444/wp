<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     8.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
    get_template_part('partials/page_heading');
    switch (ALETHEME_DESIGN_STYLE) {
        case 'mimi':
            get_template_part('partials/woo/list/mimi');
            break;
        case 'pizza':
            get_template_part('partials/woo/list/pizza');
            break;
        default:
            get_template_part('partials/woo/list/default');
            break;
    }
get_footer( 'shop' ); ?>
