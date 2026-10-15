<?php
defined('ABSPATH') || exit;

/**
 * Шапка внутренней страницы (база: 404, строки 567-629, .sec-1-404).
 * Разметка 1:1 с оригиналом: классы-обёртки, вложенность — дословно.
 * Динамика: плашка, заголовок, подзаголовок, кнопка (Link), фото справа (Image ID).
 * Поисковая форма привязана к WP (home_url + name="s"), тексты «Search» — декор оригинала.
 * Пустые поля не выводят свои теги; правая колонка скрыта без картинки.
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$button = get_sub_field('button');
$image = get_sub_field('image');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && isset($button['title']) ? $button['title'] : '';
$btn_target = is_array($button) && !empty($button['target']) ? $button['target'] : '';
?>
<div class="sec-1-404 overflow-hidden pt-150"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pe-lg-5">
                <?php if ($badge !== '') : ?>
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
                <?php if ($title !== '') : ?>
                    <h1 class="reveal-text mb-40 fz-ds-1 fw-500 lh-1"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                <?php if ($subtitle !== '') : ?>
                    <p class="fw-400 fz-font-3xl neutral-900 mb-40 w-75 lh-sm"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="w-75 pt-50 pb-60">
                    <div class="at-search-form-input opacity-100">
                        <input type="text" name="s" placeholder="Search..." required>
                        <span class="at-search-focus-border"></span>
                        <button class="at-search-form-btn at-btn" type="submit">
                            <span>
                                <span class="text-1">Search</span>
                                <span class="text-2">Search</span>
                            </span>
                            <i class="icon-arrow-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        </button>
                    </div>
                </form>
                <?php if ($btn_url !== '') : ?>
                    <a href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?> class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0 border-bottom-900 pb-2">
                        <i class="icon-arrow-up-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path d="M2.00069 3.41421L10.6073 12.0208L12.0215 10.6066L3.41489 2H11.0007V0H0.000694275V11H2.00069V3.41421Z" fill="currentColor" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path d="M2.00069 3.41421L10.6073 12.0208L12.0215 10.6066L3.41489 2H11.0007V0H0.000694275V11H2.00069V3.41421Z" fill="currentColor" />
                            </svg>
                        </i>
                        <span class="text-uppercase">
                            <span class="text-1"><?php echo esc_html($btn_title); ?></span>
                            <span class="text-2"><?php echo esc_html($btn_title); ?></span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?>
                <div class="col-lg-5 pt-lg-0 pt-100 d-none d-lg-block">
                    <div class="card_case__studies-avatar fix anim-zoomin">
                        <?php echo orisa_img($image, 'full', ['class' => 'img-cover', 'data-speed' => '.8']); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
