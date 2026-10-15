<?php
defined('ABSPATH') || exit;

/**
 * Страница одного дела (CPT project) по мотивам portfolio-details-4.html.
 * Фиксированные секции, данные — из полей проекта.
 * СТРОГО: номер дела, ФИО клиента и документы (служебная группа полей)
 * здесь НЕ выводятся — только админка.
 */
get_header();

$p_id = get_the_ID();
$service = function_exists('get_field') ? (string) get_field('service', $p_id) : '';
$debt_amount = function_exists('get_field') ? get_field('debt_amount', $p_id) : '';
$amount = function_exists('get_field') ? get_field('amount', $p_id) : '';
$duration = function_exists('get_field') ? (string) get_field('duration', $p_id) : '';
$situation = function_exists('get_field') ? (string) get_field('situation', $p_id) : '';
$result = function_exists('get_field') ? (string) get_field('result', $p_id) : '';
$result_text = function_exists('get_field') ? (string) get_field('result_text', $p_id) : '';
$nuance = function_exists('get_field') ? (string) get_field('nuance', $p_id) : '';
$quote = function_exists('get_field') ? (string) get_field('quote', $p_id) : '';
$quote_author = function_exists('get_field') ? (string) get_field('quote_author', $p_id) : '';

$debt_items = [];
if (function_exists('have_rows') && have_rows('debt_items', $p_id)) {
    while (have_rows('debt_items', $p_id)) {
        the_row();
        $di_label = get_sub_field('label');
        $di_sum = get_sub_field('sum');
        if (($di_label === '' || $di_label === null) && ($di_sum === '' || $di_sum === null)) {
            continue;
        }
        $debt_items[] = ['label' => (string) $di_label, 'sum' => $di_sum];
    }
}
$work_steps = [];
if (function_exists('have_rows') && have_rows('work_steps', $p_id)) {
    while (have_rows('work_steps', $p_id)) {
        the_row();
        $ws_t = get_sub_field('title');
        $ws_x = get_sub_field('text');
        if (($ws_t === '' || $ws_t === null) && ($ws_x === '' || $ws_x === null)) {
            continue;
        }
        $work_steps[] = ['title' => (string) $ws_t, 'text' => (string) $ws_x];
    }
}
$timeline = [];
if (function_exists('have_rows') && have_rows('timeline', $p_id)) {
    while (have_rows('timeline', $p_id)) {
        the_row();
        $tl_m = get_sub_field('month');
        $tl_e = get_sub_field('event');
        if (($tl_m === '' || $tl_m === null) && ($tl_e === '' || $tl_e === null)) {
            continue;
        }
        $timeline[] = ['month' => (string) $tl_m, 'event' => (string) $tl_e];
    }
}

$fmt = function ($n) {
    return is_numeric($n) ? number_format((float) $n, 0, '', ' ') . ' ₽' : '';
};
$h1 = $amount !== '' && $amount !== null ? 'Списано ' . $fmt($amount) . ' долгов через процедуру банкротства' : get_the_title();
$ch = 0;
$orisa_pt_terms = function_exists('get_the_terms') ? get_the_terms($p_id, 'project_type') : false;
$orisa_pt_names = [];
if (is_array($orisa_pt_terms) && $orisa_pt_terms !== []) {
    foreach ($orisa_pt_terms as $orisa_pt_t) {
        $orisa_pt_names[] = $orisa_pt_t->name;
    }
} elseif ($service !== '') {
    $orisa_pt_names[] = $service;
}
?>
                <!-- sec-1: первый экран — результат дела -->
                <section class="sec-1-portfolio-details-4 overflow-hidden pt-150 pb-60">
                    <div class="container">
                        <div class="row align-items-end mb-60">
                            <div class="col-lg-10">
                                <nav class="sec-1-portfolio-details-4__crumbs fz-font-label text-uppercase fw-600 neutral-500 mb-30 at_fade_anim" data-fade-from="left" data-delay=".05" aria-label="Breadcrumb">
                                    <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>">Кейсы</a><?php if ($service !== '') : ?> <span aria-hidden="true">/</span> <?php echo esc_html($service); ?><?php endif; ?>
                                </nav>
                                <h1 class="sec-1-portfolio-details-4__title fz-ds-1 lh-1 fw-500 d-flex mb-30 at_fade_anim" data-fade-from="bottom" data-delay=".1">
                                    <?php echo esc_html($h1); ?>
                                </h1>
                                <?php if ($result !== '') : ?>
                                    <p class="sec-1-portfolio-details-4__tagline fz-font-2xl fw-400 neutral-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".2"><?php echo esc_html($result); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row align-items-center sec-1-portfolio-details-4__bottom">
                            <div class="col-md-9">
                                <ul class="sec-1-portfolio-details-4__tags list-unstyled mb-0 d-flex flex-wrap gap-2 at_fade_anim" data-fade-from="bottom" data-delay=".3">
                                    <?php foreach ($orisa_pt_names as $orisa_pt_n) : ?><li class="sec-1-portfolio-details-4__tag fz-font-label text-uppercase fw-600"><?php echo esc_html($orisa_pt_n); ?></li><?php endforeach; ?>
                                    <?php if ($duration !== '') : ?><li class="sec-1-portfolio-details-4__tag fz-font-label text-uppercase fw-600"><?php echo esc_html($duration); ?></li><?php endif; ?>
                                    <li class="sec-1-portfolio-details-4__tag fz-font-label text-uppercase fw-600">Завершённое дело</li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-md-end mt-3 mt-md-0">
                                <a href="#project-cta" class="sec-1-portfolio-details-4__demo fz-font-md fw-500 neutral-950 at_fade_anim" data-fade-from="right" data-delay=".4">
                                    Разобрать мою ситуацию <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>
                        <div class="border-bottom-100 mt-50"></div>
                    </div>
                </section>

                <!-- sec-2: разбор дела -->
                <section class="sec-2-portfolio-details-4 overflow-hidden pt-100 pb-100">
                    <div class="container">
                        <div class="row sec-2-portfolio-details-4__row">

                            <!-- LEFT: Sticky sidebar -->
                            <aside class="col-lg-4 sec-2-portfolio-details-4__sidebar-col">
                                <div class="sec-2-portfolio-details-4__sidebar at_fade_anim" data-fade-from="left" data-delay=".1">
                                    <span class="sec-2-portfolio-details-4__sidebar-eyebrow d-block fz-font-label text-uppercase fw-600 neutral-500">Дело в цифрах</span>
                                    <dl class="sec-2-portfolio-details-4__meta mb-0">
                                        <?php if ($fmt($debt_amount) !== '') : ?>
                                            <div class="sec-2-portfolio-details-4__meta-row">
                                                <dt class="fz-font-md neutral-500 fw-400">Сумма долга</dt>
                                                <dd class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($fmt($debt_amount)); ?></dd>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($fmt($amount) !== '') : ?>
                                            <div class="sec-2-portfolio-details-4__meta-row">
                                                <dt class="fz-font-md neutral-500 fw-400">Списано</dt>
                                                <dd class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($fmt($amount)); ?></dd>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($duration !== '') : ?>
                                            <div class="sec-2-portfolio-details-4__meta-row">
                                                <dt class="fz-font-md neutral-500 fw-400">Срок процедуры</dt>
                                                <dd class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($duration); ?></dd>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($service !== '') : ?>
                                            <div class="sec-2-portfolio-details-4__meta-row">
                                                <dt class="fz-font-md neutral-500 fw-400">Сфера</dt>
                                                <dd class="fz-font-md fw-500 neutral-950 mb-0"><?php echo esc_html($service); ?></dd>
                                            </div>
                                        <?php endif; ?>
                                    </dl>

                                    <a href="#project-cta" class="sec-2-portfolio-details-4__cta d-inline-flex justify-content-center align-items-center gap-2 w-100 fz-font-md fw-500">
                                        Разобрать мою ситуацию <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </aside>

                            <!-- RIGHT: chapters -->
                            <div class="col-lg-8 sec-2-portfolio-details-4__content-col">

                                <?php if ($situation !== '') : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Ситуация</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">С какой проблемой обратился клиент</h2>
                                        <p class="sec-2-portfolio-details-4__chapter-body fz-font-md neutral-500 at_fade_anim" data-fade-from="bottom" data-delay=".15"><?php echo esc_html($situation); ?></p>
                                    </article>
                                <?php endif; ?>

                                <?php if ($debt_items !== []) : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Состав долга</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">Из чего складывалась задолженность</h2>
                                        <ul class="sec-2-portfolio-details-4__stats list-unstyled mb-0">
                                            <?php foreach ($debt_items as $orisa_di) : ?>
                                                <li class="sec-2-portfolio-details-4__stat at_fade_anim" data-fade-from="bottom" data-delay=".1">
                                                    <span class="sec-2-portfolio-details-4__stat-num d-block fw-500 neutral-950 lh-1"><?php echo esc_html($fmt($orisa_di['sum']) !== '' ? $fmt($orisa_di['sum']) : $orisa_di['label']); ?></span>
                                                    <span class="sec-2-portfolio-details-4__stat-label d-block fz-font-md neutral-500"><?php echo esc_html($orisa_di['label']); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </article>
                                <?php endif; ?>

                                <?php if ($work_steps !== []) : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Работа юристов</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">Что мы сделали по делу</h2>
                                        <ol class="sec-2-portfolio-details-4__steps list-unstyled mb-0">
                                            <?php $orisa_ws_i = 0; ?>
                                            <?php foreach ($work_steps as $orisa_ws) : $orisa_ws_i++; ?>
                                                <li class="sec-2-portfolio-details-4__step at_fade_anim" data-fade-from="bottom" data-delay=".1">
                                                    <span class="sec-2-portfolio-details-4__step-num fz-font-md fw-500"><?php echo esc_html(sprintf('%02d', $orisa_ws_i)); ?></span>
                                                    <?php if ($orisa_ws['title'] !== '') : ?><h3 class="sec-2-portfolio-details-4__step-title fz-font-xl fw-500 neutral-950 mb-0"><?php echo esc_html($orisa_ws['title']); ?></h3><?php endif; ?>
                                                    <?php if ($orisa_ws['text'] !== '') : ?><p class="sec-2-portfolio-details-4__step-desc fz-font-md neutral-500 mb-0"><?php echo esc_html($orisa_ws['text']); ?></p><?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </article>
                                <?php endif; ?>

                                <?php if ($timeline !== []) : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Ход процедуры</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">Как проходила процедура</h2>
                                        <ol class="sec-2-portfolio-details-4__steps list-unstyled mb-0">
                                            <?php foreach ($timeline as $orisa_tl) : ?>
                                                <li class="sec-2-portfolio-details-4__step at_fade_anim" data-fade-from="bottom" data-delay=".1">
                                                    <?php if ($orisa_tl['month'] !== '') : ?><span class="sec-2-portfolio-details-4__step-num fz-font-md fw-500"><?php echo esc_html($orisa_tl['month']); ?></span><?php endif; ?>
                                                    <?php if ($orisa_tl['event'] !== '') : ?><p class="sec-2-portfolio-details-4__step-desc fz-font-md neutral-500 mb-0"><?php echo esc_html($orisa_tl['event']); ?></p><?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </article>
                                <?php endif; ?>

                                <?php if ($result_text !== '' || $fmt($amount) !== '') : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Итог</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">Чем закончилось дело</h2>
                                        <?php if ($result_text !== '') : ?>
                                            <p class="sec-2-portfolio-details-4__chapter-body fz-font-md neutral-500 at_fade_anim" data-fade-from="bottom" data-delay=".15"><?php echo esc_html($result_text); ?></p>
                                        <?php endif; ?>
                                        <ul class="sec-2-portfolio-details-4__stats list-unstyled mb-0">
                                            <?php if ($fmt($amount) !== '') : ?>
                                                <li class="sec-2-portfolio-details-4__stat at_fade_anim" data-fade-from="bottom" data-delay=".1">
                                                    <span class="sec-2-portfolio-details-4__stat-num d-block fw-500 neutral-950 lh-1"><?php echo esc_html($fmt($amount)); ?></span>
                                                    <span class="sec-2-portfolio-details-4__stat-label d-block fz-font-md neutral-500">Списано</span>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($duration !== '') : ?>
                                                <li class="sec-2-portfolio-details-4__stat at_fade_anim" data-fade-from="bottom" data-delay=".2">
                                                    <span class="sec-2-portfolio-details-4__stat-num d-block fw-500 neutral-950 lh-1"><?php echo esc_html($duration); ?></span>
                                                    <span class="sec-2-portfolio-details-4__stat-label d-block fz-font-md neutral-500">Срок процедуры</span>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </article>
                                <?php endif; ?>

                                <?php if ($nuance !== '') : $ch++; ?>
                                    <article class="sec-2-portfolio-details-4__chapter">
                                        <div class="sec-2-portfolio-details-4__chapter-head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                                            <span class="sec-2-portfolio-details-4__chapter-num fz-font-label text-uppercase fw-600">Раздел <?php echo esc_html(sprintf('%02d', $ch)); ?></span>
                                            <span class="sec-2-portfolio-details-4__chapter-label fz-font-label text-uppercase fw-600 neutral-500">— Нюанс</span>
                                        </div>
                                        <h2 class="sec-2-portfolio-details-4__chapter-title fw-500 neutral-950 at_fade_anim" data-fade-from="bottom" data-delay=".1">Что важно знать о результате</h2>
                                        <blockquote class="sec-2-portfolio-details-4__pull-quote at_fade_anim" data-fade-from="bottom" data-delay=".2">
                                            <p class="fz-font-2xl fw-500 neutral-950 mb-0">&ldquo;<?php echo esc_html($nuance); ?>&rdquo;</p>
                                        </blockquote>
                                        <p class="sec-2-portfolio-details-4__chapter-body fz-font-md neutral-500 at_fade_anim" data-fade-from="bottom" data-delay=".25">Результат конкретного дела не означает, что в похожей ситуации будет принято такое же решение. Признание банкротом и освобождение от долгов — разные правовые последствия.</p>
                                    </article>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </section>

                <?php if ($quote !== '') : ?>
                    <section class="sec-3-portfolio-details-4 overflow-hidden pt-100 pb-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-xl-8 text-center">
                                    <span class="sec-3-portfolio-details-4__mark at_fade_anim" data-fade-from="bottom" data-delay=".05" aria-hidden="true">&ldquo;</span>
                                    <blockquote class="sec-3-portfolio-details-4__quote fw-500 neutral-950 mb-50 at_fade_anim" data-fade-from="bottom" data-delay=".15">
                                        <?php echo esc_html($quote); ?>
                                    </blockquote>
                                    <span class="sec-3-portfolio-details-4__divider d-inline-block" aria-hidden="true"></span>
                                    <?php if ($quote_author !== '') : ?>
                                        <p class="sec-3-portfolio-details-4__author fz-font-lg fw-500 neutral-950 mb-1 mt-30 at_fade_anim" data-fade-from="bottom" data-delay=".3"><?php echo esc_html($quote_author); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <?php
                $orisa_rel_args = [
                    'post_type'      => 'project',
                    'posts_per_page' => 3,
                    'post__not_in'   => [$p_id],
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'no_found_rows'  => true,
                ];
                $orisa_rel_ids = function_exists('wp_get_post_terms') ? wp_get_post_terms($p_id, 'project_type', ['fields' => 'ids']) : [];
                if (is_array($orisa_rel_ids) && $orisa_rel_ids !== []) {
                    $orisa_rel_args['tax_query'] = [['taxonomy' => 'project_type', 'terms' => $orisa_rel_ids]];
                }
                $orisa_rel = new WP_Query($orisa_rel_args);
                ?>
                <?php if ($orisa_rel->have_posts()) : ?>
                    <section class="sec-4-portfolio-details-4 overflow-hidden pt-80 pb-80">
                        <div class="container">
                            <div class="row g-4">
                                <div class="col-12">
                                    <h2 class="reveal-text mb-40">Похожие дела</h2>
                                </div>
                                <?php while ($orisa_rel->have_posts()) : $orisa_rel->the_post(); ?>
                                    <?php $orisa_rel_amount = function_exists('get_field') ? get_field('amount', get_the_ID()) : ''; ?>
                                    <div class="col-lg-4">
                                        <div class="card_case__studies-card card_case__studies-card--overlay bg-neutral-100">
                                            <div class="card_case__studies-footer mt-10 bg-neutral-0">
                                                <h4 class="h5 card_case__studies-footer-title neutral-900">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <?php if (is_numeric($orisa_rel_amount)) : ?>
                                                    <p class="fz-font-lg neutral-500 mb-10">Списано <?php echo esc_html($fmt($orisa_rel_amount)); ?></p>
                                                <?php endif; ?>
                                                <a href="<?php the_permalink(); ?>" class="card_case__studies-link neutral-900">
                                                    <span class="neutral-900">РАЗОБРАТЬ ДЕЛО</span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <?php
                $orisa_cta_form = function_exists('get_field') ? (string) get_field('project_cta_form', 'option') : '';
                $orisa_cta_phone = function_exists('get_field') ? (string) get_field('phone', 'option') : '';
                $orisa_cta_wa = function_exists('get_field') ? (string) get_field('whatsapp_url', 'option') : '';
                $orisa_cta_tg = function_exists('get_field') ? (string) get_field('soc_telegram', 'option') : '';
                ?>
                <section id="project-cta" class="sec-6-home-1 mx-lg-3 mx-2 bg-black pt-100 pb-100 rounded-5 changeless overflow-hidden">
                    <div class="container">
                        <div class="row g-4 align-items-start">
                            <div class="col-lg-6">
                                <h2 class="alt-section-title lh-1 mb-10 reveal-text text-white">Есть похожая ситуация?</h2>
                                <p class="mg-portfolio-dec mb-50 text-white mb-0">Разберём вашу ситуацию, оценим документы и объясним, какие законные варианты решения доступны в вашем случае.</p>
                                <div class="d-flex flex-wrap gap-3">
                                    <?php if ($orisa_cta_phone !== '') : ?>
                                        <a class="at-btn" href="<?php echo esc_attr(str_starts_with($orisa_cta_phone, 'tel:') ? $orisa_cta_phone : 'tel:' . preg_replace('/[^+\d]/', '', $orisa_cta_phone)); ?>"><?php echo esc_html($orisa_cta_phone); ?></a>
                                    <?php endif; ?>
                                    <?php if ($orisa_cta_wa !== '') : ?>
                                        <a class="at-btn" href="<?php echo esc_url($orisa_cta_wa); ?>" target="_blank" rel="noopener">WhatsApp <?php echo orisa_soc_icon('whatsapp', 16); ?></a>
                                    <?php endif; ?>
                                    <?php if ($orisa_cta_tg !== '') : ?>
                                        <a class="at-btn" href="<?php echo esc_url($orisa_cta_tg); ?>" target="_blank" rel="noopener">Telegram <?php echo orisa_soc_icon('telegram', 16); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($orisa_cta_form !== '') : ?>
                                <div class="col-lg-6">
                                    <?php echo do_shortcode($orisa_cta_form); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

<?php
get_footer();
