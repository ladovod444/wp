<header class="top cf">
    <div class="center">
        <div class="tel">
            <span><?php if(ale_get_option('footer_callnumber')){ echo esc_attr(ale_get_option('footer_callnumber'));} ?></span>
        </div>

        <div class="right">
            <?php if(ale_get_option('showsubsribe')=='1'){ ?>
            <div class="block email">
                <a><span class="fa fa-envelope"></span><?php echo ale_get_option('subscribetitle'); ?></a>
            </div>
            <?php } ?>

            <?php if(shortcode_exists('dgx-donate')): ?>
                <div class="block ale_donation_donate_ donate_">
                    <a><?php esc_html_e('Donate','ale'); ?></a>
                </div>
            <?php endif; ?>
            <div class="block name">
                <span><?php if(ale_get_option('footer_email_address')){ echo '<a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a>';} ?></span>
            </div>
            <div class="block search">
                <form method="get" action="<?php echo site_url()?>" >
                    <input type="search" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>
        <div class="get-news-form">
            <div class="exit">x</div>
            <?php if(shortcode_exists('mc4wp_form')) {
                echo do_shortcode('[mc4wp_form]');
            } else {
                echo '<div class="install">'.esc_html__('Please install MailChimp plugin' , 'ale').'</div>';
            } ?>
        </div>

        <div class="donate-form">
            <div class="exit">x</div>
            <?php
            if(shortcode_exists('seamless-donations')) {
                echo do_shortcode('[seamless-donations]');
                echo '';
            } else {
                echo '<div class="install">'.esc_html__('Please install plugin' , 'ale').'</div>';
            } ?>
        </div>
    </div>
</header>

<!-- Header Main -->
<header class="main">
    <div class="center">
        <div class="logo">
            <?php if(ale_get_option('sitelogo')){ ?>
                <a href="<?php echo esc_url(home_url("/")); ?>/" class="customlogo"><img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" /></a>
            <?php } else { ?>
                <a href="<?php echo esc_url(home_url("/")); ?>/" class="alelogo"><?php echo esc_html(bloginfo('name')); ?></a>
            <?php } ?>
        </div>

        <!-- Navigation -->
        <nav class="font_one">
            <?php
            if ( has_nav_menu( 'header_menu' ) ) {
                wp_nav_menu(array(
                    'theme_location'=> 'header_menu',
                    'menu'			=> 'Header Menu',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                ));
            }
            ?>
        </nav>

        <div id="mobile-button"><span class="fa fa-th-list"></span></div>
        <div id="mobile-menu" class="font_one">
            <?php
            if ( has_nav_menu( 'mobile_menu' ) ) {
                wp_nav_menu(array(
                    'theme_location'=> 'mobile_menu',
                    'menu'			=> 'Mobile Menu',
                    'walker'		=> new Aletheme_Nav_Walker(),
                    'container'		=> '',
                ));
            }
            ?>
        </div>
    </div>
</header>