<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
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
    
];
