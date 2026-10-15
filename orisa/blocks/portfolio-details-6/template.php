<?php
defined('ABSPATH') || exit;

/**
 * Кейс-6 (база: portfolio-details-6.html, <main>: sec-1…sec-7-portfolio-details-6).
 * Разметка 1:1: классы sec-*-portfolio-details-6, swiper/slider/wrapper/slide, data-fade-from/data-delay,
 * вложенность — дословно (на них завязаны main.js и слайдер).
 * Пустые поля гасят свои теги; картинки через orisa_img(); весь вывод экранирован.
 * Статика без полей (marquee-лента, цифры sec-4, FAQ sec-6) — захардкожена 1:1 из оригинала.
 */
$byline = get_sub_field('byline');
$title = get_sub_field('title');
$title_mark = get_sub_field('title_mark');
$tagline = get_sub_field('tagline');
$magazine_eyebrow = get_sub_field('magazine_eyebrow');
$magazine_body = get_sub_field('magazine_body');
$magazine_pullout = get_sub_field('magazine_pullout');
$magazine_image = get_sub_field('magazine_image');
$gallery_eyebrow = get_sub_field('gallery_eyebrow');
$gallery_heading = get_sub_field('gallery_heading');
$gallery_hint = get_sub_field('gallery_hint');
$gallery_caption = get_sub_field('gallery_caption');
$quote = get_sub_field('quote');
$quote_author = get_sub_field('quote_author');
$quote_role = get_sub_field('quote_role');
$quote_image = get_sub_field('quote_image');
$next_link = get_sub_field('next_link');
$next_url = is_array($next_link) && !empty($next_link['url']) ? $next_link['url'] : '#';
$next_target = is_array($next_link) && !empty($next_link['target']) ? ' target="' . esc_attr($next_link['target']) . '" rel="noopener"' : '';
$next_image = get_sub_field('next_image');
$next_num = get_sub_field('next_num');
$next_name = get_sub_field('next_name');
$next_tagline = get_sub_field('next_tagline');
$next_meta = get_sub_field('next_meta');

$orisa_pd6_credits = [];
if (function_exists('have_rows') && have_rows('credits')) {
    while (have_rows('credits')) {
        the_row();
        $orisa_pd6_cl = get_sub_field('label');
        $orisa_pd6_cv = get_sub_field('value');
        if (!$orisa_pd6_cl && !$orisa_pd6_cv) {
            continue;
        }
        $orisa_pd6_credits[] = ['label' => $orisa_pd6_cl, 'value' => $orisa_pd6_cv];
    }
}

$orisa_pd6_gallery = [];
if (function_exists('have_rows') && have_rows('gallery')) {
    while (have_rows('gallery')) {
        the_row();
        $orisa_pd6_gi = get_sub_field('image');
        if (empty($orisa_pd6_gi)) {
            continue;
        }
        $orisa_pd6_gallery[] = $orisa_pd6_gi;
    }
}

$orisa_pd6_next_tags = [];
if (function_exists('have_rows') && have_rows('next_tags')) {
    while (have_rows('next_tags')) {
        the_row();
        $orisa_pd6_nt = get_sub_field('label');
        if (!$orisa_pd6_nt) {
            continue;
        }
        $orisa_pd6_next_tags[] = $orisa_pd6_nt;
    }
}

$orisa_pd6_alt = $title ? $title : get_bloginfo('name');
$orisa_pd6_has_hero = ($byline || $title || $title_mark || $tagline || $orisa_pd6_credits !== []);
$orisa_pd6_has_magazine = ($magazine_eyebrow || $magazine_body || $magazine_pullout || $magazine_image);
$orisa_pd6_has_gallery_head = ($gallery_eyebrow || $gallery_heading || $gallery_hint);
$orisa_pd6_has_gallery = ($orisa_pd6_has_gallery_head || $orisa_pd6_gallery !== [] || $gallery_caption);
$orisa_pd6_gallery_count = count($orisa_pd6_gallery);
$orisa_pd6_has_quote = ($quote || $quote_author || $quote_role || $quote_image);
$orisa_pd6_has_next = ($next_url !== '#' || $next_image || $next_num || $next_name || $next_tagline || $next_meta || $orisa_pd6_next_tags !== []);
$orisa_pd6_quote_alt = $quote_author ? $quote_author : $orisa_pd6_alt;
$orisa_pd6_next_alt = $next_name ? $next_name : get_bloginfo('name');
?>
<?php if ($orisa_pd6_has_hero) : ?>
    <section class="sec-1-portfolio-details-6 overflow-hidden"<?php echo orisa_anchor(); ?>>
        <div class="sec-1-portfolio-details-6__top pt-150 pb-50">
            <div class="container text-center">
                <?php if ($byline) : ?>
                    <span class="sec-1-portfolio-details-6__byline fz-font-label text-uppercase fw-600 neutral-500 d-block mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".05"><?php echo esc_html($byline); ?></span>
                <?php endif; ?>
                <?php if ($title || $title_mark) : ?>
                    <h1 class="sec-1-portfolio-details-6__title fw-500 neutral-950 d-inline-flex mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".1"><?php echo esc_html($title); ?><?php if ($title_mark) : ?><sup class="fz-80 fw-400 top-0"><?php echo esc_html($title_mark); ?></sup><?php endif; ?></h1>
                <?php endif; ?>
                <?php if ($tagline) : ?>
                    <p class="sec-1-portfolio-details-6__tagline fz-font-3xl fw-400 neutral-500 mb-50 at_fade_anim" data-fade-from="bottom" data-delay=".2"><?php echo esc_html($tagline); ?></p>
                <?php endif; ?>
                <?php if ($orisa_pd6_credits !== []) : ?>
                    <div class="sec-1-portfolio-details-6__credits border-top-100 border-bottom-100 at_fade_anim" data-fade-from="bottom" data-delay=".3">
                        <div class="row text-start">
                            <?php foreach ($orisa_pd6_credits as $orisa_pd6_c) : ?>
                                <div class="col-md-3 col-6 sec-1-portfolio-details-6__credit-cell">
                                    <?php if ($orisa_pd6_c['label']) : ?>
                                        <span class="d-block fz-font-label text-uppercase fw-600 neutral-500 mb-2"><?php echo esc_html($orisa_pd6_c['label']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($orisa_pd6_c['value']) : ?>
                                        <p class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($orisa_pd6_c['value']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="sec-1-portfolio-details-6__marquee" aria-hidden="true">
            <div class="sec-1-portfolio-details-6__marquee-track">
                <span class="sec-1-portfolio-details-6__marquee-text">Fashion <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Identity <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Editorial <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Lookbook <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Branding <span class="sec-1-portfolio-details-6__marquee-dot">●</span> </span>
                <span class="sec-1-portfolio-details-6__marquee-text">Fashion <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Identity <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Editorial <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Lookbook <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Branding <span class="sec-1-portfolio-details-6__marquee-dot">●</span> </span>
                <span class="sec-1-portfolio-details-6__marquee-text">Fashion <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Identity <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Editorial <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Lookbook <span class="sec-1-portfolio-details-6__marquee-dot">●</span> Branding <span class="sec-1-portfolio-details-6__marquee-dot">●</span> </span>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_pd6_has_magazine) : ?>
    <section class="sec-2-portfolio-details-6 overflow-hidden pt-100 pb-100">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-7 sec-2-portfolio-details-6__col-text">
                    <?php if ($magazine_eyebrow) : ?>
                        <span class="sec-2-portfolio-details-6__eyebrow fz-font-label text-uppercase fw-600 d-block mb-30 at_fade_anim" data-fade-from="left" data-delay=".05"><?php echo esc_html($magazine_eyebrow); ?></span>
                    <?php endif; ?>
                    <?php if ($magazine_body) : ?>
                        <div class="sec-2-portfolio-details-6__body at_fade_anim" data-fade-from="bottom" data-delay=".1">
                            <?php echo wp_kses_post($magazine_body); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($magazine_pullout) : ?>
                        <p class="sec-2-portfolio-details-6__pullout fz-font-md fw-500 neutral-500 mb-0 mt-50 at_fade_anim" data-fade-from="left" data-delay=".25"><?php echo esc_html($magazine_pullout); ?></p>
                    <?php endif; ?>
                </div>
                <?php if ($magazine_image) : ?>
                    <div class="col-lg-5">
                        <figure class="sec-2-portfolio-details-6__media mb-0">
                            <?php echo orisa_img($magazine_image, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd6_alt]); ?>
                        </figure>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_pd6_has_gallery) : ?>
    <section class="sec-3-portfolio-details-6 overflow-hidden pt-100 pb-100">
        <?php if ($orisa_pd6_has_gallery_head) : ?>
            <div class="container mb-50">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <?php if ($gallery_eyebrow) : ?>
                            <span class="sec-3-portfolio-details-6__eyebrow fz-font-label text-uppercase fw-600 d-block mb-15 at_fade_anim" data-fade-from="left" data-delay=".05"><?php echo esc_html($gallery_eyebrow); ?></span>
                        <?php endif; ?>
                        <?php if ($gallery_heading) : ?>
                            <h2 class="sec-3-portfolio-details-6__heading fw-500 neutral-950 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1"><?php echo esc_html($gallery_heading); ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php if ($gallery_hint) : ?>
                        <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                            <span class="sec-3-portfolio-details-6__hint fz-font-label text-uppercase fw-600 neutral-500 at_fade_anim" data-fade-from="right" data-delay=".15">
                                <span aria-hidden="true">←</span> <?php echo esc_html($gallery_hint); ?> <span aria-hidden="true">→</span>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($orisa_pd6_gallery !== []) : ?>
            <div class="sec-3-portfolio-details-6__slider swiper" aria-label="Project gallery">
                <div class="swiper-wrapper">
                    <?php foreach ($orisa_pd6_gallery as $orisa_pd6_g) : ?>
                        <div class="swiper-slide sec-3-portfolio-details-6__slide">
                            <figure class="sec-3-portfolio-details-6__cell mb-0">
                                <?php echo orisa_img($orisa_pd6_g, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd6_alt]); ?>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($gallery_caption || $orisa_pd6_gallery_count > 1) : ?>
            <div class="container mt-40">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <?php if ($gallery_caption || $orisa_pd6_gallery !== []) : ?>
                            <p class="sec-3-portfolio-details-6__caption fz-font-md neutral-500 mb-0">
                                <?php if ($orisa_pd6_gallery !== []) : ?>
                                    <span class="sec-3-portfolio-details-6__caption-num neutral-950 fw-500"><?php echo esc_html(sprintf('01 / %02d', $orisa_pd6_gallery_count)); ?></span> <span aria-hidden="true">·</span>
                                <?php endif; ?>
                                <?php if ($gallery_caption) : ?>
                                    <?php echo esc_html($gallery_caption); ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if ($orisa_pd6_gallery_count > 1) : ?>
                        <div class="col-md-4 d-flex justify-content-md-end gap-3 mt-3 mt-md-0">
                            <button type="button" class="sec-3-portfolio-details-6__nav sec-3-portfolio-details-6__nav--prev" aria-label="Previous slide">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 12H5M5 12L11 18M5 12L11 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button type="button" class="sec-3-portfolio-details-6__nav sec-3-portfolio-details-6__nav--next" aria-label="Next slide">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L13 18M19 12L13 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
<section class="sec-4-portfolio-details-6 overflow-hidden pt-100 pb-100">
    <div class="container">
        <div class="text-center mb-60">
            <span class="sec-4-portfolio-details-6__eyebrow fz-font-label text-uppercase fw-600 d-block mb-15 at_fade_anim" data-fade-from="bottom" data-delay=".05">By the numbers</span>
            <h2 class="sec-4-portfolio-details-6__heading fw-500 neutral-950 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1">Impact at a glance</h2>
        </div>
        <ul class="sec-4-portfolio-details-6__stats list-unstyled mb-0">
            <li class="sec-4-portfolio-details-6__stat at_fade_anim" data-fade-from="bottom" data-delay=".1">
                <span class="sec-4-portfolio-details-6__stat-num d-block fw-500 lh-1">+240%</span>
                <p class="sec-4-portfolio-details-6__stat-label fz-font-md neutral-500 mb-0">Brand engagement</p>
            </li>
            <li class="sec-4-portfolio-details-6__stat at_fade_anim" data-fade-from="bottom" data-delay=".2">
                <span class="sec-4-portfolio-details-6__stat-num d-block fw-500 lh-1">4</span>
                <p class="sec-4-portfolio-details-6__stat-label fz-font-md neutral-500 mb-0">Markets reached</p>
            </li>
            <li class="sec-4-portfolio-details-6__stat at_fade_anim" data-fade-from="bottom" data-delay=".3">
                <span class="sec-4-portfolio-details-6__stat-num d-block fw-500 lh-1">12</span>
                <p class="sec-4-portfolio-details-6__stat-label fz-font-md neutral-500 mb-0">Collections launched</p>
            </li>
            <li class="sec-4-portfolio-details-6__stat at_fade_anim" data-fade-from="bottom" data-delay=".4">
                <span class="sec-4-portfolio-details-6__stat-num d-block fw-500 lh-1">98%</span>
                <p class="sec-4-portfolio-details-6__stat-label fz-font-md neutral-500 mb-0">Brand recall score</p>
            </li>
        </ul>
    </div>
</section>
<?php if ($orisa_pd6_has_quote) : ?>
    <section class="sec-5-portfolio-details-6 overflow-hidden pt-100 pb-100">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <?php if ($quote_image) : ?>
                    <div class="col-lg-6">
                        <figure class="sec-5-portfolio-details-6__media mb-0 at_fade_anim" data-fade-from="left" data-delay=".05">
                            <?php echo orisa_img($quote_image, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd6_quote_alt]); ?>
                        </figure>
                    </div>
                <?php endif; ?>
                <div class="col-lg-6">
                    <div class="sec-5-portfolio-details-6__content">
                        <span class="sec-5-portfolio-details-6__mark at_fade_anim" data-fade-from="bottom" data-delay=".1" aria-hidden="true">&ldquo;</span>
                        <?php if ($quote) : ?>
                            <blockquote class="sec-5-portfolio-details-6__quote fw-500 neutral-950 mb-50 at_fade_anim" data-fade-from="bottom" data-delay=".2">
                                <?php echo esc_html($quote); ?>
                            </blockquote>
                        <?php endif; ?>
                        <span class="sec-5-portfolio-details-6__divider d-inline-block" aria-hidden="true"></span>
                        <?php if ($quote_author) : ?>
                            <p class="sec-5-portfolio-details-6__author fz-font-lg fw-500 neutral-950 mb-1 mt-30 at_fade_anim" data-fade-from="bottom" data-delay=".3"><?php echo esc_html($quote_author); ?></p>
                        <?php endif; ?>
                        <?php if ($quote_role) : ?>
                            <p class="sec-5-portfolio-details-6__role fz-font-label text-uppercase fw-600 neutral-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".35"><?php echo esc_html($quote_role); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="sec-6-portfolio-details-6 overflow-hidden pt-100 pb-100">
    <div class="container">
        <div class="row mb-50">
            <div class="col-12">
                <span class="sec-6-portfolio-details-6__eyebrow fz-font-label text-uppercase fw-600 d-block mb-15 at_fade_anim" data-fade-from="left" data-delay=".05">Project details</span>
                <h2 class="sec-6-portfolio-details-6__heading fw-500 neutral-950 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1">Frequently asked</h2>
            </div>
        </div>
        <ul class="sec-6-portfolio-details-6__list list-unstyled mb-0">
            <li class="sec-6-portfolio-details-6__row at_fade_anim" data-fade-from="bottom" data-delay=".1">
                <details class="sec-6-portfolio-details-6__item" open>
                    <summary class="sec-6-portfolio-details-6__head">
                        <span class="sec-6-portfolio-details-6__q fw-500 neutral-950">What was the project scope?</span>
                        <span class="sec-6-portfolio-details-6__icon" aria-hidden="true">
                            <span class="sec-6-portfolio-details-6__icon-bar"></span>
                            <span class="sec-6-portfolio-details-6__icon-bar sec-6-portfolio-details-6__icon-bar--v"></span>
                        </span>
                    </summary>
                    <div class="sec-6-portfolio-details-6__body">
                        <p class="fz-font-md neutral-500 mb-0">A full brand identity system covering logotype, color palette, typography, packaging, and a responsive digital toolkit — designed to scale across editorial, retail, and digital touchpoints.</p>
                    </div>
                </details>
            </li>
            <li class="sec-6-portfolio-details-6__row at_fade_anim" data-fade-from="bottom" data-delay=".15">
                <details class="sec-6-portfolio-details-6__item">
                    <summary class="sec-6-portfolio-details-6__head">
                        <span class="sec-6-portfolio-details-6__q fw-500 neutral-950">How long did the project take?</span>
                        <span class="sec-6-portfolio-details-6__icon" aria-hidden="true">
                            <span class="sec-6-portfolio-details-6__icon-bar"></span>
                            <span class="sec-6-portfolio-details-6__icon-bar sec-6-portfolio-details-6__icon-bar--v"></span>
                        </span>
                    </summary>
                    <div class="sec-6-portfolio-details-6__body">
                        <p class="fz-font-md neutral-500 mb-0">Six weeks from discovery to delivery, with two intensive sprint phases: brand concept (weeks 1-3) and asset production (weeks 4-6).</p>
                    </div>
                </details>
            </li>
            <li class="sec-6-portfolio-details-6__row at_fade_anim" data-fade-from="bottom" data-delay=".2">
                <details class="sec-6-portfolio-details-6__item">
                    <summary class="sec-6-portfolio-details-6__head">
                        <span class="sec-6-portfolio-details-6__q fw-500 neutral-950">What deliverables were included?</span>
                        <span class="sec-6-portfolio-details-6__icon" aria-hidden="true">
                            <span class="sec-6-portfolio-details-6__icon-bar"></span>
                            <span class="sec-6-portfolio-details-6__icon-bar sec-6-portfolio-details-6__icon-bar--v"></span>
                        </span>
                    </summary>
                    <div class="sec-6-portfolio-details-6__body">
                        <p class="fz-font-md neutral-500 mb-0">Brand guidelines (60-page PDF), full asset library, packaging templates, editorial layouts, responsive web prototype, and a hand-off package for internal teams.</p>
                    </div>
                </details>
            </li>
            <li class="sec-6-portfolio-details-6__row at_fade_anim" data-fade-from="bottom" data-delay=".25">
                <details class="sec-6-portfolio-details-6__item">
                    <summary class="sec-6-portfolio-details-6__head">
                        <span class="sec-6-portfolio-details-6__q fw-500 neutral-950">How is the system adapted across markets?</span>
                        <span class="sec-6-portfolio-details-6__icon" aria-hidden="true">
                            <span class="sec-6-portfolio-details-6__icon-bar"></span>
                            <span class="sec-6-portfolio-details-6__icon-bar sec-6-portfolio-details-6__icon-bar--v"></span>
                        </span>
                    </summary>
                    <div class="sec-6-portfolio-details-6__body">
                        <p class="fz-font-md neutral-500 mb-0">The wordmark stays consistent across markets while editorial tone shifts subtly: more muted in European editorial, more vibrant in North American campaigns. Typography and layout grids remain identical.</p>
                    </div>
                </details>
            </li>
            <li class="sec-6-portfolio-details-6__row at_fade_anim" data-fade-from="bottom" data-delay=".3">
                <details class="sec-6-portfolio-details-6__item">
                    <summary class="sec-6-portfolio-details-6__head">
                        <span class="sec-6-portfolio-details-6__q fw-500 neutral-950">What was the biggest design challenge?</span>
                        <span class="sec-6-portfolio-details-6__icon" aria-hidden="true">
                            <span class="sec-6-portfolio-details-6__icon-bar"></span>
                            <span class="sec-6-portfolio-details-6__icon-bar sec-6-portfolio-details-6__icon-bar--v"></span>
                        </span>
                    </summary>
                    <div class="sec-6-portfolio-details-6__body">
                        <p class="fz-font-md neutral-500 mb-0">Balancing avant-garde editorial expression with commercial accessibility — a system bold enough to stand out, refined enough to scale across packaging, retail, and digital without losing voice.</p>
                    </div>
                </details>
            </li>
        </ul>
    </div>
</section>
<?php if ($orisa_pd6_has_next) : ?>
    <section class="sec-7-portfolio-details-6 overflow-hidden pt-100 pb-100">
        <div class="container">
            <div class="text-center mb-60">
                <span class="sec-7-portfolio-details-6__eyebrow fz-font-label text-uppercase fw-600 d-block mb-15 at_fade_anim" data-fade-from="bottom" data-delay=".05">Continue reading</span>
                <h2 class="sec-7-portfolio-details-6__heading fw-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1">Next case study</h2>
            </div>
            <a href="<?php echo esc_url($next_url); ?>"<?php echo $next_target; ?> class="sec-7-portfolio-details-6__card at_fade_anim" data-fade-from="bottom" data-delay=".15">
                <div class="row g-0 align-items-stretch">
                    <?php if ($next_image) : ?>
                        <div class="col-lg-7">
                            <figure class="sec-7-portfolio-details-6__media mb-0">
                                <?php echo orisa_img($next_image, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd6_next_alt]); ?>
                            </figure>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-5">
                        <div class="sec-7-portfolio-details-6__content">
                            <?php if ($next_num) : ?>
                                <span class="sec-7-portfolio-details-6__num fz-font-label text-uppercase fw-600 d-block mb-30"><?php echo esc_html($next_num); ?></span>
                            <?php endif; ?>
                            <?php if ($next_name) : ?>
                                <h3 class="sec-7-portfolio-details-6__name fw-500 mb-30"><?php echo esc_html($next_name); ?></h3>
                            <?php endif; ?>
                            <?php if ($next_tagline) : ?>
                                <p class="sec-7-portfolio-details-6__tagline fz-font-xl fw-400 mb-30"><?php echo esc_html($next_tagline); ?></p>
                            <?php endif; ?>
                            <?php if ($next_meta) : ?>
                                <p class="sec-7-portfolio-details-6__meta fz-font-label text-uppercase fw-600 mb-30"><?php echo esc_html($next_meta); ?></p>
                            <?php endif; ?>
                            <?php if ($orisa_pd6_next_tags !== []) : ?>
                                <ul class="sec-7-portfolio-details-6__tags list-unstyled mb-50 d-flex flex-wrap gap-2">
                                    <?php foreach ($orisa_pd6_next_tags as $orisa_pd6_nt) : ?>
                                        <li class="sec-7-portfolio-details-6__tag fz-font-label text-uppercase fw-600"><?php echo esc_html($orisa_pd6_nt); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <span class="sec-7-portfolio-details-6__cta fz-font-lg fw-500">
                                View project <span aria-hidden="true">→</span>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
<?php endif; ?>
