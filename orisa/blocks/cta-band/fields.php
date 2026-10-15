<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'   => 'field_orisa_cta_band_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_cta_band_text',
            'label' => 'Текст',
            'name'  => 'text',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_cta_band_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_cta_band_background',
            'label'         => 'Фон',
            'name'          => 'background',
            'type'          => 'image',
            'return_format' => 'id',
            'instructions'  => 'Фон полосы (в оригинале фона нет, подложка — var(--at-neutral-50)).',
        ],
    
];
