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
            'key'          => 'field_orisa_team_grid_members_note',
            'label'        => 'Сотрудники',
            'name'         => '',
            'type'         => 'message',
            'message'      => 'Сотрудники выводятся из записей «Сотрудники» автоматически. Добавлять вручную здесь не нужно.',
            'new_lines'    => 'br',
        ],


    ],
];
