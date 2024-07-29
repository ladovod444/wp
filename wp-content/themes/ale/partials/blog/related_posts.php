<div class="related_posts_box">
	<?php
	//Columns Settings
	$ale_blog_columns = ale_get_option('default_blog_columns');
	$ale_columns_class = '';
	if($ale_blog_columns){
		$ale_columns_class = 'ale_blog_columns_'.esc_attr($ale_blog_columns);
	}
	//Text Align Settings
	$ale_blog_text_align = ale_get_option('default_blog_text_align');
	$ale_text_align_class = '';
	if($ale_blog_text_align){
		$ale_text_align_class = 'ale_blog_text_align_'.esc_attr($ale_blog_text_align);
	}
	//Grid type
	$blog_grid_type = 'blog_grid grid';

	$title = '';
	$posts_count = ale_get_option('default_blog_columns');
	if(ale_get_meta('related_posts_title')){
		$title = ale_get_meta('related_posts_title');
	}
	if(ale_get_meta('related_posts_count')){
		$posts_count = intval(ale_get_meta('related_posts_count'));
	}
	?>
	<?php if(!empty($title)){
		echo '<h3 class="related_title">'.esc_attr($title).'</h3>';
	}

	$related_posts = new WP_Query(array('post_type' => 'post','orderby' => 'rand', 'posts_per_page' => $posts_count));


    if(ALETHEME_DESIGN_STYLE == 'keira'){ ?>
        <div class="keira_related_box">
            <?php if ($related_posts->have_posts()) : $i = 0; while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                <article <?php post_class('keira-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                    <?php $i++; if(get_the_post_thumbnail($post->ID,'full')){ ?>
                        <div class="post_image_holder">
                            <a href="<?php echo esc_url(the_permalink()); ?>">
                                <?php
                                if($i == 1 or $i == 4){
                                    echo get_the_post_thumbnail($post->ID,'post-horizontal');
                                } else {
                                    echo get_the_post_thumbnail($post->ID,'post-vertical');
                                } ?>
                            </a>
                        </div>
                    <?php } ?>
                    <h4 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h4>
                </article>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    <?php } elseif(ALETHEME_DESIGN_STYLE == 'enforcement'){ ?>
        <div class="related_list">
            <?php if ($related_posts->have_posts()) : while ($related_posts->have_posts()) : $related_posts->the_post(); ?>

                <div <?php post_class('post_item enforcement_do_fadein'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                    <div class="image_holder">
                        <?php if(get_the_post_thumbnail(get_the_ID(),'post-squarelarge')){ ?>
                            <a href="<?php esc_url(the_permalink()); ?>">
                                <?php
                                    echo get_the_post_thumbnail(get_the_ID(),'post-squarelarge');
                                ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="post_info">
                        <span class="categories"><?php echo the_category(', '); ?></span>
                        <span class="separator">x</span>
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>
                    <h3 class="post_title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title() ?></a></h3>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
    <?php } else { ?>
        <div class="<?php echo esc_attr($blog_grid_type)." ".esc_attr($ale_columns_class)." ".esc_attr($ale_text_align_class); ?>">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php if ($related_posts->have_posts()) : while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                <?php get_template_part('partials/postpreview' ); ?>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    <?php  } ?>
</div>