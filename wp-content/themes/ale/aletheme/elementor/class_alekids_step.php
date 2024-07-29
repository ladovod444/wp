<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Alekids_Step extends \Elementor\Widget_Base {

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
                        'type' => $this->get_title() .'<br />'. esc_html__( "Title", "ale" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'description',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Description", "ale" ),
                        'editor_type' => 'VISUAL'
                ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'alekids_step';
	}

	public function get_title() {
		return esc_html__( 'Step', 'ale' );
	}

	public function get_icon() {
		return 'eicon-rating';
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
			'icon',
			[
				'label' => esc_html__( 'Icon', 'ale' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon_one',
				'options' => [
					'icon_one'  => esc_html__( 'First Step Icon', 'ale' ),
					'icon_two' => esc_html__( 'Second Step Icon', 'ale' ),
					'icon_three' => esc_html__( 'Third Step Icon', 'ale' ),
					'custom' => esc_html__( 'Custom Image', 'ale' ),
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Icon Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'conditions' => array(
                    'relation' => 'or',
                    'terms'    => array(
                      array(
                        'name'     => 'icon',
                        'operator' => '==',
                         'value'   => 'custom',
                      ),
                    )
                  ),
				
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( "Title", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'ale' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'ale' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'URL', 'ale' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ale' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Background Color', 'ale' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom_color' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

        <div class="alekids_step custom_color">
			<div class="circle_container">
				<?php if($settings['icon'] == 'custom'){
					$image_src = $settings['image']['url'];
					if(!empty($image_src)){
						echo '<img src="'.esc_url($image_src).'" alt="'.esc_attr($settings['title']).'" />';
					}
				} else {
					echo '<div class="'.esc_attr($settings['icon']).'"></div>';
				} ?>
			</div>
			<?php if($settings['title']){ ?><h4 class="step_title"><?php echo esc_attr($settings['title']); ?></h4><?php } ?>
			<?php if($settings['description']){ ?><div class="step_description"><?php echo wp_kses_post($settings['description']); ?></div><?php } ?>
			<?php if($settings['link']['url']){ ?><a href="<?php echo esc_url($settings['link']['url']) ?>" class="step_link font_one" <?php echo (!empty($settings['link']['nofollow']) ? 'rel="nofollow"' : 'rel="follow"'); ?> <?php echo (!empty($settings['link']['is_external']) ? 'target="_blank"' : 'target="_self"'); ?>><?php esc_html_e('Read More', 'ale'); ?></a><?php } ?>
			<div class="bottom_line">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
        <?php
	}
}
