<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
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
    
];
