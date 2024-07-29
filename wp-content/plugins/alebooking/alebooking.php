<?php
/**
 * @package alebooking
 * @version 1.7.2
 */
/**
 * Plugin Name: Alebooking
 * Plugin URI: http://wordpress.org/plugins/alebooking/
 * Description: This is Alebooking plugin for enterprise managment
 * Version: 1.0.0
 * Requires at least: 6.5
 * Requires PHP: 8.0
 * Author: Dz
 * Text Domain: alebooking
 * Domain Path:       /lang
 * Author URI: http://my.alebooking.ii/
 */

if ( ! defined( 'ABSPATH' ) ) {
	//echo 'Hi there!  I\'m  a plugin, not much I can do when called directly!!!!.';
	//exit;
	die();
}

define( 'ALEBOOKING_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define( 'ALEBOOKING__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if (!class_exists('AleBooking')) {
	require_once( ALEBOOKING__PLUGIN_DIR . 'class.alebooking.php' );
}

// Load templates
if (!class_exists('Gamajo_Template_Loader')) {
	require_once( ALEBOOKING__PLUGIN_DIR . 'includes/class-gamajo-template-loader.php' );
}

if (!class_exists('Ale_Booking_Template_Loader')) {
	require_once( ALEBOOKING__PLUGIN_DIR . 'includes/class-alebooking-template-loader.php' );
}

//function ale_say_hello() {
//	//echo 'Hello Ale!!!';
//	if (class_exists('AleBooking')) {
//		$cl = new AleBooking('Test Albook');
//		echo $cl->getAle();
//	}
//}
////
//add_action('admin_init', 'ale_say_hello');
if ( class_exists( 'AleBooking' ) ) {
	$alebooking = new AleBooking( 'Test Albook' );
	$alebooking->register(__FILE__);
}

//register_activation_hook(__FILE__, ['AleBooking', 'activation']);
register_activation_hook( __FILE__, [ $alebooking, 'activation' ] );
register_deactivation_hook( __FILE__, [ $alebooking, 'deactivation' ] );

//echo 'plugin_action_links_' . plugin_basename( __FILE__ ); die();

//echo plugin_basename( __FILE__ ); die(); // alebooking/alebooking.php

//echo plugins_url(__FILE__); die();

//add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'add_plugin_setting_link' );
//function add_plugin_setting_link( $actions ) {
//	$custom_links = [
//		'<a href="' . admin_url( 'admin.php?page=alebooking_settings' ) . '">' . esc_html__( 'Settings', 'alebooking' ) . '</a>',
//	];
//
//	//array_push($links, $custom_link);
//	$actions = array_merge( $actions, $custom_links );
//
//	//$links[] = $custom_link;
//	return $actions;
//}

add_filter( 'the_excerpt', 'replace_links_content_func' );

function replace_links_content_func( $content ) {
	global $post;
	//echo print_r($post); die();
	if ( $post->post_type == 'room' ) {
		$content = turnUrlIntoHyperlink($content);
	}

	return $content;
}

function turnUrlIntoHyperlink($string){
	//The Regular Expression filter
	$reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

	// Check if there is a url in the text
	if(preg_match_all($reg_exUrl, $string, $url)) {

		// Loop through all matches
		foreach($url[0] as $newLinks){
			if(strstr( $newLinks, ":" ) === false){
				$link = 'http://'.$newLinks;
			}else{
				$link = $newLinks;
			}

			// Create Search and Replace strings
			$search  = $newLinks;
			$replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$link.'</a>';
			$string = str_replace($search, $replace, $string);
		}
	}

	//Return result
	return $string;
}


//register_uninstall_hook( __FILE__, [ $alebooking, 'uninstall' ] );

//add_menu_page( string $page_title,
//string $menu_title,
//string $capability,
//string $menu_slug,
//callable $callback = ”,
//string $icon_url = ”, int | float $position = null ): string

/**
 * Register a custom menu page.
 */
//function wpdocs_register_my_custom_menu_page() {
//	add_menu_page(
//		__( 'Custom Menu Title', 'textdomain' ),
//		'custom menu',
//		'manage_options',
//		'myplugin/myplugin-admin.php',
//		'',
//		plugins_url( 'myplugin/images/icon.png' ),
//		6
//	);
//}
//add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );