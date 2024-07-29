<div class="content_wrapper">
    <div class="blog_posts_archive">
        <?php 
        $i=0; if (have_posts()) : while (have_posts()) : the_post(); $i++; ?>

        <article <?php post_class('post_item olins_do_fadein'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
            <div class="image_holder">
                <?php if(get_the_post_thumbnail(get_the_ID(),'full')){ ?>
                    <a href="<?php esc_url(the_permalink()); ?>">
                        <?php
                        if($i == 4 or $i == 5){
                            echo get_the_post_thumbnail(get_the_ID(),'post-simplelarge');
                        } else {
                            echo get_the_post_thumbnail(get_the_ID(),'post-squarelarge');
                        } ?>
                    </a>
                <?php } ?>
            </div>
            <div class="post_info">
                <span class="categories"><?php echo the_category(', '); ?></span>
                <span class="separator">x</span>
                <span class="date"><?php echo get_the_date(); ?></span>
            </div>
            <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title() ?></a></h3>
        </article>
        <?php if($i == 3){ echo '<div class="separator_boxes">';} ?>
        <?php if($i == 4){ echo '<div class="vertical_separator"></div>';} ?>
        <?php if($i == 5){ echo '</div>';} ?>

        <?php endwhile; else: ?>
            <?php echo get_template_part('partials/notfound')?>
        <?php endif; ?>
    </div>
    <?php get_template_part('partials/pagination'); ?>
</div>