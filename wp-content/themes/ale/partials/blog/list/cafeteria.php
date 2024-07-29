<div class="story-time-line">

<div class="center-align content">

            <?php if (have_posts()){ ?>
                <div class="back-line"></div>
                <div class="cub-top"></div>
                <div class="cub-bot"></div>
            <?php } ?>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="item cf">
                    <div class="text">
                        <h2 class="caption firstfont font_one colormain"><?php the_title(); ?></h2>
                        <p><?php echo strip_tags(ale_trim_excerpt(23)); ?></p>
                        <div class="info">
                            <h3 class="firstfont font_one"><?php echo get_the_date(); ?> / <a href="<?php the_permalink(); ?>"><?php esc_html_e('Take a look','ale'); ?></a></h3>
                        </div>
                    </div>
                    <div class="circle">
                        <div class="circ"></div>
                        <div class="line"></div>
                    </div>
                    
                    
                    <div class="img">
                        <a href="<?php the_permalink(); ?>">
                            <div style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'thumbnail')); ?>');" class="circle-img"></div>
                        </a>
                    </div>
                       
                       
                </div>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>

        </div>

        <div class="center-align">
            <div class="cafeteria_pagination cf">
                <h3 class="left firstfont font_one"><?php echo get_previous_posts_link(esc_html__('Newest Stories','ale')); ?></h3>
                <h3 class="right firstfont font_one"><?php echo get_next_posts_link(esc_html__('Oldest Stories','ale')); ?></h3>
            </div>
        </div>

</div>