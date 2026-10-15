<?php
defined('ABSPATH') || exit;

/**
 * Услуга детально (база: services-details.html, <main>: sec-1/hero, sec-2/swiper,
 * sec-3/pin section-fix, sec-4/approach, sec-5/deliver).
 * Разметка 1:1: классы (container, swiper, swiper-wrapper, swiper-slide, section-fix,
 * scroll-section, section-title-pin, scroll-rotate, at-service-card), вложенность и SVG — дословно
 * (на них завязаны main.js и стили). data-атрибутов в этих секциях оригинала нет.
 * Пустые поля гасят свои теги; структурные обёртки JS (swiper, scroll-section, section-fix,
 * section-title-pin, фоновая сетка sec-5) выводятся всегда внутри показанной секции.
 * Картинки через orisa_img(); весь вывод экранирован.
 */
$crumb_link = get_sub_field('crumb_link');
$crumb_url = is_array($crumb_link) && !empty($crumb_link['url']) ? $crumb_link['url'] : '';
$crumb_title = is_array($crumb_link) && !empty($crumb_link['title']) ? $crumb_link['title'] : '';
$crumb_target = is_array($crumb_link) && !empty($crumb_link['target']) ? ' target="' . esc_attr($crumb_link['target']) . '" rel="noopener"' : '';
$crumb_current = get_sub_field('crumb_current');
$hero_title = get_sub_field('hero_title');
$hero_lead = get_sub_field('hero_lead');
$pin_badge = get_sub_field('pin_badge');
$pin_title = get_sub_field('pin_title');
$pin_lead = get_sub_field('pin_lead');
$approach_badge = get_sub_field('approach_badge');
$approach_title = get_sub_field('approach_title');
$approach_subtitle = get_sub_field('approach_subtitle');
$deliver_image = get_sub_field('deliver_image');
$deliver_badge = get_sub_field('deliver_badge');
$deliver_title = get_sub_field('deliver_title');
$quote_text = get_sub_field('quote_text');
$quote_avatar = get_sub_field('quote_avatar');
$quote_name = get_sub_field('quote_name');
$quote_position = get_sub_field('quote_position');

$orisa_sdb_tags = [];
if (function_exists('have_rows') && have_rows('hero_tags')) {
    while (have_rows('hero_tags')) {
        the_row();
        $orisa_sdb_tl = get_sub_field('link');
        if (!is_array($orisa_sdb_tl) || empty($orisa_sdb_tl['url'])) {
            continue;
        }
        $orisa_sdb_tags[] = $orisa_sdb_tl;
    }
}

$orisa_sdb_gallery = [];
if (function_exists('have_rows') && have_rows('gallery')) {
    while (have_rows('gallery')) {
        the_row();
        $orisa_sdb_gi = get_sub_field('image');
        if (empty($orisa_sdb_gi)) {
            continue;
        }
        $orisa_sdb_gallery[] = $orisa_sdb_gi;
    }
}

$orisa_sdb_pin = [];
if (function_exists('have_rows') && have_rows('pin_items')) {
    while (have_rows('pin_items')) {
        the_row();
        $orisa_sdb_pt = get_sub_field('title');
        $orisa_sdb_pd = get_sub_field('desc');
        if (!$orisa_sdb_pt && !$orisa_sdb_pd) {
            continue;
        }
        $orisa_sdb_pin[] = ['title' => $orisa_sdb_pt, 'desc' => $orisa_sdb_pd];
    }
}

$orisa_sdb_cards = [];
if (function_exists('have_rows') && have_rows('approach_cards')) {
    while (have_rows('approach_cards')) {
        the_row();
        $orisa_sdb_ct = get_sub_field('title');
        $orisa_sdb_cd = get_sub_field('desc');
        $orisa_sdb_ci = get_sub_field('image');
        $orisa_sdb_cl = get_sub_field('link');
        if (!$orisa_sdb_ct && !$orisa_sdb_cd && empty($orisa_sdb_ci)) {
            continue;
        }
        $orisa_sdb_cards[] = ['title' => $orisa_sdb_ct, 'desc' => $orisa_sdb_cd, 'image' => $orisa_sdb_ci, 'link' => $orisa_sdb_cl];
    }
}

$orisa_sdb_deliver = [];
if (function_exists('have_rows') && have_rows('deliver_items')) {
    while (have_rows('deliver_items')) {
        the_row();
        $orisa_sdb_dt = get_sub_field('title');
        if (!$orisa_sdb_dt) {
            continue;
        }
        $orisa_sdb_deliver[] = $orisa_sdb_dt;
    }
}

$orisa_sdb_alt = $hero_title ? $hero_title : get_bloginfo('name');
$orisa_sdb_has_hero = ($crumb_url || $crumb_current || $hero_title || $orisa_sdb_tags !== [] || $hero_lead);
$orisa_sdb_has_pin = ($pin_badge || $pin_title || $pin_lead || $orisa_sdb_pin !== []);
$orisa_sdb_has_approach = ($approach_badge || $approach_title || $approach_subtitle || $orisa_sdb_cards !== []);
$orisa_sdb_has_quote = ($quote_avatar || $quote_text || $quote_name || $quote_position);
$orisa_sdb_has_deliver = ($deliver_image || $deliver_badge || $deliver_title || $orisa_sdb_deliver !== [] || $orisa_sdb_has_quote);

$orisa_sdb_pin_icons = [
    '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M12 24C18.6274 24 24 18.6274 24 12C24 18.6259 29.37 23.9975 35.9953 24C29.37 24.0025 24 29.3742 24 36C24 29.3726 18.6274 24 12 24C5.37258 24 8.1423e-07 29.3726 5.24536e-07 36L0 48L12 48C18.6274 48 24 42.6274 24 36C24 42.6274 29.3726 48 36 48L48 48L48 36C48 29.3742 42.63 24.0025 36.0047 24C42.63 23.9975 48 18.6259 48 12L48 9.34594e-06L36 9.87048e-06C29.3726 6.34548e-06 24 5.37259 24 12C24 5.37259 18.6274 6.81516e-06 12 7.10486e-06L4.19629e-06 3.8147e-06L2.62268e-06 12C1.7536e-06 18.6274 5.37258 24 12 24Z" fill="currentColor" /></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M48 7.2C48 11.1764 44.7764 14.4 40.8 14.4C36.8235 14.4 33.6 11.1764 33.6 7.2C33.6 3.22355 36.8235 0 40.8 0C44.7764 0 48 3.22355 48 7.2Z" fill="currentColor" /><path d="M48 40.8C48 44.7764 44.7764 48 40.8 48C36.8235 48 33.6 44.7764 33.6 40.8C33.6 36.8235 36.8235 33.6 40.8 33.6C44.7764 33.6 48 36.8235 48 40.8Z" fill="currentColor" /><path d="M36.24 24C36.24 30.76 30.76 36.24 24 36.24C17.24 36.24 11.76 30.76 11.76 24C11.76 17.24 17.24 11.76 24 11.76C30.76 11.76 36.24 17.24 36.24 24Z" fill="currentColor" /><path d="M14.4 7.2C14.4 11.1764 11.1764 14.4 7.2 14.4C3.22355 14.4 0 11.1764 0 7.2C0 3.22355 3.22355 0 7.2 0C11.1764 0 14.4 3.22355 14.4 7.2Z" fill="currentColor" /><path d="M14.4 40.8C14.4 44.7764 11.1764 48 7.2 48C3.22355 48 0 44.7764 0 40.8C0 36.8235 3.22355 33.6 7.2 33.6C11.1764 33.6 14.4 36.8235 14.4 40.8Z" fill="currentColor" /></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M21.5836 1.47087C22.5977 -0.490291 25.4023 -0.490291 26.4163 1.47087L32.8735 13.9595C33.1322 14.4599 33.54 14.8677 34.0406 15.1264L46.529 21.5836C48.4903 22.5977 48.4903 25.4023 46.529 26.4163L34.0406 32.8735C33.54 33.1322 33.1322 33.54 32.8735 34.0406L26.4163 46.529C25.4023 48.4903 22.5977 48.4903 21.5836 46.529L15.1264 34.0406C14.8677 33.54 14.4599 33.1322 13.9595 32.8735L1.47087 26.4163C-0.490291 25.4023 -0.490291 22.5977 1.47087 21.5836L13.9595 15.1264C14.4599 14.8677 14.8677 14.4599 15.1264 13.9595L21.5836 1.47087Z" fill="currentColor" /></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H16V16H0V0ZM31.9999 16H16V31.9999H0V48H16V31.9999H31.9999V48H48V31.9999H31.9999V16ZM31.9999 16H48V0H31.9999V16Z" fill="currentColor" /></svg>',
];
?>
<?php if ($orisa_sdb_has_hero) : ?>
    <div class="sec-1-services-details overflow-hidden pt-150"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <div class="row g-4 align-items-end">
                <div class="col-lg-5 pt-lg-0 pt-100">
                    <?php if ($crumb_url || $crumb_current) : ?>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="icon-arrow-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M12.1716 8.77815L8.55964e-06 8.77816L1.47897e-06 6.77817L12.1716 6.77816L6.80761 1.41421L8.22183 3.37371e-08L16 7.77815L8.22181 15.5563L6.80759 14.1421L12.1716 8.77815Z" fill="currentColor" />
                                </svg>
                            </i>
                            <span class="text-uppercase neutral-900 fw-600">
                                <?php if ($crumb_url) : ?>
                                    <span class="text-1">
                                        <a href="<?php echo esc_url($crumb_url); ?>"<?php echo $crumb_target; ?>>
                                            <?php echo esc_html($crumb_title ? $crumb_title : $crumb_url); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                                <?php if ($crumb_current) : ?>
                                    <span class="text-1 neutral-500">
                                        <?php echo esc_html($crumb_current); ?>
                                    </span>
                                <?php endif; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if ($hero_title) : ?>
                        <h1 class="section-title d-flex fw-600 reveal-text mb-40 text-nowrap"><?php echo esc_html($hero_title); ?></h1>
                    <?php endif; ?>
                    <?php if ($orisa_sdb_tags !== []) : ?>
                        <div class="at-hero-social style-2 justify-content-start">
                            <?php foreach ($orisa_sdb_tags as $orisa_sdb_t) : ?>
                                <a href="<?php echo esc_url($orisa_sdb_t['url']); ?>"<?php echo !empty($orisa_sdb_t['target']) ? ' target="' . esc_attr($orisa_sdb_t['target']) . '" rel="noopener"' : ''; ?>>
                                    <?php echo esc_html(!empty($orisa_sdb_t['title']) ? $orisa_sdb_t['title'] : $orisa_sdb_t['url']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                        <path d="M5.62494 9.99994L0.562517 10L0.5625 8.75003L4.49994 8.74996L4.5 2.39273L2.27828 4.86124L1.48278 3.97739L5.0625 0L8.64225 3.97739L7.84676 4.86124L5.625 2.3927L5.62494 9.99994Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($hero_lead) : ?>
                    <div class="col-lg-5 ms-auto">
                        <h2 class="h6 fw-600 reveal-text mb-0"><?php echo esc_html($hero_lead); ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($orisa_sdb_gallery !== []) : ?>
    <div class="sec-2-services-details at-item-anime-area pt-100 pb-120">
        <div class="swiper about-me-slider-active">
            <div class="swiper-wrapper">
                <?php foreach ($orisa_sdb_gallery as $orisa_sdb_g) : ?>
                    <div class="swiper-slide">
                        <div class="about-me-slider-thumb at-item-anime marque">
                            <?php echo orisa_img($orisa_sdb_g, 'full', ['class' => 'w-100 rounded-4', 'alt' => $orisa_sdb_alt]); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($orisa_sdb_has_pin) : ?>
    <div class="sec-3-services-details pb-120">
        <div class="container section-fix pt-100">
            <div class="row">
                <div class="col-lg-5 h-100">
                    <?php if ($pin_badge) : ?>
                        <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($pin_badge); ?></span>
                                <span class="text-2"><?php echo esc_html($pin_badge); ?></span>
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
                    <?php endif; ?>
                    <?php if ($pin_title) : ?>
                        <h3 class="reveal-text mb-40"><?php echo esc_html($pin_title); ?></h3>
                    <?php endif; ?>
                    <?php if ($pin_lead) : ?>
                        <span class="h6 fw-600 mb-0"><?php echo esc_html($pin_lead); ?></span>
                    <?php endif; ?>
                    <div class="section-title-pin"></div>
                </div>
                <div class="col-xxl-6 col-lg-7 offset-xxl-1 p-relative">
                    <?php if ($orisa_sdb_pin !== []) : ?>
                        <div class="scroll-section vertical-section section scroll-active-item">
                            <div class="wrapper">
                                <div role="list" class="list">
                                    <?php $orisa_sdb_pi = 0; ?>
                                    <?php foreach ($orisa_sdb_pin as $orisa_sdb_p) : ?>
                                        <div class="item">
                                            <div class="container bg-neutral-0 rounded-4 border-100 p-relative">
                                                <div class="rectangular bg-neutral-0 border-100"></div>
                                                <div class="row align-items-center py-3">
                                                    <div class="col-12 h-100">
                                                        <div class="d-flex flex-column p-md-5 p-3 justify-content-between h-100">
                                                            <div class="icon pb-20">
                                                                <?php echo $orisa_sdb_pin_icons[$orisa_sdb_pi % 4]; ?>
                                                            </div>
                                                            <?php if ($orisa_sdb_p['title']) : ?>
                                                                <span class="h5 mb-4"><?php echo esc_html($orisa_sdb_p['title']); ?></span>
                                                            <?php endif; ?>
                                                            <?php if ($orisa_sdb_p['desc']) : ?>
                                                                <p class="mb-0 fz-font-lg"><?php echo esc_html($orisa_sdb_p['desc']); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $orisa_sdb_pi++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($orisa_sdb_has_approach) : ?>
    <div class="sec-4-services-details pb-120 pt-120 bg-neutral-50">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <?php if ($approach_badge) : ?>
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($approach_badge); ?></span>
                                <span class="text-2"><?php echo esc_html($approach_badge); ?></span>
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
                    <?php endif; ?>
                    <?php if ($approach_title) : ?>
                        <h3 class="reveal-text mb-20"><?php echo esc_html($approach_title); ?></h3>
                    <?php endif; ?>
                    <?php if ($approach_subtitle) : ?>
                        <h3 class="h6 fw-500 mb-0"><?php echo esc_html($approach_subtitle); ?></h3>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-8 ms-auto text-end">
                    <div class="scroll-rotate d-md-inline-block d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M53.5715 0H46.4286V41.3778L17.17 12.1193L12.1193 17.17L41.3778 46.4286H0V53.5715H41.3778L12.1193 82.83L17.17 87.8805L46.4286 58.622V100H53.5715V58.622L82.83 87.8805L87.8805 82.83L58.622 53.5715H100V46.4286H58.622L87.8805 17.17L82.83 12.1193L53.5715 41.3778V0Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
            <?php if ($orisa_sdb_cards !== []) : ?>
                <div class="row g-3 pt-100">
                    <?php $orisa_sdb_ci2 = 0; ?>
                    <?php foreach ($orisa_sdb_cards as $orisa_sdb_c) : ?>
                        <?php
                        $orisa_sdb_ci2++;
                        $orisa_sdb_cl = (is_array($orisa_sdb_c['link']) && !empty($orisa_sdb_c['link']['url'])) ? $orisa_sdb_c['link'] : null;
                        $orisa_sdb_cu = $orisa_sdb_cl ? $orisa_sdb_cl['url'] : '';
                        $orisa_sdb_ct2 = $orisa_sdb_cl && !empty($orisa_sdb_cl['target']) ? ' target="' . esc_attr($orisa_sdb_cl['target']) . '" rel="noopener"' : '';
                        // ponytail: класс card-N дословно по оригиналу (4-я карточка — card-2).
                        $orisa_sdb_cc = $orisa_sdb_ci2 === 1 ? 'card-1 no-before rounded-2 overflow-hidden p-relative bg-neutral-0 z-index-3' : 'card-' . min($orisa_sdb_ci2, 3) . ' rounded-2 overflow-hidden p-relative bg-neutral-0';
                        if ($orisa_sdb_ci2 > 4) {
                            $orisa_sdb_cc = 'card-2 rounded-2 overflow-hidden p-relative bg-neutral-0';
                        }
                        ?>
                        <div class="col-xxl-3 col-md-6">
                            <div class="at-service-card hover-up <?php echo esc_attr($orisa_sdb_cc); ?>">
                                <?php if ($orisa_sdb_cu) : ?>
                                    <a href="<?php echo esc_url($orisa_sdb_cu); ?>" class="p-absolute top-0 left-0 w-100 h-100" aria-label="<?php echo esc_attr($orisa_sdb_c['title'] ? $orisa_sdb_c['title'] : $orisa_sdb_cu); ?>"<?php echo $orisa_sdb_ct2; ?>></a>
                                <?php endif; ?>
                                <div class="at-service-card-content m-lg-5 m-4">
                                    <div class="at-service-card-number">
                                        <h3 class="h6 fw-600 neutral-300">[<?php echo esc_html(sprintf('%02d', $orisa_sdb_ci2)); ?>]</h3>
                                    </div>
                                    <?php if ($orisa_sdb_c['title']) : ?>
                                        <h4 class="mt-3 fw-600"><?php if ($orisa_sdb_cu) : ?><a href="<?php echo esc_url($orisa_sdb_cu); ?>"<?php echo $orisa_sdb_ct2; ?>><?php echo esc_html($orisa_sdb_c['title']); ?></a><?php else : ?><?php echo esc_html($orisa_sdb_c['title']); ?><?php endif; ?></h4>
                                    <?php endif; ?>
                                    <?php if ($orisa_sdb_c['desc']) : ?>
                                        <div class="at-service-card-description">
                                            <p class="mb-0 neutral-900"><?php echo esc_html($orisa_sdb_c['desc']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($orisa_sdb_c['image'])) : ?>
                                        <div class="at-service-card-img rounded-2 fix mt-4 hover-effect-1">
                                            <?php echo orisa_img($orisa_sdb_c['image'], 'full', ['class' => 'img-cover rounded-2', 'loading' => 'lazy', 'alt' => $orisa_sdb_c['title'] ? $orisa_sdb_c['title'] : $orisa_sdb_alt]); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php if ($orisa_sdb_has_deliver) : ?>
    <div class="sec-5-services-details pt-120 pb-120 p-relative border-bottom-100">
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
        <div class="container">
            <div class="row g-4 align-items-center">
                <?php if ($deliver_image) : ?>
                    <div class="col-lg-6">
                        <?php echo orisa_img($deliver_image, 'full', ['alt' => $orisa_sdb_alt]); ?>
                    </div>
                <?php endif; ?>
                <div class="col-lg-5 mx-auto">
                    <?php if ($deliver_badge) : ?>
                        <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($deliver_badge); ?></span>
                                <span class="text-2"><?php echo esc_html($deliver_badge); ?></span>
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
                    <?php endif; ?>
                    <?php if ($deliver_title) : ?>
                        <span class="h4 reveal-text mb-0 fw-600 pe-lg-5"><?php echo esc_html($deliver_title); ?></span>
                    <?php endif; ?>
                    <?php if ($orisa_sdb_deliver !== []) : ?>
                        <?php
                        $orisa_sdb_half = (int) ceil(count($orisa_sdb_deliver) / 2);
                        $orisa_sdb_col1 = array_slice($orisa_sdb_deliver, 0, $orisa_sdb_half);
                        $orisa_sdb_col2 = array_slice($orisa_sdb_deliver, $orisa_sdb_half);
                        ?>
                        <div class="row pt-30 pb-80">
                            <div class="col-md-6">
                                <?php foreach ($orisa_sdb_col1 as $orisa_sdb_di) : ?>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M9 0C13.9706 0 18 4.02944 18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0ZM8 5V8H5V10H8V13H10V10H13V8H10V5H8Z" fill="currentColor" />
                                        </svg>
                                        <p class="mb-0 fz-font-md neutral-700"><?php echo esc_html($orisa_sdb_di); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-6">
                                <?php foreach ($orisa_sdb_col2 as $orisa_sdb_di) : ?>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M9 0C13.9706 0 18 4.02944 18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0ZM8 5V8H5V10H8V13H10V10H13V8H10V5H8Z" fill="currentColor" />
                                        </svg>
                                        <p class="mb-0 fz-font-md neutral-700"><?php echo esc_html($orisa_sdb_di); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($orisa_sdb_has_quote) : ?>
                        <div class="testimonial-author d-flex align-items-start mb-0 gap-4">
                            <?php if ($quote_avatar) : ?>
                                <div>
                                    <div class="testimonial-left-img size-50 rounded-3 overflow-hidden">
                                        <?php echo orisa_img($quote_avatar, 'full', ['alt' => $quote_name ? $quote_name : $orisa_sdb_alt]); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="testimonial-content">
                                <?php if ($quote_text) : ?>
                                    <p class="fz-xl neutral-900 fw-400"><?php echo esc_html($quote_text); ?></p>
                                <?php endif; ?>
                                <?php if ($quote_name) : ?>
                                    <span class="h6 testimonial-content-author-name fw-600 mb-0 fz-font-md"><?php echo esc_html($quote_name); ?></span>
                                <?php endif; ?>
                                <?php if ($quote_position) : ?>
                                    <p class="testimonial-content-author-position m-0 fz-font-label"><?php echo esc_html($quote_position); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-120"></div>
<?php endif; ?>
