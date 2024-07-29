<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="border_style">
	<a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
		<?php
			echo get_the_post_thumbnail($post->ID,$thumb_size);
		?>
	</a>
	<div class="top_border"></div>
	<div class="bottom_border"></div>
	<div class="left_border"></div>
	<div class="right_border"></div>
</div>