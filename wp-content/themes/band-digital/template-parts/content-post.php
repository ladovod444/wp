<div class="blog-post">
	<?php //the_post(); ?>
<!--	<div style="color:red; font-size:30px;">--><?php //the_content(); ?><!--</div>-->

<!--	<img src="images/blog/blog-lg.jpg" alt="" class="img-fluid">-->
<!--    --><?php //the_post_thumbnail('300'); ?>
	<div class="mt-4 mb-3 d-flex">
		<div class="post-author mr-3">
			<i class="fa fa-user"></i>
			<span class="h6 text-uppercase"><?php echo get_the_author(); ?></span>
		</div>

		<div class="post-info">
			<i class="fa fa-calendar-check"></i>
			<span><?php the_date('d F Y'); ?></span>
		</div>
	</div>

<!--	<a href="#" class="h4 ">--><?php //the_title(); ?><!--</a>-->

	<?php the_content(); ?>

<!--	<p class="mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi, aliquid perspiciatis voluptate voluptatibus, dolorem laboriosam deleniti dolores reprehenderit nostrum odit, fuga iusto perferendis quas suscipit corporis obcaecati maxime provident cumque!</p>-->
<!--	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veri.</p>-->
<!---->
<!--	<blockquote class="quote">-->
<!--		<i class="fa fa-quote-left"></i>-->
<!--		Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nobis, molestias ipsam assumenda debitis quibusdam mollitia laudantium facere neque quas optio sequi eligendi recusandae, veritatis dicta asperiores ex fugiat quasi!-->
<!--	</blockquote>-->
<!---->
<!--	<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>-->
<!--	<div class="mt-5 mb-3">-->
<!--		<h5 class="d-inline-block mr-3">Метки:</h5>-->
<!--		<ul class="list-inline d-inline-block">-->
<!--			<li class="list-inline-item"><a href="#">Agency</a>,</li>-->
<!--			<li class="list-inline-item"><a href="#">Marketing</a>,</li>-->
<!--			<li class="list-inline-item"><a href="#">Business</a></li>-->
<!--		</ul>-->
<!--	</div>-->
<!--	<div class="my-4">-->
<!--		<h5 class="d-inline-block mr-3">Поделитесь:</h5>-->
<!--		<ul class="list-inline d-inline-block">-->
<!--			<li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>-->
<!--			<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>-->
<!--			<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>-->
<!--			<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>-->
<!--		</ul>-->
<!--	</div>-->


</div>