<?php
defined('ABSPATH') || exit;

/**
 * Контакты (база: contact-2.html, .sec-1-contact — без page-hero и moving-gallery,
 * это отдельные блоки page-hero и logo-marquee):
 * - label/instructions только по-русски; name/key — по-английски;
 * - повторители: layout block/table + button_label по-русски;
 * - телефон/почта/адрес офиса: пустое поле подтягивается из настроек «Контакты» (Options);
 * - соцсети: ссылки из Options; форма: шорткод CF7 (поле «Форма CF7»);
 * - картинки аватаров: return_format id.
 */
return [
    'key'     => 'layout_orisa_contact',
    'name'    => 'contact',
    'label'   => 'Контакты',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_contact_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'CONTACT US',
            'instructions'  => 'Как в оригинале: короткий текст плашки капсом.',
        ],
        [
            'key'   => 'field_orisa_contact_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
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
            'default_value' => 'Drop us a line',
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
            'default_value' => 'Follow Us',
        ],
    ],
];
