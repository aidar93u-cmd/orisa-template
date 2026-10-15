<?php
defined('ABSPATH') || exit;

/**
 * Единый сборщик блоков: подключает все orisa/blocks/*.php (кроме себя),
 * каждый возвращает layout-массив. Добавляет вкладку «Настройки блока»
 * (enabled/anchor) и регистрирует группу «Секции страницы» с Flexible
 * Content `page_sections` (Post Type = page).
 */
add_action('acf/init', 'orisa_register_blocks_group');
function orisa_register_blocks_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    $layouts = [];
    foreach (glob(ORISA_DIR . '/blocks/*.php') as $block_file) {
        if (basename($block_file) === 'blocks.php') {
            continue;
        }
        $layout = include $block_file;
        if (!is_array($layout) || empty($layout['name']) || empty($layout['key'])) {
            continue;
        }
        $slug_esc = preg_replace('/[^A-Za-z0-9_]/', '', str_replace('-', '_', $layout['name']));
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
