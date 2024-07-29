<footer class="footer_viaje">
	<div class="content_wrapper">
		<div class="bottom_footer">
			<?php if(ale_get_option('copyrights')){
				echo '<p>';
				echo ale_wp_kses(ale_get_option('copyrights'));
				echo '</p>';
			} ?>

			<div class="footer_social">
				<?php get_template_part('partials/social_profiles'); ?>
			</div>
		</div>
	</div>
</footer>