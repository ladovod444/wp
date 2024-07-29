<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Book extends \Elementor\Widget_Base {

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
		return 'delizioso_book';
	}

	public function get_title() {
		return esc_html__( 'Book Form', 'ale' );
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
			'image',
			[
				'label' => esc_html__( 'Background Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image.','ale'),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( "Block Title", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'description',
			[
				'label' => esc_html__( "Block Description", "ale" ),
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
			'person',
			[
				'label' => esc_html__( "Person Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('1 Person','ale'),
			]
        );
		$this->add_control(
			'date',
			[
				'label' => esc_html__( "Date&Time Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Date & Time','ale'),
			]
        );
		$this->add_control(
			'phone',
			[
				'label' => esc_html__( "Phone Placeholder", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Phone number','ale'),
			]
        );
		$this->add_control(
			'submit',
			[
				'label' => esc_html__( "Submit Value", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book','ale'),
			]
        );
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display(); 
		$bg = '';
		if(!empty($settings['image']['url'])) $bg = 'style="background-image: url('.esc_attr($settings['image']['url']).')"';
		?>

		<div class="delizioso_book" <?php echo wp_kses_post($bg); ?>>
			<div class="wrapper content_wrapper">
				<div class="left_container">
					<?php if($settings['title']){?>
						<h2 class="book_title"><?php echo wp_kses_post($settings['title']); ?></h2>
					<?php } ?>
					<?php if($settings['description']){?>
						<div class="book_description"><?php echo wp_kses_post($settings['description']); ?></div>
					<?php } ?>
				</div>
				<div class="right_container">
					<a id="successbook"></a>

					<?php if (isset($_GET['successbook'])) { ?>
						<p class="success"><?php echo esc_html_e("Thank you for your booking!", "ale"); ?></p>
					<?php } ?>

					<?php if (isset($error) && isset($error['msg'])) {?>
						<p class="error"><?php echo esc_attr($error['msg']); ?></p>
					<?php } ?>

					<form method="post" action="<?php echo esc_url(get_the_permalink()); ?>" class="delizioso_booking_form">
						<div class="inputs_container">
							<input name="booking[person]" type="text" class="item_field" placeholder="<?php echo esc_attr($settings['person']); ?>" value="" required="required" id="contact-form-person" />
							<input name="booking[date]" type="text" class="item_field" placeholder="<?php echo esc_attr($settings['date']); ?>" value="" required="required" id="contact-form-date" />
							<input name="booking[phone]" type="text" class="item_field" placeholder="<?php echo esc_attr($settings['phone']); ?>" value="" required="required" id="contact-form-phone" />
							<input type="submit" class="submit submit_button" value="<?php echo esc_attr($settings['submit']); ?>"/>
							
						</div>
						<input name="booking[receive]" type="hidden" value="<?php echo esc_attr($settings['receive']); ?>" />
						<input name="booking[subject]" type="hidden" value="<?php echo esc_attr($settings['subject']); ?>" />
						<input name="booking[booking]" type="hidden" value="1" />
						<?php wp_nonce_field(); ?>
					</form>
				</div>
			</div>
		</div>
        <?php
	}
}