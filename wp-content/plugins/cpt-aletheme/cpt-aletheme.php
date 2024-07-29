<?php
/**
 * Plugin Name: Ale Theme Core
 * Plugin URI: https://aletheme.com
 * Description: This plugin will load necessary core files for Ale Theme like: Custom Post Types, Custom Taxonomies, Custom Metaboxes, Custom Widgets etc...
 * Version: 1.1.1
 * Author: ALETHEME.COM
 * Author URI: https://aletheme.com
 * License: GPL v2
 */

define('ALE_PLUGIN_URL', plugin_dir_url( __FILE__ ));

//Contact Form Class
require_once ('contact.php');
require_once ('social.php');

//Load Custom Widgets
require_once (plugin_dir_path( __FILE__ ) . 'widgets/widget-about.php');
require_once (plugin_dir_path( __FILE__ ) . 'widgets/widget-blog.php');
require_once (plugin_dir_path( __FILE__ ) . 'widgets/widget-mostcommented.php');
require_once (plugin_dir_path( __FILE__ ) . 'widgets/widgets.php');

//Load Custom Metaboxes
require_once (plugin_dir_path( __FILE__ ) . 'metaboxes/gallery-meta.php');
require_once (plugin_dir_path( __FILE__ ) . 'metaboxes/meta-init.php');
require_once (plugin_dir_path( __FILE__ ) . 'metaboxes/metaboxes.php');

//Load General
require_once (plugin_dir_path( __FILE__ ) . 'vendor/general.php');