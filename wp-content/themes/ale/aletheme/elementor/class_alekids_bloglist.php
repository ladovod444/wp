<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ale_Elementor_Widget_Alekids_Bloglist extends \Elementor\Widget_Base {

	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
	}

	public function get_name() {
		return 'alekids_bloglist';
	}

	public function get_title() {
		return esc_html__( 'Blog List', 'ale' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
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
			'count',
			[
				'label' => esc_html__( "Posts count", "ale" ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '3',
			]
        );
		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'ale' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'three',
				'options' => [
					'one'  => esc_html__( '1 Column', 'ale' ),
					'two' => esc_html__( '2 Columns', 'ale' ),
					'three' => esc_html__( '3 Columns', 'ale' ),
					'four' => esc_html__( '4 Columns', 'ale' ),
				],
			]
		);
        $this->add_control(
			'show_category',
			[
				'label' => esc_html__( 'Show category', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_image',
			[
				'label' => esc_html__( 'Show image', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_infoline',
			[
				'label' => esc_html__( 'Show info line', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_title',
			[
				'label' => esc_html__( 'Show title', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_excerpt',
			[
				'label' => esc_html__( 'Show excerpt', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
			'show_link',
			[
				'label' => esc_html__( 'Show Read More', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'ale' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ale' ),
				'label_off' => esc_html__( 'Hide', 'ale' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$posts_count = '-1';
		if(!empty($settings['count'])){
			$posts_count = $settings['count'];
		}
		
		$columns = 'three_columns';
		if(!empty($settings['columns'])) {
			$columns = $settings['columns'] . '_columns';
		}

		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$args = array(
			'post_type'=>'post',
			'posts_per_page'=>esc_attr($posts_count),
			'ignore_sticky_posts' => 1,
			'paged' => $paged,
		);
		
		$alekids_blogposts = new WP_Query($args);

		echo '<div class="posts_grid '.esc_attr($columns).'">';

		if ($alekids_blogposts->have_posts()) : while ($alekids_blogposts->have_posts()) : $alekids_blogposts->the_post(); 
            
			$archive_year  = get_the_time('Y'); 
			$archive_month = get_the_time('m'); 
			$archive_day   = get_the_time('d');
			$article_class = 'alekids_blog_preview';

			if(!get_the_post_thumbnail(get_the_ID())){
				$article_class .= ' no_featured_image';
			}?>

			<article <?php post_class(esc_attr($article_class)); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
				<?php if($settings['show_image'] == 'yes'){ ?>	
					<?php if(get_the_post_thumbnail(get_the_ID(),'large')){ ?>
						<div class="featured_image">
							<div class="featured_image_holder">
								<a href="<?php the_permalink(); ?>">
									<?php 
									if($settings['columns'] == 'one' or $settings['columns'] == 'two'){
										echo get_the_post_thumbnail(get_the_ID(),'post-featured');
									} else {
										echo get_the_post_thumbnail(get_the_ID(),'post-smallimage');
									}?>
								</a>
							</div>
							<?php if($settings['show_category'] == 'yes'){ ?>
								<span class="category font_one">
								<?php 
									$alekids_categories = get_the_category();

									if(!empty($alekids_categories)){
										$i = 0;
										foreach($alekids_categories as $cat){
											echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" rel="category tag">'.esc_html($cat->name).'</a>';
											$i++;
											if($i == 5) break;
										}
									}
								?>
								</span>
							<?php } ?>
						</div>
					<?php } ?>
				<?php } ?>
				<?php if($settings['show_infoline'] == 'yes'){ ?>
					<span class="post_info"><?php esc_html_e('By','ale');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a> <?php esc_html_e('posted on','ale');?> <?php echo '<a href="'.esc_attr(get_day_link( $archive_year, $archive_month, $archive_day)).'">'.get_the_date().'</a>'; ?></span>
				<?php } ?>
				<?php if($settings['show_title'] == 'yes'){ ?>
					<h3><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
				<?php } ?>
				<?php if($settings['show_excerpt'] == 'yes'){ ?>
					<?php echo wp_kses_post(ale_trim_excerpt(23)); ?>
				<?php } ?>

				<?php if($settings['show_link'] == 'yes'){ ?>
					<a class="read_more_blog font_one" href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e('Read More','ale'); ?></a>
				<?php } ?>		
			</article>
		<?php endwhile; ?> 
			<?php //Pagination
			if($settings['pagination'] == 'yes' && $alekids_blogposts->max_num_pages > 1){ ?>
				<div class="alekids_pagination">
					<div class="prev_posts">
						<?php if(get_previous_posts_link()) { 
							echo get_previous_posts_link('<svg width="100" height="100" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M92.748 7.822C92.736 3.8 91.902 0 87.866 0c-.116 0-.226.026-.338.035a4.567 4.567 0 0 0-1.453.122C57.547 7.464 31.648 22.965 8.677 41.05c-1.29 1.017-1.66 2.257-1.45 3.423-.09.62-.145 1.24-.146 1.869-.002 1.411.705 2.674 1.768 3.48.14.188.276.378.455.559 20.61 20.786 44.614 39.356 72.387 49.35.903.323 1.708.332 2.413.144 1.655-.026 3.29-.152 4.93-.458 2.067-.384 3.322-2.598 3.191-4.59.003-.09.026-.17.026-.263 0-26.3 1.4-52.584.15-78.876-.083-1.764.357-4.876.347-7.867Zm-9.247 83.256c-25.438-9.28-47.491-26.485-66.532-45.446 19.865-15.354 42.17-28.5 66.341-35.617 1.769 26.998.355 54.036.19 81.063Z" fill="#B3D0FD"/></svg>'); 
						} else { 
							echo '<svg width="100" height="100" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M92.748 7.822C92.736 3.8 91.902 0 87.866 0c-.116 0-.226.026-.338.035a4.567 4.567 0 0 0-1.453.122C57.547 7.464 31.648 22.965 8.677 41.05c-1.29 1.017-1.66 2.257-1.45 3.423-.09.62-.145 1.24-.146 1.869-.002 1.411.705 2.674 1.768 3.48.14.188.276.378.455.559 20.61 20.786 44.614 39.356 72.387 49.35.903.323 1.708.332 2.413.144 1.655-.026 3.29-.152 4.93-.458 2.067-.384 3.322-2.598 3.191-4.59.003-.09.026-.17.026-.263 0-26.3 1.4-52.584.15-78.876-.083-1.764.357-4.876.347-7.867Zm-9.247 83.256c-25.438-9.28-47.491-26.485-66.532-45.446 19.865-15.354 42.17-28.5 66.341-35.617 1.769 26.998.355 54.036.19 81.063Z" fill="#FEFBF4"/></svg>'; 
						} ?>
							
					</div>
					<div class="all_pages font_one">
						<?php 
						$big = 999999999; 
 
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $alekids_blogposts->max_num_pages,
							'show_all' => false,
							'type' => 'plain',
							'prev_next' => false,
						) );
						?>
					</div>
					<div class="next_posts">
					<?php if(get_next_posts_link('',$alekids_blogposts->max_num_pages)){
						echo  get_next_posts_link('<svg width="100" height="100" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M7.252 7.822C7.263 3.8 8.098 0 12.133 0c.116 0 .226.026.339.035a4.566 4.566 0 0 1 1.453.122C42.453 7.464 68.352 22.965 91.322 41.05c1.291 1.017 1.66 2.257 1.451 3.423.09.62.145 1.24.146 1.869.001 1.411-.705 2.674-1.769 3.48-.139.188-.275.378-.454.559-20.61 20.786-44.614 39.356-72.388 49.35-.902.323-1.707.332-2.413.144-1.655-.026-3.29-.152-4.93-.458-2.066-.384-3.321-2.598-3.19-4.59-.003-.09-.026-.17-.026-.263 0-26.3-1.4-52.584-.15-78.876.083-1.764-.357-4.876-.348-7.867Zm9.247 83.256c25.438-9.28 47.49-26.485 66.531-45.446-19.864-15.354-42.169-28.5-66.34-35.617-1.77 26.998-.355 54.036-.191 81.063Z" fill="#B3D0FD"/></g><defs><clipPath><path fill="#fff" transform="matrix(-1 0 0 1 100 0)" d="M0 0h100v100H0z"/></clipPath></defs></svg>',$alekids_blogposts->max_num_pages);
					} else { 
						echo '<svg width="100" height="100" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M7.252 7.822C7.263 3.8 8.098 0 12.133 0c.116 0 .226.026.339.035a4.566 4.566 0 0 1 1.453.122C42.453 7.464 68.352 22.965 91.322 41.05c1.291 1.017 1.66 2.257 1.451 3.423.09.62.145 1.24.146 1.869.001 1.411-.705 2.674-1.769 3.48-.139.188-.275.378-.454.559-20.61 20.786-44.614 39.356-72.388 49.35-.902.323-1.707.332-2.413.144-1.655-.026-3.29-.152-4.93-.458-2.066-.384-3.321-2.598-3.19-4.59-.003-.09-.026-.17-.026-.263 0-26.3-1.4-52.584-.15-78.876.083-1.764-.357-4.876-.348-7.867Zm9.247 83.256c25.438-9.28 47.49-26.485 66.531-45.446-19.864-15.354-42.169-28.5-66.34-35.617-1.77 26.998-.355 54.036-.191 81.063Z" fill="#FEFBF4"/></g><defs><clipPath><path fill="#fff" transform="matrix(-1 0 0 1 100 0)" d="M0 0h100v100H0z"/></clipPath></defs></svg>'; 
					} ?>
							
					</div>
				</div>
			<?php } ?>
		<?php else: 
			get_template_part('partials/notfound');
        endif;
		wp_reset_postdata();
		echo '</div>';
	}
}
