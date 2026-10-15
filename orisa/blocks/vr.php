<?php
defined('ABSPATH') || exit;

/**
 * Блок «vr»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/vr.php.
 */
return [
    'key'     => 'layout_orisa_vr',
    'name'    => 'vr',
    'label'   => 'VR',
    'display' => 'block',
    'sub_fields' => [
        ['key' => 'field_orisa_vr_brackets', 'label' => 'Плашка', 'name' => 'brackets', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить пункт',
         'sub_fields' => [
            ['key' => 'field_orisa_vr_bracket_text', 'label' => 'Пункт', 'name' => 'text', 'type' => 'text'],
         ]],
        ['key' => 'field_orisa_vr_hero_image', 'label' => 'Фото VR', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_vr_coords', 'label' => 'Координаты', 'name' => 'coords', 'type' => 'text', 'default_value' => '27.1127° S, 109.3497° W'],
        ['key' => 'field_orisa_vr_tags', 'label' => 'Теги', 'name' => 'tags', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить тег',
         'sub_fields' => [
            ['key' => 'field_orisa_vr_tag_link', 'label' => 'Тег-ссылка', 'name' => 'link', 'type' => 'link'],
         ]],
        ['key' => 'field_orisa_vr_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text', 'default_value' => 'Развитие стартап-инноваций'],
        ['key' => 'field_orisa_vr_subtitle', 'label' => 'Подзаголовок', 'name' => 'subtitle', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'От запуска MVP до глобального масштаба: стратегический дизайн и технологии, которые выводят продукт вперёд.'],
        ['key' => 'field_orisa_vr_cta_button', 'label' => 'Кнопка', 'name' => 'cta_button', 'type' => 'link'],
        ['key' => 'field_orisa_vr_avatars', 'label' => 'Аватары', 'name' => 'avatars', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить аватар',
         'sub_fields' => [
            ['key' => 'field_orisa_vr_avatar', 'label' => 'Аватар', 'name' => 'avatar', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_vr_proof_first', 'label' => 'Соцдоказательство: строка 1', 'name' => 'proof_first', 'type' => 'text', 'default_value' => '500+ проектов масштабировано с'],
        ['key' => 'field_orisa_vr_proof_second', 'label' => 'Соцдоказательство: строка 2', 'name' => 'proof_second', 'type' => 'text', 'default_value' => 'международной экспертизой'],
        ['key' => 'field_orisa_vr_matter_fx', 'label' => 'Интерактив matter.js', 'name' => 'matter_fx', 'type' => 'true_false', 'default_value' => 0, 'ui' => 1, 'instructions' => 'Включить физику matter.js в этом блоке.'],
    

    ],
];
