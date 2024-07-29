<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <div class="instagram_footer content_wrapper">
        <?php if(ale_get_option('instagram_feed_footer')=='enable'){
            echo '<div class="footer_instagram_feed font_two cf">'.ale_get_recent_from_instagram().'</div>';
        } ?>
    </div>
<?php } ?>
<div class="social_links_footer content_wrapper">
    <?php echo esc_html_e('GET IN TOUCH ON:','ale'); ?>
    <?php get_template_part('partials/social_text_links'); ?>
</div>
<footer class="footer_brigitte">
    <div class="content_wrapper font_two footer_inner">
        <div class="footer_copyrights">
            <p>
                <?php
                if(ale_get_option('copyrights')){
                    echo ale_wp_kses(ale_get_option('copyrights'));
                }
                ?>
            </p>
        </div>

        <div class="backtotop">
            <span><?php esc_html_e('TOP','ale'); ?> <i class="fa fa-chevron-up" aria-hidden="true"></i></span>
        </div>
    </div>
</footer>