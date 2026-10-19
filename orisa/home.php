<?php
defined('ABSPATH') || exit;
// Архив записей 1:1 (archive-2.html: шапка h1 + фильтры, сетка карточек, newsletter).
// Фильтры — рубрики WP (data-filter = slug), карточки несут data-category (см. blog-card).
get_header();
$cats = get_categories(['hide_empty' => true]);
?>
<div class="sec-1-archive-2 pt-150 pb-100">
    <div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-12">
            <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                <span class="text-uppercase">
                    <span class="text-1">Журнал</span>
                    <span class="text-2">Журнал</span>
                </span>
                <i>
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                    </svg>
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                    </svg>
                </i>
            </span>
        </div>
        <div class="col-xxl-8 col-xl-7 col-12">
            <h1 class="fz-ds-1 lh-1 fw-500 mb-lg-0 mb-4"><?php echo orisa_text(function_exists('get_field') ? (string) get_field('blog_archive_title', 'option') : ''); ?></h1>
        </div>
        <div class="col-xxl-4 col-xl-5 col-12 ms-auto text-lg-end">
            <?php if (!empty($cats) && !is_wp_error($cats)) : ?>
                <div class="filter-portfolio d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
                    <?php foreach ($cats as $cat) : ?>
                        <a href="<?php echo esc_url(get_category_link($cat)); ?>" class="at-btn filter-btn btn-sm" data-filter="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
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
                <?php endif; ?>
                <!-- beautify ignore:end -->
            </div>
            <?php the_posts_pagination(); ?>
        </div>
        <?php get_template_part('template-parts/blog-sidebar'); ?>
    </div>
    </div>
</div>
<?php get_template_part('template-parts/blog-newsletter'); ?>
<?php
get_footer();
