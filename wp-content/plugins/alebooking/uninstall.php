<?php

global $table_prefix;
if (!defined('WP_UNINSTALL_PLUGIN')) {
	//echo 'Hi there!  I\'m  a plugin, not much I can do when called directly!!!!.';
	//exit;
	die();
}

// Delete post type.
//
//global $wpdb;
//$wpdb->query("DELETE FROM {$wpdb->posts} WHERE posts post_type='room'");

$rooms = get_posts(['post_type' => 'room', 'numberposts' => -1]);

foreach ($rooms as $room) {
	wp_delete_post($room->ID, true);
}
//wp_delete_post();
