<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="creative_style">
	<a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
		<?php
		echo get_the_post_thumbnail($post->ID,$thumb_size);
		?>
		<div class="white-mask">
			<h3 class="title"><?php esc_attr(the_title()); ?></h3>
			<?php if(ale_get_meta('post_pre_title',$post->ID)){ ?>
				<span class="pre-title olins_creative_text">
					<?php echo esc_html(ale_get_meta('post_pre_title',$post->ID)); ?>
				</span>
			<?php } ?>
		</div>
	</a>
</div>