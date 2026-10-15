<?php
defined('ABSPATH') || exit;

/**
 * Последние статьи (база: index.html, строки 2080-2178, зона at-sec13
 * .at-sec13-thumb > .container > .row + .row с .blog-card карточками):
 * классы-обёртки, вложенность — дословно (баланс div: секция > container >
 * шапка-row + ряд карточек). id="blog" оригинала — через «Настройки блока»
 * (orisa_anchor()); data-category="@@category" опущен — плейсхолдер сборщика.
 * Карточки — WP_Query (последние записи, лимит — поле count): миниатюра через
 * orisa_img(get_post_thumbnail_id()), ссылки — the_permalink(), автор и дата —
 * данные поста. Пустой заголовок гасит h3; нет записей — весь блок не выводится.
 * Плашка «ПОЛЕЗНЫЕ МАТЕРИАЛЫ», кнопка «ВСЕ СТАТЬИ» (href="#blog") и слово
 * «Автор» — статика оригинала 1:1; SVG-стрелки — декор (как в эталоне).
 */
$title = get_sub_field('title');
$count = (int) get_sub_field('count');
if ($count < 1) {
    $count = 3;
}
$orisa_pp_query = new WP_Query([
    'post_type'           => 'post',
    'posts_per_page'      => $count,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
]);
if (!$orisa_pp_query->have_posts()) {
    return;
}
?>
<div class="at-sec13-thumb fix w-100 scale-up-img p-relative pt-120 pb-120"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-end mb-50">
            <div class="col-lg-8 col-xxl-6">
                <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                    <span class="text-uppercase">
                        <span class="text-1">ПОЛЕЗНЫЕ МАТЕРИАЛЫ</span>
                        <span class="text-2">ПОЛЕЗНЫЕ МАТЕРИАЛЫ</span>
                    </span>
                    <i>
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                        </svg>
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                        </svg>
                    </i>
                </span>
                <?php if ($title !== '') : ?>
                    <h3 class="alt-section-title lh-1 neutral-900 fw-700 mb-30 reveal-text mb-0"><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
            </div>
            <div class="col-xxl-2 col-lg-3 ms-auto text-xxl-end text-lg-end">
                <div class="at-service-btn pt-30">
                    <a class="at-btn" href="#blog">
                        <span>
                            <span class="text-1">ВСЕ СТАТЬИ</span>
                            <span class="text-2">ВСЕ СТАТЬИ</span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while ($orisa_pp_query->have_posts()) : $orisa_pp_query->the_post(); ?>
                <?php $orisa_pp_thumb_id = get_post_thumbnail_id(); ?>
                <div class="blog-card col-lg-3 col-md-6 col-12 mb-30">
                    <?php if ($orisa_pp_thumb_id) : ?>
                        <div class="blog-card__thumb hover-effect-1">
                            <a href="<?php the_permalink(); ?>" class="blog-card__img-link">
                                <?php echo orisa_img($orisa_pp_thumb_id, 'full', ['class' => 'blog-card__img22', 'alt' => get_the_title()]); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="blog-card__content">
                        <h2 class=" h6 blog-card__title">
                            <a href="<?php the_permalink(); ?>" class="blog-card__title-link"><?php the_title(); ?></a>
                        </h2>
                        <p class="blog-card__meta">
                            <span class="blog-card__meta-text">Автор </span>
                            <a href="<?php echo esc_url(get_author_posts_url((int) get_the_author_meta('ID'))); ?>" class="blog-card__author"><?php echo esc_html(get_the_author()); ?></a>
                            <span class="blog-card__meta-text"> <?php echo esc_html(get_the_date()); ?></span>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
