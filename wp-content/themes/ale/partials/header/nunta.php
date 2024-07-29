<div class="top"></div>
    <div class="content_wrapper">
    <header id="topheader" class="header_nunta_nav font_three cf">
        <div class="lefthead">
            <div class="leftnav">
                <nav id="leftnav" role="navigation">
                    <?php
                    if ( has_nav_menu( 'header_left_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'header_left_menu',
                            'menu'			=> 'Left Menu',
                            'menu_class'	=> 'leftmenu cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                    }
                    ?>
                </nav>
                <nav id="leftmobilenav" role="navigation">
                    <?php
                    if ( has_nav_menu( 'header_left_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'header_left_menu',
                            'menu'   => 'Left Menu',
                            'menu_class' => 'mobilemenu',
                            'container'  => '',
                            'items_wrap' => '<select id="%1$s" class="%2$s drop headerfont">%3$s</select>',
                            'indent_string' => '&ndash;&nbsp;',
                            'indent_after' => '',
                            'walker' => new Aletheme_Dropdown_Nav_Walker(),
                        ));
                    } ?>
                </nav>
            </div>
        </div>

        <div class="logo">
            <h1>
                <?php if(ale_get_option('sitelogo')){ ?>
                <a href="<?php echo esc_url(home_url("/")); ?>" class="customlogo logolinkurl"><img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" /></a>
                <?php } else { ?>
                <a href="<?php echo esc_url(home_url("/")); ?>" class="alelogo logolinkurl"><?php echo esc_html(bloginfo('name')); ?></a>
                <?php } ?>
            </h1>
        </div>

        <div class="righthead">
            <div class="rightnav">
                <nav id="rightnav" role="navigation">
                    <?php
                    if ( has_nav_menu( 'header_right_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'header_right_menu',
                            'menu'			=> 'Right Menu',
                            'menu_class'	=> 'rightmenu cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                    }
                    ?>
                </nav>
                <nav id="rightmobilenav" role="navigation">
                    <?php
                    if ( has_nav_menu( 'header_right_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'header_right_menu',
                            'menu'   => 'Right Menu',
                            'menu_class' => 'mobilemenu',
                            'container'  => '',
                            'items_wrap' => '<select id="%1$s" class="%2$s drop headerfont">%3$s</select>',
                            'indent_string' => '&ndash;&nbsp;',
                            'indent_after' => '',
                            'walker' => new Aletheme_Dropdown_Nav_Walker(),
                        ));
                    } ?>
                </nav>
            </div>
        </div>
        

    </header>
    <div id="content-main" role="main" class="cf">
        <div class="padding">