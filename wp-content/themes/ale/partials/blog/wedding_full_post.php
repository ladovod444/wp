<div class="wedding_full_post sidebar_position_no cf">

	<!-- Content -->
	<div class="wrapper story ale_blog_archive single_post content cf">
		<div class="cf">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('partials/posthead' );?>
				<?php get_template_part('partials/postcontent' );?>
				<?php get_template_part('partials/postfooter' );?>
			<?php endwhile; else: ?>
				<?php get_template_part('partials/notfound')?>
			<?php endif; ?>
		</div>
		<?php get_template_part('partials/pagination'); ?>

		<div class="content_wrapper comments_bottom">
			<?php if (comments_open()) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php if(ale_get_meta('post_info_line') == 'thumbs_line'){
		get_template_part('partials/blog/thumbs_line');
	} ?>
</div>