<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Slider extends \Elementor\Widget_Base {

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			wp_register_script( 'delizioso-slider', ALE_PLUGIN_URL. '/elementor/js/widget-delizioso-slider.js', [ 'elementor-frontend','slick' ], '1.0', true );
			return [ 'delizioso-slider' ];
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
                        'field' => 'prev',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Prev Text", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'next',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Next Text", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'delizioso_slider';
	}

	public function get_title() {
		return esc_html__( 'Slider', 'delizioso' );
	}

	public function get_icon() {
		return 'eicon-review';
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
			'slider_image',
			[
				'label' => esc_html__( 'BG Image', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image.','delizioso'),
			]
		);

		$repeater->add_control(
			'slider_bg_title', [
				'label' => esc_html__( 'Background Title', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'slider_title', [
				'label' => esc_html__( 'Title', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slider_description', [
				'label' => esc_html__( 'Description', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'slider_link_text', [
				'label' => esc_html__( 'Link Text', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'slider_link', [
				'label' => esc_html__( 'Link', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);


		$this->add_control(
			'slider',
			[
				'label' => esc_html__( 'Slider', 'delizioso' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        wp_enqueue_script('slick');
		$settings = $this->get_settings_for_display();
        ?>
            <div class="delizioso_header_slider">
				<div class="delizioso_bg_slider">
					<?php if($settings['slider']) { 

						foreach($settings['slider'] as $slider){ ?>

							<?php if($slider['slider_image']['url']){ ?>
								<figure>
									<img src="<?php echo esc_attr($slider['slider_image']['url']) ?>" alt ="<?php echo esc_html($slider['slider_title']); ?>"/>
									<figcaption class="content_holder">
										<div class="wrapper content_wrapper">
											<?php if(!empty($slider['slider_bg_title'])){ ?><div class="delizioso_bg_title"><?php echo esc_html($slider['slider_bg_title']); ?></div><?php } ?>	
											<?php if(!empty($slider['slider_title'])){ ?><h2 class="delizioso_slider_title"><?php echo esc_html($slider['slider_title']); ?></h2><?php } ?>	
											<?php if(!empty($slider['slider_description'])){ ?><div class="delizioso_slider_description"><?php echo esc_html($slider['slider_description']); ?></div><?php } ?>	

											<?php if(!empty($slider['slider_link'])){ echo '<a href="'.esc_url($slider['slider_link']).'" class="delizioso_link_button" target="_blank">'; } 
											
											if(!empty($slider['slider_link_text'])){ ?><span class="delizioso_link_text"><?php echo esc_html($slider['slider_link_text']); ?></span><?php } 
											
											if(!empty($slider['slider_link'])){ echo '</a>'; } ?>
										</div>
									</figcaption>
								</figure>
							<?php } ?>
						<?php }
					} ?>
				</div>	
				<div class="arrows"></div>
            </div>
        <?php 
	}
}
