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

<!--					--><?php
//					// задаем нужные нам критерии выборки данных из БД
//					$query = new WP_Query( [
//						'posts_per_page' => 5,
//						'orderby'        => 'comment_count'
//					] );
//
//					// Цикл
//					global $post;
//					?>
<!---->
<!--					--><?php //if ( $query->have_posts() ) : ?>
<!--						--><?php //while ( $query->have_posts() ) : ?>
<!--							--><?php //$query->the_post(); ?>
<!--                            <div class="col-lg-6">-->
<!--                                <div class="blog-post">-->
<!--                                    --><?php //the_title(); ?>
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--						--><?php //endwhile; else: ?>
<!--                        // Постов не найдено-->
<!--					--><?php //endif; ?>
<!--                    --><?php //wp_reset_postdata(); ?>

	                <?php $post_count = 0; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php $post_count++ ?>
                    <?php //echo $post_count . ' остаток = ' . $post_count % 3; ?>
                    <?php //switch ($post_count) ?>
                    <?php $class = $post_count % 3 !== 0 ? 'col-lg-6' : 'col-lg-12';  ?>
                        <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                        <!-- Blog post -->
                        <div class="<?php echo $class; ?>">
                            <div class="blog-post">
								<?php
								$default_attr = [];
								$size         = 'medium';
								$default_attr = array(
									//'src'   => $src,
									'class' => "attachment-$size img-fluid",
									//'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
								);
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( $size, $default_attr );
								} else {
									echo '<img class="img-fluid" src="' . get_bloginfo( "template_url" ) . '/images/blog/blog-1.jpg" />';
								}


								?>
                                <img src="images/blog/blog-1.jpg" alt="" class="img-fluid">
                                <div class="mt-4 mb-3 d-flex">
                                    <div class="post-author mr-3">
                                        <i class="fa fa-user"></i>
                                        <span class="h6 text-uppercase"><?php the_author(); ?></span>
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


                    <div class="col-lg-6">
                        <div class="blog-post">
                            <img src="images/blog/blog-2.jpg" alt="" class="img-fluid">
                            <div class="mt-4 mb-3 d-flex">
                                <div class="post-author mr-3">
                                    <i class="fa fa-user"></i>
                                    <span class="h6 text-uppercase">Олег Торпяков</span>
                                </div>

                                <div class="post-info">
                                    <i class="fa fa-calendar-check"></i>
                                    <span>12 апреля 2020</span>
                                </div>
                            </div>
                            <a href="blog-single.html" class="h4 ">Использовать шаблоны — плохо? </a>
                            <p class="mt-3">Отвечаю на больной вопрос от наших клиентов: стоит ли использовать шаблоны
                                для сайта в своих проектах.</p>
                            <a href="blog-single.html" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <img src="images/blog/blog-lg.jpg" alt="" class="img-fluid">
                            <div class="mt-4 mb-3 d-flex">
                                <div class="post-author mr-3">
                                    <i class="fa fa-user"></i>
                                    <span class="h6 text-uppercase">Марина Цветкова</span>
                                </div>

                                <div class="post-info">
                                    <i class="fa fa-calendar-check"></i>
                                    <span>30 марта 2020</span>
                                </div>
                            </div>
                            <a href="blog-single.html" class="h4 ">Провал в стратегии продвижения</a>
                            <p class="mt-3">Что делать, если вы наняли некомпетентного специалиста для продвижения?
                                Можно ли спасти проект, который попал в теневой бан или нет.</p>
                            <a href="blog-single.html" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-post">
                            <img src="images/blog/blog-3.jpg" alt="" class="img-fluid">
                            <div class="mt-4 mb-3 d-flex">
                                <div class="post-author mr-3">
                                    <i class="fa fa-user"></i>
                                    <span class="h6 text-uppercase">Оксана Вальнова</span>
                                </div>

                                <div class="post-info">
                                    <i class="fa fa-calendar-check"></i>
                                    <span>1 декабря 2019</span>
                                </div>
                            </div>
                            <a href="blog-single.html" class="h4 ">Пять способов обойти конкурентов</a>
                            <p class="mt-3">Поисковая выдача — это всегда конкуренция. Но что делать, чтобы конкуренты
                                остались позади вас? Отвечаю в статье</p>
                            <a href="blog-single.html" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="blog-post">
                            <img src="images/blog/blog-4.jpg" alt="" class="img-fluid">
                            <div class="mt-4 mb-3 d-flex">
                                <div class="post-author mr-3">
                                    <i class="fa fa-user"></i>
                                    <span class="h6 text-uppercase">Мишель Ким</span>
                                </div>

                                <div class="post-info">
                                    <i class="fa fa-calendar-check"></i>
                                    <span>10 ноября 2019</span>
                                </div>
                            </div>
                            <a href="blog-single.html" class="h4 ">Лучшие сервисы для продвижения вашего сайта</a>
                            <p class="mt-3">Существуют сервисы, котоорые могут помочь продвинуть сайт по СЕО, но есть и
                                мошенники, которые могут оставить вас без денег.</p>
                            <a href="blog-single.html" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sidebar-widget search">
                            <div class="form-group">
                                <input type="text" placeholder="поиск" class="form-control">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget about-bar">
                            <h5 class="mb-3">О нас</h5>
                            <p>Мы — маркетинговое агентство полного цикла, которое оказывает диджитал услуги стартапам и
                                крупным компаниям</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget category">
                            <h5 class="mb-3">Рубрики</h5>
                            <ul class="list-styled">
                                <li>Маркетинг</li>
                                <li>Диджитал</li>
                                <li>SEO</li>
                                <li>Веб-дизайн</li>
                                <li>Разработка</li>
                                <li>Видео</li>
                                <li>Подкаст</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget tag">
                            <a href="#">web</a>
                            <a href="#">development</a>
                            <a href="#">seo</a>
                            <a href="#">marketing</a>
                            <a href="#">branding</a>
                            <a href="#">web deisgn</a>
                            <a href="#">Tutorial</a>
                            <a href="#">Tips</a>
                            <a href="#">Design trend</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-widget download">
                            <h5 class="mb-4">Полезные файлы</h5>
                            <a href="#"> <i class="fa fa-file-pdf"></i>Презентация Promodise</a>
                            <a href="#"> <i class="fa fa-file-pdf"></i>10 источников бесплатного SEO</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php wp_footer(); ?>
<?php get_footer(); ?>
