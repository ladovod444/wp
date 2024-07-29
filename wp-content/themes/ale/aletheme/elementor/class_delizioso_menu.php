<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Delizioso_Menu extends \Elementor\Widget_Base {

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
                    'field' => 'description',
                    'type' => $this->get_title() .'<br />'. esc_html__( "Description", "ale" ),
                    'editor_type' => 'VISUAL'
            ],
			],
	  ];

	  return $widgets;
	}

	public function get_name() {
		return 'delizioso_menu';
	}

	public function get_title() {
		return esc_html__( 'Menu List', 'ale' );
	}

	public function get_icon() {
		return 'eicon-slides';
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
				'label' => esc_html__( 'Image #1 (Size: 260-160)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image2',
			[
				'label' => esc_html__( 'Image #2 (Size: 260-160)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image3',
			[
				'label' => esc_html__( 'Image #3 (Size: 260-400)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image4',
			[
				'label' => esc_html__( 'Image #4 (Size: 260-180)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image5',
			[
				'label' => esc_html__( 'Image #5 (Size: 260-180)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'image6',
			[
				'label' => esc_html__( 'Image #6 (Size: 260-340)', 'ale' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image','ale'),
			]
		);
		$this->add_control(
			'title1', [
				'label' => esc_html__( 'Title #1', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'title2', [
				'label' => esc_html__( 'Title #2', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'menutitle', [
				'label' => esc_html__( 'Item Title', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'menudescription', [
				'label' => esc_html__( 'Item Description', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'menuprice', [
				'label' => esc_html__( 'Item Price', 'ale' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Menu Items', 'ale' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ menutitle }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();?>
        
            <div class="delizioso_menu_list">
				<div class="left_images">
					<div class="left_part">
						<?php if(!empty($settings['image1']['url'])){?>
							<img src="<?php echo esc_attr($settings['image1']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
							
						<?php if(!empty($settings['image2']['url'])){?>
							<img src="<?php echo esc_attr($settings['image2']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
					</div>
					<div class="right_part">
						<?php if(!empty($settings['image3']['url'])){?>
							<img src="<?php echo esc_attr($settings['image3']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
					</div>
				</div>
				<div class="menu_list_centered">
					<div class="delizioso_title_container">
						<?php if($settings['title1']){?>
							<div class="delizioso_title"><?php echo esc_html($settings['title1']); ?></div>
						<?php } ?>
						<?php if($settings['title2']){?>
							<h2 class="block_title"><?php echo esc_html($settings['title2']); ?></h2>
						<?php } ?>
					</div>
					<?php if($settings['list']) {?>
						<div class="menu_list_items">
							<?php foreach($settings['list'] as $list){ ?>
								<div class="item_container">
									<div class="top_line">
										<?php if(!empty($list['menutitle'])){?>
											<h4><?php echo esc_html($list['menutitle']); ?></h4>
										<?php } ?>
										<div class="separator"></div>
										<?php if(!empty($list['menuprice'])){?>
											<span class="price"><?php echo esc_html($list['menuprice']); ?></span>
										<?php } ?>
									</div>
									<div class="bottom_line">
										<?php if(!empty($list['menuprice'])){?>
											<div class="description"><?php echo esc_html($list['menudescription']); ?></div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<div class="right_images">
					<div class="left_part">
						<?php if(!empty($settings['image4']['url'])){?>
							<img src="<?php echo esc_attr($settings['image4']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
						<?php if(!empty($settings['image5']['url'])){?>
							<img src="<?php echo esc_attr($settings['image5']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
					</div>
					<div class="right_part">
						<?php if(!empty($settings['image6']['url'])){?>
							<img src="<?php echo esc_attr($settings['image6']['url']) ?>" alt ="<?php echo esc_html($settings['title1']); ?>"/>
						<?php } ?>
					</div>
				</div>		
			</div>
        <?php 
	}
}
