<?php
defined('ABSPATH') || exit;

/**
 * Портфолио — Главная 9 (index-9.html, строки 774-964: section.sec-4-home-9).
 * Каркас карточек portfolio-2.html (sec-1-portfolio-2, .alt-portfolio-item) сильно
 * отличается — variant не заведён, блок строится строго по index-9.
 * Фильтры: повторитель «подпись + значение data-filter» (первый активен);
 * карточки: повторитель (фото ID, категория, тег, метрика, описание, плашка,
 * название, ссылка). Картинки: return_format id; пустые поля гасят свои теги.
 */
return [
    'key'     => 'layout_orisa_portfolio_grid',
    'name'    => 'portfolio-grid',
    'label'   => 'Портфолио',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_portfolio_grid_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Selected work',
        ],
        [
            'key'          => 'field_orisa_portfolio_grid_filters',
            'label'        => 'Фильтры',
            'name'         => 'filters',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фильтр',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_grid_filter_label',
                    'label' => 'Подпись',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_portfolio_grid_filter_value',
                    'label'        => 'Значение data-filter',
                    'name'         => 'value',
                    'type'         => 'text',
                    'instructions' => 'Латиницей, без пробелов (all, design, photography, marketing). Должно совпадать с категорией карточек; первый фильтр активен.',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_portfolio_grid_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_portfolio_grid_card_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'          => 'field_orisa_portfolio_grid_card_category',
                    'label'        => 'Категория (data-category)',
                    'name'         => 'category',
                    'type'         => 'text',
                    'instructions' => 'Латиницей, как значение data-filter у фильтров (design, photography, marketing).',
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_tag',
                    'label' => 'Тег в оверлее',
                    'name'  => 'tag',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_metric',
                    'label' => 'Метрика в оверлее',
                    'name'  => 'metric',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_excerpt',
                    'label' => 'Описание в оверлее',
                    'name'  => 'excerpt',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_badge',
                    'label' => 'Плашка',
                    'name'  => 'badge',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_title',
                    'label' => 'Название проекта',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_grid_card_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_portfolio_grid_cta_text',
            'label' => 'Текст перед кнопкой',
            'name'  => 'cta_text',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'   => 'field_orisa_portfolio_grid_cta_link',
            'label' => 'Кнопка',
            'name'  => 'cta_link',
            'type'  => 'link',
        ],
    ],
];
