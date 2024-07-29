<div class="widget_footer cf">
    <div class="widgets_section content_wrapper cf">
        <div class="col-4 sidebar_item sidebar_one">
            <?php if ( is_active_sidebar( 'footer-one-sidebar' ) ) { ?>
                <aside class="sidebar cf">
                    <div class="sidebar_container">
                        <?php dynamic_sidebar( 'footer-one-sidebar' ); ?>
                    </div>
                </aside>
            <?php } ?>
        </div>
        <div class="col-4 sidebar_item sidebar_two">
            <?php if ( is_active_sidebar( 'footer-two-sidebar' ) ) { ?>
                <aside class="sidebar cf">
                    <div class="sidebar_container">
                        <?php dynamic_sidebar( 'footer-two-sidebar' ); ?>
                    </div>
                </aside>
            <?php } ?>
        </div>
        <div class="col-4 sidebar_item sidebar_three">
            <?php if ( is_active_sidebar( 'footer-three-sidebar' ) ) { ?>
                <aside class="sidebar cf">
                    <div class="sidebar_container">
                        <?php dynamic_sidebar( 'footer-three-sidebar' ); ?>
                    </div>
                </aside>
            <?php } ?>
        </div>
    </div>
    <footer class="widgets_bottom">
        <div class="content_wrapper footer_container">
            <div class="copyrights">
                <?php if(ale_get_option('copyrights')){
                    echo "<p>".ale_wp_kses(ale_get_option('copyrights'))."</p>";
                } ?>
            </div>
            <div class="social_icons">
                <?php get_template_part('partials/social_profiles'); ?>
            </div>
        </div>
    </footer>
</div>
