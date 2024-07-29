<footer class="cosushi_footer">
    <div class="content_wrapper">
        <div class="contact_data">
            <?php if(ale_get_option('footer_address')){ ?>
                <span class="address"><?php echo esc_html(ale_get_option('footer_address')); ?></span>
            <?php } ?>
            <?php if(ale_get_option('footer_email_address')){ ?>
                <span class="email"><?php echo esc_html(ale_get_option('footer_email_address')); ?></span>
            <?php } ?>
            <?php if(ale_get_option('footer_email_address')){ ?>
                <div class="footer_copy">
                    <?php echo ale_option('copyrights'); ?>
                </div>
            <?php } ?>
        </div>

        <div class="social font_two">
            <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" class="twi" target="_blank">Twitter</a><br><?php } ?>
            <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" class="fb" target="_blank">Facebook</a><br><?php } ?>
            <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" class="you" target="_blank">Youtube</a><br><?php } ?>
            <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" class="lin" target="_blank">Linkedin</a><br><?php } ?>
            <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" class="pin" target="_blank">Pinterest</a><br><?php } ?>
            <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" class="gpl" target="_blank">Google</a><br><?php } ?>
            <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" class="tum" target="_blank">Tumblr</a><br><?php } ?>
            <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" class="insta" target="_blank">Instagram</a><br><?php } ?>
            <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" class="red" target="_blank">Reddid</a><br><?php } ?>
            <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" class="vk" target="_blank">Vkontakte</a><?php } ?>
        </div>
    </div>
</footer>