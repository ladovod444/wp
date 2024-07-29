<section class="nunta_blog_style singleblog blogindex cf">
    <div class="padding">
        <div class="content">
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                <header class="preview blogpreview cf">
                    <div class="titleitem">
                        <div class="customfont font_three">
                            <div class="lineone">
                                 <a href='<?php the_permalink(); ?>'> <?php the_title(); ?></a> 
                            </div>
                        </div>
                        <div class="cf"></div>
                        <span class="catybox"><?php echo the_category(', '); ?>  | <?php echo get_the_date(); ?></span>
                    </div>
                    <div class="topslider">
                        <div class="previewimage">
                            <figure id="simplefigure">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail(array(900, 600))?></a>
                            </figure>
                        </div>
                    </div>
                </header>
                
                <section class="full" data-fullid="<?php echo esc_attr(get_the_ID()); ?>"></section>

                <footer class="storyopenlink cf">
                    <div class="storyopenlinktwo">
                        <div class="blogcomnum">
                            <a href="<?php the_permalink()?>#comments">Comments (<?php comments_number( '0', '1', '%' ); ?>)</a>
                        </div>
                        <div class="blogfulllink">
                            <a href="<?php the_permalink(); ?>" data-linkid="<?php echo esc_attr(get_the_ID()); ?>" class="toggle ta customfont font_three"><?php esc_html_e('Expand Story', 'ale')?></a>
                        </div>
                        <div class="blogsocialicon">
                            <?php get_template_part('partials/blog/share'); ?>
                        </div>
                        
                    </div>
                </footer>
                
                </article>
                <div class="divider"></div>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>
        </div>
        <div class="pagination customfont font_three">
            <?php posts_nav_link(' - ', esc_html__('Previous posts','ale'),esc_html__('Next posts','ale')); ?>
        </div>
    </div>
</section>