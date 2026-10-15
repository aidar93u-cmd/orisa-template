<?php
defined('ABSPATH') || exit;

/**
 * Блок «faq»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/faq.php.
 */
return [
    'key'     => 'layout_orisa_faq',
    'name'    => 'faq',
    'label'   => 'Вопросы и ответы',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_faq_badge',
            'label'        => 'Плашка-номер',
            'name'         => 'badge',
            'type'         => 'text',
            'default_value' => '[ 01 ]',
            'instructions' => 'Как в оригинале: номер группы в квадратных скобках.',
        ],
        [
            'key'   => 'field_orisa_faq_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_faq_items',
            'label'        => 'Вопросы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить вопрос',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_faq_q',
                    'label' => 'Вопрос',
                    'name'  => 'question',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_faq_a',
                    'label'        => 'Ответ',
                    'name'         => 'answer',
                    'type'         => 'wysiwyg',
                    'tabs'         => 'visual',
                    'media_upload' => 0,
                ],
            ],
        ],
    

    ],
];
