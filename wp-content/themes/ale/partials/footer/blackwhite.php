<footer class="ale_footer_blackwhite cf">
    <div class="content_wrapper footer_flex cf">
        <div class="col-4 footer_menu">
            <?php
            if ( has_nav_menu( 'footer_menu' ) ) { ?>
                <!-- Main Menu header -->
                <nav class="navigation footer_nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'menu_class'	=> 'menu footer-menu',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
                <?php
            } else { ?> &nbsp; <?php } ?>
        </div>
        <div class="col-4 footer_contacts font_one">
            <span class="footer_logo">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } else { ?>
                    <?php esc_attr(bloginfo('title')); ?>
                <?php } ?>
            </span><br />
            <?php if(ale_get_option('footer_callnumber')){?>
                <span class="ale_phone">
                    <?php echo esc_attr(ale_get_option('footer_callnumber')); ?>
                </span><br />
            <?php } ?>
            <?php if(ale_get_option('footer_email_address')){ ?>
                <span class="ale_email">
                    <a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a>
                </span>
            <?php } ?>
        </div>
        <div class="col-4 footer_copyrights cf">
            <p>
            <?php
                if(ale_get_option('copyrights')){
                    echo ale_wp_kses(ale_get_option('copyrights'));
                }
            ?>
            </p>
        </div>
    </div>
</footer>