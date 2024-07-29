<footer class="bottom_footer">
    <?php if(!empty(ale_get_option('copyrights'))){
        echo '<div class="copyrights">'.ale_wp_kses(ale_get_option('copyrights')).'</div>';
    } ?>

        <div class="home_slider_counter" style="display:none;">
            <div class="current">00</div>
            <div class="line"><div class="bar"></div></div>
            <div class="total">00</div>
        </div>


    <?php if(!empty(ale_get_option('footer_callnumber')) or !empty(ale_get_option('footer_email_address'))){ ?>
        <div class="footer_info">
            <div class="phone_container">
                <span class="call_label enforcement_second_color"><?php esc_html_e('CALL :','ale'); ?></span>
                <?php if(!empty(ale_get_option('footer_callnumber'))){
                    echo '<span class="phonenumber">'.esc_attr(ale_get_option('footer_callnumber')).'</span>';
                }?>
            </div>
            <div class="email_container">
                <span class="email_label enforcement_second_color"><?php esc_html_e('WRITE :','ale'); ?></span>
                <?php if(!empty(ale_get_option('footer_email_address'))){
                    echo '<span class="emailfooter"><a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a></span>';
                }?>
            </div>
        </div>
    <?php } ?>
</footer>