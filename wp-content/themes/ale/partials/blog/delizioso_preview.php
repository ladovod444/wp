<article <?php post_class('grid-item delizioso_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <div class="text">
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
        <span class="post_date"><?php echo esc_html(get_the_date()); ?></span>
    </div>
</article>