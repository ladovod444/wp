<article class="grid-item moka-item-gallery" id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="moka_gallery_item">
        <div class="gallery_post_text olins_do_fadein delay200">
            <h2 class="gallery_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if(ale_get_meta('post_pre_title')){ ?>
                <p><?php echo ale_wp_kses(ale_get_meta('post_pre_title')); ?></p>
            <?php } ?>
        </div>
        <div class="gallery_image olins_do_fadein delay400">
            <figure>
                <a href="<?php the_permalink(); ?>">
                    <?php if(get_the_post_thumbnail($post->ID, 'works-viajetin')){
                        echo get_the_post_thumbnail($post->ID, 'works-viajetin');
                    }?>
                </a>
                <span class="open_text"><?php esc_html_e('Open','ale'); ?></span>
                <figcaption>
                    <a href="<?php the_permalink(); ?>" class="ale_button"><?php esc_html_e('Click to open','ale'); ?></a>
                </figcaption>
            </figure>
            
        </div>
    </div> 
</article>