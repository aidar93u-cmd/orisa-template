<?php
defined('ABSPATH') || exit;

/**
 * Скоро (база: coming-soon.html, <main>: баннер, data-countdown, throwable-сцена).
 * - label/instructions только по-русски; name/key — по-английски;
 * - дата — text (формат main.js, гл. 34); картинка — return_format id;
 * - форма — шорткод CF7 (поле «Форма CF7»).
 */
return [
    'key'     => 'layout_orisa_coming_soon',
    'name'    => 'coming-soon',
    'label'   => 'Скоро',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_coming_soon_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Coming Soon',
        ],
        [
            'key'           => 'field_orisa_coming_soon_text',
            'label'         => 'Текст',
            'name'          => 'text',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'We’re crafting something exciting — a special surprise just for our subscribers.',
        ],
        [
            'key'           => 'field_orisa_coming_soon_date',
            'label'         => 'Дата окончания',
            'name'          => 'date',
            'type'          => 'text',
            'default_value' => '2026/09/12 00:00:00',
            'instructions'  => 'Формат как в оригинале: 2026/09/12 00:00:00 (main.js, гл. 34).',
        ],
        [
            'key'           => 'field_orisa_coming_soon_image',
            'label'         => 'Изображение-баннер',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_coming_soon_form_shortcode',
            'label'        => 'Форма CF7',
            'name'         => 'form_shortcode',
            'type'         => 'text',
            'instructions' => 'Шорткод Contact Form 7, например [contact-form-7 id="123" title="Скоро"]. Разметка полей — в шаблоне формы.',
        ],
    ],
];
