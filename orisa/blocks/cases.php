<?php
defined('ABSPATH') || exit;

/**
 * Блок «cases»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/cases.php.
 */
return [
    'key'     => 'layout_orisa_cases',
    'name'    => 'cases',
    'label' => 'Кейсы 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_cases_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'ЗАВЕРШЁННЫЕ ДЕЛА',
        ],
        [
            'key'   => 'field_orisa_cases_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_cases_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_cases_button_link',
            'label' => 'Кнопка «Смотреть все кейсы»',
            'name'  => 'button_link',
            'type'  => 'link',
        ],
        [
            'key'          => 'field_orisa_cases_items',
            'label'        => 'Кейсы',
            'name'         => 'cases',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить кейс',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_cases_item_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'          => 'field_orisa_cases_item_amount',
                    'label'        => 'Сумма списания (число)',
                    'name'         => 'amount',
                    'type'         => 'number',
                    'instructions' => 'Число для data-count (анимация — main.js, Odometer counter). Пусто — блок метрики не выводится.',
                ],
                [
                    'key'           => 'field_orisa_cases_item_metric_label',
                    'label'         => 'Подпись под суммой',
                    'name'          => 'metric_label',
                    'type'          => 'text',
                    'default_value' => 'Списано',
                ],
                [
                    'key'          => 'field_orisa_cases_item_tags',
                    'label'        => 'Теги',
                    'name'         => 'tags',
                    'type'         => 'repeater',
                    'layout'       => 'table',
                    'button_label' => 'Добавить тег',
                    'sub_fields'   => [
                        [
                            'key'   => 'field_orisa_cases_item_tag_label',
                            'label' => 'Тег',
                            'name'  => 'label',
                            'type'  => 'text',
                        ],
                    ],
                ],
                [
                    'key'   => 'field_orisa_cases_item_title',
                    'label' => 'Название кейса',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_cases_item_description',
                    'label' => 'Строка деталей',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'   => 'field_orisa_cases_item_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],


    ],
];
