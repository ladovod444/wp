<footer class="laptica_footer">
    <div class="content_wrapper">
        <div class="footer_logo_container">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="footer_logo">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="footer logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
            <?php if (ale_get_option('copyrights')) : ?>
                <div class="copy"><?php echo ale_wp_kses(ale_get_option('copyrights')); ?></div>
            <?php else: ?>
                <div class="copy">&copy; <?php esc_html_e('Copyright', 'ale')?></div>
            <?php endif; ?>
        </div>
        <div class="footer_data">
            <div class="contacts_footer">
                <nav class="footer_nav">
					<?php if ( has_nav_menu( 'footer_menu' ) ) {
						wp_nav_menu(array(
							'theme_location'=> 'footer_menu',
							'menu'			=> 'Footer Menu',
							'menu_class'	=> 'footermenu cf',
							'walker'		=> new Aletheme_Nav_Walker(),
							'container'		=> '',
							'depth'         => 1,
						));
					} ?>
				</nav>
                <div class="social">  
                    <?php get_template_part('partials/social_profiles'); ?>
                </div>
            </div>
            
        
        </div>
    </div>
</footer>