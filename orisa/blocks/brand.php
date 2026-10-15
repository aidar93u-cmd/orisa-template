<?php
defined('ABSPATH') || exit;

/**
 * Блок «brand»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/brand.php.
 */
return [
    'key'     => 'layout_orisa_brand',
    'name'    => 'brand',
    'label'   => 'Бренд',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'   => 'field_orisa_brand_badge',
            'label' => 'Плашка',
            'name'  => 'badge',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_brand_title',
            'label'        => 'Заголовок',
            'name'         => 'title',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_brand_cta_first',
            'label' => 'Кнопка первая',
            'name'  => 'cta_first',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_brand_cta_second',
            'label' => 'Кнопка вторая',
            'name'  => 'cta_second',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_brand_background',
            'label'         => 'Фон',
            'name'          => 'background',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фон секции (в оригинале bg-img-4.webp).',
        ],
        [
            'key'          => 'field_orisa_brand_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_brand_card_image',
                    'label'         => 'Картинка',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_brand_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тег',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_brand_tag_text',
                    'label' => 'Тег',
                    'name'  => 'tag',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_brand_brand',
            'label' => 'Название бренда',
            'name'  => 'brand_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_brand_nav',
            'label'        => 'Пункты снизу',
            'name'         => 'nav_items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить пункт',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_brand_nav_text',
                    'label' => 'Пункт',
                    'name'  => 'item',
                    'type'  => 'text',
                ],
            ],
        ],
    

    ],
];
