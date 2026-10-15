<?php
defined('ABSPATH') || exit;

/**
 * Услуги (база: services-4.html, строки 614-943: .svc4-index аккордеон + .svc4-engage процесс/контакты).
 * - label/instructions только по-русски; name/key — по-английски;
 * - ключи field_orisa_services_list_*, layout key layout_orisa_services_list;
 * - картинки: return_format id (миниатюра и большой кадр — один ID);
 * - повторители: layout block + button_label по-русски;
 * - состав услуги — textarea построчно (каждая строка = <li>), без вложенного повторителя.
 */
return [
    'key'     => 'layout_orisa_services_list',
    'name'    => 'services-list',
    'label'   => 'Услуги',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_services_list_index_badge',
            'label'         => 'Плашка списка',
            'name'          => 'index_badge',
            'type'          => 'text',
            'default_value' => 'Offerings',
        ],
        [
            'key'           => 'field_orisa_services_list_index_title',
            'label'         => 'Заголовок списка',
            'name'          => 'index_title',
            'type'          => 'text',
            'default_value' => 'Service index',
        ],
        [
            'key'   => 'field_orisa_services_list_index_hint',
            'label' => 'Подсказка списка',
            'name'  => 'index_hint',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_services_list_services',
            'label'        => 'Услуги',
            'name'         => 'services',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить услугу',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_services_list_image',
                    'label'         => 'Изображение',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_services_list_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_list_tag',
                    'label' => 'Подпись-тег',
                    'name'  => 'tag',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_list_description',
                    'label' => 'Описание',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'          => 'field_orisa_services_list_deliverables',
                    'label'        => 'Состав услуги',
                    'name'         => 'deliverables',
                    'type'         => 'textarea',
                    'rows'         => 4,
                    'instructions' => 'Каждый пункт с новой строки, станет списком.',
                ],
                [
                    'key'   => 'field_orisa_services_list_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
                [
                    'key'   => 'field_orisa_services_list_span',
                    'label' => 'Срок',
                    'name'  => 'span',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_list_best_when',
                    'label' => 'Когда подходит',
                    'name'  => 'best_when',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_services_list_process_badge',
            'label'         => 'Плашка процесса',
            'name'          => 'process_badge',
            'type'          => 'text',
            'default_value' => 'Step by step',
        ],
        [
            'key'           => 'field_orisa_services_list_process_title',
            'label'         => 'Заголовок процесса',
            'name'          => 'process_title',
            'type'          => 'text',
            'default_value' => 'Our process',
        ],
        [
            'key'   => 'field_orisa_services_list_process_subtitle',
            'label' => 'Подзаголовок процесса',
            'name'  => 'process_subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_services_list_steps',
            'label'        => 'Шаги процесса',
            'name'         => 'steps',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить шаг',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_services_list_step_image',
                    'label'         => 'Изображение',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_services_list_step_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_list_step_text',
                    'label' => 'Описание',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_services_list_step_time',
                    'label' => 'Срок',
                    'name'  => 'time',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_list_step_note',
                    'label' => 'Примечание',
                    'name'  => 'note',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_services_list_contact_phone',
            'label' => 'Телефон',
            'name'  => 'contact_phone',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_services_list_contact_email',
            'label' => 'Почта',
            'name'  => 'contact_email',
            'type'  => 'email',
        ],
        [
            'key'   => 'field_orisa_services_list_contact_address',
            'label' => 'Адрес',
            'name'  => 'contact_address',
            'type'  => 'text',
        ],
    ],
];
