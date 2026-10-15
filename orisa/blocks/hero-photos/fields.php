<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'           => 'field_orisa_hero_photos_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Available for freelance work',
        ],
        [
            'key'   => 'field_orisa_hero_photos_intro',
            'label' => 'Текст слева',
            'name'  => 'intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_hero_photos_photo_small',
            'label'         => 'Фото слева',
            'name'          => 'photo_small',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_hero_photos_photo_main',
            'label'         => 'Фото в центре',
            'name'          => 'photo_main',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_hero_photos_bg_title',
            'label'         => 'Фоновый заголовок',
            'name'          => 'bg_title',
            'type'          => 'text',
            'default_value' => 'Orisa Nova',
            'instructions'  => 'Крупная подпись поверх центрального фото.',
        ],
        [
            'key'   => 'field_orisa_hero_photos_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_hero_photos_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_hero_photos_button',
            'label'         => 'Кнопка',
            'name'          => 'button',
            'type'          => 'link',
            'return_format' => 'array',
        ],
    
];
