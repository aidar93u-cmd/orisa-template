<?php
defined('ABSPATH') || exit;

/**
 * Блок «faq-hero»: шапка страницы FAQ (база: faqs.html, строки 2-45: .sec-1-faqs).
 * Бейдж, заголовок, подзаголовок, поиск по сайту (WP, home_url + name="s").
 */
return [
    'key'     => 'layout_orisa_faq_hero',
    'name'    => 'faq-hero',
    'label'   => 'FAQ: шапка',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_faq_hero_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_faq_hero_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Частые вопросы',
        ],
        [
            'key'   => 'field_orisa_faq_hero_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_hero_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_faq_hero_search_ph',
            'label'         => 'Поиск: плейсхолдер',
            'name'          => 'search_placeholder',
            'type'          => 'text',
            'default_value' => 'Ваш вопрос...',
        ],
        [
            'key'           => 'field_orisa_faq_hero_search_btn',
            'label'         => 'Поиск: кнопка',
            'name'          => 'search_button',
            'type'          => 'text',
            'default_value' => 'Найти ответ',
        ],


    ],
];
