<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 3 (index-3.html, строки 572-711).
 * Разметка 1:1. Динамика: плашка, заголовок (WYSIWYG — сохраняет <br> и .theme-primary),
 * подзаголовок, 2 CTA (Link), отзыв-карточка, главное фото, счётчик odometer,
 * аватары-повторитель, нижние теги-повторитель.
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$cta_main = get_sub_field('cta_main');
$cta_second = get_sub_field('cta_second');
?>
                <!--Home 3 Section 1-->
                <div class="sec-1-home-3 pt-110 p-relative">
                    <div class="position-absolute w-100 h-100 d-grid top-0 md:grid-cols-7 gap-0 z-n1 opacity-10">
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                        <div class="position-relative h-100 border-r border-dark/01 md:border-none">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                            <div class="absolute top-[20%] left-0 right-0 h-[30%] bg-gradient-to-b from-white/5 to-transparent pointer-events-none"></div>
                        </div>
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                        </div>
                    </div>
                    <div class="container pt-xxl-0 pt-110">
                        <div class="row g-xxl-5 g-4 align-items-center">
                            <div class="col-lg-3 col-md-6 order-2 order-lg-1 mb-100">
                                <div class="testimonial-cart pe-xxl-5">
                                    <div class="ripple-image ripples rounded-4 overflow-hidden">
                                        <?php echo orisa_img(get_sub_field('testimonial_image'), 'full', ['class' => 'img-cover', 'alt' => get_bloginfo('name')]); ?>
                                    </div>
                                    <div class="testimonial-content p-3">
                                        <p class="h6 fw-400 reveal-text py-3 mb-0">
                                            <?php echo esc_html(get_sub_field('testimonial_quote')); ?>
                                        </p>
                                        <div class="testimonial-author d-flex align-items-start mb-0 gap-2">
                                            <div class="testimonial-left-img size-30 rounded-2 overflow-hidden">
                                                <?php echo orisa_img(get_sub_field('testimonial_avatar'), 'full', ['alt' => get_bloginfo('name')]); ?>
                                            </div>
                                            <div class="testimonial-content">
                                                <p class="h6 testimonial-content-author-name fw-600 mb-0 fz-font-md"><?php echo esc_html(get_sub_field('testimonial_name')); ?></p>
                                                <p class="testimonial-content-author-position m-0 fz-font-label"><?php echo esc_html(get_sub_field('testimonial_position')); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-5 align-self-center order-1 order-lg-2">
                                <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                                    <span class="text-uppercase">
                                        <span class="text-1"><?php echo esc_html($badge); ?></span>
                                        <span class="text-2"><?php echo esc_html($badge); ?></span>
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
                                <?php if ($title) : ?><h1 class="fw-900 lh-1 mt-10"><?php echo wp_kses_post($title); ?></h1><?php endif; ?>
                                <?php $subtitle = get_sub_field('subtitle'); ?>
                                <?php if ($subtitle) : ?><p class="fz-font-lg neutral-500 mb-65 mt-25"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
                                <div class="d-flex flex-wrap align-items-center gap-4">
                                    <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                                        <?php $cta_main_url = is_array($cta_main) && !empty($cta_main['url']) ? $cta_main['url'] : '#'; ?>
                                    <a class="at-btn-circle" href="<?php echo esc_url($cta_main_url); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                        <?php $cta_main_title = is_array($cta_main) && !empty($cta_main['title']) ? $cta_main['title'] : ''; ?>
                                        <a class="at-btn z-index-1" href="<?php echo esc_url($cta_main_url); ?>"><?php echo esc_html($cta_main_title); ?></a>
                                        <?php $cta_main_url = is_array($cta_main) && !empty($cta_main['url']) ? $cta_main['url'] : '#'; ?>
                                    <a class="at-btn-circle" href="<?php echo esc_url($cta_main_url); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                    </div>
                                    <?php $cta_second_url = is_array($cta_second) && !empty($cta_second['url']) ? $cta_second['url'] : '#'; $cta_second_title = is_array($cta_second) && !empty($cta_second['title']) ? $cta_second['title'] : ''; ?>
                                    <a href="<?php echo esc_url($cta_second_url); ?>" class="at-btn common-black border-bottom-900 text-uppercase bg-transparent rounded-0 p-0 pb-2">
                                        <span class="text-uppercase">
                                            <span class="text-1"><?php echo esc_html($cta_second_title); ?> </span>
                                            <span class="text-2"><?php echo esc_html($cta_second_title); ?> </span>
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
                            <div class="col-xxl-1 mt-150 order-lg-3 order-5 d-none d-xxl-block align-self-start">
                                <svg class="rotate-infinite" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                    <path d="M4.4275 53.66C16.0138 44.9195 21.807 40.5492 28.5001 40.5492C35.1932 40.5492 40.9863 44.9195 52.5727 53.66L56.9999 56.9999L53.6601 52.5727C44.9195 40.9863 40.5492 35.1932 40.5492 28.5001C40.5492 21.807 44.9195 16.0138 53.66 4.42751L57 0.000133148L52.5727 3.34004C40.9863 12.0806 35.1932 16.4509 28.5001 16.4509C21.807 16.4509 16.0138 12.0806 4.4275 3.34004L0 0L3.34004 4.42749C12.0806 16.0138 16.4509 21.807 16.4509 28.5001C16.4509 35.1932 12.0806 40.9863 3.34005 52.5726L0.000112182 57L4.4275 53.66Z" fill="#CACACA" />
                                </svg>
                            </div>
                            <div class="col-lg-4 col-md-6 order-3">
                                <div class="p-relative rounded-4 fix cilent-word-wide changeless">
                                    <?php echo orisa_img(get_sub_field('main_image'), 'full', ['class' => 'img-cover', 'alt' => get_bloginfo('name')]); ?>
                                    <div class="cilent-word-wide-content p-absolute bottom-0 end-0 m-lg-5 m-md-4 m-4">
                                        <span class="fw-800 fz-font-3xl neutral-900"><span class="odometer text-nowrap" data-count="<?php echo esc_attr(get_sub_field('counter_number')); ?>"></span>K+</span>
                                        <p class="h6 fz-font-md mb-0"><?php echo esc_html(get_sub_field('counter_label')); ?></p>
                                        <?php if (function_exists('have_rows') && have_rows('avatars')) : ?>
                                        <div class="position-relative d-flex align-items-center gap-2">
                                            <?php $orisa_av_i = 0; ?>
                                            <?php while (have_rows('avatars')) : the_row(); $orisa_av_i++; ?>
                                            <div class="avatar z-index-<?php echo esc_attr((string) $orisa_av_i); ?>">
                                                <?php echo orisa_img(get_sub_field('avatar'), 'full', ['class' => 'img-cover', 'alt' => get_bloginfo('name')]); ?>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 order-5">
                                <?php if (function_exists('have_rows') && have_rows('tags')) : ?>
                                <div class="d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center pb-50 gap-md-5 gap-2 at_fade_anim" data-fade-from="bottom" data-duration="2">
                                    <?php while (have_rows('tags')) : the_row(); ?>
                                        <?php $tag = get_sub_field('tag'); ?>
                                        <?php if ($tag !== '') : ?><p class="neutral-900 mb-0"><?php echo esc_html($tag); ?></p><?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
