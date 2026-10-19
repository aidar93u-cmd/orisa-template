<?php
defined('ABSPATH') || exit;

/**
 * Страница настроек «Настройки сайта» (+ подстраницы из inc/options/*).
 * Требуется ACF Pro.
 */
add_action('acf/init', 'orisa_register_options_pages');
function orisa_register_options_pages() {
    if (!function_exists('acf_add_options_page')) {
        return;
    }
    acf_add_options_page([
        'page_title' => 'Настройки сайта',
        'menu_title' => 'Настройки сайта',
        'menu_slug'  => 'orisa-settings',
        'capability' => 'manage_options',
        'redirect'   => true,
    ]);
    foreach ([
        ['Общее', 'general', 'orisa-settings-general'],
        ['Подвал', 'footer', 'orisa-settings-footer'],
        ['Контакты', 'contacts', 'orisa-settings-contacts'],
        ['Боковое меню', 'offcanvas', 'orisa-settings-offcanvas'],
        ['Блог', 'blog', 'orisa-settings-blog'],
        ['Служебные страницы', 'special-pages', 'orisa-settings-special'],
    ] as $sub) {
        acf_add_options_sub_page([
            'page_title'  => $sub[0],
            'menu_title'  => $sub[0],
            'menu_slug'   => $sub[2],
            'parent_slug' => 'orisa-settings',
            'capability'  => 'manage_options',
        ]);
    }
}
