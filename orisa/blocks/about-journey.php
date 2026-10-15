<?php
defined('ABSPATH') || exit;

/**
 * Блок «about-journey»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/about-journey.php.
 */
return [
    'key'     => 'layout_orisa_about_journey',
    'name'    => 'about-journey',
    'label' => 'О компании 2',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_about_journey_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_about_journey_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Кто мы',
        ],
        [
            'key'           => 'field_orisa_about_journey_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Наш путь',
        ],
        [
            'key'           => 'field_orisa_about_journey_subtitle',
            'label'         => 'Подзаголовок',
            'name'          => 'subtitle',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Хроника идей, роста и значимых результатов.',
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
            'key'       => 'field_orisa_about_journey_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
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
    

    ],
];
