<header class="ale_header ale_header_travelphoto font_two cf">
	<div class="desktop_header cf">
		<div class="header_flex_box">
            <?php if(ALETHEME_DESIGN_STYLE == 'cv'){ // Top Part?>
                <div class="top_part">
            <?php } ?>
			<div class="header_flex_child logo_container">
				<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
					<?php if(ale_get_option('sitelogo')){?>
						<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
					<?php } else { ?>
						<h1><?php esc_attr(bloginfo('title')); ?></h1>
					<?php } ?>
				</a>
                <?php if(ALETHEME_DESIGN_STYLE == 'travelphoto'){ ?>
				<span class="tagline">
				    <?php echo esc_attr(get_bloginfo('description')); ?>
			    </span>
                <?php } ?>
			</div>
			<div class="header_flex_child navigation_container">
				<?php if ( has_nav_menu( 'header_left_menu' ) ) { ?>
					<nav class="navigation header_nav">
						<?php
						wp_nav_menu(array(
							'theme_location'=> 'header_left_menu',
							'menu'			=> 'Header Left Menu',
							'menu_class'	=> 'menu menu-left-header ',
							'walker'		=> new Aletheme_Nav_Walker(),
							'container'		=> '',
						)); ?>
					</nav>
				<?php
				if(ALETHEME_DESIGN_STYLE == 'moka'){ 
					//Load Mobile Popup Navigation
					get_template_part('partials/header/popup_mobile_menu');;
				 } else {
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
					}
				 }
				} ?>
			</div>

            <?php if(ALETHEME_DESIGN_STYLE == 'cv'){ //End of Top Part ?>
                </div>
            <?php } ?>

            <?php if(ALETHEME_DESIGN_STYLE == 'travelphoto'){ ?>
                <div class="header_flex_child contacts_container cf">
                    <?php if(ale_get_option('footer_callnumber')){
                        echo '<span class="footer_phone">'.ale_get_option('footer_callnumber').'</span>';
                    }
                    if(ale_get_option('footer_email_address')){
                        echo '<span class="footer_email_address"><a href="mailto:'.ale_get_option('footer_email_address').'">'.ale_get_option('footer_email_address').'</a></span>';
                    } ?>
                </div>
            <?php } ?>
            <?php if(ALETHEME_DESIGN_STYLE == 'cv'){ ?>
                <div class="bottom_part">
                    <div class="social_container">
                        <?php get_template_part('partials/social_profiles'); ?>
                    </div>
			<?php } ?>

			<?php if(ALETHEME_DESIGN_STYLE == 'moka'){ 
				get_template_part('partials/header/cart_link');
			 } ?>

			<?php if(ALETHEME_DESIGN_STYLE != 'moka'){ ?>
				<div class="copyrights">
					<p>
						<?php if(ale_get_option('copyrights')){
							echo ale_wp_kses(ale_get_option('copyrights'));
						} ?>
					</p>
				</div>
			<?php } ?>

            <?php if(ale_get_option('design_variant') == 'cv'){ //End of Bottom Part ?>
                </div>
            <?php } ?>
		</div>
	</div>
</header>