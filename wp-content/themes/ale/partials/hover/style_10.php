<?php $thumb_size = ale_get_necessary_image_size(); ?>
<div <?php post_class('grid-item nunta_element'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <a href="<?php the_permalink(); ?>">
        <span class="imagebox"><?php echo get_the_post_thumbnail($post->ID, $thumb_size); ?></span>
        <span class="titlebox"><?php echo ale_truncate(get_the_title(), 30); ?></span>
        <span class="linedouble"></span>
        <span class="galcat"><?php $terms = get_the_terms($post->id, 'work-category'); if($terms) {foreach($terms as $itcat) { echo esc_attr($itcat->name).' ';} echo " | ";} ?>  <?php echo get_the_date(); ?></span>

        <div class="maskgaly"><span class="galhovtit"><span class="one"><span class="two"><span style="padding-top: 5px; padding-bottom: 5px; display: inline-block;"><?php echo ale_truncate(get_the_title(), 30); ?></span></span></span></span></div>
    </a>
</div>