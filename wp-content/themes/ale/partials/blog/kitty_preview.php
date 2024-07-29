<?php $ale_post_line_position = ale_get_option('blog_custom_postline_position'); ?>
<article <?php post_class('grid-item kitty_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <div class="post_item_mask"></div>
    <div class="post_item_content">
        <?php if(get_the_post_thumbnail($post->ID, 'large')){ ?>
            <div class="image">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></a>
            </div>
        <?php } ?>
        <div class="text">
            <?php if($ale_post_line_position == 'beforetitle'){get_template_part('partials/blog/blog_info');} ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if($ale_post_line_position == 'aftertitle'){get_template_part('partials/blog/blog_info');} ?>
            <div class="string">
                <?php
                $ale_custom_excerpt_count = '';
                if(ale_get_option('custom_blog_excerpt_count')){
                    $ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
                } else {
                    $ale_custom_excerpt_count = 20;
                }
                echo ale_limit_excerpt($ale_custom_excerpt_count); ?>
            </div>
            <?php if($ale_post_line_position == 'aftercontent'){get_template_part('partials/blog/blog_info');} ?>
        </div>
    </div>
</article>