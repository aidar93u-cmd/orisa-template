<?php
defined('ABSPATH') || exit;

/**
 * Блок «slider»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/slider.php.
 */
return [
    'key'     => 'layout_orisa_slider',
    'name'    => 'slider',
    'label'   => 'Слайдер',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'            => 'field_orisa_slider_brand_title',
            'label'          => 'Заголовок-бренд',
            'name'           => 'brand_title',
            'type'           => 'wysiwyg',
            'tabs'           => 'visual',
            'media_upload'   => 0,
            'default_value'  => 'Архитектура<sup>&reg;</sup>',
            'instructions'   => 'Строка бренда над слайдером. Разрешены только строчные теги (sup).',
        ],
        [
            'key'   => 'field_orisa_slider_since_link',
            'label' => 'Ссылка «Since»',
            'name'  => 'since_link',
            'type'  => 'link',
        ],
        [
            'key'          => 'field_orisa_slider_slides',
            'label'        => 'Слайды и услуги',
            'name'         => 'slides',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить слайд',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_slider_tagline',
                    'label' => 'Плашка',
                    'name'  => 'tagline',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_slider_headline',
                    'label' => 'Заголовок слайда',
                    'name'  => 'headline',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_orisa_slider_bg_image',
                    'label'         => 'Фон слайда',
                    'name'          => 'bg_image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'           => 'field_orisa_slider_service_icon',
                    'label'         => 'Иконка услуги',
                    'name'          => 'service_icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_slider_service_num',
                    'label' => 'Номер услуги',
                    'name'  => 'service_num',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_slider_service_name',
                    'label' => 'Название услуги',
                    'name'  => 'service_name',
                    'type'  => 'text',
                ],
            ],
        ],
    

    ],
];
