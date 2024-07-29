<?php 
    if(ale_get_meta('toprevsliderslug') and is_front_page()){
        echo do_shortcode(ale_get_meta('toprevsliderslug'));
    } else { ?>
        <header id="headerslider" class="cusstyle15" style="<?php if(ale_get_option('archivetitlebg')) { echo "background-image:url(".esc_url(ale_get_option('archivetitlebg')).");"; } ?> "></header>
    <?php } ?>
    <nav id="topmenu" class="topmenu cf" role="navigation">
        <div class="content_wrapper cf">
            <div class="logo">
                <h1>
                    <?php if(ale_get_option('sitelogo')){ ?>
                        <a href="<?php echo esc_url(home_url("/")); ?>/" class="customlogo logolinkurl"><img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" /></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(home_url("/")); ?>/" class="alelogo logolinkurl"><?php echo esc_html(bloginfo('name')); ?></a>
                    <?php } ?>
                </h1>
            </div>
            <?php
            if ( has_nav_menu( 'header_menu' ) ) {
                wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'menu_class'	=> 'headermenu font_one cf',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                ));
            }
            ?>
        </div>
    </nav>
    <nav id="mobilenav" class="topmenu cf" role="navigation">
        <div class="logo">
            <h1>
                <?php if(ale_get_option('sitelogo')){ ?>
                    <a href="<?php echo esc_url(home_url("/")); ?>" class="customlogo logolinkurl"><img src="<?php echo ale_get_option('sitelogo'); ?>" /></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url(home_url("/")); ?>" class="alelogo logolinkurl"><?php echo bloginfo('name'); ?></a>
                <?php } ?>
            </h1>
        </div>
        <?php
        if ( has_nav_menu( 'header_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'header_menu',
                'menu'   => 'Header Menu',
                'menu_class' => 'mobilemenu font_two',
                'container'  => '',
                'items_wrap' => '<select id="%1$s" class="%2$s drop font_two">%3$s</select>',
                'indent_string' => '&ndash;&nbsp;',
                'indent_after' => '',
                'walker' => new Aletheme_Dropdown_Nav_Walker(),
            ));
        } ?>
    </nav>
    <div id="content-main" role="main" class="cf">