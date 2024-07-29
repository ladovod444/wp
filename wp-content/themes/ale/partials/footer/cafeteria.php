<section class="bordered footer cafeteria_footer footer-small">
    <div class="center-align content_wrapper">

        <?php if (ale_get_option('copyrights')) : ?>
            <p class="copy"><?php echo ale_option('copyrights'); ?></p>
        <?php else: ?>
            <p class="copy"><?php esc_html_e('Copyright, All Right Reserved','ale'); ?></p>
        <?php endif; ?>

        <div class="social_icons">
            <?php get_template_part('partials/social_profiles'); ?>
        </div>
    </div>

    <!-- ## ## ## ## ## ## ## ## ## ## -->
    <div class="inner-border"></div>
    <div class="background-opacity"></div>
</section>