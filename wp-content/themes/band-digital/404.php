<?php get_header(); ?>

<!--MAIN BANNER AREA START -->
<div class="banner-area banner-3">
	<div class="overlay dark-overlay"></div>
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
						<div class="banner-content content-padding">
<!--							--><?php
//							if (is_404()) {
//								echo 'Page is not found';
//							}
//							?>
							<h5 class="subtitle">Ошибка 404</h5>
							<h1 class="banner-title">Page not found</h1>
							<p>
								You are trying to access page which is not exists. Please try to find it
							</p>
							<?php the_widget('WP_Widget_Search'); ?>

							<a href="/" class="btn btn-white btn-circled">Go to front page</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--MAIN HEADER AREA END -->

<?php get_footer(); ?>
