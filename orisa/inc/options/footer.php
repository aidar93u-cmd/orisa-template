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
