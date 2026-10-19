<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Общее»: логотипы, favicon, курсор, тексты поиска, доп. скрипты.
 */
add_action('acf/init', 'orisa_options_general');
function orisa_options_general() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_general',
        'title'    => 'Общее',
        'fields'   => [
            [
                'key'           => 'field_orisa_opt_logo',
                'label'         => 'Логотип (тёмный фон)',
                'name'          => 'logo_dark',
                'type'          => 'image',
                'return_format' => 'id',
                'instructions'  => 'Оригинал: assets/imgs/template/logo/favicon-dark.svg.',
            ],
            [
                'key'           => 'field_orisa_opt_logo_light',
                'label'         => 'Логотип (светлый фон)',
                'name'          => 'logo_light',
                'type'          => 'image',
                'return_format' => 'id',
            ],
            [
                'key'           => 'field_orisa_opt_site_name',
                'label'         => 'Название сайта текстом',
                'name'          => 'site_name_text',
                'type'          => 'text',
                'default_value' => 'ЗАКРОЙДОЛГИ.РФ',
            ],
            [
                'key'           => 'field_orisa_opt_cursor',
                'label'         => 'Кастомный курсор включён',
                'name'          => 'cursor_enabled',
                'type'          => 'true_false',
                'default_value' => 1,
                'ui'            => 1,
                'instructions'  => 'Как в оригинале. Отключайте при жалобах на доступность.',
            ],
            [
                'key'           => 'field_orisa_opt_search_ph',
                'label'         => 'Плейсхолдер поиска',
                'name'          => 'search_placeholder',
                'type'          => 'text',
                'default_value' => 'Поиск по сайту…',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-general'],
            ],
        ],
    ]);
}
