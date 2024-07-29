<header class="top">
    <div class="wrapper content_wrapper">
        <div class="logo">
            <a href="<?php echo esc_url(home_url("/")); ?>">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="<?php esc_attr_e('logo','ale'); ?>" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <div class="navigation">
                <nav class="header_nav">
                <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'header_menu',
                        'menu_class'	=> 'menu menu-header font_one',
                        'container'		=> '',
                    )); ?>
                </nav>
            </div>
        <?php } ?>

        <?php if ( has_nav_menu( 'mobile_menu' ) ) { ?>
            <div class="mobile_navigation_container font_one">
                <span class="open_mobile_nav"><?php esc_html_e('Open Menu','ale'); ?></span>
                <div class="mimi_mobile_navigation">
                    <div class="mobile_inner">
                        <span class="close_mobile_nav"><?php esc_html_e('Close Menu','ale'); ?></span>
                        <nav class="mobile_nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location'=> 'mobile_menu',
                                'menu_class'	=> 'menu alekids_menu_mobile menu-mobile',
                                'container'		=> '',
                                'walker'         => new Aletheme_Nav_Walker()
                            )); ?>
                        </nav>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php $alekids_mobile_class = ' no_mobile_menu'; ?>
        <div class="right_info<?php if(!has_nav_menu( 'mobile_menu' )){ echo esc_attr($alekids_mobile_class); } ?>">
            <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                global $woocommerce; ?>
                
                <a href="<?php echo esc_url(wc_get_cart_url()) ?>" class="woo_cart">
                    <div class="ale_cart_icon">
                        <div class="mask"></div>
                        <div class="icon"></div>
                    </div>
                </a>
            <?php } ?>

            <a href="#" class="search_openner">
                <div class="ale_search_icon">
                    <div class="mask"></div>
                    <div class="icon"></div>
                </div>
            </a>

            <div class="alekids_search_modal">
                <form class="search" method="get" action="<?php echo esc_url(site_url());?>" >
                    <span class="close_info font_one"><?php echo esc_html_e('Press escape','ale'); ?></span>
                    <span class="close_info_second font_one"><?php echo esc_html_e('to close search form','ale'); ?></span>
                    <input type="text" class="font_one" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('type here to search', 'ale')?>" />
                    <input type="submit" class="font_one" value="<?php esc_attr_e('Search', 'ale')?>" />
                </form>
            </div>
        </div>
    </div>
</header>