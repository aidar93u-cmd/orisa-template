<?php
defined('ABSPATH') || exit;

/**
 * Услуга детально (база: services-details-4.html, <main>: sd4-hero/practice/flow/deliver/cta/next).
 * services-details.html несовместим с services-details-4.html (другой каркас: section-fix/swiper/
 * scroll-section/at-service-card против sd4-классов и data-sd4-атрибутов со своим services-details-4.js) —
 * variant не заведён, блок строго по services-details-4.
 * - label/instructions по-русски; name/key — по-английски;
 * - картинки: return_format id; номера модулей и шагов подставляются автоматически по порядку;
 * - счётчик deliver: число — поле (попадёт в data-to), стартовый «0» рисует JS;
 * - пустые поля гасят свои теги (см. template.php).
 */
return [
    'key'     => 'layout_orisa_service_details',
    'name'    => 'service-details',
    'label'   => 'Услуга детально',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'   => 'field_orisa_service_details_crumb_link',
            'label' => 'Хлебные крошки (родитель)',
            'name'  => 'crumb_link',
            'type'  => 'link',
        ],
        [
            'key'   => 'field_orisa_service_details_crumb_current',
            'label' => 'Хлебные крошки (текущая)',
            'name'  => 'crumb_current',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_details_chip',
            'label' => 'Плашка hero',
            'name'  => 'chip',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_details_hero_title',
            'label' => 'Заголовок hero (строка 1)',
            'name'  => 'hero_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_details_hero_title_fill',
            'label'        => 'Заголовок hero (строка 2, заливка)',
            'name'         => 'hero_title_fill',
            'type'         => 'text',
            'instructions' => 'Вторая строка заголовка, другим начертанием.',
        ],
        [
            'key'   => 'field_orisa_service_details_hero_lead',
            'label' => 'Лид hero',
            'name'  => 'hero_lead',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_service_details_hero_button',
            'label' => 'Кнопка hero',
            'name'  => 'hero_button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_service_details_hero_ghost',
            'label'         => 'Текст ссылки-призрака',
            'name'          => 'hero_ghost',
            'type'          => 'text',
            'default_value' => 'Design flow',
            'instructions'  => 'Ведёт на якорь шагов (#sd4-flow).',
        ],
        [
            'key'          => 'field_orisa_service_details_gallery',
            'label'        => 'Галерея hero',
            'name'         => 'gallery',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фото',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_service_details_gallery_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_details_practice_label',
            'label'         => 'Подпись модулей',
            'name'          => 'practice_label',
            'type'          => 'text',
            'default_value' => '[01] Practice',
        ],
        [
            'key'   => 'field_orisa_service_details_practice_title',
            'label' => 'Заголовок модулей',
            'name'  => 'practice_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_details_modules',
            'label'        => 'Модули',
            'name'         => 'modules',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить модуль',
            'instructions' => 'Номера 01, 02… подставляются автоматически по порядку.',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_details_module_title',
                    'label' => 'Модуль',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_service_details_module_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_details_flow_label',
            'label'         => 'Подпись шагов',
            'name'          => 'flow_label',
            'type'          => 'text',
            'default_value' => '[02] Flow',
        ],
        [
            'key'   => 'field_orisa_service_details_flow_title',
            'label' => 'Заголовок шагов',
            'name'  => 'flow_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_details_steps',
            'label'        => 'Шаги',
            'name'         => 'steps',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить шаг',
            'instructions' => 'Номера 01, 02… подставляются автоматически по порядку.',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_details_step_title',
                    'label' => 'Шаг',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_service_details_step_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_details_deliver_image',
            'label'         => 'Фото результата',
            'name'          => 'deliver_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_service_details_stat_label',
            'label' => 'Подпись счётчика',
            'name'  => 'stat_label',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_details_stat_number',
            'label'        => 'Число счётчика',
            'name'         => 'stat_number',
            'type'         => 'number',
            'instructions' => 'Попадёт в data-to, анимацию крутит services-details-4.js.',
        ],
        [
            'key'   => 'field_orisa_service_details_stat_caption',
            'label' => 'Пояснение счётчика',
            'name'  => 'stat_caption',
            'type'  => 'text',
        ],
        [
            'key'           => 'field_orisa_service_details_deliver_label',
            'label'         => 'Подпись результата',
            'name'          => 'deliver_label',
            'type'          => 'text',
            'default_value' => '[03] Package',
        ],
        [
            'key'   => 'field_orisa_service_details_deliver_title',
            'label' => 'Заголовок результата',
            'name'  => 'deliver_title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_service_details_deliver_items',
            'label'        => 'Состав результата',
            'name'         => 'deliver_items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить пункт',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_details_deliver_item_title',
                    'label' => 'Пункт',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_service_details_deliver_item_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_service_details_cta_label',
            'label'         => 'Подпись CTA',
            'name'          => 'cta_label',
            'type'          => 'text',
            'default_value' => '[04] Engage',
        ],
        [
            'key'   => 'field_orisa_service_details_cta_title',
            'label' => 'Заголовок CTA',
            'name'  => 'cta_title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_service_details_cta_text',
            'label' => 'Текст CTA',
            'name'  => 'cta_text',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_service_details_cta_button',
            'label' => 'Кнопка CTA',
            'name'  => 'cta_button',
            'type'  => 'link',
        ],
        [
            'key'          => 'field_orisa_service_details_next_links',
            'label'        => 'Следующие услуги',
            'name'         => 'next_links',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить ссылку',
            'instructions' => 'В оригинале три ссылки на другие услуги.',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_service_details_next_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
    ],
];
