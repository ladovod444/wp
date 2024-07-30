<div class="page-banner-area page-contact" id="page-banner">
	<div class="overlay dark-overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
				<div class="banner-content content-padding">
					<h1 class="text-white">

						<?php if ( is_category() ): ?>
							<?php echo __( 'Category: ' );
							echo get_queried_object()->name; ?>
						<?php endif; ?>

						<?php if ( is_tag() ): ?>
							<?php echo __( 'Posts with tag: ' );
							echo get_queried_object()->name; ?>
						<?php endif; ?>

						<?php if ( is_author() ): ?>
							<?php echo __( 'Posts of the author: ' );
							echo get_queried_object()->display_name; ?>
						<?php endif; ?>

						<?php if ( is_date() ): ?>
							<?php echo __( 'Posts by date: ' );
							echo get_the_date( 'j F Y' ); ?>
						<?php endif; ?>

						<?php if ( is_tax( [ 'location', 'room_type' ] ) && isset( $data->taxonomy ) ): ?>
							<?php echo __( 'Rooms by ' . $data->taxonomy->taxonomy . ': ' );
							echo $data->taxonomy->name; ?>
						<?php endif; ?>

					</h1>

				</div>
			</div>
		</div>
	</div>
</div>