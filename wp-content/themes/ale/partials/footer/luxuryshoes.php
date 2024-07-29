<footer class="luxuryshoes_footer">
	<div class="footer_logo">
		<a href="<?php echo esc_url(home_url("/")); ?>" class="footer_logo">
			<?php if(ale_get_option('footerlogo')){?>
				<img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="footer logo" />
			<?php } else { ?>
				<h1><?php esc_attr(bloginfo('title')); ?></h1>
			<?php } ?>
		</a>
	</div>

	<div class="copyrights font_two">
		<p><?php if(ale_get_option('copyrights')){
				echo ale_wp_kses(ale_get_option('copyrights'));
			} ?></p>
	</div>
</footer>