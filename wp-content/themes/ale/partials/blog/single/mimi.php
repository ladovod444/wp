<?php 
    $alekids_sidebar = 'no_sidebar';
    if ( is_active_sidebar( 'main-sidebar' ) ) {
		$alekids_sidebar = 'show_sidebar';
	}
?>
<div class="wrapper content_wrapper alekids_single_post <?php echo esc_attr($alekids_sidebar); ?>">
    <div class="post_content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class('story'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                <?php 
                    $archive_year  = get_the_time('Y'); 
                    $archive_month = get_the_time('m'); 
                    $archive_day   = get_the_time('d'); 
                ?>
                <?php if(get_the_post_thumbnail($post->ID,'post-featured')){ ?>
                    <div class="featured_image">
                        <?php $alekids_post_format = get_post_format();
                        if($alekids_post_format == 'video'){
                            echo get_the_post_thumbnail($post->ID,'post-featured');
                            
                            //Get Video Button
                            wp_enqueue_script('venobox');

                            $alekids_video_link = '';
                            if(ale_get_meta('video_link')){ $alekids_video_link = ale_get_meta('video_link'); }

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
                                            echo "<div>".wp_get_attachment_image( $attachment, 'post-featured' )."</div>";
                                        }
                                    }
                                ?>
                            </div>
                        <?php } else {
                            //Get Image
                            echo get_the_post_thumbnail($post->ID,'post-featured');
                        } ?>
                        <span class="category font_one"><?php the_category(' '); ?></span>
                    </div>
                <?php } ?>
                <span class="post_info">
                    <?php esc_html_e('By','ale');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a> <?php esc_html_e('posted on','ale');?> <?php echo '<a href="'.esc_attr(get_day_link( $archive_year, $archive_month, $archive_day)).'">'.get_the_date().'</a>'; ?>.
                    <?php if(!get_the_post_thumbnail()){ esc_html_e('Posted in:','ale') ?> <?php the_category(', ');  } ?>
                </span>
                <div class="colored_line top_line">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div>
                    <?php the_content(); ?>
                <?php wp_link_pages(array(
                    'before' => '<p class="post_pages">' . esc_html__('Pages:', 'ale'),
                    'after'	 => '</p>',
                )); ?>
                <?php if(get_the_tags()){ ?>
                    <p class="tagsphar"><?php the_tags( '', ' ', '' );  ?></p>
                <?php } ?>
                <div class="colored_line blog_single_bottom">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
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