<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('work_sidebar_position');
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class = 'sidebar_position_'. $ale_sidebar_position;
    }

    //Works Container Settings
    $works_container_class = '';
    if(ale_get_option('works_container_prop') == '2'){
        $works_container_class = 'full_width_no_paddings';
    }
    ?>

<div class="content_wrapper flex_container works_page <?php  echo esc_attr($sidebar_class) .' '. esc_attr($works_container_class); ?> cf">

    <?php if(ale_get_option('works_extra_heading')=='2'){
        $extra_line_1 = ale_get_option('work_extra_line1');
        $extra_line_2 = ale_get_option('work_extra_line2');
        $bg_color = ale_get_option('work_extra_bg'); ?>

        <div class="extra_heading font_one" <?php if($bg_color){ echo 'style="background-color:'.esc_attr($bg_color).'"';} ?>>
            <?php if($extra_line_1) { echo '<h2 class="extra_heading_line1">'.esc_attr($extra_line_1).'</h2>'; }?>
            <?php if($extra_line_2) { echo '<p class="extra_heading_line2">'.esc_attr($extra_line_2).'</p>'; }?>
        </div>
    <?php } ?>

    <?php if($ale_sidebar_position  !== 'no'){ get_sidebar(); } ?>

    <div class="story ale_work_archive <?php echo 'ale_theme_hover_style_id_'.esc_attr(ale_get_option('work_hover')) ?> content cf">
        <?php
        //Columns Settings
        $ale_work_columns = ale_get_option('default_work_columns');
        $ale_columns_class = '';

        if($ale_work_columns){
            $ale_columns_class = 'ale_work_columns_'.esc_attr($ale_work_columns);
        } ?>

        <?php if(ale_get_option('taxonomy_navigation')== 'enable'){
            $works_categories = get_terms(array('taxonomy' => 'work-category','hide_empty' => false,));

            $font_taxonomy_style = 'font_two';
            if(ale_get_option('design_variant')=='creative'){
                $font_taxonomy_style = 'font_one';
            }
            if(!empty($works_categories)){
                echo '<ul class="works_category_list '.esc_attr($font_taxonomy_style).'">';
                    foreach($works_categories as $cat){
                        echo '<li><a href="'.get_term_link($cat,'work-category').'">'.esc_attr($cat->name).'</a></li>';
                    }
                echo '</ul>';
            }
        } ?>
        <div class="grid works_items_container <?php echo esc_attr($ale_columns_class); ?> cf">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php 
                if(ALETHEME_DESIGN_STYLE == 'donation'){
                    get_template_part('partials/work/workpreview_donation' );
                } elseif(ALETHEME_DESIGN_STYLE == 'moka'){
                    get_template_part('partials/work/workpreview_moka' );
                } else {
                    get_template_part('partials/work/workpreview' );
                } ?>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound'); ?>
            <?php endif; ?>
        </div>
        <?php get_template_part('partials/work/works_pagination'); ?>
    </div>
</div>