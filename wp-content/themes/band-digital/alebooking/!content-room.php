


<?php
/*
 *
 * */



$instance = $data->instance;
//echo 'in theme'; die();
?>

<div class="blog-post rewritten-in-theme">
	<?php
	$default_attr = [];
	$size         = $data->post_count % 3 !== 0 ? 'band-digital' : 'large';
	$default_attr = array(
		'class' => "attachment-$size img-fluid dddd" . ( $data->post_count % 3 !== 0 ? '' : ' w-100' ),
	);
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $size, $default_attr );
	} else {
		echo '<img class="img-fluid" src="' . get_bloginfo( "template_url" ) . '/images/blog/blog-1.jpg" />';
	}

	?>
	<div class="mt-4 mb-3 d-flex">
		<div class="post-author mr-3">
			<i class="fa fa-user"></i>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"
			   class="h6 text-uppercase"><?php the_author(); ?></a>
		</div>

		<div class="post-info">
			<i class="fa fa-calendar-check"></i>
			<span><?php the_time( 'Y-m-d h:i:s' ); ?></span>
		</div>
	</div>
	<a href="<?php echo get_the_permalink(); ?>"
	   class="h4 "><?php the_title(); ?></a>
	<p class="mt-3"><?php the_excerpt(); ?></p>

	<?php $instance->get_taxonomy_for_room_archive( 'location', $post->ID ); ?>
	<?php $instance->get_taxonomy_for_room_archive( 'type', $post->ID ); ?>


	<a href="<?php echo get_the_permalink(); ?>" class="read-more">Читать статью <i
			class="fa fa-angle-right"></i></a>

</div>
