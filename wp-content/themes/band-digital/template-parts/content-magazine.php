<section id="blog" class="section-padding bg-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading">
                    <h4 class="section-title">Журнал</h4>
                    <div class="line"></div>
                    <p>
                        Мы публикуем в блоге интересные кейсы наших клиентов, возможно, <br/>
                        вы найдете много полезного для себя и своего бизнеса
                    </p>
                </div>
            </div>
        </div>


		<?php
		// задаем нужные нам критерии выборки данных из БД
		$query = new WP_Query( [
			'post_type'      => 'post',
			'posts_per_page' => 3,

            // Sticky posts do add to the post count rather than being included in it. You can alter your query to ignore sticky posts though.
			'ignore_sticky_posts' => true
//			'orderby'        => 'post_date',
//			'order_type'        => 'asc'
		] );

		// Цикл
		//global $post;

        //echo count($query->posts); die();

		?>
        <div class="row">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="blog-block">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="img-fluid"/>
                            <div class="blog-text">
                                <?php $category = get_the_category();?>
                                <?php $category_url = get_category_link($category[0]->cat_ID);
                                ?>
                                <h6 class="author-name"><span>
                                      <a href="<?php echo $category_url; ?>"><?php echo $category[0]->name; ?></a></span>
                                    <?php the_author(); ?></h6>
                                <a href="<?php the_permalink(); ?>" class="h5 my-2 d-inline-block"> <?php the_title(); ?> </a>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
				<?php endwhile; else: ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

        </div>
    </div>
</section>