<?php



/**
 * Categories and Custom Taxonomies
 */

//Categories for Posts
$preview_post_cat_1_id = ale_demo_category::add_category(array(
    'category_name' => 'Portraits',
    'parent_id' => 0,
    'description' => '',
));


$preview_work_category_1_id = ale_demo_category::add_term(array(
    'term_name' => 'Female Portraits',
    'taxonomy'=>'work-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_work_category_2_id = ale_demo_category::add_term(array(
    'term_name' => 'Male Portraits',
    'taxonomy'=>'work-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_work_category_3_id = ale_demo_category::add_term(array(
    'term_name' => 'Children Portraits',
    'taxonomy'=>'work-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_work_category_4_id = ale_demo_category::add_term(array(
    'term_name' => 'Black & White',
    'taxonomy'=>'work-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_work_category_5_id = ale_demo_category::add_term(array(
    'term_name' => 'Family Photo',
    'taxonomy'=>'work-category',
    'parent_id' => 0,
    'description' => '',
));

/**
 * Posts Settings
 */

// Blog posts
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum sit amet",
    'file' => get_template_directory() . '/aletheme/demos/po/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img1',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_featured_position' => 'no',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'no',
    'ale_related_posts' => 'disable',
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum sit amet",
    'file' => get_template_directory() . '/aletheme/demos/po/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img2',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_featured_position' => 'no',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'no',
    'ale_related_posts' => 'disable',
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum sit amet",
    'file' => get_template_directory() . '/aletheme/demos/po/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img3',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_featured_position' => 'no',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'no',
    'ale_related_posts' => 'disable',
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum sit amet",
    'file' => get_template_directory() . '/aletheme/demos/po/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img4',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_featured_position' => 'no',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'no',
    'ale_related_posts' => 'disable',
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum sit amet",
    'file' => get_template_directory() . '/aletheme/demos/po/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img5',
    'post_type' => 'post',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_featured_position' => 'no',
    'ale_author_info' => 'disable',
    'ale_sidebar_position' => 'no',
    'ale_related_posts' => 'disable',
));


// Works Posts
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_1_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w1',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_1_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w2',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_1_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w3',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_1_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w4',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_2_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w5',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_2_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w6',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_2_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w7',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_2_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w8',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_3_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w9',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_3_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w10',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_3_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w11',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_3_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w12',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_4_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w13',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_4_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w14',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_4_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w15',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_4_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w16',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_5_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w17',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_5_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w18',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_5_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w19',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum",
    'file' => get_template_directory() . '/aletheme/demos/po/data/work.dat',
    'taxonomy_id_array' => array($preview_work_category_5_id),
    'taxonomy_name' => 'work-category',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_w20',
    'post_type' => 'works',
    'ale_maskonheading' => 'disable',
    'ale_featuredimagecover' => '',
    'ale_post_pre_title' => '',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_info_line' => 'grid_line',
    'ale_author_info' => 'disable',
    'ale_gallery_slider' => 'before_content',
    'ale_featured_position' => 'no',
    'comment_status' => 'close',
    'gallery_images' => array('ale_w5','ale_w2','ale_w10','ale_w18'),
));

/**
 * Pages
 */

//Blog page
$ale_blog_id = ale_demo_content::add_page(array(
    'title' => 'Blog',
    'template' => 'index.php',
    'postspage'=>true,
));



//Import inner pages built with Page Builders
if(isset($_COOKIE['import_builder_Po'])){
    $selected_builder = $_COOKIE['import_builder_Po'];

    if($selected_builder == 'js_composer'){ 

        //Contact page
        $ale_contact_id = ale_demo_content::add_page(array(
            'title' => 'Contact',
            'file' => get_template_directory() . '/aletheme/demos/po/data/contact.dat',
            'ale_maskonheading' => 'disable',
            'featured_image_ale_id' => '',
            'ale_featured_position' => 'no',
            'ale_featuredimagecover' => '',
            'ale_post_pre_title' => '',
            'ale_post_title_position' => 'onheadingfeatured',
        ));

        //About Us page
        $ale_about_id = ale_demo_content::add_page(array(
            'title' => 'About',
            'file' => get_template_directory() . '/aletheme/demos/po/data/about.dat',
            'featured_image_ale_id' => '',
            'ale_maskonheading' => 'disable',
            'ale_featured_position' => 'no',
            'ale_featuredimagecover' => '',
            'ale_post_pre_title' => '',
            'ale_post_title_position' => 'onheadingfeatured',
        ));

        //Home page
        $ale_homepage_id = ale_demo_content::add_page(array(
            'title' => 'Home',
            'homepage' => true,
            'file' => get_template_directory() . '/aletheme/demos/po/data/home.dat',

        ));
        
    } else {
        $ale_contact_id = ale_demo_content::add_page(array(
            'title' => 'Contact',
            'ale_maskonheading' => 'disable',
            'featured_image_ale_id' => '',
            'ale_featured_position' => 'no',
            'ale_featuredimagecover' => '',
            'ale_post_pre_title' => '',
            'ale_post_title_position' => 'onheadingfeatured',
            '_elementor_data' => get_template_directory() . '/aletheme/demos/po/data/elementor_data_contact.dat',
            '_elementor_edit_mode' => 'builder',
        ));
        $ale_about_id = ale_demo_content::add_page(array(
            'title' => 'About',
            'featured_image_ale_id' => '',
            'ale_maskonheading' => 'disable',
            'ale_featured_position' => 'no',
            'ale_featuredimagecover' => '',
            'ale_post_pre_title' => '',
            'ale_post_title_position' => 'onheadingfeatured',
            '_elementor_data' => get_template_directory() . '/aletheme/demos/po/data/elementor_data_about.dat',
            '_elementor_edit_mode' => 'builder',
        ));
        $ale_homepage_id = ale_demo_content::add_page(array(
            'title' => 'Home',
            'homepage' => true,
            '_elementor_data' => get_template_directory() . '/aletheme/demos/po/data/elementor_data_home.dat',
            '_elementor_edit_mode' => 'builder',
        ));
    }
}

/**
 * Navigation Settings
 */
$ale_demo_header_menu = ale_demo_menus::create_menu('Header Menu', 'header_menu');

//Header Menu
ale_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_about_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));


//WP Options Settings
ale_demo_options::update_tagline('Portraits Photography');
ale_demo_options::update_posts_per_page(5);