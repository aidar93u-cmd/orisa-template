<?php
defined('ABSPATH') || exit;

/**
 * Подключение ассетов. Порядок 1:1 с оригиналом (index.html):
 * CSS — main.css строго последним; JS — main.js строго последним из общих.
 * Версия ассета = filemtime (сброс кеша при правках).
 */

function orisa_asset_ver($rel_path) {
    $abs = ORISA_DIR . '/' . ltrim($rel_path, '/');
    return file_exists($abs) ? (string) filemtime($abs) : ORISA_VERSION;
}

function orisa_asset_uri($rel_path) {
    return ORISA_URI . '/' . ltrim($rel_path, '/');
}

add_action('wp_enqueue_scripts', 'orisa_enqueue_assets', 5);
function orisa_enqueue_assets() {
    // jQuery из темы (3.7.1), как в оригинале. В подвале, как в оригинале.
    wp_deregister_script('jquery');
    wp_register_script(
        'jquery',
        orisa_asset_uri('assets/js/vendors/jquery-3.7.1.min.js'),
        [],
        orisa_asset_ver('assets/js/vendors/jquery-3.7.1.min.js'),
        true
    );

    $css = [
        'orisa-carousel-ticker' => 'assets/css/vendors/carouselTicker.css',
        'orisa-bootstrap'       => 'assets/css/vendors/bootstrap.min.css',
        'orisa-swiper'          => 'assets/css/vendors/swiper-bundle.min.css',
        'orisa-nice-select'     => 'assets/css/vendors/nice-select.css',
        'orisa-font-awesome'    => 'assets/css/vendors/font-awesome-pro.css',
        'orisa-magnific'        => 'assets/css/vendors/magnific-popup.css',
        'orisa-odometer'        => 'assets/css/vendors/odometer.css',
        'orisa-spacing'         => 'assets/css/vendors/spacing.css',
        'orisa-main'            => 'assets/css/main.css',
        'orisa-wp-fixes'        => 'assets/css/wp-fixes.css',
    ];
    foreach ($css as $handle => $rel) {
        if ($handle === 'orisa-wp-fixes' && !file_exists(ORISA_DIR . '/' . $rel)) {
            continue;
        }
        wp_enqueue_style($handle, orisa_asset_uri($rel), [], orisa_asset_ver($rel));
    }

    $js = [
        'orisa-plugin'          => 'assets/js/vendors/plugin.js',
        'orisa-bootstrap-js'    => 'assets/js/vendors/bootstrap.min.js',
        'orisa-swiper-js'       => 'assets/js/vendors/swiper-bundle.min.js',
        'orisa-ticker'          => 'assets/js/vendors/jquery.carouselTicker.min.js',
        'orisa-magnific-js'     => 'assets/js/vendors/jquery.magnific-popup.min.js',
        'orisa-odometer-js'     => 'assets/js/vendors/jquery.odometer.min.js',
        'orisa-appear'          => 'assets/js/vendors/jquery.appear.js',
        'orisa-elevatezoom'     => 'assets/js/vendors/jquery.elevatezoom.js',
        'orisa-nice-select-js'  => 'assets/js/vendors/nice-select.js',
        'orisa-ripple'          => 'assets/js/vendors/ripple-2.js',
        'orisa-imagesloaded'    => 'assets/js/vendors/imagesloaded-pkgd.js',
        'orisa-isotope'         => 'assets/js/vendors/isotope.pkgd.min.js',
        'orisa-hover-effects'   => 'assets/js/vendors/image-hover-effects.js',
        'orisa-at-cursor'       => 'assets/js/at-cursor.js',
        'orisa-main-js'         => 'assets/js/main.js',
    ];
    foreach ($js as $handle => $rel) {
        if ($handle === 'orisa-at-cursor' && function_exists('get_field') && !get_field('cursor_enabled', 'option')) {
            continue;
        }
        wp_enqueue_script($handle, orisa_asset_uri($rel), ['jquery'], orisa_asset_ver($rel), true);
    }

    // Условные скрипты: флаги выставляет цикл Flexible Content (см. helpers.php orisa_flag_script()).
    // Проверка отложена до wp_footer, когда цикл уже отработал.
    add_action('wp_footer', 'orisa_enqueue_conditional_scripts', 1);
}

function orisa_enqueue_conditional_scripts() {
    $flags = isset($GLOBALS['orisa_block_flags']) && is_array($GLOBALS['orisa_block_flags'])
        ? $GLOBALS['orisa_block_flags']
        : [];
    $map = [
        'matter'               => ['assets/js/matter.js', 'assets/js/throwable.js'],
        'pricing-3'            => ['assets/js/pricing-3.js'],
        'services-4'           => ['assets/js/services-4.js'],
        'services-details-4'   => ['assets/js/services-details-4.js'],
    ];
    foreach ($map as $flag => $files) {
        if (empty($flags[$flag])) {
            continue;
        }
        foreach ($files as $rel) {
            $handle = 'orisa-' . sanitize_key(basename($rel, '.js'));
            wp_enqueue_script($handle, orisa_asset_uri($rel), ['jquery'], orisa_asset_ver($rel), true);
        }
    }
}
