<?php
defined('ABSPATH') || exit;

/**
 * Блок «media-text»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/media-text.php.
 */
return [
    'key'     => 'layout_orisa_media_text',
    'name'    => 'media-text',
    'label'   => 'Текст с картинкой',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_media_text_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_media_text_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'image-left'  => 'Картинка слева',
                'image-right' => 'Картинка справа',
            ],
            'default_value' => 'image-left',
            'instructions'  => 'Меняет только порядок колонок (order-модификаторы Bootstrap, как в оригинале). Разметка одна.',
        ],
        [
            'key'           => 'field_orisa_media_text_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Шаг за шагом',
        ],
        [
            'key'   => 'field_orisa_media_text_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_media_text_text',
            'label'        => 'Текст',
            'name'          => 'text',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_media_text_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_media_text_image',
            'label'         => 'Картинка',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_media_text_caption',
            'label'        => 'Подпись',
            'name'         => 'caption',
            'type'         => 'text',
            'instructions' => 'Подпись под картинкой. Пусто — не выводится.',
        ],
    

    ],
];
