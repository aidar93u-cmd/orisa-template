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
$sit_images = function_exists('get_field') ? get_field('situation_images', $p_id) : '';
if (!is_array($sit_images)) {
    $sit_images = [];
}
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
                                        <?php if ($sit_images !== []) : ?>
                                            <div class="sec-2-portfolio-details-4__inline-grid">
                                                <?php foreach (array_slice($sit_images, 0, 2) as $orisa_si) : ?>
                                                    <figure class="sec-2-portfolio-details-4__inline-fig">
                                                        <?php echo orisa_img((int) $orisa_si, 'full', ['class' => 'anim-zoomin', 'alt' => 'Иллюстрация к делу', 'loading' => 'lazy']); ?>
                                                    </figure>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
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
                $orisa_cta_form = function_exists('get_field') ? (string) get_field('project_cta_form', 'option') : '';
                $orisa_cta_phone = function_exists('get_field') ? (string) get_field('phone', 'option') : '';
                $orisa_cta_phone_href = function_exists('get_field') ? (string) get_field('phone_href', 'option') : '';
                $orisa_cta_addr = function_exists('get_field') ? (string) get_field('address', 'option') : '';
                $orisa_cta_email = '';
                $orisa_cta_emails = function_exists('get_field') ? get_field('emails', 'option') : '';
                if (is_array($orisa_cta_emails)) {
                    foreach ($orisa_cta_emails as $orisa_cta_em) {
                        if (is_array($orisa_cta_em) && !empty($orisa_cta_em['email'])) {
                            $orisa_cta_email = (string) $orisa_cta_em['email'];
                            break;
                        }
                    }
                }
                $orisa_cta_soc = [
                    ['soc_whatsapp', 'WhatsApp', 'whatsapp'],
                    ['soc_telegram', 'Telegram', 'telegram'],
                    ['soc_max', 'MAX', 'max'],
                    ['soc_vk', 'ВКонтакте', 'vk'],
                ];
                ?>
                <div class="sec-4-about bg-neutral-0 pt-120 pb-120" id="project-cta">
                    <div class="container">
                        <div class="row g-4 align-items-end mb-50">
                            <div class="col-lg-6">
                                <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                                    <span class="text-uppercase">
                                        <span class="text-1">Свяжитесь с нами</span>
                                        <span class="text-2">Свяжитесь с нами</span>
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
                                <h2 class="h1 alt-section-title fz-ds-1 lh-1 fw-500 mb-30 reveal-text mb-0">Есть похожая ситуация?</h2>
                            </div>
                            <div class="col-xxl-4 col-lg-6 col-md-8 ms-lg-auto text-lg-end">
                                <p class="fz-font-lg pt-lg-4 mb-0">Расскажите о своей ситуации. <br>
                                    Ответим в течение 1–2 рабочих дней.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5">
                                <div class="row g-4">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="d-flex gap-4">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                                    <path d="M20 40V20H0L20 0L40 20V40H20Z" fill="currentColor" />
                                                    <path d="M0 20L20 40H0V20Z" fill="currentColor" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="h6 fw-600">Контакты</h3>
                                                <div class="d-flex flex-wrap gap-md-5 gap-4">
                                                    <span class="fz-font-md neutral-500">
                                                        <?php if ($orisa_cta_phone !== '') : ?>
                                                            Телефон: <span class="neutral-900"><a href="<?php echo esc_attr($orisa_cta_phone_href !== '' ? $orisa_cta_phone_href : 'tel:' . preg_replace('/[^+\d]/', '', $orisa_cta_phone)); ?>"><?php echo esc_html($orisa_cta_phone); ?></a></span>
                                                            <br class="d-block">
                                                        <?php endif; ?>
                                                        <?php if ($orisa_cta_email !== '') : ?>
                                                            Почта: <span class="neutral-900"><a href="<?php echo esc_attr('mailto:' . $orisa_cta_email); ?>"><?php echo esc_html($orisa_cta_email); ?></a></span>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-lg-8 mx-auto">
                                        <ul class="at-social-list list-unstyled d-flex flex-wrap gap-md-4 gap-3 pt-50">
                                            <?php foreach ($orisa_cta_soc as $orisa_cta_s) : ?>
                                                <?php $orisa_cta_url = function_exists('get_field') ? (string) get_field($orisa_cta_s[0], 'option') : ''; ?>
                                                <?php if ($orisa_cta_url !== '') : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($orisa_cta_url); ?>" target="_blank" rel="noopener" class="at-social__link d-flex align-items-center gap-2" aria-label="<?php echo esc_attr($orisa_cta_s[1]); ?>">
                                                            <?php echo orisa_soc_icon($orisa_cta_s[2]); ?>
                                                            <span class="fw-500"><?php echo esc_html($orisa_cta_s[1]); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-4"></div>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-lg-7 ms-auto pt-lg-0 pt-30">
                                <?php if ($orisa_cta_form !== '') : ?>
                                    <?php echo do_shortcode($orisa_cta_form); ?>
                                <?php elseif ($orisa_cta_phone !== '') : ?>
                                    <a class="at-btn" href="<?php echo esc_attr($orisa_cta_phone_href !== '' ? $orisa_cta_phone_href : 'tel:' . preg_replace('/[^+\d]/', '', $orisa_cta_phone)); ?>"><?php echo esc_html($orisa_cta_phone); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

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
get_footer();
