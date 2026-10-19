<?php
defined('ABSPATH') || exit;

/**
 * Блок «team»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/team.php.
 */
return [
    'key'     => 'layout_orisa_team',
    'name'    => 'team',
    'label' => 'Команда 1',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_team_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_team_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'НАША КОМАНДА',
        ],
        [
            'key'           => 'field_orisa_team_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Те, кто придумывает',
        ],
        [
            'key'           => 'field_orisa_team_subtitle',
            'label'         => 'Подзаголовок',
            'name'          => 'subtitle',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Креативные эксперты: цифровые продукты со смыслом, которые помогают брендам расти быстрее.',
        ],
        [
            'key'   => 'field_orisa_team_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_team_banner',
            'label'         => 'Баннер',
            'name'          => 'banner',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_team_members_note',
            'label'        => 'Сотрудники',
            'name'         => '',
            'type'         => 'message',
            'message'      => 'Сотрудники выводятся из записей «Сотрудники» автоматически. Добавлять вручную здесь не нужно.',
            'new_lines'    => 'br',
        ],
    

    ],
];
