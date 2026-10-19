<?php
defined('ABSPATH') || exit;

/**
 * Блоки статьи (post_type = post): Flexible Content `post_blocks`.
 * Лейауты 1:1 повторяют тело blog-details.html: лид-абзац, текст,
 * картинки (1 — figure с подписью, 2 — ряд), две колонки «заголовок + текст».
 * Рендер: template-parts/post-blocks.php. Пусто — single.php выводит the_content.
 */
add_action('acf/init', 'orisa_register_post_blocks');
function orisa_register_post_blocks() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'      => 'group_orisa_post_blocks',
        'title'    => 'Блоки статьи',
        'fields'   => [
            [
                'key'          => 'field_orisa_post_blocks',
                'label'        => 'Блоки статьи',
                'name'         => 'post_blocks',
                'type'         => 'flexible_content',
                'button_label' => 'Добавить блок',
                'layouts'      => [
                    [
                        'key'        => 'layout_orisa_post_lead',
                        'name'       => 'post_lead',
                        'label'      => 'Лид-абзац',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'   => 'field_orisa_post_lead_text',
                                'label' => 'Текст',
                                'name'  => 'text',
                                'type'  => 'textarea',
                                'rows'  => 4,
                            ],
                        ],
                    ],
                    [
                        'key'        => 'layout_orisa_post_text',
                        'name'       => 'post_text',
                        'label'      => 'Текст',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'          => 'field_orisa_post_text_body',
                                'label'        => 'Текст',
                                'name'         => 'text',
                                'type'         => 'wysiwyg',
                                'tabs'         => 'all',
                                'toolbar'      => 'basic',
                                'media_upload' => 0,
                            ],
                        ],
                    ],
                    [
                        'key'        => 'layout_orisa_post_images',
                        'name'       => 'post_images',
                        'label'      => 'Картинки',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'          => 'field_orisa_post_images_rows',
                                'label'        => 'Картинки (1–2)',
                                'name'         => 'images',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 1,
                                'max'          => 2,
                                'button_label' => 'Добавить картинку',
                                'sub_fields'   => [
                                    [
                                        'key'           => 'field_orisa_post_images_image',
                                        'label'         => 'Картинка',
                                        'name'          => 'image',
                                        'type'          => 'image',
                                        'return_format' => 'id',
                                    ],
                                    [
                                        'key'   => 'field_orisa_post_images_caption',
                                        'label' => 'Подпись',
                                        'name'  => 'caption',
                                        'type'  => 'text',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'key'        => 'layout_orisa_post_columns',
                        'name'       => 'post_columns',
                        'label'      => 'Две колонки',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'          => 'field_orisa_post_columns_rows',
                                'label'        => 'Колонки (до 2)',
                                'name'         => 'cols',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 2,
                                'button_label' => 'Добавить колонку',
                                'sub_fields'   => [
                                    [
                                        'key'   => 'field_orisa_post_col_heading',
                                        'label' => 'Заголовок',
                                        'name'  => 'heading',
                                        'type'  => 'text',
                                    ],
                                    [
                                        'key'   => 'field_orisa_post_col_text',
                                        'label' => 'Текст',
                                        'name'  => 'text',
                                        'type'  => 'textarea',
                                        'rows'  => 4,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                ['param' => 'post_type', 'operator' => '==', 'value' => 'post'],
            ],
        ],
    ]);
}
