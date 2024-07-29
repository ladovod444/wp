<?php

/**
 * Get current theme options
 * 
 * @return array
 */
function ale_get_options() {
    $headerfont = array_merge( ale_get_safe_webfonts(), ale_get_google_webfonts() );
    $background_defaults = array(
        'color'           => '',
        'image'           => '',
        'repeat'          => 'repeat',
        'position'        => 'top center',
        'attachment'      => 'scroll',
        'background-size' => 'cover',
    );
    $wrapper_size = array(
        '100'    => esc_html__( 'Flexible 100%', 'ale' ),
        '960'    => esc_html__( 'Boxed 960px', 'ale' ),
        '1024'   => esc_html__( 'Boxed 1024px', 'ale' ),
        'custom' => esc_html__( 'Custom', 'ale' ),
    );
    $design_variant = [];
    $design_variant = array(
        'blackwhite' => esc_html__( 'Default', 'ale' ),
        'pizza'      => esc_html__( 'Pizza', 'ale' ),
        'po'         => esc_html__( 'Po', 'ale' ),
    );
    $customize_header_styles = [];
    $customize_header_styles = [
        'no' => esc_html__( 'No. Use Default Styles', 'ale' ),
    ];
    $yes_no = array(
        'no'  => esc_html__( 'No. Use Default Styles', 'ale' ),
        'yes' => esc_html__( 'Yes, Overwrite with Custom', 'ale' ),
    );
    $show_hide = array(
        'hide' => esc_html__( 'Hide', 'ale' ),
        'show' => esc_html__( 'Show', 'ale' ),
    );
    $date_position = array(
        'onimage'     => esc_html__( 'On Featured Image', 'ale' ),
        'infoline'    => esc_html__( 'Blog Info Line', 'ale' ),
        'beforetitle' => esc_html__( 'Before Title', 'ale' ),
    );
    $postline_position = array(
        'beforetitle'  => esc_html__( 'Before Post Title', 'ale' ),
        'aftertitle'   => esc_html__( 'After Post Title', 'ale' ),
        'aftercontent' => esc_html__( 'After Post Description', 'ale' ),
        'disable'      => esc_html__( 'Disable Post Line', 'ale' ),
    );
    $archive_columns = array(
        '1' => esc_html__( 'One Column', 'ale' ),
        '2' => esc_html__( 'Two Columns', 'ale' ),
        '3' => esc_html__( 'Three Columns', 'ale' ),
        '4' => esc_html__( 'Four Columns', 'ale' ),
        '5' => esc_html__( 'Five Columns', 'ale' ),
    );
    $archive_text_align = array(
        'left'    => esc_html__( 'Left Align', 'ale' ),
        'center'  => esc_html__( 'Center Align', 'ale' ),
        'right'   => esc_html__( 'Right Align', 'ale' ),
        'justify' => esc_html__( 'Justify', 'ale' ),
    );
    $archive_pagination = array(
        'pagination' => esc_html__( 'Pagination', 'ale' ),
        'loadmore'   => esc_html__( 'Load More Button', 'ale' ),
        'infinite'   => esc_html__( 'Infinite Scroll', 'ale' ),
        'simple'     => esc_html__( 'Simple pagination', 'ale' ),
    );
    $archive_sidebar = array(
        'no'           => esc_html__( 'No Sideabar', 'ale' ),
        'left_third'   => esc_html__( '1/3 Left', 'ale' ),
        'left_fourth'  => esc_html__( '1/4 Left', 'ale' ),
        'right_third'  => esc_html__( '1/3 Right', 'ale' ),
        'right_fourth' => esc_html__( '1/4 Right', 'ale' ),
    );
    $footer_variant = array(
        'default' => esc_html__( 'Default Footer', 'ale' ),
        'widget'  => esc_html__( 'Widget Footer', 'ale' ),
    );
    $page_heading = [];
    $page_heading = [
        'default' => esc_html__( 'Default Heading. Styled for selected Design.', 'ale' ),
    ];
    $blog_grid = [];
    $blog_grid = [
        'default' => esc_html__( 'Default Grid. Styled for selected Design.', 'ale' ),
        'masonry' => esc_html__( 'Custom Masonry Grid', 'ale' ),
    ];
    $woo_grid = [];
    $woo_grid = [
        'default' => esc_html__( 'Default. Styled for selected Design.', 'ale' ),
    ];
    $menu_styles = array(
        'color'      => '',
        'image'      => '',
        'width'      => '',
        'height'     => '',
        'text-color' => '',
        'text-align' => '',
    );
    $imagepath = ALETHEME_URL . '/assets/images/';
    $options = array();
    $options[] = array(
        "name" => esc_html__( "Brand", "ale" ),
        "tab"  => "ale-brand",
        "type" => "heading",
        "icon" => "fa-desktop",
    );
    $options[] = array(
        "name" => esc_html__( "Site Logo", "ale" ),
        "desc" => esc_html__( "Upload or put the site logo link.", "ale" ),
        "id"   => "ale_sitelogo",
        "std"  => "",
        "type" => "upload",
    );
    $options[] = array(
        "name" => esc_html__( "Site Logo Retina", "ale" ),
        "desc" => esc_html__( "Upload or put the site logo link forretina devices. 2X.", "ale" ),
        "id"   => "ale_sitelogoretina",
        "std"  => "",
        "type" => "upload",
    );
    $options[] = array(
        "name"    => esc_html__( "Footer Logo", "ale" ),
        "desc"    => esc_html__( "Upload or put the footer logo link.", "ale" ),
        "id"      => "ale_footerlogo",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('delizioso')),
    );
    $options[] = array(
        "name"    => esc_html__( "Footer Logo Retina", "ale" ),
        "desc"    => esc_html__( "Upload or put the footer logo link.", "ale" ),
        "id"      => "ale_footerlogoretina",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('delizioso')),
    );
    $options[] = array(
        "name" => esc_html__( "Style", "ale" ),
        "tab"  => "ale-style",
        "type" => "heading",
        "icon" => "fa-window-restore",
    );
    $options[] = array(
        "name"    => esc_html__( "Design", "ale" ),
        "desc"    => esc_html__( "Specify the design. Each Design variant will load the own overall style, the header and the footer are hardcoded and are unique for specific variant.", "ale" ),
        "id"      => "ale_design_variant",
        "std"     => "blackwhite",
        "type"    => "select",
        "options" => $design_variant,
    );
    $options[] = array(
        "name"    => esc_html__( "Page Wrapper", "ale" ),
        "desc"    => esc_html__( "Specify the wrapper width. If you selected the Custom Wrapper, make sure you added the custom value in the field below.", "ale" ),
        "id"      => "ale_wrapper_width",
        "std"     => "",
        "type"    => "select",
        "options" => $wrapper_size,
    );
    $options[] = array(
        "name" => esc_html__( "Custom Page Wrapper", "ale" ),
        "desc" => esc_html__( "If you need a custom Wrapper width, add your value in that field. ex: 900px or 90%. Also make sure the previous field is selected Custom", "ale" ),
        "id"   => "ale_custom_wrapper",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name" => esc_html__( "Inner Wrapper/Content Wrapper", "ale" ),
        "desc" => esc_html__( "Specify the inner wrapper if it should be different then the default wrapper. Let the field empty to be equal to the default wrapper. Use \"px\" or \"%\".", "ale" ),
        "id"   => "ale_inner_wrapper",
        "std"  => "1000px",
        "type" => "text",
    );
    $options[] = array(
        'name' => esc_html__( "Manage Background", "ale" ),
        'desc' => esc_html__( "Select the background color, or upload a custom background image. Default background is the #f5f5f5 color", "ale" ),
        'id'   => 'ale_background',
        'std'  => $background_defaults,
        'type' => 'background',
    );
    $options[] = array(
        "name"    => esc_html__( "Site Pre Loader", "ale" ),
        "desc"    => esc_html__( "Enable or Disable the site preloader", "ale" ),
        "id"      => "ale_preloder",
        "std"     => "disable",
        "type"    => "select",
        "options" => array(
            'disable' => esc_html__( 'Disable', 'ale' ),
            'enable'  => esc_html__( 'Enable', 'ale' ),
        ),
    );
    $options[] = array(
        "name"       => esc_html__( "Pre loader Animation", "ale" ),
        "desc"       => esc_html__( "Select Pre Loader animation", "ale" ),
        "id"         => "ale_preloder_style",
        "std"        => "1",
        "type"       => "select",
        "options"    => array(
            '1'  => esc_html__( 'Rotating Plane', 'ale' ),
            '2'  => esc_html__( 'Double Bounce', 'ale' ),
            '3'  => esc_html__( 'Wave', 'ale' ),
            '4'  => esc_html__( 'Wandering Cubes', 'ale' ),
            '5'  => esc_html__( 'Spinner', 'ale' ),
            '6'  => esc_html__( 'Chasing Dots', 'ale' ),
            '7'  => esc_html__( 'Three Bounce', 'ale' ),
            '8'  => esc_html__( 'Circle', 'ale' ),
            '9'  => esc_html__( 'Cube Grid', 'ale' ),
            '10' => esc_html__( 'Fading Circle', 'ale' ),
            '11' => esc_html__( 'Folding Cube', 'ale' ),
            '12' => esc_html__( 'Loader', 'ale' ),
            '13' => esc_html__( 'Hand', 'ale' ),
            '14' => esc_html__( 'Mimi: Rotating Planet', 'ale' ),
        ),
        "dependency" => array("ale_preloder", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Background color", "ale" ),
        "desc"       => esc_html__( "Select a background color for Pre loader", "ale" ),
        "id"         => "ale_loader_bg",
        "std"        => "",
        "type"       => "color",
        "dependency" => array("ale_preloder", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Animation color", "ale" ),
        "desc"       => esc_html__( "Select a color for Animation", "ale" ),
        "id"         => "ale_loader_animation",
        "std"        => "",
        "type"       => "color",
        "dependency" => array("ale_preloder", "enable"),
    );
    $options[] = array(
        "name" => esc_html__( "Header Settings", "ale" ),
        "tab"  => "ale-header-settings",
        "type" => "heading",
        "icon" => "fa-code",
    );
    $options[] = array(
        "name"       => esc_html__( "Home Slider Shortcode", "ale" ),
        "desc"       => esc_html__( "Insert the revolution slider shortcode.", "ale" ),
        "id"         => "ale_delizioso_slider",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "delizioso"),
    );
    $options[] = array(
        'name'       => esc_html__( "Fields for Burger Variant", "ale" ),
        'desc'       => esc_html__( "These fields works with Burger Design variat.", "ale" ),
        'id'         => 'ale_burgerheader',
        'std'        => "",
        'type'       => 'info',
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Online Order Button Text", "ale" ),
        "desc"       => esc_html__( "Insert the text", "ale" ),
        "id"         => "ale_burger_order_text",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Online Order Button Link", "ale" ),
        "desc"       => esc_html__( "Insert the link", "ale" ),
        "id"         => "ale_burger_order_link",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"    => esc_html__( "Overwrite Header Styles", "ale" ),
        "desc"    => esc_html__( "Select Yes if you want to customize the header styles like, bg color, navigation items sizes etc...", "ale" ),
        "id"      => "ale_header_custom_styles",
        "std"     => "no",
        "type"    => "select",
        "options" => $customize_header_styles,
    );
    $options[] = array(
        'name'       => esc_html__( "Styles for the Header", "ale" ),
        'desc'       => esc_html__( "Fill all fields to create a custom Header Style. Let the fields empty to use the default styles.", "ale" ),
        'id'         => 'ale_header_styles',
        'std'        => $menu_styles,
        'type'       => 'header_styles',
        "dependency" => array("ale_header_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "1st Level Menu Style", "ale" ),
        'desc'       => esc_html__( "Change the 1st Level Menu Style", "ale" ),
        'id'         => 'ale_menu_first_level',
        'std'        => array(
            'size'       => '18px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => 'normal',
            'padding'    => '10px',
            'color'      => '#111111',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_header_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "2st Level Menu Style", "ale" ),
        'desc'       => esc_html__( "Change the 2st Level Menu Style", "ale" ),
        'id'         => 'ale_menu_second_level',
        'std'        => array(
            'size'       => '18px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => 'normal',
            'color'      => '#111111',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_header_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "3st Level Menu Style", "ale" ),
        'desc'       => esc_html__( "Change the 3st Level Menu Style", "ale" ),
        'id'         => 'ale_menu_third_level',
        'std'        => array(
            'size'       => '18px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => 'normal',
            'color'      => '#111111',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_header_custom_styles", "yes"),
    );
    $options[] = array(
        "name" => esc_html__( "Footer Options", "ale" ),
        "tab"  => "ale-footer-settings",
        "type" => "heading",
        "icon" => "fa-copyright",
    );
    $options[] = array(
        "name"    => esc_html__( "Footer Type", "ale" ),
        "desc"    => esc_html__( "Specify the footer type/style.", "ale" ),
        "id"      => "ale_footer_variant",
        "std"     => "default",
        "type"    => "select",
        "options" => $footer_variant,
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #1 Title", "ale" ),
        "desc"       => esc_html__( "Insert the title", "ale" ),
        "id"         => "ale_footer_burger_col1_tit",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #1 Content", "ale" ),
        "desc"       => esc_html__( "Insert the content", "ale" ),
        "id"         => "ale_footer_burger_col1_content",
        "std"        => "",
        "type"       => "textarea",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #2 Title", "ale" ),
        "desc"       => esc_html__( "Insert the title", "ale" ),
        "id"         => "ale_footer_burger_col2_tit",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #2 Content", "ale" ),
        "desc"       => esc_html__( "Insert the content", "ale" ),
        "id"         => "ale_footer_burger_col2_content",
        "std"        => "",
        "type"       => "textarea",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #3 Title", "ale" ),
        "desc"       => esc_html__( "Insert the title", "ale" ),
        "id"         => "ale_footer_burger_col3_tit",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #3 Content", "ale" ),
        "desc"       => esc_html__( "Insert the content", "ale" ),
        "id"         => "ale_footer_burger_col3_content",
        "std"        => "",
        "type"       => "textarea",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #4 Title", "ale" ),
        "desc"       => esc_html__( "Insert the title", "ale" ),
        "id"         => "ale_footer_burger_col4_tit",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Widget #4 Content", "ale" ),
        "desc"       => esc_html__( "Insert the content", "ale" ),
        "id"         => "ale_footer_burger_col4_content",
        "std"        => "",
        "type"       => "textarea",
        "dependency" => array("ale_design_variant", "burger"),
    );
    $options[] = array(
        "name"       => esc_html__( "Footer Call Number", "ale" ),
        "desc"       => esc_html__( "Insert the call number", "ale" ),
        "id"         => "ale_footer_callnumber",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_footer_variant", "default"),
        "hidefor"    => array("ale_design_variant", array(
            'burger',
            'laptica',
            'cosushi',
            'po'
        )),
    );
    $options[] = array(
        "name"       => esc_html__( "Footer Email Address", "ale" ),
        "desc"       => esc_html__( "Insert the Email Address.", "ale" ),
        "id"         => "ale_footer_email_address",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_footer_variant", "default"),
        "hidefor"    => array("ale_design_variant", array('burger', 'laptica', 'po')),
    );
    $options[] = array(
        "name"       => esc_html__( "Your Address", "ale" ),
        "desc"       => esc_html__( "Insert the Address.", "ale" ),
        "id"         => "ale_footer_address",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_footer_variant", "default"),
        "hidefor"    => array("ale_design_variant", array('burger', 'laptica', 'po')),
    );
    $options[] = array(
        "name"       => esc_html__( "Footer Info", "ale" ),
        "desc"       => esc_html__( "Insert the footer info text", "ale" ),
        "id"         => "ale_footer_info",
        "std"        => "",
        "type"       => "editor",
        "dependency" => array("ale_design_variant", "mimi"),
    );
    $options[] = array(
        "name"       => esc_html__( "Footer Openning Hours", "ale" ),
        "desc"       => esc_html__( "Insert the Openning Hours text", "ale" ),
        "id"         => "ale_footer_openning_info",
        "std"        => "",
        "type"       => "editor",
        "dependency" => array("ale_design_variant", "mimi"),
    );
    $options[] = array(
        "name"    => esc_html__( "Copyrights", "ale" ),
        "desc"    => esc_html__( "Insert the Copyrights text", "ale" ),
        "id"      => "ale_copyrights",
        "std"     => "",
        "type"    => "editor",
        "hidefor" => array("ale_design_variant", array('burger', 'po')),
    );
    $options[] = array(
        "name"    => esc_html__( "Footer Background", "ale" ),
        "desc"    => esc_html__( "Upload or put the image link. Used on specific style variants.", "ale" ),
        "id"      => "ale_footerbg",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array(
            'bebe',
            'mimi',
            'po',
            'pizza'
        )),
    );
    $options[] = array(
        "name" => esc_html__( "Page Heading", "ale" ),
        "tab"  => "ale-page-heading",
        "type" => "heading",
        "icon" => "fa-header",
    );
    $options[] = array(
        "name"    => esc_html__( "Page Heading Style", "ale" ),
        "desc"    => esc_html__( "Select a style for page heading. NOTE: Specific Heading was designed and hard coded for a specific demo variant. So after you installed a demo example, do not change this field. It will broke the layout.", "ale" ),
        "id"      => "ale_page_heading_style",
        "std"     => "parallax_one",
        "type"    => "select",
        "options" => $page_heading,
    );
    $options[] = array(
        "name"    => esc_html__( "Archive Pages Title Background", "ale" ),
        "desc"    => esc_html__( "Upload or put the image link. Necessary size: 1800px-590px", "ale" ),
        "id"      => "ale_archivetitlebg",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('mimi', 'po')),
    );
    $options[] = array(
        "name" => esc_html__( "Blog Archive Page Title", "ale" ),
        "desc" => esc_html__( "Specify the title for Blog archive page", "ale" ),
        "id"   => "ale_archiveblogtitle",
        "std"  => "our blog posts",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Blog Archive Page Pre Title", "ale" ),
        "desc"    => esc_html__( "Specify the pre title for Blog archive page", "ale" ),
        "id"      => "ale_archiveblogpretitle",
        "std"     => "take a look at",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('mimi', 'po')),
    );
    $options[] = array(
        "name" => esc_html__( "Typography", "ale" ),
        "tab"  => "ale-typography",
        "type" => "heading",
        "icon" => "fa-font",
    );
    $options[] = array(
        "name"    => esc_html__( "Select the First Font from Google Library", "ale" ),
        "desc"    => esc_html__( "Example: Raleway", "ale" ),
        "id"      => "ale_font_one",
        "std"     => "Raleway",
        "type"    => "select",
        "options" => $headerfont,
    );
    $options[] = array(
        "name" => esc_html__( "Select the First Font Properties from Google Library", "ale" ),
        "desc" => esc_html__( "Example: 400;600;800;900", "ale" ),
        "id"   => "ale_font_one_ex",
        "std"  => "400;600;800;900",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Select the Second Font from Google Library", "ale" ),
        "desc"    => esc_html__( "Example: Playfair Display", "ale" ),
        "id"      => "ale_font_two",
        "std"     => "Playfair+Display",
        "type"    => "select",
        "options" => $headerfont,
    );
    $options[] = array(
        "name" => esc_html__( "Select the Second Font Properties from Google Library", "ale" ),
        "desc" => esc_html__( "Example: 400", "ale" ),
        "id"   => "ale_font_two_ex",
        "std"  => "400",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Select the Third Font from Google Library", "ale" ),
        "desc"    => esc_html__( "Example: Alura", "ale" ),
        "id"      => "ale_font_three",
        "std"     => "Allura",
        "type"    => "select",
        "options" => $headerfont,
        "hidefor" => array("ale_design_variant", array('mimi', 'cafeteria', 'po')),
    );
    $options[] = array(
        "name"    => esc_html__( "Select the Third Font Properties from Google Library", "ale" ),
        "desc"    => esc_html__( "Example: 400", "ale" ),
        "id"      => "ale_font_three_ex",
        "std"     => "400",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('mimi', 'cafeteria', 'po')),
    );
    $options[] = array(
        'name' => esc_html__( "H1 Style", "ale" ),
        'desc' => esc_html__( "Change the h1 style", "ale" ),
        'id'   => 'ale_h1sty',
        'std'  => array(
            'size'       => '32px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "H2 Style", "ale" ),
        'desc' => esc_html__( "Change the h2 style", "ale" ),
        'id'   => 'ale_h2sty',
        'std'  => array(
            'size'       => '28px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "H3 Style", "ale" ),
        'desc' => esc_html__( "Change the h3 style", "ale" ),
        'id'   => 'ale_h3sty',
        'std'  => array(
            'size'       => '24px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "H4 Style", "ale" ),
        'desc' => esc_html__( "Change the h4 style", "ale" ),
        'id'   => 'ale_h4sty',
        'std'  => array(
            'size'       => '20px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "H5 Style", "ale" ),
        'desc' => esc_html__( "Change the h5 style", "ale" ),
        'id'   => 'ale_h5sty',
        'std'  => array(
            'size'       => '16px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "H6 Style", "ale" ),
        'desc' => esc_html__( "Change the h6 style", "ale" ),
        'id'   => 'ale_h6sty',
        'std'  => array(
            'size'       => '14px',
            'face'       => 'Raleway',
            'style'      => 'italic',
            'transform'  => 'none',
            'weight'     => '900',
            'lineheight' => 'normal',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        'name' => esc_html__( "Body Style", "ale" ),
        'desc' => esc_html__( "Change the body font style", "ale" ),
        'id'   => 'ale_bodystyle',
        'std'  => array(
            'size'       => '14px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => '24px',
            'color'      => '#898989',
        ),
        'type' => 'typography',
    );
    $options[] = array(
        "name" => esc_html__( "Social Profiles & Share", "ale" ),
        "tab"  => "ale-social-profile",
        "type" => "heading",
        "icon" => "fa-address-book",
    );
    $options[] = array(
        "name" => esc_html__( "Twitter", "ale" ),
        "desc" => esc_html__( "Your twitter profile URL.", "ale" ),
        "id"   => "ale_twi",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name" => esc_html__( "Facebook", "ale" ),
        "desc" => esc_html__( "Your facebook profile URL.", "ale" ),
        "id"   => "ale_fb",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name" => esc_html__( "Youtube", "ale" ),
        "desc" => esc_html__( "Your youtube profile URL.", "ale" ),
        "id"   => "ale_you",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "LinkedIn", "ale" ),
        "desc"    => esc_html__( "Your LinkedIn profile URL.", "ale" ),
        "id"      => "ale_lin",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('bebe')),
    );
    $options[] = array(
        "name" => esc_html__( "Pinterest", "ale" ),
        "desc" => esc_html__( "Your Pinterest profile URL.", "ale" ),
        "id"   => "ale_pin",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Google Plus+", "ale" ),
        "desc"    => esc_html__( "Your Google Plus+ profile URL.", "ale" ),
        "id"      => "ale_gpl",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('bebe')),
    );
    $options[] = array(
        "name"    => esc_html__( "Tumblr", "ale" ),
        "desc"    => esc_html__( "Your Tumblr profile URL.", "ale" ),
        "id"      => "ale_tum",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('bebe')),
    );
    $options[] = array(
        "name" => esc_html__( "Instagram", "ale" ),
        "desc" => esc_html__( "Your Instagram profile URL.", "ale" ),
        "id"   => "ale_insta",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Reddit", "ale" ),
        "desc"    => esc_html__( "Your Reddit profile URL.", "ale" ),
        "id"      => "ale_red",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('bebe')),
    );
    $options[] = array(
        "name"    => esc_html__( "VK", "ale" ),
        "desc"    => esc_html__( "Your VK profile URL.", "ale" ),
        "id"      => "ale_vk",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('bebe')),
    );
    $options[] = array(
        "name"    => esc_html__( "Share Platforms", "ale" ),
        "desc"    => esc_html__( "Check the platforms you want to use for social share", "ale" ),
        "id"      => "ale_share_platforms",
        "std"     => array(
            'fb'    => '1',
            'twi'   => '1',
            'goglp' => '1',
        ),
        "type"    => "multicheck",
        "options" => array(
            'fb'    => 'Facebook',
            'twi'   => 'Twitter',
            'goglp' => 'Google +',
            'lin'   => 'Linkedin',
            'red'   => 'Reddit',
            'pin'   => 'Pinterest',
            'vk'    => 'Vkontakte',
        ),
    );
    $options[] = array(
        "name" => esc_html__( "Instagram Settings", "ale" ),
        "tab"  => "ale-instagram",
        "type" => "heading",
        "icon" => "fa-instagram",
    );
    $options[] = array(
        "name"    => esc_html__( "Enable Instagram Feed", "ale" ),
        "desc"    => esc_html__( "Enable to show the recent images from instagram on the footer. Note: It will show the module only on design variants that support the instagram feed in footer. You can check the demo examples to view the list.", "ale" ),
        "id"      => "ale_instagram_feed_footer",
        "std"     => "disable",
        "type"    => "select",
        "options" => array(
            'enable'  => esc_html__( 'Enable Instagram on Footers that supports', 'ale' ),
            'disable' => esc_html__( 'Disable Instagram Feed', 'ale' ),
        ),
    );
    $options[] = array(
        "name"       => esc_html__( "Instagram Login", "ale" ),
        "desc"       => esc_html__( "Insert your instagram login", "ale" ),
        "id"         => "ale_instagram_login",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Instagram User ID", "ale" ),
        "desc"       => esc_html__( "Insert your instagram user ID - You can get it https://commentpicker.com/instagram-user-id.php", "ale" ),
        "id"         => "ale_instagram_userid",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Access Token", "ale" ),
        "desc"       => esc_html__( "Insert your Instagram Access Token. If you don't know how to generate an access token you can take a look at our video tutorial. The link is under this comment.", "ale" ),
        "id"         => "ale_instagram_token",
        "tutorial"   => "https://www.youtube.com/watch?v=N-nAzuqvePo",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Images Count", "ale" ),
        "desc"       => esc_html__( "How many images to show?", "ale" ),
        "id"         => "ale_instagram_count",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Images Size", "ale" ),
        "desc"       => esc_html__( "Specify the images Thumb.", "ale" ),
        "id"         => "ale_instagram_thumb",
        "std"        => "standard_resolution",
        "type"       => "select",
        "options"    => array(
            'standard_resolution' => esc_html__( 'Standard Resolution', 'ale' ),
            'low_resolution'      => esc_html__( 'Low Resolution', 'ale' ),
            'thumbnail'           => esc_html__( 'Thumbnail', 'ale' ),
        ),
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Instagram Feed Shortcode", "ale" ),
        "desc"       => esc_html__( "In case you don't have an access token, you can install any feed plugin that shows latest photos from instagram, and paste the shortcode into this field. It will be displayed in the footer, instead of default instagram feed. Ignore the fields above if you post a shortcode from a third part plugin.", "ale" ),
        "id"         => "ale_instagram_shortcode",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Instagram Section Title", "ale" ),
        "desc"       => esc_html__( "Type here a title for section", "ale" ),
        "id"         => "ale_instagram_block_title",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name"       => esc_html__( "Instagram Section Description", "ale" ),
        "desc"       => esc_html__( "Type here a description for section", "ale" ),
        "id"         => "ale_instagram_block_description",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_instagram_feed_footer", "enable"),
    );
    $options[] = array(
        "name" => esc_html__( "Blog Settings", "ale" ),
        "tab"  => "ale-blog-settings",
        "type" => "heading",
        "icon" => "fa-newspaper-o",
    );
    $options[] = array(
        "name"    => esc_html__( "Blog Grid Layout", "ale" ),
        "desc"    => esc_html__( "Specify the Grid Layout.", "ale" ),
        "id"      => "ale_blog_grid_layout",
        "std"     => "masonry",
        "type"    => "select",
        "options" => $blog_grid,
    );
    $options[] = array(
        "name"    => esc_html__( "Columns Count", "ale" ),
        "desc"    => esc_html__( "Select the columns count for the Blog Archives pages. Works for grids, that support columns.", "ale" ),
        "id"      => "ale_default_blog_columns",
        "std"     => "3",
        "type"    => "select",
        "options" => $archive_columns,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Text Align", "ale" ),
        "desc"    => esc_html__( "Setup the Text Align into Blog items", "ale" ),
        "id"      => "ale_default_blog_text_align",
        "std"     => "center",
        "type"    => "select",
        "options" => $archive_text_align,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Pagination Settings", "ale" ),
        "desc"    => esc_html__( "Select the Pagination Type for Blog Archives", "ale" ),
        "id"      => "ale_default_blog_pagination",
        "std"     => "pagination",
        "type"    => "select",
        "options" => $archive_pagination,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Sidebar Settings", "ale" ),
        "desc"    => esc_html__( "Select a sidebar position for Blog Archives", "ale" ),
        "id"      => "ale_blog_sidebar_position",
        "std"     => "no",
        "type"    => "select",
        "options" => $archive_sidebar,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Share Icons", "ale" ),
        "desc"    => esc_html__( "Show or Hide Share Icons?", "ale" ),
        "id"      => "ale_blog_share_icons",
        "std"     => "show",
        "type"    => "select",
        "options" => $show_hide,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Number of Words in Description", "ale" ),
        "desc"    => esc_html__( "Specify the Number of Words for Description blog per post.", "ale" ),
        "id"      => "ale_custom_blog_excerpt_count",
        "std"     => "20",
        "type"    => "text",
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Date Position", "ale" ),
        "desc"    => esc_html__( "Select the date position.", "ale" ),
        "id"      => "ale_blog_custom_date_position",
        "std"     => "onimage",
        "type"    => "select",
        "options" => $date_position,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Blog Info Line Position", "ale" ),
        "desc"    => esc_html__( "Select the post info line position.", "ale" ),
        "id"      => "ale_blog_custom_postline_position",
        "std"     => "beforetitle",
        "type"    => "select",
        "options" => $postline_position,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Show Category?", "ale" ),
        "desc"    => esc_html__( "Show or Hide post Category?", "ale" ),
        "id"      => "ale_blog_show_category",
        "std"     => "show",
        "type"    => "select",
        "options" => $show_hide,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Show post Author?", "ale" ),
        "desc"    => esc_html__( "Show or Hide post Author?", "ale" ),
        "id"      => "ale_blog_show_author",
        "std"     => "hide",
        "type"    => "select",
        "options" => $show_hide,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Show Comments count?", "ale" ),
        "desc"    => esc_html__( "Show or Hide comments count?", "ale" ),
        "id"      => "ale_blog_show_comments",
        "std"     => "hide",
        "type"    => "select",
        "options" => $show_hide,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        'name'    => esc_html__( "Overwrite Default Blog Styles", "ale" ),
        'desc'    => esc_html__( "The fields bellow are for custom styles. You can select the overwrite option and insert custom values to change the blog style.", "ale" ),
        'id'      => 'ale_overwritebloginfo',
        'std'     => "",
        'type'    => 'info',
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        "name"    => esc_html__( "Overwrite Blog Styles", "ale" ),
        "desc"    => esc_html__( "Select Yes if you want to customize the elements like title, image, social icons, etc...", "ale" ),
        "id"      => "ale_blog_custom_styles",
        "std"     => "no",
        "type"    => "select",
        "options" => $yes_no,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        'name'       => esc_html__( "Title Typography", "ale" ),
        'desc'       => esc_html__( "Change the Typography for block title", "ale" ),
        'id'         => 'ale_custom_blog_title',
        'std'        => array(
            'size'       => '16px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '600',
            'lineheight' => 'normal',
            'color'      => '#000000',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Title Margins", "ale" ),
        "desc"       => esc_html__( "Specify the margin value for block title.", "ale" ),
        "id"         => "ale_custom_blog_title_margin",
        "std"        => "0 0 25px 0",
        "type"       => "text",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "Description Typography", "ale" ),
        'desc'       => esc_html__( "Change the Typography for block description", "ale" ),
        'id'         => 'ale_custom_blog_desc',
        'std'        => array(
            'size'       => '14px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => '24px',
            'color'      => '#898989',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Description Margins", "ale" ),
        "desc"       => esc_html__( "Specify the margin value for block description.", "ale" ),
        "id"         => "ale_custom_blog_desc_margin",
        "std"        => "0 0 1em 0",
        "type"       => "text",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "Info Line Typography", "ale" ),
        'desc'       => esc_html__( "Change the Typography for info line", "ale" ),
        'id'         => 'ale_custom_blog_infoline',
        'std'        => array(
            'size'       => '12px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => '14px',
            'color'      => '#acacac',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Info Line Margins", "ale" ),
        "desc"       => esc_html__( "Specify the margin value for info line.", "ale" ),
        "id"         => "ale_custom_blog_info_margin",
        "std"        => "0",
        "type"       => "text",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Share Icons Color", "ale" ),
        "desc"       => esc_html__( "Specify the share icons color.", "ale" ),
        "id"         => "ale_custom_blog_share_color",
        "std"        => "#898989",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Share Icons Size", "ale" ),
        "desc"       => esc_html__( "Specify the icon size in px.", "ale" ),
        "id"         => "ale_custom_blog_share_size",
        "std"        => "12px",
        "type"       => "text",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "Overwrite Pagination Styles", "ale" ),
        'desc'       => esc_html__( "Change the fields bellow to overwrite the paginations styles", "ale" ),
        'id'         => 'ale_overwritepaginationinfo',
        'std'        => "",
        'type'       => 'info',
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Background color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_color",
        "std"        => "#FFF",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Font color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_color_font",
        "std"        => "#898989",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Hover Background color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_hover",
        "std"        => "#f3f4f4",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Hover Font color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_hover_font",
        "std"        => "#000",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Border color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_border",
        "std"        => "#f3f4f4",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Button Hover Border color", "ale" ),
        "desc"       => esc_html__( "Specify the color.", "ale" ),
        "id"         => "ale_pag_button_border_hover",
        "std"        => "#f3f4f4",
        "type"       => "color",
        "dependency" => array("ale_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"    => esc_html__( "Overwrite Single Blog Post Styles", "ale" ),
        "desc"    => esc_html__( "Select Yes if you want to customize the elements like title, infoline, social icons, etc...", "ale" ),
        "id"      => "ale_single_blog_custom_styles",
        "std"     => "no",
        "type"    => "select",
        "options" => $yes_no,
        "hidefor" => array("ale_blog_grid_layout", array('default')),
    );
    $options[] = array(
        'name'       => esc_html__( "Title Typography", "ale" ),
        'desc'       => esc_html__( "Change the Typography for block title", "ale" ),
        'id'         => 'ale_custom_single_blog_title',
        'std'        => array(
            'size'       => '16px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '600',
            'lineheight' => 'normal',
            'color'      => '#000000',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_single_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Title Margins", "ale" ),
        "desc"       => esc_html__( "Specify the margin value for block title.", "ale" ),
        "id"         => "ale_custom_single_blog_title_margin",
        "std"        => "0 0 25px 0",
        "type"       => "text",
        "dependency" => array("ale_single_blog_custom_styles", "yes"),
    );
    $options[] = array(
        'name'       => esc_html__( "Pre Title Typography", "ale" ),
        'desc'       => esc_html__( "Change the Typography for Pre Title", "ale" ),
        'id'         => 'ale_custom_single_blog_infoline',
        'std'        => array(
            'size'       => '12px',
            'face'       => 'Raleway',
            'style'      => 'normal',
            'transform'  => 'none',
            'weight'     => '400',
            'lineheight' => '14px',
            'color'      => '#acacac',
        ),
        'type'       => 'typography',
        "dependency" => array("ale_single_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Pre Title Margins", "ale" ),
        "desc"       => esc_html__( "Specify the margin value for pre title.", "ale" ),
        "id"         => "ale_custom_single_blog_info_margin",
        "std"        => "0",
        "type"       => "text",
        "dependency" => array("ale_single_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name"       => esc_html__( "Title & Pre Title Align", "ale" ),
        "desc"       => esc_html__( "Setup the Text Align", "ale" ),
        "id"         => "ale_default_single_blog_text_align",
        "std"        => "center",
        "type"       => "select",
        "options"    => $archive_text_align,
        "dependency" => array("ale_single_blog_custom_styles", "yes"),
    );
    $options[] = array(
        "name" => esc_html__( "Work Settings", "ale" ),
        "tab"  => "ale-work-settings",
        "type" => "heading",
        "icon" => "fa-camera",
    );
    $options[] = array(
        "name"    => esc_html__( "Archive Pre Title", "ale" ),
        "desc"    => esc_html__( "Insert the pre title for Archives pages", "ale" ),
        "id"      => "ale_works_pre_title",
        "std"     => "we love the things",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('mimi')),
    );
    $options[] = array(
        "name" => esc_html__( "Archive Title", "ale" ),
        "desc" => esc_html__( "Insert the title for Archives pages", "ale" ),
        "id"   => "ale_works_title",
        "std"  => "we create for you",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Page Heading Background", "ale" ),
        "desc"    => esc_html__( "Upload or put the image link. Necessary size: 1800px-590px", "ale" ),
        "id"      => "ale_worktitlebg",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('mimi')),
    );
    $options[] = array(
        "name"       => esc_html__( "Page Background", "ale" ),
        "desc"       => esc_html__( "Upload a photo or let it empty", "ale" ),
        "id"         => "ale_workpagebg",
        "std"        => "",
        "type"       => "upload",
        "dependency" => array("ale_design_variant", "moka"),
    );
    $options[] = array(
        "name" => esc_html__( "Posts per page", "ale" ),
        "desc" => esc_html__( "Insert the count", "ale" ),
        "id"   => "ale_works_posts_per_page",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "Columns Count", "ale" ),
        "desc"    => esc_html__( "Select the columns count for the Works Archives pages", "ale" ),
        "id"      => "ale_default_work_columns",
        "std"     => "3",
        "type"    => "select",
        "options" => $archive_columns,
        "hidefor" => array("ale_design_variant", array('bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Layout Style", "ale" ),
        "desc"    => esc_html__( "Select between Grid or Masonry or Square layout.", "ale" ),
        "id"      => "ale_default_layout_type",
        "std"     => "masonry",
        "type"    => "select",
        "options" => array(
            'masonry' => esc_html__( 'Masonry Layout', 'ale' ),
            'grid'    => esc_html__( 'Grid Layout', 'ale' ),
            'square'  => esc_html__( 'Square Layout', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Hover Style", "ale" ),
        "desc"    => esc_html__( "Specify the Hover Style.", "ale" ),
        "id"      => "ale_work_hover",
        "std"     => "1",
        "type"    => "select",
        "options" => array(
            '1'  => esc_html__( 'Hover Style 1 (Lines)', 'ale' ),
            '2'  => esc_html__( 'Hover Style 2 (Light Opacity)', 'ale' ),
            '3'  => esc_html__( 'Hover Style 3 (Mask Opacity)', 'ale' ),
            '4'  => esc_html__( 'Hover Style 4 (Light Opacity)', 'ale' ),
            '5'  => esc_html__( 'Hover Style 5 (Creative)', 'ale' ),
            '6'  => esc_html__( 'Hover Style 6 (Stephanie Wedding)', 'ale' ),
            '7'  => esc_html__( 'Hover Style 7 (Cameron)', 'ale' ),
            '8'  => esc_html__( 'Hover Style 8 (Orquidea)', 'ale' ),
            '9'  => esc_html__( 'Hover Style 9 (Limpieza)', 'ale' ),
            '10' => esc_html__( 'Hover Style 10 (Nunta)', 'ale' ),
            '11' => esc_html__( 'Hover Style 11 (Cafeteria)', 'ale' ),
            '12' => esc_html__( 'Hover Style 12 (Laptica)', 'ale' ),
            '13' => esc_html__( 'Hover Style 13 (Kitty)', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Padding", "ale" ),
        "desc"    => esc_html__( "Padding between work items in px", "ale" ),
        "id"      => "ale_work_padding",
        "std"     => "0",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Sidebar Settings", "ale" ),
        "desc"    => esc_html__( "Select a sidebar position for Work Archives", "ale" ),
        "id"      => "ale_work_sidebar_position",
        "std"     => "no",
        "type"    => "select",
        "options" => $archive_sidebar,
        "hidefor" => array("ale_design_variant", array('bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Item Style", "ale" ),
        "desc"    => esc_html__( "Specify the Item Style.", "ale" ),
        "id"      => "ale_item_style",
        "std"     => "1",
        "type"    => "select",
        "options" => array(
            '1' => esc_html__( 'Only Image', 'ale' ),
            '2' => esc_html__( 'Image, Title, and Category Icon', 'ale' ),
            '3' => esc_html__( 'Image, Title, Category', 'ale' ),
            '4' => esc_html__( 'Image (On Hover title & category)', 'ale' ),
            '5' => esc_html__( 'Image & Title', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Container Properties", "ale" ),
        "desc"    => esc_html__( "Specify the Container style for Works Post Type", "ale" ),
        "id"      => "ale_works_container_prop",
        "std"     => "1",
        "type"    => "select",
        "options" => array(
            '1' => esc_html__( 'Use Default Settings (Style Tab).', 'ale' ),
            '2' => esc_html__( 'Use Full Width with no padding.', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Extra Heading", "ale" ),
        "desc"    => esc_html__( "Enable or Disable an Extra Heading that shows some additional info", "ale" ),
        "id"      => "ale_works_extra_heading",
        "std"     => "1",
        "type"    => "select",
        "options" => array(
            '1' => esc_html__( 'Disable Extra Heading', 'ale' ),
            '2' => esc_html__( 'Enable Extra Heading', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"       => esc_html__( "First Line Text", "ale" ),
        "desc"       => esc_html__( "Add some text to show in first line", "ale" ),
        "id"         => "ale_work_extra_line1",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_works_extra_heading", "2"),
    );
    $options[] = array(
        "name"       => esc_html__( "Second Line Text", "ale" ),
        "desc"       => esc_html__( "Add some text to show in second line", "ale" ),
        "id"         => "ale_work_extra_line2",
        "std"        => "",
        "type"       => "text",
        "dependency" => array("ale_works_extra_heading", "2"),
    );
    $options[] = array(
        "name"       => esc_html__( "Background Color", "ale" ),
        "desc"       => esc_html__( "Specify the background color for the Extra heading", "ale" ),
        "id"         => "ale_work_extra_bg",
        "std"        => "",
        "type"       => "color",
        "dependency" => array("ale_works_extra_heading", "2"),
    );
    $options[] = array(
        "name"    => esc_html__( "Taxonomy Navigation", "ale" ),
        "desc"    => esc_html__( "Enable or Disable the taxonomy (Category) navigation at the top of archive page.", "ale" ),
        "id"      => "ale_taxonomy_navigation",
        "std"     => "disable",
        "type"    => "select",
        "options" => array(
            'disable' => esc_html__( 'Disable', 'ale' ),
            'enable'  => esc_html__( 'Enable', 'ale' ),
        ),
        "hidefor" => array("ale_design_variant", array('moka', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name" => esc_html__( "WooCommerce", "ale" ),
        "tab"  => "ale-woocommerce",
        "type" => "heading",
        "icon" => "fa-shopping-basket",
    );
    $options[] = array(
        "name"    => esc_html__( "WooCommerce Title Background", "ale" ),
        "desc"    => esc_html__( "Upload or put the image link. Necessary size: 1800px-590px", "ale" ),
        "id"      => "ale_wootitlebg",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "WooCommerce Single Page Title Background", "ale" ),
        "desc"    => esc_html__( "Upload or put the image link. LEt the field empty to disable the heading on single shop page.", "ale" ),
        "id"      => "ale_woosingletitlebg",
        "std"     => "",
        "type"    => "upload",
        "hidefor" => array("ale_design_variant", array('mimi')),
    );
    $options[] = array(
        "name" => esc_html__( "WooCommerce Page Title", "ale" ),
        "desc" => esc_html__( "Specify the title for WooCommerce pages", "ale" ),
        "id"   => "ale_wooblogtitle",
        "std"  => "items for you",
        "type" => "text",
    );
    $options[] = array(
        "name"    => esc_html__( "WooCommerce Pre Title", "ale" ),
        "desc"    => esc_html__( "Specify the pre title for WooCommerce PAges", "ale" ),
        "id"      => "ale_wooblogpretitle",
        "std"     => "awesome, styled, special",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Columns Count", "ale" ),
        "desc"    => esc_html__( "Select the columns count for WooCommerce pages", "ale" ),
        "id"      => "ale_woo_columns",
        "std"     => "4",
        "type"    => "select",
        "options" => $archive_columns,
    );
    $options[] = array(
        "name"    => esc_html__( "Sidebar Settings", "ale" ),
        "desc"    => esc_html__( "Select a sidebar position for WooCommerce Pages", "ale" ),
        "id"      => "ale_woo_sidebar_position",
        "std"     => "no",
        "type"    => "select",
        "options" => $archive_sidebar,
    );
    $options[] = array(
        "name"    => esc_html__( "Shop Grid Style", "ale" ),
        "desc"    => esc_html__( "Specify the Grid Style. The 'Default' value will display a predefined grid specific for selected Design Variant.", "ale" ),
        "id"      => "ale_woo_grid_style",
        "std"     => "default",
        "type"    => "select",
        "options" => $woo_grid,
    );
    $options[] = array(
        "name" => esc_html__( "Products per page", "ale" ),
        "desc" => esc_html__( "Specify the products per page count. by default it is 8", "ale" ),
        "id"   => "ale_products_per_page",
        "std"  => "8",
        "type" => "text",
    );
    $options[] = array(
        "name" => esc_html__( "Subscribe Settings", "ale" ),
        "tab"  => "ale-subscribe-settings",
        "type" => "heading",
        "icon" => "fa-envelope-o",
    );
    $options[] = array(
        'name' => esc_html__( "Subscribe Form works with specific Design Variants", "ale" ),
        'desc' => esc_html__( "Note that the Subscribe form is shown on a specific design variant and not on all variants. If you want to have a subscribe form into your footer, you must select a design variant that support it. See the demo previews examples. You also need to install a subscribe plugin and paste the shortcode in the field bellow.", "ale" ),
        'id'   => 'ale_subscribeinfo',
        'std'  => "",
        'type' => 'info',
    );
    $options[] = array(
        "name"    => esc_html__( "Subscribe Title", "ale" ),
        "desc"    => esc_html__( "Type a Title for the subscribe Box", "ale" ),
        "id"      => "ale_subscribe_title",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('delizioso', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name"    => esc_html__( "Form Shortcode", "ale" ),
        "desc"    => esc_html__( "Paste here the subscribe shortcode generated by a third-part plugin. It can be MailChimp for WP.", "ale" ),
        "id"      => "ale_subscribe_shortcode",
        "std"     => "",
        "type"    => "text",
        "hidefor" => array("ale_design_variant", array('delizioso', 'bebe', 'mimi')),
    );
    $options[] = array(
        "name" => esc_html__( "Google Maps", "ale" ),
        "tab"  => "ale-google-maps",
        "type" => "heading",
        "icon" => "fa-map-marker",
    );
    $options[] = array(
        "name" => esc_html__( "Google Maps API Key", "ale" ),
        "desc" => ale_wp_kses( __( "Paste a Google Maps API Key. You can generate a key on the  <a href=\"https://console.developers.google.com/apis/\" target=\"_blank\">Google console.</a>", "ale" ) ),
        "id"   => "ale_maps_api_key",
        "std"  => "",
        "type" => "text",
    );
    $options[] = array(
        "name" => esc_html__( "Custom Pin Icon", "ale" ),
        "desc" => esc_html__( "Upload a Custom Pin Icon. Let it empty to use the default icon.", "ale" ),
        "id"   => "ale_map_icon",
        "std"  => "",
        "type" => "upload",
    );
    $options[] = array(
        "name" => esc_html__( "Map Custom Style", "ale" ),
        "desc" => esc_html__( "Paste here a custom style for your google map. You can use the snazzymaps.com to take a ready style. ", "ale" ),
        "id"   => "ale_maps_style",
        "std"  => "",
        "type" => "text",
    );
    return $options;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function ale_get_images_sizes() {
    return array(
        'post'  => array(
            array(
                'name'   => 'post-squarelarge',
                'width'  => 700,
                'height' => 700,
                'crop'   => true,
            ),
            array(
                'name'   => 'post-simplelarge',
                'width'  => 1000,
                'height' => 700,
                'crop'   => true,
            ),
            array(
                'name'   => 'post-simpletin',
                'width'  => 1000,
                'height' => 480,
                'crop'   => true,
            ),
            array(
                'name'   => 'post-vertical',
                'width'  => 500,
                'height' => 660,
                'crop'   => true,
            ),
            array(
                'name'   => 'post-horizontal',
                'width'  => 350,
                'height' => 230,
                'crop'   => true,
            )
        ),
        'works' => array(
            array(
                'name'   => 'works-squareextrabig',
                'width'  => 1200,
                'height' => 1200,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-squarebig',
                'width'  => 900,
                'height' => 900,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-squarelarge',
                'width'  => 700,
                'height' => 700,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-squaremedium',
                'width'  => 600,
                'height' => 600,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-squaresmall',
                'width'  => 400,
                'height' => 400,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-masonryextrabig',
                'width'  => 1200,
                'height' => 9999,
                'crop'   => false,
            ),
            array(
                'name'   => 'works-masonrybig',
                'width'  => 1000,
                'height' => 9999,
                'crop'   => false,
            ),
            array(
                'name'   => 'works-masonrylarge',
                'width'  => 700,
                'height' => 9999,
                'crop'   => false,
            ),
            array(
                'name'   => 'works-masonrymedium',
                'width'  => 600,
                'height' => 9999,
                'crop'   => false,
            ),
            array(
                'name'   => 'works-masonrysmall',
                'width'  => 400,
                'height' => 9999,
                'crop'   => false,
            ),
            array(
                'name'   => 'works-gridextrabig',
                'width'  => 1200,
                'height' => 900,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-gridbig',
                'width'  => 900,
                'height' => 700,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-gridlarge',
                'width'  => 700,
                'height' => 500,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-gridmedium',
                'width'  => 600,
                'height' => 400,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-gridsmall',
                'width'  => 400,
                'height' => 280,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-linesmall',
                'width'  => 320,
                'height' => 280,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-linelarge',
                'width'  => 640,
                'height' => 280,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-vertical',
                'width'  => 410,
                'height' => 504,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-photobig',
                'width'  => 512,
                'height' => 600,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-photosmall',
                'width'  => 512,
                'height' => 300,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-viajemini',
                'width'  => 512,
                'height' => 418,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-viajetin',
                'width'  => 512,
                'height' => 835,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-viajebig',
                'width'  => 1024,
                'height' => 835,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-viajehor',
                'width'  => 1024,
                'height' => 418,
                'crop'   => true,
            ),
            array(
                'name'   => 'works-brigitte',
                'width'  => 9999,
                'height' => 700,
                'crop'   => false,
            )
        ),
    );
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function ale_get_post_formats() {
    return array(
        'gallery',
        'link',
        'quote',
        'video',
        'audio'
    );
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function ale_get_post_types_with_gallery() {
    return array('gallery');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function ale_media_custom_fields() {
    return array();
}

/**
 * Custom Images size based on specific Demo settings
 */
add_action( 'after_setup_theme', 'ale_specific_image_sizes' );
function ale_specific_image_sizes() {
    if ( ALETHEME_DESIGN_STYLE == 'bebe' ) {
        add_image_size(
            'bebe-vertical',
            222,
            341,
            true
        );
        add_image_size(
            'bebe-small',
            222,
            164,
            true
        );
        add_image_size(
            'bebe-horizontal',
            456,
            164,
            true
        );
        add_image_size(
            'bebe-slider',
            920,
            505,
            true
        );
    }
}
