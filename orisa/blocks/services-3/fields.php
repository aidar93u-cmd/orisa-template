<?php
defined('ABSPATH') || exit;

/**
 * Услуги-3 (база: services-3.html, строки 602-684: .sec-2-services сетка .at-service-card).
 * - label/instructions только по-русски; name/key — по-английски;
 * - ключи field_orisa_services_3_*, layout key layout_orisa_services_3;
 * - картинки: return_format id (фото и иконка — два ID: фото идёт в data-background/img-cover,
 *   иконка заменяет inline-SVG оригинала);
 * - повторитель: layout block + button_label по-русски;
 * - заголовок блока необязателен и в оригинале отсутствует: пусто — сетка как в оригинале.
 */
return [
    'key'     => 'layout_orisa_services_3',
    'name'    => 'services-3',
    'label'   => 'Услуги-3',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_services_3_title',
            'label'        => 'Заголовок',
            'name'         => 'title',
            'type'         => 'text',
            'instructions' => 'Необязательно. Пусто — без заголовка, как в оригинале.',
        ],
        [
            'key'          => 'field_orisa_services_3_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_services_3_card_image',
                    'label'         => 'Изображение',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Фон первой карточки, фото остальных. У третьей выводится дважды (сверху и снизу), как в оригинале.',
                ],
                [
                    'key'           => 'field_orisa_services_3_card_icon',
                    'label'         => 'Иконка',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Заменяет SVG-значок оригинала. Пусто — без иконки.',
                ],
                [
                    'key'   => 'field_orisa_services_3_card_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_3_card_text',
                    'label' => 'Текст',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_services_3_card_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
    ],
];
