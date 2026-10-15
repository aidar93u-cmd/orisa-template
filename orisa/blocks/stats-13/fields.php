<?php
defined('ABSPATH') || exit;

/**
 * Цифры-13 — Главная 13 (index-13.html, строки 821-866:
 * section.sec-2-home-13 > __inner > __stats > __stat: шапка __stat-head
 * (иконка + тег), число __stat-num (префикс + span.odometer[data-count] +
 * суффикс), подпись __stat-cap; границы: __stats закрыт в 866, section
 * в 869 — блок забирает только ряд статов, верх sec-2 (about / заголовок /
 * сетка картинок, 744-817) — другому блоку).
 * Разметка 1:1: классы, data-fade-атрибуты и data-delay — дословно (data-delay по
 * позиции: .1 + .15 — .1, .25, .4, .55, как в оригинале; запуск odometer —
 * main.js §43 Odometer counter). Число — number (идёт в data-count; строка
 * без числа не выводится — odometer без data-count ломает счётчик).
 * Видимого заголовка у ряда нет — поле «Заголовок» идёт в aria-label секции.
 */
return [
    'key'     => 'layout_orisa_stats_13',
    'name'    => 'stats-13',
    'label'   => 'Цифры-13',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_stats_13_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'About Us',
            'instructions'  => 'Только для aria-label секции — видимого заголовка у ряда статов нет.',
        ],
        [
            'key'          => 'field_orisa_stats_13_items',
            'label'        => 'Статы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить стат',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_stats_13_icon',
                    'label'         => 'Иконка',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Фигура над тегом (в оригинале sec-2-shape-N.webp). Пусто — без иконки.',
                ],
                [
                    'key'          => 'field_orisa_stats_13_tag',
                    'label'        => 'Тег',
                    'name'         => 'tag',
                    'type'         => 'text',
                    'instructions' => 'Как в оригинале: треугольник и прирост, например ▲ +18%.',
                ],
                [
                    'key'          => 'field_orisa_stats_13_prefix',
                    'label'        => 'Префикс',
                    'name'         => 'prefix',
                    'type'         => 'text',
                    'instructions' => 'Текст перед числом, как в оригинале: $ или +. Пусто — без префикса.',
                ],
                [
                    'key'          => 'field_orisa_stats_13_number',
                    'label'        => 'Число',
                    'name'         => 'number',
                    'type'         => 'number',
                    'instructions' => 'Целое число для data-count (анимация — main.js, Odometer counter). Строка без числа не выводится.',
                ],
                [
                    'key'          => 'field_orisa_stats_13_suffix',
                    'label'        => 'Суффикс',
                    'name'         => 'suffix',
                    'type'         => 'text',
                    'instructions' => 'Текст после числа, как в оригинале: .2B или %. Пусто — без суффикса.',
                ],
                [
                    'key'   => 'field_orisa_stats_13_caption',
                    'label' => 'Подпись',
                    'name'  => 'caption',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
];
