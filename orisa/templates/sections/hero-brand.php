<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 4 (index-4.html, строки 600-759).
 * Разметка 1:1 (.sec-1-home-4: классы, data-background, вложенность, SVG — дословно).
 * Динамика: плашка, заголовок (WYSIWYG без загрузок), 2 кнопки (Link),
 * фон (Image ID), карточки-повторитель, теги-повторитель,
 * название бренда, пункты навигации-повторитель.
 * Пустые поля гасят свои теги; обёртки сетки остаются (на них завязаны стили).
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$cta_first = get_sub_field('cta_first');
$cta_second = get_sub_field('cta_second');
$bg_url = orisa_img_url(get_sub_field('background'), 'full');
$brand_title = get_sub_field('brand_title');
?>
                    <div class="sec-1-home-4 bg-linear-opacity p-relative bg-cover mt-20 rounded-5 mx-lg-3 mx-2"<?php echo $bg_url !== '' ? ' data-background="' . esc_url($bg_url) . '"' : ''; ?><?php echo orisa_anchor(); ?>>
                        <div class="container p-relative z-index-1">
                            <div class="row align-items-start">
                                <!-- Left: Tagline, Headline, Buttons -->
                                <div class="col-12">
                                    <?php if ($badge) : ?>
                                    <span class="sec-1-home-4__tagline d-inline-block mb-30"><?php echo esc_html($badge); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xxl-4 col-lg-5 mb-5 mb-lg-0">
                                    <?php if ($title) : ?>
                                    <h4 class="sec-1-home-4__headline text-white mb-4 mb-md-5 lh-1">
                                        <?php echo wp_kses_post($title); ?>
                                    </h4>
                                    <?php endif; ?>
                                    <div class="sec-1-home-4__btns d-flex flex-wrap gap-3">
                                        <?php if (is_array($cta_first) && !empty($cta_first['url'])) : ?>
                                        <a class="at-btn text-white rounded-0" href="<?php echo esc_url($cta_first['url']); ?>"<?php echo !empty($cta_first['target']) ? ' target="' . esc_attr($cta_first['target']) . '" rel="noopener"' : ''; ?>>
                                            <span>
                                                <span class="text-1"><?php echo esc_html(isset($cta_first['title']) ? $cta_first['title'] : ''); ?></span>
                                                <span class="text-2"><?php echo esc_html(isset($cta_first['title']) ? $cta_first['title'] : ''); ?></span>
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
                                        <?php endif; ?>
                                        <?php if (is_array($cta_second) && !empty($cta_second['url'])) : ?>
                                        <a class="at-btn text-white rounded-0" href="<?php echo esc_url($cta_second['url']); ?>"<?php echo !empty($cta_second['target']) ? ' target="' . esc_attr($cta_second['target']) . '" rel="noopener"' : ''; ?>>
                                            <span>
                                                <span class="text-1"><?php echo esc_html(isset($cta_second['title']) ? $cta_second['title'] : ''); ?></span>
                                                <span class="text-2"><?php echo esc_html(isset($cta_second['title']) ? $cta_second['title'] : ''); ?></span>
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
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Right: Image Cards + Tags -->
                                <div class="col-xxl-4 col-lg-6 col-md-10 ms-lg-auto mt-lg-0 mt-4">
                                    <?php if (have_rows('cards')) : ?>
                                    <div class="sec-1-home-4__cards d-flex gap-3 mb-4">
                                        <?php while (have_rows('cards')) : the_row(); ?>
                                            <?php $card_image = get_sub_field('image'); ?>
                                            <?php if ($card_image) : ?>
                                            <div class="sec-1-home-4__card rounded-3 overflow-hidden">
                                                <?php echo orisa_img($card_image, 'full', ['class' => 'img-cover', 'alt' => get_bloginfo('name')]); ?>
                                            </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (have_rows('tags')) : ?>
                                    <div class="sec-1-home-4__tags d-flex flex-wrap gap-3 mt-40">
                                        <?php while (have_rows('tags')) : the_row(); ?>
                                            <?php $tag = get_sub_field('tag'); ?>
                                            <?php if ($tag) : ?>
                                            <a href="#" class="sec-1-home-4__tag"><?php echo esc_html($tag); ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                                    <path d="M5.62494 9.99994L0.562517 10L0.5625 8.75003L4.49994 8.74996L4.5 2.39273L2.27828 4.86124L1.48278 3.97739L5.0625 0L8.64225 3.97739L7.84676 4.86124L5.625 2.3927L5.62494 9.99994Z" fill="currentColor" />
                                                </svg>
                                            </a>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Bottom: Brand Title + Navigation -->
                            <div class="sec-1-home-4__footer pt-60 pt-lg-8 mt-5 mt-lg-8">
                                <?php if ($brand_title) : ?>
                                <h2 class="sec-1-home-4__brand text-white mb-4">
                                    <?php echo esc_html($brand_title); ?><span class="sec-1-home-4__brand-suffix"><sup>®</sup></span>
                                </h2>
                                <?php endif; ?>
                                <?php if (have_rows('nav_items')) : ?>
                                <div class="container p-relative z-index-2">
                                    <div class="row">
                                        <?php while (have_rows('nav_items')) : the_row(); ?>
                                            <?php $nav_item = get_sub_field('item'); ?>
                                            <?php if ($nav_item) : ?>
                                            <div class="col-lg-3 col-md-6 col-12 text-center">
                                                <div class="at-btn at-btn-border-white ps-2 pt-20 pb-20  pe-2 text-white bg-transparent rounded-0 border-bottom-0 border-start-0 border-end-0 w-100">
                                                    <span>
                                                        <span class="text-1"><?php echo esc_html($nav_item); ?></span>
                                                        <span class="text-2"><?php echo esc_html($nav_item); ?></span>
                                                    </span>
                                                    <i>
                                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                        </svg>
                                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                        </svg>
                                                    </i>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
