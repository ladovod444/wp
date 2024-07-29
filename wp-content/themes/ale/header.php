<?php if(isset($_POST['contact'])) { $error = ale_send_contact($_POST['contact']); }?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <?php get_template_part('partials/preloader'); ?>
    <div class="wrapper olins_site_container"><!-- Wrapper start -->
        <?php
        //Show the Header based on Theme Options Settings
        do_action('aletheme_specific_header');