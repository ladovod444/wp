<?php
$ale_date_position = ale_get_option('blog_custom_date_position');
$ale_post_line_position = ale_get_option('blog_custom_postline_position');
?>
<article <?php post_class('furniture-item cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
	<div class="item_data_holder">
		<div class="data_holder">
			<?php if($ale_post_line_position == 'beforetitle'){get_template_part('partials/blog/blog_info');} ?>
			<h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
			<?php if($ale_post_line_position == 'aftertitle'){get_template_part('partials/blog/blog_info');} ?>
			<p class="post_excerpt">
				<?php
				$ale_custom_excerpt_count = '';
				if(ale_get_option('custom_blog_excerpt_count')){
					$ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
				} else {
					$ale_custom_excerpt_count = 20;
				}
				echo ale_limit_excerpt($ale_custom_excerpt_count); ?>
			</p>
			<?php if($ale_post_line_position == 'aftercontent'){get_template_part('partials/blog/blog_info');} ?>
			<?php get_template_part('partials/blog/share') ?>
		</div>
	</div>
	<div class="featured_image_holder">
		<?php if(has_post_thumbnail()){?>
			<div class="image_box">
				<a href="<?php esc_url(the_permalink()); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'post-simplelarge'); ?></a>
			</div>

		<?php } ?>
	</div>

</article>