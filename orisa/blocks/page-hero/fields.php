<?php
defined('ABSPATH') || exit;

/**
 * Шапка внутренней страницы (база: 404, строки 567-629, .sec-1-404).
 * - label по-русски; name/key — по-английски;
 * - картинка: return_format id.
 */
return [
    'key'     => 'layout_orisa_page_hero',
    'name'    => 'page-hero',
    'label'   => 'Шапка внутренней страницы',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'   => 'field_orisa_page_hero_badge',
            'label' => 'Плашка',
            'name'  => 'badge',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_page_hero_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_page_hero_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_page_hero_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_page_hero_image',
            'label'         => 'Изображение справа',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
    ],
];
