<article <?php post_class('grid-item organic_blog_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">  
    <?php if(get_the_post_thumbnail($post->ID, 'full')){ ?>
        <div class="image">
            <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
            <div class="button_holder">
                <a href="<?php the_permalink(); ?>" class="organic_but"><?php esc_html_e('Read more', 'ale'); ?></a>
            </div>
        </div>
    <?php } ?>
    <div class="text">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('partials/blog/blog_info'); ?>

        <div class="string">
            <?php echo ale_trim_excerpt(45); ?>
        </div>
    </div>
</article>