<footer class="footer">
    <div class="top-section">
        <div class="content_wrapper container cf">
            <section class="footer-widget support">
                <h1 class="footer-widget__title font_three"><?php echo esc_html_e('Support','ale'); ?></h1>
                <?php if ( has_nav_menu( 'header_left_menu' ) ) { ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'=> 'header_left_menu',
                            'menu_class'	=> 'footer-widget__list',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        )); ?>
                <?php } ?>
            </section>

            <section class="footer-widget users">
                <h1 class="footer-widget__title"><?php echo esc_html_e('For users','ale'); ?></h1>

                <?php if ( has_nav_menu( 'header_right_menu' ) ) { ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'=> 'header_right_menu',
                            'menu_class'	=> 'footer-widget__list',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        )); ?>
                <?php } ?>
            </section>

            <section class="footer-widget contacts">
                <h1 class="footer-widget__title"><?php echo esc_html_e('Contacts','ale'); ?></h1>

                <div class="footer-widget__contacts">
                    <?php if(ale_get_option('footer_callnumber')){ ?>
                        <div class="footer-widget__phone font_one"><?php echo esc_html(ale_get_option('footer_callnumber')); ?></div>
                    <?php } ?>

                    <?php if(ale_get_option('footer_email_address')){ ?>
                        <div class="footer-widget__email"><a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a></div>
                    <?php } ?>

                    <?php if(ale_get_option('footer_address')){ ?>
                        <div class="footer-widget__address"><?php echo esc_html(ale_get_option('footer_address')); ?></div>
                    <?php } ?>

                </div>
            </section>

            <section class="tweets">
                <h1 class="tweets__title font_three"><i class="fa fa-instagram" aria-hidden="true"></i> <?php echo esc_html_e('instagram','ale'); ?></h1>
                <?php if(function_exists('ale_get_recent_from_instagram')){ ?>
                    <?php if(ale_get_option('instagram_feed_footer')=='enable'){
                        echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
                    } ?>
                <?php } ?>
            </section>
            <!-- end tweets -->
        </div>
        <!-- end container -->
    </div>
    <!-- end top section -->

    <div class="bottom-section">
        <div class="content_wrapper container cf">
            <div class="ins-top-section">
                <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
                    <nav class="wrap-second-nav font_one">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'=> 'footer_menu',
                            'menu'			=> 'Footer Menu',
                            'menu_class'	=> 'menu menu-footer second-nav',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        )); ?>
                    </nav>
                <?php } ?>
            </div>

            <div class="ins-bottom-section">
                <div class="social">
                    <?php get_template_part('partials/social_profiles'); ?>
                </div>

                <div class="copy"> <?php
                    if(ale_get_option('copyrights')){
                        echo ale_wp_kses(ale_get_option('copyrights'));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>