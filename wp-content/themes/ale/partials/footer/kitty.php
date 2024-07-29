<footer class="kitty_footer">
    <div class="content_wrapper">
        <div class="col-3 footer_logo">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="footer_logo">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="footer logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <div class="col-3 footer_contacts">
            <h4 class="footer_widget_title"><?php esc_html_e('Contacts','ale'); ?></h4>
            <div class="contact_text">
                <?php 
                    if(ale_get_option('footer_address')){
                        echo esc_attr(ale_get_option('footer_address'));
                    }
                    ?>
                <?php if(ale_get_option('footer_callnumber')){
                    echo '<div class="footer_phone"><strong>'.esc_html__('Phone:','ale').'</strong> '.esc_attr(ale_get_option('footer_callnumber')).'</div>';
                } 
                if(ale_get_option('footer_email_address')){
                    echo '<div class="footer_phone"><strong>'.esc_html__('E-mail:','ale').'</strong> <a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a></div>';
                } ?>
            </div>        
        </div>
        <div class="col-3 footer_menu">
            <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
                <h4 class="footer_widget_title"><?php esc_html_e('Links','ale'); ?></h4>
                <nav class="footer_nav">
                    <?php wp_nav_menu(array(
                            'theme_location'=> 'footer_menu',
                            'menu'			=> 'Footer Menu',
                            'menu_class'	=> 'footermenu cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                            'depth'         => 1,
                        )); ?>
                </nav>
            <?php } ?>
        </div>
        <div class="col-3 social_block">
            <div class="social">  
                    <?php get_template_part('partials/social_profiles'); ?>
                </div>
            <?php if (ale_get_option('copyrights')) : ?>
                <div class="copy"><?php echo ale_wp_kses(ale_get_option('copyrights')); ?></div>
            <?php else: ?>
                <div class="copy">&copy; <?php esc_html_e('All Rights Reserved', 'ale')?></div>
            <?php endif; ?>
        </div>
    </div>
</footer>