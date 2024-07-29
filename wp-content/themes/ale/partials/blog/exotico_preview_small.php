<article <?php post_class('grid-item blog'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <div class="blog__thumb">
        <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo get_the_post_thumbnail($post->ID,'post-simplelarge'); ?></a>
    </div>
    <!-- end blog thumb -->

    <header class="blog__header">
        <div class="meta">
            <time datetime="<?php echo esc_attr(get_the_date()) ?>" class="meta__item meta__item_date"><?php echo esc_html(get_the_date()) ?></time>
            <a href="<?php echo esc_url(the_permalink()); ?>" class="meta__item meta__item_comments"><?php echo esc_html(get_comments_number(get_the_ID())); ?></a>
        </div>
        <!-- end blog meta -->

        <h1 class="blog__title font_one">
            <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
        </h1>
    </header>
    <!-- end blog header -->
</article>