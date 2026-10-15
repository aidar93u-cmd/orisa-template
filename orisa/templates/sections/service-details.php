<?php
defined('ABSPATH') || exit;

/**
 * Услуга детально (база: services-details-4.html, <main>: sd4-hero/practice/flow/deliver/cta/next).
 * Разметка 1:1: классы sd4-*, data-sd4-*, data-fade-from/data-delay, вложенность — дословно
 * (на них завязан services-details-4.js). Номера модулей и шагов — по порядку (01, 02…).
 * Пустые поля гасят свои теги; картинки через orisa_img(); весь вывод экранирован.
 */
orisa_flag_script('services-details-4');

$crumb_link = get_sub_field('crumb_link');
$crumb_url = is_array($crumb_link) && !empty($crumb_link['url']) ? $crumb_link['url'] : '';
$crumb_title = is_array($crumb_link) && !empty($crumb_link['title']) ? $crumb_link['title'] : '';
$crumb_target = is_array($crumb_link) && !empty($crumb_link['target']) ? ' target="' . esc_attr($crumb_link['target']) . '" rel="noopener"' : '';
$crumb_current = get_sub_field('crumb_current');
$chip = get_sub_field('chip');
$hero_title = get_sub_field('hero_title');
$hero_title_fill = get_sub_field('hero_title_fill');
$hero_lead = get_sub_field('hero_lead');
$hero_button = get_sub_field('hero_button');
$hero_btn_url = is_array($hero_button) && !empty($hero_button['url']) ? $hero_button['url'] : '';
$hero_btn_title = is_array($hero_button) && !empty($hero_button['title']) ? $hero_button['title'] : '';
$hero_btn_target = is_array($hero_button) && !empty($hero_button['target']) ? ' target="' . esc_attr($hero_button['target']) . '" rel="noopener"' : '';
$hero_ghost = get_sub_field('hero_ghost');
$practice_label = get_sub_field('practice_label');
$practice_title = get_sub_field('practice_title');
$flow_label = get_sub_field('flow_label');
$flow_title = get_sub_field('flow_title');
$deliver_image = get_sub_field('deliver_image');
$stat_label = get_sub_field('stat_label');
$stat_number = get_sub_field('stat_number');
$stat_caption = get_sub_field('stat_caption');
$deliver_label = get_sub_field('deliver_label');
$deliver_title = get_sub_field('deliver_title');
$cta_label = get_sub_field('cta_label');
$cta_title = get_sub_field('cta_title');
$cta_text = get_sub_field('cta_text');
$cta_button = get_sub_field('cta_button');
$cta_btn_url = is_array($cta_button) && !empty($cta_button['url']) ? $cta_button['url'] : '';
$cta_btn_title = is_array($cta_button) && !empty($cta_button['title']) ? $cta_button['title'] : '';
$cta_btn_target = is_array($cta_button) && !empty($cta_button['target']) ? ' target="' . esc_attr($cta_button['target']) . '" rel="noopener"' : '';

$orisa_sd_gallery = [];
if (function_exists('have_rows') && have_rows('gallery')) {
    while (have_rows('gallery')) {
        the_row();
        $orisa_sd_gi = get_sub_field('image');
        if (empty($orisa_sd_gi)) {
            continue;
        }
        $orisa_sd_gallery[] = $orisa_sd_gi;
    }
}

$orisa_sd_modules = [];
if (function_exists('have_rows') && have_rows('modules')) {
    while (have_rows('modules')) {
        the_row();
        $orisa_sd_mt = get_sub_field('title');
        $orisa_sd_md = get_sub_field('desc');
        if (!$orisa_sd_mt && !$orisa_sd_md) {
            continue;
        }
        $orisa_sd_modules[] = ['title' => $orisa_sd_mt, 'desc' => $orisa_sd_md];
    }
}

$orisa_sd_steps = [];
if (function_exists('have_rows') && have_rows('steps')) {
    while (have_rows('steps')) {
        the_row();
        $orisa_sd_st = get_sub_field('title');
        $orisa_sd_sd = get_sub_field('desc');
        if (!$orisa_sd_st && !$orisa_sd_sd) {
            continue;
        }
        $orisa_sd_steps[] = ['title' => $orisa_sd_st, 'desc' => $orisa_sd_sd];
    }
}

$orisa_sd_deliver = [];
if (function_exists('have_rows') && have_rows('deliver_items')) {
    while (have_rows('deliver_items')) {
        the_row();
        $orisa_sd_dt = get_sub_field('title');
        $orisa_sd_dd = get_sub_field('desc');
        if (!$orisa_sd_dt && !$orisa_sd_dd) {
            continue;
        }
        $orisa_sd_deliver[] = ['title' => $orisa_sd_dt, 'desc' => $orisa_sd_dd];
    }
}

$orisa_sd_next = [];
if (function_exists('have_rows') && have_rows('next_links')) {
    while (have_rows('next_links')) {
        the_row();
        $orisa_sd_nl = get_sub_field('link');
        if (!is_array($orisa_sd_nl) || empty($orisa_sd_nl['url'])) {
            continue;
        }
        $orisa_sd_next[] = $orisa_sd_nl;
    }
}

$orisa_sd_alt = $hero_title ? $hero_title : get_bloginfo('name');
$orisa_sd_has_hero = ($crumb_url || $crumb_current || $chip || $hero_title || $hero_title_fill || $hero_lead || $hero_btn_url || $hero_ghost || $orisa_sd_gallery !== []);
$orisa_sd_has_practice = ($practice_label || $practice_title || $orisa_sd_modules !== []);
$orisa_sd_has_flow = ($flow_label || $flow_title || $orisa_sd_steps !== []);
$orisa_sd_has_deliver = ($deliver_image || $stat_label || $stat_number || $stat_caption || $deliver_label || $deliver_title || $orisa_sd_deliver !== []);
$orisa_sd_has_cta = ($cta_label || $cta_title || $cta_text || $cta_btn_url || $orisa_sd_next !== []);
?>
<?php if ($orisa_sd_has_hero) : ?>
    <section class="sd4-hero pt-150 pb-60 overflow-hidden" data-sd4-hero<?php echo orisa_anchor(); ?>>
        <div class="container">
            <?php if ($crumb_url || $crumb_current || $chip) : ?>
                <div class="sd4-hero__meta at_fade_anim" data-fade-from="bottom">
                    <?php if ($crumb_url || $crumb_current) : ?>
                        <nav class="sd4-crumb" aria-label="Breadcrumb">
                            <?php if ($crumb_url) : ?>
                                <a href="<?php echo esc_url($crumb_url); ?>"<?php echo $crumb_target; ?>><?php echo esc_html($crumb_title ? $crumb_title : $crumb_url); ?></a><span>/</span>
                            <?php endif; ?>
                            <?php if ($crumb_current) : ?>
                                <span><?php echo esc_html($crumb_current); ?></span>
                            <?php endif; ?>
                        </nav>
                    <?php endif; ?>
                    <?php if ($chip) : ?>
                        <span class="sd4-chip"><?php echo esc_html($chip); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($hero_title || $hero_title_fill) : ?>
                <h1 class="sd4-hero__title">
                    <?php if ($hero_title) : ?>
                        <span class="sd4-hero__line" data-sd4-line><?php echo esc_html($hero_title); ?></span>
                    <?php endif; ?>
                    <?php if ($hero_title_fill) : ?>
                        <span class="sd4-hero__line sd4-hero__line--fill" data-sd4-line><?php echo esc_html($hero_title_fill); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>
            <?php if ($hero_lead || $hero_btn_url || $hero_ghost) : ?>
                <div class="sd4-hero__row">
                    <?php if ($hero_lead) : ?>
                        <p class="sd4-hero__lead at_fade_anim" data-fade-from="bottom" data-delay=".15"><?php echo esc_html($hero_lead); ?></p>
                    <?php endif; ?>
                    <?php if ($hero_btn_url || $hero_ghost) : ?>
                        <div class="sd4-hero__actions at_fade_anim" data-fade-from="bottom" data-delay=".22">
                            <?php if ($hero_btn_url) : ?>
                                <a class="at-btn rounded-0" href="<?php echo esc_url($hero_btn_url); ?>"<?php echo $hero_btn_target; ?>>
                                    <span><span class="text-1"><?php echo esc_html($hero_btn_title ? $hero_btn_title : $hero_btn_url); ?></span><span class="text-2"><?php echo esc_html($hero_btn_title ? $hero_btn_title : $hero_btn_url); ?></span></span>
                                    <i>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                    </i>
                                </a>
                            <?php endif; ?>
                            <?php if ($hero_ghost) : ?>
                                <a class="sd4-ghost" href="#sd4-flow"><?php echo esc_html($hero_ghost); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($orisa_sd_gallery !== []) : ?>
                <div class="sd4-hero__gallery" data-sd4-gallery>
                    <?php foreach ($orisa_sd_gallery as $orisa_sd_g) : ?>
                        <figure class="sd4-hero__fig" data-sd4-fig>
                            <?php echo orisa_img($orisa_sd_g, 'full', ['width' => 480, 'height' => 360, 'loading' => 'eager', 'alt' => $orisa_sd_alt]); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_sd_has_practice) : ?>
    <section class="sd4-practice pt-80 pb-100" data-sd4-practice>
        <div class="container">
            <?php if ($practice_label || $practice_title) : ?>
                <div class="sd4-practice__head">
                    <?php if ($practice_label) : ?>
                        <p class="sd4-label mb-15 at_fade_anim" data-fade-from="bottom"><?php echo esc_html($practice_label); ?></p>
                    <?php endif; ?>
                    <?php if ($practice_title) : ?>
                        <h2 class="sd4-practice__title reveal-text mb-0"><?php echo esc_html($practice_title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($orisa_sd_modules !== []) : ?>
                <div class="sd4-practice__grid">
                    <?php $orisa_sd_mi = 0; ?>
                    <?php foreach ($orisa_sd_modules as $orisa_sd_m) : ?>
                        <?php $orisa_sd_mi++; ?>
                        <article class="sd4-pillar" data-sd4-pillar>
                            <span class="sd4-pillar__i"><?php echo esc_html(sprintf('%02d', $orisa_sd_mi)); ?></span>
                            <?php if ($orisa_sd_m['title']) : ?>
                                <h3><?php echo esc_html($orisa_sd_m['title']); ?></h3>
                            <?php endif; ?>
                            <?php if ($orisa_sd_m['desc']) : ?>
                                <p><?php echo esc_html($orisa_sd_m['desc']); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_sd_has_flow) : ?>
    <section class="sd4-flow changeless" id="sd4-flow" data-sd4-flow>
        <div class="sd4-flow__pin">
            <div class="container">
                <?php if ($flow_label) : ?>
                    <p class="sd4-label sd4-label--light mb-15"><?php echo esc_html($flow_label); ?></p>
                <?php endif; ?>
                <?php if ($flow_title) : ?>
                    <h2 class="sd4-flow__title text-scale-anim mb-40"><?php echo esc_html($flow_title); ?></h2>
                <?php endif; ?>
            </div>
            <?php if ($orisa_sd_steps !== []) : ?>
                <div class="sd4-flow__wrap">
                    <div class="sd4-flow__progress"><i data-sd4-bar></i></div>
                    <div class="sd4-flow__track" data-sd4-track>
                        <?php $orisa_sd_si = 0; ?>
                        <?php foreach ($orisa_sd_steps as $orisa_sd_s) : ?>
                            <?php $orisa_sd_si++; ?>
                            <article class="sd4-node">
                                <span><?php echo esc_html(sprintf('%02d', $orisa_sd_si)); ?></span>
                                <?php if ($orisa_sd_s['title']) : ?>
                                    <h3><?php echo esc_html($orisa_sd_s['title']); ?></h3>
                                <?php endif; ?>
                                <?php if ($orisa_sd_s['desc']) : ?>
                                    <p><?php echo esc_html($orisa_sd_s['desc']); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_sd_has_deliver) : ?>
    <section class="sd4-deliver pt-120 pb-100" data-sd4-deliver>
        <div class="container">
            <div class="sd4-deliver__grid">
                <?php if ($deliver_image || $stat_label || $stat_number || $stat_caption) : ?>
                    <div class="sd4-deliver__media" data-sd4-deliver-media>
                        <?php if ($deliver_image) : ?>
                            <?php echo orisa_img($deliver_image, 'full', ['width' => 720, 'height' => 900, 'loading' => 'lazy', 'alt' => $orisa_sd_alt]); ?>
                        <?php endif; ?>
                        <?php if ($stat_label || $stat_number || $stat_caption) : ?>
                            <div class="sd4-deliver__float" data-sd4-float>
                                <?php if ($stat_label) : ?>
                                    <span><?php echo esc_html($stat_label); ?></span>
                                <?php endif; ?>
                                <?php if ($stat_number) : ?>
                                    <strong data-sd4-count data-to="<?php echo esc_attr((string) $stat_number); ?>">0</strong>
                                <?php endif; ?>
                                <?php if ($stat_caption) : ?>
                                    <em><?php echo esc_html($stat_caption); ?></em>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($deliver_label || $deliver_title || $orisa_sd_deliver !== []) : ?>
                    <div class="sd4-deliver__copy">
                        <?php if ($deliver_label) : ?>
                            <p class="sd4-label mb-15 at_fade_anim" data-fade-from="bottom"><?php echo esc_html($deliver_label); ?></p>
                        <?php endif; ?>
                        <?php if ($deliver_title) : ?>
                            <h2 class="sd4-deliver__title reveal-text mb-20"><?php echo esc_html($deliver_title); ?></h2>
                        <?php endif; ?>
                        <?php if ($orisa_sd_deliver !== []) : ?>
                            <ul class="sd4-deliver__list">
                                <?php foreach ($orisa_sd_deliver as $orisa_sd_d) : ?>
                                    <li data-sd4-item>
                                        <?php if ($orisa_sd_d['title']) : ?>
                                            <strong><?php echo esc_html($orisa_sd_d['title']); ?></strong>
                                        <?php endif; ?>
                                        <?php if ($orisa_sd_d['desc']) : ?>
                                            <span><?php echo esc_html($orisa_sd_d['desc']); ?></span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($orisa_sd_has_cta) : ?>
    <section class="sd4-cta pt-40 pb-120" data-sd4-cta>
        <div class="container">
            <?php if ($cta_label || $cta_title || $cta_text || $cta_btn_url) : ?>
                <div class="sd4-cta__band" data-sd4-cta-band>
                    <?php if ($cta_label || $cta_title) : ?>
                        <div>
                            <?php if ($cta_label) : ?>
                                <p class="sd4-label mb-15"><?php echo esc_html($cta_label); ?></p>
                            <?php endif; ?>
                            <?php if ($cta_title) : ?>
                                <h2 class="sd4-cta__title text-scale-anim-2 mb-0"><?php echo esc_html($cta_title); ?></h2>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($cta_text || $cta_btn_url) : ?>
                        <div class="sd4-cta__side">
                            <?php if ($cta_text) : ?>
                                <p><?php echo esc_html($cta_text); ?></p>
                            <?php endif; ?>
                            <?php if ($cta_btn_url) : ?>
                                <a class="at-btn rounded-0" href="<?php echo esc_url($cta_btn_url); ?>"<?php echo $cta_btn_target; ?>>
                                    <span><span class="text-1"><?php echo esc_html($cta_btn_title ? $cta_btn_title : $cta_btn_url); ?></span><span class="text-2"><?php echo esc_html($cta_btn_title ? $cta_btn_title : $cta_btn_url); ?></span></span>
                                    <i>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                    </i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($orisa_sd_next !== []) : ?>
                <div class="sd4-next">
                    <?php foreach ($orisa_sd_next as $orisa_sd_n) : ?>
                        <a href="<?php echo esc_url($orisa_sd_n['url']); ?>"<?php echo !empty($orisa_sd_n['target']) ? ' target="' . esc_attr($orisa_sd_n['target']) . '" rel="noopener"' : ''; ?>><?php echo esc_html(!empty($orisa_sd_n['title']) ? $orisa_sd_n['title'] : $orisa_sd_n['url']); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
