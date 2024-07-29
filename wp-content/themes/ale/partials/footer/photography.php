<?php $font_family = '';
	if(ale_get_option('design_variant') == 'camping'){
		$font_family = 'font_one';
	} else {
		$font_family = 'font_two';
	}
?>
<footer class="olins_footer footer_photography footer_camping">
	<div class="footer_child social_box <?php echo esc_attr($font_family); ?>">
		<span class="soc_title"><?php echo esc_html_e('We are social','ale'); ?></span>
		<?php get_template_part('partials/social_profiles'); ?>
	</div>
	<div class="footer_child contact_box">
		<?php if(ale_get_option('footer_callnumber')){
			echo '<span class="footer_phone '.esc_attr($font_family).'">'.ale_get_option('footer_callnumber').'</span><br />';
		}
		if(ale_get_option('footer_email_address')){
			echo '<span class="footer_email_address"><a href="mailto:'.ale_get_option('footer_email_address').'">'.ale_get_option('footer_email_address').'</a></span>';
		} ?>
	</div>
	<div class="footer_child copyrights">
		<p>
			<?php if(ale_get_option('copyrights')){
				echo ale_wp_kses(ale_get_option('copyrights'));
			} ?>
		</p>
	</div>
</footer>