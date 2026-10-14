<?php
defined('ABSPATH') || exit;

$hide_footer = is_page() && function_exists('get_field') && get_field('hide_footer');
if (!$hide_footer) :
    $footer_style = function_exists('get_field') && is_page() ? (string) get_field('footer_style') : 'standard';
    if ($footer_style !== '' && $footer_style !== 'standard') {
        // Варианты footer-7/9/13/14 из оригинала: отрисовка standard, см. docs (этап 4, блоки).
        echo '<!-- orisa: footer variant "' . esc_attr($footer_style) . '" not implemented yet, standard rendered -->' . "\n";
    }
    ?>
            </main>
            <!-- Footer -->
            <?php get_template_part('template-parts/footer-standard'); ?>
    <?php get_template_part('template-parts/back-to-top'); ?>
<?php else : ?>
            </main>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
