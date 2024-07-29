<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Team extends \Elementor\Widget_Base {

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			wp_register_script( 'delizioso-team', ALE_PLUGIN_URL. '/elementor/js/widget-delizioso-team.js', [ 'elementor-frontend','slick' ], '1.0', true );
			return [ 'delizioso-team' ];
		}

		return [];
	}

	public function __construct( $data = [], $args = null ) {

		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );

		parent::__construct( $data, $args );
	}

	public function get_name() {
		return 'delizioso_team';
	}

	public function get_title() {
		return esc_html__( 'Team', 'ale' );
	}

	public function get_icon() {
		return 'eicon-person';
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
			'member_image',
			[
				'label' => esc_html__( 'Member Image', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image.','ale'),
			]
		);
		$repeater->add_control(
			'member_name', [
				'label' => esc_html__( 'Name', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'member_status', [
				'label' => esc_html__( 'Status', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'fb_link', [
				'label' => esc_html__( 'Facebook Link', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'ig_link', [
				'label' => esc_html__( 'Instagram Link', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'tw_link', [
				'label' => esc_html__( 'Twitter Link', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'members',
			[
				'label' => esc_html__( 'Team Members', 'ale' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ member_name }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        wp_enqueue_script('slick');
		$settings = $this->get_settings_for_display(); 
        ?>
            <div class="delizioso_team_members">
                <?php if($settings['members']) { 
                    foreach($settings['members'] as $member){ ?>
                        <?php if($member['member_image']['url']){ ?>
                            <figure class="member_item">
                                <img src="<?php echo esc_url($member['member_image']['url']) ?>" alt ="<?php echo esc_attr($member['member_name']); ?>"/>
                                <figcaption class="content_holder">
                                    <div class="member_data">
                                        <div class="social_links">
                                            <?php if($member['fb_link']){ ?>
                                                <a href="<?php echo esc_html($member['fb_link']); ?>">Fb.</a>
                                            <?php } ?>
                                            <?php if($member['ig_link']){ ?>
                                                <a href="<?php echo esc_html($member['ig_link']); ?>">Ig.</a>
                                            <?php } ?>
                                            <?php if($member['tw_link']){ ?>
                                                <a href="<?php echo esc_html($member['tw_link']); ?>">Tw.</a>
                                            <?php } ?>
                                        </div>
                                        <?php if($member['member_name']){ ?>
                                            <h5><?php echo esc_html($member['member_name']); ?></h5>
                                        <?php } ?>
                                        <?php if($member['member_status']){ ?>
                                            <span><?php echo esc_html($member['member_status']); ?></span>
                                        <?php } ?>
                                    </div>
                                </figcaption>
                            </figure>
                        <?php } ?>
                    <?php }
                } ?>
            </div>
        <?php 
	}
}
