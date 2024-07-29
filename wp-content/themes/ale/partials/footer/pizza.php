<footer class="ale_footer">
    <div class="wrapper">
        <div class="footer_logo_bg">
            <?php 
            $delizioso_logo_position = 'footer_logo';
            if(get_bloginfo('description')){
                echo "<span class=\"delizioso_title\">".get_bloginfo('description')."</span>";
                $delizioso_logo_position .= ' centered_on_text';
             } ?>
             <?php if(ale_get_option('sitelogo')){?>
                <div class="<?php echo esc_attr($delizioso_logo_position); ?>">
                    <a href="<?php echo esc_url(home_url("/")); ?>">
                        <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="<?php echo esc_attr__('logo','delizioso'); ?>" />
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="address_footer">
            <?php if(ale_get_option('footer_address')){
                echo esc_html(ale_get_option('footer_address'))."<br>";
            } ?>
            <?php if(ale_get_option('footer_callnumber')){
                echo esc_html(ale_get_option('footer_callnumber'))."<br>"; 
            }?>
            <?php if(ale_get_option('footer_email_address')){ 
                echo wp_kses_post(ale_get_option('footer_email_address'));
            } ?>
        </div>
        <?php get_template_part('partials/social_text_links'); ?>
    </div>
</footer>