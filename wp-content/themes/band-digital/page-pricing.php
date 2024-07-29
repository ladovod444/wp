<?php
//echo 'See you soon';
?>

<?php //get_header('test'); ?>
<?php get_header(); ?>

<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Цены на услуги</h1>
                    <p>Подберите подходящий тариф</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->

<!-- PRICE AREA START  -->
<?php get_template_part( 'template-parts/content', 'price', [
	//'class' => 'bg-danger',
	//'cust_title' => 'Digital Custom Service'
] ); ?>
<!-- PRICE AREA END  -->

<!--  PARTNER START  -->
<?php get_template_part( 'template-parts/content', 'testimonial', [
	'cust_title' => 'Clients which trust as',
	'cust_descr' => 'Below are reviews from clients with whom we have been working for several years in a row',
] ); ?>

<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>

