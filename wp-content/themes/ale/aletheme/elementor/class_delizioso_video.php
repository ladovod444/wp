<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Video extends \Elementor\Widget_Base {

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
               
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'delizioso_video';
	}

	public function get_title() {
		return esc_html__( 'Video Box', 'ale' );
	}

	public function get_icon() {
		return 'eicon-video-playlist';
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
		$this->add_control(
			'video',
			[
				'label' => esc_html__( "Video Link", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'title',
			[
				'label' => esc_html__( "Video Title", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'description',
			[
				'label' => esc_html__( "Video Description", "ale" ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
        );
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image. Recommended size: 1920x560 ','ale'),
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		wp_enqueue_style('venobox');
        wp_enqueue_script('venobox');

		$settings = $this->get_settings_for_display(); ?>
        
		<div class="delizioso_video">
            <figure class="image_holder">
                <?php if($settings['image']['url']) { ?>
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_html__('Single Image', 'delizioso'); ?>" />
                <?php } ?>
				<figcaption>
					<div class="wrapper content_wrapper">
						<?php if(!empty($settings['video'])){?>
							<div class="play_button">
								<a href="<?php echo esc_url($settings['video']); ?>" data-overlay="rgba(18,20,22,0.95)" data-autoplay="true" data-vbtype="video"  class="venobox open_video">
									<img src="<?php echo get_template_directory_uri().'/assets/css/images/pizza/play.svg' ?>" alt="<?php echo wp_kses_post($settings['title']); ?>" />
								</a>
							</div>
						<?php } ?>
						<?php if(!empty($settings['title'])){?>
							<h5><?php echo wp_kses_post($settings['title']); ?></h5>
						<?php } ?>
						<?php if(!empty($settings['description'])){?>
							<div class="description"><?php echo wp_kses_post($settings['description']); ?></div>
						<?php } ?>
					</div>
				</figcaption>
            </figure>
        </div>
        <?php 
	}
}
