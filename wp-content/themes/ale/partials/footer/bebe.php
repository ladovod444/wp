<footer>
    <section>
        <div class="center-align cf">

            <!-- Some Info  -->
            <div class="col-6 float-left">
                <div class="col-5 information">
                    <h3><?php esc_html_e('Information','ale'); ?></h3>
                    <?php
                    if ( has_nav_menu( 'footer_menu' ) ) { 
                        wp_nav_menu(array(
                            'theme_location'=> 'footer_menu',
                            'menu'			=> 'Footer Menu',
                            'menu_class'	=> 'menu footer-menu',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                    } ?>
                </div>
                <div class="col-7 contacts">
                    <h3><?php esc_html_e('Contacts','ale'); ?></h3>
                    <?php if(ale_get_option('footer_callnumber')){ ?><span class="tel"><?php echo esc_html(ale_get_option('footer_callnumber')); ?></span><?php } ?>
                    <?php if(ale_get_option('footer_email_address')){ ?><span><?php echo esc_html(ale_get_option('footer_email_address')); ?></span><?php } ?>
                    <?php if(ale_get_option('footer_address')){ ?><span><?php echo esc_html(ale_get_option('footer_address')); ?></span><?php } ?>


                    <?php get_template_part('partials/social_profiles'); ?>
                </div>
            </div>

            <!-- Form -->
            <div class="form float-right">
                <?php get_template_part('partials/footer/contact_form'); ?>
            </div>

        </div>

        <!-- Bottom Line -->
        <div class="bottom-line">
            <a class="backtotop top" href="#top"><?php esc_html_e('TOP','ale'); ?></a>

            <div class="center-align cf">
                <div class="left">
                    <?php
                    if(ale_get_option('copyrights')){
                        echo ale_wp_kses(ale_get_option('copyrights'));
                    } else {
                        echo "&copy; "; 
                        esc_html_e('BeBe. All rights reserved','ale');
                    } ?>
                </div>
                <div class="right">
                    <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                        <?php if(ale_get_option('footerlogo')){?>
                            <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="logo" />
                        <?php } else { ?>
                            <h1><?php esc_attr(bloginfo('title')); ?></h1>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>

    </section>


    <!-- Background Awesomeness -->
    <div id="footer-white"></div>
    <div id="footer-yellow"></div>

    <!-- Clouds -->
    <div id="footer-cloud1"></div>
    <div id="footer-cloud2"></div>

    <!-- Birds -->
    <div id="footer-bird1"></div>
    <div id="footer-bird2"></div>
    <div id="footer-bird3"></div>

    <!-- Waves -->
    <div class="waves">
        <?php if(is_front_page()){?>
            <div id="footer-wave1"></div>
            <div id="bui"></div>
            <div id="footer-wave2"></div>
        <?php } else {?>
            <div id="bui2"></div>
            <div id="footer-wave1"></div>
            <div id="footer-wave2"></div>
        <?php } ?>
    </div>
    
</footer>