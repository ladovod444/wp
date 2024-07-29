	<header class="cf">
		<!-- Menu -->
		<nav class="cf col-4">
			<div class="menu-home-icon left">
				<i class="fa fa-home yellow-col"></i>
			</div>

			<div class="menu-icon left">
				<i class="fa fa-bars white-col yellow-col-hover"></i>
			</div>

			<?php if ( has_nav_menu( 'header_menu' ) ) {
				wp_nav_menu(array(
					'theme_location'=> 'header_menu',
					'menu'			=> 'Header Menu',
					'menu_class'	=> 'menu font_one left cf',
					'walker'		=> new Aletheme_Nav_Walker(),
					'container'		=> '',
				));
			} ?>
		</nav>

		<!-- Logo -->
		<div class="logo col-4">
			<?php if(ale_get_option('sitelogo')){ ?>
				<a href="<?php echo esc_url(home_url("/")); ?>/" class="customlogo"><img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>"/></a>
			<?php } else { ?>
				<a href="<?php echo esc_url(home_url("/")); ?>/" class="alelogo">
					<?php echo esc_attr(bloginfo('name')); ?>
					<span>
						<?php echo esc_attr(bloginfo('description')); ?>
					</span>
				</a>
			<?php } ?>
		</div>

		<!-- Search, Phone -->
		<div class="col-4 cf">
			<div class="search right">
				<form method="get" action="<?php echo site_url()?>">
					<input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e('Search','ale'); ?>" />
					<button type="submit" id="searchsubmit"><i class="fa fa-search yellow-col"></i></button>
				</form>
			</div>

			<div class="phone right">
				<i class="fa fa-phone yellow-col"></i>

				<span class="number font_one">
					<?php $numbers = explode(' ', esc_attr(ale_get_option('footer_callnumber')));
					$number_count = 0;
					foreach ($numbers as $number){
						$number_count++;
						if($number_count == 1 || $number_count == 2){
							echo esc_attr($number) . ' ';
						} else {
							echo '<span>' . esc_attr($number) . '</span>';
						}
					}
					?>
				</span>

				<span class="text">
					<?php echo esc_html_e('Have a question? Call us now','ale'); ?>
				</span>
			</div>
		</div>
	</header>