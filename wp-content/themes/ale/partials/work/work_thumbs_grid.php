<div class="work-thumbs-grid cf">
	<div class="three-columns-grid">
		<?php wp_enqueue_script( 'lightbox' );

		$images = get_post_meta($post->ID, 'ale_gallery_id', true);
		if ( $images ){
			$i=0;
			foreach ( $images as $attachment ) { ?>
				<div class="grid_item_work">
					<a href="<?php echo esc_url(wp_get_attachment_url($attachment)); ?>" data-lightbox="<?php echo esc_attr(basename( get_attached_file( $attachment ))) ?>" data-title="My caption">
						<?php if($i==0){
							echo wp_get_attachment_image( $attachment, 'works-photobig' );
						} else {
							echo wp_get_attachment_image( $attachment, 'works-photosmall' );
						}  ?>
					</a>
				</div>
			<?php $i++;
			}
		} ?>
	</div>

</div>