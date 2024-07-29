<div class="blog_posts flex_container">
    <div class="story ale_blog_archive cameron_layout content cf">

        <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/blog/cameron_preview' ); ?>
        <?php endwhile; else: ?>
            <?php get_template_part('partials/notfound')?>
        <?php endif; ?>

        <?php get_template_part('partials/pagination'); ?>
    </div>
</div>