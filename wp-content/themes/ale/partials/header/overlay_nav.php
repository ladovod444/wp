<?php
$overlay_style = '';
if(ale_get_option('design_variant') == 'camping' or ale_get_option('design_variant') == 'pixel' or ale_get_option('design_variant') == 'po'){
	$overlay_style = 'overlay-contentpush';
} elseif(ale_get_option('design_variant') == 'photography') {
	$overlay_style = 'overlay-slidedown';
} elseif(ale_get_option('design_variant') == 'wedding') {
	$overlay_style = 'overlay-door';
} else {
	$overlay_style = 'overlay-slidedown';
}
?>

<div class="overlay <?php echo esc_attr($overlay_style); ?>">
	<?php if(ale_get_option('design_variant') == 'wedding') {?>
		<div class="overlay_top_header">
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
			<div class="menu_nav_container">
				<div class="open_menu closed make_it_vertical overlay-close">Close</div>
			</div>
		</div>
		<div class="overlay_data">
			<div class="left_part">
				<?php if(ale_get_option('footer_email_address')){
					echo '<span class="email"><a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a></span>';
				} ?>
				<?php if(ale_get_option('footer_callnumber')){
					echo '<span class="phone">'.esc_attr(ale_get_option('footer_callnumber')).'</span>';
				} ?>
				<?php if(ale_get_option('footer_address')){
					echo '<span class="address">'.esc_attr(ale_get_option('footer_address')).'</span>';
				} ?>
			</div>
			<div class="right_part">
				<?php if ( has_nav_menu( 'header_menu' ) ) { ?>
					<?php wp_nav_menu(array(
						'theme_location'=> 'header_menu',
						'menu'			=> 'Header Menu',
						'menu_class'	=> 'menu menu-header font_two',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
					)); ?>
				<?php } ?>
			</div>
		</div>
	<?php } else if(ale_get_option('design_variant') == 'pixel') { ?>
        <div class="nav_container">
            <div class="pixel_navigation">
                <nav class="font_two">
                    <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                        <?php wp_nav_menu(array(
                            'theme_location'=> 'header_menu',
                            'menu'			=> 'Header Menu',
                            'menu_class'	=> 'menu menu-header font_two',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        )); ?>
                    <?php } ?>
                </nav>
            </div>
        </div>
        <span class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></span>
    <?php } else { ?>
		<div class="header_line">
			<div class="logo_container">
				<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
					<?php if(ale_get_option('sitelogo')){?>
						<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
					<?php } else { ?>
						<h1><?php esc_attr(bloginfo('title')); ?></h1>
					<?php } ?>
				</a><br />
				<span class="tagline font_one">
					<?php echo esc_attr(get_bloginfo('description')); ?>
				</span>
			</div>
			<span class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>

		<div class="nav_container">
			<div>
			<nav class="font_two">
				<?php if ( has_nav_menu( 'header_menu' ) ) { ?>
					<?php wp_nav_menu(array(
						'theme_location'=> 'header_menu',
						'menu'			=> 'Header Menu',
						'menu_class'	=> 'menu menu-header font_two',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
					)); ?>
				<?php } ?>
				<div class="social">
					<?php get_template_part('partials/social_profiles'); ?>
				</div>
			</nav>
			</div>
		</div>
	<?php } ?>
</div>