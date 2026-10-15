<?php
defined('ABSPATH') || exit;

/**
 * Блок «portfolio-details»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/portfolio-details.php.
 */
return [
    'key'     => 'layout_orisa_portfolio_details',
    'name'    => 'portfolio-details',
    'label'   => 'Кейс',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_portfolio_details_crumbs',
            'label'        => 'Хлебные крошки',
            'name'         => 'crumbs',
            'type'         => 'text',
            'instructions' => 'Как в оригинале: Portfolio / Brand Identity / Nebula®.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_title_mark',
            'label'        => 'Надстрочный знак',
            'name'         => 'title_mark',
            'type'         => 'text',
            'instructions' => 'Символ в <sup> рядом с заголовком, например ®. Пусто — без sup.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_tagline',
            'label' => 'Подзаголовок',
            'name'  => 'tagline',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_portfolio_details_tags',
            'label'        => 'Теги',
            'name'         => 'tags',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить тег',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_details_tag_label',
                    'label' => 'Тег',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_portfolio_details_demo_link',
            'label' => 'Ссылка на демо',
            'name'  => 'demo_link',
            'type'  => 'link',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_meta',
            'label'        => 'Мета (сайдбар)',
            'name'         => 'meta',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить строку',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_details_meta_label',
                    'label' => 'Подпись',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_details_meta_value',
                    'label' => 'Значение',
                    'name'  => 'value',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_portfolio_details_services',
            'label'        => 'Услуги',
            'name'         => 'services',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить услугу',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_details_service_label',
                    'label' => 'Услуга',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'          => 'field_orisa_portfolio_details_chapters',
            'label'        => 'Главы',
            'name'         => 'chapters',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить главу',
            'sub_fields'   => [
                [
                    'key'          => 'field_orisa_portfolio_details_chapter_num',
                    'label'        => 'Номер главы',
                    'name'         => 'num',
                    'type'         => 'text',
                    'instructions' => 'Например Chapter 01.',
                ],
                [
                    'key'          => 'field_orisa_portfolio_details_chapter_label',
                    'label'        => 'Подпись главы',
                    'name'         => 'label',
                    'type'         => 'text',
                    'instructions' => 'Например — Overview.',
                ],
                [
                    'key'   => 'field_orisa_portfolio_details_chapter_title',
                    'label' => 'Заголовок главы',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_details_chapter_body',
                    'label' => 'Текст главы',
                    'name'  => 'body',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'          => 'field_orisa_portfolio_details_chapter_images',
                    'label'        => 'Картинки главы',
                    'name'         => 'images',
                    'type'         => 'repeater',
                    'layout'       => 'table',
                    'button_label' => 'Добавить картинку',
                    'sub_fields'   => [
                        [
                            'key'           => 'field_orisa_portfolio_details_chapter_image',
                            'label'         => 'Фото',
                            'name'          => 'image',
                            'type'          => 'image',
                            'return_format' => 'id',
                        ],
                    ],
                ],
                [
                    'key'   => 'field_orisa_portfolio_details_chapter_quote',
                    'label' => 'Цитата главы',
                    'name'  => 'quote',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'          => 'field_orisa_portfolio_details_chapter_steps',
                    'label'        => 'Шаги',
                    'name'         => 'steps',
                    'type'         => 'repeater',
                    'layout'       => 'block',
                    'button_label' => 'Добавить шаг',
                    'instructions' => 'Номера 01, 02… подставляются автоматически по порядку.',
                    'sub_fields'   => [
                        [
                            'key'   => 'field_orisa_portfolio_details_step_title',
                            'label' => 'Шаг',
                            'name'  => 'title',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_orisa_portfolio_details_step_desc',
                            'label' => 'Описание',
                            'name'  => 'desc',
                            'type'  => 'textarea',
                            'rows'  => 2,
                        ],
                    ],
                ],
                [
                    'key'          => 'field_orisa_portfolio_details_chapter_stats',
                    'label'        => 'Цифры',
                    'name'         => 'stats',
                    'type'         => 'repeater',
                    'layout'       => 'table',
                    'button_label' => 'Добавить цифру',
                    'sub_fields'   => [
                        [
                            'key'   => 'field_orisa_portfolio_details_stat_num',
                            'label' => 'Число',
                            'name'  => 'num',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_orisa_portfolio_details_stat_label',
                            'label' => 'Подпись',
                            'name'  => 'label',
                            'type'  => 'text',
                        ],
                    ],
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_portfolio_details_quote',
            'label' => 'Цитата',
            'name'  => 'quote',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_portfolio_details_quote_author',
            'label' => 'Автор цитаты',
            'name'  => 'quote_author',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_quote_role',
            'label' => 'Должность автора',
            'name'  => 'quote_role',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_gallery',
            'label'        => 'Галерея',
            'name'         => 'gallery',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фото',
            'instructions' => 'Первые 6 фото раскладываются по рядам 2/1/3, как в оригинале.',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_portfolio_details_gallery_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_portfolio_details_next_image',
            'label'         => 'Фон следующего кейса',
            'name'          => 'next_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_next_name',
            'label' => 'Название следующего кейса',
            'name'  => 'next_name',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_next_tagline',
            'label' => 'Подзаголовок следующего кейса',
            'name'  => 'next_tagline',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_portfolio_details_next_meta',
            'label'        => 'Мета следующего кейса',
            'name'         => 'next_meta',
            'type'         => 'text',
            'instructions' => 'Например: Case Study · 2024 · Product Design.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_next_link',
            'label' => 'Ссылка следующего кейса',
            'name'  => 'next_link',
            'type'  => 'link',
        ],
    

    ],
];
