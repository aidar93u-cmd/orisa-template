<?php
defined('ABSPATH') || exit;
// Главная статическая страница: тот же цикл Flexible Content, что page.php.
get_header();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        if (function_exists('have_rows') && have_rows('page_sections')) :
            while (have_rows('page_sections')) :
                the_row();
                if (!orisa_block_enabled()) {
                    continue;
                }
                $layout = get_row_layout();
                if (!is_string($layout) || $layout === '') {
                    continue;
                }
                get_template_part('blocks/' . sanitize_key($layout) . '/template');
            endwhile;
        elseif (current_user_can('edit_pages')) :
            echo '<div class="container"><p>';
            esc_html_e('Добавьте секции на вкладке «Секции страницы».', 'orisa');
            echo '</p></div>';
        endif;
    endwhile;
endif;
get_footer();
