<?php get_header(); ?>

<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Promodise журнал</h1>
                    <p>Полезные статьи про маркетинг и диджитал</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">


	                <?php $post_count = 0; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php $post_count++ ?>

<!--                    --><?php //switch ($post_count) {
//                            case :
//                                break;
//                        } ?>
                    <?php //$class = $post_count % 3 !== 0 ? 'col-lg-6' : 'col-lg-12';  ?>
                        <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                        <!-- Blog post -->
                        <div class="<?php echo $post_count % 3 !== 0 ? 'col-lg-6' : 'col-lg-12'; ?>">
                            <div class="blog-post">
								<?php
								$default_attr = [];
								//$size         = $post_count % 3 !== 0 ? 'medium' : 'large';
								$size         = $post_count % 3 !== 0 ? 'band-digital' : 'large';
                               // $class = "attachment-$size img-fluid";
                                //$class .= $post_count % 3 !== 0 ? '' : ' w-100';
								$default_attr = array(
									//'src'   => $src,
                                    //'class' => "new best qqqq"
									'class' => "attachment-$size img-fluid dddd" . ($post_count % 3 !== 0 ? '' : ' w-100'),
									//'class' => $class,
									//'classes' => "attachment-$size img-fluid dddd" . $post_count % 3 !== 0 ? '' : ' w-100',
									//'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
								);
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( $size, $default_attr );
								} else {
									echo '<img class="img-fluid" src="' . get_bloginfo( "template_url" ) . '/images/blog/blog-1.jpg" />';
								}


								?>
                                <img src="images/blog/blog-1.jpg" alt="" class="img-fluid <?php echo $post_count % 3 !== 0 ? '' : 'w-100'; ?>">
                                <div class="mt-4 mb-3 d-flex">
                                    <div class="post-author mr-3">
                                        <i class="fa fa-user"></i>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="h6 text-uppercase"><?php the_author(); ?></a>
                                    </div>

                                    <div class="post-info">
                                        <i class="fa fa-calendar-check"></i>
                                        <span><?php the_time( 'Y-m-d h:i:s' ); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo get_the_permalink(); ?>" class="h4 "><?php the_title(); ?></a>
                                <p class="mt-3"><?php the_excerpt(); ?></p>
                                <a href="<?php echo get_the_permalink(); ?>" class="read-more">Читать статью <i
                                            class="fa fa-angle-right"></i></a>
                            </div>
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
