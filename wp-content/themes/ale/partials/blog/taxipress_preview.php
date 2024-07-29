<article <?php post_class('grid-item cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="col-3 left">
        <h3 class="font_one"><?php echo esc_html(get_the_date('d')) ?></h3>
        <span class="font_one"><?php echo esc_html(get_the_date('M Y')) ?></span>
    </div>
    <div class="col-6 right">
        <div class="inner">
            <!-- Img -->
            <div class="img"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo get_the_post_thumbnail($post->ID,'large'); ?></a></div>

            <div class="text">
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
                <p>
                    <?php echo ale_limit_excerpt(40); ?>
                </p>
            </div>
            <div class="by"><?php esc_html_e('by','ale'); ?> <span class="font_one"><?php echo get_the_author(); ?></span></div>
            <div class="category"><?php echo the_category(', '); ?></div>

            <!-- Read -->
            <a class="read font_one" href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More','ale'); ?></a>
            <div class="shadow-bottom"></div>
        </div>
    </div>
</article>