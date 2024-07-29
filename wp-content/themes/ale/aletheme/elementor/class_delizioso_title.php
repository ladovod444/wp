<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Title extends \Elementor\Widget_Base {

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
                        'type' => $this->get_title() .'<br />'. esc_html__( "Title (Line 1)", "ale" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'title2',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Title (Line 2)", "ale" ),
                        'editor_type' => 'LINE'
                ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'delizioso_title';
	}

	public function get_title() {
		return esc_html__( 'Title', 'ale' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'ale_builder' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'ale' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( "Title #1", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'title2',
			[
				'label' => esc_html__( "Title #2", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->end_controls_section();
	}

	protected function render() {
		wp_enqueue_script('jquery-appear');
		
		$settings = $this->get_settings_for_display(); ?>
        
		<div class="delizioso_title_container">
			<?php if($settings['title']){?>
				<div class="delizioso_title"><?php echo wp_kses_post($settings['title']); ?></div>
			<?php } ?>
			<?php if($settings['title2']){?>
				<h2 class="block_title"><?php echo wp_kses_post($settings['title2']); ?></h2>
			<?php } ?>
		</div>
        <?php
	}
}
