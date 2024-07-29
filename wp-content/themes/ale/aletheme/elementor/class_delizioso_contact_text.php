<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Contact_Text extends \Elementor\Widget_Base {

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
		return 'delizioso_contact_text';
	}

	public function get_title() {
		return esc_html__( 'Contact Text', 'ale' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
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
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Right Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'city', [
				'label' => esc_html__( 'City', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'street', [
				'label' => esc_html__( 'Street', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'phone', [
				'label' => esc_html__( 'Phone', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'email', [
				'label' => esc_html__( 'Email', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'locations',
			[
				'label' => esc_html__( 'Locations', 'ale' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ city }}}',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); ?>

		<div class="delizioso_contact_text">
			<div class="wrapper content_wrapper">
				<div class="left_container">
					<div class="delizioso_title_container">
						<?php if($settings['title']){?>
							<div class="delizioso_title"><?php echo wp_kses_post($settings['title']); ?></div>
						<?php } ?>
						<?php if($settings['title2']){?>
							<h2 class="block_title"><?php echo wp_kses_post($settings['title2']); ?></h2>
						<?php } ?>
					</div>
					<?php if($settings['locations']){
						echo '<div class="delizioso_locations">';
							foreach($settings['locations'] as $item){ ?>
								<div class="location_item">
									<?php if(!empty($item['city'])){ ?><h5><?php echo esc_html($item['city']); ?></h5><?php } ?>
									<?php if(!empty($item['street'])){ ?><span><?php echo esc_html($item['street']); ?></span><?php } ?>
									<?php if(!empty($item['phone'])){ ?><span><?php echo esc_html($item['phone']); ?></span><?php } ?>
									<?php if(!empty($item['email'])){ ?><a href="mailto:<?php echo esc_url($item['email']); ?>"><?php echo esc_html($item['email']); ?></a><?php } ?>
								</div>
							<?php }
						echo '</div>';
					} ?>
				</div>
				<div class="right_container">
					<?php if(!empty($settings['image']['url'])){?>
						<img src="<?php echo esc_attr($settings['image']['url']) ?>" alt ="<?php echo esc_html($settings['title']); ?>"/>
					<?php } ?>
				</div>
			</div>
		</div>
        <?php
	}
}