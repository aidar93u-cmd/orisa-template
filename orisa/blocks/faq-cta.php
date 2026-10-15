<?php
defined('ABSPATH') || exit;

/**
 * Блок «faq-cta»: финальный призыв страницы FAQ (база: faqs.html, строки 476-515: .sec-4-faqs).
 * Заголовок, текст, почта и телефон ссылками. Декор-SVG статичный.
 */
return [
    'key'     => 'layout_orisa_faq_cta',
    'name'    => 'faq-cta',
    'label'   => 'FAQ: финал',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_faq_cta_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_faq_cta_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Остались вопросы?',
        ],
        [
            'key'   => 'field_orisa_faq_cta_text',
            'label' => 'Текст',
            'name'  => 'text',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_faq_cta_email',
            'label' => 'Почта',
            'name'  => 'email',
            'type'  => 'email',
        ],
        [
            'key'   => 'field_orisa_faq_cta_phone',
            'label' => 'Телефон (текст)',
            'name'  => 'phone',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_cta_phone_href',
            'label' => 'Телефон (ссылка tel:)',
            'name'  => 'phone_href',
            'type'  => 'text',
        ],


    ],
];
