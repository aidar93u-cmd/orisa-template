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
 * Уникальный суффикс ID внутри страницы (аккордеоны, табы, слайдеры).
 * Если у блока задан якорь — используется он, иначе счётчик.
 */
function orisa_block_uid($prefix) {
    $anchor = get_sub_field('anchor');
    if (is_string($anchor) && $anchor !== '') {
        return sanitize_html_class($prefix . '-' . preg_replace('/[^A-Za-z0-9_-]/', '', $anchor));
    }
    if (!isset($GLOBALS['orisa_block_uid_counter'])) {
        $GLOBALS['orisa_block_uid_counter'] = 0;
    }
    $GLOBALS['orisa_block_uid_counter']++;
    return sanitize_html_class($prefix . '-' . $GLOBALS['orisa_block_uid_counter']);
}

/**
 * Флаги условных скриптов: цикл Flexible Content выставляет
 * $orisa_block_flags['matter'] / ['pricing-3'] / ['services-4'] / ['services-details-4'].
 */
function orisa_flag_script($name) {
    $GLOBALS['orisa_block_flags'][$name] = true;
}

/**
 * SVG-иконка соцсети (currentColor, 24x24). $slug: whatsapp, telegram, max,
 * doublegis, yandex, vk, youtube, ok, dzen, link (фолбэк — внешняя ссылка).
 */
function orisa_soc_icon($slug, $size = 18) {
    $paths = [
        'whatsapp' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z',
        'telegram' => 'M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z',
        'vk'       => 'm9.489.004.729-.003h3.564l.73.003.914.01.433.007.418.011.403.014.388.016.374.021.36.025.345.03.333.033c1.74.196 2.933.616 3.833 1.516.9.9 1.32 2.092 1.516 3.833l.034.333.029.346.025.36.02.373.025.588.012.41.013.644.009.915.004.98-.001 3.313-.003.73-.01.914-.007.433-.011.418-.014.403-.016.388-.021.374-.025.36-.03.345-.033.333c-.196 1.74-.616 2.933-1.516 3.833-.9.9-2.092 1.32-3.833 1.516l-.333.034-.346.029-.36.025-.373.02-.588.025-.41.012-.644.013-.915.009-.98.004-3.313-.001-.73-.003-.914-.01-.433-.007-.418-.011-.403-.014-.388-.016-.374-.021-.36-.025-.345-.03-.333-.033c-1.74-.196-2.933-.616-3.833-1.516-.9-.9-1.32-2.092-1.516-3.833l-.034-.333-.029-.346-.025-.36-.02-.373-.025-.588-.012-.41-.013-.644-.009-.915-.004-.98.001-3.313.003-.73.01-.914.007-.433.011-.418.014-.403.016-.388.021-.374.025-.36.03-.345.033-.333c.196-1.74.616-2.933 1.516-3.833.9-.9 2.092-1.32 3.833-1.516l.333-.034.346-.029.36-.025.373-.02.588-.025.41-.012.644-.013.915-.009ZM6.79 7.3H4.05c.13 6.24 3.25 9.99 8.72 9.99h.31v-3.57c2.01.2 3.53 1.67 4.14 3.57h2.84c-.78-2.84-2.83-4.41-4.11-5.01 1.28-.74 3.08-2.54 3.51-4.98h-2.58c-.56 1.98-2.22 3.78-3.8 3.95V7.3H10.5v6.92c-1.6-.4-3.62-2.34-3.71-6.92Z',
        'youtube'  => 'M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z',
        'ok'       => 'M12 0a6.2 6.2 0 0 0-6.194 6.195 6.2 6.2 0 0 0 6.195 6.192 6.2 6.2 0 0 0 6.193-6.192A6.2 6.2 0 0 0 12.001 0zm0 3.63a2.567 2.567 0 0 1 2.565 2.565 2.568 2.568 0 0 1-2.564 2.564 2.568 2.568 0 0 1-2.565-2.564 2.567 2.567 0 0 1 2.565-2.564zM6.807 12.6a1.814 1.814 0 0 0-.91 3.35 11.611 11.611 0 0 0 3.597 1.49l-3.462 3.463a1.815 1.815 0 0 0 2.567 2.566L12 20.066l3.405 3.403a1.813 1.813 0 0 0 2.564 0c.71-.709.71-1.858 0-2.566l-3.462-3.462a11.593 11.593 0 0 0 3.596-1.49 1.814 1.814 0 1 0-1.932-3.073 7.867 7.867 0 0 1-8.34 0c-.318-.2-.674-.29-1.024-.278z',
        // ponytail: max/doublegis/yandex/dzen — упрощённые фирменные знаки (пузырь-молния, пин, звезда).
        'max'       => 'M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm1.2 4.5l-4.4 6.4h3l-1 5.1 4.4-6.4h-3z',
        'doublegis' => 'M12 2a7 7 0 0 0-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z',
        'yandex'    => 'M12 1.5A8.5 8.5 0 0 0 3.5 10c0 3.2 2.1 5.7 4.4 7.5L12 22.5l4.1-4.9c2.2-1.9 4.4-4.4 4.4-7.6A8.5 8.5 0 0 0 12 1.5zm0 11.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6z',
        'dzen'      => 'M12 1l2.4 8.6L23 12l-8.6 2.4L12 23l-2.4-8.6L1 12l8.6-2.4z',
        'link'      => 'M14 3h7v7h-2V6.4l-9.3 9.3-1.4-1.4L17.6 5H14zM5 5h6v2H7v10h10v-4h2v6H5z',
    ];
    if (!isset($paths[$slug])) {
        $slug = 'link';
    }
    $size = (int) $size > 0 ? (int) $size : 18;
    return '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="' . $paths[$slug] . '"/></svg>';
}

/**
 * Определение соцсети по названию или URL (t.me, wa.me, vk.com …).
 */
function orisa_soc_detect($name, $url) {
    $s = mb_strtolower(trim((string) $name) . ' ' . (string) $url);
    $map = [
        'whatsapp'  => ['whatsapp', 'ватсап', 'wa.me'],
        'telegram'  => ['telegram', 'телеграм', 't.me'],
        'max'       => ['max'],
        'doublegis' => ['2гис', '2gis'],
        'yandex'    => ['яндекс', 'yandex', 'ya.ru'],
        'vk'        => ['vk', 'вконтакте', 'vkontakte'],
        'youtube'   => ['youtube', 'ютуб', 'youtu'],
        'ok'        => ['одноклассники', 'odnoklassniki', 'ok.ru'],
        'dzen'      => ['дзен', 'dzen'],
    ];
    foreach ($map as $slug => $needles) {
        foreach ($needles as $n) {
            if ($n !== '' && mb_strpos($s, $n) !== false) {
                return $slug;
            }
        }
    }
    return 'link';
}

/**
 * Сотрудники из CPT team (фолбэк повторителя): photo, name, role, url, dark.
 */
function orisa_team_posts($limit = 8) {
    $out = [];
    $q = new WP_Query([
        'post_type'      => 'team',
        'posts_per_page' => (int) $limit,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ]);
    foreach ($q->posts as $p) {
        $out[] = [
            'photo' => get_post_thumbnail_id($p->ID),
            'name'  => get_the_title($p->ID),
            'role'  => function_exists('get_field') ? (string) get_field('role', $p->ID) : '',
            'url'   => get_permalink($p->ID),
            'dark'  => false,
        ];
    }
    wp_reset_postdata();
    return $out;
}

/**
 * Проекты из CPT project (фолбэк повторителя cases): image, amount,
 * metric_label, tags, title, description, link.
 */
function orisa_project_posts($limit = 4) {
    $out = [];
    $q = new WP_Query([
        'post_type'      => 'project',
        'posts_per_page' => (int) $limit,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ]);
    foreach ($q->posts as $p) {
        $g = function_exists('get_field') ? get_field('service', $p->ID) : '';
        $d = function_exists('get_field') ? get_field('duration', $p->ID) : '';
        $tags = [];
        if (is_string($g) && $g !== '') {
            $tags[] = $g;
        }
        if (is_string($d) && $d !== '') {
            $tags[] = $d;
        }
        $out[] = [
            'image'        => get_post_thumbnail_id($p->ID),
            'amount'       => function_exists('get_field') ? get_field('amount', $p->ID) : '',
            'metric_label' => 'Списано',
            'tags'         => $tags,
            'title'        => get_the_title($p->ID),
            'description'  => function_exists('get_field') ? (string) get_field('result', $p->ID) : '',
            'link'         => ['url' => get_permalink($p->ID)],
        ];
    }
    wp_reset_postdata();
    return $out;
}
