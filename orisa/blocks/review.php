<?php
defined('ABSPATH') || exit;

/**
 * Блок «review»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/review.php.
 */
return [
    'key'     => 'layout_orisa_review',
    'name'    => 'review',
    'label'   => 'Отзыв',
    'display' => 'block',
    'sub_fields' => [
        ['key' => 'field_orisa_h3_badge', 'label' => 'Плашка', 'name' => 'badge', 'type' => 'text'],
        ['key' => 'field_orisa_h3_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0],
        ['key' => 'field_orisa_h3_subtitle', 'label' => 'Подзаголовок', 'name' => 'subtitle', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_orisa_h3_cta_main', 'label' => 'Кнопка основная', 'name' => 'cta_main', 'type' => 'link'],
        ['key' => 'field_orisa_h3_cta_second', 'label' => 'Кнопка вторая', 'name' => 'cta_second', 'type' => 'link'],
        ['key' => 'field_orisa_h3_t_image', 'label' => 'Отзыв: фото', 'name' => 'testimonial_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_h3_t_quote', 'label' => 'Отзыв: цитата', 'name' => 'testimonial_quote', 'type' => 'textarea', 'rows' => 3],
        ['key' => 'field_orisa_h3_t_avatar', 'label' => 'Отзыв: аватар', 'name' => 'testimonial_avatar', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_h3_t_name', 'label' => 'Отзыв: имя', 'name' => 'testimonial_name', 'type' => 'text'],
        ['key' => 'field_orisa_h3_t_pos', 'label' => 'Отзыв: должность', 'name' => 'testimonial_position', 'type' => 'text'],
        ['key' => 'field_orisa_h3_main_img', 'label' => 'Главное фото', 'name' => 'main_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_h3_counter', 'label' => 'Счётчик: число', 'name' => 'counter_number', 'type' => 'number'],
        ['key' => 'field_orisa_h3_counter_lb', 'label' => 'Счётчик: подпись', 'name' => 'counter_label', 'type' => 'text'],
        ['key' => 'field_orisa_h3_avatars', 'label' => 'Аватары', 'name' => 'avatars', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить аватар',
         'sub_fields' => [
            ['key' => 'field_orisa_h3_av_img', 'label' => 'Аватар', 'name' => 'avatar', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_h3_tags', 'label' => 'Теги снизу', 'name' => 'tags', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить тег',
         'sub_fields' => [
            ['key' => 'field_orisa_h3_tag_tx', 'label' => 'Тег', 'name' => 'tag', 'type' => 'text'],
         ]],
    

    ],
];
