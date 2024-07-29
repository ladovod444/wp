<?php

//Check what pagination option is enabled in Theme Options
$ale_pagination_style = ale_get_option('default_blog_pagination');

if($ale_pagination_style == 'infinite'){
	function ale_ajax_load_more() {
		check_ajax_referer( 'ale-load-more-nonce', 'nonce' );

		$args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
		$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
		$args['paged'] = esc_attr( $_POST['page'] );
		$args['post_status'] = 'publish';
		ob_start();
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();

			do_action('aletheme_specific_blog_grid'); 

		endwhile; endif; wp_reset_postdata();
		$data = ob_get_clean();

		wp_send_json_success( $data );
		wp_die();
	}
	add_action( 'wp_ajax_ale_ajax_load_more', 'ale_ajax_load_more' );
	add_action( 'wp_ajax_nopriv_ale_ajax_load_more', 'ale_ajax_load_more' );


	function ale_load_more_js() {
		global $wp_query;
		$args = array(
			'nonce' => wp_create_nonce( 'ale-load-more-nonce' ),
			'url'   => admin_url( 'admin-ajax.php' ),
			'query' => $wp_query->query,
		);

		wp_enqueue_script( 'ale-infinite-load', get_stylesheet_directory_uri() . '/assets/js/libs/infinite-load.js', array( 'jquery' ), '1.0', true );
		wp_localize_script( 'ale-infinite-load', 'aleloadmore', $args );

	}
	add_action( 'wp_enqueue_scripts', 'ale_load_more_js' );
}