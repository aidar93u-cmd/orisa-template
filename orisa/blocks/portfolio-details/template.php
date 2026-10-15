<?php
defined('ABSPATH') || exit;

/**
 * Кейс (база: portfolio-details-4.html, <main>: sec-1…sec-5-portfolio-details-4).
 * Разметка 1:1: классы sec-*-portfolio-details-4, data-fade-from/data-delay, вложенность — дословно.
 * Слайдера в details-4 нет (swiper только в details-6, блок строится не по нему) — переносить нечего.
 * Галерея sec-4: первые 6 фото → ряды 2/1/3 (split/full/triple), остальные игнорируются.
 * Номера шагов — по порядку (01, 02…); alt картинок — из заголовков.
 * Пустые поля гасят свои теги; картинки через orisa_img(); весь вывод экранирован.
 */
$crumbs = get_sub_field('crumbs');
$title = get_sub_field('title');
$title_mark = get_sub_field('title_mark');
$tagline = get_sub_field('tagline');
$demo_link = get_sub_field('demo_link');
$demo_url = is_array($demo_link) && !empty($demo_link['url']) ? $demo_link['url'] : '';
$demo_title = is_array($demo_link) && !empty($demo_link['title']) ? $demo_link['title'] : 'View live demo';
$demo_target = is_array($demo_link) && !empty($demo_link['target']) ? ' target="' . esc_attr($demo_link['target']) . '" rel="noopener"' : '';
$quote = get_sub_field('quote');
$quote_author = get_sub_field('quote_author');
$quote_role = get_sub_field('quote_role');
$next_link = get_sub_field('next_link');
$next_url = is_array($next_link) && !empty($next_link['url']) ? $next_link['url'] : '#';
$next_target = is_array($next_link) && !empty($next_link['target']) ? ' target="' . esc_attr($next_link['target']) . '" rel="noopener"' : '';
$next_image = get_sub_field('next_image');
$next_name = get_sub_field('next_name');
$next_tagline = get_sub_field('next_tagline');
$next_meta = get_sub_field('next_meta');

$orisa_pd_tags = [];
if (function_exists('have_rows') && have_rows('tags')) {
    while (have_rows('tags')) {
        the_row();
        $orisa_pd_tag = get_sub_field('label');
        if (!$orisa_pd_tag) {
            continue;
        }
        $orisa_pd_tags[] = $orisa_pd_tag;
    }
}

$orisa_pd_meta = [];
if (function_exists('have_rows') && have_rows('meta')) {
    while (have_rows('meta')) {
        the_row();
        $orisa_pd_ml = get_sub_field('label');
        $orisa_pd_mv = get_sub_field('value');
        if (!$orisa_pd_ml && !$orisa_pd_mv) {
            continue;
        }
        $orisa_pd_meta[] = ['label' => $orisa_pd_ml, 'value' => $orisa_pd_mv];
    }
}

$orisa_pd_services = [];
if (function_exists('have_rows') && have_rows('services')) {
    while (have_rows('services')) {
        the_row();
        $orisa_pd_srv = get_sub_field('label');
        if (!$orisa_pd_srv) {
            continue;
        }
        $orisa_pd_services[] = $orisa_pd_srv;
    }
}

$orisa_pd_chapters = [];
if (function_exists('have_rows') && have_rows('chapters')) {
    while (have_rows('chapters')) {
        the_row();
        $orisa_pd_ch = [
            'num'    => get_sub_field('num'),
            'label'  => get_sub_field('label'),
            'title'  => get_sub_field('title'),
            'body'   => get_sub_field('body'),
            'quote'  => get_sub_field('quote'),
            'images' => [],
            'steps'  => [],
            'stats'  => [],
        ];
        if (have_rows('images')) {
            while (have_rows('images')) {
                the_row();
                $orisa_pd_ci = get_sub_field('image');
                if (empty($orisa_pd_ci)) {
                    continue;
                }
                $orisa_pd_ch['images'][] = $orisa_pd_ci;
            }
        }
        if (have_rows('steps')) {
            while (have_rows('steps')) {
                the_row();
                $orisa_pd_st = get_sub_field('title');
                $orisa_pd_sd = get_sub_field('desc');
                if (!$orisa_pd_st && !$orisa_pd_sd) {
                    continue;
                }
                $orisa_pd_ch['steps'][] = ['title' => $orisa_pd_st, 'desc' => $orisa_pd_sd];
            }
        }
        if (have_rows('stats')) {
            while (have_rows('stats')) {
                the_row();
                $orisa_pd_sn = get_sub_field('num');
                $orisa_pd_sl = get_sub_field('label');
                if (!$orisa_pd_sn && !$orisa_pd_sl) {
                    continue;
                }
                $orisa_pd_ch['stats'][] = ['num' => $orisa_pd_sn, 'label' => $orisa_pd_sl];
            }
        }
        if (!$orisa_pd_ch['num'] && !$orisa_pd_ch['label'] && !$orisa_pd_ch['title'] && !$orisa_pd_ch['body'] && !$orisa_pd_ch['quote'] && $orisa_pd_ch['images'] === [] && $orisa_pd_ch['steps'] === [] && $orisa_pd_ch['stats'] === []) {
            continue;
        }
        $orisa_pd_chapters[] = $orisa_pd_ch;
    }
}

$orisa_pd_gallery = [];
if (function_exists('have_rows') && have_rows('gallery')) {
    while (have_rows('gallery')) {
        the_row();
        $orisa_pd_gi = get_sub_field('image');
        if (empty($orisa_pd_gi)) {
            continue;
        }
        $orisa_pd_gallery[] = $orisa_pd_gi;
    }
}

// ponytail: первые 6 фото → ряды 2/1/3, остальные игнорируются (в оригинале ровно 6).
$orisa_pd_row1 = array_slice($orisa_pd_gallery, 0, 2);
$orisa_pd_row2 = array_slice($orisa_pd_gallery, 2, 1);
$orisa_pd_row3 = array_slice($orisa_pd_gallery, 3, 3);

$orisa_pd_alt = $title ? $title : get_bloginfo('name');
$orisa_pd_has_sidebar = ($orisa_pd_meta !== [] || $orisa_pd_services !== [] || $demo_url !== '');
$orisa_pd_has_next = ($next_url !== '#' || $next_image || $next_name || $next_tagline || $next_meta);
?>
<?php if ($crumbs || $title || $title_mark || $tagline || $orisa_pd_tags !== [] || $demo_url !== '') : ?>
    <section class="sec-1-portfolio-details-4 overflow-hidden pt-150 pb-60"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <div class="row align-items-end mb-60">
                <div class="col-lg-10">
                    <?php if ($crumbs) : ?>
                        <nav class="sec-1-portfolio-details-4__crumbs fz-font-label text-uppercase fw-600 neutral-500 mb-30 at_fade_anim" data-fade-from="left" data-delay=".05" aria-label="Breadcrumb">
                            <?php echo esc_html($crumbs); ?>
                        </nav>
                    <?php endif; ?>
                    <?php if ($title || $title_mark) : ?>
                        <h1 class="sec-1-portfolio-details-4__title fz-ds-1 lh-1 fw-500 d-flex mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".1"><?php echo esc_html($title); ?><?php if ($title_mark) : ?><sup class="fz-80 fw-400 top-0"><?php echo esc_html($title_mark); ?></sup><?php endif; ?></h1>
                    <?php endif; ?>
                    <?php if ($tagline) : ?>
                        <p class="sec-1-portfolio-details-4__tagline fz-font-2xl fw-400 neutral-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".2"><?php echo esc_html($tagline); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($orisa_pd_tags !== [] || $demo_url !== '') : ?>
                <div class="row align-items-center sec-1-portfolio-details-4__bottom">
                    <?php if ($orisa_pd_tags !== []) : ?>
                        <div class="col-md-9">
                            <ul class="sec-1-portfolio-details-4__tags list-unstyled mb-0 d-flex flex-wrap gap-2 at_fade_anim" data-fade-from="bottom" data-delay=".3">
                                <?php foreach ($orisa_pd_tags as $orisa_pd_tag) : ?>
                                    <li class="sec-1-portfolio-details-4__tag fz-font-label text-uppercase fw-600"><?php echo esc_html($orisa_pd_tag); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if ($demo_url !== '') : ?>
                        <div class="col-md-3 text-md-end mt-3 mt-md-0">
                            <a href="<?php echo esc_url($demo_url); ?>"<?php echo $demo_target; ?> class="sec-1-portfolio-details-4__demo fz-font-md fw-500 neutral-950 at_fade_anim" data-fade-from="right" data-delay=".4">
                                <?php echo esc_html($demo_title); ?> <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="border-bottom-100 mt-50"></div>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_pd_has_sidebar || $orisa_pd_chapters !== []) : ?>
    <section class="sec-2-portfolio-details-4 overflow-hidden pt-100 pb-100">
        <div class="container">
            <div class="row sec-2-portfolio-details-4__row">
                <?php if ($orisa_pd_has_sidebar) : ?>
                    <aside class="col-lg-4 sec-2-portfolio-details-4__sidebar-col">
                        <div class="sec-2-portfolio-details-4__sidebar at_fade_anim" data-fade-from="left" data-delay=".1">
                            <?php if ($orisa_pd_meta !== []) : ?>
                                <span class="sec-2-portfolio-details-4__sidebar-eyebrow d-block fz-font-label text-uppercase fw-600 neutral-500">Project info</span>
                                <dl class="sec-2-portfolio-details-4__meta mb-0">
                                    <?php foreach ($orisa_pd_meta as $orisa_pd_m) : ?>
                                        <div class="sec-2-portfolio-details-4__meta-row">
                                            <?php if ($orisa_pd_m['label']) : ?>
                                                <dt class="fz-font-md neutral-500 fw-400"><?php echo esc_html($orisa_pd_m['label']); ?></dt>
                                            <?php endif; ?>
                                            <?php if ($orisa_pd_m['value']) : ?>
                                                <dd class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($orisa_pd_m['value']); ?></dd>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </dl>
                            <?php endif; ?>
                            <?php if ($orisa_pd_services !== []) : ?>
                                <span class="sec-2-portfolio-details-4__sidebar-eyebrow d-block fz-font-label text-uppercase fw-600 neutral-500 mt-30 mb-15">Services</span>
                                <ul class="sec-2-portfolio-details-4__services list-unstyled mb-30">
                                    <?php foreach ($orisa_pd_services as $orisa_pd_srv) : ?>
                                        <li><?php echo esc_html($orisa_pd_srv); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if ($demo_url !== '') : ?>
                                <a href="<?php echo esc_url($demo_url); ?>"<?php echo $demo_target; ?> class="sec-2-portfolio-details-4__cta d-inline-flex justify-content-center align-items-center gap-2 w-100 fz-font-md fw-500">
                                    <?php echo esc_html($demo_title); ?> <span aria-hidden="true">→</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </aside>
                <?php endif; ?>
                <?php if ($orisa_pd_chapters !== []) : ?>
                    <div class="col-lg-8 sec-2-portfolio-details-4__content-col">
                        <?php foreach ($orisa_pd_chapters as $orisa_pd_ch) : ?>
                            <?php $orisa_pd_ch_alt = $orisa_pd_ch['title'] ? $orisa_pd_ch['title'] : $orisa_pd_alt; ?>
                            <article class="sec-2-portfolio-details-4__chapter">
                                <?php if ($orisa_pd_ch['num'] || $orisa_pd_ch['label']) : ?>
                                    <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                        <?php if ($orisa_pd_ch['num']) : ?>
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600"><?php echo esc_html($orisa_pd_ch['num']); ?></span>
                                        <?php endif; ?>
                                        <?php if ($orisa_pd_ch['label']) : ?>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500"><?php echo esc_html($orisa_pd_ch['label']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['title']) : ?>
                                    <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1"><?php echo esc_html($orisa_pd_ch['title']); ?></h2>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['body']) : ?>
                                    <p class="sec-2-portfolio-details-4__chapter-body fz-font-md neutral-500 at_fade_anim" data-fade-from="bottom" data-delay=".15"><?php echo esc_html($orisa_pd_ch['body']); ?></p>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['images'] !== []) : ?>
                                    <div class="sec-2-portfolio-details-4__inline-grid">
                                        <?php foreach ($orisa_pd_ch['images'] as $orisa_pd_ci) : ?>
                                            <figure class="sec-2-portfolio-details-4__inline-fig">
                                                <?php echo orisa_img($orisa_pd_ci, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd_ch_alt]); ?>
                                            </figure>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['quote']) : ?>
                                    <blockquote class="sec-2-portfolio-details-4__pull-quote at_fade_anim" data-fade-from="bottom" data-delay=".2">
                                        <p class="fz-font-2xl fw-500 neutral-950 mb-0"><?php echo esc_html($orisa_pd_ch['quote']); ?></p>
                                    </blockquote>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['steps'] !== []) : ?>
                                    <ol class="sec-2-portfolio-details-4__steps list-unstyled mb-0">
                                        <?php $orisa_pd_si = 0; ?>
                                        <?php foreach ($orisa_pd_ch['steps'] as $orisa_pd_step) : ?>
                                            <?php $orisa_pd_sdelay = rtrim(ltrim(number_format(0.1 + $orisa_pd_si * 0.05, 2, '.', ''), '0'), '0'); ?>
                                            <li class="sec-2-portfolio-details-4__step at_fade_anim" data-fade-from="bottom" data-delay="<?php echo esc_attr($orisa_pd_sdelay); ?>">
                                                <span class="sec-2-portfolio-details-4__step-num fz-font-md fw-500"><?php echo esc_html(sprintf('%02d', $orisa_pd_si + 1)); ?></span>
                                                <?php if ($orisa_pd_step['title']) : ?>
                                                    <h3 class="sec-2-portfolio-details-4__step-title fz-font-xl fw-500 neutral-950 mb-0"><?php echo esc_html($orisa_pd_step['title']); ?></h3>
                                                <?php endif; ?>
                                                <?php if ($orisa_pd_step['desc']) : ?>
                                                    <p class="sec-2-portfolio-details-4__step-desc fz-font-md neutral-500 mb-0"><?php echo esc_html($orisa_pd_step['desc']); ?></p>
                                                <?php endif; ?>
                                            </li>
                                            <?php $orisa_pd_si++; ?>
                                        <?php endforeach; ?>
                                    </ol>
                                <?php endif; ?>
                                <?php if ($orisa_pd_ch['stats'] !== []) : ?>
                                    <ul class="sec-2-portfolio-details-4__stats list-unstyled mb-0">
                                        <?php $orisa_pd_ti = 0; ?>
                                        <?php foreach ($orisa_pd_ch['stats'] as $orisa_pd_stat) : ?>
                                            <?php $orisa_pd_tdelay = rtrim(ltrim(number_format(0.1 + $orisa_pd_ti * 0.1, 2, '.', ''), '0'), '0'); ?>
                                            <li class="sec-2-portfolio-details-4__stat at_fade_anim" data-fade-from="bottom" data-delay="<?php echo esc_attr($orisa_pd_tdelay); ?>">
                                                <?php if ($orisa_pd_stat['num']) : ?>
                                                    <span class="sec-2-portfolio-details-4__stat-num d-block fw-500 neutral-950 lh-1"><?php echo esc_html($orisa_pd_stat['num']); ?></span>
                                                <?php endif; ?>
                                                <?php if ($orisa_pd_stat['label']) : ?>
                                                    <span class="sec-2-portfolio-details-4__stat-label d-block fz-font-md neutral-500"><?php echo esc_html($orisa_pd_stat['label']); ?></span>
                                                <?php endif; ?>
                                            </li>
                                            <?php $orisa_pd_ti++; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($quote || $quote_author || $quote_role) : ?>
    <section class="sec-3-portfolio-details-4 overflow-hidden pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8 text-center">
                    <span class="sec-3-portfolio-details-4__mark at_fade_anim" data-fade-from="bottom" data-delay=".05" aria-hidden="true">&ldquo;</span>
                    <?php if ($quote) : ?>
                        <blockquote class="sec-3-portfolio-details-4__quote fw-500 neutral-950 mb-50 at_fade_anim" data-fade-from="bottom" data-delay=".15">
                            <?php echo esc_html($quote); ?>
                        </blockquote>
                    <?php endif; ?>
                    <span class="sec-3-portfolio-details-4__divider d-inline-block" aria-hidden="true"></span>
                    <?php if ($quote_author) : ?>
                        <p class="sec-3-portfolio-details-4__author fz-font-lg fw-500 neutral-950 mb-1 mt-30 at_fade_anim" data-fade-from="bottom" data-delay=".3"><?php echo esc_html($quote_author); ?></p>
                    <?php endif; ?>
                    <?php if ($quote_role) : ?>
                        <p class="sec-3-portfolio-details-4__role fz-font-label text-uppercase fw-600 neutral-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".4"><?php echo esc_html($quote_role); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_pd_gallery !== []) : ?>
    <section class="sec-4-portfolio-details-4 overflow-hidden pt-80 pb-80">
        <div class="container">
            <?php if ($orisa_pd_row1 !== []) : ?>
                <div class="sec-4-portfolio-details-4__row sec-4-portfolio-details-4__row--split">
                    <?php $orisa_pd_c = 0; ?>
                    <?php foreach ($orisa_pd_row1 as $orisa_pd_g) : ?>
                        <?php $orisa_pd_c++; ?>
                        <figure class="sec-4-portfolio-details-4__cell sec-4-portfolio-details-4__cell--<?php echo $orisa_pd_c === 1 ? 'wide' : 'narrow'; ?>">
                            <?php echo orisa_img($orisa_pd_g, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd_alt]); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($orisa_pd_row2 !== []) : ?>
                <div class="sec-4-portfolio-details-4__row sec-4-portfolio-details-4__row--full">
                    <?php foreach ($orisa_pd_row2 as $orisa_pd_g) : ?>
                        <figure class="sec-4-portfolio-details-4__cell sec-4-portfolio-details-4__cell--full">
                            <?php echo orisa_img($orisa_pd_g, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd_alt]); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($orisa_pd_row3 !== []) : ?>
                <div class="sec-4-portfolio-details-4__row sec-4-portfolio-details-4__row--triple">
                    <?php foreach ($orisa_pd_row3 as $orisa_pd_g) : ?>
                        <figure class="sec-4-portfolio-details-4__cell">
                            <?php echo orisa_img($orisa_pd_g, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $orisa_pd_alt]); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_pd_has_next) : ?>
    <section class="sec-5-portfolio-details-4 overflow-hidden">
        <a href="<?php echo esc_url($next_url); ?>"<?php echo $next_target; ?> class="sec-5-portfolio-details-4__link d-block">
            <?php if ($next_image) : ?>
                <div class="sec-5-portfolio-details-4__media">
                    <?php echo orisa_img($next_image, 'full', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'alt' => $next_name ? $next_name : get_bloginfo('name')]); ?>
                    <span class="sec-5-portfolio-details-4__veil" aria-hidden="true"></span>
                </div>
            <?php endif; ?>
            <div class="sec-5-portfolio-details-4__content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <span class="sec-5-portfolio-details-4__eyebrow fz-font-label text-uppercase fw-600 d-inline-flex align-items-center gap-2 at_fade_anim" data-fade-from="left" data-delay=".05">
                                Next project <span aria-hidden="true">→</span>
                            </span>
                            <?php if ($next_name) : ?>
                                <h2 class="sec-5-portfolio-details-4__name fw-500 mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".15"><?php echo esc_html($next_name); ?></h2>
                            <?php endif; ?>
                            <?php if ($next_tagline) : ?>
                                <p class="sec-5-portfolio-details-4__tagline fz-font-2xl fw-400 mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".25"><?php echo esc_html($next_tagline); ?></p>
                            <?php endif; ?>
                            <?php if ($next_meta) : ?>
                                <p class="sec-5-portfolio-details-4__meta fz-font-label text-uppercase fw-600 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".35"><?php echo esc_html($next_meta); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 d-none d-lg-flex justify-content-end at_fade_anim" data-fade-from="right" data-delay=".2">
                            <span class="sec-5-portfolio-details-4__disk" aria-hidden="true">
                                <span class="sec-5-portfolio-details-4__disk-inner">
                                    <svg width="56" height="56" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </section>
<?php endif; ?>
