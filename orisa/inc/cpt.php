<?php
defined('ABSPATH') || exit;

/**
 * CPT «Сотрудники» и «Проекты» + их ACF-поля.
 * Блоки team / team-grid / cases берут записи CPT, если они есть,
 * иначе — старый повторитель Flexible Content (фолбэк, см. helpers.php).
 */
add_action('init', 'orisa_register_cpt');
function orisa_register_cpt() {
    register_post_type('team', [
        'labels'       => [
            'name'          => 'Сотрудники',
            'singular_name' => 'Сотрудник',
            'add_new_item'  => 'Добавить сотрудника',
            'edit_item'     => 'Редактировать сотрудника',
        ],
        'public'       => true,
        'has_archive'  => 'team',
        'rewrite'      => ['slug' => 'team'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
    ]);
    register_post_type('project', [
        'labels'       => [
            'name'          => 'Проекты',
            'singular_name' => 'Проект',
            'add_new_item'  => 'Добавить проект',
            'edit_item'     => 'Редактировать проект',
        ],
        'public'       => true,
        'has_archive'  => 'projects',
        'rewrite'      => ['slug' => 'projects'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
    ]);
}

add_action('acf/init', 'orisa_cpt_fields');
function orisa_cpt_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'    => 'group_orisa_cpt_team',
        'title'  => 'Карточка сотрудника',
        'fields' => [
            [
                'key'   => 'field_orisa_team_role',
                'label' => 'Должность',
                'name'  => 'role',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_team_phone',
                'label' => 'Телефон',
                'name'  => 'phone',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_team_email',
                'label' => 'Email',
                'name'  => 'email',
                'type'  => 'email',
            ],
            [
                'key'   => 'field_orisa_team_experience',
                'label' => 'Стаж',
                'name'  => 'experience',
                'type'  => 'text',
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'team'],
            ],
        ],
    ]);
    acf_add_local_field_group([
        'key'    => 'group_orisa_cpt_project',
        'title'  => 'Карточка проекта',
        'fields' => [
            [
                'key'   => 'field_orisa_project_service',
                'label' => 'Сфера (тег)',
                'name'  => 'service',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_project_client',
                'label' => 'Клиент',
                'name'  => 'client',
                'type'  => 'text',
            ],
            [
                'key'           => 'field_orisa_project_amount',
                'label'         => 'Сумма списания (число)',
                'name'          => 'amount',
                'type'          => 'number',
                'instructions'  => 'Число для data-count (анимация — main.js, Odometer counter).',
            ],
            [
                'key'   => 'field_orisa_project_duration',
                'label' => 'Срок (тег)',
                'name'  => 'duration',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_project_result',
                'label' => 'Результат (строка деталей)',
                'name'  => 'result',
                'type'  => 'textarea',
                'rows'  => 2,
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'project'],
            ],
        ],
    ]);
}
