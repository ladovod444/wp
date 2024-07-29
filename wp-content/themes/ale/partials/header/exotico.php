<header class="header">
    <div class="content_wrapper container cf">
        <a href="<?php echo esc_url(home_url("/")); ?>"  class="logo">
            <?php if(ale_get_option('sitelogo')){?>
                <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
            <?php } else { ?>
                <h1><?php esc_attr(bloginfo('title')); ?></h1>
            <?php } ?>
        </a>

        <?php
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            global $woocommerce;  ?>
            <div class="basket float-right font_one">
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="basket__link"><?php echo esc_html_e('Basket','ale'); ?></a>
                <span class="basket__count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                <div class="basket__price"><?php echo wc_cart_totals_subtotal_html(); ?></div>
            </div>
            <?php
        } ?>


        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <nav class="wrap-nav font_one">
                <?php
                wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'menu_class'	=> 'menu menu-header nav',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); ?>
            </nav>
        <?php } ?>

        <?php
        if ( has_nav_menu( 'mobile_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'mobile_menu',
                'menu'   => 'Mobile Menu',
                'menu_class' => 'mobilemenu',
                'container'  => '',
                'items_wrap' => '<select id="%1$s" class="%2$s drop font_one">%3$s</select>',
                'indent_string' => '&ndash;&nbsp;',
                'indent_after' => '',
                'walker' => new Aletheme_Dropdown_Nav_Walker(),
            ));
        } ?>
    </div>
</header>