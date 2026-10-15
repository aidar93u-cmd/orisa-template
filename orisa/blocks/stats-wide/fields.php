<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'           => 'field_orisa_stats_wide_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'About Us',
            'instructions'  => 'Только для aria-label секции — видимого заголовка у ряда статов нет.',
        ],
        [
            'key'          => 'field_orisa_stats_wide_items',
            'label'        => 'Статы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить стат',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_stats_wide_icon',
                    'label'         => 'Иконка',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Фигура над тегом (в оригинале sec-2-shape-N.webp). Пусто — без иконки.',
                ],
                [
                    'key'          => 'field_orisa_stats_wide_tag',
                    'label'        => 'Тег',
                    'name'         => 'tag',
                    'type'         => 'text',
                    'instructions' => 'Как в оригинале: треугольник и прирост, например ▲ +18%.',
                ],
                [
                    'key'          => 'field_orisa_stats_wide_prefix',
                    'label'        => 'Префикс',
                    'name'         => 'prefix',
                    'type'         => 'text',
                    'instructions' => 'Текст перед числом, как в оригинале: $ или +. Пусто — без префикса.',
                ],
                [
                    'key'          => 'field_orisa_stats_wide_number',
                    'label'        => 'Число',
                    'name'         => 'number',
                    'type'         => 'number',
                    'instructions' => 'Целое число для data-count (анимация — main.js, Odometer counter). Строка без числа не выводится.',
                ],
                [
                    'key'          => 'field_orisa_stats_wide_suffix',
                    'label'        => 'Суффикс',
                    'name'         => 'suffix',
                    'type'         => 'text',
                    'instructions' => 'Текст после числа, как в оригинале: .2B или %. Пусто — без суффикса.',
                ],
                [
                    'key'   => 'field_orisa_stats_wide_caption',
                    'label' => 'Подпись',
                    'name'  => 'caption',
                    'type'  => 'text',
                ],
            ],
        ],
    
];
