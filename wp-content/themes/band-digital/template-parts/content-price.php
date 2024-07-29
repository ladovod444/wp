<section id="pricing" class="section-padding bg-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading">
                    <h4 class="section-title">Доступные тарифы для вас</h4>
                    <p>Подберите тот, который подходит вам больше всего</p>
                </div>
            </div>
        </div>

		<?php
		// задаем нужные нам критерии выборки данных из БД
		$query = new WP_Query( [
			'post_type'      => 'price',
			'posts_per_page' => 3,
			'orderby'        => 'publish_date',
			'order'          => 'ASC',
		] );

		// Цикл
		global $post;
		?>

        <div class="row">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pricing-block">
                            <div class="price-header">

								<?php //$icofont = get_post_custom_values( 'icofont' ); ?>
								<?php $icofont = get_post_meta( $post->ID, 'icofont', true ) ? get_post_meta( $post->ID, 'icofont', true ) : 'alarm'; ?>
                                <i class="icofont-<?php echo $icofont; ?>"></i>
                                <!--                                <i class="icofont--->
								<?php ////echo $icofont[0]; ?><!--"></i>-->

                                <h4 class="price"><?php the_title(); ?><small>₽</small></h4>
                                <h5>ежемесячно</h5>
                            </div>
                            <div class="line"></div>
							<?php the_content(); ?>

                            <a href="#" class="btn btn-hero btn-circled">выбрать тариф</a>
                        </div>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
	        <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>