<?php
defined('ABSPATH') || exit;

/**
 * Призыв к действию (services-details-4.html, SD4 — CTA, .sd4-cta__band).
 * label/instructions по-русски; name/key по-английски;
 * кнопка — Link; фон — Image ID (вывод через data-background, приём из hero-home-4).
 */
return [
    'key'     => 'layout_orisa_cta_band',
    'name'    => 'cta-band',
    'label'   => 'Призыв к действию',
    'display' => 'block',
    'sub_fields' => [
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
