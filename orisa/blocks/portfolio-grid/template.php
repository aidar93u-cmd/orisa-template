<?php
defined('ABSPATH') || exit;

/**
 * Портфолио — Главная 9 (index-9.html, строки 774-964: section.sec-4-home-9).
 * Разметка 1:1. data-filter / data-category и классы .filter-portfolio,
 * .mg-portfolio-item — дословно (на них Isotope: initPortfolioFilter).
 * Карточки делятся на две колонки (вторая со смещением --offset), как в оригинале 3+3.
 * Пустые поля гасят свои теги; картинки через orisa_img(); весь вывод экранирован.
 */
$title = get_sub_field('title');
$cta_text = get_sub_field('cta_text');
$cta_link = get_sub_field('cta_link');

$orisa_pf_filters = [];
if (function_exists('have_rows') && have_rows('filters')) {
    while (have_rows('filters')) {
        the_row();
        $orisa_pf_fl = get_sub_field('label');
        $orisa_pf_fv = get_sub_field('value');
        if (!$orisa_pf_fl && !$orisa_pf_fv) {
            continue;
        }
        $orisa_pf_filters[] = ['label' => $orisa_pf_fl, 'value' => $orisa_pf_fv ? $orisa_pf_fv : 'all'];
    }
}

$orisa_pf_cards = [];
if (function_exists('have_rows') && have_rows('cards')) {
    while (have_rows('cards')) {
        the_row();
        $orisa_pf_img = get_sub_field('image');
        $orisa_pf_ct = get_sub_field('title');
        if (empty($orisa_pf_img) && !$orisa_pf_ct) {
            continue;
        }
        $orisa_pf_cards[] = [
            'image'    => $orisa_pf_img,
            'category' => get_sub_field('category'),
            'tag'      => get_sub_field('tag'),
            'metric'   => get_sub_field('metric'),
            'excerpt'  => get_sub_field('excerpt'),
            'badge'    => get_sub_field('badge'),
            'title'    => $orisa_pf_ct,
            'link'     => get_sub_field('link'),
        ];
    }
}
?>
<section class="sec-4-home-9 overflow-hidden bg-neutral-50"<?php echo orisa_anchor(); ?>>
    <div class="sec-4-home-9__container">
        <?php if ($title) : ?>
            <h2 class="sec-4-home-9__title at-char-animation"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if ($orisa_pf_filters !== []) : ?>
            <div class="filter-portfolio sec-4-home-9__filters d-flex flex-wrap justify-content-center align-items-center gap-2">
                <?php $orisa_pf_i = 0; ?>
                <?php foreach ($orisa_pf_filters as $orisa_pf_f) : ?>
                    <?php $orisa_pf_i++; ?>
                    <a href="#" class="at-btn filter-btn btn-sm<?php echo $orisa_pf_i === 1 ? ' active' : ''; ?> at_fade_anim" data-delay=".<?php echo esc_attr((string) $orisa_pf_i); ?>" data-filter="<?php echo esc_attr($orisa_pf_f['value']); ?>"><?php echo esc_html($orisa_pf_f['label']); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($orisa_pf_cards !== []) : ?>
            <?php
            $orisa_pf_half = (int) ceil(count($orisa_pf_cards) / 2);
            $orisa_pf_cols = [array_slice($orisa_pf_cards, 0, $orisa_pf_half), array_slice($orisa_pf_cards, $orisa_pf_half)];
            ?>
            <div class="sec-4-home-9__grid">
                <?php $orisa_pf_ci = 0; ?>
                <?php foreach ($orisa_pf_cols as $orisa_pf_col) : ?>
                    <?php $orisa_pf_ci++; ?>
                    <?php if ($orisa_pf_col === []) {
                        continue;
                    } ?>
                    <div class="sec-4-home-9__col<?php echo $orisa_pf_ci === 2 ? ' sec-4-home-9__col--offset' : ''; ?>">
                        <?php foreach ($orisa_pf_col as $orisa_pf_c) : ?>
                            <?php
                            $orisa_pf_url = is_array($orisa_pf_c['link']) && !empty($orisa_pf_c['link']['url']) ? $orisa_pf_c['link']['url'] : '#';
                            $orisa_pf_alt = $orisa_pf_c['title'] ? $orisa_pf_c['title'] : get_bloginfo('name');
                            ?>
                            <article class="sec-4-home-9__card mg-portfolio-item" data-category="<?php echo esc_attr($orisa_pf_c['category']); ?>">
                                <div class="sec-4-home-9__visual">
                                    <a href="<?php echo esc_url($orisa_pf_url); ?>" class="sec-4-home-9__visual-link cursor-hide">
                                        <div class="fix anim-zoomin">
                                            <?php echo orisa_img($orisa_pf_c['image'], 'full', ['alt' => $orisa_pf_alt, 'loading' => 'lazy', 'decoding' => 'async']); ?>
                                        </div>
                                        <div class="sec-4-home-9__overlay">
                                            <?php if ($orisa_pf_c['tag']) : ?>
                                                <span class="sec-4-home-9__tag text-white"><?php echo esc_html($orisa_pf_c['tag']); ?></span>
                                            <?php endif; ?>
                                            <?php if ($orisa_pf_c['metric']) : ?>
                                                <p class="sec-4-home-9__metric text-white"><?php echo esc_html($orisa_pf_c['metric']); ?></p>
                                            <?php endif; ?>
                                            <?php if ($orisa_pf_c['excerpt']) : ?>
                                                <p class="sec-4-home-9__excerpt text-white"><?php echo esc_html($orisa_pf_c['excerpt']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                    <?php if ($orisa_pf_c['badge']) : ?>
                                        <span class="sec-4-home-9__badge"><?php echo esc_html($orisa_pf_c['badge']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="sec-4-home-9__bar">
                                    <?php if ($orisa_pf_c['title']) : ?>
                                        <a href="<?php echo esc_url($orisa_pf_url); ?>">
                                            <h3 class="sec-4-home-9__project"><?php echo esc_html($orisa_pf_c['title']); ?></h3>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url($orisa_pf_url); ?>" class="sec-4-home-9__case">
                                        <span>View case</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                            <path d="M4.512 10.8V0H6.984V10.8H4.512ZM0 6.6V4.2H11.52V6.6H0Z" fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
        $orisa_pf_cta_url = is_array($cta_link) && !empty($cta_link['url']) ? $cta_link['url'] : '';
        $orisa_pf_cta_title = is_array($cta_link) && !empty($cta_link['title']) ? $cta_link['title'] : '';
        ?>
        <?php if ($cta_text || $orisa_pf_cta_url) : ?>
            <div class="sec-4-home-9__cta">
                <?php if ($cta_text) : ?>
                    <p class="sec-4-home-9__cta-text reveal-text"><?php echo esc_html($cta_text); ?></p>
                <?php endif; ?>
                <?php if ($orisa_pf_cta_url) : ?>
                    <a class="at-btn at_fade_anim" href="<?php echo esc_url($orisa_pf_cta_url); ?>" data-delay=".5">
                        <span>
                            <span class="text-1"><?php echo esc_html($orisa_pf_cta_title); ?></span>
                            <span class="text-2"><?php echo esc_html($orisa_pf_cta_title); ?></span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.3517 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.3517 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                        </i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
