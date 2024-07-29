<footer id="footer">
    <div class="content">
        <div class="wrap cf">
            <div class="col-4">
                <?php if(ale_get_option('copyrights')){
                    echo ale_wp_kses(ale_get_option('copyrights'));
                } ?>
            </div>
            <div class="col-4">
                <div class="call">
                    <h3 class="font_one"><?php echo esc_html(ale_get_option('footer_callnumber')); ?></h3>
                    <span><?php echo esc_html_e('Call us any time','ale'); ?></span>
                </div>
            </div>
            <div class="col-4">
                <p><?php esc_html_e('Our adress','ale'); ?>:</p>
                <span><?php echo esc_html(ale_get_option('footer_address')); ?></span>

                <div class="social">
                    <?php get_template_part('partials/social_profiles'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-line">
        <?php if ( has_nav_menu( 'footer_menu' ) ) {
            wp_nav_menu(array(
                'theme_location'=> 'footer_menu',
                'menu'			=> 'Footer Menu',
                'menu_class'	=> 'menu menu-footer',
                'walker'		=> new Aletheme_Nav_Walker(),
                'container'		=> '',
            ));
        } ?>
    </div>
</footer>