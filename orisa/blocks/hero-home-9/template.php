<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 9 (index-9.html, строки 575-667).
 * Разметка 1:1. Динамика: заголовки, интро и кикер (WYSIWYG — span.text-scramble, <br>),
 * кнопка (Link), фото-повторитель, заголовок и логотипы-повторитель, звезда,
 * услуги-повторитель (Link). data-delay/parallax/rotate — по позиции (как в оригинале),
 * target услуг — _blank как в оригинале; иконки SVG и разделитель — декор, захардкожены.
 */
$title_modern = get_sub_field('title_modern');
$intro = get_sub_field('intro');
$kicker = get_sub_field('kicker');
$button = get_sub_field('button');
$button_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$button_title = is_array($button) && !empty($button['title']) ? $button['title'] : '';
$title_agency = get_sub_field('title_agency');
$has_thumbs = have_rows('thumbs');
$brands_title = get_sub_field('brands_title');
$has_brands = have_rows('brands');
$star_image = get_sub_field('star_image');
$has_services = have_rows('services');
$has_bottom = $brands_title || $has_brands || $star_image || $has_services;
?>
<!--Home 9 Section 1 (Hero - Modern Agency)-->
<section class="sec-1-home-9 changeless"<?php echo orisa_anchor(); ?>>
    <div class="sec-1-home-9__container">
        <div class="sec-1-home-9__row sec-1-home-9__row--top">
            <?php if ($title_modern) : ?>
                <h1 class="sec-1-home-9__title sec-1-home-9__title--modern text-scale-anim"><?php echo esc_html($title_modern); ?></h1>
            <?php endif; ?>
            <?php if ($intro) : ?>
                <div class="sec-1-home-9__intro at_fade_anim" data-delay=".2" data-fade-from="bottom">
                    <span class="sec-1-home-9__intro-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="17" viewBox="0 0 27 20" fill="none">
                            <path d="M13.3203 20C5.9637 20 0 15.5228 0 10C0 4.47715 5.9637 0 13.3203 0C20.6769 0 26.6406 4.47715 26.6406 10C26.6406 15.5228 20.6769 20 13.3203 20ZM10.27 17.6674C8.98779 15.6259 8.20174 13.3742 8.02857 11H2.7465C3.27413 14.1765 6.28238 16.7747 10.27 17.6674ZM10.6971 11C10.8975 13.4388 11.8255 15.7297 13.3203 17.752C14.8151 15.7297 15.7431 13.4388 15.9435 11H10.6971ZM23.8941 11H18.6121C18.4389 13.3742 17.6529 15.6259 16.3707 17.6674C20.3582 16.7747 23.3665 14.1765 23.8941 11ZM2.7465 9H8.02857C8.20174 6.62577 8.98779 4.37407 10.27 2.33256C6.28238 3.22533 3.27413 5.8235 2.7465 9ZM10.6971 9H15.9435C15.7431 6.56122 14.8151 4.27025 13.3203 2.24799C11.8255 4.27025 10.8975 6.56122 10.6971 9ZM16.3707 2.33256C17.6529 4.37407 18.4389 6.62577 18.6121 9H23.8941C23.3665 5.8235 20.3582 3.22533 16.3707 2.33256Z" fill="currentColor" />
                        </svg>
                    </span>
                    <p class="sec-1-home-9__intro-text reveal-text text-white">
                        <?php echo wp_kses_post($intro); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <div class="sec-1-home-9__row sec-1-home-9__row--middle">
            <div class="sec-1-home-9__left at_fade_anim" data-delay=".3" data-fade-from="bottom">
                <?php if ($kicker) : ?>
                    <p class="sec-1-home-9__kicker">
                        <?php echo wp_kses_post($kicker); ?>
                    </p>
                <?php endif; ?>
                <?php if ($button_url !== '' && $button_title !== '') : ?>
                    <a class="at-btn sec-1-home-9__btn" href="<?php echo esc_url($button_url); ?>">
                        <span>
                            <span class="text-1"><?php echo esc_html($button_title); ?></span>
                            <span class="text-2"><?php echo esc_html($button_title); ?></span>
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
            <?php if ($title_agency) : ?>
                <h2 class="sec-1-home-9__title sec-1-home-9__title--agency text-scale-anim"><?php echo esc_html($title_agency); ?></h2>
            <?php endif; ?>
            <?php if ($has_thumbs) : ?>
                <div class="sec-1-home-9__thumbs mt-md-0 mt-4">
                    <?php $orisa_h9_th_i = 0; ?>
                    <?php $orisa_h9_th_fx = [['.1', '228', 'sine.inOut'], ['.2', '110', 'power3.in'], ['.3', '52', 'sine.inOut']]; ?>
                    <?php while (have_rows('thumbs')) : the_row(); ?>
                        <?php $orisa_h9_thumb = get_sub_field('image'); ?>
                        <?php if (!$orisa_h9_thumb) { continue; } ?>
                        <?php $orisa_h9_th_fx_cur = $orisa_h9_th_fx[min($orisa_h9_th_i, 2)]; ?>
                        <?php $orisa_h9_th_i++; ?>
                        <div class="sec-1-home-9__thumb " data-delay="<?php echo esc_attr($orisa_h9_th_fx_cur[0]); ?>" data-scroll-parallax-range="<?php echo esc_attr($orisa_h9_th_fx_cur[1]); ?>" data-h8-parallax-ease="<?php echo esc_attr($orisa_h9_th_fx_cur[2]); ?>">
                            <?php echo orisa_img($orisa_h9_thumb, 'full', ['alt' => get_bloginfo('name')]); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="sec-1-home-9__divider" aria-hidden="true">
            <span class="sec-1-home-9__divider-line"></span>
            <span class="sec-1-home-9__divider-line"></span>
        </div>

        <?php if ($has_bottom) : ?>
            <div class="sec-1-home-9__row sec-1-home-9__row--bottom">
                <?php if ($brands_title || $has_brands) : ?>
                    <div class="sec-1-home-9__partners">
                        <?php if ($brands_title) : ?>
                            <p class="sec-1-home-9__brands-title at_fade_anim" data-delay=".1" data-start="100%"><?php echo esc_html($brands_title); ?></p>
                        <?php endif; ?>
                        <?php if ($has_brands) : ?>
                            <div class="sec-1-home-9__brands-list">
                                <?php $orisa_h9_br_i = 0; ?>
                                <?php while (have_rows('brands')) : the_row(); ?>
                                    <?php $orisa_h9_logo = get_sub_field('logo'); ?>
                                    <?php if (!$orisa_h9_logo) { continue; } ?>
                                    <?php $orisa_h9_br_i++; ?>
                                    <div class="sec-1-home-9__brand at_fade_anim" data-delay="<?php echo esc_attr('.' . $orisa_h9_br_i); ?>" data-start="100%"><?php echo orisa_img($orisa_h9_logo, 'full', ['alt' => get_bloginfo('name')]); ?></div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($star_image || $has_services) : ?>
                    <div class="sec-1-home-9__services-wrap w-50">
                        <?php if ($star_image) : ?>
                            <?php echo orisa_img($star_image, 'full', ['class' => 'at-scroll-rotate', 'data-rotate-duration' => '18', 'data-rotate-sensitivity' => '0.18', 'data-rotate-boost' => '12', 'alt' => get_bloginfo('name')]); ?>
                        <?php endif; ?>
                        <?php if ($has_services) : ?>
                            <div class="sec-1-home-9__services">
                                <div class="menu-list d-flex flex-column">
                                    <?php $orisa_h9_sv_i = 0; ?>
                                    <?php while (have_rows('services')) : the_row(); ?>
                                        <?php $orisa_h9_service = get_sub_field('link'); ?>
                                        <?php if (!is_array($orisa_h9_service) || empty($orisa_h9_service['url'])) { continue; } ?>
                                        <?php $orisa_h9_sv_i++; ?>
                                        <?php $orisa_h9_service_title = !empty($orisa_h9_service['title']) ? $orisa_h9_service['title'] : $orisa_h9_service['url']; ?>
                                        <a href="<?php echo esc_url($orisa_h9_service['url']); ?>" class="border-bottom-300 py-3 menu-list__item hasdot at_fade_anim" data-delay="<?php echo esc_attr('.' . $orisa_h9_sv_i); ?>" data-fade-from="left" data-start="100%" target="_blank">
                                            <span class="text neutral-0 fw-600 text-uppercase"> <?php echo esc_html($orisa_h9_service_title); ?> </span>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
