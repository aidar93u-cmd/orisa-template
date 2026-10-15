<?php
defined('ABSPATH') || exit;

/**
 * Текст с картинкой (база: services-3.html, строки 714-766 — шапка .sec-2-about
 * «Step by step / My Process» + .process-card: медиа-колонка (.process-card__img-wrap)
 * + текстовая (.process-card__content), порядок задан order-lg-* модификаторами).
 * Сравнение с about-1.html 656-830 (sec-2-about.block-journey: .alt-portfolio-item
 * с overlay + ul.journey-list с датами/ссылками, тёмная тема): общего каркаса
 * «текстовая колонка + медиа» там нет — структуры разные, поэтому строим по
 * services-3, расхождение зафиксировано здесь.
 * - label/instructions только по-русски; name/key — по-английски;
 * - текст: wysiwyg без загрузок (media_upload => 0);
 * - картинка: return_format id.
 */
return [
    'key'     => 'layout_orisa_media_text',
    'name'    => 'media-text',
    'label'   => 'Текст с картинкой',
    'display' => 'block',
    'sub_fields' => [
        [
            'key'           => 'field_orisa_media_text_variant',
            'label'         => 'Вариант',
            'name'          => 'variant',
            'type'          => 'select',
            'choices'       => [
                'image-left'  => 'Картинка слева',
                'image-right' => 'Картинка справа',
            ],
            'default_value' => 'image-left',
            'instructions'  => 'Меняет только порядок колонок (order-модификаторы Bootstrap, как в оригинале). Разметка одна.',
        ],
        [
            'key'           => 'field_orisa_media_text_badge',
            'label'         => 'Плашка',
            'name'          => 'badge',
            'type'          => 'text',
            'default_value' => 'Step by step',
        ],
        [
            'key'   => 'field_orisa_media_text_title',
            'label' => 'Заголовок',
            'name'  => 'title',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_orisa_media_text_text',
            'label'        => 'Текст',
            'name'          => 'text',
            'type'         => 'wysiwyg',
            'tabs'         => 'visual',
            'media_upload' => 0,
        ],
        [
            'key'   => 'field_orisa_media_text_button',
            'label' => 'Кнопка',
            'name'  => 'button',
            'type'  => 'link',
        ],
        [
            'key'           => 'field_orisa_media_text_image',
            'label'         => 'Картинка',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'id',
        ],
        [
            'key'          => 'field_orisa_media_text_caption',
            'label'        => 'Подпись',
            'name'         => 'caption',
            'type'         => 'text',
            'instructions' => 'Подпись под картинкой. Пусто — не выводится.',
        ],
    ],
];
