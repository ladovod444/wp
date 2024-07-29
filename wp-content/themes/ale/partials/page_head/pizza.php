<?php 
    $ale_bg_for_title = '';

    if(is_single() or is_page()){
        global $post;
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            if(ale_get_meta('featured_position') == 'in_heading'){
                $ale_bg_for_title = get_the_post_thumbnail_url($post->ID,'full');
            } else {
                $ale_bg_for_title = ale_get_option('archivetitlebg');
            }
        } else {
            $ale_bg_for_title = ale_get_option('archivetitlebg');
        }
    } else {
        if(ale_get_option('archivetitlebg')) {
            $ale_bg_for_title = ale_get_option('archivetitlebg');
        }
    }
    if(function_exists('is_woocommerce')){
        if(is_woocommerce()){
            if(ale_get_option('wootitlebg')){
                $ale_bg_for_title = esc_url(ale_get_option('wootitlebg'));
            }
        }
        if(is_product()){
            $ale_bg_for_title = ale_get_option('woosingletitlebg');
        }
    }
    if(is_post_type_archive('works')){
        if(ale_get_option('worktitlebg')){
            $ale_bg_for_title = esc_url(ale_get_option('worktitlebg'));
        }
    }
?>

<?php if(is_front_page() && is_home()){?>
    <div class="heading_home_list"></div>
<?php } else if(is_front_page()){ 
    //Home with page
} else { 
    //Inner Pages
    ?>
    <div class="inner_header" <?php if($ale_bg_for_title){ ?>style="background-image: url(<?php echo esc_url($ale_bg_for_title); ?>);" <?php } ?>>
        <div class="wrapper">
        <div class="delizioso_title">
            <?php if(function_exists('is_woocommerce') and is_woocommerce()){
                echo esc_html(ale_get_option('wooblogpretitle'));
            } elseif(is_single() or is_singular()){
                if(ale_get_meta('post_pre_title')){
                    echo esc_html(ale_get_meta('post_pre_title'));
                } else {
                    echo esc_html(ale_get_option('archiveblogpretitle'));
                }
            } else {
                echo esc_html(ale_get_option('archiveblogpretitle'));
            } ?>
        </div>

        <h1 class="page_header_title"><?php
            if(is_category()){
                echo esc_html__('Category: ','ale') . single_cat_title("", false);
            } elseif(is_author()){
                echo esc_html__('Author: ','ale') . get_the_author();
            } elseif(is_tag()){
                echo esc_html__('Tag: ','ale') . single_tag_title("", false);
            } elseif(is_search()){
                echo esc_html__('Search for: ','ale') . get_search_query();
            } elseif(is_post_type_archive('galleries')){
                $galleries = get_post_type_object( 'galleries' );
                echo esc_html($galleries->labels->name);
            } elseif(function_exists('is_woocommerce') and is_woocommerce()){
                echo esc_html(ale_get_option('wooblogtitle'));
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
            } elseif(is_single()){
                echo '<span class="post_title">';
                esc_html_e('Blog','ale');
                echo '</span>';
            } else {
                echo ale_wp_kses(wp_title(''));
            } ?>
        </h1>

        <?php ale_get_breadcrumbs();  ?>
        </div>
    </div>
<?php }?>