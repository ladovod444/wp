<?php
get_header();
?>

<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
	<div class="overlay dark-overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
				<div class="banner-content content-padding">
					<h1 class="text-white">Давайте обсудим работу над&nbsp;вашим проектом</h1>
					<p>Напишите нам и вам ответит проектный менеджер</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--MAIN HEADER AREA END -->
<!--  Contact START  -->
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-12 col-md-12">
				<div class="mb-5">
					<h2 class="mb-2">Напишите нам</h2>
					<p>
						Обычно, мы видим заявку сразу, а перезваниваем или пишем в ответ в течение часа. Иногда ответ может
						занять до одного дня.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-7 col-sm-12">
				<form class="contact__form" method="post" action="<?php echo admin_url('admin-ajax.php') ?>">
					<!-- form message -->
                    <input type="hidden" name="action" value="my_action" />
					<div class="row">
						<div class="col-12">
							<div class="alert alert-success contact__msg" style="display: none" role="alert">
								Ваше сообщение отправлено.
							</div>
						</div>
					</div>
					<!-- end message -->
					<div class="row">
						<div class="col-md-6 form-group">
							<input name="name" type="text" class="form-control" placeholder="Имя" required />
						</div>
						<div class="col-md-6 form-group">
							<input name="email" type="email" class="form-control" placeholder="Email" required />
						</div>
						<div class="col-md-12 form-group">
							<input name="phone" type="text" class="form-control" placeholder="Телефон" required />
						</div>
						<div class="col-12 form-group">
							<textarea name="message" class="form-control" rows="6" placeholder="Сообщение" required></textarea>
						</div>
						<div class="col-12 mt-4">
							<input name="submit" type="submit" class="btn btn-hero btn-circled" value="Отправить" />
						</div>
					</div>
				</form>
			</div>

            <hr />
            <hr />

            <div class="col-lg-7 col-sm-12">
				<?php echo do_shortcode('[contact-form-7 id="e52a24c" title="Contact Form"]') ?>
				<?php //the_content(); ?>
            </div>

			<div class="col-lg-5 pl-4 mt-4 mt-lg-0">
				<h4>Адрес офиса</h4>
                <?php //the_content(); ?>
<!--				<p class="mb-3">г. Москва, ул. 40 лет СССР, строение 3, офис 37</p>-->
				<address class="mb-3"><?php echo the_field( 'office_address', $post->ID); ?></address>
				<h4>Телефон</h4>
				<p class="mb-3"><?php echo the_field( 'phone', $post->ID); ?></p>
				<h4>E-Mail</h4>
				<p class="mb-3"><?php echo the_field( 'email', $post->ID); ?></p>
			</div>
		</div>
	</div>
</section>




<!--  CONTACT END  -->

<!--  Google Map START  -->
<section id="map" class="section-padding">
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="col-lg-12 col-sm-6 col-md-3"></div>-->
<!--		</div>-->
<!--	</div>-->
<!--    https://yandex.ru/map-constructor-->
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3056a51afd8a077db77b5fa88c85206050a2505372fc44684b1ec0de70579f59&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
   <!-- https://www.google.com/maps/place/%D1%83%D0%BB%D0%B8%D1%86%D0%B0+%D0%9F%D0%B0%D1%80%D0%B0%D0%B4%D0%B0+%D0%9F%D0%BE%D0%B1%D0%B5%D0%B4%D1%8B,+7,+%D0%A2%D1%8E%D0%BC%D0%B5%D0%BD%D1%8C,+%D0%A2%D1%8E%D0%BC%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+625015/@57.1666831,65.6356635,17z/data=!3m1!4b1!4m6!3m5!1s0x43bbe68fc1e5b81b:0xaee1a8a9023e0a9a!8m2!3d57.1666832!4d65.6405344!16s%2Fg%2F11cpk_sv1c?entry=ttu -->
<!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2163.2671221697206!2d65.63566349147352!3d57.16668310567352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43bbe68fc1e5b81b%3A0xaee1a8a9023e0a9a!2z0YPQu9C40YbQsCDQn9Cw0YDQsNC00LAg0J_QvtCx0LXQtNGLLCA3LCDQotGO0LzQtdC90YwsINCi0Y7QvNC10L3RgdC60LDRjyDQvtCx0LsuLCA2MjUwMTU!5e0!3m2!1sru!2sru!4v1721633617672!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
</section>
<!--  Google Map END  -->

<?php wp_footer(); ?>
<?php get_footer(); ?>
