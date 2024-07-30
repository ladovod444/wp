<?php

//$limit = 6;
//$check_arr = [];
//for ($a = 1; $a <= $limit; $a++) {
//	$rand = mt_rand(1, 45); //rand(1, 49);
//	if (in_array($rand, $check_arr)) {
//		$rand = mt_rand(1, 45);
//	}
//	$check_arr[] = $rand;
//	echo $rand . ' ';
//}
//die();

// https://github.com/ladovod444/wp
//
//function test() {
//	static $a;
//	//$a = 0;
//	//$a;
//
//	$a += 1;
//
//	return $a;
//}
//
//echo test() . '<br>';
//echo test() . '<br>';
//echo test() . '<br>';
//
//die();

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
