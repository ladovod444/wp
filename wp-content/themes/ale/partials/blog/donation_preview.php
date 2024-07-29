<article <?php post_class('grid-item donation_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <div class="col-6 image">
        <?php
        if(get_the_post_thumbnail($post->ID, 'post-simplelarge')){
            echo get_the_post_thumbnail($post->ID, 'post-simplelarge');
        }
        ?>
    </div>

    <div class="col-6 text">
        <h2><?php the_title(); ?></h2>

        <div class="string">
            <?php echo ale_trim_excerpt(30); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'ale'); ?></a>
    </div>
</article>
