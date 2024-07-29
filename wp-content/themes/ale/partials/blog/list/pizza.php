<div class="story ale_blog_list archive_blog_page">
    <div class="wrapper content_wrapper">
        <div class="blog_content_holder">
            <?php if (have_posts()) {
                while (have_posts()) : the_post();      
                    get_template_part('partials/blog/preview/pizza');
                endwhile;
                get_template_part('partials/pagination/pizza');
            }  else {
                get_template_part('partials/notfound');
            } ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>