<?php
defined('ABSPATH') || exit;

/**
 * Блок «pricing»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/pricing.php.
 */
return [
    'key'     => 'layout_orisa_pricing',
    'name'    => 'pricing',
    'label'   => 'Тарифы',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_pricing_plans',
            'label'        => 'Тарифы',
            'name'         => 'plans',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить тариф',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_pricing_plan_name',
                    'label' => 'Название',
                    'name'  => 'name',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_pricing_plan_desc',
                    'label' => 'Описание',
                    'name'  => 'desc',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'   => 'field_orisa_pricing_plan_price',
                    'label' => 'Цена',
                    'name'  => 'price',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_orisa_pricing_plan_currency',
                    'label'         => 'Валюта',
                    'name'          => 'currency',
                    'type'          => 'text',
                    'default_value' => '₽',
                ],
                [
                    'key'           => 'field_orisa_pricing_plan_period',
                    'label'         => 'Период',
                    'name'          => 'period',
                    'type'          => 'text',
                    'default_value' => '/ месяц',
                ],
                [
                    'key'   => 'field_orisa_pricing_plan_button',
                    'label' => 'Кнопка',
                    'name'  => 'button',
                    'type'  => 'link',
                ],
                [
                    'key'   => 'field_orisa_pricing_plan_featured',
                    'label' => 'Выделить (тёмная карточка)',
                    'name'  => 'featured',
                    'type'  => 'true_false',
                    'ui'    => 1,
                ],
                [
                    'key'          => 'field_orisa_pricing_plan_features',
                    'label'        => 'Преимущества',
                    'name'         => 'features',
                    'type'         => 'repeater',
                    'layout'       => 'block',
                    'button_label' => 'Добавить пункт',
                    'sub_fields'   => [
                        [
                            'key'   => 'field_orisa_pricing_plan_feature_item',
                            'label' => 'Пункт',
                            'name'  => 'item',
                            'type'  => 'text',
                        ],
                    ],
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_pricing_testimonials',
            'label'        => 'Отзывы',
            'name'         => 'testimonials',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить отзыв',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_pricing_t_photo',
                    'label'         => 'Фото',
                    'name'          => 'photo',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_pricing_t_quote',
                    'label' => 'Цитата',
                    'name'  => 'quote',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'           => 'field_orisa_pricing_t_avatar',
                    'label'         => 'Аватар',
                    'name'          => 'avatar',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_pricing_t_name',
                    'label' => 'Имя',
                    'name'  => 'name',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_pricing_t_role',
                    'label' => 'Должность',
                    'name'  => 'role',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_pricing_t_stats',
                    'label'        => 'Показатели',
                    'name'         => 'stats',
                    'type'         => 'repeater',
                    'layout'       => 'block',
                    'button_label' => 'Добавить показатель',
                    'sub_fields'   => [
                        [
                            'key'   => 'field_orisa_pricing_t_stat_value',
                            'label' => 'Значение',
                            'name'  => 'value',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_orisa_pricing_t_stat_label',
                            'label' => 'Подпись',
                            'name'  => 'label',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_orisa_pricing_t_stat_note',
                            'label' => 'Примечание',
                            'name'  => 'note',
                            'type'  => 'text',
                        ],
                    ],
                ],
            ],
        ],
    

    ],
];
