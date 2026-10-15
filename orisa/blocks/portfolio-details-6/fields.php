<?php
defined('ABSPATH') || exit;

/**
 * Кейс-6 (добор к блоку portfolio-details, который покрыл только details-4).
 * База: portfolio-details-6.html, <main>: sec-1…sec-7-portfolio-details-6
 * (границы 581–897 расширены по балансу: полная sec-1 с шапки, полная sec-7 до </section>).
 * - label/instructions по-русски; name/key — по-английски;
 * - картинки: return_format id; magazine-текст — wysiwyg без загрузок (media_upload => 0);
 * - галерея sec-3 — повторитель (классы swiper дословно в template.php);
 * - sec-4 (цифры), sec-6 (FAQ), marquee-лента — статичный декор, полей нет;
 * - пустые поля гасят свои теги (см. template.php).
 */
return [
    'key'     => 'layout_orisa_portfolio_details_6',
    'name'    => 'portfolio-details-6',
    'label'   => 'Кейс-6',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_portfolio_details_6_byline',
            'label'        => 'Подпись выпуска',
            'name'         => 'byline',
            'type'         => 'text',
            'instructions' => 'Как в оригинале: Issue N°06 · May 2024 · Case Study.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_title_mark',
            'label'        => 'Надстрочный знак',
            'name'         => 'title_mark',
            'type'         => 'text',
            'instructions' => 'Символ в <sup> рядом с заголовком, например ®. Пусто — без sup.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_tagline',
            'label' => 'Подзаголовок',
            'name'  => 'tagline',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_credits',
            'label'        => 'Авторы',
            'name'         => 'credits',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить строку',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_details_6_credit_label',
                    'label' => 'Подпись',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_portfolio_details_6_credit_value',
                    'label' => 'Значение',
                    'name'  => 'value',
                    'type'  => 'text',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_magazine_eyebrow',
            'label' => 'Рубрика magazine-блока',
            'name'  => 'magazine_eyebrow',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_magazine_body',
            'label'        => 'Текст magazine-блока',
            'name'         => 'magazine_body',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_magazine_pullout',
            'label' => 'Выноска magazine-блока',
            'name'  => 'magazine_pullout',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'           => 'field_orisa_portfolio_details_6_magazine_image',
            'label'         => 'Фото magazine-блока',
            'name'          => 'magazine_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_gallery_eyebrow',
            'label' => 'Подпись галереи',
            'name'  => 'gallery_eyebrow',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_gallery_heading',
            'label' => 'Заголовок галереи',
            'name'  => 'gallery_heading',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_gallery_hint',
            'label'        => 'Подсказка галереи',
            'name'         => 'gallery_hint',
            'type'         => 'text',
            'instructions' => 'Как в оригинале: Drag to explore.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_gallery_caption',
            'label' => 'Подпись под слайдером',
            'name'  => 'gallery_caption',
            'type'  => 'text',
            'instructions' => 'Например: Editorial campaign, Spring 2024. Счётчик 01 / NN подставится сам.',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_gallery',
            'label'        => 'Слайды галереи',
            'name'         => 'gallery',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фото',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_portfolio_details_6_gallery_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_quote',
            'label' => 'Цитата',
            'name'  => 'quote',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_quote_author',
            'label' => 'Автор цитаты',
            'name'  => 'quote_author',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_quote_role',
            'label' => 'Должность автора',
            'name'  => 'quote_role',
            'type'  => 'text',
        ],
        [
            'key'           => 'field_orisa_portfolio_details_6_quote_image',
            'label'         => 'Портрет автора',
            'name'          => 'quote_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_next_link',
            'label' => 'Ссылка следующего кейса',
            'name'  => 'next_link',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_portfolio_details_6_next_image',
            'label'         => 'Фото следующего кейса',
            'name'          => 'next_image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_next_num',
            'label'        => 'Номер следующего кейса',
            'name'         => 'next_num',
            'type'         => 'text',
            'instructions' => 'Например: Project N°07.',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_next_name',
            'label' => 'Название следующего кейса',
            'name'  => 'next_name',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_portfolio_details_6_next_tagline',
            'label' => 'Подзаголовок следующего кейса',
            'name'  => 'next_tagline',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_next_meta',
            'label'        => 'Мета следующего кейса',
            'name'         => 'next_meta',
            'type'         => 'text',
            'instructions' => 'Например: Case Study · 2024 · Product Design.',
        ],
        [
            'key'          => 'field_orisa_portfolio_details_6_next_tags',
            'label'        => 'Теги следующего кейса',
            'name'         => 'next_tags',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить тег',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_portfolio_details_6_next_tag_label',
                    'label' => 'Тег',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
];
