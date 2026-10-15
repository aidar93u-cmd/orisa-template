<?php
defined('ABSPATH') || exit;

/**
 * Цифры — Главная 9 (index-9.html, строки 668-707).
 * Разметка 1:1 (.sec-2-home-9 > __container > __stats > __stat + __lines).
 * Сравнение с index-13.html (строки 821-866): каркас РАЗНЫЙ — там в каждом
 * стате шапка с иконкой и тегом (__stat-head), число с префиксом/суффиксом
 * вокруг odometer (__stat-num) и другая подпись (__stat-cap); здесь шапки нет,
 * только значение (__value: odometer + суффикс) и подпись (__label).
 * Поэтому один блок по index-9. Число — number (идёт в data-count, запуск —
 * main.js §43 Odometer counter), суффикс и подпись — text; заголовка
 * в оригинале нет — поля заголовка нет.
 */
return [
    'key'     => 'layout_orisa_stats',
    'name'    => 'stats',
    'label'   => 'Цифры',
    'display' => 'block',
    'sub_fields' => [
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
