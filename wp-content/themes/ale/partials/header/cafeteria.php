<header class="cf font_one">
    <div class="logo">
        <?php if(ale_get_option('sitelogo')){ ?>
            <a href="<?php echo esc_url(home_url("/")); ?>" class="customlogo"><img src="<?php echo ale_get_option('sitelogo'); ?>" /></a>
        <?php } else { ?>
            <a href="<?php echo esc_url(home_url("/")); ?>" class="alelogo"><?php echo bloginfo('name'); ?></a>
        <?php } ?>
    </div>
    <div class="cafeteria-menu-drop menu-drop">
        <a><?php echo esc_html_e('Menu','ale'); ?></a>
        <?php
        if ( has_nav_menu( 'mobile_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'mobile_menu',
                'menu'			=> 'Mobile Menu',
                'menu_class'	=> 'ul-drop',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            ));
        } ?>
    </div>

    <div class="center-align content_wrapper">
            <?php if ( has_nav_menu( 'header_left_menu' ) ) {
                wp_nav_menu(array(
                    'theme_location'=> 'header_left_menu',
                    'menu'			=> 'Header Left Menu',
                    'menu_class'	=> 'col-6 left',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                ));
            }

            if ( has_nav_menu( 'header_right_menu' ) ) {
                wp_nav_menu(array(
                    'theme_location'=> 'header_right_menu',
                    'menu'			=> 'Header Right Menu',
                    'menu_class'	=> 'col-6 right',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                ));
            } ?>
    </div>
</header>