<div class="alekids_galleries two_columns">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
        <article <?php post_class('gallery_item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
            <div class="gallery_content">
                <h3><a href="<?php esc_attr(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                <?php echo wp_kses_post(ale_trim_excerpt(16)); ?>
                <a class="read_more font_one" href="<?php esc_attr(the_permalink()); ?>"><?php esc_html_e('Take a look','ale'); ?></a>
            </div>
            <?php if(get_the_post_thumbnail(get_the_ID(),'works-square')){ ?>
                <div class="featured_image">
                    <a href="<?php esc_attr(the_permalink()); ?>">  
                        <?php echo get_the_post_thumbnail(get_the_ID(),'works-square'); ?>
                    </a>
                    <div class="gallery_icon"><div class="icon"></div></div>
                </div>
            <?php } ?>
        </article>
    <?php endwhile; else:
        get_template_part('partials/notfound');
    endif; ?>
</div>
<div class="alekids_gallery_archive">
    <?php get_template_part('partials/pagination/mimi'); ?>
</div>