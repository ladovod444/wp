<div class="right_info_container">
	<div class="right_info_item_line">
		<span class="info_label font_two category_label">
			<?php esc_html_e('Category:','ale') ?>
		</span>
		<span class="info_value category_value">
			<?php if(is_singular('post')){
				the_category(', ', '');
			} if(is_singular('works')){
				$type_terms = get_the_terms( get_the_ID(), "work-category" );
				if(!empty($type_terms)){
					foreach($type_terms as $term){
						echo esc_attr($term->name);
					}
				}
			} ?>
		</span>
	</div>

	<div class="right_info_item_line">
		<span class="info_label font_two author_label">
			<?php esc_html_e('Author:','ale') ?>
		</span>
		<span class="info_value author_value">
			<?php echo esc_attr(get_the_author());?>
		</span>
	</div>

	<div class="right_info_item_line">
		<span class="info_label font_two date_label">
			<?php esc_html_e('Date:','ale') ?>
		</span>
		<span class="info_value date_value">
			<?php echo esc_attr(get_the_date());?>
		</span>
	</div>

</div>