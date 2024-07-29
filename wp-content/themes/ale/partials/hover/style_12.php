<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="laptica-work-element">
    <figure>
        <a href="<?php echo esc_url(the_permalink()); ?>" class="work_single_page">
            <?php
                echo get_the_post_thumbnail($post->ID,$thumb_size);
            ?>
        </a>
        <figcaption>
            <div class="mask">
                <a class="look" href="<?php the_permalink(); ?>"><span><i class="fa fa-link" aria-hidden="true"></i></span></a>
            </div>
        </figcaption>
    </figure>
</div>