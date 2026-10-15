<?php
defined('ABSPATH') || exit;

/**
 * Точка входа темы Orisa.
 * Весь CSS/JS подключается из inc/assets.php (порядок 1:1 с оригиналом).
 */
define('ORISA_VERSION', '1.0.0');
define('ORISA_DIR', get_template_directory());
define('ORISA_URI', get_template_directory_uri());

require_once ORISA_DIR . '/inc/setup.php';
require_once ORISA_DIR . '/inc/helpers.php';
require_once ORISA_DIR . '/inc/assets.php';
require_once ORISA_DIR . '/inc/sections.php';
require_once ORISA_DIR . '/inc/blocks.php';
require_once ORISA_DIR . '/inc/acf-page-settings.php';
require_once ORISA_DIR . '/inc/cf7.php';

foreach (glob(ORISA_DIR . '/inc/options/*.php') as $orisa_options_file) {
    require_once $orisa_options_file;
}
