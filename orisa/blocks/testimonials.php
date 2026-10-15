<?php
defined('ABSPATH') || exit;

/**
 * Блок «testimonials»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/testimonials.php.
 */
return [
    'key'     => 'layout_orisa_testimonials',
    'name'    => 'testimonials',
    'label' => 'Отзывы 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_testimonials_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_testimonials_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'quotes' => 'Слайдер цитат',
                'cards'  => 'Карточки',
            ],
            'default_value' => 'quotes',
            'instructions'  => 'Слайдер цитат — sec-7-home-13 (парные слайдеры: фото + цитата). Карточки — sec-6-home-1 (сетка карточек со стрелками).',
        ],
        [
            'key'           => 'field_orisa_testimonials_label',
            'label'         => 'Плашка (только «Слайдер цитат»)',
            'name'          => 'label',
            'type'          => 'text',
            'default_value' => 'ОТЗЫВ',
        ],
        [
            'key'   => 'field_orisa_testimonials_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_testimonials_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'       => 'field_orisa_testimonials_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_testimonials_items',
            'label'        => 'Отзывы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить отзыв',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_testimonials_quote',
                    'label' => 'Цитата',
                    'name'  => 'quote',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_testimonials_author',
                    'label' => 'Автор',
                    'name'  => 'author',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_testimonials_position',
                    'label'        => 'Должность',
                    'name'         => 'position',
                    'type'         => 'text',
                    'instructions' => 'В «Слайдере цитат» выводится как подпись под именем (в оригинале — название проекта).',
                ],
                [
                    'key'           => 'field_orisa_testimonials_avatar',
                    'label'         => 'Аватар',
                    'name'          => 'avatar',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'          => 'field_orisa_testimonials_company',
                    'label'        => 'Компания / город (только «Карточки»)',
                    'name'         => 'company',
                    'type'         => 'text',
                ],
                [
                    'key'           => 'field_orisa_testimonials_logo',
                    'label'        => 'Логотип (только «Карточки»)',
                    'name'         => 'logo',
                    'type'         => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
    

    ],
];
