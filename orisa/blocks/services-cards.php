<?php
defined('ABSPATH') || exit;

/**
 * Блок «services-cards»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/services-cards.php.
 */
return [
    'key'     => 'layout_orisa_services_cards',
    'name'    => 'services-cards',
    'label'   => 'Услуги сеткой',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'          => 'field_orisa_services_cards_title',
            'label'        => 'Заголовок',
            'name'         => 'title',
            'type'         => 'text',
            'instructions' => 'Необязательно. Пусто — без заголовка, как в оригинале.',
        ],
        [
            'key'          => 'field_orisa_services_cards_cards',
            'label'        => 'Карточки',
            'name'         => 'cards',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить карточку',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_services_cards_card_image',
                    'label'         => 'Изображение',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Фон первой карточки, фото остальных. У третьей выводится дважды (сверху и снизу), как в оригинале.',
                ],
                [
                    'key'           => 'field_orisa_services_cards_card_icon',
                    'label'         => 'Иконка',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'instructions'  => 'Заменяет SVG-значок оригинала. Пусто — без иконки.',
                ],
                [
                    'key'   => 'field_orisa_services_cards_card_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_services_cards_card_text',
                    'label' => 'Текст',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
                [
                    'key'   => 'field_orisa_services_cards_card_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
            ],
        ],
    

    ],
];
