<?php wp_enqueue_script( 'slick' ); ?>
<div class="brigitte_slider">
    <?php $images = get_post_meta($post->ID, 'ale_gallery_id', true);

    $total_images = '';

    if ( $images ){ $total_images = count($images); ?>

        <div class="brigitte-slider-container">
            <?php foreach ( $images as $attachment ) { ?>
                <div>
                    <?php echo wp_get_attachment_image( $attachment, 'works-brigitte' ); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="content_wrapper brigitte_slider_infoline cf">
        <div class="share-icons">
            <span class="social_label">
                <?php echo esc_html_e('Share','ale'); ?>
            </span>
            <div class="social_icons">
                <?php $ale_share_platforms = ale_get_option('share_platforms');
                $ale_icon = '';
                if(function_exists('ale_get_share')){
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
                }
                ?>
            </div>
        </div>
        <div class="title-and-cat">
            <h3><?php the_title() ?></h3>
            <span class="category">
                <?php $type_terms = get_the_terms( get_the_ID(), "work-category" );

                if(!empty($type_terms)){
                    foreach($type_terms as $term){
                        echo esc_attr($term->name);
                        break;
                    }
                } ?>
            </span>
        </div>
        <div class="photos-count">
            <span class="photos_label">
                <?php echo esc_html_e('Photos','ale'); ?>
            </span>
            <div class="photos_numbers">
                <span class="current_photo">1</span>
                <span class="of"><?php echo esc_html_e('of','ale'); ?></span>
                <span class="total_photos"><?php echo esc_html($total_images); ?></span>
            </div>


        </div>
    </div>
</div>