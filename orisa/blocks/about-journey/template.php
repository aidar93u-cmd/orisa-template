<?php
defined('ABSPATH') || exit;

/**
 * Путь компании (about-1.html, строки 658-773).
 * Разметка 1:1 с оригиналом (.sec-2-about.block-journey: шапка, карточка, ul.journey-list):
 * классы-обёртки, data-*, вложенность, SVG — дословно (на них завязаны main.js).
 * Пустые поля не выводят свои теги, кроме корневых обёрток.
 * Весь вывод экранирован: esc_html для текста, esc_url/esc_attr для ссылок,
 * картинка карточки — через orisa_img(ID).
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$button = get_sub_field('button');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && !empty($button['title']) ? $button['title'] : '';
$btn_target = is_array($button) && !empty($button['target']) ? $button['target'] : '';
$card_image = get_sub_field('card_image');
?>
<div class="sec-2-about block-journey pt-120 pb-120 bg-neutral-900 changeless"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-end pb-60">
            <div class="col-lg-7 col-md-7">
                <?php if ($badge !== '') : ?>
                    <span class="at-btn text-white bg-transparent mb-10 rounded-0 p-0">
                        <span class="text-uppercase text-white">
                            <span class="text-1"><?php echo esc_html($badge); ?></span>
                            <span class="text-2"><?php echo esc_html($badge); ?></span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="#fff"></path>
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="#fff"></path>
                            </svg>
                        </i>
                    </span>
                <?php endif; ?>
                <?php if ($title !== '') : ?>
                    <h3 class="text-white reveal-text"><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
                <?php if ($subtitle !== '') : ?>
                    <p class="text-white fz-font-lg"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($btn_url !== '') : ?>
                <div class="col-lg-3 col-md-5 ms-auto d-flex justify-content-md-end">
                    <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                        <a class="at-btn-circle bg-neutral-700" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                            </svg>
                        </a>
                        <a class="at-btn z-index-1 bg-neutral-700" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?>><?php echo esc_html($btn_title); ?></a>
                        <a class="at-btn-circle bg-neutral-700" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="alt-portfolio-item mb-30 at-hover-item">
                    <a href="#" class="alt-portfolio-thumb mb-15 p-relative fix d-block">
                        <?php echo orisa_img($card_image, 'full', ['class' => 'w-100 scale-img-from-to', 'data-value-1' => '1.5', 'data-value-2' => '1', 'alt' => 'orisa']); ?>
                        <div class="alt-portfolio-btn">
                            <div class="content">
                                <span class="bg-transparent text-uppercase border px-3 py-1 rounded-pill text-white fz-font-label">Since 2012</span>
                                <h2 class="fw-400 fz-font-3xl text-white mb-0 mt-20">Artificial intelligence and Big Data expert</h2>
                                <p class="text-white fz-font-md mb-0 mt-10 text-truncate-2 des">We always provide people a complete solution upon focused of any business</p>
                            </div>
                        </div>
                    </a>
                    <div class="alt-portfolio-content d-flex justify-content-between align-items-center bg-neutral-700">
                        <h3 class="h5 alt-portfolio-title mb-0"><a href="#" class="common-underline text-white">Orisa Nova<sup>®</sup></a></h3>
                        <span class="alt-portfolio-plus text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                <path d="M4.512 10.8V0H6.984V10.8H4.512ZM0 6.6V4.2H11.52V6.6H0Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ms-auto pt-80">
                <?php if (have_rows('items')) : ?>
                    <ul class="journey-list">
                        <?php while (have_rows('items')) : the_row(); ?>
                            <?php
                            $date = get_sub_field('date');
                            $item_title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $link = get_sub_field('link');
                            $link_url = is_array($link) && !empty($link['url']) ? $link['url'] : '';
                            $link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '';
                            if ($date === '' && $item_title === '' && $text === '' && $link_url === '') {
                                continue;
                            }
                            ?>
                            <li class="journey-list__item scroll-move-up">
                                <?php if ($date !== '') : ?>
                                    <span class="journey-list__date"><?php echo esc_html($date); ?></span>
                                <?php endif; ?>
                                <?php if ($item_title !== '' || $text !== '') : ?>
                                    <div class="journey-list__body">
                                        <?php if ($item_title !== '') : ?>
                                            <h3 class="h6 journey-list__title neutral-0"><?php echo esc_html($item_title); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($text !== '') : ?>
                                            <p class="journey-list__desc"><?php echo esc_html($text); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($link_url !== '') : ?>
                                    <a href="<?php echo esc_url($link_url); ?>" class="journey-list__link" aria-label="View details"<?php echo $link_target !== '' ? ' target="' . esc_attr($link_target) . '" rel="noopener"' : ''; ?>>
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
