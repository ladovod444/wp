<div class="limpieza_works_style">
    <div class="col-6 textblock cf">
        <div class="text">
            <h2>
                <a href="<?php the_permalink(); ?>" class="black-col yellow-col-hover">
                    <?php the_title();
                    $current_category = wp_get_post_terms($post->ID, 'work-category', array("fields" => "all"));

                    foreach($current_category as $curcat){
                        echo '<span>' . esc_attr($curcat->name). '</span>';
                    } ?>
                </a>
            </h2>

            <div class="string blue-menu-col">
                <?php echo ale_trim_excerpt(40); ?>
            </div>

            <a href="<?php the_permalink(); ?>" class="link white-col font_one red-bg yellow-bg-hover"><?php esc_html_e('Read more', 'ale'); ?></a>
        </div>
    </div>

    <div class="col-6 image">
        <a href="<?php the_permalink(); ?>">
            <?php if(get_the_post_thumbnail($post->ID,'full')){
                echo get_the_post_thumbnail($post->ID,'large');
            } ?>
            <span class="overlay">
                <i class="fa fa-plus red-bg white-col yellow-bg-hover"></i>
            </span>
        </a>
    </div>
</div>