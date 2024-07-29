<?php
$font_style = 'font_one';
if(ALETHEME_DESIGN_STYLE == 'stephanie' or ALETHEME_DESIGN_STYLE == 'laptica'){
    $font_style = 'font_two';
}
?>
<header class="ale_header ale_header_blackwhite <?php echo esc_attr($font_style); ?> cf">
    <div class="content_wrapper desktop_header cf">
        <div class="header_left">
            <?php if ( has_nav_menu( 'header_left_menu' ) ) { ?>
                <!-- Main Menu header -->
                <nav class="navigation left_nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'header_left_menu',
                        'menu_class'	=> 'menu left-menu-header ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
                <?php
            } ?>
        </div>
        <div class="header_center">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <div class="header_right">
            <?php if ( has_nav_menu( 'header_right_menu' ) ) { ?>
                <!-- Main Menu header -->
                <nav class="navigation right_nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'header_right_menu',
                        'menu_class'	=> 'menu right-menu-header ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); 
                    
                    if(ALETHEME_DESIGN_STYLE){
                        switch(ALETHEME_DESIGN_STYLE){
                            case 'blackwhite' :
                            case 'laptica' :
                                get_template_part('partials/header/cart_link');
                                break;
                        }
                    } ?> 
                </nav>
            <?php } ?>
        </div>
    </div>
    <div class="content_wrapper mobile_header">
        <div class="logo_container">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" alt="logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <div class="navigation_container cf">
            <?php

            //Load Mobile Popup Navigation
            get_template_part('partials/header/popup_mobile_menu');

            if(ALETHEME_DESIGN_STYLE){
                switch(ALETHEME_DESIGN_STYLE){
                    case 'blackwhite' :
                    case 'laptica' :
                        get_template_part('partials/header/cart_link');
                        break;
                }
            } ?>
        </div>
    </div>

    <?php if(ALETHEME_DESIGN_STYLE == 'cosushi'){?>
        <div class="left_top_decor">
            <div class="decor"></div>
        </div>
        <div class="right_top_decor">
            <div class="decor"></div>
        </div>
    <?php } ?>
</header>