<article class="grid-item donation-item-gallery" id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php
    if(get_the_post_thumbnail($post->ID, 'works-viajetin')){
        echo get_the_post_thumbnail($post->ID, 'works-viajetin');
    }
    ?>

    <div class="text">
        <h2><?php the_title(); ?></h2>

        <div class="string">
            <?php $type_terms = get_the_terms( get_the_ID(), "work-category" );
                if(!empty($type_terms)){
                    foreach($type_terms as $term){
                        if(isset($term->name)){
                            echo esc_attr($term->name);
                        } break;
                    }
                } ?>
        </div>
    </div>
    <a href="<?php the_permalink(); ?>">
        <span class="overlay">
            <span class="gradient"></span>
            <span class="gradient"></span>
            <span class="gradient"></span>
            <span class="icon">
                <span class="fa fa-arrow-right"></span>
            </span>
        </span>
    </a>
</article>
				