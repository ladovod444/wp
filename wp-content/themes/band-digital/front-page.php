<?php
get_header();
?>
    <!--MAIN BANNER AREA START -->
    <div class="banner-area banner-3">
        <div class="overlay dark-overlay"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
<!--                                <h5 class="subtitle">--><?php //echo get_post_meta( $post->ID, 'subtitle', true ); ?><!--</h5>-->
                                <h5 class="subtitle"><?php echo get_post_field('title') ?></h5>
<!--                                <h1 class="banner-title">--><?php //echo get_post_meta( $post->ID, 'banner-title', true ); ?><!--</h1>-->
                                <h1 class="banner-title"><?php echo get_post_field('banner_title') ?></h1>
                                <?php //var_dump(get_post_field('banner_description')); ?>
                                <p>
<!--									--><?php //echo get_post_meta( $post->ID, 'banner-description', true ); ?>
	                                <?php   echo get_post_field('banner_description') ?>

                                </p>

                                <a href="#"
                                   class="btn btn-white btn-circled"><?php echo get_post_meta( $post->ID, 'start-cooperation', true ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->

    <div class="section-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="section-heading">
                        <p class="lead">
							<?php the_content(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--  SERVICE AREA START  -->
    <section id="about" class="bg-light">
        <div class="about-bg-img d-none d-lg-block d-md-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12 col-md-8">
                    <div class="about-content">
                        <h5 class="subtitle">О нас</h5>
                        <h3>Мы делаем рабочий инструмент <br/>для вашего бизнеса</h3>
                        <p>
                            Мы создадим сайт про вашу компанию и вам не придется заказывать услуги у фрилансеров,
                            переживая за сроки
                            проекта и его качество. В нашей команде есть все нужные специалисты, которые сделаю отличный
                            сайт
                        </p>

                        <ul class="about-list">
                            <li><i class="icofont icofont-check-circled"></i> Адаптивный</li>
                            <li><i class="icofont icofont-check-circled"> </i> С анимацией</li>
                            <li><i class="icofont icofont-check-circled"> </i> С чистым кодом</li>
                            <li><i class="icofont icofont-check-circled"> </i> Готовый к использованию</li>
                            <li><i class="icofont icofont-check-circled"> </i> Настроенный под SEO</li>
                            <li><i class="icofont icofont-check-circled"></i> Кроссбраузерный</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->

<?php get_template_part( 'template-parts/content', 'service', [
	'class' => 'bg-danger',
    'cust_title' => 'Digital Custom Service'
] ); ?>

    <!-- PRICE AREA START  -->
<?php get_template_part( 'template-parts/content', 'price', [
	//'class' => 'bg-danger',
	//'cust_title' => 'Digital Custom Service'
] ); ?>
    <!-- PRICE AREA END  -->

    <!--  TESTIMONIAL AREA START  -->

<?php get_template_part( 'template-parts/content', 'testimonial', [
	'cust_title' => 'Clients which trust as',
	'cust_descr' => 'Below are reviews from clients with whom we have been working for several years in a row',
] ); ?>


    <!--  TESTIMONIAL AREA END  -->
    <!--  PARTNER START  -->
<?php get_template_part( 'template-parts/content', 'partner'); ?>
    <!--  PARTNER END  -->
    <!--  BLOG AREA START  -->

<?php get_template_part( 'template-parts/content', 'magazine'); ?>


    <!--  BLOG AREA END  -->

    <!--  COUNTER AREA START  -->

<?php //var_dump(get_post_field('client_num')); die(); ?>

<?php get_template_part( 'template-parts/content', 'count-area',[
	//'clients' => get_post_meta( $post->ID, 'clients', true ),
	'clients' => get_post_field('clients_count'),
	//'clients' => get_post_field('digits', $post->ID),
	'current-projects' => get_post_meta( $post->ID, 'current-projects', true ),
	//'done-projects' => get_post_meta( $post->ID, 'done-projects', true ),
	'done-projects' => get_post_field('done_projects'),
	'team' => get_post_meta( $post->ID, 'team', true ),
]); ?>
    <!--  COUNTER AREA END  -->
<?php wp_footer(); ?>
<?php get_footer(); ?>