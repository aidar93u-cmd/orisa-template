<?php
defined('ABSPATH') || exit;

/**
 * Блок «about-preview»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/about-preview.php.
 */
return [
    'key'     => 'layout_orisa_about_preview',
    'name'    => 'about-preview',
    'label' => 'О компании 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_about_preview_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'О компании',
        ],
        [
            'key'   => 'field_orisa_about_preview_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_about_preview_text',
            'label' => 'Текст',
            'name'  => 'text',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'           => 'field_orisa_about_preview_button',
            'label'         => 'Кнопка',
            'name'          => 'button',
            'type'          => 'link',
            'return_format' => 'array',
        ],
        [
            'key'          => 'field_orisa_about_preview_avatars',
            'label'        => 'Аватары',
            'name'         => 'avatars',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить аватар',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_about_preview_avatar_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_about_preview_process_images',
            'label'        => 'Картинки процесса',
            'name'         => 'process_images',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить картинку',
            'min'          => 0,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_about_preview_process_image',
                    'label'         => 'Картинка',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],


    ],
];
