<article <?php post_class('grid-item bebe_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <div class="blog_article_block">
        <?php if(get_the_post_thumbnail($post->ID, 'post-squarelarge')){ ?>        
            <a href="<?php the_permalink(); ?>" class="thumb_link">
                <?php echo get_the_post_thumbnail($post->ID, 'post-horizontal'); ?>
            </a>
        <?php } ?>
        <div class="info cf">
            <div class="time"><?php echo get_the_date(); ?></div>
        </div>
        <div class="text">
            <a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
            <p>
            <?php
            $ale_custom_excerpt_count = '';
            if(ale_get_option('custom_blog_excerpt_count')){
                $ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
            } else {
                $ale_custom_excerpt_count = 20;
            }
            echo ale_limit_excerpt($ale_custom_excerpt_count); ?>
            </p>
        </div>
        <div class="wave"></div>
    </div>
</article>