<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor
{
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct(){
		add_action( 'after_setup_theme', [ $this, 'init' ] );
	}

	public function init(){

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add actions
		require_once( ALETHEME_PATH. '/elementor/class-ale-elementor-helper.php' );

		add_action( 'elementor/elements/categories_registered', 'Ale_Elementor_Helper::categories_registered' );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
	}

	public function admin_notice_minimum_elementor_version() {
		$message = esc_html__('Theme requires Elementor version','ale').' <strong>'. self::MINIMUM_ELEMENTOR_VERSION .'</strong> '.esc_html__('or greater.','ale');
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		$message = esc_html__('Theme requires PHP version','ale') . ' <strong>'. self::MINIMUM_PHP_VERSION .'</strong> '. esc_html__('or greater.','ale');
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function init_widgets() {

		$widgets = [];

        //Load widget for specific variation
        switch (ALETHEME_DESIGN_STYLE) {
            case 'laptica':
                $widgets = ['ale_years_tabs','ale_corporate_team','ale_creative_title','ale_simple_form','ale_video_box','ale_shop_categories','ale_counter','ale_skill_bar','ale_recent_products','ale_works_masonry_grid','ale_team_tabs','ale_recent_blog_posts'];
                break;
            case 'burger':
                $widgets = ['ale_corporate_team','ale_simple_form','ale_shop_products','ale_simple_testimonials_slider','ale_recent_blog_posts'];
                break;
            case 'cafeteria':
                $widgets = ['ale_timeline','ale_centered_slider','ale_creative_title','ale_service_block','ale_works_masonry_grid','ale_corporate_team','ale_price_item','ale_fashion_slider','ale_simple_form'];
                break;
            case 'cosushi':
                $widgets = ['ale_service_block','ale_price_item','ale_video_box','ale_simple_testimonials_slider','ale_recent_blog_posts'];
                break;
            case 'delizioso':
                $widgets = ['ale_contact_form','ale_hover_team','ale_works_masonry_grid','ale_recent_blog_posts','ale_recent_products'];
                break;
            case 'hai':
                $widgets = ['ale_video_box','ale_simple_form','ale_service_block','ale_search_box','ale_testimonials_slider','ale_works_masonry_grid','ale_corporate_team','ale_recent_blog_posts'];
                break;
            case 'kitty':
                $widgets = ['ale_creative_title','ale_simple_form','ale_service_block','ale_left_icon_service','ale_recent_products','ale_price_item','ale_recent_blog_posts'];
                break;
            case 'moka':
                $widgets = ['ale_simple_team','ale_counter','ale_simple_form','ale_creative_title','ale_works_masonry_grid'];
                break;
            case 'po':
                $widgets = ['ale_simple_form','ale_works_vertical_slider'];
                break;
            case 'smoothie':
                $widgets = ['ale_counter','ale_corporate_team','ale_simple_form','ale_recent_products','ale_recent_blog_posts','ale_price_item','ale_testimonials_slider','ale_pricing_table'];
                break;
            case 'mimi':
                $widgets = ['alekids_top_screen','alekids_step','alekids_title','alekids_button','alekids_images_grid','alekids_contact_icon','alekids_single_image','alekids_bloglist','alekids_testimonials','alekids_gallerylist','alekids_form','alekids_socialbox','alekids_video','alekids_counter','alekids_timeline','alekids_team','alekids_shop',];
                break;
            case 'pizza':
                $widgets = ['delizioso_about','delizioso_book','delizioso_contact_text','delizioso_contact','delizioso_menu','delizioso_shop','delizioso_slider','delizioso_team','delizioso_testimonials','delizioso_title','delizioso_video'];
                break;
        }

		foreach( $widgets as $widget ){
			require_once( ALETHEME_PATH. '/elementor/class_'. $widget .'.php' );

			$class = '\Ale_Elementor_Widget_'. str_replace( ' ', '_', ucfirst(str_replace( '-', ' ', $widget )));
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class() );
		}
	}
}
Ale_Elementor::instance();
