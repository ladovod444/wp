<?php

//Featured image on Single Post/Page and Options Image for the rest pages.
$ale_title_for_heading = '';
$ale_bg_for_title = '';
$ale_bg_for_title_class = '';
if(ale_get_option('archiveblogtitle')){ $ale_title_for_heading = ale_get_option('archiveblogtitle'); };

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
	if(ale_get_meta('maskonheading')!= 'disable' and ale_get_meta('maskonheading') != ''){
		$ale_bg_for_title_class .= 'mask_'.ale_get_meta('maskonheading');
	}
	if(ale_get_meta('featuredimagecover') == 'on'){
		$ale_bg_for_title_class .= ' background_cover';
	}

    $ale_title_for_heading = get_the_title();
    if(ale_get_meta('post_pre_title')) {
        $ale_pre_title_for_heading = ale_get_meta( 'post_pre_title' );
    } else {
        $ale_pre_title_for_heading = '';
    }

    if(ale_get_meta('post_title_position') != 'onheadingfeatured' and ale_get_meta('post_title_position') != ''){
        $ale_title_for_heading = '';
        $ale_pre_title_for_heading = '';
    }

    if(ale_get_meta('post_title_position') == 'afterheadingwithdefaults' or ale_get_meta('post_title_position') == 'afterfeaturedimage'){
        if(ale_get_option('archiveblogtitle')){ $ale_title_for_heading = ale_get_option('archiveblogtitle'); };

        if(is_singular('works')){
            if(ale_get_option('works_title')){ $ale_title_for_heading = ale_get_option('works_title'); };
        }
    }
} else {
	if(ale_get_option('archivetitlebg')) {
		$ale_bg_for_title = ale_get_option('archivetitlebg');
	}
}

if(is_category()){
    $ale_title_for_heading = single_cat_title("", false);
} else if(is_author()){
    $ale_title_for_heading =  get_the_author();
} else if(is_tag()){
    $ale_title_for_heading = single_tag_title("", false);
} else if(is_search()){
    $ale_title_for_heading = get_search_query();
} else if(is_archive()) {
    if ( is_day() ) :
        $ale_title_for_heading = sprintf( esc_html__( 'Daily Archive: %s', 'ale' ), get_the_date() );
    elseif ( is_month() ) :
        $ale_title_for_heading = sprintf( esc_html__( 'Monthly Archive: %s', 'ale' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'ale' ) ) );
    elseif ( is_year() ) :
        $ale_title_for_heading = sprintf( esc_html__( 'Yearly Archive: %s', 'ale' ), get_the_date( _x( 'Y', 'yearly archives date format', 'ale' ) ) );
    else :
        $ale_title_for_heading = esc_html__( 'Archive', 'ale' );
    endif;
} else if(is_404()){
    $ale_title_for_heading = esc_html__('page not found','ale');
}

//WooCommerce Pages
if(function_exists('is_woocommerce')){
    if(is_woocommerce()){
        $ale_title_for_heading = esc_attr(ale_get_option('wooblogtitle'));
        if(ale_get_option('wootitlebg')){
			$ale_bg_for_title = esc_url(ale_get_option('wootitlebg'));
		}
    }
    if(is_product()){
		$ale_bg_for_title = ale_get_option('woosingletitlebg');
	}
}

//Works Archive
if(is_post_type_archive('works')){
    $ale_title_for_heading = esc_attr(ale_get_option('works_title'));
    if(ale_get_option('worktitlebg')){
		$ale_bg_for_title = esc_url(ale_get_option('worktitlebg'));
	}
}

?>
<?php if(!empty($ale_bg_for_title)){
    echo '<div class="heading_bg '.esc_attr($ale_bg_for_title_class).'" style="background-image: url('.esc_url($ale_bg_for_title).');">';
} ?>
    <?php if(ALETHEME_DESIGN_STYLE == 'donation' or ALETHEME_DESIGN_STYLE == 'laptica'){ ?>
        <section class="top-page-nav">
            <div class="center">
                <h2><?php echo esc_html($ale_title_for_heading); ?></h2>
                <?php ale_get_breadcrumbs(); ?>
            </div>
        </section>
    <?php } else { ?>
        <div class="left_title <?php if(ale_get_option('page_heading_style') == 'left_text_breadcrumbs'){ ?>left_title_with_breadcrumbs<?php }?> font_two">
            <div class="content_wrapper item_with_title">
                <h2><?php echo esc_html($ale_title_for_heading); ?></h2>
                <?php if(ale_get_option('page_heading_style') == 'left_text_breadcrumbs'){ ?>
                    <div class="left_text_breadcrumbs">
                        <?php ale_get_breadcrumbs(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
<?php if(!empty($ale_bg_for_title)){
    echo '</div>';
} ?>