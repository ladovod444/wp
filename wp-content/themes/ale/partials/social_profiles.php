<?php if(ALETHEME_DESIGN_STYLE == 'donation'){ ?>
    <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" class="twitter"><span class="fa fa-twitter"></span></a><?php } ?>
    <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" class="facebook"><span class="fa fa-facebook"></span></a><?php } ?>
    <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" class="google"><span class="fa fa-google-plus"></span></a><?php } ?>
    <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" class="youtube"><span class="fa fa-youtube-play"></span></a><?php } ?>
    <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-pinterest-p" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-tumblr" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-reddit-alien" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-vk" aria-hidden="true"></i></span></a><?php } ?>
<?php }
 else if(ALETHEME_DESIGN_STYLE == 'bebe'){ ?>
    <ul>
        <?php if(ale_get_option('fb')){ ?><li class="facebook"><a href="<?php echo esc_url(ale_get_option('fb')); ?>"></a></li><?php } ?>
        <?php if(ale_get_option('insta')){ ?><li class="instagram"><a href="<?php echo esc_url(ale_get_option('insta')); ?>"></a></li><?php } ?>
        <?php if(ale_get_option('pin')){ ?><li class="pinterest"><a href="<?php echo esc_url(ale_get_option('pin')); ?>"></a></li><?php } ?>
        <?php if(ale_get_option('twi')){ ?><li class="twitter"><a href="<?php echo esc_url(ale_get_option('twi')); ?>"></a></li><?php } ?>
        <?php if(ale_get_option('you')){ ?><li class="youtube"><a href="<?php echo esc_url(ale_get_option('you')); ?>"></a></li><?php } ?>
    </ul>
<?php } else if(ALETHEME_DESIGN_STYLE == 'mimi'){?>
    <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/tw.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/fb.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/you.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/li.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/pin.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/tb.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/is.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/rd.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
    <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" target="_blank"><div class="alekids_round_icon"><div class="mask"></div><div class="icon"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/css/images/mimi/social/vk.svg" alt="<?php esc_attr_e('Social Icon','ale'); ?>" /></div></div></a><?php } ?>
<?php } else { ?>
    <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-twitter" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-youtube" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-pinterest-p" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-tumblr" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-reddit-alien" aria-hidden="true"></i></span></a><?php } ?>
    <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" target="_blank"><span class="social_icon"><i class="fa fa-vk" aria-hidden="true"></i></span></a><?php } ?>
<?php } ?>