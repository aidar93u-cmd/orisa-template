<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
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
    
];
