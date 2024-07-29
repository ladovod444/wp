<footer class="delizioso_footer">
    <div class="content_wrapper cf">
        <div class="col-6">
            <div class="col-6 contacts">
                <div class="label">
                    <?php esc_html_e('Contacts:', 'ale')?>
                </div>
                <div class="values">
                    <?php if(ale_get_option('footer_callnumber')){
                        echo '<span class="footer_phone">'.esc_attr(ale_get_option('footer_callnumber')).'</span>';
                    } 
                    if(ale_get_option('footer_email_address')){
                        echo '<span class="footer_email"><a href="mailto:'.esc_attr(ale_get_option('footer_email_address')).'">'.esc_attr(ale_get_option('footer_email_address')).'</a></span>';
                    }
                    if(ale_get_option('footer_address')){
                        echo '<span class="footer_address">'.esc_attr(ale_get_option('footer_address')).'</span>';
                    }  ?>
                </div>
            </div>
            <div class="col-6">
            <?php if (ale_get_option('copyrights')) : ?>
                <p class="copy"><?php echo ale_option('copyrights'); ?></p>
            <?php else: ?>
                <p class="copy">&copy; <?php esc_html_e('Copyright', 'ale')?></p>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-6">
            <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
                <nav class="navigation footer_nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'menu_class'	=> 'menu menu-footer ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
            <?php } ?>
        </div>
    </div>
</footer>