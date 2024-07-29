<header class="top_header">
    <div class="logo">
        <a href="<?php echo esc_url(home_url("/")); ?>">
            <?php if(!empty(ale_get_option('sitelogo'))){?>
                <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
            <?php } else { ?>
                <h1 class="site_title"><?php esc_attr(bloginfo('title')); ?></h1>
            <?php } ?>
        </a>
    </div>

    <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
        <nav class="header_navigation">
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
                }
            ?>

            <?php wp_nav_menu(array(
                'theme_location'=> 'header_menu',
                'menu'			=> 'Header Menu',
                'menu_class'	=> 'menu menu-header ',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            )); ?>
        </nav>
    <?php } ?>
    <div class="social_links">
        <?php get_template_part('partials/social_profiles'); ?>
    </div>
</header>