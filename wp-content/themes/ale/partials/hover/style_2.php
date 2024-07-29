<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="light_opacity">
	<a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
		<?php echo get_the_post_thumbnail($post->ID,$thumb_size); ?>
	</a>
</div>