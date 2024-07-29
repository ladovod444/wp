<?php if ( has_nav_menu( 'mobile_menu' ) ) { ?>
    <nav class="mobilemenu">
        <input type="checkbox" id="ale_responsive_menu" />
        <div class="popup_mobile_menu">
            <?php
            wp_nav_menu(array(
                'theme_location'=> 'mobile_menu',
                'menu'			=> 'Mobile Menu',
                'menu_class'	=> 'popup-menu menu-mobile ',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            )); ?>
            <label for="ale_responsive_menu" class="ale_mobile_close"><i class="fa fa-times" aria-hidden="true"></i></label>
        </div>

        <label for="ale_responsive_menu" class="ale_mobile_open"><i class="fa fa-bars" aria-hidden="true"></i></label>
        
    </nav>  
<?php } ?>