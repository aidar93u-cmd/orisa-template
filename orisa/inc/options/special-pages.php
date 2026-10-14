<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Служебные страницы»: тексты 404 и «Скоро».
 */
add_action('acf/init', 'orisa_options_special');
function orisa_options_special() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_special',
        'title'    => 'Служебные страницы',
        'fields'   => [
            [
                'key'   => 'field_orisa_opt_404_title',
                'label' => '404: заголовок',
                'name'  => 'not_found_title',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_404_text',
                'label' => '404: текст',
                'name'  => 'not_found_text',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'   => 'field_orisa_opt_soon_date',
                'label' => '«Скоро»: дата запуска',
                'name'  => 'coming_soon_date',
                'type'  => 'text',
                'instructions' => 'Формат строго как ждёт main.js (data-countdown), см. оригинал coming-soon.html.',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-special'],
            ],
        ],
    ]);
}
