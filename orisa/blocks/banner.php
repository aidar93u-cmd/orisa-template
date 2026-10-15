<?php
defined('ABSPATH') || exit;

/**
 * Блок «banner»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/banner.php.
 */
return [
    'key'     => 'layout_orisa_banner',
    'name'    => 'banner',
    'label' => 'Главный экран 3',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_banner_background',
            'label'         => 'Фон',
            'name'          => 'background',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'           => 'field_orisa_banner_logo',
            'label'         => 'Логотип',
            'name'          => 'logo',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_banner_brand_name',
            'label' => 'Название бренда',
            'name'  => 'brand_name',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_banner_location',
            'label' => 'Метка региона',
            'name'  => 'location',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_banner_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_banner_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_banner_schedule',
            'label' => 'Примечание о времени',
            'name'  => 'schedule',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_banner_side_text',
            'label' => 'Текст справа',
            'name'  => 'side_text',
            'type'  => 'textarea',
            'rows'  => 3,
        ],


    ],
];
