<footer>
		<div class="to-top">
			<div class="arrow backtotop">
				<i class="fa fa-arrow-up"></i>
			</div>
		</div>

		<div class="wrapper-inner">
			<div class="top-line cf">
				<div class="col-3 contact">
					<h2 class="font_two"><?php echo esc_html_e('Contacts','ale'); ?></h2>
					<ul>
						<?php if(ale_get_option('footer_callnumber')){ ?>
							<li><?php echo esc_html(ale_get_option('footer_callnumber')); ?></li>
						<?php } ?>

						<?php if(ale_get_option('footer_email_address')){ ?>
							<li><?php echo esc_html(ale_get_option('footer_email_address')); ?></li>
						<?php } ?>

						<?php if(ale_get_option('footer_address')){ ?>
							<li><?php echo esc_html(ale_get_option('footer_address')); ?></li>
						<?php } ?>
					</ul>
				</div>

				<!-- Logo -->
				<div class="logo col-6">
					<?php if(ale_get_option('footerlogo')){ ?>
						<a href="<?php echo esc_url(home_url("/")); ?>/" class="customlogo"><img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="<?php echo esc_attr(bloginfo('name')); ?>"/></a>
					<?php } else { ?>
						<a href="<?php echo esc_url(home_url("/")); ?>/" class="alelogo">
							<?php echo esc_attr(bloginfo('name')); ?>
						</a>
					<?php } ?>
					<hr>
				</div>

				<nav class="col-3">
					<?php if ( has_nav_menu( 'footer_menu' ) ) {
						wp_nav_menu(array(
							'theme_location'=> 'footer_menu',
							'menu'			=> 'Footer Menu',
							'menu_class'	=> 'footermenu cf',
							'walker'		=> new Aletheme_Nav_Walker(),
							'container'		=> '',
							'depth'         => 1,
						));
					} ?>
				</nav>
			</div>

			<div class="bottom-line cf">
				<!-- Copy -->
				<div class="col-3 copyright">
					<?php if (ale_get_option('copyrights')) : ?>
						<p><?php echo ale_option('copyrights'); ?></p>
					<?php else: ?>
						<p>&copy; <?php esc_html_e('2020 ALL RIGHTS RESERVED', 'ale')?></p>
					<?php endif; ?>
				</div>

				<!-- Social -->
				<div class="social col-6">
					<?php get_template_part('partials/social_profiles'); ?>
				</div>
			</div>
		</div>
	</footer>