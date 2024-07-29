<footer>
        <div class="line">
            <div class="center">
                <?php
                if ( has_nav_menu( 'footer_menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                        'depth'         => 1,
                        'menu_class'    => 'links'
                    ));
                }
                ?>
                
                    <div class="copy">© <?php echo date("Y")." "; esc_html_e('All rights reserved.','ale'); ?> <span><?php echo bloginfo('name'); ?></span> </div>
                
            </div>
        </div>

        <div class="footer">
            <div class="center cf">
                <div class="col-4">
                    <h3><?php esc_html_e('Information','ale'); ?></h3>
                    <?php if(ale_get_option('copyrights')){ ?>
                        <p>
                            <?php echo ale_wp_kses(ale_get_option('copyrights')); ?>
                        </p>
                    <?php } ?>
                    <div class="social">
                        <?php get_template_part('partials/social_profiles'); ?>
                    </div>
                </div>
                <div class="col-4 twits">
                    <h3>Subscribe</h3>
                    <?php echo do_shortcode(ale_get_option('subscribe_shortcode')); ?>
                </div>
                <div class="col-4 contacts">
                    <h3><?php echo esc_html_e('Contacts','ale'); ?></h3>
                        <?php if(ale_get_option('footer_callnumber')){ ?><div class="phone"><span class="fa fa-mobile"></span><span><?php echo esc_html(ale_get_option('footer_callnumber')); ?></span></div><?php } ?>
                        
                        <?php if(ale_get_option('footer_address')){ ?>
                        <div class="adress">
                            <span class="fa fa-globe"></span>
                            <?php echo esc_attr(ale_get_option('footer_address')); ?>
                        </div>
                        <?php } ?>
                        <?php if(ale_get_option('footer_email_address')){ ?>
                            <div class="email"><span class="fa fa-envelope"></span><a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a></div>
                        <?php } ?>
                    
                </div>
                <?php if(ale_get_option('footer_info')):?>
                    <div class="footer-info col-12">
                        <?php echo ale_get_option('footer_info'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>