<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="kitty-work-element">
    <figure>
        <a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
            <?php
                echo get_the_post_thumbnail($post->ID,$thumb_size);
            ?>
        </a>
        <figcaption>
            <div class="mask">
                <a class="look" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Take a look','ale'); ?></span></a>
            </div>
        </figcaption>
    </figure>
</div>