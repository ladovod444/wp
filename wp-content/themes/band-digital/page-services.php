<?php
get_header();
?>
    <!--MAIN BANNER AREA START -->
    <div class="page-banner-area page-service" id="page-banner">
        <div class="overlay dark-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                    <div class="banner-content content-padding">
                        <h1 class="text-white"><?php the_title(); ?></h1>
                        <p>Мы оказываем весь спект диджитал услуг</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->


    <!--  SERVICE BLOCK2 START  -->
    <section id="service-2" class="section-padding">
        <div class="container">
			<?php if ( ! dynamic_sidebar( 'sidebar-services' ) ): ?>
				<?php dynamic_sidebar( 'sidebar-services' ); ?>
			<?php endif; ?>
        </div>
    </section>
    <!--  SERVICE BLOCK2 END  -->

    <!--  SERVICE AREA START  -->
    <section class="section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-sm-12 col-md-6 mb-4">
                    <img src="images/bg/2-min.jpg" alt="feature bg" class="img-fluid"/>
                </div>

                <div class="col-lg-7 pl-4">
                    <div class="mb-5">
                        <h3 class="mb-4">Мы создаем эффективный <br/>дизайн сайтов</h3>
                        <p>
                            Все наши проекты создаются креативными веб-дизайнерами, соблюдая все современнные тенденции
                            в этой сфере. Лучшие специалисты будут создавать продукт для вас.
                        </p>
                    </div>

                    <ul class="about-list">
                        <li>
                            <h5 class="mb-2"><i class="icofont icofont-check-circled"></i>Адаптивные сайты</h5>
                            <p>Сайты хорошо смотрятся на смартфонах.</p>
                        </li>

                        <li>
                            <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i> Фреймворки</h5>
                            <p>В работе используются React, Bootstrap и др.</p>
                        </li>

                        <li>
                            <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i>Кроссбраузерно</h5>
                            <p>Смотреться сайт будет одинаково хорошо во всех браузерах.</p>
                        </li>
                        <li>
                            <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i>Retina Friendly</h5>
                            <p>Сайт создаются так, чтобы вся графика выглядела красиво на устройствах с Retina
                                дисплеями.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->
    <!--  SERVICE PARTNER START  -->
<?php get_template_part( 'template-parts/content', 'service', [
	'class' => 'service-style-two',
	'cust_title' => 'Digital Service Service',
	'sub_title' => 'This means that we can complete any digital task: video, marketing, advertising, development or design.',
] ); ?>

    <!--  SERVICE AREA END  -->

    <!--  PARTNER START  -->
<?php get_template_part( 'template-parts/content', 'partner'); ?>
    <!--  PARTNER END  -->
<?php wp_footer(); ?>
<?php get_footer(); ?>