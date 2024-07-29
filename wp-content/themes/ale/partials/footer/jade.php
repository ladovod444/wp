<div class="instagram_footer content_wrapper cf">
    <?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <div class="insta_container col-8">
        <?php if(ale_get_option('instagram_feed_footer')=='enable'){
            echo '<div class="footer_instagram_feed font_two cf">'.ale_get_recent_from_instagram().'</div>';
        } ?>
    </div>
    <?php } ?>
    <div class="contact_form_container col-4">
        <?php get_template_part('partials/footer/contact_form'); ?>
    </div>
</div>
<footer class="footer_jade">
    <div class="content_wrapper font_two footer_inner">
        <div class="footer_email">
            <?php if(ale_get_option('footer_email_address')){ ?>
                <a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a>
            <?php } ?>
        </div>
        <div class="footer_copyrights">
            <p>
                <?php
                if(ale_get_option('copyrights')){
                    echo ale_wp_kses(ale_get_option('copyrights'));
                }
                ?>
            </p>
            <div class="social_footer">
                <?php get_template_part('partials/social_profiles'); ?>
            </div>
        </div>

        <div class="backtotop">
            <span><?php esc_html_e('Back to top','ale'); ?> <i class="fa fa-chevron-up" aria-hidden="true"></i></span>
        </div>
    </div>
</footer>