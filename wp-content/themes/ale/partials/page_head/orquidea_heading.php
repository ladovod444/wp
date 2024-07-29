<?php
//Featured image on Single Post/Page and Options Image for the rest pages.
$ale_bg_for_title = '';
$ale_bg_for_title_class = '';
$ale_title_for_heading = '';
$ale_pre_title_for_heading = '';
if(ale_get_option('archiveblogpretitle')){ $ale_pre_title_for_heading = ale_get_option('archiveblogpretitle'); };
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
		if(ale_get_option('archiveblogpretitle')){ $ale_pre_title_for_heading = ale_get_option('archiveblogpretitle'); };
		if(ale_get_option('archiveblogtitle')){ $ale_title_for_heading = ale_get_option('archiveblogtitle'); };

		if(is_singular('works')){
			if(ale_get_option('works_pre_title')){ $ale_pre_title_for_heading = ale_get_option('works_pre_title'); };
			if(ale_get_option('works_title')){ $ale_title_for_heading = ale_get_option('works_title'); };
			$ale_bg_for_title = ale_get_option('worktitlebg');
		}
	}

} else {
	if(ale_get_option('archivetitlebg')) {
		$ale_bg_for_title = ale_get_option('archivetitlebg');
	}
}

if(is_category()){
	$ale_title_for_heading = single_cat_title("", false);
	$ale_pre_title_for_heading = esc_html__('all posts from','ale');
} else if(is_author()){
	$ale_title_for_heading =  get_the_author();
	$ale_pre_title_for_heading = esc_html__('all posts from author:','ale');
} else if(is_tag()){
	$ale_title_for_heading = single_tag_title("", false);
	$ale_pre_title_for_heading = esc_html__('tagged to:','ale');
} else if(is_search()){
	$ale_title_for_heading = get_search_query();
	$ale_pre_title_for_heading = esc_html__('search results for','ale');
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
	$ale_pre_title_for_heading = esc_html__('Oops:','ale');
}

//WooCommerce Pages
if(function_exists('is_woocommerce')){
	if(is_woocommerce()){
		$ale_title_for_heading = esc_attr(ale_get_option('wooblogtitle'));
		$ale_pre_title_for_heading = esc_attr(ale_get_option('wooblogpretitle'));
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
	$ale_pre_title_for_heading = esc_attr(ale_get_option('works_pre_title'));
	if(ale_get_option('worktitlebg')){
		$ale_bg_for_title = esc_url(ale_get_option('worktitlebg'));
	}
}


?>


<div class="sectionboxtitle cf">
    <div class="content_wrapper">
        <div class="gallerylefttitles">
            <div class="boxtitle "><?php if($ale_title_for_heading){ ?><h2 class="font_one"><?php echo esc_html($ale_title_for_heading); ?></h2><?php } ?></div>
            <div class="subtitle font_two"><?php if($ale_pre_title_for_heading){ ?><span class="pretitle"><?php echo esc_html($ale_pre_title_for_heading); ?></span><?php } ?></div>
        </div>
        <?php if((ALETHEME_DESIGN_STYLE == 'orquidea' && is_post_type_archive('works')) || (ALETHEME_DESIGN_STYLE == 'orquidea' && is_tax('work-category'))){ ?>
            
            <div class="galleryfilterbox">
                <div class="filterbut font_two firstbg">
                    <span class="selectedcat"><?php esc_html_e('filter by category','ale'); ?></span>
                    <span class="opendropcat"></span>
                </div>
                <div class="dropdonwcat">
                    <ul id="filters" class="font_two">
                        <li class="cf"><a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="fil" data-filter="*"><?php esc_html_e('show all', 'ale')?></a></li>
                        <?php $args = array(
                            'type'                     => 'works',
                            'child_of'                 => 0,
                            'parent'                   => '',
                            'orderby'                  => 'name',
                            'order'                    => 'ASC',
                            'hide_empty'               => 1,
                            'hierarchical'             => 1,
                            'exclude'                  => '',
                            'include'                  => '',
                            'number'                   => '',
                            'taxonomy'                 => 'work-category',
                            'pad_counts'               => false );

                        $categories = get_categories( $args );

                        foreach($categories as $cat){
                            echo '<li class="cf"><a href="'.esc_url(get_term_link($cat->slug,'work-category')).'" class="fil" data-filter=".'.esc_attr($cat->slug).'">'.esc_attr($cat->name).'</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

