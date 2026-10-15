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
            'key'           => 'field_orisa_faq_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'standard' => 'Стандарт (faqs.html sec-3)',
                'alt'      => 'Alt с картинкой (index alt-faq-area)',
            ],
            'default_value' => 'standard',
            'instructions'  => 'Alt — левая колонка с картинкой и кнопкой, каркас аккордеона (at-faq-item + Bootstrap collapse) общий.',
        ],
        [
            'key'          => 'field_orisa_faq_badge',
            'label'        => 'Плашка-номер',
            'name'         => 'badge',
            'type'         => 'text',
            'default_value' => '[ 01 ]',
            'instructions' => 'Стандарт — номер группы в квадратных скобках. Alt — одно слово, как в оригинале: ВОПРОСЫ.',
        ],
        [
            'key'   => 'field_orisa_faq_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_subtitle',
            'label' => 'Подзаголовок (только «Стандарт»)',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_faq_side_image',
            'label'         => 'Картинка слева (только «Alt»)',
            'name'          => 'side_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_faq_side_title',
            'label' => 'Заголовок слева (только «Alt»)',
            'name'  => 'side_title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_side_text',
            'label' => 'Текст слева (только «Alt»)',
            'name'  => 'side_text',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_faq_side_button',
            'label' => 'Кнопка слева (только «Alt»)',
            'name'  => 'side_button',
            'type'  => 'link',
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
