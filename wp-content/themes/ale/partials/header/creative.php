<?php
$front_header = '';
$header_class = '';
$header_font = '';
$content_wrapper = 'content_wrapper';
if(ALETHEME_DESIGN_STYLE == 'creative') {
    if (is_front_page()) {
        $front_header = 'fixed_header';
    }
}
if(ALETHEME_DESIGN_STYLE == 'organic'){
	$content_wrapper = '';
}
switch (ALETHEME_DESIGN_STYLE) {
    case 'creative' :
        $header_class = 'ale_header_creative';
        $header_font = 'font_two';
        break;
    case 'rosi' :
        $header_class = 'ale_header_rosi';
        $header_font = 'font_one';
        break;
    case 'organic' :
        $header_class = 'ale_header_organic';
        $header_font = 'font_two';
        break;
} ?>
<header class="ale_header <?php echo esc_attr($front_header); ?> <?php echo esc_attr($header_font); ?> <?php echo esc_attr($header_class); ?> cf">
	<div class="<?php echo esc_attr($content_wrapper); ?> desktop_header cf">
		<div class="header_flex_box">
			<div class="header_flex_child logo_container">
				<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
					<?php if(ale_get_option('sitelogo')){?>
						<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
					<?php } else { ?>
						<h1><?php esc_attr(bloginfo('title')); ?></h1>
					<?php } ?>
                    <?php if(ALETHEME_DESIGN_STYLE != 'rosi' and ALETHEME_DESIGN_STYLE != 'organic'){ ?>
                        <span class="tagline">
                            <?php echo esc_attr(get_bloginfo('description')); ?>
                        </span>
                    <?php } ?>
				</a>
			</div>
			<div class="header_flex_child navigation_container">
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
            <?php if(ALETHEME_DESIGN_STYLE == 'rosi'){ ?>
                <div class="header_flex_child currency_container">
                    <?php echo esc_attr(get_option('woocommerce_currency')) . esc_attr(get_woocommerce_currency_symbol()); ?>
                </div>
            <?php }?>

			<div class="header_flex_child cart_container">
				<?php get_template_part('partials/header/cart_link'); ?>
			</div>
			<div class="header_flex_child search_container menu_pop_search">
				<div class="search_open_button">
					<i class="fa fa-search" aria-hidden="true"></i>
				</div>
                <?php if(ALETHEME_DESIGN_STYLE == 'rosi'){?>
                    <div class="pop_search_form_container_rosi cf">
                        <form class="search" method="get" id="header_search_form" action="<?php echo esc_url(site_url());?>" >
                            <fieldset>
                                <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type here...', 'ale')?>" />
                                <input type="submit" id="searchsubmit" class="font_two" value="<?php esc_attr_e('search','ale'); ?>" />
                                <span class="close_the_form font_two"><?php echo esc_html_e('Close','ale'); ?></span>
                            </fieldset>
                        </form>
                    </div>
                <?php } else {?>
                    <div class="pop_search_form_container cf">
                        <form class="search" method="get" id="header_search_form" action="<?php echo esc_url(site_url());?>" >
                            <fieldset>
                                <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type here...', 'ale')?>" />
                                <input type="submit" id="searchsubmit" value="&#xf002" />
                                <span class="close_the_form"><i class="fa fa-times" aria-hidden="true"></i></span>
                            </fieldset>
                        </form>
                    </div>
                <?php } ?>

			</div>
		</div>
	</div>
</header>