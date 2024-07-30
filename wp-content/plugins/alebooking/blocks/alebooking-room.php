<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package alebooking
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function alebooking_room_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = dirname( __FILE__ );

	$index_js = 'alebooking-room/index.js';
	wp_register_script(
		'alebooking-room-block-editor',
		plugins_url( $index_js, __FILE__ ),
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	$editor_css = 'alebooking-room/editor.css';
	wp_register_style(
		'alebooking-room-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'alebooking-room/style.css';
	wp_register_style(
		'alebooking-room-block',
		plugins_url( $style_css, __FILE__ ),
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'alebooking/alebooking-room', [
		'editor_script' => 'alebooking-room-block-editor',
		'editor_style'  => 'alebooking-room-block-editor',
		'style'         => 'alebooking-room-block',
	] );
}

add_action( 'init', 'alebooking_room_block_init' );
