<?php
defined('ABSPATH') || exit;

/**
 * Блок «team-grid»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/team-grid.php.
 */
return [
    'key'     => 'layout_orisa_team_grid',
    'name'    => 'team-grid',
    'label' => 'Команда 2',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_team_grid_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_team_grid_eyebrow',
            'label'         => 'Плашка',
            'name'          => 'eyebrow',
            'type'          => 'text',
            'default_value' => 'Наша команда',
        ],
        [
            'key'           => 'field_orisa_team_grid_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Юристы ЮК «ЗАКРОЙДОЛГИ.РФ»',
        ],
        [
            'key'           => 'field_orisa_team_grid_desc',
            'label'         => 'Описание',
            'name'          => 'desc',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Команда юристов сопровождает клиентов по всей России: от консультации и договора до итогового списания задолженности.',
        ],
        [
            'key'   => 'field_orisa_team_grid_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'       => 'field_orisa_team_grid_tab_items',
            'label'     => 'Элементы',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'          => 'field_orisa_team_grid_members',
            'label'        => 'Сотрудники',
            'name'         => 'members',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить сотрудника',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_team_grid_member_photo',
                    'label'         => 'Фото',
                    'name'          => 'photo',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_team_grid_member_name',
                    'label' => 'Имя',
                    'name'  => 'name',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_team_grid_member_role',
                    'label' => 'Роль',
                    'name'  => 'role',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_team_grid_member_link',
                    'label' => 'Ссылка',
                    'name'  => 'link',
                    'type'  => 'link',
                ],
                [
                    'key'   => 'field_orisa_team_grid_member_dark',
                    'label' => 'Тёмный бейдж',
                    'name'  => 'dark',
                    'type'  => 'true_false',
                    'ui'    => 1,
                ],
            ],
        ],


    ],
];
