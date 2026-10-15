<?php
defined('ABSPATH') || exit;

/**
 * Подстраница «Блог»: статичные тексты архива и статьи.
 */
add_action('acf/init', 'orisa_options_blog');
function orisa_options_blog() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_opt_blog',
        'title'    => 'Блог',
        'fields'   => [
            [
                'key'   => 'field_orisa_opt_blog_archive_title',
                'label' => 'Заголовок архива',
                'name'  => 'blog_archive_title',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_orisa_opt_blog_single_sidebar',
                'label' => 'Текст сайдбара статьи',
                'name'  => 'blog_single_sidebar_text',
                'type'  => 'textarea',
                'rows'  => 4,
            ],
            [
                'key'          => 'field_orisa_opt_newsletter_cf7',
                'label'        => 'Форма подписки (CF7 шорткод)',
                'name'         => 'newsletter_shortcode',
                'type'         => 'text',
                'instructions' => 'Шорткод формы для полосы подписки на архиве.',
            ],
            [
                'key'   => 'field_orisa_opt_blog_more',
                'label' => 'Подпись «читать далее»',
                'name'  => 'blog_read_more',
                'type'  => 'text',
                'default_value' => 'Читать далее',
            ],
        ],
        'location' => [
            [
                ['param' => 'options_page', 'operator' => '==', 'value' => 'orisa-settings-blog'],
            ],
        ],
    ]);
}
