<?php
/****************************************************************
 * System Functions
 ****************************************************************/

/**
 * Load Theme Variable Data
 * @param string $var
 * @return string 
 */
function ale_theme_data_variable($var) {
	if (!is_file(STYLESHEETPATH . '/style.css')) {
		return '';
	}

	$theme_data = wp_get_theme();
	return $theme_data->{$var};
}

/****************************************************************
 * Define Constants
 ****************************************************************/
define('ALETHEME_MODE', 'test');
define('ALETHEME_THEME_VERSION', ale_theme_data_variable('Version'));
define('ALETHEME_PREFIX',			'ale_');
define('ALETHEME_THEME_PREFIX',		ALETHEME_PREFIX . get_template().'_');
define('ALETHEME_SHORTNAME', 'Ale');
define("ALETHEME_THEME_OPTIONS_NAME", "ale");
define("ALETHEME_THEME_URL", get_template_directory_uri());
define("ALETHEME_DEMOS_HOST", "http://alethemes.com/");

/****************************************************************
 * Find The Configuration File
 ****************************************************************/
require_once ALETHEME_PATH . '/config.php';

/****************************************************************
 * Options Framework Set Up
 ****************************************************************/
require_once ALETHEME_PATH . '/options/options.php';
require_once ALETHEME_PATH . '/options/admin/options-framework.php';
require_once (ALETHEME_PATH. '/functions/general.php');
define("ALETHEME_DESIGN_STYLE", ale_get_option('design_variant'));


/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/

require_once (ALETHEME_PATH. '/etc/admin.php');
require_once (ALETHEME_PATH. '/etc/demos.php');
require_once (ALETHEME_PATH. '/etc/front.php');
require_once (ALETHEME_PATH. '/etc/global.php');
require_once (ALETHEME_PATH. '/etc/nav.php');
require_once (ALETHEME_PATH. '/etc/system.php');

require_once (ALETHEME_PATH. '/functions/aletheme-structure.php');
require_once (ALETHEME_PATH. '/functions/customizer.php');
require_once (ALETHEME_PATH. '/functions/images_media.php');
require_once (ALETHEME_PATH. '/functions/infinite-load.php');
require_once (ALETHEME_PATH. '/functions/load-more.php');
require_once (ALETHEME_PATH. '/functions/class-tgm-plugin-activation.php');
require_once (ALETHEME_PATH. '/functions/vc.php');
require_once (ALETHEME_PATH. '/functions/woocommerce.php');

require_once (ALETHEME_PATH. '/elementor/class-ale-elementor.php');

require_once (ALETHEME_PATH. '/taxonomies/tax-meta-class.php');
require_once (ALETHEME_PATH. '/taxonomies/taxonomies-fields.php');

// Custom PHP for Variants Design
switch (ALETHEME_DESIGN_STYLE) {
    case 'mimi':
        require_once (ALETHEME_PATH. '/functions/variants/mimi.php');
        break;
}