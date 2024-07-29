<article <?php post_class('grid-item burger_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <?php if(get_the_post_thumbnail($post->ID, 'large')){ ?>
        <div class="image">
            <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></a>
        </div>
    <?php } ?>
    <div class="text">
        <span class="post_date"><?php echo esc_html(get_the_date()); ?></span>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
        <a href="<?php the_permalink(); ?>" class="read_more_but font_two"><?php esc_html_e('Read more', 'ale'); ?></a>
    </div>
</article>