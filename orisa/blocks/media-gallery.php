<?php
defined('ABSPATH') || exit;

/**
 * Блок «media-gallery»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/media-gallery.php.
 */
return [
    'key'     => 'layout_orisa_media_gallery',
    'name'    => 'media-gallery',
    'label'   => 'Медиагалерея',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_media_gallery_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Почему выбирают нас',
        ],
        [
            'key'   => 'field_orisa_media_gallery_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_media_gallery_items',
            'label'        => 'Картинки',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить картинку',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_media_gallery_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_media_gallery_caption',
                    'label' => 'Подпись',
                    'name'  => 'caption',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_media_gallery_button',
            'label'         => 'Кнопка',
            'name'          => 'button',
            'type'          => 'link',
            'return_format' => 'array',
        ],
    ],
];
