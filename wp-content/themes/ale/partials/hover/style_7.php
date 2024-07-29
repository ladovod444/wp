<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="cameron_hover">
    <a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
        <?php echo get_the_post_thumbnail($post->ID,$thumb_size); ?>
    </a>
    <div class="mask_hover">
        <a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
            <span>
                <i class="fa fa-plus" aria-hidden="true"></i>
            </span>
        </a>
    </div>
</div>