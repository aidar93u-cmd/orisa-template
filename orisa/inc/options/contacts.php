<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Контакты»: телефоны, мессенджеры, соцсети, адрес.
 */
add_action('acf/init', 'orisa_options_contacts');
function orisa_options_contacts() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_contacts',
        'title'    => 'Контакты',
        'fields'   => [
            [
                'key'   => 'field_orisa_opt_phone',
                'label' => 'Телефон',
                'name'  => 'phone',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_orisa_opt_phone_href',
                'label'        => 'Телефон (ссылка tel:)',
                'name'          => 'phone_href',
                'type'          => 'text',
                'instructions' => 'Например: tel:+79275558811.',
            ],
            [
                'key'   => 'field_orisa_opt_phone2',
                'label' => 'Второй телефон (подвал)',
                'name'  => 'phone_secondary',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_whatsapp',
                'label' => 'Ссылка WhatsApp',
                'name'  => 'whatsapp_url',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_address',
                'label' => 'Адрес',
                'name'  => 'address',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'   => 'field_orisa_opt_soc_wa',
                'label' => 'Соцсеть: WhatsApp (ссылка)',
                'name'  => 'soc_whatsapp',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_soc_tg',
                'label' => 'Соцсеть: Telegram (ссылка)',
                'name'  => 'soc_telegram',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_soc_max',
                'label' => 'Соцсеть: MAX (ссылка)',
                'name'  => 'soc_max',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_soc_2gis',
                'label' => 'Соцсеть: 2ГИС (ссылка)',
                'name'  => 'soc_2gis',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_soc_ya',
                'label' => 'Соцсеть: Яндекс Карты (ссылка)',
                'name'  => 'soc_yandex',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_soc_vk',
                'label' => 'Соцсеть: ВКонтакте (ссылка, только подвал)',
                'name'  => 'soc_vk',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_orisa_opt_emails',
                'label' => 'Почты (повторитель)',
                'name'  => 'emails',
                'type'  => 'repeater',
                'layout' => 'table',
                'button_label' => 'Добавить почту',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_email_val', 'label' => 'Почта', 'name' => 'email', 'type' => 'email'],
                ],
            ],
            [
                'key'          => 'field_orisa_opt_project_form',
                'label'        => 'Форма для страниц дел (шорткод CF7)',
                'name'         => 'project_cta_form',
                'type'         => 'text',
                'instructions' => 'Например: [contact-form-7 id="123" title="Разбор ситуации"]. Пусто — форма не выводится, останутся телефон и мессенджеры.',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-contacts'],
            ],
        ],
    ]);
}
