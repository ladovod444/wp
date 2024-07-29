<div class="colored_line">
    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
</div>
<?php
    if(is_single()){
        $alekids_title = get_the_title();
        $alekids_header_class = '';

        if(strlen($alekids_title) < 49) {
            $alekids_header_class = 'alekids_normal_title';
        } else {
            $alekids_header_class = 'alekids_long_title';
        }
    }
    if(!is_front_page() && !is_page_template('template-landing.php')){ ?>
        <div class="inner_header <?php if(is_single()){ echo esc_attr($alekids_header_class); } ?>">
            <h1><?php
            if(is_category()){
                echo esc_html__('Category: ','ale') . single_cat_title("", false);
            } elseif(is_author()){
                echo esc_html__('Author: ','ale') . get_the_author();
            } elseif(is_tag()){
                echo esc_html__('Tag: ','ale') . single_tag_title("", false);
            } elseif(is_search()){
                echo esc_html__('Search for: ','ale') . get_search_query();
            } elseif(is_post_type_archive('works')){
                echo esc_html(ale_get_option('works_title'));
            } elseif(is_tax('work-category')){
                echo esc_html__( 'Gallery Category', 'ale' );
            } elseif(function_exists('is_woocommerce') and is_woocommerce()){
                if(ale_get_option('wooblogtitle')){
                    echo esc_html(ale_get_option('wooblogtitle'));
                } else {
                    echo wp_kses_post(woocommerce_page_title());
                }
            } elseif(is_archive()) {
                if ( is_day() ) :
                    echo sprintf( esc_html__( 'Daily Archive: %s', 'ale' ), get_the_date() );
                elseif ( is_month() ) :
                    echo sprintf( esc_html__( 'Monthly Archive: %s', 'ale' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'ale' ) ) );
                elseif ( is_year() ) :
                    echo sprintf( esc_html__( 'Yearly Archive: %s', 'ale' ), get_the_date( _x( 'Y', 'yearly archives date format', 'ale' ) ) );
                else :
                    echo esc_html__( 'Archive', 'ale' );
                endif;
            } elseif(is_404()){
                echo esc_html__('404','ale');
            } elseif(is_singular('galleries')){
                $alekids_post_type_obj = get_post_type_object( 'galleries' );
                echo esc_html($alekids_post_type_obj->labels->singular_name);
            } elseif(is_single()){
                the_title();
            } else {
                echo ale_wp_kses(wp_title(''));
            } ?></h1>
            <?php echo ale_get_breadcrumbs(); ?>
            <?php do_action('alekids_custom_heading_icon'); ?>
        </div>
<?php }