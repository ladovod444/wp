<header class="ale_header top_header fixed_header">
    <div class="logo_container">
        <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
            <?php if(ale_get_option('sitelogo')){?>
                <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
            <?php } else { ?>
                <h1><?php esc_attr(bloginfo('title')); ?></h1>
            <?php } ?>
        </a>
    </div>
    <div class="nav_container">
        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <nav class="navigation header_nav font_one">
                <?php
                wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'menu_class'	=> 'menu menu-header ',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); ?>
            </nav>
        <?php } ?>
        <div class="mobile_menu_container">
			<?php
			//Load Mobile Popup Navigation
			get_template_part('partials/header/popup_mobile_menu'); ?>
        </div>
        
        <?php if(ale_get_option('burger_order_link')){?>
            <a href="<?php echo esc_attr(ale_get_option('burger_order_link')); ?>" class="burger_button look_button font_one">
                <span><?php if(ale_get_option('burger_order_text')){
                    echo esc_attr(ale_get_option('burger_order_text'));
                } else {
                    esc_attr_e('Online Order','ale');
                } ?></span>
            </a>
        <?php } ?>
    </div>
</header>