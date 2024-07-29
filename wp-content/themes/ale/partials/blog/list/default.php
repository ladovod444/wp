<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('blog_sidebar_position');
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
    } 
?>
<div class="content_wrapper blog_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">
    <?php if($ale_sidebar_position  !== 'no'){ get_sidebar(); } ?>
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
        } else if(ale_get_option('blog_grid_layout') == 'brigitte'){
            $blog_grid_type = 'blog_grid brigitte-grid';
        }

        $ale_title_for_heading = '';
        if(ale_get_option('page_heading_style') == 'parallax_three'){
            if(ale_get_option('archiveblogtitle')){ $ale_title_for_heading = ale_get_option('archiveblogtitle'); };
            echo '<h2 class="post_title blog_title">'.esc_attr($ale_title_for_heading).'</h2>';
        } ?>
        <div class="<?php echo esc_attr($blog_grid_type)." ".esc_attr($ale_columns_class)." ".esc_attr($ale_text_align_class); ?>">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                do_action('aletheme_specific_blog_grid'); 
            endwhile; else: 
                get_template_part('partials/notfound');
            endif; ?>
        </div>
        <?php get_template_part('partials/pagination'); ?>
    </div>
</div>