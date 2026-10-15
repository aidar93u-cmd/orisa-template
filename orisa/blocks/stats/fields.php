<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
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
    
];
