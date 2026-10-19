<?php
defined('ABSPATH') || exit;

/**
 * CPT «Сотрудники» и «Проекты» + их ACF-поля.
 * Блоки team / team-grid берут записи CPT «Сотрудники» всегда (helpers.php).
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
    register_taxonomy('project_type', ['project'], [
        'labels'            => [
            'name'          => 'Сферы',
            'singular_name' => 'Сфера',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
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
            [
                'key'   => 'field_orisa_team_dark',
                'label' => 'Тёмный бейдж',
                'name'  => 'dark',
                'type'  => 'true_false',
                'ui'    => 1,
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
                'key'       => 'field_orisa_project_tab_main',
                'label'     => 'Основное',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_orisa_project_service',
                'label' => 'Сфера (тег)',
                'name'  => 'service',
                'type'  => 'text',
            ],
            [
                'key'           => 'field_orisa_project_debt',
                'label'         => 'Сумма долга (число)',
                'name'          => 'debt_amount',
                'type'          => 'number',
            ],
            [
                'key'           => 'field_orisa_project_amount',
                'label'         => 'Списано (число)',
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
                'key'       => 'field_orisa_project_tab_case',
                'label'     => 'Разбор дела',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_orisa_project_situation',
                'label' => 'Ситуация клиента',
                'name'  => 'situation',
                'type'  => 'textarea',
                'rows'  => 4,
            ],
            [
                'key'           => 'field_orisa_project_situation_images',
                'label'         => 'Иллюстрации к ситуации (до 2)',
                'name'          => 'situation_images',
                'type'          => 'gallery',
                'return_format' => 'id',
                'max'           => 2,
                'instructions'  => 'Нейтральные предметные фото. Не портреты клиентов.',
            ],
            [
                'key'          => 'field_orisa_project_debt_items',
                'label'        => 'Состав долга',
                'name'         => 'debt_items',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить строку',
                'sub_fields'   => [
                    ['key' => 'field_orisa_project_debt_label', 'label' => 'Статья', 'name' => 'label', 'type' => 'text'],
                    ['key' => 'field_orisa_project_debt_sum', 'label' => 'Сумма (число)', 'name' => 'sum', 'type' => 'number'],
                ],
            ],
            [
                'key'          => 'field_orisa_project_work_steps',
                'label'        => 'Работа юристов (шаги)',
                'name'         => 'work_steps',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Добавить шаг',
                'sub_fields'   => [
                    ['key' => 'field_orisa_project_step_title', 'label' => 'Шаг', 'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_orisa_project_step_text', 'label' => 'Что сделали', 'name' => 'text', 'type' => 'textarea', 'rows' => 2],
                ],
            ],
            [
                'key'          => 'field_orisa_project_timeline',
                'label'        => 'Этапы процедуры (месяцы без года)',
                'name'         => 'timeline',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить этап',
                'sub_fields'   => [
                    ['key' => 'field_orisa_project_tl_month', 'label' => 'Месяц и год', 'name' => 'month', 'type' => 'text'],
                    ['key' => 'field_orisa_project_tl_event', 'label' => 'Событие', 'name' => 'event', 'type' => 'text'],
                ],
            ],
            [
                'key'       => 'field_orisa_project_tab_result',
                'label'     => 'Результат',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_orisa_project_result',
                'label' => 'Результат (коротко, для карточек)',
                'name'  => 'result',
                'type'  => 'textarea',
                'rows'  => 2,
            ],
            [
                'key'   => 'field_orisa_project_result_text',
                'label' => 'Итог дела (текст для страницы)',
                'name'  => 'result_text',
                'type'  => 'textarea',
                'rows'  => 4,
            ],
            [
                'key'   => 'field_orisa_project_nuance',
                'label'  => 'Особенность дела (необязательно)',
                'name'  => 'nuance',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'       => 'field_orisa_project_tab_quote',
                'label'     => 'Отзыв',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_orisa_project_quote',
                'label' => 'Отзыв клиента (только настоящий, необязательно)',
                'name'  => 'quote',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'   => 'field_orisa_project_quote_author',
                'label' => 'Автор отзыва (как подписан, необязательно)',
                'name'  => 'quote_author',
                'type'  => 'text',
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'project'],
            ],
        ],
    ]);
    // Служебные поля: только админка, на фронт НЕ выводить (непубличная информация).
    acf_add_local_field_group([
        'key'    => 'group_orisa_cpt_project_private',
        'title'  => 'Служебное (не публикуется)',
        'fields' => [
            [
                'key'           => 'field_orisa_project_case_no',
                'label'         => 'Номер дела',
                'name'          => 'case_number',
                'type'          => 'text',
                'instructions'  => 'Только для поиска в админке. Не выводится на сайте.',
            ],
            [
                'key'           => 'field_orisa_project_client_name',
                'label'         => 'ФИО клиента',
                'name'          => 'client_name',
                'type'          => 'text',
                'instructions'  => 'Только для поиска в админке. Не выводится на сайте.',
            ],
            [
                'key'          => 'field_orisa_project_files',
                'label'        => 'Документы по делу',
                'name'         => 'case_files',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить документ',
                'instructions' => 'Хранение для работы. Не выводится на сайте.',
                'sub_fields'   => [
                    ['key' => 'field_orisa_project_file_title', 'label' => 'Название', 'name' => 'title', 'type' => 'text'],
                    ['key' => 'field_orisa_project_file_val', 'label' => 'Файл', 'name' => 'file', 'type' => 'file', 'return_format' => 'id'],
                ],
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'project'],
            ],
        ],
    ]);
}

/**
 * Админка «Проекты»: колонки «Дело №» и «Клиент» + поиск по ним.
 */
add_filter('manage_project_posts_columns', 'orisa_project_columns');
function orisa_project_columns($cols) {
    $out = [];
    foreach ($cols as $k => $v) {
        $out[$k] = $v;
        if ($k === 'title') {
            $out['orisa_case_no'] = 'Дело №';
            $out['orisa_client'] = 'Клиент';
        }
    }
    return $out;
}

add_action('manage_project_posts_custom_column', 'orisa_project_column_value', 10, 2);
function orisa_project_column_value($col, $post_id) {
    if (!function_exists('get_field')) {
        return;
    }
    if ($col === 'orisa_case_no') {
        echo esc_html((string) get_field('case_number', $post_id));
    }
    if ($col === 'orisa_client') {
        echo esc_html((string) get_field('client_name', $post_id));
    }
}

add_filter('posts_search', 'orisa_project_admin_meta_search', 10, 2);
function orisa_project_admin_meta_search($search, $wp_query) {
    if (!is_admin() || $wp_query->get('post_type') !== 'project' || $wp_query->get('s') === '') {
        return $search;
    }
    global $wpdb;
    $s = '%' . $wpdb->esc_like($wp_query->get('s')) . '%';
    $like = $wpdb->prepare(
        " OR EXISTS (SELECT 1 FROM {$wpdb->postmeta} WHERE post_id = {$wpdb->posts}.ID AND meta_key IN ('case_number','client_name') AND meta_value LIKE %s)",
        $s
    );
    $patched = preg_replace('/\)\)\)\s*$/', $like . ')))', $search, 1);
    return $patched !== null && $patched !== $search ? $patched : $search;
}
