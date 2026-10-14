<?php
defined('ABSPATH') || exit;

/**
 * Загрузчик блоков: каждый blocks/<slug>/fields.php ВОЗВРАЩАЕТ массив одного layout
 * (key/name/label/display/sub_fields). Здесь они собираются в группу
 * «Секции страницы» с Flexible Content `page_sections` (Post Type = page).
 * Общая вкладка «Настройки блока» (enabled/anchor) добавляется автоматически.
 */
add_action('acf/init', 'orisa_register_blocks_group');
function orisa_register_blocks_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    $layouts = [];
    foreach (glob(ORISA_DIR . '/blocks/*/fields.php') as $fields_file) {
        $layout = include $fields_file;
        if (!is_array($layout) || empty($layout['name']) || empty($layout['key'])) {
            continue;
        }
        $layout['sub_fields'][] = [
            'key'           => 'field_orisa_block_tab_settings',
            'label'         => 'Настройки блока',
            'name'          => '',
            'type'          => 'tab',
            'placement'     => 'top',
        ];
        $layout['sub_fields'][] = [
            'key'           => 'field_orisa_block_enabled',
            'label'         => 'Показывать блок',
            'name'          => 'enabled',
            'type'          => 'true_false',
            'default_value' => 1,
            'ui'            => 1,
        ];
        $layout['sub_fields'][] = [
            'key'          => 'field_orisa_block_anchor',
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
