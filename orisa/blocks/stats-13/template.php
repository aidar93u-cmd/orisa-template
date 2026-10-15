<?php
defined('ABSPATH') || exit;

/**
 * Цифры-13 — Главная 13 (index-13.html, строки 821-866:
 * section.sec-2-home-13 > __inner > __stats > __stat + закрытие section в 869).
 * Разметка 1:1: классы, data-fade-*, span.odometer с data-count (запуск —
 * main.js §43 Odometer counter) — дословно; data-delay по позиции
 * (.1 + .15: .1, .25, .4, .55 — как в оригинале). Пустое число гасит весь
 * стат (odometer без data-count ломает счётчик), пустые иконка/тег/подпись
 * гасят только свои теги (шапка целиком — если пусты оба). Картинки —
 * через orisa_img(ID). Верх sec-2 (744-817) сюда не входит — другому блоку.
 */
$orisa_s13_title = get_sub_field('title');
$orisa_s13_rows = [];
if (have_rows('items')) {
    while (have_rows('items')) {
        the_row();
        $orisa_s13_number = get_sub_field('number');
        if ($orisa_s13_number === '' || $orisa_s13_number === null || $orisa_s13_number === false) {
            continue;
        }
        $orisa_s13_tag = get_sub_field('tag');
        $orisa_s13_prefix = get_sub_field('prefix');
        $orisa_s13_suffix = get_sub_field('suffix');
        $orisa_s13_caption = get_sub_field('caption');
        $orisa_s13_rows[] = [
            'icon'    => (int) get_sub_field('icon'),
            'tag'     => is_string($orisa_s13_tag) ? $orisa_s13_tag : '',
            'prefix'  => is_string($orisa_s13_prefix) ? $orisa_s13_prefix : '',
            'number'  => $orisa_s13_number,
            'suffix'  => is_string($orisa_s13_suffix) ? $orisa_s13_suffix : '',
            'caption' => is_string($orisa_s13_caption) ? $orisa_s13_caption : '',
        ];
    }
}
?>
<?php if ($orisa_s13_rows !== []) : ?>
    <section class="sec-2-home-13"<?php if (is_string($orisa_s13_title) && $orisa_s13_title !== '') : ?> aria-label="<?php echo esc_attr($orisa_s13_title); ?>"<?php endif; ?><?php echo orisa_anchor(); ?>>
        <div class="sec-2-home-13__inner">
            <div class="sec-2-home-13__stats">
                <?php foreach ($orisa_s13_rows as $orisa_s13_i => $orisa_s13_row) : ?>
                    <?php $orisa_s13_delay = ltrim(rtrim(number_format(0.1 + $orisa_s13_i * 0.15, 2, '.', ''), '0'), '0'); ?>
                    <div class="sec-2-home-13__stat at_fade_anim" data-fade-from="left" data-fade-offset="24" data-delay="<?php echo esc_attr($orisa_s13_delay); ?>">
                        <?php if ($orisa_s13_row['icon'] > 0 || $orisa_s13_row['tag'] !== '') : ?>
                            <div class="sec-2-home-13__stat-head">
                                <?php if ($orisa_s13_row['icon'] > 0) : ?>
                                    <span class="sec-2-home-13__stat-icon">
                                        <?php echo orisa_img($orisa_s13_row['icon'], 'full', ['class' => 'dark-mode-invert', 'alt' => 'orisa', 'loading' => 'lazy', 'decoding' => 'async']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if ($orisa_s13_row['tag'] !== '') : ?>
                                    <span class="sec-2-home-13__stat-tag"><?php echo esc_html($orisa_s13_row['tag']); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <p class="sec-2-home-13__stat-num mb-0"><?php echo esc_html($orisa_s13_row['prefix']); ?><span class="odometer" data-count="<?php echo esc_attr($orisa_s13_row['number']); ?>">0</span><?php echo esc_html($orisa_s13_row['suffix']); ?></p>
                        <?php if ($orisa_s13_row['caption'] !== '') : ?>
                            <p class="sec-2-home-13__stat-cap mb-0"><?php echo esc_html($orisa_s13_row['caption']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
