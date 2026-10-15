<?php
defined('ABSPATH') || exit;

/**
 * Реестр блоков: подключает все ACF Flexible Content блоки.
 * Каждый блок лежит в своей папке blocks/<slug>/ и состоит из:
 *   config.php — настройки блока (name/label/key/description),
 *   fields.php — возвращает массив sub_fields.
 * Здесь config + fields собираются в layout и регистрируются одной группой
 * «Секции страницы» с Flexible Content `page_sections` (Post Type = page).
 * Общая вкладка «Настройки блока» (enabled/anchor) добавляется автоматически.
 */
add_action('acf/init', 'orisa_register_blocks_group');
function orisa_register_blocks_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    $layouts = [];
    foreach (glob(ORISA_DIR . '/blocks/*/') as $block_dir) {
        $config_file = $block_dir . 'config.php';
        $fields_file = $block_dir . 'fields.php';
        if (!is_file($config_file) || !is_file($fields_file)) {
            continue;
        }
        $config = include $config_file;
        $sub_fields = include $fields_file;
        if (!is_array($config) || empty($config['name']) || empty($config['key']) || !is_array($sub_fields)) {
            continue;
        }
        $layout = [
            'key'        => $config['key'],
            'name'       => $config['name'],
            'label'      => isset($config['label']) ? $config['label'] : $config['name'],
            'display'    => 'block',
            'sub_fields' => $sub_fields,
        ];
        $slug_esc = preg_replace('/[^A-Za-z0-9_]/', '', str_replace('-', '_', $config['name']));
        $layout['sub_fields'][] = [
            'key'       => 'field_orisa_' . $slug_esc . '_tab_settings',
            'label'     => 'Настройки блока',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ];
        $layout['sub_fields'][] = [
            'key'           => 'field_orisa_' . $slug_esc . '_enabled',
            'label'         => 'Показывать блок',
            'name'          => 'enabled',
            'type'          => 'true_false',
            'default_value' => 1,
            'ui'            => 1,
        ];
        $layout['sub_fields'][] = [
            'key'          => 'field_orisa_' . $slug_esc . '_anchor',
            'label'        => 'Якорь (id)',
            'name'         => 'anchor',
            'type'         => 'text',
            'instructions' => 'Необязательно. Латиница, дефисы и подчёркивания.',
        ];
        $layouts[] = $layout;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_page_sections',
        'title'    => 'Секции страницы',
        'fields'   => [
            [
                'key'          => 'field_orisa_page_sections',
                'label'        => 'Секции страницы',
                'name'         => 'page_sections',
                'type'         => 'flexible_content',
                'button_label' => 'Добавить секцию',
                'layouts'      => $layouts,
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'page'],
            ],
        ],
    ]);
}
