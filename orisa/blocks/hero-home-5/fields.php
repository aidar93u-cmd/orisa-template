<?php
defined('ABSPATH') || exit;

return [
    'key'     => 'layout_orisa_hero_home_5',
    'name'    => 'hero-home-5',
    'label'   => 'Первый экран — Главная 5',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_hero_home_5_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Available for freelance work',
        ],
        [
            'key'   => 'field_orisa_hero_home_5_intro',
            'label' => 'Текст слева',
            'name'  => 'intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_hero_home_5_photo_small',
            'label'         => 'Фото слева',
            'name'          => 'photo_small',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_hero_home_5_photo_main',
            'label'         => 'Фото в центре',
            'name'          => 'photo_main',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_hero_home_5_bg_title',
            'label'         => 'Фоновый заголовок',
            'name'          => 'bg_title',
            'type'          => 'text',
            'default_value' => 'Orisa Nova',
            'instructions'  => 'Крупная подпись поверх центрального фото.',
        ],
        [
            'key'   => 'field_orisa_hero_home_5_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_hero_home_5_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_hero_home_5_button',
            'label'         => 'Кнопка',
            'name'          => 'button',
            'type'          => 'link',
            'return_format' => 'array',
        ],
    ],
];
