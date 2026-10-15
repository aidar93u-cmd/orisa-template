<?php
defined('ABSPATH') || exit;

/**
 * Блок «stats»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/stats.php.
 */
return [
    'key'     => 'layout_orisa_stats',
    'name'    => 'stats',
    'label' => 'Цифры 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_stats_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_stats_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'lines'   => 'Линии',
                'compact' => 'Компактные счётчики',
            ],
            'default_value' => 'lines',
            'instructions'  => 'Линии — Главная 9 (sec-2-home-9 с декор-линией). Компактные счётчики — index.html 1559-1592 (at-sec8-area: h1 + odometer).',
        ],
        [
            'key'       => 'field_orisa_stats_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_stats_items',
            'label'        => 'Цифры',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить цифру',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'          => 'field_orisa_stats_number',
                    'label'        => 'Число',
                    'name'         => 'number',
                    'type'         => 'number',
                    'instructions' => 'Целое число для data-count (анимация — main.js, Odometer counter). Строка без числа не выводится.',
                ],
                [
                    'key'          => 'field_orisa_stats_suffix',
                    'label'        => 'Суффикс',
                    'name'         => 'suffix',
                    'type'         => 'text',
                    'instructions' => 'Текст сразу после числа, как в оригинале: +, M, %, .8. Пусто — без суффикса.',
                ],
                [
                    'key'   => 'field_orisa_stats_caption',
                    'label' => 'Подпись',
                    'name'  => 'caption',
                    'type'  => 'text',
                ],
            ],
        ],
    

    ],
];
