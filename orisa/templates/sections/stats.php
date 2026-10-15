<?php
defined('ABSPATH') || exit;

/**
 * Цифры — Главная 9 (index-9.html, строки 668-707:
 * section.sec-2-home-9 > __container > __stats > __stat + __lines, div
 * сбалансированы: __stats закрыт в 702, __lines в 703-705, section в 707).
 * Разметка 1:1: классы, data-delay/fade-атрибуты, span.odometer с data-count
 * (запуск — main.js §43 Odometer counter) — дословно. data-delay по позиции
 * (.1 + .12: .1, .22, .34, .46, .58 — как в оригинале). Пустое число гасит
 * всю строку (odometer без data-count ломает счётчик), пустые суффикс
 * и подпись гасят только свой вывод. Декор-линия — захардкожена URI темы
 * (aria-hidden, как в оригинале; прецедент — brands: декор хардкодится,
 * контент — через orisa_img).
 */
$orisa_stats_rows = [];
if (have_rows('items')) {
    while (have_rows('items')) {
        the_row();
        $orisa_stats_number = get_sub_field('number');
        if ($orisa_stats_number === '' || $orisa_stats_number === null || $orisa_stats_number === false) {
            continue;
        }
        $orisa_stats_suffix = get_sub_field('suffix');
        $orisa_stats_caption = get_sub_field('caption');
        $orisa_stats_rows[] = [
            'number'  => $orisa_stats_number,
            'suffix'  => is_string($orisa_stats_suffix) ? $orisa_stats_suffix : '',
            'caption' => is_string($orisa_stats_caption) ? $orisa_stats_caption : '',
        ];
    }
}
?>
<?php if ($orisa_stats_rows !== []) : ?>
    <section class="sec-2-home-9 bg-neutral-0"<?php echo orisa_anchor(); ?>>
        <div class="sec-2-home-9__container">
            <div class="sec-2-home-9__stats">
                <?php foreach ($orisa_stats_rows as $orisa_stats_i => $orisa_stats_row) : ?>
                    <?php $orisa_stats_delay = ltrim(rtrim(number_format(0.1 + $orisa_stats_i * 0.12, 2, '.', ''), '0'), '0'); ?>
                    <div class="sec-2-home-9__stat at_fade_anim" data-delay="<?php echo esc_attr($orisa_stats_delay); ?>" data-fade-from="left" data-fade-offset="24">
                        <p class="sec-2-home-9__value text-nowrap">
                            <span class="odometer" data-count="<?php echo esc_attr($orisa_stats_row['number']); ?>">0</span><?php echo esc_html($orisa_stats_row['suffix']); ?>
                        </p>
                        <?php if ($orisa_stats_row['caption'] !== '') : ?>
                            <p class="sec-2-home-9__label mb-0"><?php echo esc_html($orisa_stats_row['caption']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="sec-2-home-9__lines" aria-hidden="true">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/imgs/pages/home-9/sec-2-lines.svg'); ?>" alt="orisa" width="1720" height="33" loading="lazy" decoding="async">
            </div>
        </div>
    </section>
<?php endif; ?>
