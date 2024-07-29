<article <?php post_class(); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php if(get_the_post_thumbnail($post->ID,'full')){ ?>
        <div class="featured_image">
            <?php
            $ale_post_format = get_post_format();
            if($ale_post_format == 'video'){
                //Get Image
                echo get_the_post_thumbnail($post->ID, 'full');
                
                //Get Video Button
                wp_enqueue_script('venobox');
                $ale_video_link = '';

                if(ale_get_meta('video_link')){
                    $ale_video_link = ale_get_meta('video_link');
                }
                if(!empty($ale_video_link)){
                    echo '<div class="video_post">
                        <a href="'.esc_url($ale_video_link).'" data-overlay="rgba(18,20,22,0.95)" data-autoplay="true" data-vbtype="video"  class="venobox open_video">
                            <img src="'.get_template_directory_uri().'/assets/css/images/pizza/play.svg" alt="'.esc_attr__('icon','ale').'" />					
                        </a>
                    </div>';
                }
            } elseif($ale_post_format == 'gallery'){ ?>
                <div class="ale_post_gallery">
                    <?php
                    wp_enqueue_script('slick');
                    $ale_images = get_post_meta($post->ID, 'ale_gallery_id', true);
                    if ( $ale_images ) {
                        foreach ( $ale_images as $attachment ) {
                            echo "<div>".wp_get_attachment_image( $attachment, 'full' )."</div>";
                        }
                    } ?>
                </div>
            <?php } else {
                //Get Image
                echo '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail($post->ID,'full').'</a>';
            } ?> 
        </div>
    <?php } ?>
    <div class="post_container">
        <span class="post_date"><?php echo get_the_date(); ?></span> 
        <h2 class="post_title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
        <div class="post_excerpt">
            <?php echo wp_kses_post(ale_trim_excerpt(36)); ?>
        </div>
        <div class="post_bottom">
            <a href="<?php esc_url(the_permalink()); ?>" class="read_more_post font_one"><?php esc_html_e('Read More', 'delizioso'); ?></a>
            <?php 
            if(function_exists('ale_get_share')){
                if(ale_get_option('blog_share_icons')!=='hide'){ ?>
                    <div class="share_icons">
                    <?php $ale_share_platforms = ale_get_option('share_platforms');
                    $ale_icon = '';
                        foreach ($ale_share_platforms as $key => $value){
                            switch ($key) {
                                case 'fb' :
                                    $ale_icon = 'Fb.';
                                    break;
                                case 'twi' :
                                    $ale_icon = 'X.';
                                    break;
                                case 'goglp' :
                                    $ale_icon = 'Go.';
                                    break;
                                case 'lin' :
                                    $ale_icon = 'Li.';
                                    break;
                                case 'red' :
                                    $ale_icon = 'Re.';
                                    break;
                                case 'pin' :
                                    $ale_icon = 'Pi.';
                                    break;
                                case 'vk' :
                                    $ale_icon = 'Vk.';
                                    break;
                            }
                            if($value == '1'){ ?>
                                <a href="<?php echo esc_url(ale_get_share($key)); ?>" class="ale_share_icon ale_<?php echo esc_attr($key); ?>_icon" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php echo esc_attr($ale_icon); ?></a>
                            <?php }
                        }
                    ?>
                </div>
                <?php } 
            }?>
        </div>
    </div>
</article>