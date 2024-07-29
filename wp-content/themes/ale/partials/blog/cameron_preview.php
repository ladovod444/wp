
<article <?php post_class('cameron-item cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="featured_image_holder">
        <?php if(has_post_thumbnail()){?>
            <div class="image_box">
                <a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'post-simplelarge'); ?></a>
            </div>

        <?php } ?>
    </div>
    <div class="item_data_holder">
        <div class="data_holder">
            <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
            <div class="category"><?php the_category(', '); ?></div>
        </div>
    </div>

</article>