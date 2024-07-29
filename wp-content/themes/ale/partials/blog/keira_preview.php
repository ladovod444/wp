<article <?php post_class('grid-item keira-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php
    if(get_the_post_thumbnail($post->ID,'full')){ ?>
        <div class="post_image_holder">
            <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo get_the_post_thumbnail($post->ID,'full'); ?></a>
        </div>
    <?php } ?>
    <div class="post_content_holder">
        <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
    </div>
</article>
