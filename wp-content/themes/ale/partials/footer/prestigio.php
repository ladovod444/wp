<footer id="footer">
    <div class="center cf">
        <p class="left"><?php
            if(ale_get_option('copyrights')){
                echo ale_wp_kses(ale_get_option('copyrights'));
            }
            ?></p>

        <div class="right">
            <div class="soc">
                <?php get_template_part('partials/social_profiles'); ?>
            </div>
        </div>
    </div>
</footer>