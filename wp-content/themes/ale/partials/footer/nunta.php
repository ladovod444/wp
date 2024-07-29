</div>
    </div>
    <footer id="footer-main" role="contentinfo" class="cf">
        <div class="socialprof cf">
            <div class="lineone"></div>
            <div class="socialicons cf">
                <?php get_template_part('partials/social_profiles'); ?>  
            </div>
        </div>
        <div class="footertext">
            <div class="lineone"></div>
            <?php if (ale_get_option('copyrights')) : ?>
                <p class="copy"><?php echo ale_option('copyrights'); ?></p>
            <?php else: ?>
                <p class="copy">&copy; <?php echo ale_wp_kses('Copyright 2020. Inspired from <i class="fa fa-heart-o" aria-hidden="true"></i>', 'ale')?></p>
            <?php endif; ?>
        </div>
	</footer>
    </div>
    <div class="bottom"></div>