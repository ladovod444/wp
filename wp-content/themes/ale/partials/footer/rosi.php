<footer>
    <div class="content_wrapper ">
        <div class="logo_separator">
            <div class="line"></div>
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } ?>
            </a>
            <div class="line"></div>
        </div>
        <div class="bottom_navigation">
            <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
            <nav class="footer_navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location'=> 'footer_menu',
                    'menu'			=> 'Footer Menu',
                    'menu_class'	=> 'menu menu-footer font_one',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                )); ?>
            </nav>
            <?php } ?>
            <div class="social_profiles"><?php get_template_part('partials/social_profiles'); ?></div>
        </div>
    </div>
    <?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <?php if(ale_get_option('instagram_feed_footer')=='enable'){
        echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
    } ?>
    <?php } ?>
</footer>