Sandbox Project

Цель - изучение разработки под wordpress

Создано:

1. Тема band-digital - https://glo-academy.org/teach/control/stream/view/id/599880662
    wp-content/themes/band-digital
    На основе html-верстки собрана тема со следующими возможностями
    See wp-content/themes/band-digital/functions.php
    1.1 Добавлена поддержка мультиязычности в папке languages
     load_theme_textdomain( 'band_digital', get_template_directory() . '/languages' );
    1.2 Поддержка custom logo - add_theme_support( 'custom-logo'...
    Настройки темы -> Site Identity -> Logo
    http://wp:802/wp-admin/customize.php?theme=band-digital&return=http%3A%2F%2Fwp%3A802%2Fwp-admin%2Fthemes.php%3Ftheme%3Dband-digital

    1.3 https://codex.wordpress.org/Post_Thumbnails
     add_theme_support( 'post-thumbnails' );
     Например http://wp:802/wp-admin/post.php?post=227&action=edit
      Set featured image

    1.4 Добавлена кастомная роль
     в activate_my_theme
      add_role( 'project_manager'

    1.5 Регистрация скриптов и стилей
        add_action( 'wp_enqueue_scripts', 'band_digital_scripts' );

    1.5 Области (регионы) меню
        add_action( 'init', 'band_digital_menus' );
        See: http://wp:802/wp-admin/nav-menus.php
         Menu Settings -> Display Locations
           Header Menu
           Footer Left Menu
           ...
           http://wp:802/wp-admin/nav-menus.php?action=edit&menu=14
            Меню Information добавлено в область "Footer Left Menu" (footer_left)
            Выводится в шаблоне - wp-content/themes/band-digital/footer.php
             wp_nav_menu( ['theme_location'  => 'footer_left', ...

    1.6 Регистрация областей для виджетов band_digitals_widgets_init
       http://wp:802/wp-admin/widgets.php

    1.7 Регистрация виджетов (несколько) например:
        function register_download_widget() {
        	register_widget('Download_Widget');
        }
        add_action('widgets_init', 'register_download_widget');
        Класс, реализующий виджет - wp-content/themes/band-digital/widgets/Download_Widget.php

    1.8 Создание кастмоных типов постов
     add_action( 'init', 'register_post_types' );

    1.9 Ajax callback
    add_action( 'wp_ajax_my_action', 'my_action_callback' );
    add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );
    Используется в форме контактов wp-content/themes/band-digital/page-contacts.php
    <form class="contact__form" method="post" action="<?php echo admin_url('admin-ajax.php') ?>">
    					<!-- form message -->
           'my_action'  -> <input type="hidden" name="action" value="my_action" />
     my_action_callback  - отправляет сообщение

    1.10 Настройка SMTP для отправки email
      add_action( 'phpmailer_init', 'mailer_config', 10, 1);

    1.11 Включение шорт кодов enable_shortcode Для плагина ACF
     add_action( 'acf/init', 'set_acf_settings' );

    1.12 Создание кастомного шорткода
     add_shortcode( 'admin_email', 'admin_email_shortcode' );

    1.13 my_customize_register - НУЖНО разобраться

    1.14 Также добавлены шаблоны для типа данных - Page
       template parts

    1.15 Walkers  - для форматирования меню и комментариев
      See wp-content/themes/band-digital/header.php
        wp_nav_menu - walker


2. Плагины - alebooking
    wp-content/plugins/alebooking
    /*wp-content/plugins/AleCRM*/

    wp-content/plugins/alebooking

    2.1 Настройка Grunt и Sass
     wp-content/plugins/alebooking/assets/Gruntfile.js

    2.2 Вес функционал в классе wp-content/plugins/alebooking/class.alebooking.php

    2.3 Добавление типа данных и двух такосномий в add_action( 'init', [ $this, 'custom_post_type' ] );

    // Add links to plugins page.
    		// So set to alebooking.php
    		add_filter(
    			'plugin_action_links_' . plugin_basename( $file ),
    			[ $this, 'add_plugin_setting_link' ]

    2. Добавление ссылки настроек плагина на страницу плагинов
     http://wp:802/wp-admin/plugins.php, Settings -> http://wp:802/wp-admin/admin.php?page=alebooking_settings

    2. Создание формы для фильтрации на странице http://wp:802/rooms/




