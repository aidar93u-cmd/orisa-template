<?php
defined('ABSPATH') || exit;

/**
 * Блок «posts-preview»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/posts-preview.php.
 */
return [
    'key'     => 'layout_orisa_posts_preview',
    'name'    => 'posts-preview',
    'label'   => 'Последние статьи',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_posts_preview_title',
            'label'         => 'Заголовок',
            'name'          => 'title',
            'type'          => 'text',
            'default_value' => 'Статьи о банкротстве и списании долгов',
        ],
        [
            'key'           => 'field_orisa_posts_preview_count',
            'label'         => 'Количество записей',
            'name'          => 'count',
            'type'          => 'number',
            'default_value' => 3,
            'min'           => 1,
            'max'           => 12,
            'step'          => 1,
            'instructions'  => 'Сколько последних записей вывести в блоке.',
        ],
    

    ],
];
