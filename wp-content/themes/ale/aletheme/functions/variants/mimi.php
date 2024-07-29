<?php 
//Display custom Icon for Heading
function alekids_add_custom_icon_for_heading(){
    $alekids_icon_url = '';
    $alekids_icon = '';

    if(is_post_type_archive('galleries')){
        $alekids_icon_url = esc_url(get_template_directory_uri()) . '/assets/css/images/mimi/galicon.svg';
    } elseif(is_post_type_archive('product')) {
        $alekids_icon_url = esc_url(get_template_directory_uri()) . '/assets/css/images/mimi/saleicon.svg';
    } elseif(is_page()){
        if(get_post_meta(get_the_ID(),'ale_post_heading_icon',true)){
            $alekids_icon_url = esc_url(get_template_directory_uri()) . '/assets/css/images/mimi/'.get_post_meta(get_the_ID(),'ale_post_heading_icon',true).'.svg';
        }
    } else {
        $alekids_icon_url = esc_url(get_template_directory_uri()) . '/assets/css/images/mimi/listicon.svg';
    }
    if(!empty($alekids_icon_url)){
        $alekids_icon = '<div class="specific_icon_for_heading"><img src="'.esc_url($alekids_icon_url).'" alt="'.esc_attr__('Icon','ale').'" /></div>';
    }
    echo ale_wp_kses($alekids_icon);
}
add_action('alekids_custom_heading_icon','alekids_add_custom_icon_for_heading');

//Register Custom Metaboxes
function mimi_ale_metaboxes($meta_boxes) {

    $meta_boxes = array();
    $prefix = "ale_";

    $meta_boxes[] = array(
        'id'         => 'pages_metabox',
        'title'      => esc_html__('Mimi Pages Settings','ale'),
        'pages'      => array( 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Select Icon for Heading','ale'),
                'desc' => esc_html__('Select a specified icon for page heading.','ale'),
                'id'   => $prefix . 'post_heading_icon',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => esc_html__('Sun Icon','ale'), 'value' => 'sun', ),
                    array( 'name' => esc_html__('Map Icon','ale'), 'value' => 'mapicon', ),
                    array( 'name' => esc_html__('Sale Icon','ale'), 'value' => 'saleicon', ),
                    array( 'name' => esc_html__('Gallery Icon','ale'), 'value' => 'galicon', ),
                    array( 'name' => esc_html__('Leaf Icon','ale'), 'value' => 'listicon', ),
                ),
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'galleries_metabox',
        'title'      => esc_html__('Mimi Gallery Settings','ale'),
        'pages'      => array( 'works' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Author','ale'),
                'desc' => esc_html__('Specify the Author','ale'),
                'id'   => $prefix . 'author',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Year','ale'),
                'desc' => esc_html__('Specify the year','ale'),
                'id'   => $prefix . 'year',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Location','ale'),
                'desc' => esc_html__('Specify the location','ale'),
                'id'   => $prefix . 'location',
                'type'    => 'text',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'video_posts_metabox',
        'title'      => esc_html__('Video Format Posts Settings','ale'),
        'pages'      => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Video Link for Video Format Post','ale'),
                'desc' => esc_html__('Specify a video link','ale'),
                'id'   => $prefix . 'video_link',
                'type'    => 'text',
            ),
        )
    );
    
    return $meta_boxes;
}

// Init Metaboxes
if(class_exists('Ale_Meta_Box')){
    add_filter('ale_meta_boxes', 'mimi_ale_metaboxes' );
    $meta_boxes = array();
    $meta_boxes = apply_filters ( 'ale_meta_boxes' , $meta_boxes );
    foreach ( $meta_boxes as $meta_box ) {
        new Ale_Meta_Box( $meta_box );
    }
}

//Custom Image Sizes
function mimi_get_images_sizes() {
	return array(
        'post' => array(
            array(
                'name'      => 'post-smallimage',
                'width'     => 380,
                'height'    => 300,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-bigimage',
                'width'     => 780,
                'height'    => 300,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-featured',
                'width'     => 1180,
                'height'    => 700,
                'crop'      => true,
            ),
        ),
        'works' => array(
            array(
                'name'      => 'works-square',
                'width'     => 495,
                'height'    => 500,
                'crop'      => true,
            ),
            array(
                'name'      => 'works-slider',
                'width'     => 780,
                'height'    => 480,
                'crop'      => true,
            ),
            
        ),
    );
}
function mimi_init_theme_support() {
	if (function_exists('ale_get_images_sizes')) {
		foreach (mimi_get_images_sizes() as $post_type => $sizes) {
			foreach ($sizes as $config) {
				ale_add_image_size($post_type, $config);
			}
		}
	}
}
add_action('init', 'mimi_init_theme_support');