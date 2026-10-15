<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'   => 'field_orisa_hero_brand_badge',
            'label' => 'Плашка',
            'name'  => 'badge',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_hero_brand_title',
            'label'        => 'Заголовок',
            'name'         => 'title',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_hero_brand_cta_first',
            'label' => 'Кнопка первая',
            'name'  => 'cta_first',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_hero_brand_cta_second',
            'label' => 'Кнопка вторая',
            'name'  => 'cta_second',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_hero_brand_background',
            'label'         => 'Фон',
            'name'          => 'background',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фон секции (в оригинале bg-img-4.webp).',
        ],
        [
            'key'          => 'field_orisa_hero_brand_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_hero_brand_card_image',
                    'label'         => 'Картинка',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_hero_brand_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тег',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_brand_tag_text',
                    'label' => 'Тег',
                    'name'  => 'tag',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_hero_brand_brand',
            'label' => 'Название бренда',
            'name'  => 'brand_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_hero_brand_nav',
            'label'        => 'Пункты снизу',
            'name'         => 'nav_items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить пункт',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_brand_nav_text',
                    'label' => 'Пункт',
                    'name'  => 'item',
                    'type'  => 'text',
                ],
            ],
        ],
    
];
