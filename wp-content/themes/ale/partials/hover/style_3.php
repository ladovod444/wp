<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="mask_opacity">
	<a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
		<?php echo get_the_post_thumbnail($post->ID,$thumb_size); ?>
	</a>
	<div class="mask_bg">
		<div class="inner_mask"></div>
	</div>
	<div class="mask_data">
		<div class="inner_container">
			<span class="plus_button">
				<a href="<?php echo esc_url(the_permalink()); ?>"> <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
			</span>
			<h3 class="title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
			<span class="category">
				<?php $type_terms = get_the_terms( get_the_ID(), "work-category" );
				if(!empty($type_terms)){
					$i = '0';
					foreach($type_terms as $term){
						if($i>0){
							echo esc_attr(", ");
						}
						echo esc_attr($term->name);
						$i++;
					}
				}?>
			</span>
		</div>
	</div>
</div>