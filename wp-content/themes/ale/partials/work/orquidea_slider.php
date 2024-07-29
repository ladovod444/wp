<?php wp_enqueue_script('scrollable'); ?>
<div class="slidergallery cusstyle13">
        <div class="divider"></div>
        <div class="orquidea_sliderbox sliderbox cf">
            <div class="items">
            <?php
            $images = get_post_meta($post->ID, 'ale_gallery_id', true);
            if ( $images ) {
                foreach ( $images as $attachment ) {
                    echo "<div>".wp_get_attachment_image( $attachment, 'large' )."</div>";
                }
            }
            ?>
            </div>
        </div>
        <div class="sliderarrows font_two cf">
            <div class="ltar cusstyle11">
                <a class="prev browse left"><?php esc_html_e('Previous Photo','ale'); ?></a> / <a class="next browse right"><?php esc_html_e('Next Photo','ale'); ?></a>
            </div>
            <div class="rgshare cusstyle14">
                
                    <?php esc_html_e('Share','ale'); ?>
                    
                    
                    <?php $ale_share_platforms = ale_get_option('share_platforms');
                    $ale_icon = '';
                    if(function_exists('ale_get_share')){
                        foreach ($ale_share_platforms as $key => $value){
                            switch ($key) {
                                case 'fb' :
                                    $ale_icon = 'facebook';
                                    break;
                                case 'twi' :
                                    $ale_icon = 'twitter';
                                    break;
                                case 'goglp' :
                                    $ale_icon = 'google';
                                    break;
                                case 'lin' :
                                    $ale_icon = 'linkedin';
                                    break;
                                case 'red' :
                                    $ale_icon = 'reddit';
                                    break;
                                case 'pin' :
                                    $ale_icon = 'pinterest';
                                    break;
                                case 'vk' :
                                    $ale_icon = 'vk';
                                    break;
                            }
                            if($value == '1'){ ?>
                                / <a href="<?php echo esc_url(ale_get_share($key)); ?>" class="ale_share_icon ale_<?php echo esc_attr($key); ?>_icon" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php echo esc_html($ale_icon); ?></a>
                            <?php }
                        }
                    }
                    ?>
                
            </div>
        </div>
        <div class="divider"></div>
    </div>