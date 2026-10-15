<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 9 (index-9.html, строки 575-667).
 * Заголовки — тексты; интро и кикер — WYSIWYG без загрузок (сохраняют span.text-scramble и <br>);
 * кнопка и услуги — Link; фото, логотипы и звезда — возврат ID (вывод через orisa_img()).
 * Повторители: фото, логотипы, услуги. Цифр статистики в секции нет
 * (odometer-статистика — это sec-2-home-9, соседний блок).
 */
return [
    'key'     => 'layout_orisa_hero_home_9',
    'name'    => 'hero-home-9',
    'label'   => 'Первый экран — Главная 9',
    'display' => 'block',
    'sub_fields' => [
        ['key' => 'field_orisa_hero_home_9_title_modern', 'label' => 'Заголовок «Modern»', 'name' => 'title_modern', 'type' => 'text', 'default_value' => 'Modern'],
        ['key' => 'field_orisa_hero_home_9_intro', 'label' => 'Текст справа от «Modern»', 'name' => 'intro', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => 'Based in Canada, <span class="text-theme text-scramble">Orisa</span> is a creative design agency dedicated to providing innovative brand solutions for a global clientele.'],
        ['key' => 'field_orisa_hero_home_9_kicker', 'label' => 'Подзаголовок-кикер', 'name' => 'kicker', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => '<span class="text-theme text-scramble">Creative</span> solutions <br>for <span class="text-theme text-scramble">modern</span> brands'],
        ['key' => 'field_orisa_hero_home_9_button', 'label' => 'Кнопка', 'name' => 'button', 'type' => 'link'],
        ['key' => 'field_orisa_hero_home_9_title_agency', 'label' => 'Заголовок «Agency»', 'name' => 'title_agency', 'type' => 'text', 'default_value' => 'Agency'],
        ['key' => 'field_orisa_hero_home_9_thumbs', 'label' => 'Фото справа', 'name' => 'thumbs', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить фото', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_9_thumb_image', 'label' => 'Фото', 'name' => 'image', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_hero_home_9_brands_title', 'label' => 'Заголовок «Trusted by»', 'name' => 'brands_title', 'type' => 'text', 'default_value' => 'Trusted by'],
        ['key' => 'field_orisa_hero_home_9_brands', 'label' => 'Логотипы', 'name' => 'brands', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить логотип', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_9_brand_logo', 'label' => 'Логотип', 'name' => 'logo', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_hero_home_9_star', 'label' => 'Звезда', 'name' => 'star_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_hero_home_9_services', 'label' => 'Услуги', 'name' => 'services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Добавить услугу', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_home_9_service_link', 'label' => 'Услуга-ссылка', 'name' => 'link', 'type' => 'link'],
         ]],
    ],
];
