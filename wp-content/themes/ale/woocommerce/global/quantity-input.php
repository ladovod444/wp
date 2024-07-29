<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$labelledby = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'ale' ), strip_tags( $args['product_name'] ) ) : '';
	?>
	<div class="quantity <?php if(ALETHEME_DESIGN_STYLE == 'mimi'){ echo 'font_one';} ?>">
        <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'ale' ); ?></label>

        <?php switch (ale_get_option('woo_grid_style')) {
            case 'rossi':
                echo '<button type="button" class="ale_plus" >+</button>';
                break;
            case 'kitty':
                echo '<button type="button" class="ale_minus"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                break;
            case 'default':
                switch (ALETHEME_DESIGN_STYLE) {
                    case 'mimi':
                        echo '<span class="ale_minus font_one">-</span>';
                        break;
                    case 'pizza':
                        echo '<div class="quantity_item"><span class="ale_minus font_one">-</span>';
                        break;
                }
                break;
        } ?>

            <input
                <?php if(ale_get_option('woo_grid_style') == 'rosi' or ale_get_option('woo_grid_style') == 'exotico' or ale_get_option('woo_grid_style') == 'kitty' or ale_get_option('woo_grid_style') == 'laptica' or ALETHEME_DESIGN_STYLE == 'pizza'){ ?>
                    type="text"
                <?php } else {?>
                    type="number"
                <?php } ?>
                id="<?php echo esc_attr( $input_id ); ?>"
                class="input-text qty text"
                step="<?php echo esc_attr( $step ); ?>"
                min="<?php echo esc_attr( $min_value ); ?>"
                max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
                name="<?php echo esc_attr( $input_name ); ?>"
                value="<?php echo esc_attr( $input_value ); ?>"
                title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'ale' ); ?>"
                size="4"
                pattern="<?php echo esc_attr( $pattern ); ?>"
                inputmode="<?php echo esc_attr( $inputmode ); ?>"
                aria-labelledby="<?php echo esc_attr( $labelledby ); ?>" />

        <?php switch (ale_get_option('woo_grid_style')) {
            case 'rossi':
                echo '<button type="button" class="ale_minus" >-</button>';
                break;
            case 'kitty':
                echo '<button type="button" class="ale_plus"><i class="fa fa-plus" aria-hidden="true"></i></button>';
                break;
            case 'laptica':
                echo '<div class="q_custom">
                    <button type="button" class="ale_plus" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <button type="button" class="ale_minus" ><i class="fa fa-minus" aria-hidden="true"></i></button>
                </div>';
                break;
            case 'exotico':
                echo '<span class="amount__btn amount__btn_minus ale_minus">-</span>
                <span class="amount__btn amount__btn_plus ale_plus">+</span>';
                break;
            case 'default':
                switch (ALETHEME_DESIGN_STYLE) {
                    case 'mimi':
                        echo '<span class="ale_plus font_one">+</span>';
                        break;
                    case 'pizza':
                        echo '<span class="ale_plus font_one">+</span></div>';
                        break;
                }
                break;
        } 
        
        do_action( 'woocommerce_after_quantity_input_field' ); ?>
	</div>
<?php }
