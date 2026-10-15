<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'           => 'field_orisa_about_journey_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Who We Are',
        ],
        [
            'key'           => 'field_orisa_about_journey_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Our Journey',
        ],
        [
            'key'           => 'field_orisa_about_journey_subtitle',
            'label'         => 'Подзаголовок',
            'name'          => 'subtitle',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'A timeline of ideas, growth, and meaningful impact.',
        ],
        [
            'key'   => 'field_orisa_about_journey_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_about_journey_card_image',
            'label'         => 'Фото карточки',
            'name'          => 'card_image',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фото слева (в оригинале img-121.webp).',
        ],
        [
            'key'          => 'field_orisa_about_journey_items',
            'label'        => 'Годы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить год',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_about_journey_date',
                    'label' => 'Дата',
                    'name'  => 'date',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_about_journey_item_title',
                    'label' => 'Заголовок',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_about_journey_text',
                    'label' => 'Текст',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_about_journey_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
    
];
