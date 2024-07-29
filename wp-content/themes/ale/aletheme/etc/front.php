<?php

//Enqueue Theme Styles
function ale_enqueue_styles() {

	//Pre loader Lib
	wp_register_style( 'ale_theme_preloader', ALETHEME_THEME_URL . '/assets/css/libs/preloader.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Add general css files
	wp_register_style( 'ale_theme_styles', ALETHEME_THEME_URL . '/assets/css/ale_theme_styles.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'ale_theme_shortcodes', ALETHEME_THEME_URL . '/assets/css/ale_theme_shortcodes.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Register libs
	wp_register_style( 'font-awesome', ALETHEME_THEME_URL . '/assets/css/font-awesome.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'ale_theme_animate', ALETHEME_THEME_URL . '/assets/css/libs/animate.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aletheme-multiscroll', ALETHEME_THEME_URL . '/assets/css/libs/jquery.multiscroll.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'swiper', ALETHEME_THEME_URL . '/assets/css/libs/swiper.min.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Load Preloader if it is enabled in Options
	if(ale_get_option('preloder') == 'enable') {
		wp_enqueue_style('ale_theme_preloader');
	}

	//Load general css
	wp_enqueue_style('ale_theme_styles');
	wp_enqueue_style('ale_theme_shortcodes');

	//Load font awesome
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('ale_theme_animate');

	//Load Selected Variant Style
	//===========================
	$variant_name = '';
	$variant_name = ale_get_option('design_variant');

	if($variant_name){
		switch($variant_name){
			case 'zoo' :
				wp_enqueue_style( 'aletheme-zoo-css', ALETHEME_THEME_URL . '/assets/css/variants/zoo.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'blackwhite' :
				wp_enqueue_style( 'aletheme-blackwhite-css', ALETHEME_THEME_URL . '/assets/css/variants/blackwhite.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'bakery' :
				wp_enqueue_style( 'aletheme-bakery-css', ALETHEME_THEME_URL . '/assets/css/variants/bakery.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'photography' :
				wp_enqueue_style( 'aletheme-photography-css', ALETHEME_THEME_URL . '/assets/css/variants/photography.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'luxuryshoes' :
				wp_enqueue_style( 'aletheme-luxuryshoes-css', ALETHEME_THEME_URL . '/assets/css/variants/luxuryshoes.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'camping' :
				wp_enqueue_style( 'aletheme-camping-css', ALETHEME_THEME_URL . '/assets/css/variants/camping.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'travelphoto' :
				wp_enqueue_style( 'aletheme-travelphoto-css', ALETHEME_THEME_URL . '/assets/css/variants/travelphoto.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'viaje' :
				wp_enqueue_style( 'aletheme-viaje-css', ALETHEME_THEME_URL . '/assets/css/variants/viaje.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'wedding' :
				wp_enqueue_style( 'aletheme-wedding-css', ALETHEME_THEME_URL . '/assets/css/variants/wedding.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'furniture' :
				wp_enqueue_style( 'aletheme-furniture-css', ALETHEME_THEME_URL . '/assets/css/variants/furniture.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'magazine' :
				wp_enqueue_style( 'aletheme-magazine-css', ALETHEME_THEME_URL . '/assets/css/variants/magazine.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'creative' :
				wp_enqueue_style( 'aletheme-creative-css', ALETHEME_THEME_URL . '/assets/css/variants/creative.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'brigitte' :
				wp_enqueue_style( 'aletheme-brigitte-css', ALETHEME_THEME_URL . '/assets/css/variants/brigitte.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'corporate' :
				wp_enqueue_style( 'aletheme-corporate-css', ALETHEME_THEME_URL . '/assets/css/variants/corporate.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'cv' :
				wp_enqueue_style( 'aletheme-cv-css', ALETHEME_THEME_URL . '/assets/css/variants/cv.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'fashion' :
				wp_enqueue_style( 'aletheme-fashion-css', ALETHEME_THEME_URL . '/assets/css/variants/fashion.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'pastel' :
				wp_enqueue_style( 'aletheme-pastel-css', ALETHEME_THEME_URL . '/assets/css/variants/pastel.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'stephanie' :
				wp_enqueue_style( 'aletheme-stephanie-css', ALETHEME_THEME_URL . '/assets/css/variants/stephanie.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'cameron' :
				wp_enqueue_style( 'aletheme-cameron-css', ALETHEME_THEME_URL . '/assets/css/variants/cameron.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'pixel' :
				wp_enqueue_style( 'aletheme-pixel-css', ALETHEME_THEME_URL . '/assets/css/variants/pixel.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'jade' :
				wp_enqueue_style( 'aletheme-jade-css', ALETHEME_THEME_URL . '/assets/css/variants/jade.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'rosi' :
				wp_enqueue_style( 'aletheme-rosi-css', ALETHEME_THEME_URL . '/assets/css/variants/rosi.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'keira' :
				wp_enqueue_style( 'aletheme-keira-css', ALETHEME_THEME_URL . '/assets/css/variants/keira.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'exotico' :
				wp_enqueue_style( 'aletheme-exotico-css', ALETHEME_THEME_URL . '/assets/css/variants/exotico.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'taxipress' :
				wp_enqueue_style( 'aletheme-taxipress-css', ALETHEME_THEME_URL . '/assets/css/variants/taxipress.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'prestigio' :
				wp_enqueue_style( 'aletheme-prestigio-css', ALETHEME_THEME_URL . '/assets/css/variants/prestigio.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'ospedale' :
				wp_enqueue_style( 'aletheme-ospedale-css', ALETHEME_THEME_URL . '/assets/css/variants/ospedale.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'enforcement' :
				wp_enqueue_style( 'aletheme-enforcement-css', ALETHEME_THEME_URL . '/assets/css/variants/enforcement.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'donation' :
				wp_enqueue_style( 'aletheme-donation-css', ALETHEME_THEME_URL . '/assets/css/variants/donation.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'orquidea' :
				wp_enqueue_style( 'aletheme-orquidea-css', ALETHEME_THEME_URL . '/assets/css/variants/orquidea.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'limpieza' :
				wp_enqueue_style( 'aletheme-limpieza-css', ALETHEME_THEME_URL . '/assets/css/variants/limpieza.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'nunta' :
				wp_enqueue_style( 'aletheme-nunta-css', ALETHEME_THEME_URL . '/assets/css/variants/nunta.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'cafeteria' :
				wp_enqueue_style( 'aletheme-cafeteria-css', ALETHEME_THEME_URL . '/assets/css/variants/cafeteria.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'organic' :
				wp_enqueue_style( 'aletheme-organic-css', ALETHEME_THEME_URL . '/assets/css/variants/organic.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'hai' :
				wp_enqueue_style( 'aletheme-hai-css', ALETHEME_THEME_URL . '/assets/css/variants/hai.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'smoothie' :
				wp_enqueue_style( 'aletheme-smoothie-css', ALETHEME_THEME_URL . '/assets/css/variants/smoothie.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'po' :
				wp_enqueue_style( 'aletheme-po-css', ALETHEME_THEME_URL . '/assets/css/variants/po.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'burger' :
				wp_enqueue_style( 'aletheme-burger-css', ALETHEME_THEME_URL . '/assets/css/variants/burger.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'laptica' :
				wp_enqueue_style( 'aletheme-laptica-css', ALETHEME_THEME_URL . '/assets/css/variants/laptica.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'kitty' :
				wp_enqueue_style( 'aletheme-kitty-css', ALETHEME_THEME_URL . '/assets/css/variants/kitty.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'moka' :
				wp_enqueue_style( 'aletheme-moka-css', ALETHEME_THEME_URL . '/assets/css/variants/moka.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'delizioso' :
				wp_enqueue_style( 'aletheme-delizioso-css', ALETHEME_THEME_URL . '/assets/css/variants/delizioso.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
            case 'cosushi' :
				wp_enqueue_style( 'aletheme-cosushi-css', ALETHEME_THEME_URL . '/assets/css/variants/cosushi.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break; 
            case 'bebe' :
				wp_enqueue_style( 'aletheme-bebe-css', ALETHEME_THEME_URL . '/assets/css/variants/bebe.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break; 
            case 'mimi' :
                wp_enqueue_style( 'aletheme-mimi-css', ALETHEME_THEME_URL . '/assets/css/variants/mimi.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
                break; 
            case 'pizza' :
                wp_enqueue_style( 'aletheme-pizza-css', ALETHEME_THEME_URL . '/assets/css/variants/pizza.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
                break;
		}
	}

	//Enqueue Blog Style based on Theme options setting
	//=================================================
	$blog_grid_layout = '';
	$blog_grid_layout = ale_get_option('blog_grid_layout');

	if($blog_grid_layout){
		switch($blog_grid_layout){
			case 'burger' :
				wp_enqueue_style( 'ale-burger-blog-css', ALETHEME_THEME_URL . '/assets/css/blog/burger_blog.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'kitty' :
				wp_enqueue_style( 'ale-kitty-blog-css', ALETHEME_THEME_URL . '/assets/css/blog/kitty_blog.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'delizioso' :
				wp_enqueue_style( 'ale-delizioso-blog-css', ALETHEME_THEME_URL . '/assets/css/blog/delizioso_blog.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'cosushi' :
				wp_enqueue_style( 'ale-cosushi-blog-css', ALETHEME_THEME_URL . '/assets/css/blog/cosushi_blog.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
			case 'bebe' :
				wp_enqueue_style( 'ale-cosushi-blog-css', ALETHEME_THEME_URL . '/assets/css/blog/bebe_blog.css', array('ale_theme_styles'), ALETHEME_THEME_VERSION, 'all');
				break;
		}
	}

}
add_action( 'wp_enqueue_scripts', 'ale_enqueue_styles' );


//Enqueue Theme Scripts
function ale_enqueue_scripts() {

    //Libs Register
    wp_register_script( 'ale-slider', ALETHEME_THEME_URL . '/assets/js/libs/jquery.flexslider-min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'hoverdir', ALETHEME_THEME_URL . '/assets/js/libs/jquery.hoverdir.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-modernizr-hoverdir', ALETHEME_THEME_URL . '/assets/js/libs/modernizr.hoverdir.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );
    wp_register_script( 'ale-modernizr-overlay-nav', ALETHEME_THEME_URL . '/assets/js/libs/modernizr.overlay_nav.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );
    wp_register_script( 'ale-appear', ALETHEME_THEME_URL . '/assets/js/libs/jquery.appear.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-counter', ALETHEME_THEME_URL . '/assets/js/libs/jquery.counter.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'classie', ALETHEME_THEME_URL . '/assets/js/libs/classie.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav', ALETHEME_THEME_URL . '/assets/js/libs/overlay_nav.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav-move', ALETHEME_THEME_URL . '/assets/js/libs/overlay_nav_move.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-overlay-nav-center', ALETHEME_THEME_URL . '/assets/js/libs/overlay_nav_center.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-woo-accordion', ALETHEME_THEME_URL . '/assets/js/libs/woocommerce.accordion.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'lightbox', ALETHEME_THEME_URL . '/assets/js/libs/lightbox.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'venobox', ALETHEME_THEME_URL . '/assets/js/libs/venobox.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'tabslet', ALETHEME_THEME_URL . '/assets/js/libs/jquery.tabslet.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'slick', ALETHEME_THEME_URL . '/assets/js/libs/slick.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'typed', ALETHEME_THEME_URL . '/assets/js/libs/typed.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'bxslider', ALETHEME_THEME_URL . '/assets/js/libs/jquery.bxslider.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'easydropdown', ALETHEME_THEME_URL . '/assets/js/libs/jquery.easydropdown.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'circliful', ALETHEME_THEME_URL . '/assets/js/libs/jquery.circliful.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'easings', ALETHEME_THEME_URL . '/assets/js/libs/jquery.easings.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'swiper', ALETHEME_THEME_URL . '/assets/js/libs/swiper.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'scrollable', ALETHEME_THEME_URL . '/assets/js/libs/scrollable.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'mousewheel', ALETHEME_THEME_URL . '/assets/js/libs/jquery.mousewheel.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'jscrollpane', ALETHEME_THEME_URL . '/assets/js/libs/jquery.jscrollpane.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'eislideshow', ALETHEME_THEME_URL . '/assets/js/libs/jquery.eislideshow.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'countdown', ALETHEME_THEME_URL . '/assets/js/libs/jquery.countdown.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );
    wp_register_script( 'ale-multiscroll', ALETHEME_THEME_URL . '/assets/js/libs/jquery.multiscroll.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

	//Custom JS Code
	wp_register_script( 'ale-scripts', ALETHEME_THEME_URL . '/assets/js/scripts.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

	wp_enqueue_script( 'jquery-form' );

	//Load Libs
	wp_enqueue_script( 'ale-slider' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'ale-appear' );

	if(ale_get_option('work_hover')=='10'){
		wp_enqueue_script( 'ale-modernizr-hoverdir' );
		wp_enqueue_script( 'hoverdir' );
	}

	//Load Scripts based on selected Design Variant
	$variant_name = ale_get_option('design_variant');

	if($variant_name){
		switch($variant_name){
			case 'camping' :
			case 'pixel' :
			case 'po' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav-move' );
				wp_enqueue_script( 'ale-appear' );
				break;
			case 'photography' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav' );
				break;
			case 'wedding' :
				wp_enqueue_script( 'ale-modernizr-overlay-nav' );
				wp_enqueue_script( 'classie' );
				wp_enqueue_script( 'ale-overlay-nav-center' );
				break;
			case 'nunta' :
				wp_enqueue_script( 'mousewheel' );
				wp_enqueue_script( 'jscrollpane' );
				break;
            case 'mimi' :
                wp_enqueue_script( 'ale-custom-mimi', ALETHEME_THEME_URL . '/assets/js/variants/mimi.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
                break;
            case 'pizza' :
                wp_enqueue_script( 'ale-custom-pizza', ALETHEME_THEME_URL . '/assets/js/variants/pizza.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
                break;
		}
	}

	wp_enqueue_script( 'ale-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'ale_enqueue_scripts');

//Register Google Fonts
function ale_google_font_one() {
    $font_url = '';
    $ale_font_one = ale_get_option('font_one');;
	$ale_font_one_ex = str_replace(',',';',ale_get_option('font_one_ex'));

    if ( 'off' !== _x( 'on', $ale_font_one.' font: on or off', 'ale' ) ) {
        $query_args = array(
            'family' =>  urlencode(str_replace ('+',' ',$ale_font_one).":wght@".esc_attr($ale_font_one_ex)) ,
            'subset' => urlencode('latin,latin-ext') ,
            'display' => urlencode('swap'),
        );
        $font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
    }

    return $font_url;
}
function ale_google_font_two() {
    $font_url = '';
	$ale_font_two = ale_get_option('font_two');
	$ale_font_two_ex = str_replace(',',';',ale_get_option('font_two_ex'));

    if ( 'off' !== _x( 'on', $ale_font_two.' font: on or off', 'ale' ) ) {
        $query_args = array(
            'family' =>  urlencode(str_replace ('+',' ',$ale_font_two).":wght@".esc_attr($ale_font_two_ex)) ,
            'subset' => urlencode('latin,latin-ext') ,
            'display' => urlencode('swap'),
        );
        $font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
    }

    return $font_url;
}
function ale_google_font_three() {
    $font_url = '';
	$ale_font_three = ale_get_option('font_three');
	$ale_font_three_ex = str_replace(',',';',ale_get_option('font_three_ex'));;

    if ( 'off' !== _x( 'on', $ale_font_three.' font: on or off', 'ale' ) ) {
        $query_args = array(
            'family' =>  urlencode(str_replace ('+',' ',$ale_font_three).":wght@".esc_attr($ale_font_three_ex)) ,
            'subset' => urlencode('latin,latin-ext') ,
            'display' => urlencode('swap'),
        );
        $font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
    }

    return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function ale_google_fonts_scripts() {
	wp_enqueue_style( 'aletheme-google-font-one', ale_google_font_one(), array(), '1.0.0' );
    wp_enqueue_style( 'aletheme-google-font-two', ale_google_font_two(), array(), '1.0.0' );

    if(in_array(ALETHEME_DESIGN_STYLE, ['rosi','nunta','donation','exotico','taxipress','ospedale','burger','cosushi','pizza'])){
        wp_enqueue_style( 'aletheme-google-font-three', ale_google_font_three(), array(), '1.0.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'ale_google_fonts_scripts' );

// Add header information 
function ale_head() {
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php esc_html_e('RSS Feed','ale') ?>" href="<?php ale_rss(); ?>" />
	<?php
	get_template_part('partials/css-option');
}
add_action('wp_head', 'ale_head');

//Comment callback function
function ale_comment_default($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <?php if ($depth > 1) { ?>
            <div class="comment-item comment2 second-level cf">
                <div class="response"></div>
        <?php } else { ?>
            <div class="comment-item comment1 first-level cf">
        <?php } ?>

            <div class="commenter-avatar">
                <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="comment-box">
                <div class="info-meta">
                    <?php echo esc_html_e('Posted by ','ale'); printf("<span class='author'>".esc_html__('%s','ale')."</span>", get_comment_author_link()); echo " / " ?>
                    <?php printf( ale_wp_kses(esc_html__('%1$s %2$s','ale')), get_comment_time(), get_comment_date() ) ?>

                    <?php if($depth == 1){ ?><span class="reply-link"><i class="fa fa-reply" aria-hidden="true"></i> <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span><?php } ?>
                </div>
                <div class="info-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','ale') ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
    <?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
    <?php
}
