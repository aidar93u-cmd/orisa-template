<?php
defined('ABSPATH') || exit;

/**
 * Поля секции (возвращает sub_fields; настройки — в config.php).
 */
return [
        ['key' => 'field_orisa_hero_brands_title_modern', 'label' => 'Заголовок «Modern»', 'name' => 'title_modern', 'type' => 'text', 'default_value' => 'Modern'],
        ['key' => 'field_orisa_hero_brands_intro', 'label' => 'Текст справа от «Modern»', 'name' => 'intro', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => 'Based in Canada, <span class="text-theme text-scramble">Orisa</span> is a creative design agency dedicated to providing innovative brand solutions for a global clientele.'],
        ['key' => 'field_orisa_hero_brands_kicker', 'label' => 'Подзаголовок-кикер', 'name' => 'kicker', 'type' => 'wysiwyg', 'tabs' => 'visual', 'media_upload' => 0, 'default_value' => '<span class="text-theme text-scramble">Creative</span> solutions <br>for <span class="text-theme text-scramble">modern</span> brands'],
        ['key' => 'field_orisa_hero_brands_button', 'label' => 'Кнопка', 'name' => 'button', 'type' => 'link'],
        ['key' => 'field_orisa_hero_brands_title_agency', 'label' => 'Заголовок «Agency»', 'name' => 'title_agency', 'type' => 'text', 'default_value' => 'Agency'],
        ['key' => 'field_orisa_hero_brands_thumbs', 'label' => 'Фото справа', 'name' => 'thumbs', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить фото', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_brands_thumb_image', 'label' => 'Фото', 'name' => 'image', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_hero_brands_brands_title', 'label' => 'Заголовок «Trusted by»', 'name' => 'brands_title', 'type' => 'text', 'default_value' => 'Trusted by'],
        ['key' => 'field_orisa_hero_brands_brands', 'label' => 'Логотипы', 'name' => 'brands', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Добавить логотип', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_brands_brand_logo', 'label' => 'Логотип', 'name' => 'logo', 'type' => 'image', 'return_format' => 'id'],
         ]],
        ['key' => 'field_orisa_hero_brands_star', 'label' => 'Звезда', 'name' => 'star_image', 'type' => 'image', 'return_format' => 'id'],
        ['key' => 'field_orisa_hero_brands_services', 'label' => 'Услуги', 'name' => 'services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Добавить услугу', 'min' => 0,
         'sub_fields' => [
            ['key' => 'field_orisa_hero_brands_service_link', 'label' => 'Услуга-ссылка', 'name' => 'link', 'type' => 'link'],
         ]],
    
];
