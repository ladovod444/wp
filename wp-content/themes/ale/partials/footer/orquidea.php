<div class="divider"></div>
    </div>
    <footer id="footer-main" role="contentinfo">
        <div class="content_wrapper font_two cf">
            <?php if (ale_get_option('copyrights')) : ?>
                <p class="copy"><?php echo ale_option('copyrights'); ?></p>
            <?php else: ?>
                <p class="copy">&copy; <?php esc_html_e('Copyright 2020, Orquidea WordPress Theme', 'ale')?></p>
            <?php endif; ?>
            <div class="socialprof">
                <?php echo get_template_part('partials/social_text_links'); ?>    
            </div>
        </div>
	</footer>