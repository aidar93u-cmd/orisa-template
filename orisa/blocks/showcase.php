<?php
defined('ABSPATH') || exit;

/**
 * Блок «showcase»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/showcase.php.
 */
return [
    'key'     => 'layout_orisa_showcase',
    'name'    => 'showcase',
    'label'   => 'Витрина',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'   => 'field_orisa_showcase_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_showcase_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_showcase_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_showcase_badge_image',
            'label'         => 'Картинка бейджа кнопки',
            'name'          => 'badge_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_showcase_items',
            'label'        => 'Отзывы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить отзыв',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_showcase_quote',
                    'label' => 'Текст',
                    'name'  => 'quote',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_showcase_author',
                    'label' => 'Автор',
                    'name'  => 'author',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_showcase_position',
                    'label' => 'Должность',
                    'name'  => 'position',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_showcase_company',
                    'label' => 'Город',
                    'name'  => 'company',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_orisa_showcase_avatar',
                    'label'         => 'Фото',
                    'name'          => 'avatar',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'           => 'field_orisa_showcase_logo',
                    'label'         => 'Логотип',
                    'name'          => 'logo',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],


    ],
];
