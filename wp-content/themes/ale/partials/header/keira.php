<header class="top_header">
    <a href="<?php echo esc_url(home_url("/")); ?>" class="logo font_two">
        <h1><?php esc_attr(bloginfo('title')); ?></h1>
    </a>

    <div class="top_right_nav font_two">
        <div class="navigation">
            <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                <nav class="navigation header_nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'header_menu',
                        'menu'			=> 'Header Menu',
                        'menu_class'	=> 'menu menu-header ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
                <?php
            } 

            //Load Mobile Popup Navigation
            get_template_part('partials/header/popup_mobile_menu');

            ?>
            
        </div>
        <span class="menu_pop_search search_open_button search"></span>
        <div class="pop_search_form_container_rosi cf">
            <form class="search" method="get" id="header_search_form" action="<?php echo site_url()?>" >
                <fieldset>
                    <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type here...', 'ale')?>" />
                    <input type="submit" id="searchsubmit" class="font_two" value="<?php esc_attr_e('search','ale'); ?>" />
                    <span class="close_the_form font_two"><?php echo esc_html_e('Close','ale'); ?></span>
                </fieldset>
            </form>
        </div>
        <?php
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            global $woocommerce;
            echo '<a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__( 'Cart','ale' ) . '" class="cart_link ale_cart_link_location"><span class="cart"><span>'. esc_attr(WC()->cart->get_cart_contents_count()) .'</span></span></a>';
        } ?>

    </div>
</header>