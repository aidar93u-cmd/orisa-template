<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
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
            'default_value' => 'Step by step',
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
    
];
