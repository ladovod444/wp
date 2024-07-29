<?php echo __FILE__; ?>
<?php get_header(); ?>
<?php $instance = new AleBooking( 't' );
$taxonomy = get_queried_object();
$templates = new Ale_Booking_Template_Loader();
?>

<!--MAIN BANNER AREA START -->
<?php
$templates
	// Pass needed data.
	->set_template_data( [
		'taxonomy' => $taxonomy,
	] )
	->get_template_part( 'room', 'header' );
?>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">

					<?php $post_count = 0; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $post_count++ ?>
						<!-- Вывод постов, функции цикла: the_title() и т.д. -->
						<!-- Blog post -->
						<div class="<?php echo $post_count % 3 !== 0 ? 'col-lg-6' : 'col-lg-12'; ?>">

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
					$args = array(
						'show_all'     => false, // показаны все страницы участвующие в пагинации
						'end_size'     => 1,     // количество страниц на концах
						'mid_size'     => 1,     // количество страниц вокруг текущей
						'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
						'prev_text'    => __('<span class="p-2 border">« Prev</span>'),
						'next_text'    => __('<span class="p-2 border">Next »</span>'),
						'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
						'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
						'screen_reader_text' => __( 'Posts navigation' ),
						'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
						'before_page_number' =>'<span class="p-2">',
						'after_page_number' =>'</span>',
					);

					?>
					<div class="col-lg-12"><?php the_posts_pagination( $args ); ?></div>

				</div>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
	</div>
</section>

<?php wp_footer(); ?>
<?php get_footer(); ?>
