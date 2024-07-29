<footer class="footer footer_wedding">
	<div class="wrapper">
		<div class="bottom_elements">
			<p class="copyrights">
				<?php
				if(ale_get_option('copyrights')){
					echo ale_wp_kses(ale_get_option('copyrights'));
				}
				?>
			</p>
			<div class="social_icons">
				<?php get_template_part('partials/social_profiles'); ?>
			</div>
			<div class="backtotop">
				<span><?php esc_html_e('back to top','ale'); ?> <i class="fa fa-chevron-up" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</footer>