<footer class="footer">
    <div class="bloc1 twitterwidget cf">
        <div class="content_wrapper">
            <div class="col-3">
                <div class="float-left">
                    <span class="twit"><b>
                            <?php if(ale_get_option('subscribe_title')){ echo esc_attr(ale_get_option('subscribe_title')); } ?>
                        </b> <br />
                    </span><span class="about-twit"><?php esc_html_e('to our newsletter','ale'); ?></span>
                </div>
            </div>
            <div class="twitterbox col-9">
                <?php if(ale_get_option('subscribe_shortcode')){
                    echo '<div class="footer_form">'.do_shortcode(esc_attr(ale_get_option('subscribe_shortcode'))).'</div>';
                } ?>
                <div class="cf"></div>
            </div>
        </div>
    </div>
    <div class="bloc2 cf">
        <div class="content_wrapper">
            <div class="content-footer">
                <div class="col-3">
                    <span class="name-contact"><b><?php esc_html_e('Contact','ale');?> </b> <br /></span>
                    <?php if(ale_get_option('footer_callnumber')){ ?><span class="about-contact"><strong><?php echo esc_html(ale_get_option('footer_callnumber')); ?></strong><br /></span><?php } ?>
                    <?php if(ale_get_option('footer_email_address')){ ?><span class="mail"><a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a><br /></span><?php } ?>
                    <?php if(ale_get_option('footer_address')){ ?><span class="street"><?php echo esc_html(ale_get_option('footer_address')); ?></span><?php } ?>
                </div>
                <div class="col-3">
                    <span class="information"><b><?php esc_html_e('Information','ale'); ?> </b> <br /></span>
                    <?php if ( has_nav_menu( 'footer_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'footer_menu',
                            'menu'			=> 'Footer Menu',
                            'menu_class'	=> 'cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                    } ?>
                </div>
                <div class="col-6">
                    <div class="vertical-line">
                        <div class="information2"><p><?php
                                if(ale_get_option('copyrights')){
                                    echo ale_wp_kses(ale_get_option('copyrights'));
                                }
                                ?></p></div>
                        <div class="information3-icon">
                            <?php get_template_part('partials/social_profiles'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>