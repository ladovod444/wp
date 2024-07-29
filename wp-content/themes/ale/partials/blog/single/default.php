<?php 
    //Sidebar position based on theme options
    $ale_sidebar_position = ale_get_option('blog_sidebar_position');
    if(ale_get_meta('sidebar_position') !== ''){
        $ale_sidebar_position = ale_get_meta('sidebar_position');
    }
    $sidebar_class = '';

    if($ale_sidebar_position){
        $sidebar_class .= ' sidebar_position_'. $ale_sidebar_position;
    }
    if(!is_active_sidebar('main-sidebar')){
        $sidebar_class .= ' empty_widgets_show_full_width';
    }
?>
    <?php if(ale_get_meta('post_title_position') !== 'fullwidthwedding'){ ?>
    <div class="content_wrapper single_blog_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

        <?php if($ale_sidebar_position  !== 'no'){ get_sidebar(); } ?>
        <!-- Content -->
        <div class="story ale_blog_archive single_post content cf">
            <div class="cf">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/posthead' );?>
                    <?php get_template_part('partials/postcontent' );?>
                    <?php get_template_part('partials/postfooter' );?>
                <?php endwhile; else: ?>
                    <?php get_template_part('partials/notfound')?>
                <?php endif; ?>
            </div>
            <?php get_template_part('partials/pagination'); ?>
            <?php if (comments_open() || get_comments_number()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
            <?php if(ale_get_meta('related_posts')=='enable'){
                if(ALETHEME_DESIGN_STYLE == 'keira'){
                    get_template_part('partials/blog/related_posts');
                }
            } ?>
        </div>
    </div>
    <?php } ?>