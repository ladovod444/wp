<section class="instagram_box">
    <?php if(function_exists('ale_get_recent_from_instagram')){ ?>
    <div class="content_wrapper ">
        <h2 class="box_title font_two">our Instagram</h2>
        <?php if(ale_get_option('instagram_feed_footer')=='enable'){
            echo '<div class="footer_instagram_feed font_two">'.ale_get_recent_from_instagram().'</div>';
        } ?>
    </div>
    <?php } ?>
</section>

<footer class="bottom_footer">
    <a href="<?php echo esc_url(home_url("/")); ?>" class="logo font_two">
        <h3><?php esc_attr(bloginfo('title')); ?></h3>
    </a>
    <div class="contact_data">
        <?php if(ale_get_option('footer_address')){ ?>
            <span class="address"><?php echo esc_html(ale_get_option('footer_address')); ?></span>
        <?php } ?>
        <?php if(ale_get_option('footer_callnumber')){ ?>
            <span class="phone"><?php echo esc_html_e('Phone:','ale'); ?> <?php echo esc_attr(ale_get_option('footer_callnumber')); ?></span>
        <?php } ?>
        <?php if(ale_get_option('footer_email_address')){ ?>
            <span class="email"><?php echo esc_html_e('Email:','ale'); ?> <a href="mailto:<?php echo esc_attr(ale_get_option('footer_email_address')); ?>"><?php echo esc_html(ale_get_option('footer_email_address')); ?></a></span>
        <?php } ?>
    </div>

    <div class="social">
        <?php if(ale_get_option('twi')){ ?><a href="<?php echo esc_url(ale_get_option('twi')); ?>" class="twi" target="_blank">twitter</a><?php } ?>
        <?php if(ale_get_option('fb')){ ?><a href="<?php echo esc_url(ale_get_option('fb')); ?>" class="fb" target="_blank">facebook</a><?php } ?>
        <?php if(ale_get_option('you')){ ?><a href="<?php echo esc_url(ale_get_option('you')); ?>" class="you" target="_blank">youtube</a><?php } ?>
        <?php if(ale_get_option('lin')){ ?><a href="<?php echo esc_url(ale_get_option('lin')); ?>" class="lin" target="_blank">linkedin</a><?php } ?>
        <?php if(ale_get_option('pin')){ ?><a href="<?php echo esc_url(ale_get_option('pin')); ?>" class="pin" target="_blank">pinterest</a><?php } ?>
        <?php if(ale_get_option('gpl')){ ?><a href="<?php echo esc_url(ale_get_option('gpl')); ?>" class="gpl" target="_blank">google</a><?php } ?>
        <?php if(ale_get_option('tum')){ ?><a href="<?php echo esc_url(ale_get_option('tum')); ?>" class="tum" target="_blank">tumblr</a><?php } ?>
        <?php if(ale_get_option('insta')){ ?><a href="<?php echo esc_url(ale_get_option('insta')); ?>" class="insta" target="_blank">instagram</a><?php } ?>
        <?php if(ale_get_option('red')){ ?><a href="<?php echo esc_url(ale_get_option('red')); ?>" class="red" target="_blank">reddid</a><?php } ?>
        <?php if(ale_get_option('vk')){ ?><a href="<?php echo esc_url(ale_get_option('vk')); ?>" class="vk" target="_blank">vkontakte</a><?php } ?>
    </div>
    <span class="go_top font_two backtotop"><?php echo esc_html_e('back to top','ale'); ?></span>
</footer>