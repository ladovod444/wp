<div class="colored_line">
    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
</div>
<footer class="site_footer">
    <div class="alekids_footer_ic1"></div>
    <div class="alekids_footer_ic2"></div>
    <div class="alekids_footer_ic3"></div>
    <div class="alekids_footer_ic4"></div>
    <div class="alekids_footer_ic5"></div>
    <div class="alekids_footer_ic6"></div>
    <div class="alekids_footer_ic"></div>
    <div class="wrapper content_wrapper top_line">
        <?php if(!empty(ale_get_option('footer_info'))){ ?>
            <div class="info_box">
                <div class="inner_footer_widget">
                <a href="<?php echo esc_url(home_url("/")); ?>">
                    <?php if(ale_get_option('footerlogo')){?>
                        <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="<?php esc_attr_e('logo','ale'); ?>" />
                    <?php } ?>
                </a>
                <?php if(ale_get_option('footer_info')){ ?><div class="footer_info"><?php echo wp_kses_post(ale_get_option('footer_info')); ?></div><?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="openning_box">
            <div class="inner_footer_widget">
            <h4><?php esc_html_e('Opening Hours','ale'); ?></h4>
            <?php if(ale_get_option('footer_openning_info')){ ?><div class="footer_openning_info"><?php echo wp_kses_post(ale_get_option('footer_openning_info')); ?></div><?php } ?>
            </div>
        </div>
        <div class="navigation_box">
            <div class="inner_footer_widget">
            <h4><?php esc_html_e('Navigate','ale'); ?></h4>
            <nav>
                <?php
                if ( has_nav_menu( 'footer_menu' ) ) { 
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu_class'	=> 'menu footer-menu',
                        'container'		=> '',
                    ));
                } ?>
            </nav>
            </div>
        </div>
        <div class="contact_box">
            <div class="inner_footer_widget">
            <h4><?php esc_html_e('Contacts','ale'); ?></h4>
            <?php if(ale_get_option('footer_address')){?>
                <div class="alekids_address">
                    <?php echo esc_html(ale_get_option('footer_address')); ?>
                </div>
            <?php } ?>
            <?php if(ale_get_option('footer_callnumber')){?>
                <div class="alekids_phone">
                    <?php echo '<strong>' . esc_html(ale_get_option('footer_callnumber')) . '</strong>';  ?>
                </div>
            <?php } ?>
            <?php if(ale_get_option('footer_email_address')){?>
                <div class="alekids_email">
                    <a href="mailto:<?php echo esc_html(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="scroll_top_line">
        <div class="scroll_top_container">
            <a href="#" class="alekids_button alekids_scroll_top">
                <div class="container">
                    <span><?php esc_html_e('Scroll to Top','ale'); ?></span>
                    <svg class="alekids_dashed"><rect x="5px" y="5px" rx="26px" ry="26px" width="0" height="0"></rect></svg>
                </div>
            </a>
        </div>
    </div>
    <div class="wrapper content_wrapper bottom_line">
        <?php if(ale_get_option('copyrights')){ ?><div class="copyrights"><?php echo wp_kses_post(ale_get_option('copyrights')); ?></div><?php } ?>
        <div class="social">
            <?php get_template_part('partials/social_profiles'); ?>
        </div>
    </div>
</footer>