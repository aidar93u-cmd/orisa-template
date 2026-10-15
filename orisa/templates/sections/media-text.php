<?php
defined('ABSPATH') || exit;

/**
 * Текст с картинкой (база: services-3.html, строки 686-766: .sec-2-about
 * bg-neutral-50 + шапка 714-728 + .process-card 741-766; классы, data-*,
 * вложенность, SVG — дословно; .scroll-section/.wrapper/.item сохранены — хуки JS).
 * Динамика: плашка, заголовок, текст (wysiwyg), кнопка (Link), картинка (Image ID
 * через orisa_img), подпись. Пустые поля гасят свои теги.
 * Опущено без полей (расхождение с оригиналом): правая колонка шапки (лид h3,
 * 730-732), шапка карточки (номер h4 + сроки + плюс-иконка, 750-760 — нумерация
 * шагов принадлежит блоку steps), нижний ряд контактов 852-874 и статистика/
 * слайдер 877-927 — отдельные блоки (contact/stats). Кнопка — штатный .at-btn
 * (приём из cta-band). Подпись — gated <p> под картинкой (в оригинале нет).
 * variant меняет только order-модификаторы колонок.
 */
$variant = get_sub_field('variant');
$image_right = ($variant === 'image-right');
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$text = get_sub_field('text');
$button = get_sub_field('button');
$image_id = (int) get_sub_field('image');
$caption = get_sub_field('caption');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && isset($button['title']) ? $button['title'] : '';
$btn_target = is_array($button) && !empty($button['target']) ? $button['target'] : '';
$img_html = orisa_img($image_id, 'full', ['class' => 'img-cover', 'alt' => is_string($caption) && $caption !== '' ? $caption : (is_string($title) ? $title : '')]);
$media_order = $image_right ? 'order-lg-2 order-1' : 'order-lg-1 order-2';
$text_order = $image_right ? 'order-lg-1 order-2' : 'order-lg-2 order-1';
?>
<div class="sec-2-about pt-120 p-relative bg-neutral-50"<?php echo orisa_anchor(); ?>>
    <div class="position-absolute w-100 h-100 d-grid top-0 md:grid-cols-7 gap-0 z-0 opacity-10">
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 border-r border-dark/01 md:border-none">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            <div class="absolute top-[20%] left-0 right-0 h-[30%] bg-gradient-to-b from-white/5 to-transparent pointer-events-none"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
    </div>
    <div class="container p-relative z-1">
        <div class="row pb-50 align-items-end">
            <div class="col-lg-4 col-md-4">
                <?php if ($badge !== '') : ?>
                    <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                        <span class="text-uppercase">
                            <span class="text-1"><?php echo esc_html($badge); ?></span>
                            <span class="text-2"><?php echo esc_html($badge); ?></span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                            </svg>
                        </i>
                    </span>
                <?php endif; ?>
                <?php if ($title !== '') : ?>
                    <h2 class="h3 reveal-text"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container p-relative z-1">
        <div class="row">
            <div class="col-12">
                <div class="scroll-section process-scroll">
                    <div class="wrapper">
                        <div class="item">
                            <div class="process-card">
                                <div class="row g-xxl-5 align-items-center">
                                    <div class="col-xxl-4 col-lg-5 <?php echo esc_attr($media_order); ?>">
                                        <div class="process-card__img-wrap">
                                            <?php echo $img_html; ?>
                                        </div>
                                        <?php if ($caption !== '') : ?>
                                            <p class="process-card__caption mb-0 mt-10"><?php echo esc_html($caption); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xxl-8 col-lg-7 <?php echo esc_attr($text_order); ?> mb-lg-0 mb-4">
                                        <div class="process-card__content">
                                            <?php if ($title !== '') : ?>
                                                <h4 class="h5 process-card__title"><?php echo esc_html($title); ?></h4>
                                            <?php endif; ?>
                                            <?php if ($text !== '') : ?>
                                                <div class="process-card__desc text-truncate-3 mb-0"><?php echo wp_kses_post($text); ?></div>
                                            <?php endif; ?>
                                            <?php if ($btn_url !== '') : ?>
                                                <a class="at-btn rounded-0 mt-20" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?>>
                                                    <span><span class="text-1"><?php echo esc_html($btn_title); ?></span><span class="text-2"><?php echo esc_html($btn_title); ?></span></span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
