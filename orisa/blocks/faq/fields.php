<?php
defined('ABSPATH') || exit;

/**
 * ЭТАЛОННЫЙ БЛОК (этап 3). Образец для всех остальных блоков:
 * - label/instructions только по-русски; name/key — по-английски;
 * - повторители: layout block + button_label по-русски;
 * - картинки: return_format id; wysiwyg без загрузок (media_upload => 0);
 * - уникальность раскрыта в template.php (id аккордеона через orisa_block_uid()).
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
