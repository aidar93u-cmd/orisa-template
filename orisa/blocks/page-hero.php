<?php
defined('ABSPATH') || exit;

/**
 * Блок «page-hero»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/page-hero.php.
 */
return [
    'key'     => 'layout_orisa_page_hero',
    'name'    => 'page-hero',
    'label' => 'Главный экран 4',
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
