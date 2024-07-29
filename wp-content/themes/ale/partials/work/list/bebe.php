<div class="content_wrapper">
    <div class="bebe_gallery">
        <div class="items1 cf">
            <?php 
            $i = 1;
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                <article class="bebe-item-gallery" id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php if(get_the_post_thumbnail($post->ID, 'bebe-vertical')){
                            if($i == 1 or $i == 6){
                                echo get_the_post_thumbnail($post->ID, 'bebe-vertical');
                            } else if($i == 3 or $i == 4 or $i == 8 or $i == 9){
                                echo get_the_post_thumbnail($post->ID, 'bebe-horizontal');
                            } else {
                                echo get_the_post_thumbnail($post->ID, 'bebe-small');
                            }
                        }?>
                    </a>
                </article>

                <?php 
                    if($i % 5 == 0){
                        echo '</div><div class="items2 cf">';
                    }
                ?>
            
            <?php $i++; endwhile; else: ?>
                <?php get_template_part('partials/notfound'); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php get_template_part('partials/work/works_pagination'); ?>
</div>