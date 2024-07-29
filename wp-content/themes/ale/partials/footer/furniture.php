<?php if(ale_get_option('design_variant') == 'magazine'){ ?>
	<?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
		<nav class="navigation footer_nav font_two">
			<?php
			wp_nav_menu(array(
				'theme_location'=> 'footer_menu',
				'menu'			=> 'Footer Menu',
				'menu_class'	=> 'menu menu-footer ',
				'walker'		=> new Aletheme_Nav_Walker(),
				'container'		=> '',
			)); ?>
		</nav>
	<?php
	} ?>
	<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
		<?php if(ale_get_option('instagram_feed_footer')=='enable'){
			echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
		} ?>
	<?php } ?>
<?php } ?>

<?php if(ale_get_option('design_variant') == 'creative' or ale_get_option('design_variant') == 'stephanie'){ ?>
	<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
		<?php if(ale_get_option('instagram_feed_footer')=='enable'){
			echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
		} ?>
	<?php } ?>
<?php } ?>

<?php if(ale_get_option('design_variant') == 'pixel'){ ?>
	<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <?php if(ale_get_option('instagram_feed_footer')=='enable'){
        echo '<div class="content_wrapper"><div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div></div>';
	} ?>
	<?php } ?>
<?php } ?>
<footer class="footer_furniture">
	<div class="content_wrapper font_two">
		<div class="footer_social">
            <?php if(ale_get_option('design_variant') !== 'pixel'){?><span class="title"><?php echo esc_html_e('FOLLOW US','ale'); ?></span><?php } ?>
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
</footer>