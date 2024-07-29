<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//echo get_stylesheet_uri(); die();
//include_once get_template_directory_uri() . '/widgets/Download_Widget.php';
include_once 'widgets/Download_Widget.php';
include_once 'widgets/Text_Widget.php';
include_once 'widgets/Contacts_Widget.php';
include_once 'widgets/Service_Box_Widget.php';
include_once 'walkers/bootstrap_4_walker_nav_menu.php';
include_once 'walkers/bootstrap_walker_comment.php';
include_once 'fields/WP_Customize_Range.php';

// add_theme_support
if ( ! function_exists( 'band_digital_setup' ) ) {
	function band_digital_setup() {


		load_theme_textdomain( 'band_digital', get_template_directory() . '/languages' );

		add_theme_support( 'custom-logo', [
			'height'               => 50,
			'width'                => 130,
			'flex-width'           => false,
			'flex-height'          => false,
			'header-text'          => '',
			'unlink-homepage-logo' => true,
		] );

		// Add dynamic title
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size('band-digital', 310, 210, false);

		set_post_thumbnail_size(900, 700, true);

		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'script',
			'style',
		) );
	}

	add_action( 'after_setup_theme', 'band_digital_setup' );
}

/// Удаляем роль при деактивации нашей темы
add_action( 'switch_theme', 'deactivate_my_theme' );
function deactivate_my_theme() {
	remove_role( 'project_manager' );
}

// Добавляем роль при активации нашей темы
add_action( 'after_switch_theme', 'activate_my_theme' );
function activate_my_theme() {
	add_role( 'project_manager', 'PM',
		[
			'read'         => true,  // true разрешает эту возможность
			'edit_posts'   => true,  // true разрешает редактировать посты
			'upload_files' => false,  // может загружать файлы
            'edit_dashboard' => false,
			//'edit_others_posts' => true,
		]
	);

	// Получим объект данных роли "Автор"
//	$author = get_role( 'author' );
//
//	// Создадим новую роль и наделим её правами "Автора"
//	add_role( 'project_manager', 'Руководитель проекта', $author->capabilities );

}

/**
 * Register styles and scripts
 */
// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'band_digital_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function band_digital_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	//wp_enqueue_style( 'band-digital', get_template_directory_uri() . '/css/' .  'style.css', array('main'), '1.2.99');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css', array( 'main' ) );

	// Icofont Css.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css', array( 'main' ) );

	// Animate
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/plugins/animate-css/animate.css', array( 'main' ) );
	// Icofont.
	wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css', array( 'main' ) );

	wp_enqueue_style( 'band-digital', get_template_directory_uri() . '/css/' . 'style.css', array( 'bootstrap' ) );

	//wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );

	// Переподключаем JQuery
	wp_deregister_script( 'jquery' );
	//wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
	wp_register_script( 'jquery', get_template_directory_uri() . '/plugins/jquery/jquery.min.js', array(), null, array( 'in_footer' => true ) );
	//wp_register_script( 'jquery', '');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/plugins/jquery/jquery.min.js', array(), null, array( 'in_footer' => true ) );

	// Popper
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/plugins/bootstrap/js/popper.min.js', array( 'jquery' ), null, array( 'in_footer' => true ) );

	// Bootstrap
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.js', array( 'popper' ), '1.0.0', array( 'in_footer' => true ) );

	// counterup
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	// jquery.easing
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/plugins/counterup/jquery.easing.1.3.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	wp_enqueue_script( 'google-map', get_template_directory_uri() . '/plugins/google-map/gmap3.min.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	wp_enqueue_script( 'contact', get_template_directory_uri() . '/plugins/form/contact.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', array( 'in_footer' => true ) );

}

/**
 * Области меню
 */
function band_digital_menus() {
	// Собираем несколько областей меню
	$locations = [
		'header'   => __( 'Header Menu', 'band_digital' ),
		'footer_left'   => __( 'Footer Left Menu', 'band_digital' ),
		'footer_right'   => __( 'Footer Right Menu', 'band_digital' ),
		//'primary'  => __( 'Desktop Horizontal Menu', 'band_digital' ),
//		'expanded' => __( 'Desktop Expanded Menu', 'band_digital' ),
		'mobile'   => __( 'Mobile Menu', 'band_digital' ),
//		'footer'   => __( 'Footer Menu', 'band_digital' ),
//		'social'   => __( 'Social Menu', 'band_digital' ),
	];

	// регистрируем области меню
	//register_nav_menu( $locations, 'Added menus' );
	register_nav_menus( $locations);
}

add_action( 'init', 'band_digital_menus' );




/*
add_filter('nav_menu_css_class', 'custom_nav_menu_css_class', 10, 1);
function custom_nav_menu_css_class($classes) {
	$classes[] = 'nav-item';

	return $classes;
}

add_filter('nav_menu_link_attributes', 'custom_nav_menu_attributes', 10, 1);

function custom_nav_menu_attributes($attributes) {
	$attributes['class'] = 'nav-link';
	return $attributes;
}
*/

add_filter('navigation_markup_template', 'custom_navigation_template', 10, 2);
function custom_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links good-links">%3$s</div>
	</nav>
	';
}

/**
 * Виджеты
 */
function band_digitals_widgets_init() {
	register_sidebar([
		'name'          => esc_html__('Sidebar blog','band_digital'),
		'id'            => "sidebar-blog",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h5 class="widget-title mb-3">',
		'after_title'   => "</h5>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	]);

	register_sidebar([
		'name'          => esc_html__('Sidebar footer text','band_digital'),
		'id'            => "sidebar-footer-text",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h4>',
		'after_title'   => "</h4>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	]);

	register_sidebar([
		'name'          => esc_html__('Sidebar footer contacts','band_digital'),
		'id'            => "sidebar-footer-contacts",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="footer-widget footer-text %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h4>',
		'after_title'   => "</h4>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	]);

	register_sidebar([
		'name'          => esc_html__('Sidebar footer contacts short','band_digital'),
		'id'            => "sidebar-footer-contacts-short",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="footer-widget footer-text %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h4>',
		'after_title'   => "</h4>\n",
		'before_sidebar' => '<div class="col-lg-3 col-sm-6 col-md-6">', // WP 5.6
		'after_sidebar'  => '</div>', // WP 5.6
	]);

	register_sidebar([
		'name'          => esc_html__('Sidebar services','band_digital'),
		'id'            => "sidebar-services",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-lg-4 col-md-6">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h4>',
		'after_title'   => "</h4>\n",
		'before_sidebar' => '<div class="row justify-content-center">', // WP 5.6
		'after_sidebar'  => '</div>', // WP 5.6
	]);
}

add_action('widgets_init', 'band_digitals_widgets_init');

function register_download_widget() {
	register_widget('Download_Widget');
}
add_action('widgets_init', 'register_download_widget');

function register_text_widget() {
	register_widget('Text_Widget');
}
add_action('widgets_init', 'register_text_widget');

function register_contacts_widget($args) {
	$args = '<span>';
	register_widget('Contacts_Widget');
}
add_action('widgets_init', 'register_contacts_widget', 10, 1);

function register_service_box_widget() {
	register_widget('Service_Box_Widget');
}
add_action('widgets_init', 'register_service_box_widget', 10, 1);

/**
 * Custom post types
 */
add_action( 'init', 'register_post_types' );
function register_post_types(){

	register_post_type( 'service', [
		'label'  => null,
		'labels' => [
			'name'               => __('Services', 'band_digital'), // основное название для типа записи
			'singular_name'      => __('Service', 'band_digital'), // название для одной записи этого типа
			'add_new'            => __('Add Service', 'band_digital'), // для добавления новой записи
			'add_new_item'       => __('Добавление Service', 'band_digital'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редактирование Service', 'band_digital'), // для редактирования типа записи
			'new_item'           => __('Новое Service', 'band_digital'), // текст новой записи
			'view_item'          => __('Смотреть Service', 'band_digital'), // для просмотра записи этого типа.
			'search_items'       => __('Искать Service', 'band_digital'), // для поиска по этим типам записи
			'not_found'          => __('Не найдено', 'band_digital'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не найдено в корзине', 'band_digital'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Services', 'band_digital'), // название меню
		],
		'description'            => '',
		'public'                 => true,
		 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => 'post', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-businessman',
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'partner', [
		'label'  => null,
		'labels' => [
			'name'               => __('Partners'), // основное название для типа записи
			'singular_name'      => __('Partner'), // название для одной записи этого типа
			'add_new'            => __('Добавить Partner'), // для добавления новой записи
			'add_new_item'       => __('Добавление Partner'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редактирование Partner'), // для редактирования типа записи
			'new_item'           => __('Новое Partner'), // текст новой записи
			'view_item'          => __('Смотреть Partner'), // для просмотра записи этого типа.
			'search_items'       => __('Искать Partner'), // для поиска по этим типам записи
			'not_found'          => __('Не найдено'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не найдено в корзине'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Partners', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => 'post', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-businessman',
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'price', [
		'label'  => null,
		'labels' => [
			'name'               => __('Prices'), // основное название для типа записи
			'singular_name'      => __('Price'), // название для одной записи этого типа
			'add_new'            => __('Добавить Price'), // для добавления новой записи
			'add_new_item'       => __('Добавление Price'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редактирование Price'), // для редактирования типа записи
			'new_item'           => __('Новое Price'), // текст новой записи
			'view_item'          => __('Смотреть Price'), // для просмотра записи этого типа.
			'search_items'       => __('Искать Price'), // для поиска по этим типам записи
			'not_found'          => __('Не найдено'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не найдено в корзине'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Prices', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'  => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => 'post', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-money-alt',
		'capability_type'   => 'post',
		'hierarchical'        => false,
		'supports'            => [ 'title','editor','author','thumbnail','excerpt','trackbacks',
			'custom-fields','comments','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'testimonial', [
		'label'  => null,
		'labels' => [
			'name'               => __('Testimonials'), // основное название для типа записи
			'singular_name'      => __('Testimonial'), // название для одной записи этого типа
			'add_new'            => __('Добавить Testimonial'), // для добавления новой записи
			'add_new_item'       => __('Добавление Testimonial'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редактирование Testimonial'), // для редактирования типа записи
			'new_item'           => __('Новое Testimonial'), // текст новой записи
			'view_item'          => __('Смотреть Testimonial'), // для просмотра записи этого типа.
			'search_items'       => __('Искать Testimonial'), // для поиска по этим типам записи
			'not_found'          => __('Не найдено'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не найдено в корзине'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Testimonials', // название меню
		],
		'description'            => 'Client Testimonial',
		'public'                 => true,
		'publicly_queryable'  => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => 'post', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-status',
		'capability_type'   => 'post',
		'hierarchical'        => false,
		'supports'            => [ 'title','editor','author','thumbnail','excerpt','trackbacks',
			'custom-fields','comments','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );


}

add_action( 'wp_ajax_my_action', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );

function my_action_callback($response){
	$mail_from = get_option('admin_email');
	$blogname = get_option('blogname');
	//$to = 'ladovod@gmail.com';
	$to = trim($_POST['email']);
	$subject = 'Отправлена контактная форма';
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);

	$body = '<p> Hello, ' . $name . '</p>';
	$body .= '<p> Your phone is ' . $phone . '</p>';
	$body .= '<p>' . $_POST['message'] . '</p>';
	//$headers = array('Content-Type: text/html; charset=UTF-8');

	$headers = array('Content-Type: text/html; charset=UTF-8',"From: $blogname <$mail_from>");
	//$res = wp_mail( $to, $subject, $body, $headers );
	wp_mail( $to, $subject, $body, $headers );

	//echo print_r($res);
	echo 'Message was send succesfully';

	// выход нужен для того, чтобы в ответе не было ничего лишнего,
	// только то что возвращает функция
	wp_die();
}

add_action( 'phpmailer_init', 'mailer_config', 10, 1);
 // SEE do_action_ref_array( 'phpmailer_init', array( &$phpmailer ) );
 // in wp-includes/pluggable.php
function mailer_config(PHPMailer $mailer){
//function mailer_config(\PHPMailer\PHPMailer\PHPMailer $mailer){
	$mailer->IsSMTP();
	$mailer->Host = "smtp.yandex.ru"; // your SMTP server
	$mailer->Port = 465;
	$mailer->SMTPDebug = 0; // write 0 if you don't want to see client/server communication in page
	$mailer->CharSet  = "utf-8";
	$mailer->SMTPAuth  = true;
	$mailer->Username  = "ladovod77";
	$mailer->Password  = "urjyltinkdrsgxnn";
	//$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
}

add_filter('acf/shortcode/allow_in_block_themes_outside_content', '__return_true');

add_action( 'acf/init', 'set_acf_settings' );
function set_acf_settings() {
	acf_update_setting( 'enable_shortcode', true );
}

//add_shortcode( 'my_short', 'band_digitals_my_short' );
//function band_digitals_my_short( $atts ){
//	return "output my-short = ". $atts['value'] . ' Age: ' . $atts['age'];
//}
// [my_short value="bar" age="32"]

add_shortcode( 'admin_email', 'admin_email_shortcode' );
function admin_email_shortcode() {
	$admin_mail = get_option('admin_email');

	return "<p><a href='mailto:$admin_mail'>$admin_mail</a></p>";
}


//add_action( 'customize_register', 'my_customize_register' );
function my_customize_register( WP_Customize_Manager $wp_customize ){

	$section = 'section_id';
	$wp_customize->add_section( $section, [
		'title'    => 'My Settings',
		'priority' => 220, // at the bottom of customizer
		//'panel'    => $panel,
	] );

	$wp_customize->add_setting( 'my_range' , array(
		'default'   => 0,
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'my_range', [
		'label'   => 'Мой Рендж',
		'min'     => 10,
		'max'     => 9999,
		'step'    => 10,
		'section' => 'section_id',
	] ) );

}


/*
add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('book', array(
		'labels'             => array(
			'name'               => 'Книги', // Основное название типа записи
			'singular_name'      => 'Книга', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую книгу',
			'edit_item'          => 'Редактировать книгу',
			'new_item'           => 'Новая книга',
			'view_item'          => 'Посмотреть книгу',
			'search_items'       => 'Найти книгу',
			'not_found'          => 'Книг не найдено',
			'not_found_in_trash' => 'В корзине книг не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Книги'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}
*/