<header class="ale_header delizioso_header">
    <div class="top_line">
        <div class="content_wrapper">
            <div class="header_contacts">
                <?php if(ale_get_option('footer_callnumber')){ ?>
                    <span class="callnumber"></i> <?php echo esc_attr(ale_get_option('footer_callnumber')); ?></span>
                <?php } ?>
                <?php if(ale_get_option('footer_address')){ ?>
                    <span class="footeraddress"><i class="fa fa-map-marker" aria-hidden="true"></i></i> <?php echo esc_attr(ale_get_option('footer_address')); ?></span>
                <?php } ?>
            </div>
            <div class="header_social">
                <?php get_template_part('partials/social_profiles'); ?>
            </div>
        </div>
    </div>
    <div class="top">
        <div class="content_wrapper">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('sitelogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>

            <div class="top_navigation">
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
                } 

                //Load Mobile Popup Navigation
                get_template_part('partials/header/popup_mobile_menu'); 
                
                ?>
            </div>

            <div class="pop_search_form_container cf">
                <form class="search" method="get" id="header_search_form" action="<?php echo site_url()?>" >
                    <fieldset>
                        <input type="text" class="searchinput font_one" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type and press Enter', 'ale')?>" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</header>
<?php if(is_front_page()){ ?>
    <section class="delizioso_rev_slider">
        <?php if(ale_get_option('delizioso_slider')){ ?>
            <?php echo do_shortcode(ale_wp_kses(ale_get_option('delizioso_slider'))); ?>
        <?php } ?>
    </section>
<?php } ?>