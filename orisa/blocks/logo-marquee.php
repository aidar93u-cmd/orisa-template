<?php
defined('ABSPATH') || exit;

/**
 * Блок «logo-marquee»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/logo-marquee.php.
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
                'stena'    => 'Стена брендов',
            ],
            'default_value' => 'brendy',
            'instructions'  => 'Бренды — ряд логотипов (главная). Лента — тёмная строка с текстом. Стена брендов — светлая строка с текстом (index.html 1840-1913). Галерея — ряд фото.',
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
                    'label' => 'Текст (для вариантов «Лента» и «Стена брендов»)',
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
