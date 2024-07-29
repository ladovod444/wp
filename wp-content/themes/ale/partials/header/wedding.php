<header class="ale_header ale_header_wedding font_one cf">
	<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
		<?php if(ale_get_option('sitelogo')){?>
			<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
		<?php } else { ?>
			<h1><?php esc_attr(bloginfo('title')); ?></h1>
		<?php } ?>
	</a>
	<span class="tagline font_one">
		<?php echo esc_attr(get_bloginfo('description')); ?>
	</span>
	<div class="social_container">
		<div class="social_items">
			<?php get_template_part('partials/social_profiles'); ?>
		</div>
	</div>
	<div class="menu_nav_container">
		<span class="open_menu closed make_it_vertical" id="trigger-overlay"><?php esc_html_e('Menu','ale'); ?></span>
	</div>
</header>