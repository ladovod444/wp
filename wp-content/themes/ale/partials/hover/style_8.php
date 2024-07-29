<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div class="orquidea_galitem">
    <div class="imagegally">
        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID,$thumb_size); ?></a>
        <div class="mask0"><?php echo get_the_post_thumbnail($post->ID,$thumb_size); ?></div>
        <div class="mask1"></div>
        <a class="mask1vs1" href="<?php the_permalink(); ?>"><span class="openbox font_one cusstyle16">+</span></a>
        <div class="mask2">
            <div class="gallytitle font_one"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            <div class="gallycat font_two">
                <?php
                $current_category = wp_get_post_terms($post->ID, 'work-category', array("fields" => "all"));
                if($current_category){
                    foreach($current_category as $curcat){
                        echo esc_attr($curcat->name).' ';
                    }
                }
                ?>
            </div>
            <div class="gallydate font_two">
                <?php echo get_the_date(); ?>
            </div>
        </div>
    </div>
</div>