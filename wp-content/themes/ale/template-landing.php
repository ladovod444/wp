<?php
/*
  * Template name: Page Landing (no heading)
  * */
get_header(); ?>
<?php if(!is_front_page()){ get_template_part('partials/page_heading'); } ?>
	<div class="full-width-page flex_container">
		<div class="story ale_blog_archive content cf">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<?php get_template_part('partials/notfound')?>
			<?php endif; ?>
			<?php if (comments_open()) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>