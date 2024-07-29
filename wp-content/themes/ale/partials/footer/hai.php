    <footer class="footer">
        <?php if (ale_get_option('copyrights')) : ?>
            <p class="copy"><?php echo ale_option('copyrights'); ?></p>
        <?php else: ?>
            <p class="copy">&copy; <?php esc_html_e('Copyright', 'ale')?></p>
        <?php endif; ?>
    </footer>
    <?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <?php if(ale_get_option('instagram_feed_footer')=='enable'){
        echo '<div class="footer_instagram_feed">'.ale_get_recent_from_instagram().'</div>';
    } ?>
    <?php } ?>
</div> <!-- End .hai_page_container -->