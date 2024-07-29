<nav class="header">
    <div class="center">
        <?php if ( has_nav_menu( 'header_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'header_menu',
                'menu'			=> 'Header Menu',
                'menu_class'	=> 'menu cf font_two',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            ));
        } ?>
    </div>
    <div class="prestigio_mobile_menu drop-menu font_two">
        <a><?php esc_html_e('Menu','ale'); ?></a>
        <?php if ( has_nav_menu( 'mobile_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'mobile_menu',
                'menu'			=> 'Mobile Menu',
                'menu_class'	=> 'ul-drop',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            ));
        } ?>
    </div>
</nav>
