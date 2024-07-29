<div class="wrapper content_wrapper alekids_single_gallery">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('story'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
            <?php $alekids_images = get_post_meta($post->ID, 'ale_gallery_id', true); ?>
            <div class="top_gallery_section">
                <div class="left_content">
                    <h4><?php the_title(); ?></h4>
                    <div class="gallery_meta font_one">
                        <?php if(ale_get_meta('author')){
                            echo '<span class="meta_item"><span>'.esc_html__('Author:','ale').'</span> '.esc_html(ale_get_meta('author')).'</span>';
                        } ?>
                        <?php if(ale_get_meta('year')){
                            echo '<span class="meta_item"><span>'.esc_html__('Year:','ale').'</span> '.esc_html(ale_get_meta('year')).'</span>';
                        } ?>
                        <span class="meta_item">
                            <span><?php esc_html_e('Category:','ale'); ?></span> <?php 
                            $alekids_galleries_cats = get_the_terms(get_the_ID(),'work-category');
                            if($alekids_galleries_cats){
                                foreach($alekids_galleries_cats as $cat){
                                    echo '<a href="'.esc_url(get_term_link($cat->slug, 'work-category')).'">'.esc_html($cat->name).'</a>';
                                }
                            } ?>
                        </span>
                        <?php if(!empty($alekids_images)){ ?>
                            <span class="meta_item"><span><?php esc_html_e('Photos:','ale'); ?></span> <?php echo count($alekids_images); ?></span>
                        <?php } ?>
                        <?php if(ale_get_meta('location')){
                            echo '<span class="meta_item"><span>'.esc_html__('Location:','ale').'</span> '.esc_html(ale_get_meta('location')).'</span>';
                        } ?>
                        <span class="meta_item">
                            <span><?php esc_html_e('Share:','ale'); ?></span> <?php if(function_exists('ale_get_share')){?>
                                <a href="<?php echo esc_url(ale_get_share('fb')); ?>" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php esc_html_e('fb','ale'); ?></a> /
                                <a href="<?php echo esc_url(ale_get_share('twi')); ?>" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php esc_html_e('tw','ale'); ?></a> /
                                <a href="<?php echo esc_url(ale_get_share('pin')); ?>" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php esc_html_e('pin','ale'); ?></a> /
                                <a href="<?php echo esc_url(ale_get_share('vk')); ?>" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false"><?php esc_html_e('vk','ale'); ?></a>
                            <?php } ?>
                        </span>
                    </div>
                </div>
                <div class="alekids_gallery_slider">
                    <?php wp_enqueue_script('slick');
                    if ( $alekids_images ) {
                        foreach ( $alekids_images as $attachment ) {
                            echo "<div>".wp_get_attachment_image( $attachment, 'works-slider' )."</div>";
                        }
                    } ?>
                </div>
            </div>
            <div class="bottom_gallery_section">
                <?php the_content(); ?>

                <div class="colored_line gallery_single_bottom">
                    <div></div><div></div><div></div><div></div>
                </div>
            </div>

        </article>
	<?php endwhile; else: ?>
		<?php get_template_part('partials/notfound')?>
	<?php endif; ?>
	
	<?php if (comments_open() || get_comments_number()) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>
</div>