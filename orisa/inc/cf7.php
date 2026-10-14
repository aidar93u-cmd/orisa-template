<?php
defined('ABSPATH') || exit;

/**
 * Contact Form 7: отключить автоформатирование, чтобы Survive-вала оригинальная разметка.
 */
add_filter('wpcf7_autop_or_not', '__return_false');
