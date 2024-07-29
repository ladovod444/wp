<div class="grid-line">
	<div class="category">
		<span class="item_label"><?php esc_html_e('Posted in:','ale'); ?></span>
		<span class="item_value font_two">
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
	<div class="grid">
		<a href="<?php echo esc_js('javascript:history.go(-1)'); ?>"><i class="fa fa-th" aria-hidden="true"></i></a>
	</div>
	<div class="date">
		<span class="item_label"><?php esc_html_e('Date:','ale'); ?></span>
		<span class="item_value font_two">
			<?php echo get_the_date(); ?>
		</span>
	</div>
</div>