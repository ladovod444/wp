<div class="luxuryshoes_drop_menu close">
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
	<?php } ?>
</div>
<header class="ale_header ale_header_luxuryshoes font_two cf">
	<div class="desktop_header">
	<div class="nav_button">
		<i id="nav_open" class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="logo_container">
		<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
			<?php if(ale_get_option('sitelogo')){?>
				<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
			<?php } else { ?>
				<h1><?php esc_attr(bloginfo('title')); ?></h1>
			<?php } ?>
		</a>
	</div>
	<?php get_template_part('partials/header/cart_link'); ?>
	<div class="social_links">
		<?php echo get_template_part('partials/social_profiles'); ?>
	</div>
	</div>
	<div class="mobile_nav">
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
</header>

