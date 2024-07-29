<article <?php post_class('grid-item rosi-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php if(has_post_format('quote')){?>
        <div class="quote_post">
            <div class="icon font_two">’’</div>
            <span class="quote_info font_two">
                <span><?php echo get_the_date(); ?> / <?php if(ale_get_option('blog_show_category') == 'show'){ the_category(', ','');} ?></span>
            </span>
            <div class="quote_text">
                <?php the_content(); ?>
            </div>
            <h6 class="quote_title font_two"><?php the_title(); ?></h6>
            <?php get_template_part('partials/blog/share'); ?>
        </div>
    <?php
    } else {
        if(get_the_post_thumbnail($post->ID,'post-simplelarge')){ ?>
        <div class="post_image_holder">
            <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo get_the_post_thumbnail($post->ID,'post-simplelarge'); ?></a>
        </div>
    <?php } ?>
    <div class="post_content_holder">
        <span class="date font_two"><?php echo esc_html(get_the_date()); ?></span>
        <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h3>
        <p class="excerpt">
            <?php
            $ale_custom_excerpt_count = '';
            if(ale_get_option('custom_blog_excerpt_count')){
                $ale_custom_excerpt_count = ale_get_option('custom_blog_excerpt_count');
            } else {
                $ale_custom_excerpt_count = 20;
            }
            echo ale_limit_excerpt($ale_custom_excerpt_count); ?>
        </p>
        <div class="bottom_line_post">
            <span class="read_more">
                <a href="<?php esc_url(the_permalink());?>" class="ale_button font_two" title="<?php esc_attr_e('Read More','ale'); ?>"><?php esc_html_e('Read More','ale'); ?></a>
            </span>
            <span class="social_comments">
                <?php get_template_part('partials/blog/share');

                if(ale_get_option('blog_show_comments') == 'show'){
                    echo '<a class="post_comments font_two" href="'.get_comments_link().'" target="_self">';
                    comments_number('0 ' . esc_html__('Comments','ale'), '1 '.esc_html__('Comment','ale'), '% '.esc_html__('Comments','ale'));
                    echo '</a>';
                }?>

            </span>
        </div>

    </div>
    <?php } ?>
</article>
