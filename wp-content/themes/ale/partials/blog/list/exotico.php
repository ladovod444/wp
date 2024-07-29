<div class="content_wrapper blog_posts flex_container cf">
    <div class="story ale_blog_archive content cf">
        <div class="blog_grid blogs grid">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php $i = 0;
            if (have_posts()) : while (have_posts()) : the_post();$i++; ?>
                <?php if($i == 3) {
                    get_template_part('partials/blog/exotico_preview_big');
                } else {
                    get_template_part('partials/blog/exotico_preview_small');
                }?>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>
        </div>
        <?php get_template_part('partials/exotico_pagination'); ?>
    </div>
</div>