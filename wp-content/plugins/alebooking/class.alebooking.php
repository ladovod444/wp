<?php

/**
 * @package alebooking
 * @version 1.7.2
 */

class AleBooking {
	const TEST_MESS = 'Ale Test!?';
	public string $message;

	function __construct( $message ) {
		$this->message = $message;

	}

	public function register( $file ) {
		add_action( 'init', [ $this, 'custom_post_type' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_front' ] );

		// Hook Add menu item for admin left sidebar
		add_action( 'admin_menu', [ $this, 'add_menu_page' ] );

		// Load template.
		add_filter( 'template_include', [ $this, 'room_template' ] );
		// Can be checked on http://wp:802/rooms/

		add_action( 'admin_init', [ $this, 'settings_init' ] );
		// Add links to plugins page.
		// So set to alebooking.php
		add_filter(
			'plugin_action_links_' . plugin_basename( $file ),
			[ $this, 'add_plugin_setting_link' ]
		//'add_plugin_setting_link'
		); // alebooking/alebooking.php
		//echo 'plugin_action_links_' . plugin_basename(__FILE__); die();
		//echo plugin_basename(__FILE__); die(); // alebooking/class.alebooking.php
		// alebooking/alebooking.php

		//echo plugins_url(__FILE__); die();

		add_action( 'admin_menu', [ $this, 'add_meta_box_for_room' ] );

		add_action( 'save_post_room', [ $this, 'save_meta_data'], 10, 2 );
	}

	public function add_meta_box_for_room() {
		add_meta_box(
			'alebooking_rooms',
			esc_html__('Room settings'),
			[$this, 'meta_box_html'],
			'room',
			'normal',
			'default'
		);
	}

	public function meta_box_html($post) {
		$price = get_post_meta($post->ID, "alebooking_price", true);
		$size = get_post_meta($post->ID, "alebooking_size", true);

		wp_nonce_field('alebookingnoncefields', '_alebooking');

		echo '
		<table class="form-table">
		  <tbody>
		  <tr>
		      <th><label for="alebooking_price"> ' . esc_html__('Room price', 'alebooking') . '</label></th>
		      <td><input type="text" id="alebooking_price" name="alebooking_price" value="' . esc_attr__($price) . '" /></td>
		    </tr>
		    <tr>
		      <th><label for="alebooking_size"> ' . esc_html__('Room size', 'alebooking') . '</label></th>
		      <td><input type="text" id="alebooking_size" name="alebooking_size" value="' . esc_attr__($size) . '" /></td>
		    </tr>
		  </tbody>
		</table>	
		';
		//echo '<input type="text" name="booking_settings_options[title_for_rooms]" value="' . $title_for_rooms . '" />';
	}

	public function save_meta_data($post_id, $post) {

		// nonce field check.
		if (!isset($_POST['_alebooking']) || !wp_verify_nonce($_POST['_alebooking'], 'alebookingnoncefields')) {
			return $post_id;
		}

		// if is not autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check postb type.
		$post_type = $post->post_type;
		if ( $post_type != $_POST['post_type'] ) {
			return $post_id;
		}

		// Check user permissions
		$post_type_obj = get_post_type_object($post_type);
		if (!current_user_can($post_type_obj->cap->edit_post, $post_id)) {
			return $post_id;
		}

		// Обновляем метаданные записи.
		if ( is_null( $_REQUEST['alebooking_price'] ) ) {
			delete_post_meta($post_id, "alebooking_price");
		} else {
			//$price = get_post_meta( $post->ID, "alebooking_price", true );
			update_post_meta( $post_id, "alebooking_price", sanitize_text_field($_REQUEST['alebooking_price']) );
		}

		if ( is_null( $_REQUEST['alebooking_size'] ) ) {
			delete_post_meta($post_id, "alebooking_size");
		} else {
			update_post_meta( $post_id, "alebooking_size", sanitize_text_field($_REQUEST['alebooking_size']) );
		}

		return $post_id;
	}

	public function add_plugin_setting_link( $actions ) {
		$custom_links = [
			'<a href="' . admin_url( 'admin.php?page=alebooking_settings' ) . '">' . esc_html__( 'Settings', 'alebooking' ) . '</a>',
		];

		//array_push($links, $custom_link);
		$actions = array_merge( $actions, $custom_links );

		//$links[] = $custom_link;
		return $actions;
	}

	// Register admin page section and options.
	public function settings_init() {
		register_setting( 'booking_settings', 'booking_settings_options' );

		add_settings_section(
			'booking_settings_section',
			esc_html__( 'Settings', 'alebooking' ),
			[ $this, 'settings_section_html' ],
			//'booking_settings',
			'alebooking_settings' // See add_menu_page - slug
		);

		add_settings_field( 'post_per_page',
			esc_html__( 'Posts per page', 'alebooking' ),
			[ $this, 'post_per_page_html' ],
			'alebooking_settings',
			'booking_settings_section',
		);

		add_settings_field( 'title_for_rooms',
			esc_html__( 'Title for rooms', 'alebooking' ),
			[ $this, 'title_for_rooms_html' ],
			'alebooking_settings',
			'booking_settings_section',
		);

		add_settings_field( 'show_on_post',
			esc_html__( 'Show on post', 'alebooking' ),
			[ $this, 'show_on_post_html' ],
			'alebooking_settings',
			'booking_settings_section',
		);
	}

	// Callbacks for admin fields options
	public function settings_section_html() {
		echo esc_html__( 'Hello alebooking', 'alebooking' );
	}

	public function title_for_rooms_html() {
		$options         = get_option( 'booking_settings_options' );
		$title_for_rooms = $options['title_for_rooms'] ?? '';
		echo '<input type="text" name="booking_settings_options[title_for_rooms]" value="' . $title_for_rooms . '" />';
	}

	public function post_per_page_html() {
		$options          = get_option( 'booking_settings_options' );
		$options_per_page = $options['post_per_page'] ?? '';
		echo '<input type="text" name="booking_settings_options[post_per_page]" value="' . $options_per_page . '" />';
	}

	function show_on_post_html() {
		$options              = get_option( 'booking_settings_options' );
		$options_show_on_post = $options['show_on_post'] ?? null;

		$checked = $options_show_on_post ? 'checked' : '';
		echo '<input type="checkbox" name="booking_settings_options[show_on_post]" ' . $checked . '/>';
	}

	static function activation() {
		// Update rewrite rules.
		flush_rewrite_rules();
	}

	static function deactivation() {
		// Update rewrite rules.
		flush_rewrite_rules();
	}

//	static function uninstall() {
//		// Do something on delete.
//	}

	public function getAle() {
		//return self::TEST_MESS;
		return $this->message;
	}

	// Подключаем скрипты и стили для админа.
	public function enqueue_admin() {
		wp_enqueue_style( 'alebookingStyle', plugins_url( 'assets/admin/styles.css', __FILE__ ) );
		wp_enqueue_script( 'alebookingScript', plugins_url( 'assets/admin/scripts.js', __FILE__ ) );
	}

	// Подключаем скрипты и стили для админа.
	public function enqueue_front() {
		wp_enqueue_style( 'alebookingStyle', plugins_url( 'assets/front/styles.css', __FILE__ ) );
		wp_enqueue_script( 'alebookingScript', plugins_url( 'assets/front/scripts.js', __FILE__ ) );
	}

	// Add menu item for admin left sidebar.
	function add_menu_page() {
		add_menu_page(
			esc_html__( 'Alebooking settings', 'alebooking' ),
			esc_html__( 'Alebooking settings' ),
			'manage_options',
			//'alebooking/alebooking-admin.php',
			'alebooking_settings',
			//$this->test_menu_page_cb(),
			[ $this, 'alebooking_settings_page' ],
			//plugins_url( 'myplugin/images/icon.png' ),
			'dashicons-admin-multisite',
			100
		);
	}

	function alebooking_settings_page() {
		//echo 'test menu page';
		include_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
	}

	// Load template callback.
	public function room_template( $template ) {
		if ( is_post_type_archive( 'room' ) || isset($_POST['location']) ) {

			$theme_files     = [ 'archive-room.php', 'alebooking/archive-room.php' ];
			$exists_template = locate_template( $theme_files, false );
			if ( $exists_template != '' ) {
				return $exists_template;
			} else {
				return plugin_dir_path( __FILE__ ) . 'templates/archive-room.php';
			}
		}

		if ( is_tax( 'location' ) || is_tax( 'type' ) ) {

			$theme_files     = [ 'archive-room.php', 'alebooking/archive-room-value.php' ];
			$exists_template = locate_template( $theme_files, false );
			if ( $exists_template != '' ) {
				return $exists_template;
			} else {
				return plugin_dir_path( __FILE__ ) . 'templates/archive-room-value.php';
			}
		}

		return $template;
	}

	function custom_post_type() {
		// Register new post type - room.
		register_post_type( 'room', [
			'public'      => true,
			'label'       => esc_html__( 'Room', 'alebooking' ),
			'supports'    => [
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
			'has_archive' => true,
			'rewrite'     => [ 'slug' => 'rooms' ]
		] );


		// Register new taxonomy - Location (for room).
		$labels = array(
			'name'              => _x( 'Locations', 'taxonomy general name', 'alebooking' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name', 'alebooking' ),
			'search_items'      => esc_html__( 'Search Locations', 'alebooking' ),
			'all_items'         => esc_html__( 'All Locations', 'alebooking' ),
			'parent_item'       => esc_html__( 'Parent Location', 'alebooking' ),
			'parent_item_colon' => esc_html__( 'Parent Location:', 'alebooking' ),
			'edit_item'         => esc_html__( 'Edit Location', 'alebooking' ),
			'update_item'       => esc_html__( 'Update Location', 'alebooking' ),
			'add_new_item'      => esc_html__( 'Add New Location', 'alebooking' ),
			'new_item_name'     => esc_html__( 'New Location Name', 'alebooking' ),
			'menu_name'         => esc_html__( 'Location', 'alebooking' ),
		);

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'room/location' ),
		];
		register_taxonomy( 'location', 'room', $args );

		// Register new taxonomy - Type (for room).
		$labels_type = array(
			'name'              => _x( 'Types', 'taxonomy general name', 'alebooking' ),
			'singular_name'     => _x( 'Type', 'taxonomy singular name', 'alebooking' ),
			'search_items'      => esc_html__( 'Search Types', 'alebooking' ),
			'all_items'         => esc_html__( 'All Types', 'alebooking' ),
			'parent_item'       => esc_html__( 'Parent Type', 'alebooking' ),
			'parent_item_colon' => esc_html__( 'Parent Type:', 'alebooking' ),
			'edit_item'         => esc_html__( 'Edit Type', 'alebooking' ),
			'update_item'       => esc_html__( 'Update Type', 'alebooking' ),
			'add_new_item'      => esc_html__( 'Add New Type', 'alebooking' ),
			'new_item_name'     => esc_html__( 'New Type Name', 'alebooking' ),
			'menu_name'         => esc_html__( 'Type', 'alebooking' ),
		);

		$args_type = [
			'hierarchical'      => true,
			'labels'            => $labels_type,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'room/type' ),
		];
		register_taxonomy( 'type', 'room', $args_type );
	}

	public function get_terms_hierarchical( $tax_name ) {
		$taxonomy_terms = get_terms( $tax_name, [ 'hide_empty' => true, 'parent' => 0 ] );

		if ( ! empty( $taxonomy_terms ) ) {
			$selected = (int) $_POST[$tax_name] ?? '';
			foreach ( $taxonomy_terms as $term ) {
				if ($term->term_id == $selected) {
					echo '<option value="' . $term->term_id . '" selected="selected">' . $term->name . '</option>';
				}
				else {
					echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
				}

				$child_terms = get_terms( $tax_name, [ 'hide_empty' => false, 'parent' => $term->term_id ] );

				if ( ! empty( $child_terms ) ) {
					foreach ( $child_terms as $child_term ) {
						if ($child_term->term_id == $selected) {
							echo '<option value="' . $child_term->term_id . '" selected="selected"> - ' . $child_term->name . '</option>';
						}
						else {
							echo '<option value="' . $child_term->term_id . '"> - ' . $child_term->name . '</option>';
						}
					}
				}
			}
		}
	}

	// Get taxonomy for room archive .

	public function get_taxonomy_for_room_archive( $tax_name, $post_id ) {
		$terms = get_the_terms( $post_id, $tax_name );
		if ( $terms ) {
			echo "<div class='taxonomy-wrapper $tax_name'>";
			echo "<span>$tax_name:</span>";
			foreach ( $terms as $term ) {
				$location  = $term->name;
				$term_link = get_term_link( $term );

				if ( $location ) {
					echo "<span class='taxonomy-tag'><a  href='$term_link'>$location</a></span>";
				}

			}
			echo '</div>';
		}

	}
}