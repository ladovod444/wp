<?php if(function_exists('ale_get_recent_from_instagram')){ ?>
<?php if(ale_get_option('instagram_feed_footer')=='enable'){
    echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
} ?>
<?php } ?>

<footer class="organic_footer">
    <div class="content_wrapper">
        <div class="footer_logo_container">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="footer_logo">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="footer logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
            <?php if (ale_get_option('copyrights')) : ?>
                <p class="copy"><?php echo ale_option('copyrights'); ?></p>
            <?php else: ?>
                <p class="copy">&copy; <?php esc_html_e('Copyright 2020, Orquidea WordPress Theme', 'ale')?></p>
            <?php endif; ?>
        </div>
        <div class="footer_data">
            <div class="contacts_footer">
                <h5 class="social_title"><?php esc_html_e('Call us','ale'); ?></h5>
                <div>
                    <?php if(ale_get_option('footer_callnumber')){
                        echo '<span class="footer_phone"><strong>'.esc_html_e('Phone:','ale').'</strong> '.esc_attr(ale_get_option('footer_callnumber')).'</span><br />';
                    } 
                    if(ale_get_option('footer_email_address')){
                        echo '<span class="footer_phone"><strong>'.esc_html_e('E-mail:','ale').'</strong> <a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a></span>';
                    } ?>
                </div>
            </div>
            <div class="social">
                <h5 class="social_title"><?php esc_html_e('We are social','ale'); ?></h5>
                <?php get_template_part('partials/social_profiles'); ?>
            </div>
            <div class="address_footer">
                <h5 class="social_title"><?php esc_html_e('Our Address','ale'); ?></h5>
                <div>
                    <?php 
                    if(ale_get_option('footer_address')){
                        echo esc_attr(ale_get_option('footer_address'));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>