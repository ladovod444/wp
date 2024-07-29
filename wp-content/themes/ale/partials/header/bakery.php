<header class="ale_header ale_header_bakery font_two cf">
	<div class="content_wrapper desktop_header cf">
		<div class="header_flex_box">
			<div class="header_flex_child logo_container">
				<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
					<?php if(ale_get_option('sitelogo')){?>
						<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
					<?php } else { ?>
						<h1><?php esc_attr(bloginfo('title')); ?></h1>
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
			</div>
			<div class="header_flex_child social_profiles_container">
				<?php get_template_part('partials/social_profiles'); ?>
			</div>
		</div>
	</div>
</header>