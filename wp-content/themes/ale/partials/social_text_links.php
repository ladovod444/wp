<?php if(ALETHEME_DESIGN_STYLE == 'pizza'){ ?>
    <div class="social_profile_links">
        <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Tw.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Fb.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Yt.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Li.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Pi.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Go.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Tr.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('In.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Re.','ale'); ?></span></a><?php } ?>
        <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Vk.','ale'); ?></span></a><?php } ?>
    </div>
<?php } else { ?>
    <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Twitter','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Facebook','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Youtube','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Linkedin','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Pinterest','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Google +','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Tumblr','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Instagram','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Reddit','ale'); ?></span></a><?php } ?>
    <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" target="_blank"><span class="social_title"><?php esc_html_e('Vkontakte','ale'); ?></span></a><?php } ?>
<?php } ?>