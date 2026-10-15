<?php
defined('ABSPATH') || exit;

/**
 * «Настройки страницы» (post type page, сайдбар): вариант шапки/подвала,
 * скрытие шапки/подвала (для 404 и «Скоро»), доп. класс body.
 */
add_action('acf/init', 'orisa_register_page_settings');
function orisa_register_page_settings() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_page_settings',
        'title'    => 'Настройки страницы',
        'position' => 'side',
        'fields'   => [
            [
                'key'           => 'field_orisa_header_style',
                'label'         => 'Стиль шапки',
                'name'          => 'header_style',
                'type'          => 'select',
                'choices'       => [
                    'default'     => 'По умолчанию',
                    'light'       => 'Светлая',
                    'transparent' => 'Прозрачная',
                ],
                'default_value' => 'default',
                'ui'            => 0,
            ],
            [
                'key'           => 'field_orisa_footer_style',
                'label'         => 'Вариант подвала',
                'name'          => 'footer_style',
                'type'          => 'select',
                'choices'       => [
                    'fixed-bottom' => 'Стандартный (19 страниц)',
                    'standard'     => 'Главная (container-2200)',
                    'footer-7'     => 'Вариант 7',
                    'footer-9'     => 'Вариант 9',
                    'footer-13'    => 'Вариант 13',
                    'footer-14'    => 'Вариант 14',
                ],
                'default_value' => 'fixed-bottom',
                'ui'            => 0,
                'instructions'  => 'Варианты 7/9/13/14 пока отрисовываются как стандартный.',
            ],
            [
                'key'           => 'field_orisa_hide_header',
                'label'         => 'Скрыть шапку',
                'name'          => 'hide_header',
                'type'          => 'true_false',
                'default_value' => 0,
                'ui'            => 1,
            ],
            [
                'key'           => 'field_orisa_hide_footer',
                'label'         => 'Скрыть подвал',
                'name'          => 'hide_footer',
                'type'          => 'true_false',
                'default_value' => 0,
                'ui'            => 1,
            ],
            [
                'key'          => 'field_orisa_body_class',
                'label'        => 'Доп. класс body',
                'name'         => 'body_class',
                'type'         => 'text',
                'instructions' => 'Необязательно.',
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'page'],
            ],
        ],
    ]);
}

/**
 * Классы body из настроек страницы.
 */
add_filter('body_class', 'orisa_page_body_class');
function orisa_page_body_class($classes) {
    if (is_page() && function_exists('get_field')) {
        $extra = get_field('body_class');
        if (is_string($extra) && $extra !== '') {
            $classes[] = sanitize_html_class($extra);
        }
    }
    return $classes;
}
