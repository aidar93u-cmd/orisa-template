<?php
defined('ABSPATH') || exit;

/**
 * Блок «get-in-touch»: контакты + форма (база: about-2.html, строки 1131-1299: .sec-4-about).
 * Левая колонка — контакты и соцсети из настроек, правая — форма CF7.
 */
return [
    'key'     => 'layout_orisa_get_in_touch',
    'name'    => 'get-in-touch',
    'label'   => 'Связаться (форма)',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_git_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_git_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Свяжитесь с нами',
        ],
        [
            'key'   => 'field_orisa_git_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_git_side_text',
            'label' => 'Текст справа',
            'name'  => 'side_text',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_git_form',
            'label'        => 'Форма CF7',
            'name'         => 'form_shortcode',
            'type'         => 'text',
            'instructions' => 'Шорткод Contact Form 7. Разметка полей — в шаблоне формы.',
        ],


    ],
];
