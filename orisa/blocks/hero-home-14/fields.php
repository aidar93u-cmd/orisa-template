<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 14 (index-14.html, строки 588-670).
 * Разметка 1:1 (.sec-1-home-14: классы, data-* анимаций, вложенность, SVG — дословно).
 * Динамика: слоган, счётчик, заголовок (WYSIWYG без загрузок, сохраняет <br>),
 * подводка (WYSIWYG без загрузок), кнопка (Link), фото (Image ID),
 * подпись/кредит/название/подзаголовок оверлея, подпись скролла, теги-повторитель.
 * Пустые поля гасят свои теги; корневые обёртки остаются (на них завязаны стили/JS).
 */
return [
    'key'     => 'layout_orisa_hero_home_14',
    'name'    => 'hero-home-14',
    'label'   => 'Первый экран — Главная 14',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_hero_home_14_tagline',
            'label'         => 'Слоган сверху',
            'name'          => 'tagline',
            'type'          => 'text',
            'default_value' => '[ VISUAL STORYTELLING ]',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_since',
            'label'         => 'Счётчик лет',
            'name'          => 'since',
            'type'          => 'text',
            'default_value' => '[ SINCE 2014 ]',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'wysiwyg',
            'tabs'          => 'visual',
            'media_upload'  => 0,
            'default_value' => 'Photography that lingers<br>long after the shutter closes.',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_copy',
            'label'         => 'Подводка',
            'name'          => 'copy',
            'type'          => 'wysiwyg',
            'tabs'          => 'visual',
            'media_upload'  => 0,
            'default_value' => 'Selected portraiture, editorial campaigns, and the<br>quiet moments in between &mdash; 240+ shoots, 18 magazines.',
        ],
        [
            'key'   => 'field_orisa_hero_home_14_cta_button',
            'label' => 'Кнопка',
            'name'  => 'cta_button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_hero_image',
            'label'         => 'Фото героя',
            'name'          => 'hero_image',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фото карточки (в оригинале sec-1-hero.webp).',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_hero_caption',
            'label'         => 'Подпись фото',
            'name'          => 'hero_caption',
            'type'          => 'text',
            'default_value' => '[ FRAME 01 — URBAN SOUL ]',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_hero_credit',
            'label'         => 'Кредит фото',
            'name'          => 'hero_credit',
            'type'          => 'text',
            'default_value' => 'Photograph by Studio Orisa ·· 2025',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_hero_title',
            'label'         => 'Название серии',
            'name'          => 'hero_title',
            'type'          => 'text',
            'default_value' => 'Urban Soul',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_hero_sub',
            'label'         => 'Подзаголовок серии',
            'name'          => 'hero_sub',
            'type'          => 'text',
            'default_value' => 'Editorial Series · 12 frames · Sony A1',
        ],
        [
            'key'           => 'field_orisa_hero_home_14_scroll_label',
            'label'         => 'Подпись скролла',
            'name'          => 'scroll_label',
            'type'          => 'text',
            'default_value' => 'SCROLL',
        ],
        [
            'key'          => 'field_orisa_hero_home_14_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тег',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_home_14_tag_num',
                    'label' => 'Номер',
                    'name'  => 'tag_num',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_hero_home_14_tag_name',
                    'label' => 'Название',
                    'name'  => 'tag_name',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
];
