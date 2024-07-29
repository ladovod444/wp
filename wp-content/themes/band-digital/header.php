<!DOCTYPE html>
<html <?php language_attributes(); ?>">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="seo & digital marketing"/>
    <meta
            name="keywords"
            content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company"
    />
	<?php wp_head(); ?>
<!--    <title>Promodise - seo and digital агентство</title>-->

</head>

<body data-spy="scroll" data-target=".fixed-top">
<nav class="navbar navbar-expand-lg fixed-top trans-navigation">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <!--			<img src="images/logo.png" alt="" class="img-fluid b-logo" />-->
			<?php if ( has_custom_logo() ) {
				the_custom_logo();
			} ?>
        </a>
<!--	    --><?php //if ( has_custom_logo() ) {
//		    if ( has_custom_logo() ) {
//			    the_custom_logo();
//		    }
//	    } else {
//
//	    }
//	    ?>
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon">
            <i class="fa fa-bars"></i>
          </span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <?php
            wp_nav_menu( [
	            'theme_location'  => 'header',
	            'menu_class'      => 'navbar-nav',
	            'echo'            => true,
	            'fallback_cb'     => 'wp_page_menu',
	            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	            'walker'          => new bootstrap_4_walker_nav_menu(),
                'depth' => 2,
            ] );
            ?>
        </div>
    </div>
</nav>
<!--MAIN HEADER AREA END -->