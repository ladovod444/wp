<article <?php post_class('grid-item limpieza-post'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="text">
        <h2>
            <a href="<?php the_permalink(); ?>" class="blue-menu-col">
                <span class="left-pad">
                    <span class="right-pad">
                        <span class="center-pad">
                            <?php the_title(); ?>
                        </span>
                    </span>
                </span>
            </a>
        </h2>

        <div class="details cf">
            <span class="date left blue-menu-col"><?php the_time('d D Y'); ?></span>
            <span class="author left pagination-col"><?php the_author_link(); ?> </span>
            <div class="tags right">
                <?php the_category(' ');?>
            </div>
        </div>
    </div>

    <a href="<?php the_permalink(); ?>" class="image">
        <?php if(get_the_post_thumbnail($post->ID,'post-simpletin')){
            echo get_the_post_thumbnail($post->ID,'post-simpletin');
        }?>

        <span class="overlay">
            <i class="fa fa-plus red-bg white-col yellow-bg-hover"></i>
        </span>
    </a>

    <div class="text cf">
        <div class="string">
            <?php echo ale_trim_excerpt(40); ?>
        </div>

        <span class="comments">
            <i class="fa fa-comment pagination-col"></i>
            <?php esc_html_e('Comments', 'ale');
            echo ': ';
            $comments_count = wp_count_comments($post->ID);
                echo esc_attr($comments_count->total_comments);
            ?>
        </span>

        <a href="<?php the_permalink(); ?>" class="link red-bg yellow-bg-hover white-col right"><?php esc_html_e('Read more', 'ale'); ?></a>
    </div>
</article>