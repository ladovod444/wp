<!--  SERVICE PARTNER START  -->
<section id="service-head" class="<?php echo $args['class'] ?? ''; ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12 m-auto">
				<div class="heading text-white text-center">
					<h4 class="section-title text-white"><?php
                        if (!empty($args['cust_title'])) {
	                        echo $args['cust_title'];
                        } else {
                            echo 'no title specified';
                        } ?></h4>
					<p><?php
						if (!empty($args['sub_title'])) {
							echo $args['sub_title'];
						} else {
							echo 'Это означает, что мы сможем выполнить любую цифровую задачу: <br/>видео, маркетинг, реклама, разработка или дизайн.';
						} ?></h4>

					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  SERVICE PARTNER END  -->

<!--					-->
<?php
// задаем нужные нам критерии выборки данных из БД
$query = new WP_Query( [
	'post_type'      => 'service',
	'posts_per_page' => 6,
	'orderby'        => 'comment_count'
] );

// Цикл
global $post;
?>
<section id="service">
	<div class="container">
		<div class="row">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>
					<div class="col-lg-4 col-sm-6 col-md-6">
						<div class="service-box">
							<div class="service-img-icon">
								<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="service-icon" class="img-fluid"/>
							</div>
							<div class="service-inner">
								<h4><?php the_title(); ?></h4>
								<p>
									<?php the_excerpt(); ?>
								</p>
							</div>
						</div>
					</div>

				<?php endwhile; else: ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

		</div>
	</div>
</section>

<!--  SERVICE AREA END  -->