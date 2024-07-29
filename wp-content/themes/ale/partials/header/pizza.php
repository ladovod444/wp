<header class="ale_top">
    <div class="top_nav">
        <div class="logo">
            <a href="<?php echo esc_url(home_url("/")); ?>">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="<?php echo esc_attr__('logo','ale'); ?>" />
                <?php } else { ?>
                    <h1><?php esc_html(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <nav class="header_nav ">
                <?php wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu_class'	=> 'menu menu-header font_one',
                    'container'		=> '',
                )); ?>
            </nav>
        <?php } ?>

        <?php if ( has_nav_menu( 'mobile_menu' ) ) { ?>
            <div class="mobile_navigation_container">
                <span class="open_mobile_nav font_one"><?php esc_html_e('Menu','ale'); ?></span>
                <div class="mobile_navigation">
                    <div class="mobile_inner">
                        <span class="close_mobile_nav font_one"><?php esc_html_e('Close Menu','ale'); ?></span>
                        <nav class="mobile_nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location'=> 'mobile_menu',
                                'menu_class'	=> 'menu ale_menu_mobile menu-mobile font_one',
                                'container'		=> '',
                                'walker'         => new Aletheme_Nav_Walker()
                            )); ?>
                        </nav>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="right_header_part">
            <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                global $woocommerce; ?>
                <a href="<?php echo esc_url(wc_get_cart_url()) ?>" class="woo_cart right_header_icon"></a>
            <?php } ?>
            <span class="search_openner right_header_icon"></span>
            <span class="open_burger_icon right_header_icon"></span>
        </div>
        <div class="delizioso_search_container">
            <form class="search" method="get" action="<?php echo esc_url(site_url());?>" >
                <span class="close_info font_one"><?php echo esc_html_e('Press escape','ale'); ?></span>
                <span class="close_info_second font_one"><?php echo esc_html_e('to close search form','ale'); ?></span>
                <input type="text" class="font_one" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('type here to search', 'ale')?>" />
                <div class="submit_container">
                    <input type="submit" class="font_one" value="<?php esc_attr_e('Search', 'ale')?>" />
                </div>
            </form>
        </div>
    </div>
</header>
<div class="right_side_part">
    <div class="close_side_part"></div>
    <div class="inner_side_section">
        <div class="logo">
            <a href="<?php echo esc_url(home_url("/")); ?>">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="<?php echo esc_attr__('logo','ale'); ?>" />
                <?php } else { ?>
                    <h1><?php echo esc_html(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <div class="side_contact_box">
            <h5><?php esc_html(bloginfo('description')); ?></h5>
            <?php if(ale_get_option('copyrights')) {?>
                <div class="description"><?php echo wp_kses_post(ale_get_option('copyrights')); ?></div>
            <?php } ?>
        </div>
        <div class="side_social_box">
            <h6><?php esc_html_e('Follow Us','ale'); ?></h6>
            <?php get_template_part('partials/social_text_links'); ?>
        </div>
    </div>
</div>