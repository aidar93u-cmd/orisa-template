<?php
defined('ABSPATH') || exit;
// Поиск: та же сетка карточек, что архив (archive-2.html).
get_header();
?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-xxl-8 col-xl-7 col-12">
            <h1 class="fz-ds-1 lh-1 fw-500 mb-lg-0 mb-4">
                <?php
                printf(
                    /* translators: %s: search query. */
                    esc_html__('Результаты поиска: %s', 'orisa'),
                    '<span>' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>
        </div>
    </div>
    <div class="row pt-80">
        <div class="col-lg-8 pb-lg-0 pb-80">
            <div class="row">
                <!-- beautify ignore:start -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/blog-card'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('Ничего не найдено.', 'orisa'); ?></p>
                <?php endif; ?>
                <!-- beautify ignore:end -->
            </div>
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
