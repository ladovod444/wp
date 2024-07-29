<div class="story ale_blog_list archive_blog_page">
    <div class="wrapper content_wrapper">
        <div class="blog_content_holder single_blogpost_page">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                    <?php if(get_the_post_thumbnail($post->ID,'full')){ ?>
                        <div class="featured_image">
                            <?php $ale_post_format = get_post_format();
                            if($ale_post_format == 'video'){
                                echo '<div class="ale_video_post_image">';
                                    if(ale_get_meta('video_link')){
                                        $ale_video_link = ale_get_meta('video_link');
                                    echo wp_oembed_get(esc_url($ale_video_link));
                                    } else {
                                        echo get_the_post_thumbnail($post->ID,'full');
                                    }
                                echo '</div>';
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
                                <?php
                            } else {
                                //Get Image
                                echo '<div class="ale_single_postformat_image">'.get_the_post_thumbnail($post->ID,'full').'</div>';
                            } ?>
                        </div>
                    <?php } ?>
                    <div class="post_container">
                        <span class="post_date"><?php echo get_the_date(); ?></span> 
                        <h2 class="post_title"><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php wp_link_pages(array(
                            'before' => '<p class="post_pages font_one">' . esc_html__('Pages:', 'delizioso'),
                            'after'	 => '</p>',
                        )); ?>
                        <div class="cf"></div>
                        <div class="post_bottom">
                            <?php if(get_the_tags()){ ?>
                                <div class="tagsphar font_one"><?php the_tags( '', ', ', '' );  ?></div>
                            <?php }
                            
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
                        <div class="cf"></div>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>

            <?php if (comments_open() || get_comments_number()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>