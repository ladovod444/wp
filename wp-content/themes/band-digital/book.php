<?php get_header(); ?>

<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact"
     id="page-banner"
style="background: url(<?php
if (has_post_thumbnail()) {
	the_post_thumbnail_url();
}
else {
    echo get_template_directory_uri() . '/images/banner/1.jpg';
}
?>) no-repeat center/cover;">
	<div class="overlay dark-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="banner-content content-padding">
<!--					<h1 class="text-white">Пять способов обойти конкурентов</h1>-->
					<h1 class="text-white"><?php the_title(); ?></h1>
<!--					<p>Поисковая выдача — это всегда конкуренция. Но что делать, чтобы конкуренты остались позади вас? Отвечаю в статье</p>-->
					<p><?php
                        if (has_excerpt()) {
	                        the_excerpt();
                        }
                        ?></p>

                </div>
			</div>
		</div>
	</div>
</div>
<!--MAIN HEADER AREA END -->


<section class="section blog-wrap">
	<div class="container">
		<div class="row">
			<main class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">

                        <?php
                        while ( have_posts() ) :
	                        the_post();

	                        get_template_part( 'template-parts/content', get_post_type() );

//	                        the_post_navigation(
//		                        array(
//			                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'shop' ) . '</span> <span class="nav-title">%title</span>',
//			                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'shop' ) . '</span> <span class="nav-title">%title</span>',
//		                        )
//	                        );

	                        // If comments are open or we have at least one comment, load up the comment template.
	                        if ( comments_open() || get_comments_number() ) :
		                        comments_template();
	                        endif;

                        endwhile; // End of the loop.
                        ?>





					</div>
				</div>
			</main>

			<?php get_sidebar(); ?>
		</div>
	</div>
	</div>
</section>

<?php wp_footer(); ?>
<?php get_footer(); ?>
