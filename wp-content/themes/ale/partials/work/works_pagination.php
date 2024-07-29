<?php if(ale_show_posts_nav()){ ?>
    <?php if(ALETHEME_DESIGN_STYLE == 'limpieza'){ ?>
        <div class="content_wrapper limpieza_pagination">
            <?php ale_limpieza_page_links(); ?>
        </div>
    <?php } else if(ALETHEME_DESIGN_STYLE == 'nunta'){ ?>
        <div class="pagination cf">
            <div class="pagy customfont font_three">
                <?php previous_posts_link( esc_html__('Prev galleries','ale') ); ?> &nbsp; <?php next_posts_link( esc_html__('Next galleries','ale') ); ?>
            </div>
        </div>
    <?php } else if(ALETHEME_DESIGN_STYLE == 'cafeteria'){?>
        <div class="cafeteria_pagination cf">
            <h3 class="left firstfont font_one"><?php echo get_previous_posts_link(esc_html__('Previous','ale')); ?></h3>
            <h3 class="right firstfont font_one"><?php echo get_next_posts_link(esc_html__('Next','ale')); ?></h3>
            <h3 class="center firstfont font_one"><?php if($wp_query->max_num_pages) { echo esc_attr($paged); ?> <?php  esc_html_e('of','ale'); ?> <?php echo esc_attr($wp_query->max_num_pages); } ?></h3>
        </div>
    <?php } else { ?>
    <div class="pagination default_pagination cf">
        <?php ale_page_links(); ?>
    </div>
    <?php } ?>
<?php }