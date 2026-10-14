<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Боковое меню»: тексты offcanvas и галерея.
 */
add_action('acf/init', 'orisa_options_offcanvas');
function orisa_options_offcanvas() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_offcanvas',
        'title'    => 'Боковое меню',
        'fields'   => [
            [
                'key'   => 'field_orisa_opt_off_title',
                'label' => 'Заголовок',
                'name'  => 'offcanvas_title',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_off_text',
                'label' => 'Описание',
                'name'  => 'offcanvas_text',
                'type'  => 'textarea',
                'rows'  => 4,
            ],
            [
                'key'           => 'field_orisa_opt_off_gallery',
                'label'         => 'Галерея (аватары)',
                'name'          => 'offcanvas_gallery',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить фото',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_off_img', 'label' => 'Фото', 'name' => 'image', 'type' => 'image', 'return_format' => 'id'],
                ],
            ],
            [
                'key'   => 'field_orisa_opt_off_contact_title',
                'label' => 'Заголовок контактов',
                'name'  => 'offcanvas_contact_title',
                'type'  => 'text',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-offcanvas'],
            ],
        ],
    ]);
}
