<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Contact extends \Elementor\Widget_Base {

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
                        'field' => 'name',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Name Placeholder", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'email',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Email Placeholder", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'phone',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Phone Placeholder", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'submit',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Submit Placeholder", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
                [
                        'field' => 'subject',
                        'type' => $this->get_title() .'<br />'. esc_html__( "Mail Subject", "delizioso" ),
                        'editor_type' => 'LINE'
                ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'delizioso_contact';
	}

	public function get_title() {
		return esc_html__( 'Contact Form', 'ale' );
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
			'receive',
			[
				'label' => esc_html__( "Email to receive messages", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'subject',
			[
				'label' => esc_html__( "Mail Subject", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact message from contact page *','ale'),
			]
        );
		$this->add_control(
			'email',
			[
				'label' => esc_html__( "Email Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your e-mail','ale'),
			]
        );
		$this->add_control(
			'name',
			[
				'label' => esc_html__( "Name Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your name','ale'),
			]
        );
		$this->add_control(
			'message',
			[
				'label' => esc_html__( "Message Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Message','ale'),
			]
        );
		$this->add_control(
			'submit',
			[
				'label' => esc_html__( "Submit Value", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Send Message','ale'),
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

		<div class="delizioso_contact">
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
					<a id="success"></a>

					<?php if (isset($_GET['success'])) { ?>
						<p class="success"><?php echo esc_html_e("Thank you for your message!", "ale"); ?></p>
					<?php } ?>

					<?php if (isset($error) && isset($error['msg'])) {?>
						<p class="error"><?php echo esc_attr($error['msg']); ?></p>
					<?php } ?>

					<form method="post" action="<?php echo esc_url(get_the_permalink()); ?>" class="delizioso_booking_form">
						<div class="inputs_container">
							<div class="line">
								<input name="contact[email]" type="email" class="item_field" placeholder="<?php echo esc_attr($settings['email']); ?>" value="" required="required" id="contact-form-email" />
								<input name="contact[name]" type="text" class="item_field" placeholder="<?php echo esc_attr($settings['name']); ?>" value="" required="required" id="contact-form-name" />
							</div>
							<textarea name="contact[message]" class="item_field" placeholder="<?php echo esc_attr($settings['message']); ?>" value="" id="contact-form-message" required="required"></textarea>
							<div class="delizioso_input_button ">
								<input type="submit" class="submit submit_button" value="<?php echo esc_attr($settings['submit']); ?>"/>
							</div>
						</div>
						<input name="contact[receive]" type="hidden" value="<?php echo esc_attr($settings['receive']); ?>" />
						<input name="contact[subject]" type="hidden" value="<?php echo esc_attr($settings['subject']); ?>" />
						<?php wp_nonce_field(); ?>
					</form>

				</div>
				<div class="right_container">
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
			</div>
		</div>
        <?php
	}
}