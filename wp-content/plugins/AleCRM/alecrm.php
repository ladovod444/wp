<?php
/**
 * @package AleCRM
 * @version 1.7.2
 */
/**
 * Plugin Name: AleCRM
 * Plugin URI: http://wordpress.org/plugins/alecrm/
 * Description: This is AleCRM plugin for enterprise managment
 * Version: 1.0.1
 * Requires at least: 6.5
 * Requires PHP: 8.0
 * Author: Dz
 * Text Domain: alecrm
 * Domain Path:       /lang
 * Author URI: http://my.ii/
 */

if (!defined('ABSPATH')) {
	echo 'Hi there!  I\'m  a plugin, not much I can do when called directly!!!!.';
	exit;
}

function alecrm_show_nav_item() {
	add_menu_page(
		esc_html__('Welcome to Alecrm', 'alecrm'),
		esc_html__('AleCRM options', 'alecrm'),
		'manage_options',
		'alecrm-options',
		'alecrm_show_content',
		'dashicons-admin-multisite',
		12
	);
}

//add_menu_page( 'custom menu title', 'custom menu', 'manage_options', 'myplugin/myplugin-admin.php', '', plugins_url( 'myplugin/images/icon.png' ), 6 );
//}
add_action('admin_menu', 'alecrm_show_nav_item');

//Подгрузка языковых пакетов

function alecrm_load_plugin_textdomain() {
	load_plugin_textdomain('alecrm', false, basename(dirname(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'alecrm_load_plugin_textdomain');

function alecrm_show_content() {
	_e('Hello alecrm', 'alecrm');

	$limit = 6;
	$check_arr = [];
	for ($a = 1; $a <= $limit; $a++) {
		$rand = mt_rand(1, 48); //rand(1, 49);
		if (in_array($rand, $check_arr)) {
			$rand = mt_rand(1, 49);
		}
		$check_arr[] = $rand;
		echo $rand . ' ';
	}
	die();
}

// register scripts and styles

function alecrm_register_assets() {
	wp_register_style('alecrm_styles', plugins_url('assets/css/admin.css', __FILE__));
	wp_register_script('alecrm_scripts', plugins_url('assets/js/admin.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'alecrm_register_assets' );

function alecrm_load_assets($hook) {
	if ($hook != 'toplevel_page_alecrm-options') {
		return;
	}
	else {
		wp_enqueue_style('alecrm_styles');
		wp_enqueue_script('alecrm_scripts');
		wp_enqueue_script('jquery_color');
	}
}

add_action( 'admin_enqueue_scripts', 'alecrm_load_assets' );

/**
 * Custom post types
 */
add_action( 'init', 'alecrm_register_post_types' );
function alecrm_register_post_types() {

	register_post_type( 'alecrm', [
		'label'              => null,
		'labels'             => [
			'name'               => __( 'Alercms', 'alecrm' ),
			// основное название для типа записи
			'singular_name'      => __( 'Alercm', 'alecrm' ),
			// название для одной записи этого типа
			'add_new'            => __( 'Add Alercm', 'alecrm' ),
			// для добавления новой записи
			'add_new_item'       => __( 'Add Alercm', 'alecrm' ),
			// заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __( 'Edit Alercm', 'alecrm' ),
			// для редактирования типа записи
			'new_item'           => __( 'New Alercm', 'alecrm' ),
			// текст новой записи
			'view_item'          => __( 'Viewwww Alercm', 'alecrm' ),
			// для просмотра записи этого типа.
			'search_items'       => __( 'Find Alercm', 'alecrm' ),
			// для поиска по этим типам записи
			'not_found'          => __( 'Alercm not found', 'alecrm' ),
			// если в результате поиска ничего не было найдено
			'not_found_in_trash' => __( 'Not found ', 'alecrm' ),
			// если не было найдено в корзине
			'parent_item_colon'  => '',
			// для родителей (у древовидных типов)
			'menu_name'          => __( 'Alercm menu!', 'alecrm' ),
			// название меню
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		// зависит от public
		// 'exclude_from_search' => null, // зависит от public
		'show_ui'            => true,
		// зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'       => true,
		// показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'       => null,
		// добавить в REST API. C WP 4.7
		'rest_base'          => 'post',
		// $post_type. C WP 4.7
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-businessman',
		'capability_type'    => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'       => false,
		'supports'           => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats'
		],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'         => [],
		'has_archive'        => true,
		'rewrite'            => true,
		'query_var'          => true,
	] );
}