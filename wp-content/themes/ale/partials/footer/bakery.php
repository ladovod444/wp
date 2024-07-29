<footer class="footer_bakery">
	<div class="top_footer">
		<div class="content_wrapper">
			<div class="subscribe_form">
				<?php if(ale_get_option('subscribe_title')){
					echo "<h3 class='subscribe_form_title font_two'>".esc_attr(ale_get_option('subscribe_title'))."</h3>";
				}
				if(ale_get_option('subscribe_shortcode')){
					echo '<div class="footer_form">'.do_shortcode(esc_attr(ale_get_option('subscribe_shortcode'))).'</div>';
				} ?>
			</div>
			<div class="footer_social">
				<div class="social_title"><?php echo esc_html_e('FOLLOW US','ale'); ?></div>
				<?php get_template_part('partials/social_profiles'); ?>
			</div>
		</div>
	</div>
	<div class="bottom_footer">
		<div class="content_wrapper">
			<div class="copyrights">
				<p><?php if(ale_get_option('copyrights')){
					echo ale_wp_kses(ale_get_option('copyrights'));
				} ?></p>
			</div>
		</div>
	</div>
</footer>