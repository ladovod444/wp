<?php
// задаем нужные нам критерии выборки данных из БД
$query = new WP_Query( [
	'post_type'      => 'testimonial',
	'posts_per_page' => 3,
	//'orderby'        => 'comment_count'
] );

// Цикл
global $post;
?>

<section id="testimonial" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="mb-5">
                    <h3 class="mb-2"><?php if ( ! empty( $args['cust_title'] ) ) {
							echo $args['cust_title'];
						} else {
							echo 'no title specified';
						} ?></h3>
                    <p>
						<?php if ( ! empty( $args['cust_descr'] ) ) { //cust_descr
							echo $args['cust_descr'];
						} else {
							echo 'No description specified';
						} ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                <div class="carousel slide" id="test-carousel2">
                    <div class="carousel-inner">
                        <ol class="carousel-indicators">
							<?php for ( $i = 0; $i < count( $query->posts ); $i ++ ): ?>
                                <li data-target="#test-carousel2"
                                    data-slide-to="<?php echo $i; ?>" <?php echo ! $i ? 'class="active"' : '' ?>"></li>
							<?php endfor; ?>
							<?php wp_reset_postdata(); ?>
                        </ol>

						<?php if ( $query->have_posts() ) : ?>
							<?php $post_count = 0; ?>
							<?php while ( $query->have_posts() ) : ?>
								<?php $query->the_post(); ?>
                                <div class="carousel-item <?php echo ! $post_count ? 'active' : '' ?>">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="testimonial-content style-2">
                                                <div class="author-info">
                                                    <div class="author-img">
                                                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""
                                                             class="img-fluid"/>
                                                    </div>
                                                </div>

                                                <p>
                                                    <i class="icofont icofont-quote-left"></i><?php the_excerpt(); ?><i
                                                            class="icofont icofont-quote-right"></i>
                                                </p>
                                                <div class="author-text">
                                                    <h5><?php the_title(); ?></h5>
													<?php $position = get_post_meta( $post->ID, 'position', true ) ? get_post_meta( $post->ID, 'position', true ) : 'not defined'; ?>
                                                    <p><?php echo $position; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php $post_count ++; ?>
							<?php endwhile; else: ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>