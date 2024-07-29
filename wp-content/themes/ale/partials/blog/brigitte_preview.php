<article <?php post_class('brigitte-item cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="item_data_holder">
        <div class="data_holder">
            <span class="brigitte_category_post">
                <?php echo esc_html_e('Category:','ale');?> <?php the_category(' ');?>
            </span>
            <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
            <p class="post_excerpt">
                <?php
                $ale_custom_excerpt_count = '';
                if(ale_get_option('custom_blog_excerpt_count')){
                    $ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
                } else {
                    $ale_custom_excerpt_count = 20;
                }
                echo ale_limit_excerpt($ale_custom_excerpt_count); ?>
            </p>
            <a class="brigitte_read_more" href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e('READ MORE','ale'); ?></a>
        </div>
    </div>
    <div class="featured_image_holder">
        <?php if(has_post_thumbnail()){?>
            <div class="image_box">
                <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
            </div>
        <?php } ?>
    </div>
</article>