<?php 
if(function_exists('ale_get_share')){
    if(ale_get_option('blog_share_icons')!=='hide'){ ?>
        <div class="share_icons">
            <?php $ale_share_platforms = ale_get_option('share_platforms');
            $ale_icon = '';
                foreach ($ale_share_platforms as $key => $value){
                    switch ($key) {
                        case 'fb' :
                            $ale_icon = 'fa-facebook';
                            break;
                        case 'twi' :
                            $ale_icon = 'fa-twitter';
                            break;
                        case 'goglp' :
                            $ale_icon = 'fa-google-plus';
                            break;
                        case 'lin' :
                            $ale_icon = 'fa-linkedin';
                            break;
                        case 'red' :
                            $ale_icon = 'fa-reddit-alien';
                            break;
                        case 'pin' :
                            $ale_icon = 'fa-pinterest';
                            break;
                        case 'vk' :
                            $ale_icon = 'fa-vk';
                            break;
                    }
                    if($value == '1'){ ?>
                        <a href="<?php echo esc_url(ale_get_share($key)); ?>" class="ale_share_icon ale_<?php echo esc_attr($key); ?>_icon" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><i class="fa <?php echo esc_attr($ale_icon); ?>" aria-hidden="true"></i></a>
                    <?php }
                }
            ?>
    </div>
    <?php } 
}?>