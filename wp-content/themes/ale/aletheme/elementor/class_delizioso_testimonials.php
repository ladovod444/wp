<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Testimonials extends \Elementor\Widget_Base {

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			wp_register_script( 'delizioso-testimonials', ALE_PLUGIN_URL. '/elementor/js/widget-delizioso-testimonials.js', [ 'elementor-frontend','slick' ], '1.0', true );
			return [ 'delizioso-testimonials' ];
		}

		return [];
	}

	public function __construct( $data = [], $args = null ) {

		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );
		parent::__construct( $data, $args );
	}

	public function get_name() {
		return 'delizioso_testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'ale' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'ale_builder' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'name', [
				'label' => esc_html__( 'Name', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'status', [
				'label' => esc_html__( 'Status', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'review', [
				'label' => esc_html__( 'Review', 'ale' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$this->add_control(
			'testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'ale' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        wp_enqueue_script('slick');
		$settings = $this->get_settings_for_display(); ?>
            <div class="delizioso_testimonials">
                <?php if($settings['testimonials']) { 
					echo '<div class="delizioso_testimonials_slider">';
						foreach($settings['testimonials'] as $item){ ?>
							<div class="testimonial_item">
								<?php if($item['review']){ echo '<div class="review">'.wp_kses_post($item['review']).'</div>'; } ?>
								<?php if($item['name']){ echo '<div class="name font_one">'.wp_kses_post($item['name']).'</div>'; } ?>
								<?php if($item['status']){ echo '<div class="status">'.wp_kses_post($item['status']).'</div>'; } ?>
							</div>
						<?php }
					echo '</div>';
                } ?>
            </div>
        <?php 
	}
}
