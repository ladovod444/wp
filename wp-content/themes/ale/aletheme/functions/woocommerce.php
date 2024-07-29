<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    //Declare WooCommerce support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

    //Columns Settings based on Theme Options
    add_filter( 'loop_shop_columns', 'loop_columns' );
    if ( ! function_exists( 'loop_columns' ) ) {

        function loop_columns() {
            $ale_column = ale_get_option( 'woo_columns' );

            switch ( $ale_column ) {
                case '1' :
                    return 1;
                    break;
                case '2' :
                    return 2;
                    break;
                case '3' :
                    return 3;
                    break;
                case '4' :
                    return 4;
                    break;
                case '5' :
                    return 5;
                    break;
            }
        }
    }
    function ale_show_custom_keira_thumbnail(){
        echo '<div class="keira_product_thumbnail post_image_holder">';
        woocommerce_template_loop_product_link_open();
        echo get_the_post_thumbnail(get_the_ID(),'full');
        woocommerce_template_loop_product_link_close();
        echo '</div>';
    }
    function ale_exotico_custom_button(){
        echo '<a href="'.get_the_permalink().'" class="buy-btn"><i class="buy-btn__icon"></i>'.esc_html__('Buy','ale').'</a>';
    }
    function ale_exotico_custom_title(){ ?>
        <span class="shop-item__title"><?php the_title(); ?></span>
    <?php }
    function ale_exotico_custom_single_image(){
        echo get_the_post_thumbnail(get_the_ID(),'large');
    }
    function ale_start_custom_keira_data(){
        echo '<div class="keira_product_data"><span class="prod_cat font_two">'.esc_html__('our products','ale').'</span>';
    }
    function ale_end_custom_keira_data(){
        echo '</div>';
    }

    //AJAX Change Cart items in Header
    add_filter( 'woocommerce_add_to_cart_fragments', 'ale_header_add_to_cart_fragment' );
    function ale_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        if(ALETHEME_DESIGN_STYLE == 'keira'){
            echo '<a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__( 'Cart','ale' ) . '" class="cart_link ale_cart_link_location"><span class="cart"><span>'. esc_attr(WC()->cart->get_cart_contents_count()) .'</span></span></a>';
            $fragments['a.ale_cart_link_location'] = ob_get_clean();
        } else {
            echo '<a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__( 'Cart','ale' ) . '" class="cart_link ale_cart_link_location"><span>'.esc_attr(WC()->cart->get_cart_contents_count()).'</span></a>';
            $fragments['a.ale_cart_link_location'] = ob_get_clean();
        }

        ob_end_clean();
        return $fragments;
    }

    //Related products count based on columns option settings
    add_filter( 'woocommerce_output_related_products_args', 'ale_related_products_args' );
    function ale_related_products_args( $args ) {
        $ale_column = ale_get_option( 'woo_columns' );

        switch ( $ale_column ) {
            case '1' :
                $args['posts_per_page'] = 1;
                $args['columns']        = 1;

                return $args;
                break;
            case '2' :
                $args['posts_per_page'] = 2;
                $args['columns']        = 2;

                return $args;
                break;
            case '3' :
                $args['posts_per_page'] = 3;
                $args['columns']        = 3;

                return $args;
                break;
            case '4' :
                $args['posts_per_page'] = 4;
                $args['columns']        = 4;

                return $args;
                break;
            case '5' :
                $args['posts_per_page'] = 5;
                $args['columns']        = 5;

                return $args;
                break;
        }
    }

    //Up sells Products columns based on options columns
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            $ale_column = ale_get_option( 'woo_columns' );

            switch ( $ale_column ) {
                case '1' :
                    woocommerce_upsell_display( 1, 1 );
                    break;
                case '2' :
                    woocommerce_upsell_display( 2, 2 );
                    break;
                case '3' :
                    woocommerce_upsell_display( 3, 3 );
                    break;
                case '4' :
                    woocommerce_upsell_display( 4, 4 );
                    break;
                case '5' :
                    woocommerce_upsell_display( 5, 5 );
                    break;
            }
        }
    }

    //CSS & JS for Shop
    function ale_enqueue_wc_styles() {
        wp_enqueue_style( 'ale-wc-general', ALETHEME_THEME_URL . '/assets/css/wc/wc_general.css', array(), ALETHEME_THEME_VERSION, 'all');

        //Load Selected Variant Style
        $wc_variant_name = ale_get_option('woo_grid_style');

        if($wc_variant_name){
            switch($wc_variant_name){
                case 'rosi' :
                    wp_enqueue_style( 'ale-wc-rosi', ALETHEME_THEME_URL . '/assets/css/wc/wc_rosi_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'fashion' :
                    wp_enqueue_style( 'ale-wc-fashion', ALETHEME_THEME_URL . '/assets/css/wc/wc_fashion_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'minimal' :
                    wp_enqueue_style( 'ale-wc-minimal', ALETHEME_THEME_URL . '/assets/css/wc/wc_minimal_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'vintage' :
                    wp_enqueue_style( 'ale-wc-vintage', ALETHEME_THEME_URL . '/assets/css/wc/wc_vintage_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'keira' :
                    wp_enqueue_style( 'ale-wc-keira', ALETHEME_THEME_URL . '/assets/css/wc/wc_keira_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'exotico' :
                    wp_enqueue_style( 'ale-wc-exotico', ALETHEME_THEME_URL . '/assets/css/wc/wc_exotico_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'organic' :
                    wp_enqueue_style( 'ale-wc-organic', ALETHEME_THEME_URL . '/assets/css/wc/wc_organic_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'smoothie' :
                    wp_enqueue_style( 'ale-wc-smoothie', ALETHEME_THEME_URL . '/assets/css/wc/wc_smoothie_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'burger' :
                    wp_enqueue_style( 'ale-wc-burger', ALETHEME_THEME_URL . '/assets/css/wc/wc_burger_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'laptica' :
                    wp_enqueue_style( 'ale-wc-laptica', ALETHEME_THEME_URL . '/assets/css/wc/wc_laptica_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'kitty' :
                    wp_enqueue_style( 'ale-wc-kitty', ALETHEME_THEME_URL . '/assets/css/wc/wc_kitty_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'moka' :
                    wp_enqueue_style( 'ale-wc-moka', ALETHEME_THEME_URL . '/assets/css/wc/wc_moka_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'delizioso' :
                    wp_enqueue_style( 'ale-wc-delizioso', ALETHEME_THEME_URL . '/assets/css/wc/wc_delizioso_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
                case 'cosushi' :
                    wp_enqueue_style( 'ale-wc-cosushi', ALETHEME_THEME_URL . '/assets/css/wc/wc_cosushi_style.css', array('ale-wc-general'), ALETHEME_THEME_VERSION, 'all');
                    break;
            }
        }

        wp_enqueue_style( 'select2', ALETHEME_THEME_URL . '/assets/css/libs/select2.min.css', array(), ALETHEME_THEME_VERSION, 'all' );
        wp_enqueue_script( 'select2', ALETHEME_THEME_URL . '/assets/js/libs/select2.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
        wp_enqueue_script( 'ale-woocommerce', ALETHEME_THEME_URL . '/assets/js/woocommerce.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

        if(ale_get_option('woo_grid_style') == 'default' && in_array(ALETHEME_DESIGN_STYLE,['mimi','pizza'])){
            wp_deregister_style('ale-wc-general');
            wp_deregister_style('select2');
            wp_deregister_script('select2');
            wp_deregister_script('ale-woocommerce');
        }
    }
    add_action( 'wp_enqueue_scripts', 'ale_enqueue_wc_styles' );

    //Remove breadcrumb
    add_action( 'init', 'ale_remove_wc_breadcrumbs' );
    function ale_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    //Products per page based on theme options
    function ale_woo_products_per_page_options_value($cols){
        return esc_attr(ale_get_option('products_per_page'));
    }
    if(ale_get_option('products_per_page')){
        add_filter( 'loop_shop_per_page', 'ale_woo_products_per_page_options_value', 20 );
    }

    //Single Product Slider for Woocommerce
    add_action( 'after_setup_theme', 'ale_woocommerse_plugin_setup' );
    function ale_woocommerse_plugin_setup() {
        if(!in_array(ale_get_option('woo_grid_style'), array('burger','moka','cosushi')) and !in_array(ALETHEME_DESIGN_STYLE, ['mimi','pizza'])){
            add_theme_support( 'wc-product-gallery-zoom' );
        }
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    //Share options
    function ale_get_woo_share(){
        echo '<div class="ale_woo_share">';
        echo esc_html_e('Share:','ale') . get_template_part('partials/woo/wooshare');
        echo '</div>';
    }

    //Custom Hooks for specific desing style
    switch(ale_get_option('woo_grid_style')){

        case 'rosi' :
            remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
            add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 6);
            add_action('woocommerce_share','ale_get_woo_share');
        break;

        case 'keira' :
            add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
            function remove_product_description_heading() { return ''; }
        break;

        case 'organic' :
            add_filter( 'single_product_archive_thumbnail_size', function( $size ) { return 'full'; });
            add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
        break;

        case 'laptica' :
            add_filter( 'woocommerce_product_add_to_cart_text', 'ale_custom_product_add_to_cart_text' );  
            function ale_custom_product_add_to_cart_text() {
                return '<span class="inner_button"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>';
            }
            add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
        break;

        case 'kitty' :
            add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
                return array(
                'width' => 340,
                'height' => 240,
                'crop' => 0,
                );
            } );
            add_filter('woocommerce_loop_add_to_cart_link','ale_change_simple_shop_add_to_cart',10,2);
            function ale_change_simple_shop_add_to_cart( $html, $product ){
                if( $product->is_type('simple')) {

                    $html = sprintf( '<a rel="nofollow" href="%s" data-product_id="%s"  class="button">%s</a>',
                            esc_url( get_the_permalink() ),
                            esc_attr( $product->get_id() ),
                            esc_html(  esc_html__( 'Purchase', 'ale' ) )
                    );
                }
                return $html;
            }
            add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
            add_action('woocommerce_share','ale_get_woo_share');
        break;

        case 'moka' :
            add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
                return array(
                'width' => 400,
                'height' => 400,
                'crop' => 0,
                );
            } ); 
        break;

        case 'delizioso' :
            add_filter('woocommerce_loop_add_to_cart_link','ale_change_simple_shop_add_to_cart',10,2);
            function ale_change_simple_shop_add_to_cart( $html, $product ){
                if( $product->is_type('simple')) {

                    $html = sprintf( '<a rel="nofollow" href="%s" data-product_id="%s"  class="button">%s</a>',
                            esc_url( get_the_permalink() ),
                            esc_attr( $product->get_id() ),
                            esc_html(  esc_html__( 'Open', 'ale' ) )
                    );
                }
                return $html;
            } 
            add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
        break;

        case 'cosushi' :
            add_filter('woocommerce_loop_add_to_cart_link','ale_change_simple_shop_add_to_cart',10,2);
            function ale_change_simple_shop_add_to_cart( $html, $product ){
                if( $product->is_type('simple')) {

                    $html = sprintf( '<a rel="nofollow" href="%s" data-product_id="%s"  class="button">%s</a>',
                            esc_url( get_the_permalink() ),
                            esc_attr( $product->get_id() ),
                            esc_html(  esc_html__( 'Click to Order', 'ale' ) )
                    );
                }
                return $html;
            } 
            add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
                return array(
                'width' => 170,
                'height' => 116,
                'crop' => 0,
                );
            } ); 
        break;
    }

    //Custom Hooks for Mimi Variant
    if(ale_get_option('woo_grid_style') == 'default' && ALETHEME_DESIGN_STYLE == 'mimi'){
        function alekids_woo_get_excerpt(){ ?><div class="woo_excerpt"><?php echo wp_kses_post(ale_trim_excerpt(6)); ?></div><?php }
        function alekids_woo_opendiv(){ echo '<div class="opendiv">'; }
        function alekids_woo_closediv(){ echo '</div>'; }
        function alekids_custom_pagination(){ return get_template_part('partials/pagination/mimi'); }
        function alekids_get_sidebar(){
            if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
               <aside class="sidebar cf">
                    <div class="sidebar_container"><?php dynamic_sidebar( 'shop-sidebar' ); ?></div>
               </aside>
            <?php } 
        }
        add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
            return array('width' => 230,'height' => 320,'crop' => 1,);
        });
        remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
        remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
        add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_add_to_cart',50);
        remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10 );
        add_action( 'alekids_custom_product_sale','woocommerce_show_product_loop_sale_flash',10 );
        remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );
        remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_product_link_open',10);
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_product_title',15);
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_product_link_close',20);
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_product_link_open',21);
        add_action('alekids_custom_woo_product_hover','alekids_woo_get_excerpt',22);
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_product_link_close',23);
        add_action('alekids_custom_woo_product_hover','alekids_woo_opendiv',24);
        add_action('alekids_custom_woo_product_hover','alekids_woo_closediv',51);
        add_action('alekids_custom_woo_product_hover','woocommerce_template_loop_price',25);
        remove_action( 'woocommerce_before_shop_loop','woocommerce_output_all_notices',10 );
        add_action( 'alekids_custom_woo_notices','woocommerce_output_all_notices',10 );
        remove_action( 'woocommerce_after_shop_loop','woocommerce_pagination',10 );
        add_action( 'woocommerce_after_shop_loop','alekids_custom_pagination',10 );
        remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );
        add_action( 'woocommerce_sidebar','alekids_get_sidebar',10 );
    }

    //Custom Hooks for Pizza Variant
    if(ale_get_option('woo_grid_style') == 'default' && ALETHEME_DESIGN_STYLE == 'pizza'){
        remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
        remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
        add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

        add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
            return array(
            'width' => 500,
            'height' => 500,
            'crop' => 1,
            );
        } );
        add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
            return array(
            'width' => 500,
            'height' => 500,
            'crop' => 0,
            );
        } );

        function ale_woo_get_excerpt(){ ?>
            <div class="woo_excerpt">
                <?php echo wp_kses_post(ale_trim_excerpt(15)); ?>
            </div>
        <?php }

        function pizza_custom_pagination(){
            return get_template_part('partials/pagination/pizza');
        }
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );
        add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',15 );
        remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
        remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10 );
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );
        add_action( 'delizioso_shop_loop_price','woocommerce_template_loop_price',1 );
        add_action( 'delizioso_shop_loop_cart_button','woocommerce_template_loop_add_to_cart',1 );
        add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',5 );
        add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',15 );
        add_action( 'delizioso_shop_loop_excerpt','ale_woo_get_excerpt',1 );
        remove_action( 'woocommerce_after_shop_loop','woocommerce_pagination',10 );
        add_action( 'woocommerce_after_shop_loop','pizza_custom_pagination',10 );
        remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating',10 );
        remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_price',10 );
    }
}