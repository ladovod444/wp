<?php
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d'); 
    $posts_classes = 'alekids_blog_preview';

    if(!empty($args['post_class']) && $args['exist_sticky'] !== '1'){
        $posts_classes .= ' '.$args['post_class'];
    }
    if(!empty($args['exist_sticky']) && $args['exist_sticky'] == '1'){
        $args['featured_image'] = 'post-smallimage';
    }
    if(!get_the_post_thumbnail(get_the_ID())){
        $posts_classes .= ' no_featured_image';
    } ?>

<article <?php post_class($posts_classes); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
    <?php if(get_the_post_thumbnail($post->ID,'post-smallimage')){ ?>
        <div class="featured_image">
            <?php
            $alekids_post_format = get_post_format(get_the_ID());
            if($alekids_post_format == 'video'){
                //Get Image
                if(!empty($args['featured_image'])){
                    echo get_the_post_thumbnail($post->ID,$args['featured_image']);
                }
                //Get Video Button
                wp_enqueue_script('venobox');
                $alekids_video_link = '';
                if(ale_get_meta('video_link')){
                    $alekids_video_link = ale_get_meta('video_link');
                }
                if(!empty($alekids_video_link)){
                    echo '<div class="video_post"><a href="'.esc_url($alekids_video_link).'" data-overlay="rgba(95,164,255,0.8)" data-autoplay="true" data-vbtype="video"  class="venobox open_video"><span class="video_icon"></span></a></div>';
                }
            } elseif($alekids_post_format == 'gallery'){ ?>
                <div class="alekids_post_gallery">
                    <?php
                        wp_enqueue_script('slick');
                        $alekids_images = get_post_meta($post->ID, 'ale_gallery_id', true);
                        if ( $alekids_images ) {
                            foreach ( $alekids_images as $attachment ) {
                                echo "<div>".wp_get_attachment_image( $attachment, $args['featured_image'] )."</div>";
                            }
                        }
                    ?>
                </div>
            <?php } else {
                //Get Image
                if(!empty($args['featured_image'])){
                    echo '<div class="featured_image_holder"><a href="'.esc_url(get_the_permalink()).'">';
                    echo get_the_post_thumbnail($post->ID,$args['featured_image']);
                    echo '</a></div>';
                }
            } ?>

            <span class="category font_one">
                <?php 
                $alekids_categories = get_the_category();
                if(!empty($alekids_categories)){
                    $i = 0;
                    foreach($alekids_categories as $cat){
                        echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" rel="category tag">'.esc_html($cat->name).'</a>';
                        $i++;
                        if($i == 5) break;
                    }
                } ?>
            </span>
        </div>
    <?php } ?>
    <span class="post_info">
        <span class="inner_info"><?php esc_html_e('By','ale');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a></span> <span class="inner_info"><?php esc_html_e('Posted on','ale');?> <?php echo '<a href="'.esc_attr(get_day_link( $archive_year, $archive_month, $archive_day)).'">'.get_the_date().'</a>'; ?></span>
        <?php if(!get_the_post_thumbnail()){?>
            <span class="inner_info">
                <?php esc_html_e('Posted in:','ale') ?> <?php the_category(', '); ?>
            </span>
        <?php } ?>
    </span>
    <h3><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
    <div class="post_excerpt">
        <?php
        if(!empty($args['post_class']) and $args['post_class'] == 'bigpost'){
           echo wp_kses_post(ale_trim_excerpt(60));
        } else {
           echo wp_kses_post(ale_trim_excerpt(23));
        } ?>
    </div>
    <a class="read_more_blog font_one" href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e('Read More','ale'); ?></a>    
</article>
