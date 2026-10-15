<?php
defined('ABSPATH') || exit;

/**
 * Блок «posts-alt»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/posts-alt.php.
 */
return [
    'key'     => 'layout_orisa_posts_alt',
    'name'    => 'posts-alt',
    'label' => 'Статьи 2',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'       => 'field_orisa_posts_alt_tab_content',
            'label'     => 'Содержимое',
            'name'      => '',
            'type'      => 'tab',
            'placement' => 'top',
        ],
        [
            'key'           => 'field_orisa_posts_alt_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => "О долгах\nпростыми словами.",
            'instructions'  => 'Перенос строки станет <br>.',
        ],
        [
            'key'           => 'field_orisa_posts_alt_count',
            'label'         => 'Количество записей',
            'name'          => 'count',
            'type'          => 'number',
            'default_value' => 3,
            'min'           => 1,
            'max'           => 12,
            'step'          => 1,
            'instructions'  => 'Первая запись — крупная overlay-карточка, остальные — мелкие .blog-card.',
        ],


    ],
];
