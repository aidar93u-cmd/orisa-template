<?php
defined('ABSPATH') || exit;

/**
 * Базовые настройки темы: поддержки, локаль, отключение Gutenberg.
 */
add_action('after_setup_theme', 'orisa_setup');
function orisa_setup() {
    load_theme_textdomain('orisa', ORISA_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
}

// Классический редактор везде, у страниц редактор отключён (контент — Flexible Content).
add_filter('use_block_editor_for_post_type', 'orisa_disable_gutenberg', 10, 2);
function orisa_disable_gutenberg($enabled, $post_type) {
    return false;
}

add_action('init', 'orisa_remove_page_editor');
function orisa_remove_page_editor() {
    remove_post_type_support('page', 'editor');
}

// Не тянуть стили блоков и global-styles на фронт.
add_action('wp_enqueue_scripts', 'orisa_dequeue_block_assets', 100);
function orisa_dequeue_block_assets() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}
