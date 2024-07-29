<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Alekids_Shop extends \Elementor\Widget_Base {

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			wp_register_script( 'alekids-shop_elementor', ALE_PLUGIN_URL. '/elementor/js/widget-alekids-shop_elementor.js', [ 'elementor-frontend','jquery-slick' ], '1.0', true );
			return [ 'alekids-shop_elementor' ];
		}

		return [];
	}

	public function __construct( $data = [], $args = null ) {

		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );
		parent::__construct( $data, $args );
	}

	public function wpml_widgets_to_translate_filter( $widgets ) {

	  $widgets[ $this->get_name() ] = [
			'conditions' => [
				'widgetType' => $this->get_name(),
			],
			'fields' => [
                [
                        'field' => 'title',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Text on Button", "ale" ),
                        'editor_type' => 'LINE'
                ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'alekids_shop';
	}

	public function get_title() {
		return esc_html__( 'Products Slider', 'ale' );
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	public function get_categories() {
		return [ 'ale_builder' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'ale' ),
			]
		);
		$this->add_control(
			'count',
			[
				'label' => esc_html__( "Products Count", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '6',
			]
        );
		$this->end_controls_section();
	}

	protected function render() {
		wp_enqueue_script('slick');
		$settings = $this->get_settings_for_display();

        $count = -1;

        if(!empty($settings['count'])){
            $count = $settings['count'];
        }
		echo '<div class="alekids_product_slider">';
			echo do_shortcode('[products limit="'.esc_attr($count).'" ]');
		echo '</div>';
	}
}
