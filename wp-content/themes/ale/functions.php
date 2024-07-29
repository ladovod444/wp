<?php

/****************************************************************
 * DO NOT DELETE
 ****************************************************************/
if ( !function_exists( 'ale_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ale_fs() {
        global $ale_fs;
        if ( !isset( $ale_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ale_fs = fs_dynamic_init( array(
                'id'               => '15450',
                'slug'             => 'ale',
                'type'             => 'theme',
                'public_key'       => 'pk_5e7751bf7136a20336bd56ff421c4',
                'is_premium'       => false,
                'is_premium_only'  => false,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'menu'             => array(
                    'slug'    => 'ale_welcome',
                    'support' => false,
                ),
                'is_live'          => true,
            ) );
        }
        return $ale_fs;
    }

    // Init Freemius.
    ale_fs();
    // Signal that SDK was initiated.
    do_action( 'ale_fs_loaded' );
}
if ( get_stylesheet_directory() == get_template_directory() ) {
    define( 'ALETHEME_PATH', get_template_directory() . '/aletheme' );
    define( 'ALETHEME_URL', get_template_directory_uri() . '/aletheme' );
    define( 'ALE_FUNCTIONS_PATH', get_template_directory() . '/functions.php' );
} else {
    define( 'ALETHEME_PATH', get_theme_root() . '/ale/aletheme' );
    define( 'ALETHEME_URL', get_theme_root_uri() . '/ale/aletheme' );
    define( 'ALE_FUNCTIONS_PATH', get_template_directory() . '/ale/functions.php' );
}
require_once ALETHEME_PATH . '/init.php';
load_theme_textdomain( 'ale', get_template_directory() . '/lang' );
$locale = get_locale();
$locale_file = get_template_directory() . "/lang/{$locale}.php";
if ( is_readable( $locale_file ) ) {
    require_once $locale_file;
}
/****************************************************************
 * Parent theme functions should not be edited.
 * 
 * If you want to add custom functions you should use child theme.
 ****************************************************************/
// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );