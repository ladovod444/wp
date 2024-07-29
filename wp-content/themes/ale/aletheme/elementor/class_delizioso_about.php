<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_About extends \Elementor\Widget_Base {

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
		return 'delizioso_about';
	}

	public function get_title() {
		return esc_html__( 'About Box', 'ale' );
	}

	public function get_icon() {
		return 'eicon-single-page';
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
			'image1',
			[
				'label' => esc_html__( 'Left Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image2',
			[
				'label' => esc_html__( 'Right Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'title1', [
				'label' => esc_html__( 'Block Title #1', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'title2', [
				'label' => esc_html__( 'Block Title #2', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Center Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'ale' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'fb', [
				'label' => esc_html__( 'FaceBook URL', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'ig', [
				'label' => esc_html__( 'Instagram URL', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'twi', [
				'label' => esc_html__( 'Twitter URL', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
            <div class="delizioso_about">
				<div class="left_images">
					<?php if(!empty($settings['image1']['url'])){?>
						<img src="<?php echo esc_attr($settings['image1']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
					<?php } ?>
				</div>
				<div class="about_data_centered">
					<div class="delizioso_title_container">
						<?php if($settings['title1']){?>
							<div class="delizioso_title"><?php echo esc_html($settings['title1']); ?></div>
						<?php } ?>
						<?php if($settings['title2']){?>
							<h2 class="block_title"><?php echo esc_html($settings['title2']); ?></h2>
						<?php } ?>
					</div>
					<div class="data_container">
						<?php if(!empty($settings['image']['url'])){?>
							<img src="<?php echo esc_attr($settings['image']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
						<?php if($settings['title']){?>
							<h3><?php echo esc_html($settings['title']); ?></h3>
						<?php } ?>
						<?php if($settings['description']){?>
							<div class="description"><?php echo wp_kses_post($settings['description']); ?></div>
						<?php } ?>
						<div class="social_urls">
							<?php if($settings['fb']){ echo '<a href="'.esc_url($settings['fb']).'" target="_blank">Fb.</a>'; } ?>
							<?php if($settings['ig']){ echo '<a href="'.esc_url($settings['ig']).'" target="_blank">Ig.</a>'; } ?>
							<?php if($settings['twi']){ echo '<a href="'.esc_url($settings['twi']).'" target="_blank">Tw.</a>'; } ?>
						</div>
					</div>
				</div>
				<div class="right_images">
					<?php if(!empty($settings['image2']['url'])){?>
						<img src="<?php echo esc_attr($settings['image2']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
					<?php } ?>
				</div>	
			</div>
        <?php 
	}
}
