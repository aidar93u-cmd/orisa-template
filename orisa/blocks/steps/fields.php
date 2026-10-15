<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'           => 'field_orisa_steps_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'OUR PROCESS',
        ],
        [
            'key'           => 'field_orisa_steps_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'How we shape every project, from blueprint to build.',
        ],
        [
            'key'   => 'field_orisa_steps_subtitle',
            'label' => 'Описание',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_steps_metrics',
            'label'        => 'Показатели',
            'name'         => 'metrics',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить показатель',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_steps_metric_num',
                    'label' => 'Значение',
                    'name'  => 'num',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_steps_metric_label',
                    'label' => 'Подпись',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_steps_items',
            'label'        => 'Шаги',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить шаг',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'          => 'field_orisa_steps_number',
                    'label'        => 'Номер',
                    'name'         => 'number',
                    'type'         => 'text',
                    'instructions' => 'Пусто — подставится порядковый (01, 02…).',
                ],
                [
                    'key'           => 'field_orisa_steps_icon',
                    'label'         => 'Иконка',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Необязательно. Пусто — штатная точка таймлайна.',
                ],
                [
                    'key'   => 'field_orisa_steps_week',
                    'label' => 'Срок',
                    'name'  => 'week',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_steps_item_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_steps_item_text',
                    'label' => 'Текст',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'          => 'field_orisa_steps_deliverables',
                    'label'        => 'Результаты',
                    'name'         => 'deliverables',
                    'type'         => 'textarea',
                    'rows'         => 4,
                    'instructions' => 'Каждый пункт с новой строки, станет списком.',
                ],
            ],
        ],
    
];
