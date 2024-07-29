<?php
//Remove Widgets from all sidebars
ale_preview_widget::remove_widgets_from_sidebar('main-sidebar');

//Add widgets to Main Sidebar
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'search', array ('title' => ''));
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'text', array ('title' => 'About Us','text' => 'Odio pellentesque hendrerit viverra lobortis in vel tincidunt fermentum dui. Vitae, sed magna sed netus augue ornare orci dui. Arcu purus nibh suscipit sodales ullamcorper commodo nisl aliquet.'));
ale_preview_widget::add_widget_to_sidebar('main-sidebar', 'categories', array ('title' => 'Categories'));

//Categories for Posts
$preview_post_cat_1_id = ale_demo_category::add_category(array(
    'category_name' => 'Italiano',
    'parent_id' => 0,
    'description' => '',
));
$preview_post_cat_2_id = ale_demo_category::add_category(array(
    'category_name' => 'Pizza',
    'parent_id' => 0,
    'description' => '',
));

$preview_shop_cat_1_id = ale_demo_category::add_term(array(
    'term_name' => 'Pizza',
    'taxonomy'=>'product_cat',
    'parent_id' => 0,
    'description' => '',
));

// Blog posts
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_p1',
    'post_type' => 'post',
    'post_format' => '',
    'ale_video_link' => ''
));
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_3_id),
    'featured_image_ale_id' => 'ale_p2',
    'post_type' => 'post',
    'post_format' => 'video',
    'ale_video_link' => 'https://www.youtube.com/watch?v=WdWEMXnHBVI'
));
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_p1',
    'post_type' => 'post',
    'post_format' => 'gallery',
    'ale_video_link' => '',
    'gallery_images' => array('ale_p1','ale_p2'),
));
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_p1',
    'post_type' => 'post',
    'post_format' => '',
    'ale_video_link' => ''
));
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_3_id),
    'featured_image_ale_id' => 'ale_p2',
    'post_type' => 'post',
    'post_format' => 'video',
    'ale_video_link' => 'https://www.youtube.com/watch?v=WdWEMXnHBVI'
));
ale_demo_content::add_post(array(
    'title' => "The Best Pizza from Italy",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/post_default.dat',
    'ale_post_title_position' => 'afterheadingwithdefaults',
    'ale_post_pre_title' => 'Pizza',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_p1',
    'post_type' => 'post',
    'post_format' => 'gallery',
    'ale_video_link' => '',
    'gallery_images' => array('ale_p1','ale_p2'),
));

//WooCommerce Products
ale_demo_content::add_post(array(
    'title' => "CAPRICIOASA",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr1',
    'post_type' => 'product',
    '_regular_price' => '34',
    '_price' => '34',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0001',
));
ale_demo_content::add_post(array(
    'title' => "Mamaliga",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr4',
    'post_type' => 'product',
    '_regular_price' => '59',
    '_price' => '59',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0008',
));
ale_demo_content::add_post(array(
    'title' => "Napoletana",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr2',
    'post_type' => 'product',
    '_regular_price' => '32',
    '_price' => '32',
    '_sale_price' => '30',
    '_visibility' => 'visible',
    '_sku' => '0002',
));
ale_demo_content::add_post(array(
    'title' => "Delcevita",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr3',
    'post_type' => 'product',
    '_regular_price' => '35',
    '_price' => '35',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0003',
));
ale_demo_content::add_post(array(
    'title' => "Caravella",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr1',
    'post_type' => 'product',
    '_regular_price' => '34',
    '_price' => '34',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0005',
));
ale_demo_content::add_post(array(
    'title' => "Napoletana",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr2',
    'post_type' => 'product',
    '_regular_price' => '39',
    '_price' => '39',
    '_sale_price' => '21',
    '_visibility' => 'visible',
    '_sku' => '0006',
));
ale_demo_content::add_post(array(
    'title' => "Margarita",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr4',
    'post_type' => 'product',
    '_regular_price' => '31',
    '_price' => '31',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0004',
));
ale_demo_content::add_post(array(
    'title' => "Dolcevita",
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/product_default.dat',
    'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.

    Ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean. Donec quam felis, ultricies nec, pellentesque eu.',
    'taxonomy_id_array' => array($preview_shop_cat_1_id),
    'taxonomy_name' => 'product_cat',
    'featured_image_ale_id' => 'ale_pr3',
    'post_type' => 'product',
    '_regular_price' => '60',
    '_price' => '60',
    '_sale_price' => '',
    '_visibility' => 'visible',
    '_sku' => '0007',
));


//Blog page
$ale_blog_id = ale_demo_content::add_page(array(
    'title' => 'Blog',
    'template' => 'index.php',
    'postspage'=>true,
));
$ale_contact_id = ale_demo_content::add_page(array(
    'title' => 'Contact',
    'featured_image_ale_id' => '',
    'ale_post_pre_title' => 'Pizza',
    '_elementor_data' => get_template_directory() . '/aletheme/demos/pizza/data/elementor_data_contact.dat',
    '_elementor_edit_mode' => 'builder',
    'template' => 'template-landing.php',
));
$ale_about_id = ale_demo_content::add_page(array(
    'title' => 'Restaurant',
    'featured_image_ale_id' => '',
    'ale_post_pre_title' => 'About',
    '_elementor_data' => get_template_directory() . '/aletheme/demos/pizza/data/elementor_data_about.dat',
    '_elementor_edit_mode' => 'builder',
    'template' => 'template-landing.php',
));
$ale_homepage_id = ale_demo_content::add_page(array(
    'title' => 'Home',
    'homepage' => true,
    'template' => 'template-fullwidth.php',
    '_elementor_data' => get_template_directory() . '/aletheme/demos/pizza/data/elementor_data_home.dat',
    '_elementor_edit_mode' => 'builder',
));

//WooCommerce Page
$ale_shop_id = ale_demo_content::add_page(array(
    'title' => 'Shop',
));
$ale_cart_id = ale_demo_content::add_page(array(
    'title' => 'Cart',
    'ale_post_pre_title' => 'Pizza',
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/cart.dat',

));
$ale_checkout_id = ale_demo_content::add_page(array(
    'title' => 'Checkout',
    'ale_post_pre_title' => 'Pizza',
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/checkout.dat',

));
$ale_my_account_id = ale_demo_content::add_page(array(
    'title' => 'My Account',
    'ale_post_pre_title' => 'Pizza',
    'file' => get_template_directory() . '/aletheme/demos/pizza/data/my_account.dat',

));

/**
 * Navigation Settings
 */
$ale_demo_header_menu = ale_demo_menus::create_menu('Header Menu', 'header_menu');
$ale_demo_mobile_menu = ale_demo_menus::create_menu('Mobile Menu', 'mobile_menu');

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
    'title' => 'Shop',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_shop_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));

//Mobile Menu
ale_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'About',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_about_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Shop',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_shop_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));

//WP Options Settings
ale_demo_options::update_shop_cart($ale_cart_id);
ale_demo_options::update_shop_page($ale_shop_id);
ale_demo_options::update_shop_checkout($ale_checkout_id);
ale_demo_options::update_shop_account($ale_my_account_id);

ale_demo_options::update_tagline('Tasty Pizza');
ale_demo_options::update_posts_per_page(3);