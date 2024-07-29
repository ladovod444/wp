<?php

// include system functions
require_once ALETHEME_PATH . '/constants.php';
// Updates Checker for Free Ale
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
require_once ALETHEME_PATH . '/update-checker/plugin-update-checker.php';
$myUpdateChecker = PucFactory::buildUpdateChecker( 'https://aletheme.com/wp-json/ale/free-version-checker', ALE_FUNCTIONS_PATH, 'ale' );
// Default Content Width
if ( !isset( $content_width ) ) {
    $content_width = 1000;
}