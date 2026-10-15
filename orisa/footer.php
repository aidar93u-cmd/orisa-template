<?php
defined('ABSPATH') || exit;

$hide_footer = is_page() && function_exists('get_field') && get_field('hide_footer');
if (!$hide_footer) :
    $footer_style = function_exists('get_field') && is_page() ? (string) get_field('footer_style') : 'fixed-bottom';
    if ($footer_style === 'standard') {
        // Вариант главной (container-2200): index, index-4, index-5.
        ?>
            </main>
            <!-- Footer -->
            <?php get_template_part('template-parts/footer-standard'); ?>
        <?php
    } else {
        if ($footer_style !== '' && $footer_style !== 'fixed-bottom') {
            // Варианты footer-3/7/9/13/14 из оригинала: отрисовка fixed-bottom, см. docs (этап 4, блоки).
            echo '<!-- orisa: footer variant "' . esc_attr($footer_style) . '" not implemented yet, fixed-bottom rendered -->' . "\n";
        }
        ?>
            </main>
            <!-- Footer -->
            <?php get_template_part('template-parts/footer-fixed-bottom'); ?>
        <?php
    }
    ?>
    </div>
    </div>
    <?php get_template_part('template-parts/back-to-top'); ?>
<?php else : ?>
            </main>
    </div>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
