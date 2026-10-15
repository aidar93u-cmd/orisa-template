<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Подвал»: колонки, соцсети, подписка, копирайт с {year}.
 */
add_action('acf/init', 'orisa_options_footer');
function orisa_options_footer() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_footer',
        'title'    => 'Подвал',
        'fields'   => [
            [
                'key'           => 'field_orisa_opt_footer_title',
                'label'         => 'Заголовок подвала',
                'name'          => 'footer_title',
                'type'          => 'text',
                'default_value' => 'Начните путь к жизни без долгов уже сегодня',
            ],
            [
                'key'   => 'field_orisa_opt_footer_address',
                'label' => 'Адрес в подвале',
                'name'  => 'footer_address',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'          => 'field_orisa_opt_footer_menu_1',
                'label'         => 'Меню подвала: левая колонка',
                'name'          => 'footer_menu_1',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить ссылку',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_fm1_link', 'label' => 'Ссылка', 'name' => 'link', 'type' => 'link'],
                ],
            ],
            [
                'key'          => 'field_orisa_opt_footer_menu_2',
                'label'         => 'Меню подвала: правая колонка',
                'name'          => 'footer_menu_2',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить ссылку',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_fm2_link', 'label' => 'Ссылка', 'name' => 'link', 'type' => 'link'],
                ],
            ],
            [
                'key'           => 'field_orisa_opt_footer_tags',
                'label'         => 'Теги-ссылки (нижняя полоса)',
                'name'          => 'footer_tags',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить тег',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_ft_link', 'label' => 'Ссылка', 'name' => 'link', 'type' => 'link'],
                ],
            ],
            [
                'key'           => 'field_orisa_opt_f2_socials',
                'label'         => 'Соцсети (подвал fixed-bottom)',
                'name'          => 'footer2_socials',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить соцсеть',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_f2soc_name', 'label' => 'Название', 'name' => 'name', 'type' => 'text'],
                    ['key' => 'field_orisa_opt_f2soc_link', 'label' => 'Ссылка', 'name' => 'link', 'type' => 'link'],
                ],
            ],
            [
                'key'   => 'field_orisa_opt_f2_connect',
                'label' => 'Заголовок fixed-bottom (Let’s Connect)',
                'name'  => 'footer2_connect_title',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_f2_days',
                'label' => 'Часы: дни',
                'name'  => 'footer2_hours_days',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_f2_time',
                'label' => 'Часы: время',
                'name'  => 'footer2_hours_time',
                'type'  => 'text',
            ],
            [
                'key'           => 'field_orisa_opt_copyright',
                'label'         => 'Копирайт',
                'name'          => 'copyright',
                'type'          => 'text',
                'instructions'  => 'Токен {year} заменяется текущим годом.',
                'default_value' => '©{year} ЗАКРОЙДОЛГИ.РФ. Все права защищены.',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-footer'],
            ],
        ],
    ]);
}
