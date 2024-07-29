<div class="header">
    <div class="menu-line cf">
        <div class="content_wrapper cf">
            <div class="left-list">
                <?php if ( has_nav_menu( 'header_left_menu' ) ) {
                    wp_nav_menu(array(
                            'theme_location'=> 'header_left_menu',
                            'menu'			=> 'Header Left Menu',
                            'menu_class'	=> 'cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                } ?>
            </div>
            <div class="right-list">
                <ul class="cf">
                    <?php if(ale_get_option('footer_callnumber')){ ?>
                        <li>
                            <div class="phone"><i class="fa fa-mobile" aria-hidden="true"></i> <?php echo esc_attr(ale_get_option('footer_callnumber')); ?></div>
                        </li>
                    <?php } ?>
                        <li class="vertical-line2"></li>
                    <?php if(ale_get_option('footer_email_address')){ ?>
                        <li>
                            <span class="envelope"></span><a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><b><?php echo esc_html(ale_get_option('footer_email_address')); ?></b></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div><!--end of wrapper-->
    </div><!--end of menu-->

    <div class="content_wrapper cf">
        <div class="logo">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo_link">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } ?>
            </a></div>
        <div class="menu2">
            <?php if ( has_nav_menu( 'header_menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'=> 'header_menu',
                        'menu'			=> 'Header Menu',
                        'menu_class'	=> 'menu vertical-line3 cf',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    ));
            } ?>

            <div class="mobile-menu">
                <?php
                if ( has_nav_menu( 'mobile_menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'=> 'mobile_menu',
                        'menu'   => 'Mobile Menu',
                        'menu_class' => 'mobilemenu',
                        'container'  => '',
                        'items_wrap' => '<select id="%1$s" class="%2$s drop">%3$s</select>',
                        'indent_string' => '&ndash;&nbsp;',
                        'indent_after' => '',
                        'walker' => new Aletheme_Dropdown_Nav_Walker(),
                    ));
                } ?>
            </div>

            <div class="search-box">
                <div class="button_s"><i class="fa fa-search" aria-hidden="true"></i></div>
                <div class="form_box">
                    <form class="search" method="get" id="searchform" action="<?php echo site_url()?>" >
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search_field" placeholder="<?php esc_attr_e('Type and press Enter','ale'); ?>">
                    </form>
                </div>
            </div>
        </div><!--end menu-2-->

    </div><!--end wrapper-->
</div>