<footer class="moka_footer">
    <?php if(ale_get_option('footerlogo')){ ?>
        <a href="<?php echo esc_url(home_url("/")); ?>/" class="footerlogo"><img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="<?php echo esc_attr(bloginfo('name')); ?>"/></a>
    <?php } ?>

    <div class="footer_social">
        <h5><?php esc_html_e('We are social','ale'); ?></h5>
        <div class="social_icons_list">
            <?php get_template_part('partials/social_profiles'); ?>
        </div>
    </div>
    

    <nav class="footer_navigaton">
        <?php if ( has_nav_menu( 'footer_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'footer_menu',
                'menu'			=> 'Footer Menu',
                'menu_class'	=> 'footermenu font_two cf',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
                'depth'         => 1,
            ));
        } ?>
    </nav>

    <div class="copyright font_two">
        <?php if (ale_get_option('copyrights')) { ?>
            <?php echo ale_option('copyrights'); ?>
        <?php } ?>
    </div>
</footer>