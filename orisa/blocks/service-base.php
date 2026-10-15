<?php
defined('ABSPATH') || exit;

/**
 * Блок «service-base»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/service-base.php.
 */
return [
    'key'     => 'layout_orisa_service_base',
    'name'    => 'service-base',
    'label' => 'Услуги 4',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_service_base_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'   => 'field_orisa_service_base_crumb_link',
            'label' => 'Хлебные крошки (родитель)',
            'name'  => 'crumb_link',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_service_base_crumb_current',
            'label' => 'Хлебные крошки (текущая)',
            'name'  => 'crumb_current',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_base_hero_title',
            'label' => 'Заголовок hero',
            'name'  => 'hero_title',
            'type'  => 'text',
        ],
        [
            'key'       => 'field_orisa_service_base_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_service_base_hero_tags',
            'label'        => 'Теги hero',
            'name'         => 'hero_tags',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить тег',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_base_hero_tag_link',
                    'label' => 'Тег',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_service_base_hero_lead',
            'label' => 'Лид hero',
            'name'  => 'hero_lead',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_service_base_gallery',
            'label'        => 'Слайдер',
            'name'         => 'gallery',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фото',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_service_base_gallery_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_base_pin_badge',
            'label'         => 'Плашка пина',
            'name'          => 'pin_badge',
            'type'          => 'text',
            'default_value' => 'Что мы делаем',
        ],
        [
            'key'   => 'field_orisa_service_base_pin_title',
            'label' => 'Заголовок пина',
            'name'  => 'pin_title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_base_pin_lead',
            'label' => 'Подводка пина',
            'name'  => 'pin_lead',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_service_base_pin_items',
            'label'        => 'Карточки пина',
            'name'         => 'pin_items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_base_pin_item_title',
                    'label' => 'Заголовок',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_service_base_pin_item_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_base_approach_badge',
            'label'         => 'Плашка подхода',
            'name'          => 'approach_badge',
            'type'          => 'text',
            'default_value' => 'НАШ ПОДХОД',
        ],
        [
            'key'   => 'field_orisa_service_base_approach_title',
            'label' => 'Заголовок подхода',
            'name'  => 'approach_title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_base_approach_subtitle',
            'label' => 'Подзаголовок подхода',
            'name'  => 'approach_subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_service_base_approach_cards',
            'label'        => 'Этапы подхода',
            'name'         => 'approach_cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить этап',
            'instructions' => 'Номера [01], [02]… подставляются автоматически по порядку.',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_base_approach_card_title',
                    'label' => 'Этап',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_service_base_approach_card_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'           => 'field_orisa_service_base_approach_card_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_service_base_approach_card_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_base_deliver_image',
            'label'         => 'Фото результата',
            'name'          => 'deliver_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_service_base_deliver_badge',
            'label'         => 'Плашка результата',
            'name'          => 'deliver_badge',
            'type'          => 'text',
            'default_value' => 'Что вы получите',
        ],
        [
            'key'   => 'field_orisa_service_base_deliver_title',
            'label' => 'Заголовок результата',
            'name'  => 'deliver_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_base_deliver_items',
            'label'        => 'Состав результата',
            'name'         => 'deliver_items',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить пункт',
            'instructions' => 'Одним списком, в две колонки раскладывается автоматически.',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_base_deliver_item_title',
                    'label' => 'Пункт',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_service_base_quote_text',
            'label' => 'Цитата',
            'name'  => 'quote_text',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'           => 'field_orisa_service_base_quote_avatar',
            'label'         => 'Фото автора',
            'name'          => 'quote_avatar',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_service_base_quote_name',
            'label' => 'Имя автора',
            'name'  => 'quote_name',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_base_quote_position',
            'label' => 'Должность автора',
            'name'  => 'quote_position',
            'type'  => 'text',
        ],
    

    ],
];
