<?php
defined('ABSPATH') || exit;

/**
 * Блок «photos»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/photos.php.
 */
return [
    'key'     => 'layout_orisa_photos',
    'name'    => 'photos',
    'label' => 'Галерея 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_photos_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_photos_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Открыт для проектов',
        ],
        [
            'key'   => 'field_orisa_photos_intro',
            'label' => 'Текст слева',
            'name'  => 'intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_photos_photo_small',
            'label'         => 'Фото слева',
            'name'          => 'photo_small',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_photos_photo_main',
            'label'         => 'Фото в центре',
            'name'          => 'photo_main',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_photos_bg_title',
            'label'         => 'Фоновый заголовок',
            'name'          => 'bg_title',
            'type'          => 'text',
            'default_value' => 'Имя Фамилия',
            'instructions'  => 'Крупная подпись поверх центрального фото.',
        ],
        [
            'key'   => 'field_orisa_photos_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_photos_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_photos_button',
            'label'         => 'Кнопка',
            'name'          => 'button',
            'type'          => 'link',
            'return_format' => 'array',
        ],
    

    ],
];
