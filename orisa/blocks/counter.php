<?php
defined('ABSPATH') || exit;

/**
 * Блок «counter»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/counter.php.
 */
return [
    'key'     => 'layout_orisa_counter',
    'name'    => 'counter',
    'label' => 'Цифры 3',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_counter_tagline',
            'label'         => 'Слоган сверху',
            'name'          => 'tagline',
            'type'          => 'text',
            'default_value' => '[ ВИЗУАЛЬНЫЕ ИСТОРИИ ]',
        ],
        [
            'key'           => 'field_orisa_counter_since',
            'label'         => 'Счётчик лет',
            'name'          => 'since',
            'type'          => 'text',
            'default_value' => '[ С 2014 ГОДА ]',
        ],
        [
            'key'           => 'field_orisa_counter_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'wysiwyg',
            'tabs'          => 'visual',
            'media_upload'  => 0,
            'default_value' => 'Фотографии, которые остаются<br>в памяти надолго.',
        ],
        [
            'key'           => 'field_orisa_counter_copy',
            'label'         => 'Подводка',
            'name'          => 'copy',
            'type'          => 'wysiwyg',
            'tabs'          => 'visual',
            'media_upload'  => 0,
            'default_value' => 'Портреты, репортажи и<br>тихие моменты между ними &mdash; 240+ съёмок, 18 журналов.',
        ],
        [
            'key'   => 'field_orisa_counter_cta_button',
            'label' => 'Кнопка',
            'name'  => 'cta_button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_counter_hero_image',
            'label'         => 'Фото героя',
            'name'          => 'hero_image',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фото карточки (в оригинале sec-1-hero.webp).',
        ],
        [
            'key'           => 'field_orisa_counter_hero_caption',
            'label'         => 'Подпись фото',
            'name'          => 'hero_caption',
            'type'          => 'text',
            'default_value' => '[ КАДР 01 — ГОРОДСКАЯ ДУША ]',
        ],
        [
            'key'           => 'field_orisa_counter_hero_credit',
            'label'         => 'Кредит фото',
            'name'          => 'hero_credit',
            'type'          => 'text',
            'default_value' => 'Фото студии ·· 2025',
        ],
        [
            'key'           => 'field_orisa_counter_hero_title',
            'label'         => 'Название серии',
            'name'          => 'hero_title',
            'type'          => 'text',
            'default_value' => 'Городская душа',
        ],
        [
            'key'           => 'field_orisa_counter_hero_sub',
            'label'         => 'Подзаголовок серии',
            'name'          => 'hero_sub',
            'type'          => 'text',
            'default_value' => 'Репортажная серия · 12 кадров',
        ],
        [
            'key'           => 'field_orisa_counter_scroll_label',
            'label'         => 'Подпись скролла',
            'name'          => 'scroll_label',
            'type'          => 'text',
            'default_value' => 'ЛИСТАЙТЕ',
        ],
        [
            'key'          => 'field_orisa_counter_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тег',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_counter_tag_num',
                    'label' => 'Номер',
                    'name'  => 'tag_num',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_counter_tag_name',
                    'label' => 'Название',
                    'name'  => 'tag_name',
                    'type'  => 'text',
                ],
            ],
        ],
    

    ],
];
