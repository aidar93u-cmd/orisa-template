<?php
defined('ABSPATH') || exit;

/**
 * Блок «services-preview»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/services-preview.php.
 */
return [
    'key'     => 'layout_orisa_services_preview',
    'name'    => 'services-preview',
    'label'   => 'Услуги превью',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_services_preview_subtitle',
            'label'         => 'Подзаголовок',
            'name'          => 'subtitle',
            'type'          => 'text',
            'default_value' => 'НАШИ УСЛУГИ',
        ],
        [
            'key'           => 'field_orisa_services_preview_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Астрахань и вся Россия',
            'instructions'  => 'Правая подчёркнутая подпись в шапке секции.',
        ],
        [
            'key'           => 'field_orisa_services_preview_text',
            'label'         => 'Текст',
            'name'          => 'text',
            'type'          => 'text',
            'default_value' => 'Завершённых дел',
            'instructions'  => 'Подпись под счётчиком слева.',
        ],
        [
            'key'          => 'field_orisa_services_preview_services',
            'label'        => 'Услуги',
            'name'         => 'services',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить услугу',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_services_preview_image',
                    'label'         => 'Изображение',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Одно фото на услугу: выводится и в левом hover-слайдере, и в миниатюре справа.',
                ],
                [
                    'key'   => 'field_orisa_services_preview_service_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_preview_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_services_preview_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
    ],
];
