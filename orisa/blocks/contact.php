<?php
defined('ABSPATH') || exit;

/**
 * Блок «contact»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/contact.php.
 */
return [
    'key'     => 'layout_orisa_contact',
    'name'    => 'contact',
    'label'   => 'Контакты',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_contact_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_contact_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'КОНТАКТЫ',
            'instructions'  => 'Как в оригинале: короткий текст плашки капсом.',
        ],
        [
            'key'   => 'field_orisa_contact_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'       => 'field_orisa_contact_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_contact_offices',
            'label'        => 'Офисы',
            'name'         => 'offices',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить офис',
            'instructions' => 'Пусто — выведется одна карточка из настроек «Контакты».',
            'sub_fields'   => [
                [
                    'key'   => 'field_orisa_contact_office_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_contact_office_address',
                    'label'        => 'Адрес',
                    'name'         => 'address',
                    'type'         => 'textarea',
                    'rows'         => 2,
                    'instructions' => 'Пусто — подставится адрес из настроек «Контакты».',
                ],
                [
                    'key'          => 'field_orisa_contact_office_phone',
                    'label'        => 'Телефон',
                    'name'         => 'phone',
                    'type'         => 'text',
                    'instructions' => 'Пусто — подставится телефон из настроек «Контакты».',
                ],
                [
                    'key'          => 'field_orisa_contact_office_email',
                    'label'        => 'Почта',
                    'name'         => 'email',
                    'type'         => 'email',
                    'instructions' => 'Пусто — подставится первая почта из настроек «Контакты».',
                ],
            ],
        ],
        [
            'key'   => 'field_orisa_contact_note',
            'label' => 'Текст справа',
            'name'  => 'note',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'          => 'field_orisa_contact_avatars',
            'label'        => 'Фото команды',
            'name'         => 'avatars',
            'type'         => 'repeater',
            'layout'       => 'table',
            'button_label' => 'Добавить фото',
            'instructions' => 'Пусто — фото подтянутся из команды автоматически.',
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_contact_avatar_image',
                    'label'         => 'Фото',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
            ],
        ],
        [
            'key'           => 'field_orisa_contact_form_title',
            'label'         => 'Заголовок формы',
            'name'          => 'form_title',
            'type'          => 'text',
            'default_value' => 'Напишите нам',
        ],
        [
            'key'          => 'field_orisa_contact_form_shortcode',
            'label'        => 'Форма CF7',
            'name'         => 'form_shortcode',
            'type'         => 'text',
            'instructions' => 'Шорткод Contact Form 7, например [contact-form-7 id="123" title="Контакты"]. Разметка полей — в шаблоне формы.',
        ],
        [
            'key'           => 'field_orisa_contact_socials_title',
            'label'         => 'Заголовок соцсетей',
            'name'          => 'socials_title',
            'type'          => 'text',
            'default_value' => 'Мы на связи',
        ],
    

    ],
];
