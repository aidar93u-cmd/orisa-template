<?php
defined('ABSPATH') || exit;

/**
 * Баннер (index.html, строки 2019-2065: .at-banner-thumb + оверлей).
 * Разметка 1:1 (.at-banner-thumb, .at-header-logo, .at-btn, классы, data-*, вложенность, SVG — дословно).
 * Динамика: фон и логотип (Image ID → orisa_img), название бренда, метка региона,
 * заголовок (переносы строк → <br>), кнопка (Link), примечание о времени, текст справа.
 * Пустые поля гасят свои теги; внешняя обёртка остаётся (стили + data-хуки JS).
 */
$background = get_sub_field('background');
$logo = get_sub_field('logo');
$brand_name = get_sub_field('brand_name');
$location = get_sub_field('location');
$title = get_sub_field('title');
$button = get_sub_field('button');
$schedule = get_sub_field('schedule');
$side_text = get_sub_field('side_text');
$alt = is_string($brand_name) && $brand_name !== '' ? $brand_name : get_bloginfo('name');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && isset($button['title']) ? $button['title'] : '';
$btn_target = is_array($button) && !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '" rel="noopener"' : '';
?>
<div class="at-banner-thumb fix w-100 scale-up-img p-relative changeless d-none d-lg-block"<?php echo orisa_anchor(); ?>>
    <?php echo orisa_img($background, 'full', ['class' => 'img-cover scale-up', 'data-speed' => '0.4', 'alt' => $alt]); ?>
    <div class="position-absolute top-0 bottom-0 start-0 end-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between pt-100">
                        <?php if ($logo || $brand_name !== '') : ?>
                            <div class="at-header-logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php echo orisa_img($logo, 'full', ['data-width' => '30', 'alt' => $alt]); ?>
                                    <?php if ($brand_name !== '') : ?>
                                        <h4 class="h6 fw-700 fz-24 text-white mb-0"><?php echo esc_html($brand_name); ?></h4>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($location !== '') : ?>
                            <a class="bg-transparent border px-3 py-1 rounded-pill common-white fz-font-lg" href="#"><?php echo esc_html($location); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row pt-250 align-items-end">
                <div class="col-lg-5 col-md-6">
                    <?php if ($title !== '') : ?>
                        <h2 class="common-white"><?php echo nl2br(esc_html($title)); ?></h2>
                    <?php endif; ?>
                    <?php if ($btn_url !== '' || $schedule !== '') : ?>
                        <div class="d-flex gap-4 align-items-center pt-30">
                            <?php if ($btn_url !== '') : ?>
                                <a class="at-btn at-btn-border-white common-white rounded-0" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target; ?>>
                                    <span>
                                        <span class="text-1"><?php echo esc_html($btn_title); ?></span>
                                        <span class="text-2"><?php echo esc_html($btn_title); ?></span>
                                    </span>
                                    <i>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                    </i>
                                </a>
                            <?php endif; ?>
                            <?php if ($schedule !== '') : ?>
                                <span class="common-white fz-font-sm"><?php echo esc_html($schedule); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($side_text !== '') : ?>
                    <div class="col-lg-4 col-md-6 ms-auto text-end">
                        <span class="common-white fz-font-lg"><?php echo esc_html($side_text); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
