<?php
defined('ABSPATH') || exit;

/**
 * Хелперы вывода. Пустые поля не ломают вёрстку: тег не выводится,
 * кроме обёрток, на которых держится JS (там выводится пустая обёртка).
 */

/**
 * Якорь блока из общей вкладки «Настройки блока» (поле anchor).
 */
function orisa_anchor() {
    $anchor = get_sub_field('anchor');
    if (!is_string($anchor) || $anchor === '') {
        return '';
    }
    $anchor = preg_replace('/[^A-Za-z0-9_-]/', '', $anchor);
    return $anchor ? ' id="' . esc_attr($anchor) . '"' : '';
}

/**
 * Проверка вкладки «Настройки блока»: показывать ли блок.
 */
function orisa_block_enabled() {
    return (bool) get_sub_field('enabled');
}

/**
 * Ссылка ACF (поле типа Link) → <a>. Возвращает готовый тег или ''.
 */
function orisa_link($field, $class = '', $extra = '') {
    $link = is_string($field) ? null : $field;
    if (!is_array($link) || empty($link['url'])) {
        return '';
    }
    $title = isset($link['title']) && $link['title'] !== '' ? $link['title'] : $link['url'];
    $target = !empty($link['target']) ? ' target="' . esc_attr($link['target']) . '" rel="noopener"' : '';
    return sprintf(
        '<a href="%s" class="%s"%s%s>%s</a>',
        esc_url($link['url']),
        esc_attr($class),
        $target,
        $extra ? ' ' . $extra : '',
        esc_html($title)
    );
}

/**
 * Картинка ACF (возврат ID) → wp_get_attachment_image. Пусто → ''.
 */
function orisa_img($attachment_id, $size = 'full', $attrs = []) {
    $attachment_id = (int) $attachment_id;
    if ($attachment_id <= 0) {
        return '';
    }
    $html = wp_get_attachment_image($attachment_id, $size, false, $attrs);
    return is_string($html) ? $html : '';
}

/**
 * URL картинки по ID (для фонов, poster, srcset вручную).
 */
function orisa_img_url($attachment_id, $size = 'full') {
    $attachment_id = (int) $attachment_id;
    if ($attachment_id <= 0) {
        return '';
    }
    $src = wp_get_attachment_image_src($attachment_id, $size);
    return is_array($src) ? $src[0] : '';
}

/**
 * Безопасный текст (text/textarea). Пусто → ''.
 */
function orisa_text($value) {
    if (!is_string($value) || $value === '') {
        return '';
    }
    return esc_html($value);
}

/**
 * Текст копирайта с токеном {year} → текущий год.
 */
function orisa_copyright($text) {
    if (!is_string($text) || $text === '') {
        return '';
    }
    return esc_html(str_replace('{year}', gmdate('Y'), $text));
}

/**
 * Флаги условных скриптов: цикл Flexible Content выставляет
 * $orisa_block_flags['matter'] / ['pricing-3'] / ['services-4'] / ['services-details-4'].
 */
function orisa_flag_script($name) {
    $GLOBALS['orisa_block_flags'][$name] = true;
}
