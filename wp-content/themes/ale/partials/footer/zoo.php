<footer class="footer_zoo">
	<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
	<?php if(ale_get_option('instagram_feed_footer')=='enable'){
		echo ale_get_recent_from_instagram();
	} ?>
	<?php } ?>
	<div class="footer_first_line">
		<div class="content_wrapper">
			<div class="footer_logo">
				<a href="<?php echo esc_url(home_url("/")); ?>" class="footer_logo">
					<?php if(ale_get_option('footerlogo')){?>
						<img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="footer logo" />
					<?php } else { ?>
						<h1><?php esc_attr(bloginfo('title')); ?></h1>
					<?php } ?>
				</a>
			</div>
			<div class="subscribe_form">
				<?php
				if(ale_get_option('subscribe_title')){
					echo "<h3 class='subscribe_form_title'>".esc_attr(ale_get_option('subscribe_title'))."</h3>";
				}
				if(ale_get_option('subscribe_shortcode')){
					echo '<div class="footer_form">'.do_shortcode(esc_attr(ale_get_option('subscribe_shortcode'))).'</div>';
				}
				?>
			</div>
		</div>
	</div>
	<div class="footer_second_line font_one">
		<div class="content_wrapper footer_bottom_elements">
			<div class="footer_contacts">
				<?php if(ale_get_option('footer_callnumber')){
					echo '<span class="footer_phone">'.ale_get_option('footer_callnumber').'</span>';
				}
				if(ale_get_option('footer_address')){
					echo '<span class="footer_address">'.ale_get_option('footer_address').'</span>';
				}
				if(ale_get_option('footer_email_address')){
					echo '<span class="footer_email_address"><a href="mailto:'.ale_get_option('footer_email_address').'">'.ale_get_option('footer_email_address').'</a></span>';
				}
				?>
			</div>
			<div class="footer_social">
				<?php echo esc_html_e('FOLLOW US','ale'); ?><br />
				<?php get_template_part('partials/social_profiles'); ?>
			</div>
			<div class="footer_copyrights">
				<p>
					<?php
					if(ale_get_option('copyrights')){
						echo ale_wp_kses(ale_get_option('copyrights'));
					}
					?>
				</p>
			</div>
		</div>
	</div>
</footer>

