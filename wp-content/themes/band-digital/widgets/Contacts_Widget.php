<?php

/**
 * Добавление нового виджета Download_Widget.
 */
class Contacts_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'contacts_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: foo_widget
			'Contacts text',
			array( 'description' => 'Contacts text used for footer', 'classname' => 'text', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_contacts_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_contacts_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$email = apply_filters( 'widget_title', $instance['email'] );
		$phone = apply_filters( 'widget_title', $instance['phone'] );
		$address = apply_filters( 'widget_title', $instance['address'] );

        //echo '<div class="col-lg-5 col-sm-8 col-md-8">';
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
        if ( ! empty( $email ) ) {
			//echo '<p class="mail"><span>' . _e('Email') . ':</span>' . $email . '</p>';
			echo '<p class="mail"><span>' . 'Email: ' . "<a href='mailto:$email'>$email</a> </span>" . '</p>';
		}

        if ( ! empty( $phone ) ) {
			//echo '<p><span>' . _e('Phone') . ':</span>' . $phone . '</p>';
			echo '<p><span>' . 'Phone: ' . "<a href='tel:$phone'>$phone</a> </span>" . '</p>';
		}

        if ( ! empty( $address ) ) {
			//echo '<p><span>' . _e('Address') . ':</span>' . $address . '</p>';
			echo '<p><span>' .'Address' . ': </span>' . $address . '</p>';
		}
		echo $args['after_widget'];
		echo '</div>';
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Заголовок по умолчанию';
		$email = @ $instance['email'] ?: 'Email по умолчанию';
		$phone = @ $instance['phone'] ?: 'Телефон по умолчанию';
		$address = @ $instance['address'] ?: 'Адрес по умолчанию';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>">
        </p>

		<?php
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_contacts_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_contacts_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		//wp_enqueue_script('text_widget_script', $theme_url .'/text_widget_script.js' );
	}

	// стили виджета
	function add_contacts_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_contacts_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
            .text_widget a{ display:inline; }
		</style>
		<?php
	}

}