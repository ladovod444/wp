<?php
/**
 * Single variation cart button
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product; ?>

<div class="woocommerce-variation-add-to-cart variations_button">
    <div class="form_wrapper">
        <?php 
        do_action( 'woocommerce_before_add_to_cart_button' );
        do_action( 'woocommerce_before_add_to_cart_quantity' );
        woocommerce_quantity_input(
            array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
            )
        );
        do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>

        <?php if(ale_get_option('woo_grid_style') == 'default' && ALETHEME_DESIGN_STYLE == 'mimi'){ ?>
            <div class="alekids_button">
                <div class="container">
                    <svg class="alekids_dashed"><rect x="5px" y="5px" rx="26px" ry="26px" width="167.234" height="53"></rect></svg>
                    <span>
                    <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                    </span>
                </div>
            </div>
        <?php } else if(ale_get_option('woo_grid_style') == 'default' && ALETHEME_DESIGN_STYLE == 'pizza'){ ?>
            <div class="aleshop_button">
                <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
            </div>
        <?php } else { ?>
            <button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <?php } ?>

        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>
</div>
