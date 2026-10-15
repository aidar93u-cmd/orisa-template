<?php
defined('ABSPATH') || exit;

/**
 * Единый диспетчер секций: по имени layout подключает шаблон
 * из templates/sections/<layout>.php. Используется циклом Flexible Content.
 */
function orisa_render_section($layout) {
    if (!is_string($layout) || $layout === '') {
        return;
    }
    $template = ORISA_DIR . '/templates/sections/' . sanitize_key($layout) . '.php';
    if (is_file($template)) {
        include $template;
    }
}
