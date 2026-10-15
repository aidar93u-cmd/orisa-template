<?php
defined('ABSPATH') || exit;

/**
 * Кейсы — index.html, строки 920-1110:
 * div#portfolio.container-2200 > div.sec-4-home-5 > шапка (плашка, h2, подзаголовок,
 * кнопки) + сетка .card_case__studies (col-lg-6, visual с metric/tags-оверлеями, footer)
 * + полоса маркеров «[ Законно ]…». Разметка 1:1: классы, data-атрибуты, svg —
 * дословно (на них завязаны main.js и стили). Пустые поля гасят свои теги;
 * картинки — через orisa_img(ID); весь вывод экранирован.
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$button_link = get_sub_field('button_link');
$button_url = is_array($button_link) && !empty($button_link['url']) ? $button_link['url'] : '';
$button_title = is_array($button_link) && !empty($button_link['title']) ? $button_link['title'] : 'Смотреть все кейсы';

$orisa_cases_rows = [];
if (function_exists('have_rows') && have_rows('cases')) {
    while (have_rows('cases')) {
        the_row();
        $orisa_cases_img = get_sub_field('image');
        $orisa_cases_amount = get_sub_field('amount');
        $orisa_cases_ct = get_sub_field('title');
        if (empty($orisa_cases_img) && !$orisa_cases_ct && ($orisa_cases_amount === '' || $orisa_cases_amount === null || $orisa_cases_amount === false)) {
            continue;
        }
        $orisa_cases_tags = [];
        if (have_rows('tags')) {
            while (have_rows('tags')) {
                the_row();
                $orisa_cases_tag = get_sub_field('label');
                if ($orisa_cases_tag !== '') {
                    $orisa_cases_tags[] = $orisa_cases_tag;
                }
            }
        }
        $orisa_cases_ml = get_sub_field('metric_label');
        $orisa_cases_rows[] = [
            'image'        => $orisa_cases_img,
            'amount'       => $orisa_cases_amount,
            'metric_label' => is_string($orisa_cases_ml) ? $orisa_cases_ml : '',
            'tags'         => $orisa_cases_tags,
            'title'        => $orisa_cases_ct,
            'description'  => get_sub_field('description'),
            'link'         => get_sub_field('link'),
        ];
    }
}
if ($orisa_cases_rows === []) {
    $orisa_cases_rows = orisa_project_posts(4);
}
?>
<?php if ($badge || $title || $subtitle || $button_url || $orisa_cases_rows !== []) : ?>
    <div id="portfolio" class="container-2200">
        <div class="sec-4-home-5 pt-100 pb-100 rounded-5 mx-lg-3 mx-2 fix p-relative bg-neutral-0"<?php echo orisa_anchor(); ?>>
            <div class="container">
                <div class="row g-4 align-items-end">
                    <div class="col-lg-7">
                        <?php if ($badge) : ?>
                            <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                                <span class="text-uppercase">
                                    <span class="text-1"><?php echo esc_html($badge); ?></span>
                                    <span class="text-2"><?php echo esc_html($badge); ?></span>
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
                        <?php if ($title) : ?>
                            <h2 class="reveal-text mb-0"><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>
                        <?php if ($subtitle) : ?>
                            <p class="fz-font-lg neutral-500 mt-15 mb-0"><?php echo esc_html($subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($button_url) : ?>
                        <div class="col-lg-3 ms-auto d-flex justify-content-lg-end">
                            <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                                <a class="at-btn-circle" href="<?php echo esc_url($button_url); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                    </svg>
                                </a>
                                <a class="at-btn z-index-1" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_title); ?></a>
                                <a class="at-btn-circle" href="<?php echo esc_url($button_url); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($orisa_cases_rows !== []) : ?>
                <div class="container pt-70">
                    <div class="row g-4">
                        <?php foreach ($orisa_cases_rows as $orisa_cases_c) : ?>
                            <?php
                            $orisa_cases_url = is_array($orisa_cases_c['link']) && !empty($orisa_cases_c['link']['url']) ? $orisa_cases_c['link']['url'] : '#';
                            $orisa_cases_alt = $orisa_cases_c['title'] ? $orisa_cases_c['title'] : get_bloginfo('name');
                            ?>
                            <div class="col-lg-6">
                                <div class="card_case__studies-list card_case__studies-list--row">
                                    <div class="card_case__studies-card card_case__studies-card--overlay bg-neutral-100">
                                        <div class="card_case__studies-visual anim-zoomin">
                                            <?php if ($orisa_cases_c['image']) : ?>
                                                <a href="<?php echo esc_url($orisa_cases_url); ?>">
                                                    <?php echo orisa_img($orisa_cases_c['image'], 'full', ['alt' => $orisa_cases_alt]); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($orisa_cases_c['amount'] !== '' && $orisa_cases_c['amount'] !== null && $orisa_cases_c['amount'] !== false) : ?>
                                                <div class="card_case__studies-metric-overlay">
                                                    <h3 class="h4 card_case__studies-metric-value"><span class="odometer" data-count="<?php echo esc_attr($orisa_cases_c['amount']); ?>"></span> ₽</h3>
                                                    <?php if ($orisa_cases_c['metric_label'] !== '') : ?>
                                                        <span class="card_case__studies-metric-label"><?php echo esc_html($orisa_cases_c['metric_label']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($orisa_cases_c['tags'] !== []) : ?>
                                                <div class="card_case__studies-tags-overlay">
                                                    <?php foreach ($orisa_cases_c['tags'] as $orisa_cases_tag) : ?>
                                                        <a href="#" class="card_case__studies-tag"><?php echo esc_html($orisa_cases_tag); ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card_case__studies-footer mt-10 bg-neutral-0">
                                            <?php if ($orisa_cases_c['title']) : ?>
                                                <h4 class="h5 card_case__studies-footer-title neutral-900">
                                                    <a href="<?php echo esc_url($orisa_cases_url); ?>"><?php echo esc_html($orisa_cases_c['title']); ?></a>
                                                </h4>
                                            <?php endif; ?>
                                            <?php if ($orisa_cases_c['description']) : ?>
                                                <p class="fz-font-lg neutral-500 mb-10"><?php echo esc_html($orisa_cases_c['description']); ?></p>
                                            <?php endif; ?>
                                            <a href="<?php echo esc_url($orisa_cases_url); ?>" class="card_case__studies-link neutral-900">
                                                <span class="neutral-900">СМОТРЕТЬ КЕЙС</span>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row pt-100">
                        <div class="col-12 order-5">
                            <div class="d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center pb-30 gap-md-4 gap-2 at_fade_anim" data-fade-from="bottom" data-duration="2">
                                <p class="neutral-900 mb-0">[ Законно ]</p>
                                <p class="neutral-900 mb-0">[ Под ключ ]</p>
                                <p class="neutral-900 mb-0">[ По всей России ]</p>
                                <p class="neutral-900 mb-0">[ Конфиденциально ]</p>
                                <p class="neutral-900 mb-0">[ Без рисков ]</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
