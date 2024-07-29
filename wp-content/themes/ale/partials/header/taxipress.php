<div class="background">
    <div class="col-6"></div>
    <div class="col-6"></div>
</div>

<div id="call-us" class="call-us taxipress_call_us">
    <div class="selected font_two">
        <span><?php esc_html_e('Call us','ale'); ?></span>

        <ul>
            <?php if(ale_get_option('footer_callnumber')){ ?><li data-num="<?php echo esc_attr(ale_get_option('footer_callnumber')); ?>"><?php echo esc_html_e('Call us','ale'); ?></li><?php } ?>
            <?php if(ale_get_option('footer_email_address')){ ?><li data-num="<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html_e('Email','ale'); ?></li><?php } ?>
            <?php if(ale_get_option('footer_address')){ ?><li data-num="<?php echo esc_attr(ale_get_option('footer_address')); ?>"><?php echo esc_html_e('Address','ale'); ?></li><?php } ?>
        </ul>
    </div>
    <div class="number font_two"><?php echo esc_html(ale_get_option('footer_callnumber')); ?></div>
</div>

<!-- Nav -->
<nav class="main">
    <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
        <?php if(ale_get_option('sitelogo')){?>
            <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
        <?php } ?>
    </a>

    <?php if ( has_nav_menu( 'header_left_menu' ) ) { ?>
    <div class="col-6 left">
        <?php
        wp_nav_menu(array(
            'theme_location'=> 'header_left_menu',
            'menu'			=> 'Header Left Menu',
            'menu_class'	=> 'menu first cf font_two',
            'walker'		=> new Aletheme_Nav_Walker(),
            'container'		=> '',
        )); ?>
    </div>
    <?php } ?>
    <?php if ( has_nav_menu( 'header_right_menu' ) ) { ?>
    <div class="col-6 right">
        <?php
        wp_nav_menu(array(
            'theme_location'=> 'header_right_menu',
            'menu'			=> 'Header Right Menu',
            'menu_class'	=> 'menu first cf font_two',
            'walker'		=> new Aletheme_Nav_Walker(),
            'container'		=> '',
        )); ?>
    </div>
    <?php } ?>

    <!-- -->
    <a href="#" class="mobile-button taxipress_mobile_menu">Menu</a>
    <?php if ( has_nav_menu( 'mobile_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'mobile_menu',
                'menu'			=> 'Mobile Menu',
                'menu_class'	=> 'menu mobile-menu font_two',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            ));
    } ?>

    <!-- Search -->
    <div class="search-button font_one taxipress_search_box"></div>
    <form class="search font_one" method="get" id="searchform" action="<?php echo site_url()?>">
        <input type="text" placeholder="<?php esc_attr_e('Search','ale'); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
        <input type="submit" value=" "/>
    </form>

</nav>