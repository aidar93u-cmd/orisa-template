<?php
defined('ABSPATH') || exit;

/**
 * Блок «faq-topics»: темы вопросов карточками (база: faqs.html, строки 47-125: .sec-2-faqs).
 * Заголовок + карточки: номер [01] проставляется автоматически по порядку.
 */
return [
    'key'     => 'layout_orisa_faq_topics',
    'name'    => 'faq-topics',
    'label'   => 'FAQ: темы',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_faq_topics_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_faq_topics_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Выберите тему',
        ],
        [
            'key'       => 'field_orisa_faq_topics_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_faq_topics_cards',
            'label'        => 'Карточки тем',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тему',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_faq_topics_card_image',
                    'label'         => 'Картинка',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_faq_topics_card_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_faq_topics_card_text',
                    'label' => 'Описание',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'   => 'field_orisa_faq_topics_card_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],


    ],
];
