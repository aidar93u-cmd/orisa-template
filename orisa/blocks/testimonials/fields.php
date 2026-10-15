<?php
defined('ABSPATH') || exit;

/**
 * Отзывы. База — index-13.html 1346-1492 (section.sec-7-home-13):
 * синхронизированная пара swiper-слайдеров — медиа и цитаты (main.js §47b-4),
 * шапка (плашка, заголовок, лид), слайд — blockquote + quote-foot.
 * Общий каркас с index.html 1112-1429 (.slider-testimonial + .testimonial-cart-wrap,
 * main.js §47 customSwiper) — второй вариант того же блока.
 * Слайды — один повторитель на обе версии, чтобы парные слайдеры (медиа + цитаты)
 * не рассинхронизировались. Звёзды — статичный декор (как стрелки at-btn в эталоне).
 * Картинки: return_format id.
 */
return [
    'key'     => 'layout_orisa_testimonials',
    'name'    => 'testimonials',
    'label'   => 'Отзывы',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_testimonials_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'quotes' => 'Слайдер цитат',
                'cards'  => 'Карточки',
            ],
            'default_value' => 'quotes',
            'instructions'  => 'Слайдер цитат — sec-7-home-13 (парные слайдеры: фото + цитата). Карточки — sec-6-home-1 (сетка карточек со стрелками).',
        ],
        [
            'key'           => 'field_orisa_testimonials_label',
            'label'         => 'Плашка (только «Слайдер цитат»)',
            'name'          => 'label',
            'type'          => 'text',
            'default_value' => 'TESTIMONIAL',
        ],
        [
            'key'   => 'field_orisa_testimonials_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_orisa_testimonials_subtitle',
            'label' => 'Подзаголовок',
            'name'  => 'subtitle',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_orisa_testimonials_items',
            'label'        => 'Отзывы',
            'name'         => 'items',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить отзыв',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_testimonials_quote',
                    'label' => 'Цитата',
                    'name'  => 'quote',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_testimonials_author',
                    'label' => 'Автор',
                    'name'  => 'author',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_testimonials_position',
                    'label'        => 'Должность',
                    'name'         => 'position',
                    'type'         => 'text',
                    'instructions' => 'В «Слайдере цитат» выводится как подпись под именем (в оригинале — название проекта).',
                ],
                [
                    'key'           => 'field_orisa_testimonials_avatar',
                    'label'         => 'Аватар',
                    'name'          => 'avatar',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'          => 'field_orisa_testimonials_company',
                    'label'        => 'Компания / город (только «Карточки»)',
                    'name'         => 'company',
                    'type'         => 'text',
                ],
                [
                    'key'           => 'field_orisa_testimonials_logo',
                    'label'        => 'Логотип (только «Карточки»)',
                    'name'         => 'logo',
                    'type'         => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
    ],
];
