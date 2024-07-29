<?php
/*
 * Template name: TaxiPress Page
 * */if(isset($_POST['contact'])) { $error = ale_send_contact($_POST['contact']); }?>
<!doctype html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part('partials/preloader'); ?>

<div class="wrapper olins_site_container">
    <?php get_template_part('partials/header/taxipress'); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <?php the_content(); ?>

    <?php endwhile; endif; ?>

    <?php get_template_part('partials/footer/taxipress'); ?>
</div> <!-- Main Container End -->
<?php wp_footer(); ?>

</body>
</html>




