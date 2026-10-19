<?php
defined('ABSPATH') || exit;

/**
 * Меню WordPress: шапка + две колонки подвала. Единственный источник меню —
 * «Внешний вид → Меню». Нет меню в локации — колонка пустая, без фолбэков.
 */
add_action('after_setup_theme', 'orisa_register_menus');
function orisa_register_menus() {
    register_nav_menus([
        'orisa-header'   => 'Шапка (основное)',
        'orisa-footer-1' => 'Подвал: левая колонка',
        'orisa-footer-2' => 'Подвал: правая колонка',
    ]);
}

/**
 * Walker без WP-классов: <li><a>, вложенный <ul> — 1:1 с оригиналом.
 * $li_class — например 'mb-15' для колонок подвала.
 */
class Orisa_Plain_Walker extends Walker_Nav_Menu {
    private $li_class = '';

    public function __construct($li_class = '') {
        $this->li_class = is_string($li_class) ? $li_class : '';
    }

    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $url = !empty($item->url) ? $item->url : '#';
        $output .= '<li' . ($this->li_class !== '' ? ' class="' . esc_attr($this->li_class) . '"' : '') . '>'
            . '<a href="' . esc_url($url) . '">' . esc_html($item->title) . '</a>';
    }
}
