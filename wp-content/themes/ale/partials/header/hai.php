<div class="content_wrapper">
    <div class="top_line">
        <div class="header_contacts">
            <?php if(ale_get_option('footer_callnumber')){ ?>
                <i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_attr(ale_get_option('footer_callnumber')); ?>
            <?php } ?>
            <?php if(ale_get_option('footer_email_address')){ ?>
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a>
            <?php } ?>
        </div>
        <div class="header_social">
            <?php get_template_part('partials/social_profiles'); ?>
        </div>
    </div>
</div>
<div class="hai_page_container">
    <header class="top">
        <div class="content_wrapper">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>

            <nav class="top_navigation">
                <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
					<nav class="navigation header_nav">
						<?php
						wp_nav_menu(array(
							'theme_location'=> 'header_menu',
							'menu'			=> 'Header Menu',
							'menu_class'	=> 'menu menu-header ',
							'walker'		=> new Aletheme_Nav_Walker(),
							'container'		=> '',
						)); ?>
					</nav>
				<?php
				} ?>
				<?php
				if ( has_nav_menu( 'mobile_menu' ) ) {
					wp_nav_menu(array(
						'theme_location'=> 'mobile_menu',
						'menu'   => 'Mobile Menu',
						'menu_class' => 'mobilemenu',
						'container'  => '',
						'items_wrap' => '<select id="%1$s" class="%2$s drop">%3$s</select>',
						'indent_string' => '&ndash;&nbsp;',
						'indent_after' => '',
						'walker' => new Aletheme_Dropdown_Nav_Walker(),
					));
				} ?>
            </nav>
        </div>
    </header>

