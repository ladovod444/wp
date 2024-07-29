<div class="cafeteria-work-element">
    <div class="background">
        <a href="<?php the_permalink(); ?>">
            <div class="hover"></div>
            <?php echo get_the_post_thumbnail(get_the_ID(),'works-linesmall'); ?>
        </a>
        <div class="pic"><i class="fa fa-camera-retro" aria-hidden="true"></i></div>
        <a class="look" href="<?php the_permalink(); ?>"><?php esc_html_e('Take a look','ale'); ?></a>
    </div>
</div>