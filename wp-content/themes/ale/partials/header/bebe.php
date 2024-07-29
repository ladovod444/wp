<!-- Background Awesomeness -->
<div id="night"></div>

<!-- Stars -->
<div class="back" id="stars1"></div>
<div class="back" id="stars2"></div>

<!-- Clouds -->
<div class="back" id="cloud1"></div>
<div class="back" id="cloud2"></div>
<div class="back" id="cloud3"></div>
<div class="back" id="cloud4"></div>
<div class="back" id="cloud5"></div>

<!-- Header Section -->
<header id="bebe_variant_header">
    <div class="center-align cf">

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url("/")); ?>">
            
            <div class="logo float-left">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } ?>
                <span><?php esc_attr(bloginfo('description')); ?></span> 
            </div>
        </a>

        <!-- Social & Search -->
        <div class="social float-right cf">

            <?php get_search_form(); ?>

            <?php get_template_part('partials/social_profiles'); ?>
        </div>

        <!-- Nav -->
        <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
            <nav class="navigation header_nav">
                <?php
                wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'menu_class'	=> 'menu menu-header cf',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); ?>
            </nav>
        <?php
        } ?>

        <!-- Drop Down -->
        <div id="bebe_mobile_menu" class="drop-menu">
            <?php if ( has_nav_menu( 'mobile_menu' ) ) { ?>
                <a><?php esc_html_e('Menu','ale'); ?></a>
                <?php
                wp_nav_menu(array(
                    'theme_location'=> 'mobile_menu',
                    'menu'			=> 'Mobile Menu',
                    'menu_class'	=> 'ul-drop',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); 
            } ?>
        </div>

    </div>
</header>