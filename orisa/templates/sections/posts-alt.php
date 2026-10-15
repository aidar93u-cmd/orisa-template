<?php
defined('ABSPATH') || exit;

/**
 * Статьи alt (база: index.html, строки 1739-1839, зона at-blog-area
 * .home-5-section-8 > .container > шапка-row + .row.g-4 с карточками):
 * классы-обёртки, вложенность — дословно. Первая запись — крупная
 * overlay-карточка .alt-portfolio-item (рубрика-пилюля, заголовок, анонс),
 * остальные — мелкие .blog-card 1:1. Карточки — WP_Query (лимит — поле count),
 * миниатюры через orisa_img(), ссылки — the_permalink(), рубрика/анонс/автор/
 * дата — данные постов. Нет записей — весь блок не выводится.
 * Плашка «ПОЛЕЗНЫЕ МАТЕРИАЛЫ», кнопка «Все статьи», SVG-стрелки — статика
 * оригинала 1:1; ссылка кнопки — страница блога (page_for_posts).
 */
$title = (string) get_sub_field('title');
$count = (int) get_sub_field('count');
if ($count < 1) {
    $count = 3;
}
$orisa_pa_query = new WP_Query([
    'post_type'           => 'post',
    'posts_per_page'      => $count,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
]);
if (!$orisa_pa_query->have_posts()) {
    return;
}
$orisa_pa_blog_url = get_permalink((int) get_option('page_for_posts'));
if (!$orisa_pa_blog_url) {
    $orisa_pa_blog_url = home_url('/');
}
$orisa_pa_index = 0;
?>
<div class="home-5-section-8 bg-cover pt-100 pb-120"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-end mb-50 g-4">
            <div class="col-xxl-1 align-self-start m-0">
                <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0 mt-10">
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
            </div>
            <div class="col-lg-6 mt-0">
                <?php if ($title !== '') : ?>
                    <h3 class="alt-section-title lh-1 neutral-900 fw-700 mb-30 reveal-text mb-0"><?php echo nl2br(esc_html($title)); ?></h3>
                <?php endif; ?>
            </div>
            <div class="col-xxl-2 col-md-4 ms-lg-auto d-flex justify-content-lg-end">
                <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                    <a class="at-btn-circle" href="<?php echo esc_url($orisa_pa_blog_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                            <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a class="at-btn z-index-1" href="<?php echo esc_url($orisa_pa_blog_url); ?>">Все статьи</a>
                    <a class="at-btn-circle" href="<?php echo esc_url($orisa_pa_blog_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                            <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php while ($orisa_pa_query->have_posts()) : $orisa_pa_query->the_post(); ?>
                <?php
                $orisa_pa_thumb_id = get_post_thumbnail_id();
                $orisa_pa_cats = get_the_category();
                $orisa_pa_cat = !empty($orisa_pa_cats) ? $orisa_pa_cats[0]->name : '';
                ?>
                <?php if ($orisa_pa_index === 0) : ?>
                    <div class="col-lg-4 col-12">
                        <div class="alt-portfolio-item mb-30 at-hover-item">
                            <a href="<?php the_permalink(); ?>" class="alt-portfolio-thumb mb-15 p-relative fix d-block">
                                <?php echo orisa_img($orisa_pa_thumb_id, 'full', ['class' => 'w-100 scale-img-from-to', 'data-value-1' => '1.5', 'data-value-2' => '1', 'alt' => get_the_title()]); ?>
                                <div class="alt-portfolio-btn start-0 end-0 mx-4">
                                    <div class="content">
                                        <?php if ($orisa_pa_cat !== '') : ?>
                                            <span class="bg-transparent text-uppercase border px-3 py-1 rounded-pill text-white fz-font-label"><?php echo esc_html($orisa_pa_cat); ?></span>
                                        <?php endif; ?>
                                        <h2 class="h4 fw-600 text-white mb-0 mt-20"><?php the_title(); ?></h2>
                                        <p class="text-white fz-font-lg mb-0 mt-10 text-truncate-3 des"><?php echo esc_html(get_the_excerpt()); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-lg-4 col-12">
                        <div>
                            <div class="blog-card__thumb rounded-4 hover-effect-1">
                                <a href="<?php the_permalink(); ?>" class="blog-card__img-link">
                                    <span class="anim-zoomin">
                                        <?php echo orisa_img($orisa_pa_thumb_id, 'full', ['class' => 'blog-card__img', 'alt' => get_the_title()]); ?>
                                    </span>
                                </a>
                            </div>
                            <div class="blog-card__content mt-30">
                                <h3 class="h5 blog-card__title">
                                    <a href="<?php the_permalink(); ?>" class="blog-card__title-link"><?php the_title(); ?></a>
                                </h3>
                                <p class="blog-card__meta">
                                    <span class="blog-card__meta-text">By </span>
                                    <a href="<?php echo esc_url(get_author_posts_url((int) get_the_author_meta('ID'))); ?>" class="blog-card__author"><?php echo esc_html(get_the_author()); ?></a>
                                    <span class="blog-card__meta-text"> – <?php echo esc_html(get_the_date()); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $orisa_pa_index++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
