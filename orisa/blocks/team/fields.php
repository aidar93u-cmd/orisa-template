<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        [
            'key'           => 'field_orisa_team_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'MEET OUR TEAM',
        ],
        [
            'key'           => 'field_orisa_team_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Behind the Visionaries',
        ],
        [
            'key'           => 'field_orisa_team_subtitle',
            'label'         => 'Подзаголовок',
            'name'          => 'subtitle',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Creative experts designing meaningful digital experiences that help ambitious brands grow faster and lead their markets.',
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
            'key'          => 'field_orisa_team_members',
            'label'        => 'Сотрудники',
            'name'         => 'members',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Добавить сотрудника',
            'min'          => 1,
            'sub_fields'   => [
                [
                    'key'           => 'field_orisa_team_member_photo',
                    'label'         => 'Фото',
                    'name'          => 'photo',
                    'type'          => 'image',
                    'return_format' => 'id',
                ],
                [
                    'key'   => 'field_orisa_team_member_name',
                    'label' => 'Имя',
                    'name'  => 'name',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_orisa_team_member_role',
                    'label' => 'Роль',
                    'name'  => 'role',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_orisa_team_member_link',
                    'label'        => 'Ссылка (профиль / соцсети)',
                    'name'         => 'link',
                    'type'         => 'link',
                    'instructions' => 'В оригинале иконка и имя ведут на один адрес (team-details.html). Отдельных иконок соцсетей в карточке нет.',
                ],
            ],
        ],
    
];
