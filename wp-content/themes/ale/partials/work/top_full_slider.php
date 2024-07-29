<div class="slider_top_info_box font_one cf">
	<div class="content_wrapper">
		<div class="flex_box">
			<div class="line_item">
				<span class="item_title"><?php esc_html_e('Category','ale'); ?></span>
				<span class="item_value">
					<?php $type_terms = get_the_terms( get_the_ID(), "work-category" );

					if(!empty($type_terms)){
						foreach($type_terms as $term){
							echo esc_attr($term->name);
							break;
						}
					} ?>
				</span>
			</div>
			<div class="line_item">
				<span class="item_title"><?php esc_html_e('Date','ale'); ?></span>
				<span class="item_value"><?php echo esc_html(get_the_date()); ?></span>
			</div>
			<div class="line_item">
				<span class="item_title"><?php esc_html_e('Author','ale'); ?></span>
				<span class="item_value"><?php $post_author = get_post_field( 'post_author', $post->ID ); echo get_the_author_meta('nicename', $post_author); ?></span>
			</div>
		</div>
	</div>
</div>
<?php $images = get_post_meta($post->ID, 'ale_gallery_id', true);
if ( $images ){ ?>
	<div class="flexslider top_full_images_slider">
		<ul class="slides">
			<?php foreach ( $images as $attachment ) { ?>
				<li>
					<?php echo wp_get_attachment_image( $attachment, 'full' ); ?>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>