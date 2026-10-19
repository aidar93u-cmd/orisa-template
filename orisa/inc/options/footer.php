<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Подвал»: заголовок, адрес не нужен (адрес один — в «Контактах»),
 * теги-ссылки, часы, копирайт с {year}. Меню колонок и соцсети — только через
 * «Внешний вид → Меню» и настройки «Контакты», здесь дублей нет.
 */
add_action('acf/init', 'orisa_options_footer');
function orisa_options_footer() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_footer',
        'title'    => 'Подвал',
        'fields'   => [
            [
                'key'           => 'field_orisa_opt_footer_title',
                'label'         => 'Заголовок подвала',
                'name'          => 'footer_title',
                'type'          => 'text',
                'default_value' => 'Начните путь к жизни без долгов уже сегодня',
            ],
            [
                'key'           => 'field_orisa_opt_footer_tags',
                'label'         => 'Теги-ссылки (нижняя полоса)',
                'name'          => 'footer_tags',
                'type'          => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить тег',
                'sub_fields'   => [
                    ['key' => 'field_orisa_opt_ft_link', 'label' => 'Ссылка', 'name' => 'link', 'type' => 'link'],
                ],
            ],
            [
                'key'           => 'field_orisa_opt_f2_days',
                'label'         => 'Часы: дни',
                'name'          => 'footer2_hours_days',
                'type'          => 'text',
                'default_value' => 'Пн — Сб',
            ],
            [
                'key'           => 'field_orisa_opt_f2_time',
                'label'         => 'Часы: время',
                'name'          => 'footer2_hours_time',
                'type'          => 'text',
                'default_value' => '9:00 — 18:00',
            ],
            [
                'key'           => 'field_orisa_opt_copyright',
                'label'         => 'Копирайт',
                'name'          => 'copyright',
                'type'          => 'text',
                'instructions'  => 'Токен {year} заменяется текущим годом.',
                'default_value' => '©{year} ЗАКРОЙДОЛГИ.РФ. Все права защищены.',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-footer'],
            ],
        ],
    ]);
}
