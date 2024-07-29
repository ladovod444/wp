<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center text-lg-left">
                <div class="mb-5">
                    <h3 class="mb-2">Эти компании доверяют нам</h3>
                    <p>Компании, с которыми мы работаем давно</p>
                </div>
            </div>
        </div>

		<?php
		// задаем нужные нам критерии выборки данных из БД
		$query = new WP_Query( [
			'post_type'      => 'partner',
			'posts_per_page' => 6,
			'orderby'        => 'comment_count'
		] );

		// Цикл
		global $post;
		?>

        <div class="row">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>
                    <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="partner" class="img-fluid"/>
                    </div>
				<?php endwhile; else: ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>