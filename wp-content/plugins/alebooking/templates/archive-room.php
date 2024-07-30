<?php //echo __FILE__; ?>
<?php get_header(); ?>

<?php

$instance = new AleBooking( 't' );
if ( is_tax(
	[ 'location', 'room_type' ]
) ) {
	$taxonomy = get_queried_object();
}

$templates = new Ale_Booking_Template_Loader();

?>

<!--MAIN BANNER AREA START -->
<?php
if (isset($taxonomy)) {
	$templates
		// Pass needed data.
		->set_template_data( [
			'taxonomy' => $taxonomy,
		] );
}
$templates->get_template_part( 'room', 'header' );
?>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
    <div class="container">

        <div class="booking-rooms">
            <h1> <?php echo isset( get_option( 'booking_settings_options' )['title_for_rooms'] ) ? get_option( 'booking_settings_options' )['title_for_rooms'] : 'NO TITLE'; ?> </h1>

			<?php if ( ! is_tax( [ 'location', 'type' ] ) ): ?>

				<?php
				$templates
//					// Pass needed data.
					->set_template_data( [
						'instance'   => $instance,
					] )
					->get_template_part( 'room', 'filter' );
				?>
			<?php endif; ?>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Если выбраны фильтры и нажата кнопка сабмит -->
						<?php if ( ! empty( $_POST['submit'] ) ): ?>
							<?php
							$args = [
								'post_type'      => 'room',
								'posts_per_page' => get_option( 'booking_settings_options' )['post_per_page'] ?? - 1,
//							'orderby'        => 'publish_date',
//							'order'          => 'ASC',
								'tax_query'      => [ 'relation' => 'AND' ],
								'meta_query'      => [ 'relation' => 'AND' ],
							];

                            if ( ! empty( $_POST['price_down'] ) && ! empty( $_POST['price_up'] ) ) {
	                            $args['meta_query'][] = [
		                            'key' => 'alebooking_price',
                                    'value' => [
	                                    $_POST['price_down'], $_POST['price_up'],
                                    ],
		                            'type' => 'numeric',
                                    'compare' => 'BETWEEN',
	                            ];
                            }

							if ( ! empty( $_POST['beds_count'] ) ) {
								$args['meta_query'][] = [
									'key' => 'alebooking_beds_count',
									'value' => [
										$_POST['beds_count'],
									],
									'type' => 'numeric',
									'compare' => '>=',
								];
							}

                            //var_dump($args); die();

							if ( ! empty( $_POST['location'] ) && $_POST['location'] != 'Select location' ) {
								$args['tax_query'][] = [
									'taxonomy' => 'location',
									'terms'    => $_POST['location']
								];
							}

							if ( ! empty( $_POST['room_type'] ) && $_POST['room_type'] != 'Select type' ) {
								$args['tax_query'][] = [
									'taxonomy' => 'room_type',
									'terms'    => $_POST['room_type']
								];

                                //var_dump($args); die();
							}

							$rooms_listing = new WP_Query( $args );
							$paged         = 1;
							if ( get_query_var( 'paged' ) ) {
								$paged = get_query_var( 'paged' );
							}
							if ( get_query_var( 'page' ) ) {
								$page = get_query_var( 'page' );
							}
							$args['paged'] = $paged;

							?>
						<?php else: ?> <!-- Default -->
							<?php
							$paged = 1;
							if ( get_query_var( 'paged' ) ) {
								$paged = get_query_var( 'paged' );
							}
							if ( get_query_var( 'page' ) ) {
								$page = get_query_var( 'page' );
							}
							$args          = [
								'post_type'      => 'room',
								'posts_per_page' => get_option( 'booking_settings_options' )['post_per_page'] ?? - 1,
								'paged'          => $paged,

							];
							$rooms_listing = new WP_Query( $args );
							?>
						<?php endif; ?>
						<?php $post_count = 0; ?>
						<?php if ( $rooms_listing->have_posts() ) : while ( $rooms_listing->have_posts() ) : $rooms_listing->the_post(); ?>
							<?php $post_count ++ ?>
                            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                            <!-- Blog post -->
                            <div class="<?php echo $post_count % 3 !== 0 ? 'col-lg-6' : 'col-lg-12'; ?>"
                                 id="room-<?php the_ID(); ?>">

                                <!-- use content-room template -->
								<?php
								$templates
                                    // Pass needed data.
									->set_template_data( [
										'post_count' => $post_count,
										'instance'   => $instance
									] )
									->get_template_part( 'content', 'room' );
								?>
                            </div>

						<?php endwhile; else: ?>
                            Записей нет.
						<?php endif; ?>

						<?php
						//						$args = array(
						//							'show_all'           => false,
						//							// показаны все страницы участвующие в пагинации
						//							'end_size'           => 1,
						//							// количество страниц на концах
						//							'mid_size'           => 1,
						//							// количество страниц вокруг текущей
						//							'prev_next'          => true,
						//							// выводить ли боковые ссылки "предыдущая/следующая страница".
						//							'prev_text'          => __( '<span class="p-2 border">« Prev</span>' ),
						//							'next_text'          => __( '<span class="p-2 border">Next »</span>' ),
						//							'add_args'           => false,
						//							// Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
						//							'add_fragment'       => '',
						//							// Текст который добавиться ко всем ссылкам.
						//							'screen_reader_text' => __( 'Posts navigation' ),
						//							'class'              => 'pagination',
						//							// CSS класс, добавлено в 5.5.0.
						//							'before_page_number' => '<span class="p-2">',
						//							'after_page_number'  => '</span>',
						//						);

						?>
                        <!--                        <div class="col-lg-12">-->
						<?php //the_posts_pagination( $args ); ?><!--</div>-->
                        <div class="col-lg-12"><?php
							$big  = 999999999; // уникальное число для замены
							$args = array(
								'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
								'format'  => '',
								'current' => max( 1, get_query_var( 'paged' ) ),
								'total'   => $rooms_listing->max_num_pages,
							);

							$result = paginate_links( $args );
							echo $result;

							?></div>

                    </div>

                </div>

				<?php //get_sidebar(); ?>

            </div>
        </div>
    </div>
    </div>
</section>

<?php wp_footer(); ?>
<?php get_footer(); ?>
