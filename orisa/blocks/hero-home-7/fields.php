<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 7 (index-7.html, строки 575-709).
 * Плашка — повторитель пунктов; теги и аватары — повторители;
 * кнопки — Link-поля; hero-фото и аватары — возврат ID (вывод через orisa_img()).
 */
return [
    'key'     => 'layout_orisa_hero_home_7',
    'name'    => 'hero-home-7',
    'label'   => 'Первый экран — Главная 7',
    'display' => 'block',
    'sub_fields' => [
        ['key' => 'field_orisa_hero_home_7_brackets', 'label' => 'Плашка', 'name' => 'brackets', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить пункт',
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_7_bracket_text', 'label' => 'Пункт', 'name' => 'text', 'type' => 'text'],
         ]],
        ['key' => 'field_orisa_hero_home_7_hero_image', 'label' => 'Фото VR', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_hero_home_7_coords', 'label' => 'Координаты', 'name' => 'coords', 'type' => 'text', 'default_value' => '27.1127° S, 109.3497° W'],
        ['key' => 'field_orisa_hero_home_7_tags', 'label' => 'Теги', 'name' => 'tags', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить тег',
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_7_tag_link', 'label' => 'Тег-ссылка', 'name' => 'link', 'type' => 'link'],
         ]],
        ['key' => 'field_orisa_hero_home_7_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text', 'default_value' => 'Advancing Startup Innovation'],
        ['key' => 'field_orisa_hero_home_7_subtitle', 'label' => 'Подзаголовок', 'name' => 'subtitle', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'From MVP launch to global scaling, we provide the strategic design and high-performance technology startups need to dominate their market. Our team delivers products that matter.'],
        ['key' => 'field_orisa_hero_home_7_cta_button', 'label' => 'Кнопка', 'name' => 'cta_button', 'type' => 'link'],
        ['key' => 'field_orisa_hero_home_7_avatars', 'label' => 'Аватары', 'name' => 'avatars', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить аватар',
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_7_avatar', 'label' => 'Аватар', 'name' => 'avatar', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_hero_home_7_proof_first', 'label' => 'Соцдоказательство: строка 1', 'name' => 'proof_first', 'type' => 'text', 'default_value' => '500+ Ventures scaled with'],
        ['key' => 'field_orisa_hero_home_7_proof_second', 'label' => 'Соцдоказательство: строка 2', 'name' => 'proof_second', 'type' => 'text', 'default_value' => 'Orisa global expertise'],
        ['key' => 'field_orisa_hero_home_7_matter_fx', 'label' => 'Интерактив matter.js', 'name' => 'matter_fx', 'type' => 'true_false', 'default_value' => 0, 'ui' => 1, 'instructions' => 'Включить физику matter.js в этом блоке.'],
    ],
];
