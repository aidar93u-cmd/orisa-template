<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Шапка»: меню-повторитель (2 уровня), кнопка, поиск.
 */
add_action('acf/init', 'orisa_options_header');
function orisa_options_header() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_header',
        'title'    => 'Шапка',
        'fields'   => [
            [
                'key'          => 'field_orisa_opt_menu',
                'label'        => 'Пункты меню',
                'name'         => 'menu_items',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Добавить пункт',
                'sub_fields'   => [
                    [
                        'key'   => 'field_orisa_opt_menu_link',
                        'label' => 'Ссылка',
                        'name'  => 'link',
                        'type'  => 'link',
                    ],
                    [
                        'key'          => 'field_orisa_opt_menu_sub',
                        'label'        => 'Подпункты',
                        'name'         => 'children',
                        'type'         => 'repeater',
                        'layout'       => 'table',
                        'button_label' => 'Добавить подпункт',
                        'sub_fields'   => [
                            [
                                'key'   => 'field_orisa_opt_menu_sublink',
                                'label' => 'Ссылка',
                                'name'  => 'link',
                                'type'  => 'link',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'key'           => 'field_orisa_opt_menu_style',
                'label'         => 'Стиль меню по умолчанию',
                'name'          => 'menu_style',
                'type'          => 'text',
                'default_value' => 'menu-light d-inline-flex justify-content-center style-1',
                'instructions'  => 'Классы обёртки меню из оригинала. Не меняйте без вёрстки.',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-header'],
            ],
        ],
    ]);
}
