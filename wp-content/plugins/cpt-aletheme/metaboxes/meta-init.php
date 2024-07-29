<?php

/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function ale_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "ale_";

    if(function_exists('ale_get_option')){
        if(ale_get_option('woo_grid_style') == 'keira' or ale_get_option('woo_grid_style') == 'moka'){
            $meta_boxes[] = array(
                'id'         => 'product_metabox',
                'title'      => esc_html__('Product Settings','ale'),
                'pages'      => array( 'product' ), // Post type
                'context'    => 'normal',
                'priority'   => 'high',
                'show_names' => true, // Show field names on the left
                'fields' => array(
    
                    array(
                        'name' => esc_html__('Description Background','ale'),
                        'desc' => esc_html__('Upload a background','ale'),
                        'id'   => $prefix . 'shop_bg_product',
                        'type'    => 'file',
                    ),
                )
            );
        }
    } 

    $meta_boxes[] = array(
        'id'         => 'title_heading_metabox',
        'title'      => esc_html__('Title Heading Styles','ale'),
        'pages'      => array( 'page', 'post', 'works' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Page Heading Mask?','ale'),
                'desc' => esc_html__('Enable or disable the mask on page heading images background (if it supports)','ale'),
                'id'   => $prefix . 'maskonheading',
                'std'  => 'disable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Disable Mask','ale'), 'value' => 'disable', ),
                    array( 'name' => esc_html__('Black & White','ale'), 'value' => 'blackwhite', ),
                    array( 'name' => esc_html__('Dark 40% Opacity','ale'), 'value' => 'black_40', ),
                    array( 'name' => esc_html__('Black 40% Opacity','ale'), 'value' => 'negru_40', ),
                ),
            ),
            array(
                'name' => esc_html__('Featured Image Size - Cover.','ale'),
                'desc' => esc_html__('Check this field to make the featured image size cover in the page heading.','ale'),
                'id'   => $prefix . 'featuredimagecover',
                'type'    => 'checkbox',
            ),
            array(
                'name' => esc_html__('Post Pre Title','ale'),
                'desc' => esc_html__('Insert the Pre Title','ale'),
                'id'   => $prefix . 'post_pre_title',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Title and Pre Title Position','ale'),
                'desc' => esc_html__('Specify the position for the Title and Pre Title','ale'),
                'id'   => $prefix . 'post_title_position',
                'std'  => '',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('After the Page Heading','ale'), 'value' => 'afterheading', ),
                    array( 'name' => esc_html__('Into the Page Heading','ale'), 'value' => 'onheadingfeatured', ),
                    array( 'name' => esc_html__('After the Page Heading. Show Default in Heading','ale'), 'value' => 'afterheadingwithdefaults', ),
                    array( 'name' => esc_html__('After Thumb/Slider. Show Default in Heading','ale'), 'value' => 'afterfeaturedimage', ),
                    array( 'name' => esc_html__('After Heading. Make Heading full width. Used on Wedding Variant.','ale'), 'value' => 'fullwidthwedding', ),
                    array( 'name' => esc_html__('Do not show','ale'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Featured Image Position','ale'),
                'desc' => esc_html__('Specify the position for the Featured Image','ale'),
                'id'   => $prefix . 'featured_position',
                'std'  => '',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('In Page Headings as background (if it supports)','ale'), 'value' => 'in_heading', ),
                    array( 'name' => esc_html__('In Content Area','ale'), 'value' => 'in_content', ),
                    array( 'name' => esc_html__('Do not display','ale'), 'value' => 'no', ),
                ),
            ),
            array(
                'name' => esc_html__('Sidebar Position','ale'),
                'desc' => esc_html__('Specify a sidebar position','ale'),
                'id'   => $prefix . 'sidebar_position',
                'std'  => 'no',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('No Sidebar','ale'), 'value' => 'no', ),
                    array( 'name' => esc_html__('1/3 Left','ale'), 'value' => 'left_third', ),
                    array( 'name' => esc_html__('1/4 Left','ale'), 'value' => 'left_fourth', ),
                    array( 'name' => esc_html__('1/3 Right','ale'), 'value' => 'right_third', ),
                    array( 'name' => esc_html__('1/4 Right','ale'), 'value' => 'right_fourth', ),
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'posts_metabox',
        'title'      => esc_html__('Posts Settings','ale'),
        'pages'      => array( 'post', 'works' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Post Info Line Position','ale'),
                'desc' => esc_html__('Select a position for the post info line.','ale'),
                'id'   => $prefix . 'post_info_line',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Before Content','ale'), 'value' => 'before_content', ),
                    array( 'name' => esc_html__('After Content','ale'), 'value' => 'after_content', ),
                    array( 'name' => esc_html__('Hide Info Line, Show Grid Line','ale'), 'value' => 'grid_line', ),
                    array( 'name' => esc_html__('Right Column','ale'), 'value' => 'right_column', ),
                    array( 'name' => esc_html__('Hide Info Line, Show Thumbs Line (for Wedding Variant)','ale'), 'value' => 'thumbs_line', ),
                    array( 'name' => esc_html__('Disable Info Line','ale'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Author Info','ale'),
                'desc' => esc_html__('Enable or disable the author info box before the content','ale'),
                'id'   => $prefix . 'author_info',
                'std'  => 'disable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Disable Author Info Block','ale'), 'value' => 'disable', ),
                    array( 'name' => esc_html__('Enable Author Info Block','ale'), 'value' => 'enable', ),
                ),
            ),
            array(
                'name' => esc_html__('Related posts','ale'),
                'desc' => esc_html__('Show or hide the related posts block?','ale'),
                'id'   => $prefix . 'related_posts',
                'std'  => 'disable',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Hide Related Posts','ale'), 'value' => 'disable', ),
                    array( 'name' => esc_html__('Show Related Posts (Random)','ale'), 'value' => 'enable', ),
                ),
            ),
            array(
                'name' => esc_html__('Related Posts Block Title','ale'),
                'desc' => esc_html__('Insert the Title','ale'),
                'id'   => $prefix . 'related_posts_title',
                'type'    => 'text',
            ),

            array(
                'name' => esc_html__('Related Posts Count','ale'),
                'desc' => esc_html__('Insert the count number','ale'),
                'id'   => $prefix . 'related_posts_count',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'works_metabox',
        'title'      => esc_html__('Works Settings','ale'),
        'pages'      => array( 'works' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => esc_html__('Gallery Slider Type','ale'),
                'desc' => esc_html__('Select a variant for the Gallery Slider','ale'),
                'id'   => $prefix . 'gallery_slider',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Slider Before Content','ale'), 'value' => 'before_content', ),
                    array( 'name' => esc_html__('Top Info, Full Width Slider','ale'), 'value' => 'top_full', ),
                    array( 'name' => esc_html__('Thumbnails Grid','ale'), 'value' => 'thumbs_grid', ),
                    array( 'name' => esc_html__('Creative Grid','ale'), 'value' => 'creative_grid', ),
                    array( 'name' => esc_html__('Brigitte Slider','ale'), 'value' => 'brigitte_slider', ),
                    array( 'name' => esc_html__('Orquidea Slider','ale'), 'value' => 'orquidea_slider', ),
                ),
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'topslider_metabox',
        'title'      => esc_html__('Top Revolution Slider Settings','ale'),
        'pages'      => array( 'page' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-topslider.php'), ), // Specific post templates to display this metabox
        'fields' => array(

            array(
                'name' => esc_html__('Revolution Slider Shortcode','ale'),
                'desc' => esc_html__('Insert the shor','ale'),
                'id'   => $prefix . 'toprevsliderslug',
                'type'    => 'textarea_code',
            ),
        )
    );

	return $meta_boxes;
}
