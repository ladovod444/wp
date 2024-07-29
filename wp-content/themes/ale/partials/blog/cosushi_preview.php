<article <?php post_class('grid-item cosushi_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <?php if(get_the_post_thumbnail($post->ID, 'post-squarelarge')){ ?>
        <div class="image">
            <a href="<?php the_permalink(); ?>" class="thumb_link">
                <?php echo get_the_post_thumbnail($post->ID, 'post-squarelarge'); ?>
                <span class="open_post"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </a>
        </div>
    <?php } ?>
    <div class="text">
        <span class="post_category font_three"><?php echo the_category(', ',''); ?></span>
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
    </div>
</article>