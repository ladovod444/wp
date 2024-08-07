<?php
/*
  * Template name: Page with Content and Posts List
  * */

get_header(); ?>
<?php if(!is_front_page()){ get_template_part('partials/page_heading'); }

//Sidebar position based on theme options
$ale_sidebar_position = ale_get_option('blog_sidebar_position');
$sidebar_class = '';

if($ale_sidebar_position){
	$sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
}
?>

	<div class="content_wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="content_holder cf">
				<?php the_content(); ?>
			</div>
		<?php endwhile;  endif; ?>
	</div>

	<div class="content_wrapper blog_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

		<?php if($ale_sidebar_position  !== 'no'){
			get_sidebar();
		} ?>

		<!-- Content -->
		<div class="story ale_blog_archive content cf">
			<?php
			//Columns Settings
			$ale_blog_columns = ale_get_option('default_blog_columns');
			$ale_columns_class = '';
			if($ale_blog_columns){
				$ale_columns_class = 'ale_blog_columns_'.esc_attr($ale_blog_columns);
			}
			//Text Align Settings
			$ale_blog_text_align = ale_get_option('default_blog_text_align');
			$ale_text_align_class = '';
			if($ale_blog_text_align){
				$ale_text_align_class = 'ale_blog_text_align_'.esc_attr($ale_blog_text_align);
			}
			//Grid type
			$blog_grid_type = 'blog_grid grid';
			if(ale_get_option('blog_grid_layout') == 'vintage'){
				$blog_grid_type = 'blog_grid vintage-grid';
			} else if(ale_get_option('blog_grid_layout') == 'furniture'){
				$blog_grid_type = 'blog_grid furniture-grid';
			}

			$ale_title_for_heading = '';
			if(ale_get_option('page_heading_style') == 'parallax_three'){
				if(ale_get_option('archiveblogtitle')){ $ale_title_for_heading = ale_get_option('archiveblogtitle'); };
				echo '<h2 class="post_title blog_title">'.esc_attr($ale_title_for_heading).'</h2>';
			}

			$blog_list = new WP_Query(array('post_type' == 'post'));
			?>
			<div class="<?php echo esc_attr($blog_grid_type)." ".esc_attr($ale_columns_class)." ".esc_attr($ale_text_align_class); ?>">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<?php if ($blog_list->have_posts()) : while ($blog_list->have_posts()) : $blog_list->the_post(); ?>
					<?php do_action('aletheme_specific_blog_grid'); ?>
				<?php endwhile; else: ?>
					<?php get_template_part('partials/notfound')?>
				<?php endif; ?>
			</div>
			<?php get_template_part('partials/pagination'); ?>
		</div>

	</div>
<?php get_footer(); ?>