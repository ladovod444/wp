<div class="creative-thumbs-grid cf">
	<div class="grid_item_work">
	<?php wp_enqueue_script( 'lightbox' );
	$images = get_post_meta($post->ID, 'ale_gallery_id', true);
	if ( $images ){
		$i=0;
		foreach ( $images as $attachment ) {
			$image = get_post($attachment);
			$image_title = $image->post_title;
			?>
				<?php if($i==0){ ?>
					<a class="full_width" href="<?php echo esc_url(wp_get_attachment_url($attachment)); ?>" data-lightbox="<?php echo esc_attr(basename( get_attached_file( $attachment ))) ?>" data-title="<?php echo esc_attr($image_title); ?>">
						<?php echo wp_get_attachment_image( $attachment, 'works-gridextrabig' ); ?>
					</a>
				<?php } else { ?>
					<a class="half_width" href="<?php echo esc_url(wp_get_attachment_url($attachment)); ?>" data-lightbox="<?php echo esc_attr(basename( get_attached_file( $attachment ))) ?>" data-title="<?php echo esc_attr($image_title); ?>">
						<?php echo wp_get_attachment_image( $attachment, 'works-squaremedium' ); ?>
					</a>
				<?php }  ?>

			<?php $i++;
		}
	} ?>
	</div>
</div>