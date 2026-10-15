<?php
defined('ABSPATH') || exit;

/**
 * Шаги (база: index-13.html, строки 1197-1345: .sec-6-home-13 таймлайн).
 * Разметка 1:1: классы sec-6-home-13__*, data-fade-*, вложенность — дословно
 * (на них завязаны main.css и глобальные at_fade_anim/reveal-text; своего JS нет).
 * Первый шаг подсвечен (--active), остальные обычные — как в оригинале.
 * data-delay фаз лесенкой .1/.25/.4… (шаг .15) — как в оригинале.
 * Номер фазы: поле number, пусто — автосчётчик %02d. Иконка: только если задана
 * (заменяет точку фазы), пусто — штатная точка, разметка дословно как в оригинале.
 * Пустые поля не выводят свои теги. Весь вывод экранирован: esc_html для текста,
 * esc_attr для атрибутов, картинка через orisa_img(ID).
 */
$badge    = (string) get_sub_field('badge');
$title    = (string) get_sub_field('title');
$subtitle = (string) get_sub_field('subtitle');

$orisa_metrics = [];
if (have_rows('metrics')) {
    while (have_rows('metrics')) {
        the_row();
        $orisa_m_num   = (string) get_sub_field('num');
        $orisa_m_label = (string) get_sub_field('label');
        if ($orisa_m_num === '' && $orisa_m_label === '') {
            continue;
        }
        $orisa_metrics[] = ['num' => $orisa_m_num, 'label' => $orisa_m_label];
    }
}

$orisa_items = [];
if (have_rows('items')) {
    while (have_rows('items')) {
        the_row();
        $orisa_s_icon  = (int) get_sub_field('icon');
        $orisa_s_week  = (string) get_sub_field('week');
        $orisa_s_title = (string) get_sub_field('title');
        $orisa_s_text  = (string) get_sub_field('text');
        $orisa_s_deliv = (string) get_sub_field('deliverables');
        if ((string) get_sub_field('number') === '' && $orisa_s_icon <= 0 && $orisa_s_week === '' && $orisa_s_title === '' && $orisa_s_text === '' && $orisa_s_deliv === '') {
            continue;
        }
        $orisa_items[] = [
            'number'       => (string) get_sub_field('number'),
            'icon'         => $orisa_s_icon,
            'week'         => $orisa_s_week,
            'title'        => $orisa_s_title,
            'text'         => $orisa_s_text,
            'deliverables' => $orisa_s_deliv,
        ];
    }
}
?>
<?php if ($badge !== '' || $title !== '' || $subtitle !== '' || $orisa_metrics || $orisa_items) : ?>
    <section class="sec-6-home-13" aria-label="Our process"<?php echo orisa_anchor(); ?>>
        <div class="sec-6-home-13__dots" aria-hidden="true"></div>

        <div class="sec-6-home-13__inner">

            <header class="sec-6-home-13__header">
                <?php if ($badge !== '' || $title !== '') : ?>
                    <div class="sec-6-home-13__head-left">
                        <?php if ($badge !== '') : ?>
                            <div class="sec-6-home-13__label at_fade_anim" data-fade-from="left" data-delay=".05">
                                <span class="sec-6-home-13__label-dot" aria-hidden="true"></span>
                                <span class="sec-6-home-13__label-text"><?php echo esc_html($badge); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($title !== '') : ?>
                            <h2 class="sec-6-home-13__title mb-0 reveal-text">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($subtitle !== '' || $orisa_metrics) : ?>
                    <div class="sec-6-home-13__head-right">
                        <?php if ($subtitle !== '') : ?>
                            <p class="sec-6-home-13__desc mb-0 at_fade_anim">
                                <?php echo esc_html($subtitle); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($orisa_metrics) : ?>
                            <ul class="sec-6-home-13__metrics list-unstyled mb-0">
                                <?php foreach ($orisa_metrics as $orisa_metric) : ?>
                                    <li class="sec-6-home-13__metric at_fade_anim">
                                        <?php if ($orisa_metric['num'] !== '') : ?>
                                            <span class="sec-6-home-13__metric-num"><?php echo esc_html($orisa_metric['num']); ?></span>
                                        <?php endif; ?>
                                        <?php if ($orisa_metric['label'] !== '') : ?>
                                            <span class="sec-6-home-13__metric-label"><?php echo esc_html($orisa_metric['label']); ?></span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </header>

            <?php if ($orisa_items) : ?>
                <!-- Timeline -->
                <div class="sec-6-home-13__timeline">
                    <?php $orisa_i = 0; ?>
                    <?php foreach ($orisa_items as $orisa_step) : ?>
                        <?php
                        $orisa_i++;
                        $orisa_num   = $orisa_step['number'] !== '' ? $orisa_step['number'] : sprintf('%02d', $orisa_i);
                        $orisa_delay = ltrim(sprintf('%.2g', 0.1 + ($orisa_i - 1) * 0.15), '0');
                        $orisa_lines = preg_split('/\r\n|\r|\n/', $orisa_step['deliverables']);
                        $orisa_points = [];
                        if (is_array($orisa_lines)) {
                            foreach ($orisa_lines as $orisa_line) {
                                $orisa_line = trim((string) $orisa_line);
                                if ($orisa_line !== '') {
                                    $orisa_points[] = $orisa_line;
                                }
                            }
                        }
                        ?>
                        <div class="sec-6-home-13__phase<?php echo $orisa_i === 1 ? ' sec-6-home-13__phase--active' : ''; ?> at_fade_anim" data-fade-from="left" data-fade-offset="24" data-delay="<?php echo esc_attr($orisa_delay); ?>">
                            <div class="sec-6-home-13__phase-head">
                                <div class="sec-6-home-13__phase-id">
                                    <?php if ($orisa_step['icon'] > 0) : ?>
                                        <?php echo orisa_img($orisa_step['icon'], 'thumbnail', ['loading' => 'lazy', 'decoding' => 'async', 'alt' => $orisa_step['title']]); ?>
                                    <?php else : ?>
                                        <span class="sec-6-home-13__phase-dot" aria-hidden="true"></span>
                                    <?php endif; ?>
                                    <span class="sec-6-home-13__phase-num"><?php echo esc_html($orisa_num); ?></span>
                                </div>
                                <?php if ($orisa_step['week'] !== '') : ?>
                                    <span class="sec-6-home-13__phase-week"><?php echo esc_html($orisa_step['week']); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if ($orisa_step['title'] !== '' || $orisa_step['text'] !== '') : ?>
                                <div class="sec-6-home-13__phase-body">
                                    <?php if ($orisa_step['title'] !== '') : ?>
                                        <h3 class="sec-6-home-13__phase-title mb-0"><?php echo esc_html($orisa_step['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($orisa_step['text'] !== '') : ?>
                                        <p class="sec-6-home-13__phase-text mb-0"><?php echo esc_html($orisa_step['text']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($orisa_points) : ?>
                                <div class="sec-6-home-13__phase-deliv">
                                    <p class="sec-6-home-13__phase-deliv-label mb-0">DELIVERABLES</p>
                                    <ul class="sec-6-home-13__phase-deliv-list list-unstyled mb-0">
                                        <?php foreach ($orisa_points as $orisa_point) : ?>
                                            <li><span aria-hidden="true">+</span><span><?php echo esc_html($orisa_point); ?></span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>
