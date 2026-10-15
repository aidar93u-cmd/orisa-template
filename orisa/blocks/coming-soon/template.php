<?php
defined('ABSPATH') || exit;

/**
 * Скоро (база: coming-soon.html, <main> целиком: sec-1 + sec-2):
 * 1. Разметка 1:1 с оригиналом: классы-обёртки, вложенность, data-countdown — дословно
 *    (формат даты main.js, гл. 34: «2026/09/12 00:00:00»).
 * 2. Пустые поля не выводят свои теги (if вокруг каждого).
 * 3. Логотипы sec-2 — декор throwable-сцены, пути через ORISA_URI (без src="assets/).
 * 4. Форма CF7 — do_shortcode() поля «Форма CF7» (div, не form: CF7 выводит собственный <form>).
 * 5. Сцена sec-2 всегда ставит флаг скрипта matter.js.
 * 6. Весь вывод экранирован: esc_html для текста, esc_attr для даты, orisa_img для баннера.
 */
orisa_flag_script('matter');

$title          = get_sub_field('title');
$text           = get_sub_field('text');
$date           = get_sub_field('date');
$image          = get_sub_field('image');
$form_shortcode = get_sub_field('form_shortcode');

// ponytail: 14 логотипов-сцены циклом вместо 70 строк повторов; серые — индексы 0/4/10, как в оригинале.
$orisa_cs_logos = [
    'logo-brand-01.webp',
    'logo-brand-02.webp',
    'logo-brand-03.webp',
    'logo-brand-04.webp',
    'logo-brand-05.webp',
    'logo-brand-06.webp',
    'logo-brand-07.webp',
    'logo-brand-08.webp',
    'logo-brand-09.webp',
    'logo-brand-10.webp',
    'logo-brand-02.webp',
    'logo-brand-05.webp',
    'logo-brand-07.webp',
    'logo-brand-03.webp',
];
$orisa_cs_gray = [0, 4, 10];
?>
<div class="sec-1-coming-soon overflow-hidden pt-150"<?php echo orisa_anchor(); ?>>
    <div class="container pb-60">
        <div class="row g-4 align-items-end">
            <div class="col-xxl-6 col-lg-8">
                <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                    <span class="text-uppercase">
                        <span class="text-1">We are On the Way</span>
                        <span class="text-2">We are On the Way</span>
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
                    <h1 class="reveal-text mb-40 fz-ds-1 fw-500 lh-1"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                <?php if ($text !== '') : ?>
                    <p class="fw-400 fz-font-3xl neutral-900 mb-40 w-75 lh-sm"><?php echo esc_html($text); ?></p>
                <?php endif; ?>
                <div class="d-flex flex-wrap align-items-center gap-5">
                    <a href="tel:+2125557398" class="fz-font-lg neutral-500 fw-500">[ (+01) 555-7398 ] </a>
                    <a href="mailto:hello@orisa.com" class="fz-font-lg neutral-500 fw-500">[ hello@orisa.com ] </a>
                </div>
            </div>
            <div class="col-xxl-6 pt-xxl-0 pt-100">
                <div class="box-count box-count-square mb-50">
                    <?php if ($date !== '') : ?>
                        <div class="deals-countdown justify-content-end" data-countdown="<?php echo esc_attr($date); ?>"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($form_shortcode !== '') : ?>
            <div>
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($image) : ?>
        <div class="at-banner-thumb overflow-hidden scale-up-img pt-md-0 pt-20">
            <?php echo orisa_img($image, 'full', ['class' => 'img-cover scale-up', 'data-speed' => '.8', 'alt' => 'orisa']); ?>
        </div>
    <?php endif; ?>
</div>
<div class="sec-2-coming-soon pb-20 p-relative z-n1">
    <div class="container">
        <div class="client-capsule-wrapper-box " data-t-throwable-scene="true" style="translate: none; rotate: none; scale: none; transform: translate(0px); opacity: 1; cursor: none;">
            <div class="client-capsule-wrapper">
                <?php foreach ($orisa_cs_logos as $orisa_cs_i => $orisa_cs_logo) : ?>
                    <p data-t-throwable-el="">
                        <span class="client-box<?php echo in_array($orisa_cs_i, $orisa_cs_gray, true) ? ' bg-neutral-500' : ''; ?>">
                            <img class="invert-1" src="<?php echo esc_url(ORISA_URI . '/assets/imgs/template/logo/' . $orisa_cs_logo); ?>" alt="image">
                        </span>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
