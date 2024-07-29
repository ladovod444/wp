<?php
	if(get_post_type() == 'works'){
		$thumb_name = 'works-squarelarge';
	} else {
		$thumb_name = 'post-squarelarge';
	}
?>
<div class="thumbs_line cf">
	<div class="wrapper cf">
		<div class="left_part">
			<div class="item">

				<?php
				$next_post = get_next_post();
				if (!empty( $next_post )){ ?>
					<div class="arrow_holder">
						<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					</div>
					<div class="image_holder">
						<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo get_the_post_thumbnail($next_post->ID,$thumb_name); ?></a><br />
						<span class="title"><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo esc_html($next_post->post_title); ?></a></span> <br />
						<span class="date"><?php echo esc_html(get_the_date('',$next_post->ID)); ?></span>
					</div>
				<?php } else { ?>
					<div class="arrow_holder">
						<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
					</div>
					<div class="image_holder">
						<?php echo get_the_post_thumbnail(get_the_ID(),$thumb_name); ?><br />
						<span class="title"><?php echo esc_html(get_the_title()); ?></span><br />
						<span class="date"><?php echo esc_html(get_the_date()); ?></span>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="right_part">
			<div class="item cf">
				<?php
				$prev_post = get_previous_post();
				if (!empty( $prev_post )){ ?>
					<div class="arrow_holder">
						<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
					<div class="image_holder">
						<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo get_the_post_thumbnail($prev_post->ID,$thumb_name); ?></a><br />
						<span class="title"><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo esc_html($prev_post->post_title); ?></a></span><br />
						<span class="date"><?php echo esc_html(get_the_date('',$prev_post->ID)); ?></span>
					</div>
				<?php } else {?>
					<div class="arrow_holder">
						<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</div>
					<div class="image_holder">
						<?php echo get_the_post_thumbnail(get_the_ID(),$thumb_name); ?><br />
						<span class="title"><?php echo esc_html(get_the_title()); ?></span><br />
						<span class="date"><?php echo esc_html(get_the_date()); ?></span>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>