<?php

/**
 * Specific fields for module Creative Titles based on design variant
 */
$ale_fields_creative_title = array(
    array(
        "type"        => "textfield",
        "heading"     => esc_html__( "Title", "ale" ),
        "param_name"  => "title",
        "value"       => '',
        "description" => esc_html__( "Type your title", "ale" )
    ),
    array(
        "type"        => "attach_image",
        "heading"     => esc_html__( "Icon Image", "ale" ),
        "param_name"  => "icon",
        "description" => esc_html__( "Select or Upload an image as icon", "ale" )
    ),
);

if(ale_get_option('design_variant') == 'ospedale'){
    $ale_fields_creative_title = array(
        array(
            "type"        => "textfield",
            "heading"     => esc_html__( "Title", "ale" ),
            "param_name"  => "title",
            "value"       => '',
            "description" => esc_html__( "Type your title", "ale" )
        ),
        array(
            "type"        => "vc_link",
            "heading"     => esc_html__( "Button Link", "ale" ),
            "param_name"  => "button_link",
            "value"       => '',
            "description" => esc_html__( "Insert a link for slide button", "ale" )
        ),
    );
}


/*
 * Functions Helpers
 * */
//get all posts for specific post type
function olins_get_type_posts_data( $post_type = 'post' ) {
    $posts = get_posts( array(
        'posts_per_page' 	=> -1,
        'post_type'			=> $post_type,
    ));
    $result = array();
    foreach ( $posts as $post )	{
        $result[] = array(
            'value' => $post->ID,
            'label' => $post->post_title,
        );
    }
    return $result;
}
function olins_get_type_taxonomy_data( $taxonomy = 'product_cat' ) {

    $categories = get_terms( array(
        'orderby'      => 'name',
        'pad_counts'   => false,
        'hierarchical' => 1,
        'hide_empty'   => true,
    ) );

    $result = array();

    foreach( $categories as $category ) {

        if ($category->taxonomy == $taxonomy ) {
            $result[] = array(
                'value' => $category->term_id,
                'label' => $category->name
            );
        }
    }

    return $result;
}

function ale_vc_slug_get_type_taxonomy_data( $taxonomy = 'work-category' ) {

    $categories = get_terms( array(
        'orderby'      => 'name',
        'pad_counts'   => false,
        'hierarchical' => 1,
        'hide_empty'   => true,
    ) );

    $result = array();

    foreach( $categories as $category ) {

        if ($category->taxonomy == $taxonomy ) {
            $result[] = array(
                'value' => $category->slug,
                'label' => $category->name
            );
        }
    }

    return $result;
}


/*
 * Map Shortcodes
 * */
//Contact Form Extension
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Contact_Form extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Contact Form', 'ale' ),
        'base'                    => 'ale_contact_form',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Contact Form with background image', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Form Heading Title", "ale" ),
                "param_name"  => "form_title",
                "value"       => esc_html__( "ask us smth...", "ale" ),
                "description" => esc_html__( "Insert a title for your form", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name Field Placeholder", "ale" ),
                "param_name"  => "form_name",
                "value"       => esc_html__( "Name", "ale" ),
                "description" => esc_html__( "Insert a placeholder. ex: Your Name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Field Placeholder", "ale" ),
                "param_name"  => "form_email",
                "value"       => esc_html__( "Email", "ale" ),
                "description" => esc_html__( "Insert a placeholder. ex: Your Email", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Message Field Placeholder", "ale" ),
                "param_name"  => "form_message",
                "value"       => esc_html__( "Message", "ale" ),
                "description" => esc_html__( "Insert a placeholder. ex: Type your message", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Submit button text", "ale" ),
                "param_name"  => "form_submit",
                "value"       => esc_html__( "Send", "ale" ),
                "description" => esc_html__( "Insert the button text. ex: Send", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Receive to", "ale" ),
                "param_name"  => "form_email_receive",
                "description" => esc_html__( "Your email to receive messages from the contact form", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Subject", "ale" ),
                "param_name"  => "form_email_subject",
                "description" => esc_html__( "Specify a subject that will be used for received emails.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "form_bg",
                "description" => esc_html__( "Select or Upload a background image.", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Mask Color", "ale" ),
                "param_name"  => "form_mask_color",
                "description" => esc_html__( "Select a mask color that is displayed under the form", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Content Align", "ale" ),
                "param_name"  => "form_align",
                "value"       => array( 'Left Align' => 'left', 'Right Align' => 'right', 'Center Align' => 'center' ),
                "description" => esc_html__( "Specify the Content Align in the Form", "ale" )
            ),

        )
    ) );
}

//Slider One Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Slider_One extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Slider One', 'ale' ),
        "base"                    => "ale_slider_one",
        "as_parent"               => array( 'only' => 'ale_slider_one_item' ),
        'description'             => esc_html__( 'An Animated Slider called One', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Slider_One_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Slider One Item', 'ale' ),
        'base'                    => 'ale_slider_one_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_slider_one'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Pre Title", "ale" ),
                "param_name"  => "slide_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "ale" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "ale" )
            ),
        )
    ) );
}

if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Product_Carousel_Slider extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Products Slider', 'ale' ),
        'base'                    => 'ale_product_carousel_slider',
        'category'                => esc_html__( 'Ale WC', 'ale' ),
        'description'             => esc_html__( 'Display products in a carousel slider', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Carousel Pre Title", "ale" ),
                "param_name"  => "carousel_pre_title",
                "value"       => 'check out',
                "description" => esc_html__( "Insert a pre title for your Product Carousel", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Carousel Title", "ale" ),
                "param_name"  => "carousel_title",
                "value"       => 'our stuff',
                "description" => esc_html__( "Insert a title for your Product Carousel", "ale" )
            ),
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Products', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('product'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Enter List of Products', 'ale' ),
            ),
        )
    ) );
}

/* Recent Works shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Recent_Works_Line extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Works Line', 'ale' ),
        'base'                    => 'ale_recent_works_line',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Display a line with recent works posts', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 7 Work Posts', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('works'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 7 posts or let it empty to load recent posts.', 'ale' ),
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array( 
                    'Default' => 'default', 
                    'Organic Style' => 'organic', 
                    'Limpieza Style' => 'limpieza' 
                ),
                "description" => esc_html__( "Select a style", "ale" )
            ),
        )
    ) );
}

/* Counter Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Counter extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Counter', 'ale' ),
        'base'                    => 'ale_counter',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'A counter from zero to your value.', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Counter Value", "ale" ),
                "param_name"  => "value",
                "value"       => '',
                "description" => esc_html__( "Specify the Number", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Counter Value Color", "ale" ),
                "param_name"  => "value_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Counter Label", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type a title for your number", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Counter Label Color", "ale" ),
                "param_name"  => "title_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Counter Icon", "ale" ),
                "param_name"  => "icon",
                "value"       => '',
                "description" => esc_html__( "Upload an icon if is necessary.", "ale" )
            ),
        )
    ) );
}

/* Google Maps Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Google_Maps extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Google Maps', 'ale' ),
        'base'                    => 'ale_google_maps',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Generates a Google Maps', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Address", "ale" ),
                "param_name"  => "address",
                "value"       => '',
                "description" => esc_html__( "Specify the address.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Width", "ale" ),
                "param_name"  => "width",
                "value"       => '100%',
                "description" => esc_html__( "Specify the Map Width", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Height", "ale" ),
                "param_name"  => "height",
                "value"       => '540',
                "description" => esc_html__( "Specify the Map Height", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Map Zoom", "ale" ),
                "param_name"  => "zoom",
                "value"       => '8',
                "description" => esc_html__( "Enter a zoom factor for Google Map (0 = whole world, 19 = individual buildings)", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Zoom on Mouse Wheel", "ale" ),
                "param_name"  => "zoomwithmouse",
                "value"       => array( 'Yes' => 'yes', 'No' => 'no' ),
                "description" => esc_html__( "Allow zooming on mouse wheel?", "ale" )
            ),
        )
    ) );
}


/* Simple Form Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Simple_Form extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Form', 'ale' ),
        'base'                    => 'ale_simple_form',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Generates a Simple Contact Form', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name Placeholder", "ale" ),
                "param_name"  => "name_label",
                "value"       => 'Your name ...',
                "description" => esc_html__( "Specify the name placeholder", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Placeholder", "ale" ),
                "param_name"  => "email_label",
                "value"       => 'Your e-mail address',
                "description" => esc_html__( "Specify the email placeholder", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Message Placeholder", "ale" ),
                "param_name"  => "message_label",
                "value"       => 'Write your message here',
                "description" => esc_html__( "Specify the message placeholder", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Submit button text", "ale" ),
                "param_name"  => "form_submit",
                "value"       => esc_html__( "Send", "ale" ),
                "description" => esc_html__( "Insert the button text. ex: Send", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Receive to", "ale" ),
                "param_name"  => "form_email_receive",
                "description" => esc_html__( "Your email to receive messages from the contact form", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email Subject", "ale" ),
                "param_name"  => "form_email_subject",
                "description" => esc_html__( "Specify a subject that will be used for received emails.", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Show Subject field?", "ale" ),
                "param_name"  => "subjectshow",
                "value"       => array(
                    'Hide' => 'hide',
                    'Show' => 'show'
                ),
                "description" => esc_html__( "Select to show or hide the subject field.", "ale" )
            ),
        )
    ) );
}

/* Pricing Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Price_Element extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Price Element', 'ale' ),
        'base'                    => 'ale_price_element',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Generates a Pricing Element Box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "icon",
                "value"       => '',
                "description" => esc_html__( "Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Price", "ale" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "Specify the price", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Currency", "ale" ),
                "param_name"  => "currency",
                "value"       => '',
                "description" => esc_html__( "Specify the Currency", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the email placeholder", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Price Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Select a link if needed, or let the field empty.", "ale" )
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "content",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Price Color", "ale" ),
                "param_name"  => "price_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Title Color", "ale" ),
                "param_name"  => "title_color",
                "value"       => '',
                "description" => esc_html__( "Specify the color", "ale" )
            ),
        )
    ) );
}


//Testimonials Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Testimonials_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Testimonials Slider', 'ale' ),
        "base"                    => "ale_testimonials_slider",
        "as_parent"               => array( 'only' => 'ale_testimonials_slider_item' ),
        'description'             => esc_html__( 'A Slider with testimonials', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Testimonials_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Testimonials Slider Item', 'ale' ),
        'base'                    => 'ale_testimonials_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add a Testimonial item for Testimonials Slider', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_testimonials_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Author Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert the testimonial's author name", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Testimonial", "ale" ),
                "param_name"  => "testimonial",
                "value"       => '',
                "description" => esc_html__( "Insert the Testimonial text", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Testimonial Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Generate a link for your testimonial, or let it empty to hide the link.", "ale" )
            ),
        )
    ) );
}




//Pretty Team Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Pretty_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Pretty Team', 'ale' ),
        "base"                    => "ale_pretty_team",
        "as_parent"               => array( 'only' => 'ale_pretty_team_item' ),
        'description'             => esc_html__( 'A Slider with team members', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Default' => 'default',
                    'Prestigio Style' => 'prestigio',
                    'Ospedale Style' => 'ospedale'
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type the title or let it empty", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Pretty_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Pretty Team Item', 'ale' ),
        'base'                    => 'ale_pretty_team_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add a Team Member item for Pretty Team Slider', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_pretty_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Default' => 'default',
                    'Prestigio Style' => 'prestigio',
                    'Ospedale Style' => 'ospedale'
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert the team member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Position", "ale" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert the team member position", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Insert the team member description", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "External or Internal Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Generate a link for your team member, or let it empty to hide the link.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "photo",
                "value"       => '',
                "description" => esc_html__( "Upload aa member photo.", "ale" )
            ),
        )
    ) );
}



//Move Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Move_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Move Slider', 'ale' ),
        "base"                    => "ale_move_slider",
        "as_parent"               => array( 'only' => 'ale_move_slider_item' ),
        'description'             => esc_html__( 'A Slider with move background.', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Move_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Move Slider Item', 'ale' ),
        'base'                    => 'ale_move_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_move_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Pre Title", "ale" ),
                "param_name"  => "slide_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "ale" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "ale" )
            ),
        )
    ) );
}



//Simple Team Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Simple_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Simple Team', 'ale' ),
        "base"                    => "ale_simple_team",
        "as_parent"               => array( 'only' => 'ale_simple_team_item' ),
        'description'             => esc_html__( 'A Slider with team members', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Simple_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Team Item', 'ale' ),
        'base'                    => 'ale_simple_team_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or position', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_simple_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Moka' => 'moka',
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Member Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Position", "ale" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert a member position", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for member, or let it empty.", "ale" )
            ),
        )
    ) );
}


/* Selected Works shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Selected_Works extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Selected Works', 'ale' ),
        'base'                    => 'ale_selected_works',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Display a line with selected works posts', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 5 Work Posts', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('works'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 5 posts or let it empty to load recent work posts.', 'ale' ),
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Taxonomy Navigation", "ale" ),
                "param_name"  => "tax",
                "value"       => array( 'Yes' => 'yes', 'No' => 'no' ),
                "description" => esc_html__( "Select Yes if you want to display the Taxonomy Links", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Taxonomy Navigation", "ale" ),
                "param_name"  => "style",
                "value"       => array( 'Default' => 'default', 'Limpieza Style' => 'limpieza' ),
                "description" => esc_html__( "Select the style", "ale" )
            ),
        )
    ) );
}




/* Scale Image Box shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Scale_Image_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Scale Image Box', 'ale' ),
        'base'                    => 'ale_scale_image_box',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Scale background image and some text', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommendation: Use big images", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 1", "ale" ),
                "param_name"  => "text_one",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 2", "ale" ),
                "param_name"  => "text_two",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Inner Image", "ale" ),
                "param_name"  => "icon",
                "description" => esc_html__( "Select or Upload an image/logo/icon to show into the box.", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link, or let it empty.", "ale" )
            ),
        )
    ) );
}

/* Hover Text shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Hover_Text extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Hover Text', 'ale' ),
        'base'                    => 'ale_hover_text',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Text hovered by an image', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Hover Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommendation: Use big images", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 1", "ale" ),
                "param_name"  => "text_one",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text Field 2", "ale" ),
                "param_name"  => "text_two",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
        )
    ) );
}

/* Service Item Shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Service_Block extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Service Block', 'ale' ),
        'base'                    => 'ale_service_block',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Service Block with image, title and text', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default Style' => 'default',
                    'Keira Style' => 'keira',
                    'Enforcement Price Style' => 'enforcement',
                    'Enforcement Simple Style' => 'enforcement_simple',
                    'Donation Style' => 'donation',
                    'Orquidea Style' => 'orquidea',
                    'Cafeteria Style' => 'cafeteria',
                    'Hai Style' => 'hai',
                    'Kitty Style' => 'kitty',
                    'coSushi Style' => 'cosushi'
                ),
                "description" => esc_html__( "Select the display style.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Descriptions", "ale" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price. For specific styles only.", "ale" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "The price field will work with specific styles. Enforcement for example.", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("enforcement","hai")
                )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button. For Orquidea and Kitty Demo", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("orquidea","kitty")
                )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a subtitle. For Orquidea Demo", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("orquidea")
                )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Close?", "ale" ),
                "param_name"  => "close",
                "value"       => array( 'Closed' => 'close', 'Opened' => 'opened', ),
                "description" => esc_html__( "Closed or Opened? For Orquidea Demo", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("orquidea")
                )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Bar Color", "ale" ),
                "param_name"  => "bar_color",
                "description" => esc_html__( "Select a color. This field is used for Kitty Demo only", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("kitty")
                )
            ),
        )
    ) );
}

//Testimonial Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Simple_Testimonials_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Simple Testimonials Slider', 'ale' ),
        "base"                    => "ale_simple_testimonials_slider",
        "as_parent"               => array( 'only' => 'ale_simple_testimonials_slider_item' ),
        'description'             => esc_html__( 'A Slider with testimonials', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Default' => 'default',
                    'Prestigio Style' => 'prestigio',
                    'Organic Style' => 'organic',
                    'Enforcement Style' => 'enforcement',
                    'Burger Style' => 'burger',
                    'coSushi Style' => 'cosushi',
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Simple_Testimonials_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Simple Testimonials Slider Item', 'ale' ),
        'base'                    => 'ale_simple_testimonials_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or description', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_simple_testimonials_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Default' => 'default',
                    'Prestigio Style' => 'prestigio',
                    'Organic Style' => 'organic',
                    'Enforcement Style' => 'enforcement',
                    'Burger Style' => 'burger',
                    'coSushi Style' => 'cosushi',
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Testimonial Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Author Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Testimonial Text", "ale" ),
                "param_name"  => "testimonial",
                "value"       => '',
                "description" => esc_html__( "Insert a testimonial description", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for testimonial, or let it empty.", "ale" )
            ),
        )
    ) );
}


/* Price Item shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Price_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Price Item', 'ale' ),
        'base'                    => 'ale_price_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Pricing item', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Defaul' => 'default',
                    'Cafeteria Style' => 'cafeteria',
                    'Smoothie Style' => 'smoothie',
                    'Kitty Style' => 'kitty',
                    'coSushi Style' => 'cosushi',
                 ),
                "description" => esc_html__( "Select the layout style.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Pricing Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_images",
                "heading"     => esc_html__( "Slider Images", "ale" ),
                "param_name"  => "images",
                "description" => esc_html__( "Upload some images to show a slider or let it empty.", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("default")
                )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "The Amount (Price)", "ale" ),
                "param_name"  => "amount",
                "value"       => '',
                "description" => esc_html__( "Type the amount", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Badge Image", "ale" ),
                "param_name"  => "badge",
                "description" => esc_html__( "Select or Upload an image. For specific styles (Cafeteria)", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("cafeteria")
                )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Category", "ale" ),
                "param_name"  => "category",
                "value"       => '',
                "description" => esc_html__( "Type some text or let it empty. For specific styles (Cafeteria)", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("cafeteria")
                )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "blockstyle",
                "value"       => array(
                    'Border' => 'border',
                    'Colored' => 'colored',
                 ),
                "description" => esc_html__( "Select the box style.", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("kitty")
                )
            ),
        )
    ) );
}


/* Hover Team shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Hover_Team extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Hover Team', 'ale' ),
        'base'                    => 'ale_hover_team',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Hover Team', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Delizioso' => 'delizioso',
                 ),
                "description" => esc_html__( "Select the box style.", "ale" ),
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text field", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Second Text field", "ale" ),
                "param_name"  => "text2",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Specify a link", "ale" ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("delizioso")
                )
            ),
        )
    ) );
}


/* Works Masonry Grid shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Works_Masonry_Grid extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Works Masonry Grid', 'ale' ),
        'base'                    => 'ale_works_masonry_grid',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Works Masonry Grid', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Items Count", "ale" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Specify the items count or insert '-1' to show all posts.", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Travel Photography' => 'travelphotography',
                    'Viaje Grid' => 'viajegrid',
                    'Furniture Grid' => 'furnituregrid',
                    'Creative Grid' => 'creativegrid',
                    'Brigitte Grid' => 'brigittegrid',
                    'Stephanie Grid' => 'stephaniegrid',
                    'Options Grid' => 'optionsgrid',
                    'Simple Grid' => 'simplegrid',
                    'Cafeteria Grid' => 'cafeteriagrid',
                    'Hai Grid' => 'haigrid' 
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
        )
    ) );
}


/* Video Box shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Video_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Video Box', 'ale' ),
        'base'                    => 'ale_video_box',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'A box with a video in modal window', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Link", "ale" ),
                "param_name"  => "video",
                "value"       => '',
                "description" => esc_html__( "Paste here a video from youtube. ex - https://youtu.be/kct_f6hUPlk", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Video Short Description", "ale" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Specify the short description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Video Thumb", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}




//Testimonial Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Tabs', 'ale' ),
        "base"                    => "ale_tabs",
        "as_parent"               => array( 'only' => 'ale_tabs_item' ),
        'description'             => esc_html__( 'Tabs Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Tabs Item', 'ale' ),
        'base'                    => 'ale_tabs_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a tab', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Tab Name", "ale" ),
                "param_name"  => "tab",
                "value"       => '',
                "description" => esc_html__( "Insert a tab title", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image or let it empty to hide photo.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
        )
    ) );
}



//Centered Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Centered_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Centered Slider', 'ale' ),
        "base"                    => "ale_centered_slider",
        "as_parent"               => array( 'only' => 'ale_centered_slider_item' ),
        'description'             => esc_html__( 'A Slider with centered active slide.', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Donation' => 'donation',
                    'Orquidea' => 'orquidea',
                    'Cafeteria' => 'cafeteria',
                ),
                "description" => esc_html__( "Select the post type.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Centered_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Centered Slider Item', 'ale' ),
        'base'                    => 'ale_centered_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_centered_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Donation' => 'donation',
                    'Orquidea' => 'orquidea',
                    'Cafeteria' => 'cafeteria',
                ),
                "description" => esc_html__( "Select the post type.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "ale" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Descriptions", "ale" ),
                "param_name"  => "slide_desc",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "ale" )
            ),
        )
    ) );
}


//Icon Tabs Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Icon_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Icon Tabs', 'ale' ),
        "base"                    => "ale_icon_tabs",
        "as_parent"               => array( 'only' => 'ale_icon_tabs_item' ),
        'description'             => esc_html__( 'Icon Tabs Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Icon_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Icon Tabs Item', 'ale' ),
        'base'                    => 'ale_icon_tabs_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a tab', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_icon_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Icon Image", "ale" ),
                "param_name"  => "icon",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Hover Tab Icon Image", "ale" ),
                "param_name"  => "hover",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Unique ID", "ale" ),
                "param_name"  => "unique_id",
                "value"       => '',
                "description" => esc_html__( "Specify an unique ID.", "ale" )
            ),
        )
    ) );
}


/* Featured Post shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Featured_Post extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Featured Post', 'ale' ),
        'base'                    => 'ale_featured_post',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Select a post to be featured', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 1 post', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => false,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('post'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 1 posts or let it empty to load recent post.', 'ale' ),
            ),
        )
    ) );
}



//Image with Title Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Image_Title extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Image with Title', 'ale' ),
        "base"                    => "ale_image_title",
        "as_parent"               => array( 'only' => 'ale_image_title_item' ),
        'description'             => esc_html__( 'Image with Title Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Image_Title_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Image Title Item', 'ale' ),
        'base'                    => 'ale_image_title_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Upload an image and specify the title', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_image_title'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Subtitle", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a subtitle", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link or let it empty", "ale" )
            ),
        )
    ) );
}


/* Left Icon Service shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Left_Icon_Service extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Left Icon Service', 'ale' ),
        'base'                    => 'ale_left_icon_service',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Left Icon Service', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an icon image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title field", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description field", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
        )
    ) );
}


/* Pricing Table shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Pricing_Table extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Pricing Table', 'ale' ),
        'base'                    => 'ale_pricing_table',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Pricing Table', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Ospedale' => 'ospedale',
                    'Smoothie' => 'smoothie',
                ),
                "description" => esc_html__( "Select the post type.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Plan Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Currency", "ale" ),
                "param_name"  => "currency",
                "value"       => '',
                "description" => esc_html__( "Type the currency", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price", "ale" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "Type the price", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Period", "ale" ),
                "param_name"  => "preion",
                "value"       => '',
                "description" => esc_html__( "Type the period", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description field", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Type some text", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link or let it empty", "ale" )
            ),
        )
    ) );
}


/* Recent Blog Based on Options settings */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Recent_Blog_Posts extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Blog Posts', 'ale' ),
        'base'                    => 'ale_recent_blog_posts',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Recent Blog Posts', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Posts Count", "ale" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Type the Posts Count", "ale" )
            ),

            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Theme Options Style (uses Blog Styles)' => 'default',
                    'Rosi Style' => 'rosi',
                    'Keira Style' => 'keira',
                    'Exotico Style' => 'exotico',
                    'Prestigio Style' => 'prestigio',
                    'Ospedale Style' => 'ospedale',
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Post type", "ale" ),
                "param_name"  => "posttype",
                "value"       => array(
                    'Posts' => 'post',
                    'Works' => 'works',
                ),
                "description" => esc_html__( "Select the post type.", "ale" )
            ),
        )
    ) );
}



//Works Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Works_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Works Slider', 'ale' ),
        "base"                    => "ale_works_slider",
        "as_parent"               => array( 'only' => 'ale_works_slider_item' ),
        'description'             => esc_html__( 'Slider with images', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Info", "ale" ),
                "param_name"  => "slider_info",
                "value"       => '',
                "description" => esc_html__( "Type the info. (It is displayed in the left part of the slider)", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Pre Title", "ale" ),
                "param_name"  => "slider_pre_title",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slider", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Title", "ale" ),
                "param_name"  => "slider_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slider", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Works_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Works Slider Item', 'ale' ),
        'base'                    => 'ale_works_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Upload images for the slider', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_works_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}



/* Corporate Team shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Corporate_Team extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Corporate Team', 'ale' ),
        'base'                    => 'ale_corporate_team',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'A box with team member', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Rosi Style' => 'rosi',
                    'Enforcement Style' => 'enforcement',
                    'Donation Style' => 'donation',
                    'Orquidea Style' => 'orquidea',
                    'Limpieza Style' => 'limpieza',
                    'Cafeteria Style' => 'cafeteria',
                    'Hai Style' => 'hai',
                    'Smoothie Style' => 'smoothie',
                    'Burger Style' => 'burger',
                    'Laptica Style' => 'laptica',
                    'BeBe Style' => 'bebe'
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Member Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Type the member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Post", "ale" ),
                "param_name"  => "post",
                "value"       => '',
                "description" => esc_html__( "Type the member post", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Description", "ale" ),
                "param_name"  => "desc",
                "value"       => '',
                "description" => esc_html__( "Type the member description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Twitter Link", "ale" ),
                "param_name"  => "tw",
                "value"       => '',
                "description" => esc_html__( "Paste the Twitter link or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Facebook Link", "ale" ),
                "param_name"  => "fb",
                "value"       => '',
                "description" => esc_html__( "Paste the Facebook link or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Google Plus Link", "ale" ),
                "param_name"  => "gl",
                "value"       => '',
                "description" => esc_html__( "Paste the Google Plus link or let it empty", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pinterest Link", "ale" ),
                "param_name"  => "pin",
                "value"       => '',
                "description" => esc_html__( "Paste the Pinterest link or let it empty", "ale" )
            ),

        )
    ) );
}


//TimeLine Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Timeline extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Timeline', 'ale' ),
        "base"                    => "ale_timeline",
        "as_parent"               => array( 'only' => 'ale_timeline_item' ),
        'description'             => esc_html__( 'Timeline Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Donation Style' => 'donation',
                    'Nunta Style' => 'nunta',
                    'Cafeteria Style' => 'cafeteria',
                    'Organic Style' => 'organic'
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Timeline_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Timeline Item', 'ale' ),
        'base'                    => 'ale_timeline_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for timeline item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_timeline'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Display Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Donation Style' => 'donation',
                    'Nunta Style' => 'nunta',
                    'Cafeteria Style' => 'cafeteria',
                    'Organic Style' => 'organic',
                ),
                "description" => esc_html__( "Specify the display style", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Date", "ale" ),
                "param_name"  => "date",
                "value"       => '',
                "description" => esc_html__( "Insert the date", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Text", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload a background image. Dusplays for Specific Styles only. ex: Nunta, Cafeteria", "ale" )
            )
        )
    ) );
}


/* Progress Bar shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Progress_Bar extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Progress Bar', 'ale' ),
        'base'                    => 'ale_progress_bar',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'A progress bar', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default' => 'default',
                    'Line' => 'line',
                    'Orquidea' => 'orquidea'
                ),
                "description" => esc_html__( "Select the block style.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Item Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Item Progress", "ale" ),
                "param_name"  => "progress",
                "value"       => '',
                "description" => esc_html__( "Example: 70%", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Bar Color", "ale" ),
                "param_name"  => "bar_color",
                "description" => esc_html__( "Select a color", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Bar Background Color", "ale" ),
                "param_name"  => "bar_bg_color",
                "description" => esc_html__( "Select a background color", "ale" )
            ),
        )
    ) );
}




//Fashion Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Fashion_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Fashion Slider', 'ale' ),
        "base"                    => "ale_fashion_slider",
        "as_parent"               => array( 'only' => 'ale_fashion_slider_item' ),
        'description'             => esc_html__( 'A Creative Slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Defaul Style' => 'default',
                    'Cafeteria Style' => 'cafeteria'
                ),
                "description" => esc_html__( "Select the layout style.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Fashion_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Fashion Slider Item', 'ale' ),
        'base'                    => 'ale_fashion_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such as images, titles or descriptions', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_fashion_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Defaul Style' => 'default',
                    'Cafeteria Style' => 'cafeteria'
                ),
                "description" => esc_html__( "Select the layout style.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "ale" ),
                "param_name"  => "slide_title",
                "value"       => '',
                "description" => esc_html__( "Insert a title for your Slide", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Sub Title", "ale" ),
                "param_name"  => "slide_subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a subtitle for your Slide", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Descriptions", "ale" ),
                "param_name"  => "slide_desc",
                "value"       => '',
                "description" => esc_html__( "Insert a pre title for your Slide", "ale" )
            ),
        )
    ) );
}





//Stephanie Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Stephanie_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Stephanie Slider', 'ale' ),
        "base"                    => "ale_stephanie_slider",
        "as_parent"               => array( 'only' => 'ale_stephanie_slider_item' ),
        'description'             => esc_html__( 'Stephanie Slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Stephanie_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Stephanie Slider Item', 'ale' ),
        'base'                    => 'ale_stephanie_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each item such images.', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_stephanie_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "slide_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}

/* Recent Post Line shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Recent_Post_Line extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Recent Post Line', 'ale' ),
        'base'                    => 'ale_recent_post_line',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Recent Post Line', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the box title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Specify the box subtitle", "ale" )
            ),
        )
    ) );
}


/* Recent Post Line shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Scroll_Works extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Scroll Works', 'ale' ),
        'base'                    => 'ale_scroll_works',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Scroll Works', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Enforcement Style' => 'enforcement',
                    'Pixel Style' => 'pixel',
                    'BeBe Style' => 'bebe'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Items Count", "ale" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "Specify the count", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Specify the name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" ),
                "dependency" => array(
                    "element" => "grid",
                    "value" => array("enforcement","pixel")
                )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Empty field will disable the link", "ale" ),
                "dependency" => array(
                    "element" => "grid",
                    "value" => array("enforcement","pixel")
                )
            ),
        )
    ) );
}


/* Promo Banner shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Promo_Banner extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Promo Banner', 'ale' ),
        'base'                    => 'ale_promo_banner',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Promo Banner Data', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Type your title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Type your sub title", "ale" )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Background Color", "ale" ),
                "param_name"  => "bg_color",
                "description" => esc_html__( "Select a background color", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "bg_image",
                "description" => esc_html__( "Select or Upload an image for background.", "ale" )
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'ale' ),
                'param_name' => 'icon_fontawesome',
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => esc_html__( 'Select icon from library.', 'ale' ),
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__( "Icon Color", "ale" ),
                "param_name"  => "icon_color",
                "description" => esc_html__( "Specify an icon color", "ale" )
            ),
        )
    ) );
}




/* Creative Title shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Creative_Title extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Creative Title', 'ale' ),
        'base'                    => 'ale_creative_title',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Creative Title Data', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => $ale_fields_creative_title,
    ) );
}


/* Shop Categories shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Shop_Categories extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Shop Categories', 'ale' ),
        'base'                    => 'ale_shop_categories',
        'category'                => esc_html__( 'Ale WC', 'ale' ),
        'description'             => esc_html__( 'Shop Categories', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select 5 WooCommerce Categories', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_taxonomy_data('product_cat'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select 5 categories or let it empty to load recent 5 categories', 'ale' ),
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Rosi Grid' => 'rossigrid'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
        )
    ) );
}



/* Shop Categories shortcode */
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Shop_Products extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Shop Products', 'ale' ),
        'base'                    => 'ale_shop_products',
        'category'                => esc_html__( 'Ale WC', 'ale' ),
        'description'             => esc_html__( 'Products with filter', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select Categories you want to show in Filter Navigation', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_taxonomy_data('product_cat'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select categories or let it empty to load recent 5 categories', 'ale' ),
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Rosi Grid' => 'rossigrid',
                    'Burger Grid' => 'burgergrid'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Products count", "ale" ),
                "param_name"  => "count",
                "value"       => '',
                "description" => esc_html__( "How many products to show in a section?", "ale" )
            ),
        )
    ) );
}




//Steps History Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Steps_History extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Steps History', 'ale' ),
        "base"                    => "ale_steps_history",
        "as_parent"               => array( 'only' => 'ale_steps_history_item' ),
        'description'             => esc_html__( 'A module that shows steps history', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Steps_History_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Steps History Item', 'ale' ),
        'base'                    => 'ale_steps_history_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for each step like image and title', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_steps_history'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Step Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Number", "ale" ),
                "param_name"  => "title_number",
                "value"       => '',
                "description" => esc_html__( "Insert a number", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Empty field will disable the link", "ale" )
            ),
        )
    ) );
}


if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Look_Book extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Look Book', 'ale' ),
        'base'                    => 'ale_look_book',
        'category'                => esc_html__( 'Ale WC', 'ale' ),
        'description'             => esc_html__( 'Show Look Book', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Left' => 'left',
                    'Right' => 'right'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Specify the subtitle", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "content",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Link Anchor", "ale" ),
                "param_name"  => "anchor",
                "value"       => '',
                "description" => esc_html__( "Specify the link anchor", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Main Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommended size (600px-745px)", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Extra Image #1", "ale" ),
                "param_name"  => "imageone",
                "description" => esc_html__( "Select or Upload an image. Recommended size (280px-400px)", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Extra Image #2", "ale" ),
                "param_name"  => "imagetwo",
                "description" => esc_html__( "Select or Upload an image. Recommended size (280px-400px)", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Extra Image #3", "ale" ),
                "param_name"  => "imagethree",
                "description" => esc_html__( "Select or Upload an image. Recommended size (280px-400px)", "ale" )
            ),
        )
    ) );
}




//Steps History Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Promo_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Promo Slider', 'ale' ),
        "base"                    => "ale_promo_slider",
        "as_parent"               => array( 'only' => 'ale_promo_slider_item' ),
        'description'             => esc_html__( 'A module that shows a promo slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Product Image", "ale" ),
                "param_name"  => "product_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Box Background", "ale" ),
                "param_name"  => "bg_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the Title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pre Title", "ale" ),
                "param_name"  => "pretitle",
                "value"       => '',
                "description" => esc_html__( "Specify the Pre Title", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Promo_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Promo Slider Item', 'ale' ),
        'base'                    => 'ale_promo_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add an image for each slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_promo_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}



if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Heading extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Heading', 'ale' ),
        'base'                    => 'ale_heading',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a heading box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "title2",
                "value"       => '',
                "description" => esc_html__( "Specify the title #2", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #3", "ale" ),
                "param_name"  => "title3",
                "value"       => '',
                "description" => esc_html__( "Specify the title #3", "ale" )
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "content",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Link Anchor", "ale" ),
                "param_name"  => "anchor",
                "value"       => '',
                "description" => esc_html__( "Specify the link anchor", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Main Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image. Recommended size (600px-745px)", "ale" )
            ),
        )
    ) );
}




if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Presentation extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Presentation', 'ale' ),
        'base'                    => 'ale_presentation',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a presentation box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "title2",
                "value"       => '',
                "description" => esc_html__( "Specify the title 2", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #3", "ale" ),
                "param_name"  => "title3",
                "value"       => '',
                "description" => esc_html__( "Specify the title 3", "ale" )
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "content",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Main Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "bg_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}




//Extra Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Extra_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Extra Slider', 'ale' ),
        "base"                    => "ale_extra_slider",
        "as_parent"               => array( 'only' => 'ale_extra_slider_item' ),
        'description'             => esc_html__( 'A module that shows an extra slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Box Background", "ale" ),
                "param_name"  => "bg_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Block Image", "ale" ),
                "param_name"  => "image_one",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Extra_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Extra Slider Item', 'ale' ),
        'base'                    => 'ale_extra_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add an image for each slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_extra_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Slide Image", "ale" ),
                "param_name"  => "image_two",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the Title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Specify the Description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Index", "ale" ),
                "param_name"  => "index",
                "value"       => '',
                "description" => esc_html__( "Specify the Index", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slide Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Specify the Sub Title", "ale" )
            ),
        )
    ) );
}




//Years Tabs Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Years_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Years Tabs', 'ale' ),
        "base"                    => "ale_years_tabs",
        "as_parent"               => array( 'only' => 'ale_years_tabs_item' ),
        'description'             => esc_html__( 'Tabs Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Box Background", "ale" ),
                "param_name"  => "bg_image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Years_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Years Tabs Item', 'ale' ),
        'base'                    => 'ale_years_tabs_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a tab', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_years_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Tab Name", "ale" ),
                "param_name"  => "tab",
                "value"       => '',
                "description" => esc_html__( "Insert a tab title", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image or let it empty to hide photo.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Text", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
        )
    ) );
}


//Team Tabs Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Team_Tabs extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Team Tabs', 'ale' ),
        "base"                    => "ale_team_tabs",
        "as_parent"               => array( 'only' => 'ale_team_tabs_item' ),
        'description'             => esc_html__( 'Tabs Container', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Team_Tabs_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Team Tabs Item', 'ale' ),
        'base'                    => 'ale_team_tabs_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a tab', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_team_tabs'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Tab Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image or let it empty to hide photo.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Name", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a member name", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Member Position", "ale" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert a member position", "ale" )
            ),
        )
    ) );
}



if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Three_Steps extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Three Steps', 'ale' ),
        'base'                    => 'ale_three_steps',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a 3 steps box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title1",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "title2",
                "value"       => '',
                "description" => esc_html__( "Specify the title 2", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #3", "ale" ),
                "param_name"  => "title3",
                "value"       => '',
                "description" => esc_html__( "Specify the title 3", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description #1", "ale" ),
                "param_name"  => "text1",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description #2", "ale" ),
                "param_name"  => "text2",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description #3", "ale" ),
                "param_name"  => "text3",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Icon Image #1", "ale" ),
                "param_name"  => "image_one",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Icon Image #2", "ale" ),
                "param_name"  => "image_two",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Icon Image #3", "ale" ),
                "param_name"  => "image_three",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}



if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Subscribe_Container extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Subscribe Container', 'ale' ),
        'base'                    => 'ale_subscribe_container',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a pretty subscribe container', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pre Title", "ale" ),
                "param_name"  => "pretitle",
                "value"       => '',
                "description" => esc_html__( "Specify the pretitle", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description #1", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Shortcode", "ale" ),
                "param_name"  => "subscribe",
                "value"       => '',
                "description" => esc_html__( "Paste the Plugin Shortcode", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Icon", "ale" ),
                "param_name"  => "image_icon",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Box Image", "ale" ),
                "param_name"  => "image_bg",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Box Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}




//Exotico Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Exotico_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Exotico Slider', 'ale' ),
        "base"                    => "ale_exotico_slider",
        "as_parent"               => array( 'only' => 'ale_exotico_slider_item' ),
        'description'             => esc_html__( 'Slider as Exotico Demo', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Slider Item', 'ale' ),
        'base'                    => 'ale_exotico_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_exotico_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Product Photo", "ale" ),
                "param_name"  => "image_product",
                "description" => esc_html__( "Select or Upload an png image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Category", "ale" ),
                "param_name"  => "cat",
                "value"       => '',
                "description" => esc_html__( "Insert a category", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "info",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a sub title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Price", "ale" ),
                "param_name"  => "price",
                "value"       => '',
                "description" => esc_html__( "Insert the product price", "ale" )
            ),
        )
    ) );
}


//Exotico Search Box
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Search_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Search Box', 'ale' ),
        'base'                    => 'ale_search_box',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a search box container', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Style", "ale" ),
                "param_name"  => "style",
                "value"       => array(
                    'Default Style' => 'default',
                    'Hai Style' => 'hai'
                ),
                "description" => esc_html__( "Select the display style.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Specify the title.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pre Title", "ale" ),
                "param_name"  => "pretitle",
                "value"       => '',
                "description" => esc_html__( "Specify the pretitle. For Default Style only", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description #1", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Specify the description. For Default Style only", "ale" )
            ),
        )
    ) );
}



//Exotico Member Box
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_One_Member extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'One Member', 'ale' ),
        'base'                    => 'ale_one_member',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Show a one member box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Specify the name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Position", "ale" ),
                "param_name"  => "post",
                "value"       => '',
                "description" => esc_html__( "Specify the position", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "text",
                "value"       => '',
                "description" => esc_html__( "Specify the description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an png image.", "ale" )
            ),
        )
    ) );
}




if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Product_Carousel extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Products Carousel', 'ale' ),
        'base'                    => 'ale_exotico_product_carousel',
        'category'                => esc_html__( 'Ale WC', 'ale' ),
        'description'             => esc_html__( 'Display products in a carousel slider', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Carousel Title", "ale" ),
                "param_name"  => "title",
                "value"       => 'best offers',
                "description" => esc_html__( "Insert a title for your Product Carousel", "ale" )
            ),
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Products', 'ale' ),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => olins_get_type_posts_data('product'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Enter List of Products', 'ale' ),
            ),
        )
    ) );
}



if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Info extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Info', 'ale' ),
        'base'                    => 'ale_exotico_info',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Display an info box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a sub title", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "link",
                "value"       => '',
                "description" => esc_html__( "Insert a link", "ale" )
            ),
        )
    ) );
}




//Exotico Testimonials
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Exotico_Testimonials extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Exotico Testimonials', 'ale' ),
        "base"                    => "ale_exotico_testimonials",
        "as_parent"               => array( 'only' => 'ale_exotico_testimonials_item' ),
        'description'             => esc_html__( 'Exotico Testimonials', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Testimonials_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Testimonials Item', 'ale' ),
        'base'                    => 'ale_exotico_testimonials_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_exotico_testimonials'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "photo",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Address", "ale" ),
                "param_name"  => "address",
                "value"       => '',
                "description" => esc_html__( "Insert the address", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "info",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sub Title", "ale" ),
                "param_name"  => "subtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a sub title", "ale" )
            ),
        )
    ) );
}



//Exotico Statistics
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Stats extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Stats', 'ale' ),
        'base'                    => 'ale_exotico_stats',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Display an info box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Value #1", "ale" ),
                "param_name"  => "value",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Value #2", "ale" ),
                "param_name"  => "valuetwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
        )
    ) );
}



//Exotico Team Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Exotico_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Exotico Team', 'ale' ),
        "base"                    => "ale_exotico_team",
        "as_parent"               => array( 'only' => 'ale_exotico_team_item' ),
        'description'             => esc_html__( 'Exotico Team', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Exotico_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Exotico Team Item', 'ale' ),
        'base'                    => 'ale_exotico_team_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_exotico_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "First Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Last Name", "ale" ),
                "param_name"  => "lastname",
                "value"       => '',
                "description" => esc_html__( "Insert the lastname", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Position", "ale" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert a position", "ale" )
            ),
        )
    ) );
}



//TaxiPress Team Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Taxipress_Team extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'TaxiPress Team', 'ale' ),
        "base"                    => "ale_taxipress_team",
        "as_parent"               => array( 'only' => 'ale_taxipress_team_item' ),
        'description'             => esc_html__( 'TaxiPress Team', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background", "ale" ),
                "param_name"  => "bg",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "CEO Photo", "ale" ),
                "param_name"  => "ceophoto",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "CEO Name", "ale" ),
                "param_name"  => "ceoname",
                "value"       => '',
                "description" => esc_html__( "Insert a name", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "CEO Position", "ale" ),
                "param_name"  => "ceoposition",
                "value"       => '',
                "description" => esc_html__( "Insert a position", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "CEO Email", "ale" ),
                "param_name"  => "ceoemail",
                "value"       => '',
                "description" => esc_html__( "Insert a email", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "CEO Facebook", "ale" ),
                "param_name"  => "ceofb",
                "value"       => '',
                "description" => esc_html__( "Insert a fb link", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "CEO Twitter", "ale" ),
                "param_name"  => "ceotwi",
                "value"       => '',
                "description" => esc_html__( "Insert a twi link", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Team_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Team Item', 'ale' ),
        'base'                    => 'ale_taxipress_team_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for a slide', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_taxipress_team'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "First Name", "ale" ),
                "param_name"  => "name",
                "value"       => '',
                "description" => esc_html__( "Insert a name", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Position", "ale" ),
                "param_name"  => "position",
                "value"       => '',
                "description" => esc_html__( "Insert a position", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Email", "ale" ),
                "param_name"  => "email",
                "value"       => '',
                "description" => esc_html__( "Insert the email", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Facebook", "ale" ),
                "param_name"  => "fb",
                "value"       => '',
                "description" => esc_html__( "Insert the fb link", "ale" )
            ),
        )
    ) );
}



//TaxiPress Services
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Taxipress_Service extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'TaxiPress Service', 'ale' ),
        "base"                    => "ale_taxipress_service",
        "as_parent"               => array( 'only' => 'ale_taxipress_service_item' ),
        'description'             => esc_html__( 'TaxiPress Services', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Boxed' => 'boxed',
                    'Line' => 'line'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Service_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Service Item', 'ale' ),
        'base'                    => 'ale_taxipress_service_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_taxipress_service'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),

            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => esc_html__( "Grid Layout", "ale" ),
                "param_name"  => "grid",
                "value"       => array(
                    'Boxed' => 'boxed',
                    'Line' => 'line'
                ),
                "description" => esc_html__( "Select the Grid layout style.", "ale" )
            ),
        )
    ) );
}




//TaxiPress Contact
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Contact extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Contact', 'ale' ),
        'base'                    => 'ale_taxipress_contact',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Display a contact box for TaxiPress', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Address Label", "ale" ),
                "param_name"  => "addresslabel",
                "value"       => '',
                "description" => esc_html__( "Insert a label", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Phone Label", "ale" ),
                "param_name"  => "phonelabel",
                "value"       => '',
                "description" => esc_html__( "Insert a label", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Address", "ale" ),
                "param_name"  => "address",
                "value"       => '',
                "description" => esc_html__( "Insert the address", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Phones", "ale" ),
                "param_name"  => "phone",
                "value"       => '',
                "description" => esc_html__( "Insert the phone", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Twitter", "ale" ),
                "param_name"  => "twitter",
                "value"       => '',
                "description" => esc_html__( "Insert the twitter", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Facebook", "ale" ),
                "param_name"  => "facebook",
                "value"       => '',
                "description" => esc_html__( "Insert the facebook", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Youtube", "ale" ),
                "param_name"  => "youtube",
                "value"       => '',
                "description" => esc_html__( "Insert the youtube", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Form Box Title", "ale" ),
                "param_name"  => "formtitle",
                "value"       => '',
                "description" => esc_html__( "Insert the form title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Your Email", "ale" ),
                "param_name"  => "form_email_receive",
                "value"       => '',
                "description" => esc_html__( "Insert email to receive messages", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Emails Subject", "ale" ),
                "param_name"  => "form_email_subject",
                "value"       => '',
                "description" => esc_html__( "Insert subject for messages", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}





//TaxiPress Booking
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Booking extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Booking', 'ale' ),
        'base'                    => 'ale_taxipress_booking',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Booking for TaxiPress Home', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Car Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Form Box Title", "ale" ),
                "param_name"  => "formtitle",
                "value"       => '',
                "description" => esc_html__( "Insert the form title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Your Email", "ale" ),
                "param_name"  => "form_email_receive",
                "value"       => '',
                "description" => esc_html__( "Insert email to receive messages", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Emails Subject", "ale" ),
                "param_name"  => "form_email_subject",
                "value"       => '',
                "description" => esc_html__( "Insert subject for messages", "ale" )
            ),

        )
    ) );
}



//TaxiPress Mobile
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_App extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress App', 'ale' ),
        'base'                    => 'ale_taxipress_app',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'App Presentation for TaxiPress', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #1", "ale" ),
                "param_name"  => "descriptionone",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #2", "ale" ),
                "param_name"  => "descriptiontwo",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #3", "ale" ),
                "param_name"  => "titlethree",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #3", "ale" ),
                "param_name"  => "descriptionthree",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Mobile Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Google Button", "ale" ),
                "param_name"  => "google",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Apple Button", "ale" ),
                "param_name"  => "apple",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Google Link", "ale" ),
                "param_name"  => "googlelink",
                "value"       => '',
                "description" => esc_html__( "Insert the link", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Apple Link", "ale" ),
                "param_name"  => "applelink",
                "value"       => '',
                "description" => esc_html__( "Insert the link", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "boxtitle",
                "value"       => '',
                "description" => esc_html__( "Insert the form title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert email to receive messages", "ale" )
            ),
        )
    ) );
}



//TaxiPress Info
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Info extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Info', 'ale' ),
        'base'                    => 'ale_taxipress_info',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Info box for TaxiPress', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #1", "ale" ),
                "param_name"  => "descriptionone",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon #1", "ale" ),
                "param_name"  => "iconone",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #2", "ale" ),
                "param_name"  => "descriptiontwo",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon #2", "ale" ),
                "param_name"  => "icontwo",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #3", "ale" ),
                "param_name"  => "titlethree",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description #3", "ale" ),
                "param_name"  => "descriptionthree",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon #3", "ale" ),
                "param_name"  => "iconthree",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "boxtitle",
                "value"       => '',
                "description" => esc_html__( "Insert the form title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert email to receive messages", "ale" )
            ),
        )
    ) );
}




//TaxiPress Suggestions
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Suggest extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Suggest', 'ale' ),
        'base'                    => 'ale_taxipress_suggest',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Suggest box for TaxiPress', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Form Background", "ale" ),
                "param_name"  => "formbg",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Your Email", "ale" ),
                "param_name"  => "form_email_receive",
                "value"       => '',
                "description" => esc_html__( "Insert email to receive messages", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Emails Subject", "ale" ),
                "param_name"  => "form_email_subject",
                "value"       => '',
                "description" => esc_html__( "Insert subject for messages", "ale" )
            ),
        )
    ) );
}


//TaxiPress Cars
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Taxipress_Cars extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'TaxiPress Cars', 'ale' ),
        "base"                    => "ale_taxipress_cars",
        "as_parent"               => array( 'only' => 'ale_taxipress_cars_item' ),
        'description'             => esc_html__( 'TaxiPress Cars', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image #1", "ale" ),
                "param_name"  => "imageone",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image #2", "ale" ),
                "param_name"  => "imagetwo",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image #3", "ale" ),
                "param_name"  => "imagethree",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image #4", "ale" ),
                "param_name"  => "imagefour",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),

        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_Cars_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress Cars Item', 'ale' ),
        'base'                    => 'ale_taxipress_cars_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_taxipress_cars'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Photo", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Extra", "ale" ),
                "param_name"  => "extra",
                "value"       => '',
                "description" => esc_html__( "Insert some info", "ale" )
            ),

        )
    ) );
}



//TaxiPress News Box
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Taxipress_News extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'TaxiPress News', 'ale' ),
        'base'                    => 'ale_taxipress_news',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'News box for TaxiPress', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Box Title #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Specials Title", "ale" ),
                "param_name"  => "specialtitle",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Specials Description", "ale" ),
                "param_name"  => "specialdescription",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Specials Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Sales Background", "ale" ),
                "param_name"  => "salesbg",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sale Title", "ale" ),
                "param_name"  => "saletitle",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Sale Value", "ale" ),
                "param_name"  => "salevalue",
                "value"       => '',
                "description" => esc_html__( "Insert the sale value", "ale" )
            ),
        )
    ) );
}


//Prestigio Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Prestigio_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Prestigio Slider', 'ale' ),
        "base"                    => "ale_prestigio_slider",
        "as_parent"               => array( 'only' => 'ale_prestigio_slider_item' ),
        'description'             => esc_html__( 'Prestigio Slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(

            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Top Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Prestigio_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Prestigio Slider Item', 'ale' ),
        'base'                    => 'ale_prestigio_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_prestigio_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert a description", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "ale" )
            ),

        )
    ) );
}



//Prestigio Skills Bar
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Skill_Bar extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Prestigio Skill Bar', 'ale' ),
        'base'                    => 'ale_skill_bar',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Skill Bar for Prestigio Demo', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Skill", "ale" ),
                "param_name"  => "skill",
                "value"       => '',
                "description" => esc_html__( "Insert the skill title", "ale" )
            ),

            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Pregress in %", "ale" ),
                "param_name"  => "progress",
                "value"       => '',
                "description" => esc_html__( "Insert the progress ex: 70%", "ale" )
            ),
        )
    ) );
}



//Ospedale Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Ospedale_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Ospedale Slider', 'ale' ),
        "base"                    => "ale_ospedale_slider",
        "as_parent"               => array( 'only' => 'ale_ospedale_slider_item' ),
        'description'             => esc_html__( 'Ospedale Slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Ospedale_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Ospedale Slider Item', 'ale' ),
        'base'                    => 'ale_ospedale_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_ospedale_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert a title", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button Link", "ale" ),
                "param_name"  => "slide_button_link",
                "value"       => '',
                "description" => esc_html__( "Insert a link for slide button", "ale" )
            ),

        )
    ) );
}



//Ospedale Form
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Find_Doctor extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Ospedale Find Doctor', 'ale' ),
        'base'                    => 'ale_find_doctor',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Find Doctor Box', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Background Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title_one",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "title_two",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #2", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Form Shortcode", "ale" ),
                "param_name"  => "shortcodeform",
                "value"       => '',
                "description" => esc_html__( "Insert the shortcode generated by third part plugin", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #1", "ale" ),
                'param_name'  => 'iconone',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #1", "ale" ),
                "param_name"  => "descriptionone",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #2", "ale" ),
                'param_name'  => 'icontwo',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #2", "ale" ),
                "param_name"  => "descriptiontwo",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #3", "ale" ),
                'param_name'  => 'iconthree',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #3", "ale" ),
                "param_name"  => "titlethree",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #3", "ale" ),
                "param_name"  => "descriptionthree",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #4", "ale" ),
                'param_name'  => 'iconfour',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #4", "ale" ),
                "param_name"  => "titlefour",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #4", "ale" ),
                "param_name"  => "descriptionfour",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
        )
    ) );
}





//Ospedale About Block
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Ospedale_About extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Ospedale About', 'ale' ),
        'base'                    => 'ale_ospedale_about',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'About block for Ospedale', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Left Background", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #1", "ale" ),
                "param_name"  => "title_one",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title #2", "ale" ),
                "param_name"  => "title_two",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #2", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #1", "ale" ),
                'param_name'  => 'iconone',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #1", "ale" ),
                "param_name"  => "titleone",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #1", "ale" ),
                "param_name"  => "descriptionone",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #2", "ale" ),
                'param_name'  => 'icontwo',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #2", "ale" ),
                "param_name"  => "titletwo",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #2", "ale" ),
                "param_name"  => "descriptiontwo",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                'type'        => 'iconpicker',
                'heading'     => esc_html__( "Icon Box #3", "ale" ),
                'param_name'  => 'iconthree',
                'value'       => 'fa fa-home',
                'description' => esc_html__( "Select icon from library.", "ale" ),
                'settings'    => array(
                    'emptyIcon'    => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title Box #3", "ale" ),
                "param_name"  => "titlethree",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description Box #3", "ale" ),
                "param_name"  => "descriptionthree",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            
        )
    ) );
}


//Donate Block
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Donate extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Donate', 'ale' ),
        'base'                    => 'ale_donate',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Donate Block', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Value", "ale" ),
                "param_name"  => "value",
                "value"       => '',
                "description" => esc_html__( "Insert the value", "ale" )
            ),
            array(
                "type"        => "vc_link",
                "heading"     => esc_html__( "Button", "ale" ),
                "param_name"  => "button",
                "value"       => '',
                "description" => esc_html__( "Specify the button", "ale" )
            ),
            
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Progress Bar", "ale" ),
                "param_name"  => "progress",
                "value"       => '',
                "description" => esc_html__( "Specify the progress in %", "ale" )
            ),
        )
    ) );
}

//Donate Item Block
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Donate_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Donate Item', 'ale' ),
        'base'                    => 'ale_donate_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Donate Item Block', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Featured Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Value", "ale" ),
                "param_name"  => "value",
                "value"       => '',
                "description" => esc_html__( "Insert the value in %", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Raised Label", "ale" ),
                "param_name"  => "raisedlabel",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Raised Value", "ale" ),
                "param_name"  => "raisedvalue",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Donors Label", "ale" ),
                "param_name"  => "donorslabel",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Donors Value", "ale" ),
                "param_name"  => "donorsvalue",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Goal Label", "ale" ),
                "param_name"  => "goallabel",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Goal Value", "ale" ),
                "param_name"  => "goalvalue",
                "value"       => '',
                "description" => esc_html__( "Specify the text", "ale" )
            ),
        )
    ) );
}




//Orquidea Opening Hours
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Opening extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Opening Hours', 'ale' ),
        "base"                    => "ale_opening",
        "as_parent"               => array( 'only' => 'ale_opening_item' ),
        'description'             => esc_html__( 'Opening Hours Items', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Opening_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Day Item', 'ale' ),
        'base'                    => 'ale_opening_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_opening'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Day", "ale" ),
                "param_name"  => "day",
                "value"       => '',
                "description" => esc_html__( "Insert the day", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Hours", "ale" ),
                "param_name"  => "hours",
                "value"       => '',
                "description" => esc_html__( "Insert the hours", "ale" )
            ),
            array(
                "type" => "colorpicker",
                "class" => "item_opening_hours_color",
                "heading" => esc_html__( "Item BG", "ale" ),
                "param_name" => "color",
                "value" => '#f597b1', //Default Red color
                "description" => esc_html__( "Choose bg color", "ale" )
            )
        )
    ) );
}




//Wishes Item Block
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Wishes_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Wishes Item', 'ale' ),
        'base'                    => 'ale_wishes_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Wishes Item Block', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Featured Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Short Description", "ale" ),
                "param_name"  => "short",
                "value"       => '',
                "description" => esc_html__( "Insert the shortdescription", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Button Text", "ale" ),
                "param_name"  => "more",
                "value"       => '',
                "description" => esc_html__( "Specify Button text", "ale" )
            ),
            array(
                "type"        => "textarea",
                "heading"     => esc_html__( "Full Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Specify the full text", "ale" )
            ),
        )
    ) );
}



//Nunta Event Slider
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Ale_Event_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => esc_html__( 'Event Slider', 'ale' ),
        "base"                    => "ale_event_slider",
        "as_parent"               => array( 'only' => 'ale_event_slider_item' ),
        'description'             => esc_html__( 'Event Slider', 'ale' ),
        "content_element"         => true,
        "category"                => esc_html__( 'Ale', 'ale' ),
        "icon"                    => 'icon-vc-olins',
        "show_settings_on_create" => false,
        "params"                  => array(),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Event_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Slide', 'ale' ),
        'base'                    => 'ale_event_slider_item',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Add data for an slide item', 'ale' ),
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'ale_event_slider'),
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Image", "ale" ),
                "param_name"  => "image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the title", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Description", "ale" ),
                "param_name"  => "description",
                "value"       => '',
                "description" => esc_html__( "Insert the description", "ale" )
            ),
        )
    ) );
}

//Nunta Wedding Box
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Wedding_Box extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Wedding Box', 'ale' ),
        'base'                    => 'ale_wedding_box',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'A box for Wedding', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Groom Name", "ale" ),
                "param_name"  => "name1",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Groom Text", "ale" ),
                "param_name"  => "text1",
                "value"       => '',
                "description" => esc_html__( "Insert the shortdescription", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Groom Photo", "ale" ),
                "param_name"  => "photo1",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Bride Name", "ale" ),
                "param_name"  => "name2",
                "value"       => '',
                "description" => esc_html__( "Insert the Title #1", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Bride Text", "ale" ),
                "param_name"  => "text2",
                "value"       => '',
                "description" => esc_html__( "Insert the shortdescription", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Bride Photo", "ale" ),
                "param_name"  => "photo2",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Icon 1 Link", "ale" ),
                "param_name"  => "link1",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon 1", "ale" ),
                "param_name"  => "icon1image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Icon 2 Link", "ale" ),
                "param_name"  => "link2",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon 2", "ale" ),
                "param_name"  => "icon2image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Icon 3 Link", "ale" ),
                "param_name"  => "link3",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon 3", "ale" ),
                "param_name"  => "icon3image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Icon 4 Link", "ale" ),
                "param_name"  => "link4",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon 4", "ale" ),
                "param_name"  => "icon4image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Icon 5 Link", "ale" ),
                "param_name"  => "link5",
                "value"       => '',
                "description" => esc_html__( "Specify the link", "ale" )
            ),
            array(
                "type"        => "attach_image",
                "heading"     => esc_html__( "Icon 5", "ale" ),
                "param_name"  => "icon5image",
                "description" => esc_html__( "Select or Upload an image.", "ale" )
            ),
        )
    ) );
}

//Countdown
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Countdown extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Countdown', 'ale' ),
        'base'                    => 'ale_countdown',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Countdown timer', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Year", "ale" ),
                "param_name"  => "year",
                "value"       => '',
                "description" => esc_html__( "Insert the Event Year", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Month", "ale" ),
                "param_name"  => "mont",
                "value"       => '',
                "description" => esc_html__( "Insert the Event Month", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Day", "ale" ),
                "param_name"  => "day",
                "value"       => '',
                "description" => esc_html__( "Insert the Event Day", "ale" )
            ),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Hour", "ale" ),
                "param_name"  => "hour",
                "value"       => '',
                "description" => esc_html__( "Insert the Event Hour", "ale" )
            ),
        )
    ) );
}

//Work Vertical Slider
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Ale_Work_Vertical extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => esc_html__( 'Works Vertical Slider', 'ale' ),
        'base'                    => 'ale_work_vertical',
        'category'                => esc_html__( 'Ale', 'ale' ),
        'description'             => esc_html__( 'Vertical Slider', 'ale' ),
        'show_settings_on_create' => true,
        'icon'                    => 'icon-vc-olins',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => esc_html__( "Slider Title", "ale" ),
                "param_name"  => "title",
                "value"       => '',
                "description" => esc_html__( "Insert the Slider Column Title", "ale" )
            ),
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Select a Category', 'ale' ),
                'param_name' => 'slug',
                'settings' => array(
                    'multiple' => false,
                    'sortable' => true,
                    'unique_values' => true,
                    'values' => ale_vc_slug_get_type_taxonomy_data('work-category'),
                ),
                'save_always' => true,
                'description' => esc_html__( 'Select a category or let it empty to load all', 'ale' ),
            ),
        )
    ) );
}