<?php
defined('ABSPATH') || exit;

/**
 * Бегущая строка. База — index.html 621-734 (ряд логотипов).
 * Один механизм с index-3.html (sec-2-home-3: тёмная лента, текст + звезда)
 * и about-2.html (sec-4-about, .moving-gallery: ряд фото): .carouselTicker >
 * ul.carouselTicker__list > li, запуск — main.js §46 carauselScroll.
 * Variant переключает только обёртки-модификаторы и содержимое li.
 */
return [
    'key'     => 'layout_orisa_logo_marquee',
    'name'    => 'logo-marquee',
    'label'   => 'Бегущая строка',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_logo_marquee_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'lenta'    => 'Лента',
                'brendy'   => 'Бренды',
                'galereya' => 'Галерея',
            ],
            'default_value' => 'brendy',
            'instructions'  => 'Бренды — ряд логотипов (главная). Лента — тёмная строка с текстом. Галерея — ряд фото.',
        ],
        [
            'key'          => 'field_orisa_logo_marquee_items',
            'label'        => 'Элементы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить элемент',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_logo_marquee_text',
                    'label' => 'Текст (для варианта «Лента»)',
                    'name'  => 'text',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_orisa_logo_marquee_image',
                    'label'         => 'Картинка (для вариантов «Бренды» и «Галерея»)',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_logo_marquee_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
    ],
];
