<?php
defined('ABSPATH') || exit;

/**
 * Блок «brands»: настройки ACF Flexible Content (возвращает layout целиком).
 * Подключается сборщиком inc/blocks.php. Шаблон: templates/sections/brands.php.
 */
return [
    'key'     => 'layout_orisa_brands',
    'name'    => 'brands',
    'label' => 'Бренды 2',
    'display' => 'block',
    'sub_fields' => [
        ['key' => 'field_orisa_brands_title_modern', 'label' => 'Заголовок «Modern»', 'name' => 'title_modern', 'type' => 'text', 'default_value' => 'Современный'],
        ['key' => 'field_orisa_brands_intro', 'label' => 'Текст справа от «Modern»', 'name' => 'intro', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => 'Базируемся в Канаде, <span class="text-theme text-scramble">Orisa</span> — креативное агентство: инновационные бренд-решения для клиентов по всему миру.'],
        ['key' => 'field_orisa_brands_kicker', 'label' => 'Подзаголовок-кикер', 'name' => 'kicker', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => '<span class="text-theme text-scramble">Креативные</span> решения <br>для <span class="text-theme text-scramble">современных</span> брендов'],
        ['key' => 'field_orisa_brands_button', 'label' => 'Кнопка', 'name' => 'button', 'type' => 'link'],
        ['key' => 'field_orisa_brands_title_agency', 'label' => 'Заголовок «Agency»', 'name' => 'title_agency', 'type' => 'text', 'default_value' => 'Агентство'],
        ['key' => 'field_orisa_brands_thumbs', 'label' => 'Фото справа', 'name' => 'thumbs', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить фото', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_brands_thumb_image', 'label' => 'Фото', 'name' => 'image', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_brands_brands_title', 'label' => 'Заголовок «Trusted by»', 'name' => 'brands_title', 'type' => 'text', 'default_value' => 'Нам доверяют'],
        ['key' => 'field_orisa_brands_brands', 'label' => 'Логотипы', 'name' => 'brands', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить логотип', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_brands_brand_logo', 'label' => 'Логотип', 'name' => 'logo', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_brands_star', 'label' => 'Звезда', 'name' => 'star_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_brands_services', 'label' => 'Услуги', 'name' => 'services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Добавить услугу', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_brands_service_link', 'label' => 'Услуга-ссылка', 'name' => 'link', 'type' => 'link'],
         ]],
    

    ],
];
