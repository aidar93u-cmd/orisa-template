<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 13 (index-13.html, строки 575-739).
 * Слайды и услуги-превью — один повторитель, чтобы главный слайдер
 * и слайдер-превью всегда оставались синхронизированы (1:1 по строкам).
 * Заголовок-бренд — wysiwyg без загрузок (внутри <sup>&reg;</sup>);
 * заголовки слайдов — text (внутри нет <br>/span); фоны и иконки — ID.
 */
return [
    'key'     => 'layout_orisa_hero_home_13',
    'name'    => 'hero-home-13',
    'label'   => 'Первый экран — Главная 13',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'            => 'field_orisa_hero_home_13_brand_title',
            'label'          => 'Заголовок-бренд',
            'name'           => 'brand_title',
            'type'           => 'wysiwyg',
            'tabs'           => 'visual',
            'media_upload'   => 0,
            'default_value'  => 'Orisa<sup>&reg;</sup> Architecture',
            'instructions'   => 'Строка бренда над слайдером. Разрешены только строчные теги (sup).',
        ],
        [
            'key'   => 'field_orisa_hero_home_13_since_link',
            'label' => 'Ссылка «Since»',
            'name'  => 'since_link',
            'type'  => 'link',
        ],
        [
            'key'          => 'field_orisa_hero_home_13_slides',
            'label'        => 'Слайды и услуги',
            'name'         => 'slides',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить слайд',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_hero_home_13_tagline',
                    'label' => 'Плашка',
                    'name'  => 'tagline',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_hero_home_13_headline',
                    'label' => 'Заголовок слайда',
                    'name'  => 'headline',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_orisa_hero_home_13_bg_image',
                    'label'         => 'Фон слайда',
                    'name'          => 'bg_image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'           => 'field_orisa_hero_home_13_service_icon',
                    'label'         => 'Иконка услуги',
                    'name'          => 'service_icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_hero_home_13_service_num',
                    'label' => 'Номер услуги',
                    'name'  => 'service_num',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_hero_home_13_service_name',
                    'label' => 'Название услуги',
                    'name'  => 'service_name',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
];
