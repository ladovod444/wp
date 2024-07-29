

<!--  FOOTER AREA START  -->
<section id="footer" class="section-padding">

<!--    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3056a51afd8a077db77b5fa88c85206050a2505372fc44684b1ec0de70579f59&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>-->

	<div class="container">

		<?php //get_sidebar('footer') ?>

		<div class="row">
			<div class="col-lg-5 col-sm-8 col-md-8">
				<?php //get_sidebar('footer-text') ?>
				<?php if (!dynamic_sidebar('sidebar-footer-text')): ?>
					<?php dynamic_sidebar('sidebar-footer-text'); ?>
				<?php endif; ?>
<!--				<div class="footer-widget footer-link">-->
<!--					<h4>Мы заботимся о том, чтобы вы <br />быстро развивали свой бизнес</h4>-->
<!--					<p>-->
<!--						Маркетинговое и диджитал агентство полного цикла: мы решаем задачи по продвижению и рекламе, делаем-->
<!--						сайты и презентации, чтобы это не пришлось делать вам.-->
<!--					</p>-->
<!--				</div>-->
			</div>
			<div class="col-lg-2 col-sm-4 col-md-4">
				<div class="footer-widget footer-link">
					<?php
					wp_nav_menu( [
						'theme_location'  => 'footer_left',
                        //'menu_class'      => 'footer-widget footer-link',
                        'menu_class'      => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'items_wrap'      => '<ul><h4>Info</h4>%3$s</ul>',
                        //'walker'          => new bootstrap_4_walker_nav_menu(),
                        'walker'          => '',
                        'depth' => 1,
                        'container' => 'div',
                        'container_class' => 'footer-widget footer-link',
                    ] );
                    ?>
<!--					<h4>Информация</h4>-->
<!--					<ul>-->
<!--						<li><a href="#">о нас</a></li>-->
<!--						<li><a href="#">услуги</a></li>-->
<!--						<li><a href="#">цены</a></li>-->
<!--						<li><a href="#">команда</a></li>-->
<!--						<li><a href="#">отзывы</a></li>-->
<!--						<li><a href="#">журнал</a></li>-->
<!--					</ul>-->
				</div>
			</div>

			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget footer-link">
                    <?php
                    wp_nav_menu( [
                    'theme_location'  => 'footer_right',
                    //'menu_class'      => 'footer-widget footer-link',
                    'menu_class'      => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'items_wrap'      => '<ul><h4>Links</h4>%3$s</ul>',
                    //'walker'          => new bootstrap_4_walker_nav_menu(),
                    'walker'          => '',
                    'depth' => 1,
                    'container' => 'div',
                    'container_class' => 'footer-widget footer-link',
                    ] );
                    ?>
<!--					<h4>Сылки</h4>-->
<!--					<ul>-->
<!--						<li><a href="#">Как это работает</a></li>-->
<!--						<li><a href="#">Поддержка</a></li>-->
<!--						<li><a href="#">Политика данных</a></li>-->
<!--						<li><a href="#">Сообщить об ошибке</a></li>-->
<!--						<li><a href="#">Лицензия</a></li>-->
<!--						<li><a href="#">Оферта</a></li>-->
<!--					</ul>-->
				</div>
			</div>
<!--			<div class="col-lg-3 col-sm-6 col-md-6">-->
				<?php //if (!dynamic_sidebar('sidebar-footer-contacts')): ?>
					<?php //dynamic_sidebar('sidebar-footer-contacts'); ?>
				<?php //endif; ?>


<!--				<div class="footer-widget footer-text">-->
<!--					<h4>Наши контакты</h4>-->
<!--					<p class="mail"><span>Email:</span> promdise@gmail.com</p>-->
<!--					<p><span>Телефон :</span>+7 495 27-73-894</p>-->
<!--					<p><span>Адрес:</span> г. Москва, ул. 40 лет СССР, строение 3, офис 37</p>-->
<!--				</div>-->
<!--			</div>-->

			<?php if (!dynamic_sidebar('sidebar-footer-contacts-short')): ?>
				<?php dynamic_sidebar('sidebar-footer-contacts-short'); ?>
			<?php endif; ?>

        </div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="footer-copy">© <?php echo date('Y') ?> <?php echo get_bloginfo('name') ?> inc. Все права защищены.</div>
			</div>
		</div>
	</div>
</section>
<!--  FOOTER AREA END  -->