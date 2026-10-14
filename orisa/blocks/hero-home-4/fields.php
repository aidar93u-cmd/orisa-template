<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 4 (index-4.html, строки 600-759).
 * Заголовок — WYSIWYG без загрузок (сохраняет <br>/span), картинки — ID,
 * повторители: layout block + button_label по-русски.
 */
return [
    'key'     => 'layout_orisa_hero_home_4',
    'name'    => 'hero-home-4',
    'label'   => 'Первый экран — Главная 4',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'   => 'field_orisa_hero_home_4_badge',
            'label' => 'Плашка',
            'name'  => 'badge',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_hero_home_4_title',
            'label'        => 'Заголовок',
            'name'         => 'title',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_hero_home_4_cta_first',
            'label' => 'Кнопка первая',
            'name'  => 'cta_first',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_hero_home_4_cta_second',
            'label' => 'Кнопка вторая',
            'name'  => 'cta_second',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_hero_home_4_background',
            'label'         => 'Фон',
            'name'          => 'background',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фон секции (в оригинале bg-img-4.webp).',
        ],
        [
            'key'          => 'field_orisa_hero_home_4_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_hero_home_4_card_image',
                    'label'         => 'Картинка',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_hero_home_4_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тег',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_home_4_tag_text',
                    'label' => 'Тег',
                    'name'  => 'tag',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_hero_home_4_brand',
            'label' => 'Название бренда',
            'name'  => 'brand_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_hero_home_4_nav',
            'label'        => 'Пункты снизу',
            'name'         => 'nav_items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить пункт',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_home_4_nav_text',
                    'label' => 'Пункт',
                    'name'  => 'item',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
];
