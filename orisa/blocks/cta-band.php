<?php
defined('ABSPATH') || exit;

/**
 * Блок «cta-band»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/cta-band.php.
 */
return [
    'key'     => 'layout_orisa_cta_band',
    'name'    => 'cta-band',
    'label'   => 'Призыв к действию',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_cta_band_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
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
    

    ],
];
